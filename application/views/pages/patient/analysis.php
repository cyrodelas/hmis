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

    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/select2/css/select2.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css">



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
                        <a href="<?php echo base_url();?>dashboard-patient" class="nav-link">
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
                        <a href="<?php echo base_url();?>medical-history" class="nav-link ">
                            <i class="nav-icon fas fa-folder"></i>
                            <p>
                                Patient Medical History
                            </p>
                        </a>
                    </li>

                     <li class="nav-item">
                        <a href="<?php echo base_url();?>consultation" class="nav-link  active">
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

        <section class="content">
            <div class="container-fluid">
                <div class="row" style="background-color: #ffffff;">
                    <img src="<?php echo base_url();?>assets/images/data-analysis.gif" style=" display: block;margin-left: auto;margin-right: auto;width: 50%;">
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

<script src="<?php echo base_url();?>assets/template/plugins/select2/js/select2.full.min.js"></script>

<script src="<?php echo base_url();?>assets/template/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>

<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
        theme: 'bootstrap4'})

    })
</script>


</body>
</html>
