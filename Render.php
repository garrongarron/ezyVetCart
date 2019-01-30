<?php
namespace ezyVet;

class Render
{
    private $output = '';
    public function showProductsList(ProductList $list){

        $tmp = '<h1>Product List</h1>';
        $tmp .= '<table>';
        $tmp .= '<tr>';
        $tmp .= '<th>';
        $tmp .= 'Product Name';
        $tmp .= '</th>';
        $tmp .= '<th>';
        $tmp .= 'Price';
        $tmp .= '</th>';
        $tmp .= '<th>';
        $tmp .= 'Add to Cart';
        $tmp .= '</th>';
        $tmp .= '</tr>';
        foreach ($list->getList() as $product) {
            $tmp .= '<tr>';
            $tmp .= '<td>';
            $tmp .= $product['name'];
            $tmp .= '</td>';
            $tmp .= '<td>';
            $tmp .= number_format((float)$product['price'], 2, '.', '');
            $tmp .= '</td>';
            $tmp .= '<td>';
            $tmp .= '<a href="?add='.$product['name'].'">+</a>';
            $tmp .= '</td>';
            $tmp .= '</tr>';
        }
        $tmp .= '</table>';
        $this->output .= $tmp;
        return $this;
    }

    public function showProductCart(Cart $cart){

        $tmp = '<h1>Cart</a>';
        $tmp .= '<table>';
        $tmp .= '<tr>';
        $tmp .= '<th>';
        $tmp .= 'Product name';
        $tmp .= '</th>';
        $tmp .= '<th>';
        $tmp .= 'Price';
        $tmp .= '</th>';
        $tmp .= '<th>';
        $tmp .= 'Quantity';
        $tmp .= '</th>';
        $tmp .= '<th>';
        $tmp .= 'Total';
        $tmp .= '</th>';
        $tmp .= '<th>';
        $tmp .= 'Remove';
        $tmp .= '</th>';
        $tmp .= '</tr>';

        $data = $cart->getProductsCartQ();
        foreach ($data[0] as $product) {
            $tmp .= '<tr>';
            $tmp .= '<td>';
            $tmp .= $product['name'];
            $tmp .= '</td>';
            $tmp .= '<td>';
            $tmp .= number_format((float)$product['price'], 2, '.', '');
            $tmp .= '</td>';
            $tmp .= '<td>';
            $tmp .= $data[1][$product['name']];
            $tmp .= '</td>';
            $tmp .= '<td>';
            $tmp .= number_format((float)$product['price']*$data[1][$product['name']], 2, '.', '');
            $tmp .= '</td>';
            $tmp .= '<td>';
            $tmp .= '<a href="?delete='.$product['name'].'">-</a>';
            $tmp .= '</td>';
            $tmp .= '</tr>';
        }

        $tmp .= '<tr>';
        $tmp .= '<td>';
        $tmp .= '&nbsp';
        $tmp .= '</td>';
        $tmp .= '<td>';
        $tmp .= 'Items';
        $tmp .= '</td>';
        $tmp .= '<td>';
        $tmp .= $data[2];
        $tmp .= '</td>';
        $tmp .= '<td>';
        $tmp .= 'Total';
        $tmp .= '</td>';
        $tmp .= '<td>';
        $tmp .= number_format((float)$data[3], 2, '.', '');
        $tmp .= '</td>';
        $tmp .= '</tr>';
        $tmp .= '</table>';
        $this->output .= $tmp;
        return $this;
    }

    public function show(){
        return $this->output;
    }
}
