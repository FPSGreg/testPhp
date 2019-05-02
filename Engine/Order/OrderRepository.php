<?php

namespace Engine\Order;
use RedBeanPHP\R as R;

class OrderRepository{



    public function OrderFindByID(int $UserID, int $ProductID){

        $Product = R::findOne( 'products', ' id = :id ', ["id" => $ProductID] );

            if(isset($Product->id)){
                $User = R::findOne( 'users', ' id = :id ', ["id" => $UserID] );
                if(isset($User->id)){
                    if($User->amount>=$Product->cost){

                        return "1";

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



        $UpdateUser = R::load( "users", $UserID );   
        $UpdateUser->amount-=$Product->cost;
        R::store($UpdateUser);
        
        $Order = R::dispense("orders");
        $Order->name = $Product->name;
        $Order->cost = $Product->cost;
        $Order->premium = $Product->premium;
        $Order->user = $User->login;
        R::store($Order);





    }

}