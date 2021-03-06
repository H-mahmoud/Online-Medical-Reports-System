<?php
include(realpath(dirname(__FILE__)).'\..\lib\autoload.php');
use controller\guest;

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
                        <small class="or text-center" style="font-size: 100%;">Sign up</small>
                        <div class="line"></div>
                    </div>
                    <form method="post">
                        <?php
                            if(isset($_POST['register'])&&isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['password'])&&isset($_POST['vpassword'])&&isset($_POST['specialization'])){
                            $check = $op->register($_POST['name'],$_POST['email'],$_POST['password'],$_POST['vpassword'],$_POST['specialization']);
                                    
                                    switch($check){
                                        case 1:
                                            echo '<div class="alert alert-success" role="alert">
                                            Registered successfuly move to the login page to access your profile.
                                            </div>';
                                        break;
                                        case -2;
                                            echo '<div class="alert alert-danger" role="alert">
                                            Password doesn\'t match.
                                            </div>';
                                        break;
                                        case -1;
                                            echo '<div class="alert alert-danger" role="alert">
                                            Email already exist.
                                            </div>';
                                        break;
                                        case -3;
                                            echo '<div class="alert alert-danger" role="alert">
                                            Wrong email format.
                                            </div>';
                                        break;
                                    }
                            }
                        ?>
                    
                        <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm" style="margin-bottom: 0px;">Your Name</h6>
                        </label> <input class="mb-4" type="text" name="name" placeholder="Enter your name" required> </div>
                        <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm" style="margin-bottom: 0px;">Email Address</h6>
                        </label> <input class="mb-4" type="email" name="email" placeholder="Enter a valid email address" required> </div>
                    <div class="row px-3" style="margin-bottom: 10px;"> <label class="mb-1">
                            <h6 class="mb-0 text-sm" style="margin-bottom: 0px;">Password</h6>
                        </label> <input type="password" name="password" placeholder="Enter password" required> </div>
                        <div class="row px-3" style="margin-bottom: 10px;"> <label class="mb-1">
                            <h6 class="mb-0 text-sm" style="margin-bottom: 0px;">Confirm Password</h6>
                        </label> <input type="password" name="vpassword" placeholder="Confirm password" required> </div>
                         <div class="row px-3" style="margin-bottom: 10px;"> <label class="mb-1">
                            <h6 class="mb-0 text-sm" style="margin-bottom: 0px;">Specialization</h6>
                        </label> <input type="text" name="specialization" placeholder="Enter your specialization" required> </div>
                    <div class="row px-3 mb-4">
                        <div class="col-lg-8 col-md-8 col-sm-8"> <input type="checkbox" class="col-lg-1 col-md-1 col-sm-1 col-xs-1"> <small>Remember me</small></div> 
                        <div class="col-lg-4 col-md-4 col-sm-4"><a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a></div>
                    </div>
                        
                    <div class="row mb-3 px-3" style="margin-bottom: 15px; margin-top: 15px;"> <button type="submit" name="register" class="btn text-center" style="background-color: #3e7bbe; color: white;width: 25%;">Sign up</button> </div>
                    </form>
                    <div class="row mb-4 px-3"> <small style="font-weight: bold;">Already have an account? <a style="color: #4177ab;" href="login.php">Login</a></small> </div>
                </div>
            </div>
        </div>
    </div>
</div>
        </div>
	</body>
</html>