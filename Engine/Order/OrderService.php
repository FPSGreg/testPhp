<?php


namespace Engine\Order;
use Engine\Order\OrderRepository;

class OrderService{


    public function buy($UserID, $ProductID){
        $OrderRepository = new OrderRepository;
        $result = $OrderRepository->OrderFindByID($UserID, $ProductID);
        if ($result == 1){
            $OrderRepository->CreateOrder($UserID, $ProductID);
        }
    }


}
