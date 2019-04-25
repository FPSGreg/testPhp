<?php

namespace Engine\User;


class UserRepository {
    

    public function saveUser(User $user){

        $users = R::dispense("users");
        $users->name = $user->name;
        $users->cost = $user->price;
        $users->premium = $user->premium;
        $users->id = R::store($users);
         
        return $user;   

    }
}
