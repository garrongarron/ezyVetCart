<?php
namespace ezyVet;

class RequestHandler
{
    public function __construct(Cart $cart){
        
        if(isset($_REQUEST['add'])){
            $cart->addProductCartQ($_REQUEST['add']);
        }

        if(isset($_REQUEST['delete'])){
            $cart->dropProductCartQ($_REQUEST['delete']);
        }
    }
}
