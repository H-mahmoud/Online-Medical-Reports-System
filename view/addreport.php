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
                    <h3 style="text-align: center;font-weight: bold;font-family: serif;"> Add New Report <i class="fa fa-list" aria-hidden="true"></i></h3>
                    <form style="padding: 30px;" method="post">
                    <?php
                    if(isset($_POST['add']) && isset($_POST['rname']) &&isset($_POST['pname']) &&isset($_POST['dob']) &&isset($_POST['age']) &&isset($_POST['nat']) &&isset($_POST['gender']) &&isset($_POST['bp']) &&isset($_POST['pulse']) &&isset($_POST['tempreture']) &&isset($_POST['conclusion']) && isset($_POST['mf'])){
                        
                        $check = $op->reportOP->add($_POST['rname'], $_POST['pname'], $_POST['dob'], $_POST['age'], $_POST['nat'], $_POST['gender'], $_POST['bp'], $_POST['pulse'], $_POST['tempreture'], $_POST['conclusion'], $_POST['mf'], $_SESSION['id']);
                        
                        if($check){
                            echo '<div class="alert alert-success" role="alert">
                                Report added successfuly.
                                </div>';
                        }else{
                            echo '<div class="alert alert-danger" role="alert">
                            Process failed please try again.
                            </div>';
                        }
                    }    
                ?>
                    <table class="table" style="width: 100%; word-wrap:break-word;table-layout: fixed;">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 130px;">Report Name</th>
                          <td><input type="text" id="rname" class="form-control" placeholder="Patient Name" name="rname"></td>
                            <td><span class="btn2 btn-success" onclick="startDictation('rname')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                            
                        </tr>
                        <tr>
                          <th scope="row" style="width: 130px;">Patient Name</th>
                          <td><input type="text" id="pname" class="form-control" placeholder="Patient Name" name="pname"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('pname')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                            <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">DOB</th>
                          <td><input type="text" id="dob" class="form-control" placeholder="DOB" name="dob"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('dob')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Age</th>
                          <td><input type="int" class="form-control" id="age" placeholder="Age" name="age"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('age')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Nationality</th>
                          <td><input type="text" class="form-control" id="nat" placeholder="Nationality" name="nat"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('nat')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Gender</th>
                          <td>  <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1" name="gender">
                              <option value="male">Male</option>
                              <option value="female">Female</option>
                            </select>
                          </div></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Blood Pressure</th>
                          <td><input type="text" class="form-control" id="bd" placeholder="Blood Pressure" name="bp"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('bd')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Pulse</th>
                          <td><input type="text" class="form-control" id="pulse" placeholder="Pulse" name="pulse"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('pulse')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Tempreture</th>
                          <td><input type="text" class="form-control" id="tempreture" placeholder="Tempreture" name="tempreture"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('tempreture')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Conclusion</th>
                          <td><textarea class="form-control" id="conclusion" rows="3" style="resize: none" name="conclusion"></textarea></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('conclusion')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Medical Facility</th>
                          <td><input type="text" class="form-control" id="mf" placeholder="Medical Facility" name="mf"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('mf')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                      </tbody>
                    </table>
                        <div class="row" style="text-align: end;">
                        <input type="submit" class="btn btn-blue" value="Add" name="add">
                        </div>
                    </form>
                </div>
            </div>
            <!--Reports-->
            
            
        </div>
        
        
		<script src='js/jquery-1.11.1.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
            <script>
        var recognition = null;
        
        function startDictation(name) {
            
        var data = document.getElementById(name).value;
        if (window.hasOwnProperty('webkitSpeechRecognition')) {
            
            recognition = new webkitSpeechRecognition();

            recognition.continuous = true;
            recognition.interimResults = false;
            recognition.maxAlternatives = 1;
            recognition.lang = "en-US";
            
            recognition.start();
            
            recognition.onresult = function(e) {
                console.log(e.results[e.results.length-1][0].transcript);
                var temp = e.results[e.results.length-1][0].transcript;
                document.getElementById(name).value = data+temp;
                data = document.getElementById(name).value;
            };

            recognition.onerror = function(e) {
                recognition.stop();
                alert("Unexpexted Error: Please try again.");
            }
        }
    }
        function stopDictation(){
            if(recognition !== null){
                recognition.stop();
                
            }
        }
    </script>

        
	</body>
</html>