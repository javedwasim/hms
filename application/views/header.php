<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="theme-color" content="#367fa9"/>
<!-- Tell the browser to be responsive to screen width -->
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<!-- Bootstrap 3.3.7 -->
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
<link href="<?php echo base_url('/assets/dist/css/jasny-bootstrap.min.css"'); ?> rel="stylesheet" />
<link href="<?php echo base_url('/assets/dist/css/ekko-lightbox.css"'); ?> rel="stylesheet" />
<link href="<?php echo base_url('assets/dist/css/loader.css"'); ?> rel="stylesheet" />
<link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css'); ?>">
<!-- binni code start here -->
<link rel="icon" href="<?php echo base_url('assets/dist/img/favicon.ico'); ?>" />
<link href="<?php echo base_url('/assets/plugins/timepicker/bootstrap-timepicker.min.css'); ?>" rel="stylesheet" />
<!-- toster alerts -->
<link href="<?php echo base_url(); ?>assets/plugins/toster/build/toastr.min.css" rel="stylesheet">
<!-- binni code end here -->
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min'); ?>"</script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min'); ?>"</script>
<![endif]-->
<!-- Google Font -->
<!--<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">-->
<?php
if ($this->authentication->is_loggedin())
{
    $user_id = $this->authentication->read('fullname');
    //print_r($this->session->all_userdata());
//echo $user_id;
} else {
   // header('location:'. base_url('dashboard/login'));

        redirect(base_url('dashboard/login'));

}
?>
<script>
        var site_url = '<?php echo site_url(); ?>/';
        var base_url = '<?php echo base_url(); ?>';
</script>

<div id="spinner" class="spinner" style="display:none;">
    <img id="img-spinner" src="<?php echo base_url(); ?>assets/uploads/images/spinner.gif" alt="Loading"/>
</div>