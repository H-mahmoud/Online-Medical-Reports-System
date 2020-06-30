<?php
namespace controller;
use LIB\VALIDATE;
use model\report;

class report{
    
    public function add($name, $pname, $dob, $age, $nat, $gender, $bloodp, $pulse, $tempreture, $concolution, $mf){
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
        
    } 
    
    
    public function view($userid){} 
    
    public function viewshared($userid){}
    
    public function display($id, $userid){}
    
    public function find($name){
        $name = Validate::secure($name);
    } 
    
    public function share($id, $info){
        $id = (int)$id;
        $info = (int)$info;
        
    } 
    
}

?>