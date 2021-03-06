<?php

require_once  __DIR__ . "/vendor/autoload.php";

use RedBeanPHP\R as R;
use Engine\Product\Product;
use Engine\Product\ProductService;
use Engine\Product\ProductRepository;
use Engine\User\UserService;
use Engine\User\User;
use Engine\User\UserRepository;
use Engine\Order\OrderRepository;
use Engine\Order\OrderService;
use Engine\Category\CategoryRepository;
use Engine\Category\CategoryService;

R::setup( 'mysql:host=localhost;dbname=mydb', 'root', '' );




echo "<pre>";
$CategoryRepository = new CategoryRepository();
$CategoryService = new CategoryService();

$OrderService = new OrderService();
$UserRepository = new UserRepository();
$UserService = new UserService();



$Product = new Product("NewProduct", 302000);
$PS = new ProductService();
$Repository = new ProductRepository;

$url = $_SERVER['REQUEST_URI'];


if (strpos($url, "/api/category/getCategory") !== false){
    try{
        echo json_encode($CategoryService->GetThisCategory($_GET["id"]));

    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }
}

if($url == "/api/category/getAll"){
    try{
        echo json_encode($CategoryService->GetAllCategory());
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }
}


if($url =="/api/order/findById"){
    try{
        $OrderService->FindById($_POST["id"]);
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }    
}

if($url =="/api/category/CreateCategory"){
    try{
        $CategoryService->CreateACategory($_POST["Name"]);
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }    
}

if($url =="/api/category/DeleteCategory"){
    try{
        $CategoryService->DeleteACategory($_POST["id"]);
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }    
}

if($url == "/api/order/create") {
    try{
        $OrderService->buy($_POST["UserID"],$_POST["ProductID"]);
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }    
}

if($url == "/api/users/amount/raise") {
    try{
        $UserService->raiseAmount($_POST["id"], $_POST["amount"]);
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }    
}




if($url == "/api/users/login") {
    try{
        $UserService->login($_POST["login"], $_POST["password"]);
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }    
}


if($url == "/api/users/signup") {
    try{
        $UserService->signup($_POST["login"], $_POST["password"]);
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }    
}


/**при запросе методом POST по url /api/products/create должен быть вызван метод create у ProductService данные для создания продукта берутся из массива $_POST.
 */
if ($url == "/api/products/create") {
    try {
  
        $PS->create($_POST["Name"], $_POST["Cost"], $_POST["id"]); 
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }
}


/** Придумать способ как при GET запросе можно было бы получать только 1 продукт, передавая его id
 */

 if($url == "/api/products/getById"){
     if(isset($_GET["id"])){
    try {
    echo json_encode( $PS->getById($_GET["id"]));
    } catch (\Exception $e) {
        echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
        echo "Выброшено исключение2: ". $e->getTraceAsString();
    }
}}




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

//multipart/form-data; boundary=----WebKitFormBoundaryyEmKNDsBKjB7QEqu