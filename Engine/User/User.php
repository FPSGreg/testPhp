<?php

namespace Engine\User;


class User{

    public $login, $password, $amount, $VIP;


    public function __construct(string $login, string $password){

        $this->login = $login;
        $this->password = $password;
    }

}