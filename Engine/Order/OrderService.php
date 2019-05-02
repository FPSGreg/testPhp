<?php


namespace Engine\Order;
use Engine\Order\OrderRepository;

class OrderService{


    public function buy($UserID, $ProductID){
        $OrderRepository = new OrderRepository;
        $OrderRepository->OrderFindByID($UserID, $ProductID);
    }


}
