<?php 
    include_once 'core/session.class.php';
    include_once 'core/core.function.php';
    $session = new Session();

    if (!$session->check_session('farmer')) {
        redirect('./');
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

       
        <div id="page-container" class="sidebar-o enable-page-overlay side-scroll page-header-modern main-content-boxed">
            <!-- Side Overlay-->
            <?php include_once 'includes/sidebar.php'; ?>
            <!-- END Sidebar -->

            <!-- Header -->
            <?php include_once 'includes/header.php'; ?>
            <!-- END Header -->

            <!-- Main Container -->
            <main id="main-container">
                <!-- Page Content -->
                <div class="content">
                    <h2 class="content-heading">Farmer <small>Dashboard</small></h2>
                    <div class="row">
                        <div class="col-md-6">
                            <!-- Sign In -->
                            <a class="block block-link-shadow" href="diagnosis.php">
                                <div class="block-content text-center">
                                    <div class="py-20">
                                        <p class="mb-10">
                                            <i class="si si-login font-size-h1 text-info"></i>
                                        </p>
                                        <p class="font-size-lg">Diagnosis<p>
                                    </div>
                                </div>
                            </a>
                            <!-- END Sign In -->
                        </div>
                        <div class="col-md-6">
                            <!-- Lock -->
                            <a class="block block-link-shadow" href="symptoms.php">
                                <div class="block-content text-center">
                                    <div class="py-20">
                                        <p class="mb-10">
                                            <i class="si si-list font-size-h1 text-danger"></i>
                                        </p>
                                        <p class="font-size-lg">Symptoms<p>
                                    </div>
                                </div>
                            </a>
                            <!-- END Lock -->
                        </div>
                        <div class="col-md-6">
                            <!-- Register -->
                            <a class="block block-link-shadow" href="users.php">
                                <div class="block-content text-center">
                                    <div class="py-20">
                                        <p class="mb-10">
                                            <i class="si si-user-follow font-size-h1 text-success"></i>
                                        </p>
                                        <p class="font-size-lg">Users<p>
                                    </div>
                                </div>
                            </a>
                            <!-- END Register -->
                        </div>
                        <div class="col-md-6">
                            <!-- Password Reminder -->
                            <a class="block block-link-shadow" href="statistics.php">
                                <div class="block-content text-center">
                                    <div class="py-20">
                                        <p class="mb-10">
                                            <i class="si si-bulb font-size-h1 text-warning"></i>
                                        </p>
                                        <p class="font-size-lg">Statistics<p>
                                    </div>
                                </div>
                            </a>
                            <!-- END Password Reminder -->
                        </div>
                    </div>
                </div>
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

           <?php include_once 'includes/footer.php'; ?>
            <!-- END Footer -->
        </div>
        <script src="assets/js/codebase.core.min.js"></script>
        <script src="assets/js/codebase.app.min.js"></script>
    </body>
</html>