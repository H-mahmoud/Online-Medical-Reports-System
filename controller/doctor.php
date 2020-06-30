<?php
namespace controller;

class doctor{
    
    public $name;
    public $email;
    public $spetialize;
    
    public $reportOP;
    
    public function __construct(){
        $this->reportOP = new report();
    }
    
    
}

?>