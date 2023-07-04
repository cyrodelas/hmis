<?php if (!isset($_SESSION['user_role'])) {
    redirect('admin', 'refresh');
} ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Health Monitoring Information System</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/jqvmap/jqvmap.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/summernote/summernote-bs4.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">

    <!-- FullCalendar CSS -->
    <link rel="stylesheet" href="<?php echo base_url();?>/assets/plugins/calendar/fullcalendar.min.css">
    <link rel="stylesheet" media='print' href="<?php echo base_url();?>/assets/plugins/calendar/fullcalendar.print.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed ">
<div class="wrapper">

    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__shake" src="<?php echo base_url();?>assets/images/favicon.png" alt="HMIS" height="60" width="60">
    </div>

    <nav class="main-header navbar navbar-expand navbar-white navbar-light">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <ul class="navbar-nav ml-auto">
            
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-comments"></i>
                    
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    
                    <div class="dropdown-divider"></div>
                    
                    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
                </div>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    
                    <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
            
        </ul>
    </nav>
    
    
    <aside class="main-sidebar sidebar-light-primary elevation-4">
        
        <a href="index3.html" class="brand-link">
            <img src="<?php echo base_url();?>assets/images/favicon.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span style="color:maroon; font-size: .68em" class="brand-text font-weight-bold"> City Government of Cavite</span>
        </a>
        
        <div class="sidebar">
            
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                
                <div class="image">
                    <img style="width: 60px; margin-right:5px" src="<?php echo base_url();?>assets/images/users/<?php echo $this->session->user_image;?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" style="font-weight:600" class="d-block"><?php echo $this->session->user_fn;?> <?php echo $this->session->user_ln;?> <br> <span style="font-size:14px"><?php echo $this->session->user_role;?></span></a>
                </div>
                
                
            </div>
            
            <div class="form-inline">
                
            </div>
            
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="<?php echo base_url();?>dashboard-hw" class="nav-link ">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                               Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link active">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Patient Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>patientInformation" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Patient Information</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>patientConsultation" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Patient Consultation</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                
                

                    
                
                </ul>
            </nav>

        </div>

    </aside>

    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0"></h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?php echo base_url();?>patientInformation">Patient Information</a></li>
                            <li class="breadcrumb-item active">Add Records</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        
        <form method="post" id="frm_validation" action="<?php echo base_url();?>healthworker/addPatientData" data-toggle="validator" class="form-horizontal form-label-left" enctype="multipart/form-data">
                       
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card">
                            
                            <div class="card-header">
                                <h3 class="card-title" style="font-weight:600; font-size: 1em">PATIENT INFORMATION</h3>      
                                
                            </div>

                            

                            <div class="card-body">
                                
                                
                                <div class="row">

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="itemName">Last Name</label>
                                            <input style="text-transform:uppercase" type="text" class="form-control" id="itemName" placeholder="Enter Last Name" name="patientLastName" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="itemDescription">First Name</label>
                                            <input style="text-transform:uppercase" type="text" class="form-control" id="itemDescription" placeholder="Enter First Name" name="patientFirstName" >
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="itemDescription">Middle Name</label>
                                            <input style="text-transform:uppercase" type="text" class="form-control" id="itemDescription" placeholder="Enter Middle Name" name="patientMiddleName" >
                                        </div> 
                                    </div>


                                    <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="itemDescription">House No / Lot  No</label>
                                            <input style="text-transform:uppercase" type="text" class="form-control" id="itemDescription" placeholder="Enter House No / Lot  No" name="patientHouseNo" >
                                        </div> 
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="itemDescription">Street Name</label>
                                            <input style="text-transform:uppercase" type="text" class="form-control" id="itemDescription" placeholder="Enter Street Name" name="patientStreet" >
                                        </div> 
                                    </div>

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="itemCategory">Barangay</label>
                                            <select class="custom-select form-control" id="itemCategory" name="patientBrgy">
                                                <option disabled selected hidden value=""> -- Select Barangay -- </option>
                                                <?php foreach($bgData as $rsBrgy){ ?>
                                                    <option><?php echo $rsBrgy->hcName; ?></option>
                                                <?php }?>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="itemDescription">Health Center</label>
                                            <input readonly type="text" class="form-control" id="itemDescription" placeholder="" name="patientHC" value="<?php echo $this->session->user_HW;?>">
                                        </div> 
                                    </div>

                                                            
                                    <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="itemDescription">City / Municipality </label>
                                            <input readonly type="text" class="form-control" id="itemDescription" name="patientCity" value="CAVITE CITY">
                                        </div> 
                                    </div>

                                    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="itemGroup">Sex</label>
                                            <select class="custom-select form-control" id="itemGroup" name="patientSex">
                                                <option disabled selected hidden value=""> -- Select Sex --</option>
                                                <option>MALE</option>
                                                <option>FEMALE</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Birth Date</label>
                                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                                <input type="text" id="dob" class="form-control datetimepicker-input" data-target="#reservationdate" name="patientBirthDate" >
                                                <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                                    <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>

                                    <div class="col-md-1">
                                            <div class="form-group">
                                            <label for="itemDescription">Age</label>
                                            <input disabled type="text" class="form-control" id="patientAge" placeholder="" >
                                        </div> 
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="itemDescription">Birth Place</label>
                                            <input style="text-transform:uppercase" type="text" class="form-control" id="itemDescription" placeholder="Enter Birth Place" name="patientBirthPlace" >
                                        </div> 
                                    </div>

                                    

                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="itemGroup">Civil Status</label>
                                            <select class="custom-select form-control" id="itemGroup" name="patientCivilStatus">
                                                <option disabled selected hidden value=""> -- Select Civil Status --</option>
                                                <option>SINGLE</option>
                                                <option>MARRIED</option>
                                                <option>DIVORCED</option>
                                                <option>SEPARATED</option>
                                                <option>WIDOWED</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label for="itemCategory">Religion</label>
                                            <select class="custom-select form-control" id="itemCategory" name="patientReligion">
                                                <option disabled selected hidden value=""> -- Select Religion -- </option>
                                                <?php foreach($relData as $rsRel){ ?>
                                                    <option><?php echo strtoupper($rsRel->religionName); ?></option>
                                                <?php }?>
                                                
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="itemDescription">Occupation</label>
                                            <input style="text-transform:uppercase" type="text" class="form-control" id="itemDescription" placeholder="Enter Occupation" name="patientOccupation" >
                                        </div> 
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="itemDescription">Contact Number</label>
                                            <input style="text-transform:uppercase" type="text" class="form-control" id="itemDescription" placeholder="Enter Contact Number" name="patientContactNum" >
                                        </div> 
                                    </div>

                                    <div class="col-md-4">
                                            <div class="form-group">
                                            <label for="itemDescription">Email Address</label>
                                            <input type="text" class="form-control" id="itemDescription" placeholder="Enter Email Address" name="patientEmailAdd" >
                                        </div> 
                                    </div>

                                    
                                </div>        
                                            
                            </div>

                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="card">
                            
                            <div class="card-header">
                                <h3 class="card-title" style="font-weight:600; font-size: 1em">PATIENT IMAGE</h3>      
                            </div>

                            <div class="card-body">
                            
                                <img id="userPic" class="img-responsive pt-2 " style="width:100%" src="<?php echo base_url();?>assets/images/patient/user.png">
                                        
                                <div class="form-group pb-2">    
                                    <label for="exampleInputFile"></label>
                                    <div class="input-group">
                                    
                                        <input type="file" class="" id="file" accept="image/*" onchange="return fileValidation()" name="Filename"/>
                                    
                                    </div>
                                </div>
                                
                                <button  type="submit" class="btn btn-primary " style="width:100%; margin-bottom:8px">SAVE PATIENT INFORMATION</button>
                                
                            </div>

                        </div>
                    </div>

                </div>

            </div>

        </section>
        </form>
        

    </div>

    <footer class="main-footer">
        <strong>Copyright &copy; 2022-2023 <a href="#"></a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block">
            <b>Version</b> 3.2.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>


    <div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Patient Information</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="itemName">Last Name</label>
                                    <input type="text" class="form-control" id="itemName" placeholder="Enter Last Name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="itemDescription">First Name</label>
                                    <input type="text" class="form-control" id="itemDescription" placeholder="Enter First Name">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="itemDescription">Middle Name</label>
                                    <input type="text" class="form-control" id="itemDescription" placeholder="Enter Middle Name">
                                </div> 
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="itemDescription">Birth Date</label>
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                </div> 
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="itemDescription">Age</label>
                                    <input disabled type="text" class="form-control" id="itemDescription" placeholder="">
                                </div> 
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="itemDescription">Birth Place</label>
                                    <input type="text" class="form-control" id="itemDescription" placeholder="Enter Birth Place">
                                </div> 
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="itemGroup">Sex</label>
                                    <select class="custom-select form-control" id="itemGroup"">
                                        <option hidden>-- Select Sex -- </option>
                                        <option>Male</option>
                                        <option>Female</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="itemCategory">Religion</label>
                                    <select class="custom-select form-control" id="itemCategory">
                                        <option>-- Select Religion -- </option>
                                    </select>
                                </div>
                            </div>
                            
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="itemDescription">Contact Number</label>
                                    <input type="text" class="form-control" id="itemDescription" placeholder="Enter Contact Number">
                                </div> 
                            </div>
                            
                            <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="itemDescription">City / Municipality </label>
                                    <input disabled type="text" class="form-control" id="itemDescription" value="Cavite City">
                                </div> 
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="itemCategory">Barangay</label>
                                    <select class="custom-select form-control" id="itemCategory">
                                        <option>-- Select Barangay -- </option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-4">
                                    <div class="form-group">
                                    <label for="itemDescription">House No / Lot  No</label>
                                    <input type="text" class="form-control" id="itemDescription" placeholder="Enter House No / Lot  No">
                                </div> 
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Patient Image</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Upload</span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>        
                          
                        <div class="row">    
                            <div class="col-md-12 text-right">
                                    <button type="submit" class="btn btn-primary ">Save Patient Information</button>
                                    <button type="submit" class="btn btn-danger" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    
                    </form>
                    
                </div>
            </div>
        
        </div>

    </div>

