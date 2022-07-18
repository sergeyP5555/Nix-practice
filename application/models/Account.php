<?php

namespace App\models;

use App\lib\Exceptions\UserExist;
use App\lib\Exceptions\WrongPassword;
use App\lib\Db\Db;

class Account
{
    public function login($login, $password)
    {
        $db = new Db();
        $existingUsers = $db->db->query("SELECT * FROM users WHERE login = '$login'")->fetch();
        if ($existingUsers) {
            if ($existingUsers['password'] == md5($password)) {
                return true;
            } else {
                throw new WrongPassword("Пароль введен неверно!");
            }
        } else {
            return "Вы не зарегестрированы!";
        }
    }


    public function registration(): bool
    {
        $db = new Db();
        $user = [];

        $user['login'] = $_POST['login'];
        $user['password'] = md5($_POST['password']);
        $user['email'] = $_POST['email'];
        $user['phone'] = $_POST['phone'];
        $existingUsers = $db->db->query("SELECT * FROM users WHERE login = '" . $user['login'] . "'")->fetchAll();
        $existingEmail = $db->db->query("SELECT * FROM users WHERE email = '" . $user['email'] . "'")->fetchAll();
        if ($existingEmail) {
            throw new UserExist("Данная почта уже используется!");
        } elseif ($existingUsers) {
            throw new UserExist("Такой пользователь уже существует!");
        } else {
            $sql = "INSERT INTO users (login, password, email, phone) VALUES ( :login, :password, :email, :phone)";
            $statement = $db->db->prepare($sql);
            $this->bind($statement, $user);
            if ($statement->execute()) {
                return true;
            }
        }
        return false;
    }

    public function bind($statement, $user)
    {
        foreach ($user as $key => $value) {
            $statement->bindValue(":$key", $value);
        }
        return $statement;
    }

}
