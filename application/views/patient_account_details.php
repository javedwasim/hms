<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
if ($this->input->get("success") == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Advance payment has been added successfully.</div>';
}
?>
<html>
<head>
    <title>Account Details | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Account Details
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/patient_account_details/'); ?>"> Account Details</a></li>
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
                                              action="<?php echo base_url('dashboard/patient_account_details/'); ?>">
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
                            if (empty($var)) {
                                $var = $this->model_hms->get_discharged_pat_pic($p_key['regNo']);
                            } ?>
                            <div class="col-md-offset-11">
                                <img src="<?php echo base_url('assets/dist/img/patient_photo/') . $var->patient_pic_path; ?>"
                                     class="img-thumbnail">
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
                                                        <input id="user-name" type="hidden"
                                                               value="<?php echo $this->authentication->read('fullname'); ?>">
                                                        <input id="date-time" type="hidden" value="<?php
                                                        date_default_timezone_set("Asia/Karachi");
                                                        echo date('d-m-Y') . " " . date('h:i A'); ?>">
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
                                                        <label><?php $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']);
                                                            echo $disease->disease_name; ?></label>
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
                                                        <label><?php $ward_list = $this->model_hms->get_ward_by_id($p_key['patward_id']);
                                                            echo $ward_list->wardName; ?></label>
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
                                                        <label>
                                                            <?php
                                                            //echo $p_key['patbed_id'];
                                                            $bedNo = $this->model_hms->get_bed_name_wrt_ward($p_key['patbed_id']);
                                                            if ($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed") {
                                                                echo "Extra Bed " . $bedNo->bed;
                                                            } else {
                                                                echo $bedNo->bed;
                                                            }
                                                            ?>
                                                        </label>
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
                                                        <?php if ($p_key['FreeCarePatient'] == 1 && $account_list->isInvoiceGenerated == 0) { ?>
                                                            <label id="remaining-balance"><?php echo $account_list->totalDepositedAmount; ?></label>
                                                        <?php } else { ?>
                                                            <label id="remaining-balance"><?php echo $account_list->remainingAmount - $account_list->refundableAmount + $account_list->discount; ?></label>
                                                        <?php } ?>
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
                                                        <label><?php if (isset($p_key['discharge_id'])) {
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
                                                        <label>Refund Amount</label>
                                                    </div>
                                                    <div class="col-md-5">
                                                        <label><?php echo $account_list->refundableAmount; ?></label>
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
                                                        <?php if ($p_key['FreeCarePatient'] == 1) { ?>
                                                            <label>Free Care</label>
                                                        <?php } ?>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <?php if ($p_key['FreeCarePatient'] == 1) { ?>
                                                            <span class="label label-primary custom-span"
                                                                  id="color-available">
                                           <label> <?php echo "Free"; ?></label>
													</span> <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box  box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Payments & Expenses</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                    class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-6"></div>
                                        <div class="col-md-6">
                                            <button type="button"
                                                    class="btn bg-blue pull-right btn-flat advance-payment-submit-btn" <?php if ($account_list->isInvoiceGenerated == 1) {
                                                echo "disabled";
                                            } ?> >&nbsp;<i
                                                        class="fa fa-plus"></i> &nbsp; Advance Payment &nbsp;&nbsp;
                                            </button>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="box  box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Expense Details</h3>
                                                    <div class="box-tools pull-right">
                                                    </div>
                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="box-body">
                                                            <div id="example2_wrapper"
                                                                 class="dataTables_wrapper form-inline dt-bootstrap">
                                                                <div class="row">
                                                                    <div class="col-sm-6"></div>
                                                                    <div class="col-sm-6"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12" style="overflow-y: auto;">
                                                                        <table class="table table-bordered table-hover "
                                                                               role="grid"
                                                                               aria-describedby="example2_info">
                                                                            <thead>
                                                                            <tr role="row">
                                                                                <th class="sorting_asc" tabindex="0"
                                                                                    aria-controls="example2"
                                                                                    rowspan="1" colspan="1"
                                                                                    aria-sort="ascending"
                                                                                    aria-label="Rendering engine: activate to sort column descending">
                                                                                    Sr. No
                                                                                </th>
                                                                                <th class="sorting_asc" tabindex="0"
                                                                                    aria-controls="example2"
                                                                                    rowspan="1" colspan="1"
                                                                                    aria-sort="ascending"
                                                                                    aria-label="Rendering engine: activate to sort column descending">
                                                                                    Date & Time
                                                                                </th>
                                                                                <th class="sorting" tabindex="0"
                                                                                    aria-controls="example2"
                                                                                    rowspan="1" colspan="1"
                                                                                    aria-label="Browser: activate to sort column ascending">
                                                                                    Description
                                                                                </th>
                                                                                <th class="sorting" tabindex="0"
                                                                                    aria-controls="example2"
                                                                                    rowspan="1" colspan="1"
                                                                                    aria-label="Platform(s): activate to sort column ascending">
                                                                                    Amount
                                                                                </th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php if (!empty($expense_list)) {
                                                                                $srNo = 0;
                                                                                foreach ($expense_list as $el_key) {
                                                                                    $srNo++; ?>
                                                                                    <tr role="row" class="odd">
                                                                                        <td><?php echo $srNo; ?></td>
                                                                                        <td><?php echo $el_key['expenseDate'] . " " . $el_key['expenseTime']; ?></td>
                                                                                        <td><?php echo $el_key['expenseDescription']; ?></td>
                                                                                        <td><?php echo $el_key['expenseAmount']; ?></td>
                                                                                    </tr>
                                                                                <?php }
                                                                            } ?>
                                                                            </tbody>
                                                                            <tfoot>

                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="dataTables_info" id="example2_info"
                                                                             role="status"
                                                                             aria-live="polite">
                                                                            <div class="col-md-6 pull-right">
                                                                                <div class="dataTables_wrapper form-inline dt-bootstrap">
                                                                                    <table class="table">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <th>Total Expense:</th>
                                                                                            <td><?php echo $expense_sum->expenseSum; ?></td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div><!-- /.col -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="box box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Advance Payments</h3>
                                                    <div class="box-tools pull-right">
                                                    </div>
                                                </div><!-- /.box-header -->
                                                <div class="box-body">
                                                    <div class="row">
                                                        <div class="box-body">
                                                            <div id="example2_wrapper"
                                                                 class="dataTables_wrapper form-inline dt-bootstrap">
                                                                <div class="row">
                                                                    <div class="col-sm-6"></div>
                                                                    <div class="col-sm-6"></div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-sm-12" style="overflow-y: auto;">
                                                                        <table id="payment-table"
                                                                               class="table table-bordered table-hover "
                                                                               role="grid"
                                                                               aria-describedby="example2_info">
                                                                            <thead>
                                                                            <tr role="row">
                                                                                <th class="sorting_asc" tabindex="0"
                                                                                    aria-controls="example2"
                                                                                    rowspan="1" colspan="1"
                                                                                    aria-sort="ascending"
                                                                                    aria-label="Rendering engine: activate to sort column descending">
                                                                                    Sr. No
                                                                                </th>
                                                                                <th class="sorting_asc" tabindex="0"
                                                                                    aria-controls="example2"
                                                                                    rowspan="1" colspan="1"
                                                                                    aria-sort="ascending"
                                                                                    aria-label="Rendering engine: activate to sort column descending">
                                                                                    Date & Time
                                                                                </th>
                                                                                <th class="sorting" tabindex="0"
                                                                                    aria-controls="example2"
                                                                                    rowspan="1" colspan="1"
                                                                                    aria-label="Platform(s): activate to sort column ascending">
                                                                                    Received By
                                                                                </th>
                                                                                <th class="sorting" tabindex="0"
                                                                                    aria-controls="example2"
                                                                                    rowspan="1" colspan="1"
                                                                                    aria-label="Browser: activate to sort column ascending">
                                                                                    Amount Received
                                                                                </th>
                                                                            </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                            <?php if (!empty($payment_list)) {
                                                                                $srNo = 0;
                                                                                foreach ($payment_list as $pl_key) {
                                                                                    $srNo++; ?>
                                                                                    <tr role="row" class="odd">
                                                                                        <td><?php echo $srNo; ?></td>
                                                                                        <td><?php echo $pl_key['paymentDate'] . " " . $pl_key['paymentTime']; ?></td>
                                                                                        <?php $user_list = $this->model_hms->get_user_name_by_id($pl_key['receivedBy']); ?>
                                                                                        <td><?php echo $user_list->full_name; ?></td>
                                                                                        <td><?php echo $pl_key['paymentAmount']; ?></td>
                                                                                    </tr>
                                                                                <?php }
                                                                            } ?>
                                                                            </tbody>
                                                                            <tfoot>
                                                                            </tfoot>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                                <?php //} ?>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="dataTables_info" id="example2_info"
                                                                             role="status"
                                                                             aria-live="polite">
                                                                            <div class="col-md-6 pull-right">
                                                                                <div class="dataTables_wrapper form-inline dt-bootstrap">
                                                                                    <table class="table">
                                                                                        <tbody>
                                                                                        <tr>
                                                                                            <th>Total Payment:</th>
                                                                                            <td id="total-payment"><?php echo $payment_sum->paymentSum; ?></td>
                                                                                        </tr>
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>
                                                                            </div><!-- /.col -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
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
                                <button type="button" class="btn btn-primary btn-flat" id="add-advance-payment-submit">
                                    <i
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
