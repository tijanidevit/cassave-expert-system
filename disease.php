<?php 
include_once 'core/session.class.php';
include_once 'core/diseases.class.php';
include_once 'core/core.function.php';
$session = new Session();
$disease_obj = new Diseases();

if (!$session->check_session('farmer')) {
    redirect('./');
}

if (!isset($_GET['id'])) {
    redirect('diagnosis.php');
}

$disease_id = $_GET['id'];

$row = $disease_obj->fetch_disease($disease_id);

if (empty($row)) {
    redirect('404.php');
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
                <h2 class="content-heading">Farmer <small>Test Result</small></h2>


                <div class="block" id="viewArea">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Test Result</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option closeView" data-toggle="block-option">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                            <div class="row px-2">

                                <div class="col-md-12">                                    
                                    <h4/>Based on the diagnosis, here is the result</h4>
                                </div>
                                <div class="col-md-12 mt-50">                                    
                                    <h2 class="text-cente" id="viewName" /><?php echo $row['disease_name'] ?></h2>
                                </div>

                                <div class="col-md-12">        
                                        <h4>Disease Sypmtoms</h4>
                                        <p id="viewSymp"><?php echo $row['symptoms'] ?></p>
                                </div>

                                <div class="col-md-12 mb-4">        
                                    <h4>Notable Sypmtoms</h4>
                                        <div class="row">
                                    <?php foreach ($disease_obj->fetch_disease_symptoms($disease_id) as $key): ?>
                                            <div class="col-md-3">
                                                <div class="card">
                                                    <div class="card-body"><img src="symptoms/<?php echo $key['symptom_image'] ?>" style='max-height:300px; min-height:300px; width:100%' class='img-fluid' /></div>
                                                    <div class="lead font-weight-bold"><?php echo $key['symptom'] ?></div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                                </div>
                                </div>

                                <div class="col-md-12">        
                                        <h4>Causes</h4>
                                        <p id="viewCause"><?php echo $row['causes'] ?></p>
                                </div>

                                <div class="col-md-12">      
                                        <h4>Prevention</h4>
                                        <p id="viewPrev"><?php echo $row['prevention'] ?></p>
  
                                </div>
                                <input type="hidden" name="disease_id" id="viewId">

                                <div class="col-md-12">      
                                        <h4>Cure</h4>
                                        <p id="viewCure"><?php echo $row['cure'] ?></p>
  
                                </div>

                                <div class="col-md-12">      
                                        <h4>Comments</h4>
                                        <p id="viewComment"><?php echo $row['comments'] ?></p>
                                </div>
                            </div>
                        </form>
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

    <!-- Page JS Plugins -->
    <script src="assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page JS Code -->
    <script src="assets/js/pages/be_tables_datatables.min.js"></script>

    <script>
    
    </script>
</body>
</html>