<?php

namespace Engine\User;
use RedBeanPHP\R as R;
use Engine\User\User;

class UserRepository {
    

    public function saveUser(User $user){

        $users = R::dispense("users");
        $users->login = $user->login;
        $users->password = $user->password;
        $users->id = R::store($users);
         
        return $user;   

    }





    public function RepositoryLogin($login, $password){


        $user = R::findOne( 'users', ' login = :login AND password = :password ',
         $array = [
             ":login" => $login,
             ":password" => $password
         ]);    

            if((isset($user->login))&&($user->password == $password)){
                    
                    return $user->id;
                         
            }else{

                throw new \Exception("Пара {$login} и {$password} не существует");
            }
            
    }





    public function AddAmount(int $id, int $amount){

        $user = R::findOne( 'users', ' id = :id ', ["id" => $id] );

        if (isset($user->id)){

            $userAmount = R::load( "users", $id );   
            $userAmount->login     = $user->login;
            $userAmount->password  = $user->password;
            $userAmount->amount    = $amount;
            R::store($userAmount);
        } else {
            throw new \Exception("id {$id} не существует");
        }


    }
}
