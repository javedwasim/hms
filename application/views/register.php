<!DOCTYPE html>
<html>
<head>
  <title>Register a New Account | <?php echo SITE_TITLE_TEXT; ?></title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#367fa9"/>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="icon" href="<?php echo base_url('assets/dist/img/favicon.ico'); ?>" />
    <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/font-awesome/css/font-awesome.min.css'); ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/Ionicons/css/ionicons.min.css'); ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/dist/css/AdminLTE.min.css'); ?>">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/dist/css/skins/_all-skins.min.css'); ?>">
    <!-- Morris chart -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/morris.js/morris.css'); ?>">
    <!-- jvectormap -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/jvectormap/jquery-jvectormap.css'); ?>">
    <!-- Date Picker -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'); ?>">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/bootstrap-daterangepicker/daterangepicker.css'); ?>">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/font-awesome/css/font-awesome.min.css'); ?>">
    <link href="<?php echo base_url('/assets/bower_components/select2/dist/css/select2.css"'); ?> rel="stylesheet" />
    <link href="<?php echo base_url('/assets/plugins/iCheck/all.css"'); ?> rel="stylesheet" />
    <link href="<?php echo base_url('/assets/dist/css/custom.css"'); ?> rel="stylesheet" />
    <link href="<?php echo base_url('assets/dist/css/loader.css"'); ?> rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min'); ?>"</script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min'); ?>"</script>
    <![endif]-->
    <!-- Google Font -->
    <style>

        .register-page{
            background: url("<?php echo base_url('assets/dist/img/auth-bg.jpg'); ?>") no-repeat;
            background-position: center center;
            background-size: cover;
        }

    </style>
</head>

<body class="hold-transition register-page">

<div class="register-box">
    <div class="register-logo">
        <img style="width: 80px;" src="<?php echo base_url('assets/dist/img/logo.png'); ?>">
        <br>
        <h2>Department of Neurosurgery</h2>
        <h3>Hospital e-Management System</h3>
    </div>
  <div class="register-box-body">
    <p class="login-box-msg">Register a new account</p>
    <form action="<?php echo base_url('dashboard/register/'); ?>" method="post" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Full name" name="fullname" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        <div class="form-group has-feedback">
            <input type="text" class="form-control" placeholder="Designation" name="desig" required>
            <span class="glyphicon glyphicon-briefcase form-control-feedback"></span>
        </div>
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Retype password" name="password2" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-4">

          <button type="submit" class="btn btn-primary btn-block btn-flat"  name="register">Register</button>

        </div>

          <div class="col-xs-12">
          <br>
          <?php if(!empty($this->input->get("error") || !empty($this->input->get("success")))) {
//              echo "<br>";
          ?>
             <p>
                 <b><?php
                     if($this->input->get("success") == "true"){

                         echo "Registration successful, please";
                         echo "<a href=";
                         echo  base_url('dashboard/login');
                         echo ">";
                         echo "&nbsp; login";
                         echo "</a>";
                     }
                  elseif($this->input->get("error") == "true"){

                      echo "Registration failed, choose a different user name";
                  }
                  elseif ($this->input->get("error") == "password_mismatch"){

                      echo "Password mismatch, please retype your Password";
                  }
                  ?>
              </b>
              </p>
          <?php
            echo "<br>";
            }
          ?>
          </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="<?php echo base_url('dashboard/login'); ?>" class="text-center">I already have an account</a>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

<!-- jQuery 3 -->
<script src="<?php echo base_url('/assets/plugins/iCheck/icheck.min.js'); ?>"></script>
<!-- jQuery 3 -->
<script src="<?php echo base_url('/assets/bower_components/jquery/dist/jquery.min.js'); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('/assets/bower_components/jquery-ui/jquery-ui.min.js'); ?>"></script>
<script src="<?php echo base_url('/assets/bower_components/bootstrap/dist/js/bootstrap.min.js'); ?>"></script>
<!--<script>-->
<!--  $(function () {-->
<!--    $('input').iCheck({-->
<!--      checkboxClass: 'icheckbox_square-blue',-->
<!--      radioClass: 'iradio_square-blue',-->
<!--      increaseArea: '20%' // optional-->
<!--    });-->
<!--  });-->
<!--</script>-->

</body>
</html>
