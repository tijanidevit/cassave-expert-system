<?php 
include_once '../core/session.class.php';
include_once '../core/symptoms.class.php';
include_once '../core/diseases.class.php';
include_once '../core/core.function.php';
$session = new Session();
$symptom = new Symptoms();
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
                <h2 class="content-heading">Administration <small>Symptoms</small></h2>


                <span id="editResult"></span>
                <!-- Dynamic Table Simple -->
                <div class="block" id="tableArea">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Symptoms <small>List of Registered symptoms</small> <button id="showAdd" data-toggle="tooltip" title="Add New symptom" class="btn p-1 btn-dark"><i class="fa fa-plus"></i></button> <a href="" class="btn p-1 btn-dark"data-toggle="tooltip" title="Refresh symptom List" ><i class="fa fa-refresh"></i></a></h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div id="DeleteArea" style="display: none;" class="alert alert-danger">
                            <p>Are you sure to delete this Symptom</p>
                            <button class="btn btn-danger" id="btnDeleteFinally">Yes</button>
                            <button class="btn btn-success closeDelete">No</button>
                        </div>
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-simpl">
                            <thead>
                                <tr>
                                    <th>Symptom Name</th>
                                    <th class="d-none d-sm-table-cell">Symptom Type</th>
                                    <th class="d-none d-sm-table-cell">Corresponding Disease</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($symptom->fetch_symptoms() as $row): ?>
                                    <tr id="a<?php echo $row['symptom_id'] ?>">
                                        <td class="font-w600"><?php echo $row['symptom'] ?></td>
                                        <td class="d-none d-sm-table-cell"><?php echo $row['symptom_type'] ?></td>
                                        <td class="font-w600"><?php echo $row['disease_name'] ?></td>
                                        <td class="text-center">
                                            <button class="btn btn-sm btn-secondary mr-1" id="btnView" onclick="openViewArea(<?php echo $row['symptom_id'] ?>)" data="<?php echo $row['symptom_id'] ?>" data-toggle="tooltip" title="View symptom Details">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                            <button onclick="openEditArea(<?php echo $row['symptom_id'] ?>)" class="btn btn-sm btn-secondary mr-1" id="btnEdit" data="<?php echo $row['symptom_id'] ?>" data-toggle="tooltip" title="Edit">
                                                <i class="fa fa-edit"></i>
                                            </button>
                                            <button onclick="openDeleteArea(<?php echo $row['symptom_id'] ?>)" class="btn btn-sm btn-secondary mr-1" id="btnDelete" data="<?php echo $row['symptom_id'] ?>" data-toggle="tooltip" title="Delete">
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
                        <h3 class="block-title">Add New Symptom</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option" data-toggle="block-option" id="closeAdd">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                        <form method="post" id="symptomForm" enctype="multipart/form-data">
                                <span id="result"></span>
                            <div class="row">
                                <div class="col-md-6">      
                                        <label>Symptom Type</label>
                                        <select class="form-control" required name="symptom_type">
                                            <?php foreach ($symptom->fetch_symptom_types() as $row): ?>
                                                <option value="<?php echo $row['symptom_type_id'] ?>"><?php echo $row['symptom_type'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                </div>

                                <div class="col-md-6">      
                                        <label>Disease Symptom Belongs To</label>
                                        <select class="form-control" required name="disease">
                                            <?php foreach ($disease->fetch_diseases() as $row): ?>
                                                <option value="<?php echo $row['disease_id'] ?>"><?php echo $row['disease_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Symptom</label>
                                        <input type="text" class="form-control" required name="symptom" />
                                    </div>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Symptom Image</label>
                                        <input type="file" accept="image/*" class="form-control" required name="symptom_image" />
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
                        <h3 class="block-title">Edit symptom Details</h3>
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
                                        <label>Symptom</label>
                                        <input class="form-control" required name="symptom" id="editSymp" />
                                        <input type="hidden" name="symptom_id" id="SympId" />
                                    </div>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Symptoms Type</label>
                                        <select class="form-control" id="editType" required name="symptom_type">
                                            <?php foreach ($symptom->fetch_symptom_types() as $row): ?>
                                                <option value="<?php echo $row['symptom_type_id'] ?>"><?php echo $row['symptom_type'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">                                    
                                    <div class="form-group">
                                        <label>Corresponding Disease</label>
                                        <select class="form-control" id="editDisease" required name="disease">
                                            <?php foreach ($disease->fetch_diseases() as $row): ?>
                                                <option value="<?php echo $row['disease_id'] ?>"><?php echo $row['disease_name'] ?></option>
                                            <?php endforeach ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12">                                    
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-dark">Submit</button>
                                        <button type="button" class="closeEdit btn btn-dark">Cancel</button>
                                    </div>
                                </div>

                                <div id="editSpinner" class="col-sm-6 text-sm-right push"  style="display: none;">
                                    <i class="fa fa-user mr-10 fa-spin text-dark" style="font-size: 30px"></i> Loading.....
                                </div>
                            </div>
                        </form>
                    </div>
                </div> 




                <div class="block" id="viewArea" style="display: none;">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">View symptom Details</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="fullscreen_toggle"></button>
                            <button type="button" class="btn-block-option closeView" data-toggle="block-option">
                                <i class="si si-close"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content">
                            <div class="row px-2">

                                <div class="col-md-12 mb-4">                                    
                                    <h2 class="text-center" id="viewSymp"></h2>
                                </div>

                                <div class="col-md-6">        
                                        <h4>Symptoms Image</h4>
                                        <span id="viewImage"></span>
                                </div>

                                <div class="col-md-6">      
                                    <h4>Corresponding Disease</h4>
                                    <p id="viewDisease"></p>
                                    <input type="hidden" name="symptom_id" id="viewId">    
                                    <h4>Symptom Type</h4>
                                    <p id="viewType"></p>
  
                                </div>
                            </div>
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

        $('#symptomForm').submit(function(e){
            $('#editResult').html('');
            $('#result').html('');
            e.preventDefault();
            $.ajax({
                url:'ajax/add_symptom.php',
                type: 'POST',
                data : new FormData(this),
                contentType: false,
                processData: false,
                cache: false,
                beforeSend: function(){
                    $('#spinner').fadeIn();
                },
                success: function(data){
                    $('#result').html(data);
                    $('#spinner').hide();
                console.log(data);
                }
            })
        })


        function loadsymptomData(symptom_id){
            var res = null;
            $.ajax({
                url:'ajax/fetch_symptom.php',
                type: 'POST',
                data : {'symptom_id': symptom_id},
                beforeSend: function(){
                },
                success: function(data){
                    res = data;
                }
            })
            return res;
        }


        function openViewArea(symptom_id){
            $('#editResult').html('');
            $('#tableArea').hide();
            $('#viewArea').fadeIn();

            $.ajax({
                url:'ajax/fetch_symptom.php',
                type: 'POST',
                data : {'symptom_id': symptom_id},
                beforeSend: function(){
                },
                success: function(data){
                    var data = JSON.parse(data);
                    $('#viewSymp').text(data.symptom);
                    $('#viewType').text(data.symptom_type);
                    $('#viewImage').html('<img src="../symptoms/'+data.symptom_image+'" style="width:100%" />');
                    $('#viewDisease').text(data.disease_name);
                }
            })
        } 

        var d_id = 0;
        function openDeleteArea(symptom_id){
            $('#editResult').html('');
            $('#DeleteArea').fadeIn();
            d_id = symptom_id;
        } 

        $('#btnDeleteFinally').click(function(){
            var symptom_id = d_id;

            $.ajax({
                url:'ajax/delete_symptom.php',
                type: 'POST',
                data : {'symptom_id': symptom_id},
                beforeSend: function(){
                },
                success: function(data){
                    if(data == 1){
                        $('#a'+symptom_id).fadeOut();
                        $('#editResult').html('<div class="alert alert-success">Deleted Successfully</div>');
                        $('#DeleteArea').hide();
                    }
                    else{
                        $('#editResult').html(data);
                    }
                }
            })
        })


        function openEditArea(symptom_id){
            $('#editResult').html('');
            $('#tableArea').hide();
            $('#editArea').fadeIn();

            $.ajax({
                url:'ajax/fetch_symptom.php',
                type: 'POST',
                data : {'symptom_id': symptom_id},
                beforeSend: function(){
                },
                success: function(data){
                    var data = JSON.parse(data);
                    $('#editSymp').val(data.symptom);
                    $('#SympId').val(data.symptom_id);
                    $('#editType').prepend('<option selected="true" value ="'+data.symptom_type_id+'">'+data.symptom_type+'</option>');
                    $('#editDisease').prepend('<option selected="true" value ="'+data.disease_id+'">'+data.disease_name+'</option>');
                    // $('#editImage').html('<img src="../symptoms/'+data.symptom_image+'" style="width:100%" />');
                }
            })
        }    

        $('#editForm').submit(function(e){
            $('#result').html('');
            $('#editResult').html('');
            e.preventDefault();
            $.ajax({
                url:'ajax/edit_symptom.php',
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