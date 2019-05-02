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


                        echo "Купил";


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


}