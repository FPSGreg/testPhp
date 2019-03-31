<?php

require_once  __DIR__ . "/vendor/autoload.php";

use RedBeanPHP\R as R;
use Engine\Product\Product;
use Engine\Product\ProductService;
use Engine\Product\ProductRepository;


R::setup( 'mysql:host=localhost;dbname=mydb', 'root', '' );

echo "<pre>";

$Product = new Product("NewProduct", 302000);

$PS = new ProductService();

$Repository = new ProductRepository;


//** поиск по ID */
// try {
// var_dump($PS->getById(225));
// } catch (\Exception $e) {
//     echo 'Выброшено исключение: '.  $e->getMessage();
// }



//** удаление продукта */
// try {
// $PS->DeleleProduct(211);
// } catch (\Exception $e) {
//     echo 'Выброшено исключение: '.  $e->getMessage();
// }



//** редактирование продукта по ID */
// try {
// $PS->editProduct(100, $Product);
// } catch (\Exception $e) {
//     echo 'Выброшено исключение: '.  $e->getMessage();
// }



//** добавление продукта */
// try {
//     $PS->create("Product2", 150); 
// } catch (\Exception $e) {
//     echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
//     echo "Выброшено исключение2: ". $e->getTraceAsString();
// }

