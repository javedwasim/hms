<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Dashboard | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Hospital e-Management System Dashboard
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a data-href="dashboard/new_admission" class="small-box bg-aqua ahref" id="1" href="javascript:void(0)">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>

                            <p>New Admission</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </div>
                    </a>
                </div> <!-- New Admission -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a data-href="dashboard/view_patients" class="small-box bg-green ahref" id="2" href="javascript:void(0)">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>View Patient Records</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-user-md" aria-hidden="true"></i>
                        </div>

                    </a>
                </div> <!-- View Patient Records -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a data-href="dashboard/patient_chart" class="small-box bg-orange ahref" id="3" href="javascript:void(0)">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>History &amp; Patient Chart</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-file-text-o" aria-hidden="true"></i>
                        </div>

                    </a>
                </div> <!-- History AND Patient Chart -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a data-href="dashboard/patient_reports" class="small-box bg-red ahref" id="Radiology-Lab-Reports" href="javascript:void(0)">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>

                            <p>Radiology / Lab Reports</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-flask" aria-hidden="true"></i>
                        </div>

                    </a>
                </div> <!-- Tests -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a data-href="dashboard/operation_theatre" class="small-box bg-yellow ahref" id="4" href="javascript:void(0)">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>OT Bookings</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-address-book-o" aria-hidden="true"></i>
                        </div>
                    </a>
                </div> <!-- Pharmacy -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a data-href="dashboard/bedslist" class="small-box bg-purple ahref" href="javascript:void(0)" id="7">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>Ward/Room List</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bed" aria-hidden="true"></i>

                        </div>
                    </a>
                </div> <!-- Accounts -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('dashboard/discharge_patients'); ?>" class="small-box bg-teal">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>Discharge Patient</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>

                    </a>
                </div> <!-- Discharge Patient -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('dashboard/statistics'); ?>" class="small-box bg-maroon">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>Statistics</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bar-chart" aria-hidden="true"></i>
                        </div>
                    </a>
                </div> <!-- Reports -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('dashboard/view_prescription'); ?>" class="small-box navy bg-blue">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>Inventory</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>
                        </div>

                    </a>
                    <a href="<?php echo base_url('dashboard/master_list'); ?>" class="small-box bg-red">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>Master List</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </div>

                    </a>

                </div> <!-- Inventory -->
                <!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <a href="<?php echo base_url('dashboard/patient_account_details'); ?>" class="small-box bg-olive">
                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>Accounts</p>
                        </div>
                        <div class="icon">
                            <i class="fa  fa-dollar" aria-hidden="true"></i>
                        </div>
                    </a>
                    <a href="#" class="small-box bg-blue" style="background-color: #607D8B !important;">

                        <div class="inner">
                            <h3 style="opacity: .0">Head3</h3>
                            <p>About</p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-info-circle" aria-hidden="true"></i>
                        </div>

                    </a>
                </div> <!-- Master List -->
                <!-- ./col -->
                <div class="col-lg-6 col-xs-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Latest Announcements</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->

                        <div class="box-body">
                            <div id="example">
                                <ul>
                                    <?php $announcements = $this->model_hms->get_last_five_announcements();
                                    foreach ($announcements as $announcement) {
                                    ?>
                                    <li><?php 
                                    $datetime = date(' d-m-Y h:i a', strtotime($announcement['timestamp']));
                                    echo $datetime; ?> </li>
                                    <li>
                                        <?php echo htmlentities($announcement['ann_text']); ?>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>
                        </div>
                        <!-- /.box-body -->

                        <div class="box-footer">

                        </div>

                    </div>
                </div> <!-- Latest Announcements  -->

            </div>

            <!-- /.row -->
            <!-- Main row -->
            <!-- /.row (main row) -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; <?php echo date("Y"); ?> <a target="_blank" href="<?php echo SITEURL; ?>"><?php echo COMPANYNAME; ?></a>.</strong> All rights
        reserved.
    </footer>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
