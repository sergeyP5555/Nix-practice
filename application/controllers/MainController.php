<?php

namespace App\controllers;

use App\core\Controller;
use App\lib\Db\Db;
use App\lib\Session\Session;

class MainController extends Controller
{
    public function mainAction()
    {
        $this->view->render('Главная страница');
    }
}
