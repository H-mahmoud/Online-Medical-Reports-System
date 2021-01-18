<?php
namespace MODEL;
use Lib\PDOConnection;

class GMODEL {
    
    
    public static function login($Email, $Password){
        $sql = "SELECT * FROM doctor where email = '".$Email."' and binary password = '".$Password."'";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
            $row = $data->fetch(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            return -1;
        }

        return $row;
    }
    
        
    public static function register($Name, $Email, $Password, $Specialization){
        $sql = "INSERT INTO `doctor`(`Name`, `Email`, `Password`, `Specialization`) VALUES ('".$Name."','".$Email."','".$Password."','".$Specialization ."')";
        
        try{
            $data = PDOConnection::getInstance()->exec($sql);
            
        }catch(\PDOException $e){
            return -1;
        }
        return $data;
    }
}
?>