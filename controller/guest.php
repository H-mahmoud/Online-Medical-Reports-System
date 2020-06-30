<?php
namespace controller;
use LIB\VALIDATE;
use MODEL\GMODEL;

class guest{

    public function register($Name,$Email,$Password,$VPassword, $Specialization) {
        $Name = Validate::secure($Name);
        $Password = Validate::secure($Password);
        $VPassword = Validate::secure($VPassword);
        $Specialization = Validate::secure($Specialization);
        
        if($Password == $VPassword && Validate::isEmail($Email)){
            return GMODEL::register($Name,$Email,$Password,$Specialization);    
        }else{
            if($Password != $VPassword)
                return -2;
            else
                return -3;
        }
    }
    
    public function login($Email,$Password){
            if(Validate::isEmail($Email)){
                return GMODEL::login($Email, $Password);
            }
            return -1;
    }
    
}

?>