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
                    <a class="se-nav" href="shared.html" style="color: #3bbbb4;border-bottom: 3px solid #3bbbb4;"> Shared Reports</a>
                </div>
                
                <hr>
                
                <div class="row">
                    <form class="profile_search ">
                        <div class="row">
                            <div class="col-lg-3 col-md-3 col-sm-1"></div>
                            <div class="col-lg-6 col-md-6 col-sm-7">
                                <input type="text" class="form-control" placeholder="Search for report ......" ></div>
                            <div class="col-lg-3 col-md-3 col-sm-4">
                                <button type="submit" class="btn ">Find</button></div>
                            <input type="hidden" value="1" name="permission">
                        </div>
                    </form>
                </div>
                
                <div class="row" style="padding: 70px; padding-top: 40px;">
                    <h5 style="font-family: fantasy;">Total Reports: 5555</h5>
                    <table class="table report_table">
                      <tbody>
                        <tr>
                          <th scope="row" class="id" >2</th>
                            <td class="r_info"><a><h4>COVID-19 and impact on peer review report.</h4></a><h5>from Ayman to Ahmed </h5><h5>March 30 2020</h5></td>
                            <td class="shared_from"><h5>Shared from Samy</h5></td>
                        </tr>
                        <tr>
                          <th scope="row" class="id" >2</th>
                            <td class="r_info"><a><h4>COVID-19 and impact on peer review report.</h4></a><h5>from Ayman to Ahmed </h5><h5>March 30 2020</h5></td>
                            <td class="shared_from"><h5>Shared from Samy</h5></td>
                        </tr>                        <tr>
                          <th scope="row" class="id" >2</th>
                            <td class="r_info"><a><h4>COVID-19 and impact on peer review report.</h4></a><h5>from Ayman to Ahmed </h5><h5>March 30 2020</h5></td>
                          <td class="shared_from"><h5>Shared from Samy</h5></td>
                        </tr>                        <tr>
                          <th scope="row" class="id" >2</th>
                            <td class="r_info"><a><h4>COVID-19 and impact on peer review report.</h4></a><h5>from Ayman to Ahmed </h5><h5>March 30 2020</h5></td>
                            <td class="shared_from"><h5>Shared from Samy</h5></td>
                        </tr>
                      </tbody>
                    </table>
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
        
        
		<script src='js/jquery-1.11.1.min.js'></script>
		<script src='js/bootstrap.min.js'></script>
        
	</body>
</html>