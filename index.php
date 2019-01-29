<?php
include_once 'config.php';
include_once 'ProductList.php';
include_once 'Render.php';
use ezyVet\ProductList;
use ezyVet\Render;

$list = new ProductList();
// var_dump($list->getList());exit();
$render = new Render();
echo $render->showProductsList($list)->show();
