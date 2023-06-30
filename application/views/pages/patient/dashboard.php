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
                        <a href="<?php echo base_url();?>dashboard-patient" class="nav-link active">
                            <i class="nav-icon fas fa-tachometer-alt"></i>
                            <p>
                               Dashboard
                            </p>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="<?php echo base_url();?>patient-information" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Patient Information
                            </p>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="<?php echo base_url();?>medical-history" class="nav-link">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Patient Medical History
                            </p>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="<?php echo base_url();?>consultation" class="nav-link">
                            <i class="nav-icon fas fa-handshake"></i>
                            <p>
                                Patient Consultation
                            </p>
                        </a>
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
                            
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        

        <section class="content">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>Data</h3>
                                <p>Title</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>Data</h3>
                                <p>Title</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3>Data</h3>
                                <p>Title</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-6">

                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>Data</h3>
                                <p>Title</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person"></i>
                            </div>
                            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-lg-6 col-6">
                        <div class="card ">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    Patient Appointments
                                </h3>
                            </div>

                            <div class="card-body pt-0">

                                <div id="calendar" style="width: 100%"></div>
                            </div>

                        </div>
                    </div>

                    <div class="col-lg-6 col-6">
                        <div class="card ">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    Appointment Details
                                </h3>
                            </div>

                            <div class="card-body pt-0">

                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>Date</th>
                                        <th>Nature of Visit</th>
                                        <th>Consultation Type</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>Date</th>
                                        <th>Nature of Visit</th>
                                        <th>Consultation Type</th> 
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
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

    $(function() {

        $('#calendar').fullCalendar({
            defaultView: 'month',

        });

    });

    $('#calendar').fullCalendar({
        viewRender: function(currentView) {
            var minDate = moment();
            var navigationContainer = currentView.el.parent().prev()
            var cantGoBefore = currentView.start <= minDate;

            $(".fc-prev-button", navigationContainer).prop('disabled', cantGoBefore);
            $(".fc-prev-button", navigationContainer).toggleClass('fc-state-disabled', cantGoBefore);
        },

        events: [

        ]
    });

</script>

<script>
  $(function () {
    $("#example1").DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
    
  });
</script>

</body>
</html>
