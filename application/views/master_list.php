<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Master List | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Master List
                <small></small>
            </h1>
            <ol class="breadcrumb">
                  <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('/dashboard/master_list/'); ?>"> Master List</a></li>


            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-12">
            <a class="btn btn-app" href="<?php echo base_url('dashboard/users'); ?>">
                <span class="badge bg-purple"><?php echo $user_count[0]->counter; ?></span>
                <i class="fa fa-users"></i> Users
            </a>
            <a class="btn btn-app" href="<?php echo base_url('dashboard/user_privileges'); ?>">
                <i class="fa fa-unlock-alt"></i> User Privileges
            </a>
                <a class="btn btn-app" href="<?php echo base_url('dashboard/wards_list'); ?>">
                    <i class="fa fa-pencil-square-o"></i> Edit Ward List
                </a>
                <a class="btn btn-app" href="<?php echo base_url('dashboard/ot_wards_list'); ?>">
                    <i class="fa fa-pencil-square-o"></i> Edit OT Ward List
                </a>
                <a class="btn btn-app" href="<?php echo base_url('dashboard/permanent_bedslist'); ?>">
                    <i class="fa fa-bed"></i> Edit Permanent Beds
                </a>
                <a class="btn btn-app" href="<?php echo base_url('dashboard/add_expense_category'); ?>">
                    <i class="fa fa-money" aria-hidden="true"></i> Add Expense Category
                </a>
                <a class="btn btn-app" href="<?php echo base_url('dashboard/update_side_room_cost'); ?>">
                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit Side Room Cost
                </a>
            </div>


        </section>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy;  <?php echo date("Y"); ?> <a target="_blank" href="<?php echo SITEURL; ?>"><?php echo COMPANYNAME; ?></a>.</strong> All rights
        reserved.
    </footer>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
