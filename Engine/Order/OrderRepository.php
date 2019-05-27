<?php

namespace Engine\Order;
use RedBeanPHP\R as R;
use Engine\Order\Order;

class OrderRepository{



    public function OrderCheck(int $UserID, int $ProductID){

        $Product = R::findOne( 'products', ' id = :id ', ["id" => $ProductID] );

            if(isset($Product->id)){
                $User = R::findOne( 'users', ' id = :id ', ["id" => $UserID] );
                if(isset($User->id)){
                    if($User->amount>=$Product->cost){


                        $MoneyLeft = $User->amount - $Product->cost;
                        echo "Денег осталось: " . "$MoneyLeft";


                    }else{
                        throw new \Exception("Не достаточно денег");
                    }
                }else{
                    throw new \Exception("Пользователя с id - {$UserID} - не существует");
                }
            }else{
                throw new \Exception("Продукта с id - {$ProductID} - не существует");
            }


    }

    public function CreateOrder(int $UserID, int $ProductID){
        $Product = R::findOne( 'products', ' id = :id ', ["id" => $ProductID] );
        $User = R::findOne( 'users', ' id = :id ', ["id" => $UserID] );


        if (isset($User->id)){

            if(isset($Product->id)){

                $UpdateUser = R::load( "users", $UserID );   
                $UpdateUser->amount-=$Product->cost;
                R::store($UpdateUser);
                
                $Order = R::dispense("orders");
                $Order->name = $Product->name;
                $Order->cost = $Product->cost;
                $Order->premium = $Product->premium;
                $Order->user = $User->login;
                R::store($Order);
        

            }else{
                throw new \Exception("Продукта с id - {$ProductID} - не существует");
            }
        }else{
            throw new \Exception("Пользователя с id - {$UserID} - не существует");
        }

 




    }

    public function OrderFindByID(int $id){

        $orders = R::findOne( 'orders', ' id = :id ', ["id" => $id] );

        if  (isset($orders->id)) {

                 $order = new Order;
                 $order->id =       $orders->id;
                 $order->name =     $orders->name;
                 $order->cost =     $orders->cost;
                 $order->premium =  $orders->premium;
                 $order->user =     $orders->user;

            return $order;


        } else {
             throw new \Exception("id {$id} не существует");
        }
    }


    public function getAllOrders(){

        $getting  = R::getAll( 'SELECT * FROM orders' );

        foreach ($getting as $key => $value) {
            $refl = new \ReflectionClass(Product::class);
            $orders = $refl->newInstanceWithoutConstructor();
            $orders->name = $value["name"];
            $orders->cost = $value["cost"];
            $orders->id = $value["id"];
            $orders->premium = $value["premium"];
            $orders->user = $value["user"];

            $array[] = $orders;
        }

        return $array;

    }
}