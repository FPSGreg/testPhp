<?php


namespace Engine\Order;
use Engine\Order\OrderRepository;

class OrderService{


    public function buy(int $UserID, int $ProductID){

        $OrderRepository = new OrderRepository;

        $result = $OrderRepository->OrderCheck($UserID, $ProductID);
         try{ 
                  $OrderRepository->CreateOrder($UserID, $ProductID);
            } catch (\Exception $e) {
                echo 'Выброшено исключение: '.  $e->getMessage(). "\n";
                echo "Выброшено исключение2: ". $e->getTraceAsString();
            }    
    }

    public function FindById(int $id){

        $OrderRepository = new OrderRepository;

       echo json_encode($OrderRepository->OrderFindByID($id)) ;

        
    }

    public function getAll(){
        $OrderRepository = new OrderRepository;
        $OrderRepository->getAllOrders();
    }
}