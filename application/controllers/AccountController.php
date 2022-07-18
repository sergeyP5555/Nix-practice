<?php

namespace App\controllers;

use App\core\Controller;
use App\lib\Exceptions\UserExist;
use App\lib\Exceptions\WrongPassword;
use App\lib\Session\Session;
use Symfony\Component\EventDispatcher\Debug\TraceableEventDispatcher;
use Symfony\Component\Mailer\Mailer;
use Symfony\Component\Mailer\Transport;
use Symfony\Component\Mime\Email;

class AccountController extends Controller
{
    public function loginAction()
    {
        if (isset($_POST['entry'])) {
            try {
                $login = $this->model->login($_POST['login'], $_POST['password']);
                if ($login === true) {
                    $_SESSION['userLogin'] = $_POST['login'];
                    header('Location: /main');
                } else {
                    $this->view->render('Вход', ['message' => 'Вы не зарегестрированы!']);
                    exit();
                }
            } catch (WrongPassword $e) {
                $this->view->render('Вход', ['message' => $e->getMessage()]);
                exit();
            }
        }
        $this->view->render('Вход');
    }

    public function registerAction()
    {
        if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email']) && !empty($_POST['phone'])) {
            try {
                $result = $this->model->registration();
//                Mailer
//                $email = $_POST['email'];
//                $text = "Hello, " . $_POST['login'] . " Thank you for registration!";
//                $mail = new Email();
//                $mail->from('example@gmail.com');
//                $mail->to($email);
//                $mail->subject('Welcome!');
//                $mail->text($text);
//                $dsn = 'smtp://localhost:1025';
//
//                $transport = Transport::fromDsn($dsn);
//                $mailer = new Mailer($transport);
//                $mailer->send($mail);
//                  Mailer
                if ($result) {
                    $this->view->render('Регистрация', ['message' => 'Регистрация прошла успешно! Авторизируйтесь!']);
                    $this->logger->info('Зарегестрирован  новый пользователь!', ['User Name' => $_POST['login'],
                        'User Email' => $_POST['email']]);
                    exit();
                }
            } catch (UserExist $e) {
                $this->view->render('Регистрация', ['message' => $e->getMessage()]);
                $this->logger->error($e->getMessage());
                exit();
            }
        }
        $this->view->render('Регистрация');
    }
    public function logoutAction()
    {
        $session = new Session();
        $session->destroyAll();
        header('Location:/main');
    }
}
