<?php
namespace MODEL;
use Lib\PDOConnection;

class report {
    
    public static function add($name, $pname, $dob, $age, $nat, $gender, $bloodp, $pulse, $tempreture, $concolution, $mf, $date, $userid){
        
        $sql = "INSERT INTO `report`(`ReportName`, `PatientName`, `DOB`, `Age`, `Nationality`, `Gender`, `BloodPresure`, `Pulse`, `Temperature`, `Conclusion`, `MedicalFacility`, `Date`, `DoctorID`) VALUES ('".$name."','".$pname."','".$dob."',".$age.",'".$nat."','".$gender."','".$bloodp."','".$pulse."','".$tempreture."','".$concolution."','".$mf."',".$date.", $userid)";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
    public static function view($userid){
        
        $sql = "SELECT * FROM `report` WHERE where doctorid = $userid";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
    public function viewshared($userid){
        $sql = "select * from report where reportid IN (SELECT reportid FROM `reportpermission` WHERE where doctorid = $userid)";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
    public static function display($id, $userid){
        
        $sql = "SELECT * FROM `report` WHERE where doctorid = $userid and reportid = $id";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
    public function find($name, $userid){

        $sql = "SELECT * FROM `report` WHERE where (patientname = '%".$name."%' or reportname = '%".$name."%') and doctorid = $userid";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
        
    }
    
    public function share($id, $info){
        $sql = "INSERT INTO `reportpermission`(`Doctor`, `ReportID`) VALUES ($id, $info)";
        
        try{
            $data = PDOConnection::getInstance()->exec($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
        
    } 
    
    public function checkpermission($id, $userid){
        $sql = "(select reportid from report where reportid = $id and doctorid = $userid)";
        
        try{
            $data = PDOConnection::getInstance()->exec($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
}
?>