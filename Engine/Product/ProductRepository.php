<?php

namespace Engine\Product;

use Engine\Product\Product;
use RedBeanPHP\R as R;



class ProductRepository{


    public function update(int $id, Product $products)
    {
        
        if (isset($product->id)) 
        {
            $product = R::load( "products", $id );   
            $product->name = $products->name;
            $product->cost = $products->price;
            $product->premium = $products->premium;
            R::store($product);
        } else {
            throw new \Exception("id {$id} не существует");
        }
    }

    
    public function save(Product $product, int $id){
       $Category = R::load( "category", $id);
       $products = R::dispense("products");
       $products->name = $product->name;
       $products->cost = $product->price;
       $products->premium = $product->premium;
       $products->category = $Category->name;
       $products->id = R::store($products);
        
       return $product;   
    }


    public function findById(int $id)
    {

        $obj = R::findOne( 'products', ' id = :id ', ["id" => $id] );

        if  (isset($obj->id)) {
                $product = new Product($obj->name, $obj->cost);
                $product->id = $obj->id;
                $product->name = $obj->name;
                $product->price = $obj->cost;
                $product->premium = $obj->premium;
            
            return $product;

        } else {
             throw new \Exception("id {$id} не существует");
        }

    }


    public function getAll(){

        $objs  = R::getAll( 'SELECT * FROM products' );

        foreach ($objs as $key => $value) {
            $refl = new \ReflectionClass(Product::class);
            $products = $refl->newInstanceWithoutConstructor();
            // $products = new Product($value["name"], $value["cost"]);
            $products->name = $value["name"];
            $products->price = $value["cost"];
            $products->id = $value["id"];
            $products->premium = $value["premium"];
            $array[] = $products;
        }

        return $array;

    }


    public function ProductDel(int $id){

        $obj = R::findOne( 'products', ' id = :id ', ["id" => $id] );

        if(isset($obj->id)){
            R::trash( $obj );
       }else{
        throw new \Exception("id {$id} не существует");
       }

       

    }

    public function loadPremiumProducts(){

        $objs = R::getAll( 'SELECT * FROM products  WHERE premium = 1');

        foreach ($objs as $key => $value) {

            $refl = new \ReflectionClass(Product::class);
            $products = $refl->newInstanceWithoutConstructor();

            $products->name = $value["name"];
            $products->price = $value["cost"];
            $products->id = $value["id"];
            $products->premium = $value["premium"];

            $array[] = $products;
        }

        return $array;
    }


    public function loadDefaultProducts(){

        $objs = R::getAll( 'SELECT * FROM products  WHERE premium = 0');

        foreach ($objs as $key => $value) {

            $refl = new \ReflectionClass(Product::class);
            $products = $refl->newInstanceWithoutConstructor();

            $products->name = $value["name"];
            $products->price = $value["cost"];
            $products->id = $value["id"];
            $products->premium = $value["premium"];

            $array[] = $products;
        }

        return $array;

    }
}