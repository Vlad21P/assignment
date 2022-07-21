<?php

session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
require 'config.php'; 

$products = [
    new DVD(),
    new Book(),
    new Furniture()
];

function insertData(array $data) 
{
    foreach ($data as $product) {
        $product->dbConnect();
        $product->uniqueSku();
        $product->setSku($_POST['sku']);
        $product->setName($_POST['name']);
        $product->setPrice($_POST['price']);
        @$product->setSize($_POST['size']);
        @$product->setWeight($_POST['weight']);
        @$product->setHeight($_POST['height']);
        @$product->setWidth($_POST['width']);
        @$product->setLength($_POST['length']);
        $product->insert();
    }
}

insertData($products);
