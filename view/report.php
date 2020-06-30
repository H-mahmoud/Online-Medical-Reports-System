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
        <!--Navbar -->
        <nav class="navbar navbar-expand-lg ">
          <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <a class="navbar-brand" href="profile.php">Clinc System</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="addreport.php">Add new report</a>
                    </li>
                </ul>
                
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <form method = "post" style = "margin-top: 5px;">
                      <?php
                            if(isset($_POST['logout'])){
                                $op->logout();
                                header("Location: login.php", true, 301);
                            }
                      ?>
                      <button class="btn2 btn-danger my-2 my-sm-0" name = "logout" type="submit"> <i class="fas fa-door-open"></i></button></form>
                </li>
              </ul>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <!--/.Navbar -->
        
        
        <div class="container">
            <!--Information-->
            <div class="row doctor_info">
                <div class="col-lg-3 col-md-3 col-sm-2 col-xm-6">
                    <img src="images/doctor-profile.jpg" class="img-responsive center-block">
                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 col-xm-6" style="padding-top: 40px;">
                    <ul>
                        <li style="font-weight: bold;"><?php echo $_SESSION['name'];?></li>
                        <li><small><?php echo $_SESSION['email'];?></small></li>
                        <li><small><?php echo $_SESSION['specialization'];?></small></li>
                    </ul>
                </div>
            </div>
            <!--Information-->
            
            <!--Reports-->
            <div class="row doctor_report">
                
                <div class="row">
                    <a class="se-nav" href="profile.php"> My Reports</a>
                    <a class="se-nav" href="shared.php" > Shared Reports</a>
                </div>
                
                <hr>
                
                
                <div class="row" style="padding: 70px; padding-top: 0px;">
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
                    <?php  
                        }
                    ?>
                </div>
            </div>
            <!--Reports-->
            
            
        </div>
        
        
	</body>
</html>