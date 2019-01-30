<?php
namespace ezyVet;

class ProductList
{
    private $list = null;
    public function __construct(){
        if($this->list === null){
            if(isset($GLOBALS['products'])){
                $this->list = $GLOBALS['products'];
            }
        }
    }

    public function getList(){
        return $this->list;
    }

    public function getProductByName($productName){
        foreach ($this->list as  $product) {
            if($productName == $product['name']){
                return $product;
            }
        }
    }
}
