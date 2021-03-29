<?php 
include_once '../core/session.class.php';
include_once '../core/users.class.php';
include_once '../core/diseases.class.php';
include_once '../core/core.function.php';
$session = new Session();
$user = new users();
$disease = new diseases();

if (!$session->check_session('admin')) {
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
    <link rel="stylesheet" id="css-main" href="../assets/css/codebase.min.css">

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
                <h2 class="content-heading">Administration <small>Users</small></h2>


                <span id="editResult"></span>
                <!-- Dynamic Table Simple -->
                <div class="block" id="tableArea">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Users <small>List of Registered Users</small>
                            <a href="" class="btn p-1 btn-dark"data-toggle="tooltip" title="Refresh user List" ><i class="fa fa-refresh"></i></a>
                        </h3>
                    </div>
                    <div class="block-content block-content-full">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-simpl">
                            <thead>
                                <tr>
                                    <th>Users' Name</th>
                                    <th class="d-none d-sm-table-cell">Email Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($user->fetch_users() as $row): ?>
                                    <tr>
                                        <td class="font-w600"><?php echo $row['fullname'] ?></td>
                                        <td class="font-w600"><?php echo $row['email'] ?></td>
                                    </tr> 
                                <?php endforeach ?>                            
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
                <!-- END Dynamic Table Simple -->
                <!-- END Page Content -->
            </main>
            <!-- END Main Container -->

            <?php include_once 'includes/footer.php'; ?>
            <!-- END Footer -->
        </div>
        <script src="../assets/js/codebase.core.min.js"></script>
        <script src="../assets/js/codebase.app.min.js"></script>

        <!-- Page JS Plugins -->
        <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

        <!-- Page JS Code -->
        <script src="../assets/js/pages/be_tables_datatables.min.js"></script>
    </body>
    </html>