<?php

namespace App\controllers;

use App\core\Controller;

class MenuController extends Controller
{
    public function menuAction()
    {

        $this->model->getProduct();
        $this->view->render('Меню');
    }

    public function productsAction()
    {
        $this->model->getProductJson();
    }
}
