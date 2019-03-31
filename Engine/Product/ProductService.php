<?php

namespace Engine\Product;
use Engine\Product\Product;
use Engine\Product\ProductRepository;
use RedBeanPHP\R as R;
use Exception;

class ProductService{

    public $Repository;

    public function __construct(){

        $this->Repository = new ProductRepository;
    }




    public function create( string $name, int $price){
        
            $product = new Product($name, $price);
            $this->Repository->save($product);

            return $product;
    }


    public function getById(int $id){

        return $this->Repository->findById($id);
    }

    public function editProduct(int $id, Product $product){

        $this->Repository->update($id, $product);

    }

    public function DeleleProduct(int $id){

       $this->Repository->ProductDel($id);

    }

}