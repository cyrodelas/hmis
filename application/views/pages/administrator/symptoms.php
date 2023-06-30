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
        
        <a href="#" class="brand-link">
            <img src="<?php echo base_url();?>assets/images/favicon.png" alt="" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span style="color:maroon; font-size: .68em" class="brand-text font-weight-bold"> City Government of Cavite</span>
        </a>
        
        <div class="sidebar">
            
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?php echo base_url();?>assets/images/users/<?php echo $this->session->user_image;?>" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="#" class="d-block"><?php echo $this->session->user_fn;?> <?php echo $this->session->user_ln;?></a>
                </div>
                
                
            </div>
            
            <div class="form-inline">
                
            </div>
            
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                    <li class="nav-item">
                        <a href="<?php echo base_url();?>dashboard-admin" class="nav-link">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                               Dashboard
                            </p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>
                                Medicine Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>medicineinfo" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Medicine Information</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>incomingitems" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Incoming Stocks</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>outgoingitems" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Outgoing Stocks</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>stockstransfer" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Stocks Transfer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>physicalcount" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Physical Counting</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>doctors" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Doctors</p>
                                </a>
                            </li>
                             <li class="nav-item">
                                <a href="<?php echo base_url();?>healthworker" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Health Workers</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>patient" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Patients</p>
                                </a>
                            </li>
                            
                        </ul>
                    </li>

                    <li class="nav-item menu-open">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-wrench"></i>
                            <p>
                                File Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">

                            <li class="nav-item">
                                <a href="<?php echo base_url();?>naturev" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Nature of Visit</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>consultationt" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Consultation Type</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>symptoms" class="nav-link active">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Symptoms</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>examination" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Examinations</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>results" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Results</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>physician" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Physicians</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>speciality" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Speciality</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>medcategory" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Medicine Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>medtype" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Medicine Type</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo base_url();?>uom" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Unit of Measurement</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url();?>healthcenter" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Health Center</p>
                                </a>
                            </li>

                            <li class="nav-item">
                                <a href="<?php echo base_url();?>barangay" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Barangay</p>
                                </a>
                            </li>

                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-file"></i>
                            <p>
                                Report Management
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            
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
                        <a class="btn btn-primary" data-toggle="modal" data-target="#modal-lg"><i class="fas fa-plus"></i> New Symptoms Data</a>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">File Managment</a></li>
                            <li class="breadcrumb-item active">Symptoms</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <section class="content">
            <div class="container-fluid">
                
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            
                        <thead>
                            <tr>
                                <th>Control Number</th>
                                <th>Symptom Name</th>
                                <th>Option</th>
                            </tr>
                            </thead>
                            
                            

                            <tbody>
                                <?php
                                    if($symptomData){
                                        foreach ($symptomData as $rs) {
                                            ?>
                                            <tr>
                                                <td><?php echo sprintf("%05d",$rs->idNo);?></td>
                                                <td><?php echo $rs->sName;?></td>
                                                <th>
                                                    <a href="" class="load_modal_details" data-toggle="modal" data-target=".edit-carousel<?php echo $rs->idNo;?>"> edit</a>
                                                    |
                                                    <a href="Javascript:Delete_Carousel(<?php echo $rs->idNo;?>)"> remove</a>

                                                </th>
                                            </tr>
                                <?php   }
                                    }
                                    ?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Control Number</th>
                                <th>Symptom Name</th>
                                <th>Option</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>

            </div>
        </section>

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


</div>

<div class="modal fade" id="modal-lg">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">New Symptoms Data</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                <form method="post" id="frm_validation" action="<?php echo base_url();?>administrator/symptoms_add" data-toggle="validator" class="form-horizontal form-label-left" enctype="multipart/form-data">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="itemName">Name</label>
                            <input type="text" class="form-control" id="sName" name="sName" placeholder="Enter Symptoms Name">
                        </div>
                    
                        
                    </div>
                    
                    

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Save Information</button>
                    </div>
                    
                    
                </form>
    

                    
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
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    
  });
</script>

</body>
</html>
