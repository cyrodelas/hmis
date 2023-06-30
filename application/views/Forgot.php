
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Health Monitoring Information System</title>
    <link rel="shortcut icon" href="<?php echo base_url();?>assets/images/favicon.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css"> 
    <link rel="stylesheet" href="<?php echo base_url();?>assets/template/dist/css/adminlte.min.css?v=3.2.0">
</head>

<body class="hold-transition login-page" style="background-image: url('<?php echo base_url();?>assets/images/background.png');background-origin: initial;
    background-position: center center;
    background-repeat: no-repeat;
    background-size: cover;
    position: relative;">
    <div class="login-box">
        
        <div class="card card-outline card-danger">
            <div class="card-header text-center">
                <img style="width:100px; padding-bottom: 10px" src="<?php echo base_url();?>assets/images/favicon.png">
                <p style="font-weight:600">CITY GOVERNMENT OF CAVITE</p>
            </div>
            <div class="card-body">
                <p class="login-box-msg"><b>Health Monitoring Information System</b><br><br>You forgot your password? Here you can easily retrieve a new password.</p>
                <form action="recover-password.html" method="post">
                    <div class="input-group mb-3">
                        <input type="email" class="form-control" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-danger btn-block">Request new password</button>
                        </div>

                    </div>
                </form>
            </div>
        
        </div>

    </div>


    <script src="<?php echo base_url();?>assets/template/plugins/jquery/jquery.min.js"></script>

    <script src="<?php echo base_url();?>assets/template/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js?v=3.2.0"></script>
</body>
</html>
