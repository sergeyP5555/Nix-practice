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
use App\lib\Messenger\Messenger;

class AccountController extends Controller
{
    public function loginAction()
    {
        if (isset($_POST['entry'])) {
            try {
                $login = $this->model->login($_POST['login'], $_POST['password']);
                if ($login === true) {
                    $session = new Session();
                    $session->set('userLogin', $_POST['login']);
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
                if ($result) {
                    $this->view->render('Регистрация', ['message' =>
                        'Регистрация прошла успешно!Подтвердите Ваш email в письме, высланном Вам на почту!']);
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
        $session->destroySession();
        header('Location:/main');
    }
}
