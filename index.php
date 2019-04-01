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

$url = $_SERVER['REQUEST_URI'];

/**при запросе методом POST по url /api/products/create должен быть вызван метод create у ProductService данные для создания продукта берутся из массива $_POST.
 */
if ($url == "/api/products/create") {
    try {
        $PS->create($_POST["Name"], $_POST["Cost"]); 
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }
}


/** Придумать способ как при GET запросе можно было бы получать только 1 продукт, передавая его id
 */
try {
echo json_encode( $PS->getById($_GET["id"]));
} catch (\Exception $e) {
    echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
    echo "Выброшено исключение2: ". $e->getTraceAsString();
}


/**Для запроса методом GET по url /api/products должны быть отображенный все продукты в формате json */
if ($url == "/api/products") {

    echo json_encode($Repository->getAll());

}
/**Если передавать в $_GET массив параметр premium=true, то будут только премиум продукты */
if ($url == "/api/products?premium=true") {

    echo json_encode($Repository->loadPremiumProducts());

}
/**если этот параметр false, то дефолтные продукты только */
if ($url == "/api/products?premium=false") {

    echo json_encode($Repository->loadDefaultProducts());

}