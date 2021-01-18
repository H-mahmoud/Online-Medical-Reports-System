                <!--Navbar -->
        <nav class="navbar">
          <div class="container" style="padding: 0px;">

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="">Contact</a>
                    </li>
                </ul>
                <?php if(isset($_SESSION['login'])){
                    echo '<ul class="nav navbar-nav navbar-right">
                            <li>
                                <form method = "post" style = "margin-top: 5px;">
                                <button class="btn2 btn-danger my-2 my-sm-0" style="background-color:#dc3545;" name = "logout" type="submit"> <i class="fas fa-door-open"></i></button></form>
                            </li>
                          </ul>';
                    
                    if(isset($_POST['logout'])){
                        $op->logout();
                        header("Location: login.php", true, 301);
                    }
                } ?>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
        <!--/.Navbar -->