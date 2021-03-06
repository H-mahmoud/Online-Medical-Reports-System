<?php
include(realpath(dirname(__FILE__)).'\..\lib\autoload.php');
use controller\guest;
use controller\doctor;

if(session_status()==PHP_SESSION_NONE) session_start();

if(isset($_SESSION['login'])){
    header("Location: profile.php", true, 301);
    exit();
}

if(!isset($_SESSION['object']))
    $_SESSION['object'] = new guest();

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
        
	</head>
	<body>
        <?php include('parts/nav.php'); ?>
        
        <div class="container" style="padding-top: 5%; ">
            <div id="main-div" class="container-fluid">
    <div class="card card0 border-0" style="background-color: white;">
        <div class="row d-flex" style="padding: 5%">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line "> <img src="images/login-logo2.png" class="image img-responsive center-block"> </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <div class="row px-3 mb-4" style="margin-bottom: 10px;">
                        <small class="or text-center" style="font-size: 100%;">Sign in</small>
                        <div class="line"></div>
                    </div>
                    <form method="post" action="">
                        <?php
                                if(isset($_POST['email']) && isset($_POST['password'])){
                                    $check = $op->login($_POST['email'], $_POST['password']);
                                    if($check){
                                            $_SESSION['id'] = $check['DoctorID'];
                                            $_SESSION['name'] = $check['Name'];
                                            $_SESSION['email'] =  $check['Email'];
                                            $_SESSION['specialization'] =  $check['Specialization'];
                                            $_SESSION['login'] = true;
                                            $_SESSION['object'] = new doctor();
                                            header("Location: profile.php");
                                            exit();
                                    }else
                                        echo '<div class="alert alert-danger" role="alert">
                                        Wrong email or password.
                                        </div>';
                                }
                            ?>
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm" style="margin-bottom: 0px;">Email Address</h6>
                        </label> <input class="mb-4" type="email" name="email" placeholder="Enter a valid email address" required> </div>
                    <div class="row px-3" style="margin-bottom: 10px;"> <label class="mb-1">
                            <h6 class="mb-0 text-sm" style="margin-bottom: 0px;">Password</h6>
                        </label> <input type="password" name="password" placeholder="Enter password" required> </div>
                    <div class="row px-3 mb-4">
                        <div class="col-lg-8 col-md-8 col-sm-8"> <input type="checkbox" class="col-lg-1 col-md-1 col-sm-1 col-xs-1"> <small>Remember me</small></div> 
                        <div class="col-lg-4 col-md-4 col-sm-4"><a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a></div>
                    </div>
                    <div class="row mb-3 px-3" style="margin-bottom: 15px; margin-top: 15px;"> <button type="submit" class="btn text-center" name="login" style="background-color: #3e7bbe; color: white;width: 25%;">Login</button> </div>
                    </form>
                    <div class="row mb-4 px-3"> <small style="font-weight: bold;">Don't have an account? <a style="color: #fe5667;" href="signup.php">Register</a></small> </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
		<script src='js/jquery-1.11.1.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
        <script>
            $('#main-div').hide().delay(2000).show('slow');
        </script>
	</body>
</html>