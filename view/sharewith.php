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
                <div class="row">
                    <h3 style="text-align: center;font-weight: bold;font-family: serif;"> Share With <i class="fa fa-share-alt" aria-hidden="true"></i></h3>
                    <form style="padding: 30px;" method="post">
                        <?php
                            if(isset($_POST['share_with'])&&isset($_POST['report_id'])&&isset($_POST['report_id'])){
                                $check = $op->reportOP->share($_POST['report_id'],$_POST['doctor_id'], $_SESSION['id']);
                                if($check){
                                    echo '<div class="alert alert-success" role="alert">
                                        Report Shared successfuly.
                                        </div>';
                                }else{
                                    echo '<div class="alert alert-danger" role="alert">
                                    Process failed please try again.
                                    </div>';
                                }
                            }
                        ?>
                    
                        <?php
                            if(isset($_POST['report_id'])){
                                echo "<h4 style='font-family: fantasy; text-align: center;' id='total_reports'>Report ID: #".(int)$_POST['report_id']."</h4>";
                                
                                echo"<input type='hidden' value='".(int)$_POST['report_id']."' name='report_id'>";
                            }
                        ?>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Doctor ID</label>
                            <input type="text" class="form-control" placeholder="Enter doctor ID" name="doctor_id">
                            <small id="emailHelp" class="form-text text-muted">Enter doctor id to share with him.</small>
                          </div>
                        
                        <div class="row" style="text-align: end;">
                            <input type="submit" class="btn btn-blue" value="Share Now" name="share_with">
                        </div>
                    </form>
                </div> 
            </div>
            <!--Reports-->
            
            
        </div>
        
        
	</body>
</html>