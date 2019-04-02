<?php

namespace Engine\User;


class UserService{
    

    public function signup(string $login, string $password){

        $user = new Product( $login, $password );
        $UserRepository = new UserRepository;
        $UserRepository->saveUser($user);

        return $user;

    }


    public function login(User $login, User $password){

    }


    public function raiseAmount($id, int $amount){

    }

}
