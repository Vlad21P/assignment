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

function deleteData(array $deletes)
{
    foreach ($deletes as $product) {
        $product->setDeletes($_POST);
        $product->delete();
    }
}

deleteData($products);
