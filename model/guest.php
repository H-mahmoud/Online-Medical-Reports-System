<?php
namespace MODEL;
use Lib\PDOConnection;

class guest {
    
    
    public static function login($Email, $Password){
        $sql = "SELECT * FROM doctor where email = '".$Email."' and binary password = '".$Password."'";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
        
    public static function register($Name, $Email, $Password, $Specialization){
        $sql = "INSERT INTO doctor (`Name`, `Email`, `Password`, `Specialization `) values('".$Name."','".$Email."','".$Password."','".Specialization ."')";
        
        try{
            $data = PDOConnection::getInstance()->exec($sql);
        }catch(\PDOException $e){
            return false;
        }
        return $data;
    }
}
?>