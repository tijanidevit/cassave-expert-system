<?php 
    include_once '../core/session.class.php';
    include_once '../core/core.function.php';
    $session = new Session();

    if ($session->check_session('admin')) {
        redirect('dashboard.php');
    }
?>

<!DOCTYPE html>
<html lang="en" class="no-focus">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

        <title>Cassava Expert System</title>
        <!-- <link rel="shortcut icon" href="../assets/media/favicons/favicon.png">
        <link rel="icon" type="image/png" sizes="192x192" href="../assets/media/favicons/favicon-192x192.png">
        <link rel="apple-touch-icon" sizes="180x180"/> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,400i,600,700&display=swap">
        <link rel="stylesheet" id="css-main" href="../assets/css/codebase.min.css">
    </head>
    <body>
        <div id="page-container" class="main-content-boxed">

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="bg-body-dark bg-pattern" style="background-image: url('../assets/media/various/bg-pattern-inverse.png');">
                    <div class="row mx-0 justify-content-center">
                        <div class="hero-static col-lg-6 col-xl-4">
                            <div class="content content-full overflow-hidden">
                                <!-- Header -->
                                <div class="py-30 text-center">
                                    <a class="link-effect font-w700" href="./">
                                        <i class="si si-fire"></i>
                                        <span class="font-size-xl text-primary-dark">Cassava </span><span class="font-size-xl">Expert System</span>
                                    </a>
                                    <h1 class="h4 font-w700 mt-30 mb-10">Welcome Back Administrator</h1>
                                    <h2 class="h5 font-w400 text-muted mb-0">Help more farmers grow better cassava!</h2>
                                </div>
                                <!-- END Header -->
                                <form class="js-validation-signin" id="loginForm" method="post">
                                    <div class="block block-themed block-rounded block-shadow">
                                        <div class="block-header bg-gd-dusk">
                                            <h3 class="block-title">Please Sign In</h3>
                                            <!-- <div class="block-options">
                                                <button type="button" class="btn-block-option">
                                                    <i class="si si-wrench"></i>
                                                </button>
                                            </div> -->
                                        </div>
                                        <div class="alert alert-danger">Invalid Credentals</div>
                                        <div class="block-content">
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="login-username">Username</label>
                                                    <input type="text" class="form-control" name="username" required id="login-username" name="login-username">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <label for="login-password">Password</label>
                                                    <input type="password" class="form-control" name="password" required id="login-password" name="login-password">
                                                </div>
                                            </div>
                                            <div class="form-group row mb-0">
                                                <div class="col-sm-6 d-sm-flex align-items-center push">
                                                    <div class="custom-control custom-checkbox mr-auto ml-0 mb-0">
                                                        <input type="checkbox" class="custom-control-input" id="login-remember-me" name="login-remember-me">
                                                        <label class="custom-control-label" for="login-remember-me">Remember Me</label>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 text-sm-right push mt-30">
                                                    <button type="submit" class="btn btn-alt-primary">
                                                        <i class="si si-login mr-10"></i> Sign In
                                                    </button>
                                                </div>
                                                <div id="spinner" class="col-sm-6 text-sm-right push ">
                                                    <i class="fa fa-user mr-10 fa-spin text-primary" style="font-size: 30px"></i> Loading.....
                                                </div>
                                            </div>
                                        </div>
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
        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="../jquery.js"></script>


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
                        }
                    })
                })
            })
        </script>
    </body>
</html>