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
	<body style="background-image: url(images/loginbackgrounf2.jpg); background-size: cover">
        <div class="container" style="padding-top: 11%; ">
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
                    <div class="row px-3"> <label class="mb-1">
                            <h6 class="mb-0 text-sm" style="margin-bottom: 0px;">Email Address</h6>
                        </label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address"> </div>
                    <div class="row px-3" style="margin-bottom: 10px;"> <label class="mb-1">
                            <h6 class="mb-0 text-sm" style="margin-bottom: 0px;">Password</h6>
                        </label> <input type="password" name="password" placeholder="Enter password"> </div>
                    <div class="row px-3 mb-4">
                        <div class="col-lg-8 col-md-8 col-sm-8"> <input type="checkbox" class="col-lg-1 col-md-1 col-sm-1 col-xs-1"> <small>Remember me</small></div> 
                        <div class="col-lg-4 col-md-4 col-sm-4"><a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a></div>
                    </div>
                    <div class="row mb-3 px-3" style="margin-bottom: 15px; margin-top: 15px;"> <button type="submit" class="btn btn-blue text-center">Login</button> </div>
                    </form>
                    <div class="row mb-4 px-3"> <small style="font-weight: bold;">Don't have an account? <a style="color: #fe5667;" href="signup.html">Register</a></small> </div>
                </div>
            </div>
        </div>
        <div class="bg py-4" style="padding: 15px;text-align: center;">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2020. All rights reserved.</small>
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