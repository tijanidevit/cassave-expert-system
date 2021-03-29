<?php 
include_once '../core/session.class.php';
include_once '../core/diseases.class.php';
include_once '../core/core.function.php';
$session = new Session();
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
                <h2 class="content-heading">Administration <small>Diseases</small></h2>


                <span id="editResult"></span>
                <!-- Dynamic Table Simple -->
                <div class="block" id="tableArea">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Diseases <small>List of Registered diseases</small> <button id="showAdd" data-toggle="tooltip" title="Add New disease" class="btn p-1 btn-dark"><i class="fa fa-plus"></i></button> <a href="" class="btn p-1 btn-dark"data-toggle="tooltip" title="Refresh disease List" ><i class="fa fa-refresh"></i></a></h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div id="DeleteArea" style="display: none;" class="alert alert-danger">
                            <p>Are you sure to delete this disease</p>
                            <button class="btn btn-danger" id="btnDeleteFinally">Yes</button>
                            <button class="btn btn-success closeDelete">No</button>
                        </div>
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-simpl">
                            <thead>
                                <tr>
                                    <th>Disease Name</th>
                                    <th class="d-none d-sm-table-cell" style="width: 15%;">Rating</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($disease->fetch_diseases() as $row): ?>
                                    <tr id="a<?php echo $row['disease_id'] ?>">
                                        <td class="font-w600"><?php echo $row['disease_name'] ?></td>
                                        <td class="d-none d-sm-table-cell">
                                            <span class="badge badge-primary"><?php echo $row['stats'] ?></span>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-secondary mr-1" id="btnView" onclick="openViewArea(<?php echo $row['disease_id'] ?>)" data="<?php echo $row['disease_id'] ?>" data-toggle="tooltip" title="View disease Details">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button onclick="openEditArea(<?php echo $row['disease_id'] ?>)" class="btn btn-sm btn-secondary mr-1" id="btnEdit" data="<?php echo $row['disease_id'] ?>" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button onclick="openDeleteArea(<?php echo $row['disease_id'] ?>)" class="btn btn-sm btn-secondary mr-1" id="btnDelete" data="<?php echo $row['disease_id'] ?>" data-toggle="tooltip" title="Delete">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </td>
                                    </tr> 
                                <?php endforeach ?>                            
                            </tbody>
                            <tfoot></tfoot>
                        </table>
                    </div>
                </div>
                <!-- END Dynamic Table Simple -->

                <div class="block" id="new" style="display: none;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Add New disease</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" id="closeAdd">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form method="post" id="diseaseForm">
                                <span id="result"></span>
                            <div class="row">
                                <div class="col-md-12">      
                                        <label>Disease Name</label>
                                        <input class="form-control" required name="disease_name">
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Disease Sypmtoms</label>
                                        <textarea class="form-control" required name="symptoms" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Causes</label>
                                        <textarea class="form-control" required name="causes" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Prevention</label>
                                        <textarea class="form-control" required name="prevention" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Cure</label>
                                        <textarea class="form-control" required name="cure" rows="4"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <label>Comments</label>
                                        <textarea class="form-control" required name="comments" rows="4"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <button class="btn btn-dark">Submit</button>
                                        <button type="reset" class="btn btn-dark">reset</button>
                                    </div>
                                </div>

                                <div id="spinner" class="col-sm-6 text-sm-right push ">
                                    <i class="fa fa-user mr-10 fa-spin text-dark" style="font-size: 30px"></i> Loading.....
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 


                <div class="block" id="editArea" style="display: none;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Edit Disease Details</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option closeEdit" data-toggle="block-option">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form method="post" id="editForm">
                            <div class="row">

                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <label>Disease Name</label>
                                        <input class="form-control" required name="disease_name" id="editName" />
                                    </div>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Disease Sypmtoms</label>
                                        <textarea class="form-control" required name="symptoms" rows="4" id="editSymp"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Causes</label>
                                        <textarea class="form-control" required name="causes" rows="4" id="editCause"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Prevention</label>
                                        <textarea class="form-control" required name="prevention" rows="4" id="editPrev"></textarea>
                                    </div>
                                </div>
                                <input type="hidden" name="disease_id" id="editId">

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Cure</label>
                                        <textarea class="form-control" required name="cure" rows="4" id="editCure"></textarea>
                                    </div>
                                </div>

                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <label>Comments</label>
                                        <textarea class="form-control" required name="comments" rows="4" id="editComment"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                        <button type="button" class="closeEdit btn btn-dark">Cancel</button>
                                    </div>
                                </div>

                                <div id="editSpinner" class="col-sm-6 text-sm-right push" style="display: none;">
                                    <i class="fa fa-user mr-10 fa-spin text-dark" style="font-size: 30px;"></i> Loading.....
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 




                <div class="block" id="viewArea" style="display: none;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">View Disease Details</h3>
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
                                    <h2 class="text-center" id="viewName" /></h2>
                                </div>

                                <div class="col-md-12">        
                                        <h4>Disease Sypmtoms</h4>
                                        <p id="viewSymp"></p>
                                </div>

                                <div class="col-md-12">        
                                        <h4>Causes</h4>
                                        <p id="viewCause"></p>
                                </div>

                                <div class="col-md-12">      
                                        <h4>Prevention</h4>
                                        <p id="viewPrev"></p>
  
                                </div>
                                <input type="hidden" name="disease_id" id="viewId">

                                <div class="col-md-12">      
                                        <h4>Cure</h4>
                                        <p id="viewCure"></p>
  
                                </div>

                                <div class="col-md-12">      
                                        <h4>Comments</h4>
                                        <p id="viewComment"></p>
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
    <script src="../assets/js/codebase.core.min.js"></script>
    <script src="../assets/js/codebase.app.min.js"></script>

    <!-- Page JS Plugins -->
    <script src="../assets/js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="../assets/js/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page JS Code -->
    <script src="../assets/js/pages/be_tables_datatables.min.js"></script>

    <script>
        $('#spinner').hide();
        $('#del').show();

        $('#showAdd').click(function(){
            $('#editResult').html('');
            $('#tableArea').hide();
            $('#new').fadeIn();
            $('#result').html('');
        })
        $('#closeAdd').click(function(){
            $('#editResult').html('');
            $('#new').hide();
            $('#tableArea').fadeIn();
        })
        $('.closeEdit').click(function(){
            $('#editResult').html('');
            $('#editArea').hide();
            $('#tableArea').fadeIn();
        })

        $('.closeView').click(function(){
            $('#editResult').html('');
            $('#viewArea').hide();
            $('#tableArea').fadeIn();
        })

        $('.closeDelete').click(function(){
            $('#editResult').html('');
            $('#DeleteArea').fadeOut();
        })

        $('#diseaseForm').submit(function(e){
            $('#editResult').html('');
            $('#result').html('');
            e.preventDefault();
            $.ajax({
                url:'ajax/add_disease.php',
                type: 'POST',
                data : $(this).serialize(),
                beforeSend: function(){
                    $('#spinner').fadeIn();
                },
                success: function(data){
                    $('#result').html(data);
                    $('#spinner').hide();
                }
            })
        })


        function loaddiseaseData(disease_id){
            var res = null;
            $.ajax({
                url:'ajax/fetch_disease.php',
                type: 'POST',
                data : {'disease_id': disease_id},
                beforeSend: function(){
                },
                success: function(data){
                    res = data;
                }
            })
            return res;
        }


        function openViewArea(disease_id){
            $('#editResult').html('');
            $('#tableArea').hide();
            $('#viewArea').fadeIn();

            $.ajax({
                url:'ajax/fetch_disease.php',
                type: 'POST',
                data : {'disease_id': disease_id},
                beforeSend: function(){
                },
                success: function(data){
                    console.log(data);
                    var data = JSON.parse(data);
                    $('#viewName').text(data.disease_name);
                    $('#viewCure').text(data.cure);
                    $('#viewSymp').text(data.symptoms);
                    $('#viewPrev').text(data.prevention);
                    $('#viewCause').text(data.causes);
                    $('#viewComment').text(data.comments);
                    $('#viewId').text(data.disease_id);
                }
            })
        } 

        var d_id = 0;
        function openDeleteArea(disease_id){
            $('#editResult').html('');
            $('#DeleteArea').fadeIn();
            d_id = disease_id;
        } 

        $('#btnDeleteFinally').click(function(){
            var disease_id = d_id;

            $.ajax({
                url:'ajax/delete_disease.php',
                type: 'POST',
                data : {'disease_id': disease_id},
                beforeSend: function(){
                },
                success: function(data){
                    if(data == 1){
                        $('#a'+disease_id).fadeOut();
                        $('#editResult').html('<div class="alert alert-success">Deleted Successfully</div>');
                        $('#DeleteArea').hide();
                    }
                    else{
                        $('#editResult').html(data);
                    }
                }
            })
        })


        function openEditArea(disease_id){
            $('#editResult').html('');
            $('#tableArea').hide();
            $('#editArea').fadeIn();

            $.ajax({
                url:'ajax/fetch_disease.php',
                type: 'POST',
                data : {'disease_id': disease_id},
                beforeSend: function(){
                },
                success: function(data){
                    var data = JSON.parse(data);
                    $('#editName').val(data.disease_name);
                    $('#editCure').val(data.cure);
                    $('#editSymp').val(data.symptoms);
                    $('#editPrev').val(data.prevention);
                    $('#editCause').val(data.causes);
                    $('#editComment').val(data.comments);
                    $('#editId').val(data.disease_id);
                }
            })
        }    

        $('#editForm').submit(function(e){
            $('#result').html('');
            $('#editResult').html('');
            e.preventDefault();
            $.ajax({
                url:'ajax/edit_disease.php',
                type: 'POST',
                data : $(this).serialize(),
                beforeSend: function(){
                    $('#editSpinner').fadeIn();
                },
                success: function(data){
                    $('#editResult').html(data);
                    $('#editSpinner').hide();
                console.log(data);
                }
            })
        })   

    </script>
</body>
</html>