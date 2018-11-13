<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Edit Side Room Cost | <?php echo SITE_TITLE_TEXT; ?></title>
    <?php $this->load->view('header'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php $this->load->view('main_header'); ?> <!-- Left side column. contains the logo and sidebar -->

    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Edit Side Room Cost
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('/dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('/dashboard/master_list/'); ?>">Master List</a></li>
                <li><a href="<?php echo base_url('/dashboard/update_side_room_cost/'); ?>">Edit Side Room Cost</a></li>
            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box  box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Side Room Cost</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">

                                <div class="form-group">
                                    <label>Current Side Room Cost: </label>
                                    <input class="form-control" id="side-room-rate-textbox" required="required" type="text" name="rate"
                                           placeholder="Type Side Room Cost..." value="<?php if(!empty($rate)) { foreach ($rate as $item) { echo $item['rate']; } } ?>">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-block btn-primary update-side-room" value="Update Side Room Cost">
                                </div>
                        </div>
                        <div class="col-md-3"></div>
                    </div><!-- /.col -->
                </div>
            </div>

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; <?php echo date("Y"); ?> <a target="_blank"
                                                             href="<?php echo SITEURL; ?>"><?php echo COMPANYNAME; ?></a>.</strong>
        All rights
        reserved.
    </footer>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
