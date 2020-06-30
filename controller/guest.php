<?php
namespace controller;
use LIB\VALIDATE;

class guest{

    public function register($Name,$Password,$VPassword,$Email) {
        $FName = Validate::secure($NName);
        $Password = Validate::secure($Password);
        $VPassword = Validate::secure($VPassword);
        
        if($Password == $VPassword && Validate::isEmail($Email)){
            return users::addUsers($FName,$LName,$Password,$Email);    
        }else{
            if($Password != $VPassword)
                return -2;
            else
                return -3;
        }
    }
    
    public function login($Email,$Password){
            if(Validate::isEmail($Email)){
                return users::getUsers($Email, $Password);
            }
            return -1;
    }
    
}

?>