<?php

require_once  __DIR__ . "/vendor/autoload.php";

use RedBeanPHP\R as R;
use Engine\Product\Product;
use Engine\Product\ProductService as PS;
use Engine\Product\ProductRepository as ProductRep;


R::setup( 'mysql:host=localhost;dbname=mydb', 'root', '' );

echo "<pre>";

$Product = new Product("NewProduct", 302000);

$PS = new PS();


// try {
// $PS->DeleleProduct(211);
// } catch (\Exception $e) {
//     echo 'Выброшено исключение: '.  $e->getMessage();
// }

try {
$PS->redProd(100, $Product);
} catch (\Exception $e) {
    echo 'Выброшено исключение: '.  $e->getMessage();
}


// try {
//     $PS->create("Product2", -1); 
// } catch (\Exception $e) {
//     echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
//     echo "Выброшено исключение2: ". $e->getTraceAsString();
// }



$Repository = new ProductRep;
// $Repository->ProductDel(111);
// var_dump ($Repository->getAll());
// var_dump ($Repository->loadDefaultProducts());

// try {
// var_dump($Repository->findById(200));
// } catch (\Exception $e) {
//     echo 'Выброшено исключение: '.  $e->getMessage();
// }