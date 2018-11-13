<!DOCTYPE html>
<html>
<head>
    <title>Login | <?php echo SITE_TITLE_TEXT; ?></title>
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
    <!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
    <style>

             .login-page{
                 background: url("<?php echo base_url('assets/dist/img/auth-bg.jpg'); ?>") no-repeat;
                 background-position: center center;
                 background-size: cover;
                 overflow: hidden;
             }
             @media (max-width: 767px) {
                 .login-page{
                     overflow: hidden !important;
                 }
             }
    </style>
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
      <img style="width: 80px;" src="<?php echo base_url('assets/dist/img/logo.png'); ?>">
      <br>
      <h2>Department of Neurosurgery</h2>
      <h3>Hospital e-Management System</h3>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body" id="shaker">
  <p class="login-box-msg">Sign in to start your session</p>
  <?php if($this->input->get('error') == "true" ) { ?>
	<div class="callout custom-callout"
                <p>Wrong Username or Password, please sign-in again.</p>
              </div>
  <?php } ?>
    <form action="<?php echo base_url('dashboard/login'); ?>" method="post" name="form1" enctype="multipart/form-data">
      <div class="form-group has-feedback">
        <input type="text" name="username" class="form-control" placeholder="Username" required>
          <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="password" class="form-control" placeholder="Password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
          <div class="checkbox icheck">
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="<?php echo base_url('dashboard/register'); ?>" class="text-center">Register a new account</a>

  </div>
  <!-- /.login-box-body -->
</div>
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

  <?php if($this->input->get('error') == "true" ) { ?>
  <script>
jQuery.fn.shake = function(intShakes, intDistance, intDuration) {
    this.each(function() {
        $(this).css("position","relative"); 
        for (var x=1; x<=intShakes; x++) {
        $(this).animate({left:(intDistance*-1)}, (((intDuration/intShakes)/4)))
    .animate({left:intDistance}, ((intDuration/intShakes)/2))
    .animate({left:0}, (((intDuration/intShakes)/4)));
    }
  });
return this;
};
$("#shaker").shake(5,7,800);
</script>
 <?php } ?>


</body>
</html>
