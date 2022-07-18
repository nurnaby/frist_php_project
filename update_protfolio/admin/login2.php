<?php
session_start();
include 'contorller/bdconfig.php';
// $dbcon= mysqli_connect('localhost','root','','our_web_db')or die('connection Failed') ;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>protfolio project</title>
    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
        type="text/css">
    <link href="assets/css/icons/icomoon/styles.css" rel="stylesheet" type="text/css">
    <link href="assets/css/minified/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/minified/core.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/minified/components.min.css" rel="stylesheet" type="text/css">
    <link href="assets/css/minified/colors.min.css" rel="stylesheet" type="text/css">
    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="assets/js/plugins/loaders/pace.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/jquery.min.js"></script>
    <script type="text/javascript" src="assets/js/core/libraries/bootstrap.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins/loaders/blockui.min.js"></script>
    <!-- /core JS files -->


    <!-- Theme JS files -->
    <script type="text/javascript" src="assets/js/core/app.js"></script>
    <!-- /theme JS files -->

</head>

<body>
    <!-- Page container -->
    <div class="page-container login-container">

        <!-- Page content -->
        <div class="page-content">

            <!-- Main content -->
            <div class="content-wrapper">

                <!-- Content area -->
                <div class="content">
                    <?php
                    if(isset($_POST['submit'])){
                        unset ($_SESSION["mag"]);
                         $email    = $_POST['email'];
                         $password = $_POST['password'];
                         
                        

                         $sql= "SELECT * FROM `admins` WHERE email ='{$email}' AND password ='{$password}'";

                        $resultQry = mysqli_query($dbcon,$sql);
                       

                        $checkQry = mysqli_fetch_array($resultQry);
                       
                        if(!empty($checkQry)){
                            
                            $_SESSION['userName']=$checkQry['name'];
                            $_SESSION['userEmail']=$checkQry['name'];
                            header("Location:index.php");

                        }else {
                            $_SESSION['mag']=" user  email are not match";
                            
                        }
                      
                        
                        
                    }
                    ?>
                    <!-- Simple login form -->
                    <form action="" method="POST" autocomplete="off">

                        <div class="panel panel-body login-form">
                            <?php
                                if(isset($_SESSION['mag'])){
                                    echo "<h6>{$_SESSION['mag']}</h6>";
                                    unset ($_SESSION["mag"]);

                                } 
                            ?>
                            <!-- <div class="alert alert-danger no-border">
                                <button type="button" class="close" data-dismiss="alert"><span>&times;</span>
                                    <span class="sr-only">Close</span>
                                </button>
                                <span class="text-semibold"></span>
                            </div> -->


                            <div class="text-center">
                                <div class="icon-object border-slate-300 text-slate-300"><i class="icon-reading"></i>
                                </div>
                                <h5 class="content-group">Login to your account <small class="display-block">Enter your
                                        credentials below</small></h5>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="email" class="form-control" placeholder="Enter yours Email " name="email"
                                    autocomplete="off">
                                <div class="form-control-feedback">
                                    <i class="icon-user text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group has-feedback has-feedback-left">
                                <input type="password" class="form-control" placeholder="Password" name="password">
                                <div class="form-control-feedback">
                                    <i class="icon-lock2 text-muted"></i>
                                </div>
                            </div>

                            <div class="form-group">
                                <input type="submit" name="submit" value="Sign in" class="btn btn-primary btn-block">

                                <!-- <button type="submit" class="btn btn-primary btn-block">Sign in <i
                                        class="icon-circle-right2 position-right"></i></button> -->
                            </div>

                            <div class="text-center">
                                <a href="login_password_recover.php">Forgot password?</a>
                            </div>
                        </div>
                    </form>
                    <!-- /simple login form -->


                    <!-- Footer -->
                    <div class="footer text-muted">
                        &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a
                            href="http://themeforest.net/user/Kopyov" target="_blank">Eugene Kopyov</a>
                    </div>
                    <!-- /footer -->

                </div>
                <!-- /content area -->

            </div>
            <!-- /main content -->

        </div>
        <!-- /page content -->

    </div>
    <!-- /page container -->

</body>

</html>