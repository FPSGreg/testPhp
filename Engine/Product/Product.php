<?php

namespace Engine\Product;
use Engine\Product\ProductService as PS;

class Product{

    public $id, $name, $price, $premium;

    public function __construct( string $name,int $price){


    
        if ($price > 0) {
            $this->name = $name;
            $this->price = $price;

            if($price > 1000){
                $this->premium = 1;
            }else{
                $this->premium = 0;

            }

    }else{

            throw new \Exception("Цена не может быть ниже 1");

         }

     }

}