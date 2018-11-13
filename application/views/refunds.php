<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Refunds | <?php echo SITE_TITLE_TEXT; ?></title>
    <?php $this->load->view('header'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php $this->load->view('main_header'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Refunds
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/refunds/'); ?>"> Refunds</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Search Filters</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                        class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>MR# or Patient Name</label>
                                        <form name="search-by-name" id="search-account-by-name" method="get"
                                              action="<?php echo base_url('dashboard/refunds/'); ?>">
                                            <select class="account-patName-select form-control"
                                                    name="search_by_cnic"
                                                    style="width: 100%;" tabindex="4">
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($patient_list)) {
                foreach ($patient_list as $p_key) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $var = $this->model_hms->get_pat_pic($p_key['regNo']);
                            if(empty($var)){
                                $var = $this->model_hms->get_discharged_pat_pic($p_key['regNo']);
                            }
                            ?>
                            <div class="col-md-offset-11">
                                <img src="<?php echo base_url('assets/dist/img/patient_photo/'). $var->patient_pic_path; ?>" class="img-thumbnail">
                            </div>
                            <br>
                            <div class="box  box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Patient Information</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                    class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>MR#</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input id="user-name" type="hidden" value="<?php echo $this->authentication->read('fullname'); ?>" >
                                                        <input id="date-time" type="hidden" value="<?php
                                                        date_default_timezone_set("Asia/Karachi"); echo date('d-m-Y'). " ". date('h:i A'); ?>" >
                                                        <label id="reg-no"><?php echo $p_key['regNo']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>Disease</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label><?php echo $p_key['patDisease_id']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <label>Account No</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label id="account-no"><?php echo $account_list->patientAccountNo; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label><?php echo $p_key['patName']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>Ward Number</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label><?php $ward_list = $this->model_hms->get_ward_by_id($p_key['patward_id']); echo  $ward_list->wardName; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <label>Total Deposited Amount</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label id="total-deposited"><?php echo $account_list->totalDepositedAmount; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label><?php echo $p_key['patNoKType'] ?></label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label><?php echo $p_key['patNoK']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>Bed Number</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label><?php
												//echo $p_key['patbed_id'];
												$bedNo = $this->model_hms->get_bed_name_wrt_ward($p_key['patbed_id']);
												if($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed")
												{
                                                  echo "Extra Bed " .$bedNo->bed;
												}
												else{
												 echo $bedNo->bed;
												}
												   ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <label>Running Bill</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label><?php echo $account_list->runningBill; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>Sex</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label><?php echo $p_key['patSex']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>Admission Date</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label><?php echo $p_key['patAdmDate'] ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <label>Remaining Balance</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label id="remaining-balance"><?php echo $account_list->remainingAmount - $account_list->refundableAmount + $account_list->discount; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>Contact No</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label><?php echo $p_key['patPhone']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>Admission Status</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <input type="hidden" id="is-invoice-generated" value="<?php echo $account_list->isInvoiceGenerated; ?>">
                                                        <label id="admission-status"><?php if (isset($p_key['discharge_id'])) {
                                                                echo "Discharged";
                                                            } else {
                                                                echo "Admitted";
                                                            } ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <label>Refunded Amount</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label id="refunded-amount"><?php echo $account_list->refundableAmount; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label></label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label></label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <label></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <label>Refundable Amount</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label id="refundable-amount"><?php echo $account_list->remainingAmount - $account_list->refundableAmount + $account_list->discount; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-xs-12 col-md-offset-10">
                                                        <button type="button" class="btn btn-primary btn-flat " id="refunds-submit">&nbsp;&nbsp;<i
                                                                    class="fa fa-undo" aria-hidden="true"></i>&nbsp;&nbsp; Refund &nbsp;&nbsp;
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
            <div class="modal fade" tabindex="-1" role="dialog" id="advance-payment-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Advanced Amount Information</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Advanced Amount (Rs)</label>
                                    </div>
                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <input class="form-control" id="advance-amount"
                                               name="advance-amount-name"
                                               style="width: 100%;" placeholder="Enter Amount"
                                               required="required">
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <br>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-flat" id="add-advance-payment-submit"><i
                                        class="fa fa-plus" aria-hidden="true"> </i>&nbsp; Add Advance Payment
                                </button>
                            </div>
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
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
        <strong>Copyright &copy;  <?php echo date("Y"); ?> <a target="_blank" href="<?php echo SITEURL; ?>"><?php echo COMPANYNAME; ?></a>.</strong> All rights
        reserved.
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
