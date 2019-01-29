<?php
namespace ezyVet;

class Render
{
    private $output = '';
    public function showProductsList(ProductList $list){
        $tmp = '<h1>Product List</a>';
        $tmp .= '<table>';
        foreach ($list->getList() as $product) {
            $tmp .= '<tr>';
            $tmp .= '<td>';
            $tmp .= $product['name'];
            $tmp .= '</td>';
            $tmp .= '<td>';
            $tmp .= $product['price'];
            $tmp .= '</td>';
            $tmp .= '<td>';
            $tmp .= '<a href="?add='.$product['name'].'">+</a>';
            $tmp .= '</td>';
            $tmp .= '</tr>';
        }
        $tmp .= '</table>';
        $this->output = $tmp;
        return $this;
    }

    public function show(){
        return $this->output;
    }
}