</div>


<script src="<?php echo base_url();?>assets/template/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/jquery-ui/jquery-ui.min.js"></script>
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="<?php echo base_url();?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?php echo base_url();?>assets/template/plugins/sparklines/sparkline.js"></script>

<script src="<?php echo base_url();?>assets/template/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="<?php echo base_url();?>assets/template/plugins/jquery-knob/jquery.knob.min.js"></script>


<script src="<?php echo base_url();?>assets/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/daterangepicker/daterangepicker.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/summernote/summernote-bs4.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.js?v=3.2.0"></script>

<script src="<?php echo base_url();?>assets/template/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/template/plugins/fullcalendar/main.js"></script>

<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>

<script src="<?php echo base_url();?>assets/template/dist/js/pages/dashboard.js"></script>

<script>
//  $(window).on('load', function() {
//    $('#modal-lg').modal('show');
//  });
</script>

<script src='<?php echo base_url();?>/assets/plugins/calendar/moment.min.js'></script>
<script src='<?php echo base_url();?>/assets/plugins/calendar/fullcalendar.min.js'></script>


<script src="<?php echo base_url();?>/assets/template/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/jszip/jszip.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>/assets/template/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $('#reservationdate').datetimepicker({
        format: 'YYYY-MM-DD'
    });

    $("#reservationdate").on("change.datetimepicker", ({date}) => {
        
        var dob = date;
        var today = new Date();
        var dayDiff = Math.ceil(today - dob) / (1000 * 60 * 60 * 24 * 365);
        var age = parseInt(dayDiff);
        console.log(dob);
        console.log(today);
        $('#patientAge').val(age);

    });


    function fileValidation(){
        var fileInput = document.getElementById('file');
        var filePath = fileInput.value;
        var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
        if(!allowedExtensions.exec(filePath)){
            alert('Image file only allowed.');
            fileInput.value = '';
            return false;
        }

    }

    function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#userPic').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
  
        }
    }

    $("#file").change(function(){
        readURL(this);
    });


</script>

</body>
</html>
