<?php

namespace App\controllers;

use App\core\Controller;
use App\lib\Exceptions\ChoosePaymentException;

class CartController extends Controller
{
    public function cartAction()
    {
        $this->view->render('Корзина');
    }

    public function chooseAction()
    {
        try {
            $message = $this->choice($_POST);
            $this->view->render('Корзина', ['message' => $message]);
        } catch (ChoosePaymentException $e) {
            $this->logger->info($e->getMessage());
            $this->view->render('Корзина', ['message' => $e->getMessage()]);
        } catch (\Exception $e) {
            $this->logger->error($e->getMessage());
            header("Location: /cart");
        }
    }

    public function choice($data): string
    {
        if (!isset($data['send-order'])) {
            throw new \Exception('Access denied');
        }
        if (isset($data['send-order']) && !isset($_SESSION['userLogin'])) {
            throw new ChoosePaymentException("Для совершения заказа,вы должны быть авторизированы!");
        }
        if (!isset($data['payment'])) {
            throw new ChoosePaymentException("Пожалуйста,выберите способ оплаты!");
        } elseif ($data['payment'] == 'Cash' || $data['payment'] == 'Card') {
            return "Спасибо за заказ,с Вами свяжется Администратор!";
        } else {
            throw new ChoosePaymentException("Пожалуйста,выберите способ оплаты!");
        }
    }
}
