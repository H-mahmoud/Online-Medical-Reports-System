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
                <div class="row">
                    
                    <h3 style="text-align: center;font-weight: bold;font-family: serif;"> Share your report with other doctors <i class="fa fa-share-alt" aria-hidden="true"></i></h3>
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
                        
                        <div class="row" style="text-align: center;">
                            <input type="submit" class="btn" value="Share Now" name="share_with" style="background-color:#3e7bbe;color:white;width:50%">
                        </div>
                    </form>
                </div> 
            </div>
            <!--Reports-->
            
            
        </div>
        
        
	</body>
</html>