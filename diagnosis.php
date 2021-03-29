<?php 
    include_once 'core/session.class.php';
    include_once 'core/core.function.php';
    include_once 'core/symptoms.class.php';
    $session = new Session();
    $symptom_obj = new symptoms();

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
                            <a class="block block-link-shadow" href="#" id="graphicalClick">
                                <div class="block-content text-center">
                                    <div class="py-20">
                                        <p class="mb-10">
                                            <i class="fa fa-leaf font-size-h1 text-info" style="font-size: 40px"></i>
                                        </p>
                                        <p class="font-size-lg">Graphical Diagnosis<p>
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
                                        <p class="font-size-lg">Full Diagnosis<p>
                                    </div>
                                </div>
                            </a>
                            <!-- END Lock -->
                        </div>
                    </div>




                    <div class="row graphicalArea" style="display: none;">
                        <div class="col-12">
                            <h3>Choose The Affected Part</h3>
                        </div>
                        <?php foreach ($symptom_obj->fetch_symptom_types() as $row): ?>
                            
                            <div class="col-md-4 col-4" onclick="openGraphicalResult(<?php echo $row['symptom_type_id'] ?>)">
                                <a class="block block-link-shadow" href="#" id="">
                                    <div class="block-content text-center">
                                        <div class="py-20">
                                            <p class="mb-10">
                                                <img src="images/<?php echo $row['type_image'] ?>" class="img-fluid">
                                            </p>
                                            <p class="font-size-lg"><?php echo $row['symptom_type'] ?><p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        <?php endforeach ?>
                    </div>


                    <div class="row graphicalResult" style="display: none;">
                        <div class="col-12">
                            <h3>Choose The Visible Symptom</h3>
                        </div>
                        <div class="row" id="resultArea">
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

        <script>
            $('#graphicalClick').click(function(e){
                e.preventDefault();
                $('.graphicalArea').fadeToggle();
                $('.graphicalResult').fadeOut();
            })

            function openGraphicalResult(symptom_type_id){
                $('.graphicalArea').hide();
                $('.graphicalResult').fadeIn();
                $.ajax({
                    url: 'ajax/fetch_symptom_type_symptoms.php',
                    type: 'POST',
                    data: {symptom_type_id:symptom_type_id},
                    success: function(data){
                        // data = JSON.parse(data);
                        console.log(data);
                        $('#resultArea').html(data);
                    }
                })
            }
        </script>
    </body>
</html>