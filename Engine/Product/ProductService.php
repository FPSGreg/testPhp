<?php

namespace Engine\Product;
use Engine\Product\Product;
use Engine\Product\ProductRepository as Rep;
use RedBeanPHP\R as R;
use Exception;

class ProductService{

    public $Repository;

    public function __construct(){

        $this->Repository = new Rep;
    }




    public function create( string $name, int $price){
        
            $product = new Product($name, $price);
            var_dump($product);
            $this->Repository->save($product);
            // var_dump($product);
            return $product;
    }


    public function getById(int $id){

        $this->Repository->findById($id);

        return $Repository->findById($id);
    }

    public function redProd(int $id, Product $product){

        $upd = $this->Repository->update($id, $product);

    }

    public function DeleleProduct(int $id){

       $del = $this->Repository->ProductDel($id);

    }


    // public function qwe0(){
        
    //     $a
    //     function qwe1()use($this){

    //         $b
    //         function qwe2()use($this){
            
    //             $this->Repository
                
    //         }
    //     }
    // }
}