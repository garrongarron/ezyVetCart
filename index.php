<?php
include_once 'config.php';
include_once 'ProductList.php';
include_once 'Render.php';
include_once 'Cart.php';
include_once 'RequestHandler.php';

use ezyVet\ProductList;
use ezyVet\Render;
use ezyVet\Cart;
use ezyVet\RequestHandler;


$list = new ProductList();
$render = new Render();
$render->showProductsList($list);
$cart = new Cart($list);
$handler = new RequestHandler($cart);
$render->showProductCart($cart);
echo $render->show();
