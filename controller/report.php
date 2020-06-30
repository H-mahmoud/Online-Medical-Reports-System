<?php
namespace controller;
use LIB\VALIDATE;
use model\RMODEL;

class report{
    
    public function add($name, $pname, $dob, $age, $nat, $gender, $bloodp, $pulse, $tempreture, $concolution, $mf, $userid){
        
        $name = Validate::secure($name);
        $pname = Validate::secure($pname);
        $dob = Validate::secure($dob);
        $age = (int)$age;
        $nat = Validate::secure($nat);
        $gender = Validate::secure($gender);
        $bloodp = Validate::secure($bloodp);
        $pulse = (int)$pulse;
        $tempreture = (int)$tempreture;
        $concolution = Validate::secure($concolution);
        $mf = Validate::secure($mf);
        $date = date("Y-m-d H:M:S");
        
        $data = RMODEL::add($name, $pname, $dob, $age, $nat, $gender, $bloodp, $pulse, $tempreture, $concolution, $mf, $date, $userid);
        return $data;
        
    } 
    
    
    public function view($userid){
        return RMODEL::view((int)$userid);
    } 
    
    public function viewshared($userid){
        return RMODEL::viewShared((int)$userid);
    }
    
    public function display($id, $userid){
        return RMODEL::display($id, $userid);
    }
    
    public function find($name, $userid){
        $name = Validate::secure($name);
        return RMODEL::find($name, $userid);
        
    } 
    
    public function findShared($name, $userid){
        $name = Validate::secure($name);
        return RMODEL::findShared($name, $userid);
        
    } 
    
    public function share($id, $info){
        $id = (int)$id;
        $info = (int)$info;
        
    } 
    
}

?>