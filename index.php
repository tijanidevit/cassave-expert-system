<?php 
    include_once 'core/session.class.php';
    include_once 'core/core.function.php';
    $session = new Session();

    if ($session->check_session('farmer')) {
        redirect('dashboard.php');
    }
?>
<!DOCTYPE html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Cassava Expert System</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="assets/css/codebase.min.css">
    </head>
    <body>
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-image" style="background-image: url('assets/media/photos/cassa.png');">
                    <div class="row mx-0 bg-black-op">
                        <div class="hero-static col-md-6 col-xl-8 d-none d-md-flex align-items-md-end">
                            <div class="p-30 invisible" data-toggle="appear">
                                <p class="font-size-h3 font-w600 text-white">
                                    Get Inspired and Farm.
                                </p>
                                <p class="font-italic text-white-op">
                                    Copyright &copy; <span class="js-year-copy"></span>
                                </p>
                            </div>
                        </div>
                        <div class="hero-static col-md-6 col-xl-4 d-flex align-items-center bg-white invisible" data-toggle="appear" data-class="animated fadeInRight">
                            <div class="content content-full">
                                <!-- Header -->
                                <div class="px-30 py-10">
                                    <a class="link-effect font-w700" href="index.html">
                                        <i class="si si-fire"></i>
                                        <span class="font-size-xl text-primary-dark">Cassava </span><span class="font-size-xl">Expert System</span>
                                    </a>
                                    <h1 class="h3 font-w700 mt-30 mb-10">Welcome Back Dear Farmer</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">Please sign in</h2>
                                </div>
                                <!-- END Header -->

                                <form class="js-validation-signin px-30" id="loginForm" method="post">

                                    <div class="alert alert-danger">Invalid Credentals</div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="email" class="form-control" id="login-username" name="email">
                                                <label for="login-username">Email Address</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="form-material floating">
                                                <input type="password" class="form-control" id="login-password" name="password">
                                                <label for="login-password">Password</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                                <label class="custom-control-label" for="login-remember-me">Remember Me</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-sm btn-hero btn-alt-primary">
                                            <i class="si si-login mr-10"></i> Sign In
                                        </button>
                                        <div class="mt-30">
                                            <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="register.php">
                                                <i class="fa fa-plus mr-5"></i> Create Account
                                            </a>
                                            <!-- <a class="link-effect text-muted mr-10 mb-5 d-inline-block" href="op_auth_reminder2.html">
                                                <i class="fa fa-warning mr-5"></i> Forgot Password
                                            </a> -->
                                        </div>
                                    </div>
                                    <div id="spinner" class="col-sm-6 text-sm-right push ">
                                        <i class="fa fa-user mr-10 fa-spin text-primary" style="font-size: 30px"></i> Loading.....
                                    </div>
                                </form>
                                <!-- END Sign In Form -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->
        </div>
        <!-- END Page Container -->

        <script src="assets/js/codebase.core.min.js"></script>

        <script src="assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="assets/js/plugins/jquery-validation/jquery.validate.min.js"></script>

        <!-- Page JS Code -->
        <script src="assets/js/pages/op_auth_signin.min.js"></script>
        <!-- <script src="jquery.js"></script> -->


        <script>
            $(document).ready(function() {
                $('#spinner').hide();
                $('.alert').hide();
                $('#loginForm').submit(function(e){
                    $('.alert').hide();
                    e.preventDefault();

                    $.ajax({
                        url : 'ajax/login.php',
                        type : 'POST',
                        data : $(this).serialize(),
                        beforeSend: function(){
                            $('#spinner').show();
                        },
                        success: function(data){
                            $('#spinner').hide();
                            if (data == 1) {
                                location.href='dashboard.php';
                            }
                            else{
                                $('.alert').show();
                            }
                            console.log(data);
                        }
                    })
                })
            })
        </script>
    </body>
</html>