<?php

namespace Services;

use \Models\User;

class Users {
    public static function getUserByEmail($email){
        $result = Database::getConnection()->get_row("SELECT * FROM user WHERE email = '$email'");
        if (!is_null($result)){
            return new User($result);
        } else {
            return null;
        }
    }

    public static function createNewUser(){
    
    }
}