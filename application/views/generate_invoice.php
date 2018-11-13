<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';

?>
<html>
<head>
    <title>Generate Invoice | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Generate Invoice
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/generate_invoice/'); ?>"> Generate Invoice</a></li>
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
                                              action="<?php echo base_url('dashboard/generate_invoice/'); ?>">
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
                                    <div class="row invoice-border">
                                        <div class="col-md-3 ">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-4">
                                                        <strong>MR#</strong>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <input id="user-name" type="hidden" value="<?php echo $this->authentication->read('fullname'); ?>" >
                                                        <input id="date-time" type="hidden" value="<?php
                                                        date_default_timezone_set("Asia/Karachi"); echo date('d-m-Y'). " ". date('h:i A'); ?>" >
                                                        <p id="reg-no"><?php echo $p_key['regNo']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <strong>Disease</strong>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p><?php $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']); echo $disease->disease_name; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <strong>Account No</strong>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="hidden" id="pat-account-no" value="<?php echo $account_list->patientAccountNo; ?>">
                                                        <p id="account-no"><?php echo $account_list->patientAccountNo; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row invoice-border">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-4">
                                                        <strong>Name</strong>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo $p_key['patName']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <strong>Ward Number</strong>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p><?php $ward_list = $this->model_hms->get_ward_by_id($p_key['patward_id']); echo  $ward_list->wardName; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <strong>Total Deposited Amount</strong>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p id="total-deposited"><?php echo $account_list->totalDepositedAmount; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row invoice-border">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-4">
                                                        <strong><?php echo $p_key['patNoKType'] ?></strong>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo $p_key['patNoK']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <strong>Bed Number</strong>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p><?php
												//echo $p_key['patbed_id'];
												$bedNo = $this->model_hms->get_bed_name_wrt_ward($p_key['patbed_id']);
												if($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed")
												{
                                                  echo "Extra Bed " .$bedNo->bed;
												}
												else{
												 echo $bedNo->bed;
												}
												   ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <strong>Running Bill</strong>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <p id="running-bill"><?php echo $account_list->runningBill; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row invoice-border">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-4">
                                                        <strong>Sex</strong>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo $p_key['patSex']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <strong>Admission Date</strong>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p><?php echo $p_key['patAdmDate'] ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <strong>Remaining Balance</strong>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <?php if($p_key['FreeCarePatient'] == 1){?>
                                                            <p id="remaining-balance"><?php echo $account_list->totalDepositedAmount; ?></p>
                                                        <?php }else {?>
                                                        <p id="remaining-balance"><?php echo $account_list->remainingAmount; ?></p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row invoice-border">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-4">
                                                        <strong>Contact</strong>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <p><?php echo $p_key['patPhone']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <strong>Admission Status</strong>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p id="admission-status"><?php if (isset($p_key['discharge_id'])) {
                                                                echo "Discharged";
                                                            } else {
                                                                echo "Admitted";
                                                            } ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-7">
                                                        <strong>Discount</strong>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="hidden" id="is-invoice-generated" value="<?php echo $account_list->isInvoiceGenerated; ?>">
                                                        <?php if ($p_key['FreeCarePatient'] == 1 && $account_list->isInvoiceGenerated == 0) { ?>
                                                        <input id="discount-amount" name="discount-amount" required="required" value="<?php echo $account_list->runningBill; ?>" type="hidden">
                                                        <p> 100% </p>
                                                        <?php } elseif ($account_list->isInvoiceGenerated == 0) { ?>
                                                        <input class="form-control discount-textbox" id="discount-amount" name="discount-amount" required="required" type="text">
                                                        <?php } else { ?>
                                                        <p> <?php echo $account_list->discount; ?> </p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row invoice-border">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
													<?php  if($p_key['FreeCarePatient'] == 1){ ?>
                                                        <label>Free Care</label>
													<?php } ?>
                                                    </div>
                                                    <div class="col-md-7">
													<?php  if($p_key['FreeCarePatient'] == 1){ ?>
													<span class="label label-primary custom-span" id="color-available">
                                           <label> <?php echo "Free"; ?></label>
													</span> <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-5">
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
                                                        <strong>Refundable Amount</strong>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <?php if ($p_key['FreeCarePatient'] == 1) { ?>
                                                            <p id="refundable-amount"><?php echo $account_list->totalDepositedAmount; ?></p>
                                                        <?php } else {?>
                                                        <p id="refundable-amount"><?php echo $account_list->totalDepositedAmount - $account_list->runningBill + $account_list->discount; ?></p>
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                   
                                    <br>
                                    <div class="row invoice-border">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-xs-12 col-md-offset-8">
                                                        <button type="button" class="btn btn-primary btn-flat " style="margin-bottom:1px;" id="generate-invoice-submit"><i class="fa fa-file-text-o" aria-hidden="true"></i>&nbsp; Generate Invoice </button> &nbsp; <button type="button" class="btn btn-primary btn-flat" id="print-generate-invoice-submit"><i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print & Generate Invoice
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
