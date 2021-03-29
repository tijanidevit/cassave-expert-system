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

<style>

</style>
<body>

    <div id="page-container" class="main-content-boxed">
        <?php include_once 'includes/header.php'; ?>
        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="hero bg-white">
                <div class="hero-inner">
                    <div class="content content-full">
                        <div class="py-30 text-center">
                            <div class="display-3 text-warning">400</div>
                            <h1 class="h2 font-w700 mt-30 mb-10">Oops.. Not Found Error..</h1>
                            <h2 class="h3 font-w400 text-muted mb-50">The page you are looking for is not available or might have been moved</h2>
                            <a class="btn btn-hero btn-rounded btn-alt-secondary" href="./">
                                <i class="fa fa-arrow-left mr-10"></i> Go Back Home
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <script src="assets/js/codebase.core.min.js"></script>
    <script src="assets/js/codebase.app.min.js"></script>

    <script>

    </script>
</body>
</html>