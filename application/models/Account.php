<?php

namespace App\models;

use App\lib\Exceptions\ActivationError;
use App\lib\Exceptions\UserExist;
use App\lib\Exceptions\WrongPassword;
use App\lib\Db\Db;
use App\lib\Messenger\Messenger;

class Account
{
    public function login($login, $password)
    {
        $db = new Db();
        $existingUsers = $db->db->query("SELECT * FROM users WHERE login = '$login'")->fetch();
        $existingActivation = $db->db->query("SELECT * FROM users WHERE login = '$login' AND activation = 1 ")->fetch();
        if ($existingUsers) {
            if ($existingUsers['password'] == md5($password)) {
                if ($existingActivation) {
                    return true;
                } else {
                    throw new ActivationError("Вы не подтвердили почту!");
                }
            } else {
                throw new WrongPassword("Пароль введен неверно!");
            }
        } else {
            return "Вы не подтвердили почту!";
        }
    }

    public function createActivationCode(): string
    {
        return md5(time());
    }

    public function registration(): bool
    {
        $token = $this->createActivationCode();
        $db = new Db();
        $user = [
            'login' => $_POST['login'],
            'password' => md5($_POST['password']),
            'email' => $_POST['email'],
            'phone' => $_POST['phone'],
            'activation_code' => $token,
            'activation' => 0,
        ];
        $existingUsers = $db->db->query("SELECT * FROM users WHERE login = '" . $user['login'] . "'")->fetchAll();
        $existingEmail = $db->db->query("SELECT * FROM users WHERE email = '" . $user['email'] . "'")->fetchAll();
        if ($existingEmail) {
            throw new UserExist("Данная почта уже используется!");
        } elseif ($existingUsers) {
            throw new UserExist("Такой пользователь уже существует!");
        } else {
            $confirmEmail = new Messenger();
            $confirmEmail->sendMessage($user['activation_code']);
            $sql = "INSERT INTO users (login, password, email, phone, activation_code, activation) VALUES ( :login, :password, :email, :phone, :activation_code, :activation)";
            $statement = $db->db->prepare($sql);
            $this->bind($statement, $user);
            if ($statement->execute()) {
                return true;
            }
        }
        return false;
    }

    public function checkActivationCode($token)
    {
        $db = new Db();
        $activationCode = $db->db->query("SELECT id FROM users WHERE activation_code = '$token'")->fetch();
        return $activationCode;
    }

    public function activation($token)
    {
        $db = new Db();
        $db->db->query("UPDATE users SET activation = 1, activation_code = '' WHERE activation_code ='" . $token . "'");
    }

    public function bind($statement, $user)
    {
        foreach ($user as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement;
    }
}
