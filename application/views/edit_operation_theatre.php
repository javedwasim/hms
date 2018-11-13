<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';

if ($this->input->get("success") == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Operation theatre has been booked successfully!</div>';
}
?>
<html>
<head>
    <title>Edit Operation Theatre Booking | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Edit Operation Theatre Booking
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/operation_theatre/'); ?>"> Edit Operation Theatre Booking</a></li>
            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">
            <form action="<?php echo base_url('dashboard/update_ot_booking_db'); ?>" class="submit-form" method="post">
                <?php if (!empty($operation_list)) {
                    foreach ($operation_list as $op_key) { ?>
                        <input type="hidden" class="form-control" name="ot-booking-no"
                               value="<?php echo $op_key['otBookingNo']; ?>">
                        <div class="box  box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Operation Information</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Surgeon</label>
                                        <select class="form-control ot-surgeon" id="ot-surgeon-name" name="ot-surgeon-name"
                                                style="width: 100%;" required="required">
                                            <option></option>
                                            <?php $surgeon_list = $this->model_hms->get_surgeon_list(); ?>
                                            <?php if(!empty($surgeon_list)){
                                                foreach ($surgeon_list as $sl_key){ ?>
                                                    <option  value="<?php echo $sl_key['id']; ?>" <?php if($op_key['otSurgeon'] == $sl_key['id']){ echo "selected";} ?> ><?php echo $sl_key['full_name']; ?></option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Operation Theatre</label>
                                        <select required="required" class="form-control ot-ward" style="width: 100%;"
                                                name="ot-ward">
                                            <option></option>
                                            <?php $operation_theatre = $this->model_hms->get_operation_theatre_list(); ?>
                                            <?php if(!empty($operation_theatre)){
                                                foreach ($operation_theatre as $opt_key){ ?>
                                                    <option value="<?php echo $opt_key['otwardId']; ?>" <?php if($op_key['otWardNo'] == $opt_key['otwardId']){ echo "selected";} ?> ><?php echo $opt_key['otwardName']; ?></option>
                                            <?php    }
                                            } ?>
                                        </select>
                                    </div><!-- /.col -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">

                                        <label>Operation Procedure</label>
                                        <input required="required" class="form-control"
                                                style="width: 100%;"
                                                name="operation-type" placeholder="Type Operation Procedure" value="<?php echo $op_key['otOperationType']; ?>">
                                           
                                    </div><!-- /.col -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Patient Status</label>
                                        <input required="required" class="form-control"
                                                style="width: 100%;"
                                                name="patient-status" placeholder="Type Patient Status" value="<?php echo $op_key['otPatientStatus']; ?>">

                                    </div>
                                </div><!-- /.col -->

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Operation Date &amp; Time</label>
                                        <div class="input-group date bootstrap-timepicker timepicker">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <div class="col-md-6" style="padding: 0;">
                                            <input type="text" class="form-control pull-right" id="datepicker-ot"
                                                   name="opDateTime" autocomplete="off" placeholder="Set Date" value="<?php echo $op_key['otBookingDate']; ?>">
                                            </div>
                                            <div class="col-md-6" style="padding: 0;">
                                            <input type="text" class="form-control pull-right" id="timepicker1" name="opTime" placeholder="Set Time" value="<?php echo $op_key['otBookingTime']; ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group"></div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                                        <button type="submit" class="btn bg-blue margin custom-submit-btn"><i
                                                    class="fa fa-address-book-o" aria-hidden="true"></i>&nbsp; Update Operation
                                            Theatre Booking
                                        </button>
                                    </div>
                                </div><!-- /.col -->
                            </div>

                        </div>
                    <?php }
                } ?>
            </form>

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
