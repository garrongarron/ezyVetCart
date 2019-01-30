<?php
namespace ezyVet;

class Cart
{
    private $productList = null;
    public function __construct(ProductList $productList){
        $this->productList = $productList;
        if(!isset($_SESSION['productCartQ'])){
            $_SESSION['productCartQ'] = array();
        }
    }

    public function addProductCartQ($productName){
        if(isset($_SESSION['productCartQ'][$productName])){
            $_SESSION['productCartQ'][$productName]++;
        } else {
            $_SESSION['productCartQ'][$productName] = 1;
        }
    }

    public function dropProductCartQ($productName){
        if(isset($_SESSION['productCartQ'][$productName])){
            $_SESSION['productCartQ'][$productName]--;
        } else {
            throw new Exception("Error Processing Request. There is not the product into te cart", 1);
        }
        if($_SESSION['productCartQ'][$productName] == 0){
            unset($_SESSION['productCartQ'][$productName]);
        }
    }

    public function getProductsCartQ(){
        $tmp = array();
        $q = array();
        $n = 0;
        $total = 0;
        foreach($_SESSION['productCartQ'] as $productName=>$quantity){
            $product = $this->productList->getProductByName($productName);
            array_push($tmp, $product);
            $q[$productName] = $quantity;
            $total += $product['price'] * $quantity;
            $n++;
        }
        return array($tmp, $q, $n, $total);
    }
}
