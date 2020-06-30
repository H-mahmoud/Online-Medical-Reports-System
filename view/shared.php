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
                    <a class="se-nav" href="shared.php" style="color: #3bbbb4;border-bottom: 3px solid #3bbbb4;"> Shared Reports</a>
                </div>
                
                <hr>
                
                <div class="row">
                    <form class="profile_search " action="" method="get">
                        <?php
                            if(isset($_GET['find'])&&isset($_GET['report'])){
                                $reports = $op->reportOP->findShared($_GET['report'], $_SESSION['id']);
                            }
                        ?>
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-1"></div>
                            <div class="col-lg-6 col-md-6 col-sm-7">
                                <input type="text" class="form-control" placeholder="Search in shared reports ......" name="report" value="<?php if(isset($_GET['report'])){echo $_GET['report']; } ?>">
                                <small>Enter report or patient name.</small></div>
                                <div class="col-lg-3 col-md-3 col-sm-4">
                                <button type="submit" class="btn" name="find">Find</button></div>
                        </div>
                    </form>
                </div>
                
                <div class="row" style="padding: 70px; padding-top: 30px;">
                    <?php
                        if(!isset($_GET['find'])){
                            $reports = $op->reportOP->viewShared($_SESSION['id']);
                        }
                    ?>
                    
                    <?php
                        if(isset($reports)){ 
                            $counter = 0;
                            echo "<h5 style='font-family: fantasy;' id='total_reports'></h5>";
                            
                            echo "<table class='table report_table'>
                                    <tbody>";
                            
                            foreach($reports as $report){
                                $counter++;
                                echo "<tr>
                                      <th scope='row' class='id' ><a href='report.php?id=".$report['ReportID']."'>".$report['ReportID']."</th>
                                        <td class='r_info'><a href='report.php?id=".$report['ReportID']."'><h4>".$report['ReportName'].".</h4></a><h5>from ".$_SESSION['name']." to ".$report['PatientName']." </h5><h5>".$report['Date']."</h5></td>
                                        <td class='date'><form action='sharewith.php' method='post'> 
                                        <input type='hidden' name='report_id' value ='".$report['ReportID']."' >
                                        <button type='submit' class='btn share_btn' name='share'>Share with</button></form></td>
                                    </tr>";
                                }
                                echo "
                                  </tbody>
                                </table>
                                <input type='hidden' value ='$counter' id='count'>";
                        }
                    ?>

                </div>
                
                <div class="row">
                    <div class="center">
                      <div class="pagination">
                      <a href="#">&laquo;</a>
                      <a href="#" class="active">1</a>
                      <a href="#">2</a>
                      <a href="#">3</a>
                      <a href="#">4</a>
                      <a href="#">5</a>
                      <a href="#">6</a>
                      <a href="#">&raquo;</a>
                      </div>
                    </div>

                </div>
                
            </div>
            <!--Reports-->
            
            
        </div>
                <script>
            document.getElementById("total_reports").innerHTML = "Total Reports: "+ document.getElementById("count").value;
        </script>
        
	</body>
</html>