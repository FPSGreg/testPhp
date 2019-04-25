<?php

namespace Engine\User;

use Engine\User\UserRepository;

class UserService{
    
    public $Repository;

    public function __construct(){

        $this->Repository = new UserRepository;
    }


    public function signup(string $login, string $password){

        $user = new User( $login, $password );
        $this->Repository->saveUser($user);

        return $user;

    }


    public function login($login, $password){
 
        $id = $this->Repository->RepositoryLogin($login, $password);
        echo ("id - " . "{$id}");
    }


    public function raiseAmount($id, int $amount){

        $this->Repository->AddAmount($id, $amount);
    }

}
