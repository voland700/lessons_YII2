<?php
/**
 * Created by PhpStorm.
 * User: Master
 * Date: 02.09.2018
 * Time: 20:00
 */

namespace app\controllers;
use app\models\Product;
use app\models\Cart;
use Yii;


class CartController extends AppController
{
    public function actionAdd()
    {
        $id=Yii::$app->request->get($id);
        $product = Product::findOne($id);
        if(empty($product)) return false;
        $session=Yii::$app->session;
        $session->open();
        $cart = new Cart();
        $cart->addToCart($product);
        $this->layout = false;
        return $this->render('cart-modal', compact('session'));
    }
}