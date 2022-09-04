<?php

namespace App\controllers;

use App\core\Controller;

class MenuController extends Controller
{
    public function menuAction()
    {
        $this->view->render('Меню');
    }

    public function productsAction()
    {
        echo json_encode($this->model->getProduct(), JSON_UNESCAPED_UNICODE);
    }
}
