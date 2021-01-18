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
                    <a class="se-nav" href="shared.php" style="color:#3e7bbe;border-bottom: 3px solid #3e7bbe;"> Shared Reports</a>
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