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
              <a class="navbar-brand" href="#">Clinc System</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav mr-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="addreport.html">Add new report</a>
                    </li>
                </ul>
                
              <ul class="nav navbar-nav navbar-right">
                <li>
                  <form method = "post" style = "margin-top: 5px;"><button class="btn2 btn-danger my-2 my-sm-0" name = "logout" type="submit"> <i class="fas fa-door-open"></i></button></form>
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
                        <li style="font-weight: bold;">Hassan Hossam Mohamed Farouq Dora</li>
                        <li><small>Ayman@fcih.net</small></li>
                        <li><small>Ears Doctor.</small></li>
                    </ul>
                </div>
            </div>
            <!--Information-->
            
            <!--Reports-->
            <div class="row doctor_report">
                
                <div class="row">
                    <a class="se-nav" href="profile.html"> My Reports</a>
                    <a class="se-nav" href="shared.html" > Shared Reports</a>
                </div>
                
                <hr>
                
                
                <div class="row" style="padding: 70px; padding-top: 0px;">
                    <h3 style="text-align: center;font-weight: bold;font-family: serif;"> Add New Report <i class="fa fa-list" aria-hidden="true"></i></h3>
                    <form style="padding: 30px;">
                    <table class="table" style="width: 100%; word-wrap:break-word;table-layout: fixed;">
                      <tbody>
                        <tr>
                          <th scope="row" style="width: 130px;">Report Name</th>
                          <td><input type="email" id="rname" class="form-control" aria-describedby="emailHelp" placeholder="Patient Name"></td>
                            <td><span class="btn2 btn-success" onclick="startDictation('rname')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                                <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                            
                        </tr>
                        <tr>
                          <th scope="row" style="width: 130px;">Patient Name</th>
                          <td><input type="email" id="pname" class="form-control" aria-describedby="emailHelp" placeholder="Patient Name"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('pname')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                            <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">DOB</th>
                          <td><input type="email" id="dob" class="form-control" aria-describedby="emailHelp" placeholder="DOB"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('dob')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Age</th>
                          <td><input type="email" class="form-control" id="age" aria-describedby="emailHelp" placeholder="Age"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('age')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Nationality</th>
                          <td><input type="email" class="form-control" id="nat" aria-describedby="emailHelp" placeholder="Nationality"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('nat')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Gender</th>
                          <td>  <div class="form-group">
                            <select class="form-control" id="exampleFormControlSelect1">
                              <option>Male</option>
                              <option>Female</option>
                            </select>
                          </div></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Blood Pressure</th>
                          <td><input type="email" class="form-control" id="bd" aria-describedby="emailHelp" placeholder="Blood Pressure"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('bd')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Pulse</th>
                          <td><input type="email" class="form-control" id="pulse" aria-describedby="emailHelp" placeholder="Pulse"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('pulse')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Tempreture</th>
                          <td><input type="email" class="form-control" id="tempreture" aria-describedby="emailHelp" placeholder="Tempreture"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('tempreture')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Conclusion</th>
                          <td><textarea class="form-control" id="conclusion" rows="3" style="resize: none"></textarea></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('conclusion')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                          <tr>
                          <th scope="row" style="width: 130px;">Medical Facility</th>
                          <td><input type="email" class="form-control" id="mf" aria-describedby="emailHelp" placeholder="Medical Facility"></td>
                                    <td><span name = "rrecord" class="btn2 btn-success" onclick="startDictation('mf')"><i class="fa fa-microphone" aria-hidden="true"></i></span>
                              <span class="btn2 btn-danger" onclick="stopDictation()" style="margin-left: 10px;"><i class="fa fa-microphone" aria-hidden="true"></i></span></td>
                        </tr>
                      </tbody>
                    </table>
                        <div class="row" style="text-align: end;">
                        <input type="submit" class="btn btn-blue" value="Add">
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