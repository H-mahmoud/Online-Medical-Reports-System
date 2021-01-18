<?php
include(realpath(dirname(__FILE__)).'\..\lib\autoload.php');
use controller\admin;

if(session_status()==PHP_SESSION_NONE) session_start();
if(!isset($_SESSION['login'])){
    header("Location: login.php", true, 301);
    exit();
}

$op = $_SESSION['object'];

?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!--translate html5 in Edge -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--translate html5 in phone -->
		<meta name="viewport" content="width=device-width, intial-scale=1">
		<title></title>
		<link rel='stylesheet' href='css/bootstrap.css'>
		<link rel='stylesheet' href='css/style.css'>
        
         <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://kit.fontawesome.com/a076d05399.js"></script>
        
	</head>
	<body>
<?php include('parts/nav.php'); ?>
        
        <div class="container">
<?php include('parts/header.php'); ?>
            <!--Reports-->
            <div class="row doctor_report">
                
                <div class="row">
                    <a class="se-nav" href="profile.php"> My Reports</a>
                    <a class="se-nav" href="shared.php" > Shared Reports</a>
                </div>
                
                <hr>
                
                
                <div class="row" style="padding: 70px; padding-top: 0px;padding-bottom: 5px;">
                    <?php
                        if(isset($_GET['id'])){
                            $report = $op->reportOP->display($_GET['id'], $_SESSION['id']);
                            
                            echo "<h3 style='text-align: center;font-family: serif;'> ".$report['ReportName']." . </h3>
                            <h5 style='font-family: fantasy;'>ID: #".$report['ReportID']."</h5>";
                     ?>               
                    
                    <table class="table" style="width: 100%; word-wrap:break-word;
              table-layout: fixed;">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 130px;">Patient Name</th>
                          <td><?php echo $report['PatientName']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">DOB</th>
                          <td><?php echo $report['DOB']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Age</th>
                          <td><?php echo $report['Age']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Nationality</th>
                          <td><?php echo $report['Nationality']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Gender</th>
                          <td><?php echo $report['Gender']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Blood Pressure</th>
                          <td><?php echo $report['BloodPresure']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Pulse</th>
                          <td><?php echo $report['Pulse']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Tempreture</th>
                          <td><?php echo $report['Temperature']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Conclusion</th>
                          <td><?php echo $report['Conclusion']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Medical Facility</th>
                          <td><?php echo $report['MedicalFacility']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Date</th>
                          <td><?php echo $report['Date']; ?></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Doctor ID</th>
                          <td>#<?php echo $report['DoctorID']; ?></td>
                        </tr>
                        
                      </tbody>
                    </table>
                    
                    <form method="get" style="wtext-align:center;margin-top:40px;">
                        <?php if(isset($_GET['id']) && isset($_GET['delete'])) {
                                echo "Hello";
                                $report = $op->reportOP->delete( $_SESSION['id'], $_GET['id']);
                                echo $report;
                                var_dump($report);
                                if($report){
                                    echo '<div class="alert alert-success" role="alert">
                                    Report deleted successfuly.
                                    </div>';
                                }else{
                                    echo '<div class="alert alert-danger" role="alert">
                                    Process failed please try again.
                                    </div>';
                                }
                             } ?>
                        <input type="hidden" value="<?php echo $_GET['id'];?>" name="id">
                        <input type="submit" class="btn btn-blue" value="Print" name="print">
                        <input type="submit" class="btn btn-blue" style="background-color:#ffc107;color:black" value="Edit" name="edit">
                        <input type="submit" class="btn btn-blue" style="background-color:#dc3545;" value="Delete" name="delete">  
                    </form>
                    <?php  
                        }
                    ?>
                </div>
            </div>
            <!--Reports-->
            
            
        </div>
        
        
	</body>
</html>