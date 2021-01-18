<?php
namespace MODEL;
use Lib\PDOConnection;

class RMODEL {
    
    public static function add($name, $pname, $dob, $age, $nat, $gender, $bloodp, $pulse, $tempreture, $concolution, $mf, $date, $userid){
        
        $sql = "INSERT INTO `report`(`ReportName`, `PatientName`, `DOB`, `Age`, `Nationality`, `Gender`, `BloodPresure`, `Pulse`, `Temperature`, `Conclusion`, `MedicalFacility`, `Date`, `DoctorID`) VALUES ('".$name."','".$pname."','".$dob."',".$age.",'".$nat."','".$gender."','".$bloodp."','".$pulse."','".$tempreture."','".$concolution."','".$mf."','".$date."', $userid)";
        
        try{
            $data = PDOConnection::getInstance()->exec($sql);

        }catch(\PDOException $e){
            echo $e->getMessage();
            return false;
        }

        return $data;
    }
    
    public static function delete($userid, $id){
        
        $sql1 = "DELETE FROM `reportpermission` WHERE DoctorID = $userid and ReportID = $id";
        $sql2 = "DELETE FROM `report` WHERE DoctorID = $userid and ReportID = $id";
        
        try{
            $data = PDOConnection::getInstance()->exec($sql1);
            $data = PDOConnection::getInstance()->exec($sql2);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
    public static function view($userid){
        
        $sql = "SELECT * FROM `report` WHERE DoctorID = $userid";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
    public function viewShared($userid){
        $sql = "select * from report where ReportID IN (select ReportID from reportpermission where DoctorID = $userid)";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
    public static function display($id, $userid){
        
        $sql = "SELECT * FROM `report` WHERE reportid = $id and (doctorid = $userid or (select count(*) from reportpermission where doctorid = $userid and reportid = $id ) > 0 ) ";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
            $row = $data->fetch(\PDO::FETCH_ASSOC);
        }catch(\PDOException $e){
            return false;
        }

        return $row;
    }
    
    public function find($name, $userid){

        $sql = "SELECT * FROM `report` WHERE (patientname LIKE '%".$name."%' or reportname LIKE '%".$name."%') and doctorid = $userid";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
            
        }catch(\PDOException $e){
            return false;
        }

        return $data;
        
    }
    
    public function findShared($name, $userid){

        $sql = "SELECT * FROM `report` WHERE (patientname LIKE '%".$name."%' or reportname LIKE '%".$name."%') and ReportID IN (select ReportID from reportpermission where DoctorID = $userid)";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
            
        }catch(\PDOException $e){
            return false;
        }

        return $data;
        
    }
    
    public function share($id, $doctorid){

        $sql = "INSERT INTO `reportpermission`(`DoctorID`, `ReportID`) VALUES ($doctorid, $id)";
        
        try{
            $data = PDOConnection::getInstance()->exec($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
        
    } 
    
    public function checkpermission($id, $userid){
        $sql = "select reportid from report where reportid = $id and doctorid = $userid";
        
        try{
            $data = PDOConnection::getInstance()->query($sql);
        }catch(\PDOException $e){
            return false;
        }

        return $data;
    }
    
}
?>