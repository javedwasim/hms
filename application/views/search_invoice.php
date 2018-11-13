<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';

if (isset($error) && $error == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-error alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Error!</h4>No Invoice Found.   </div>';
}
?>
<html>
<head>
    <title>Search Invoice | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Search Invoice
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/search_invoice/'); ?>"> Search Invoice</a></li>
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
                                        <label>Invoice #</label>
                                        <form name="search-by-name" id="search-invoice-no" method="get"
                                              action="<?php echo base_url('dashboard/search_invoice/'); ?>">
                                            <select class="invoice-no form-control"
                                                    name="invoiceno"
                                                    style="width: 100%;" tabindex="4">
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <form name="search_by_date" id="search-invoice-by-date" method="post"
                                              action="<?php echo base_url('dashboard/search_invoice/'); ?>">
                                            <label>Search By Date</label>
                                            <div class="input-group date">
                                                <div class="input-group-addon">
                                                    <i class="fa fa-calendar"></i>
                                                </div>
                                                <input type="text" class="form-control pull-right search-invoice-by-date"
                                                       id="search-invoice-by-date1" name="search-by-date" autocomplete="off"
                                                       placeholder="e.g. DD-MM-YYYY">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if(!empty($invoice) || !empty($invoice_list)){ ?>

            <div class="row">
                <div class="col-md-12">
                    <?php if(!empty($invoice)){ ?>
                        <?php $var = $this->model_hms->get_discharged_pat_pic($patient_list->regNo); ?>
                        <div class="col-md-offset-11">
                            <img src="<?php echo base_url('assets/dist/img/patient_photo/'). $var->patient_pic_path; ?>" class="img-thumbnail">
                        </div>
                    <?php } ?>
                    <br>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Invoice</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <?php if(!empty($invoice)){ ?>
                            <section class="invoice no-border" id="printable">
                                <!-- title row -->
                                <div class="row">
                                    <div class="col-xs-12">
                                        <h2 class="page-header">
                                            <i class="fa fa-building"></i> Department of Neurosugery & NICU (BVH)
                                            <small class="pull-right"></small>
                                        </h2>
                                    </div><!-- /.col -->
                                </div>
                                <!-- info row -->
                                <div class="row invoice-info">
                                    <div class="col-sm-4 invoice-col">
                                        From
                                        <address>
                                            <strong>Department of Neurosugery & NICU</strong><br>
                                            Bahawal Victoria Hospital,<br>
                                            Bahawalpur, Pakistan<br>
                                            Phone: (062) 27878888
                                        </address>
                                    </div><!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        To
                                    <address>
                                            <b>MR #:</b> &nbsp;<?php echo $patient_list->regNo; ?><br>
                                            <strong> Name: </strong><?php echo $patient_list->patName; ?><br>
                                            <?php echo $patient_list->patNoKType . "&nbsp; " . $patient_list->patNoK; ?><br>
                                            <b>Phone: </b> &nbsp;<?php echo $patient_list->patPhone; ?>
                                        </address>
                                    </div><!-- /.col -->
                                    <div class="col-sm-4 invoice-col">
                                        <b>Invoice #:</b> &nbsp;<?php echo $invoice->invoiceNo; ?><br>
                                        <br>
                                        <br>
                                        <b>Account #:</b> &nbsp;<?php echo $invoice->accountNo; ?><br>
                                        <b>Invoice Date:</b> &nbsp;<?php echo $invoice->invoiceDateTime; ?>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                                <!-- Table row -->
                                <div class="row">
                                    <div class="col-xs-12 table-responsive">
                                        <table class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Sr No</th>
                                                <th>Description</th>
                                                <th>Qty</th>
                                                <th>Subtotal</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php $srNo = 1;
                                            foreach ($invoice_details as $i_key) { ?>
                                                <tr>
                                                    <td><?php echo $srNo; ?></td>
                                                    <td><?php echo $i_key['detailDescription']; ?></td>
                                                    <td><?php echo $i_key['detailQty']; ?></td>
                                                    <td><?php echo $i_key['detailSubtotal']; ?></td>
                                                </tr>
                                            <?php } ?>
                                            </tbody>
                                        </table>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                                <div class="row">
                                    <!-- accepted payments column -->
                                    <div class="col-xs-6 pull-right">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <tbody>
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td><?php echo $invoice->invoiceSubtotal; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tax:</th>
                                                    <td><?php echo $invoice->invoiceTax; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Discount:</th>
                                                    <td><?php echo $invoice->invoiceDiscount; ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td><?php echo $invoice->invoiceTotal; ?></td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div><!-- /.col -->
                                </div><!-- /.row -->
                                <!-- this row will not appear when printing -->
                                <div class="row no-print">
                                    <div class="col-xs-12">
                                        <!-- <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
                                        <a href="<?php echo base_url('dashboard/print_invoice/') . "?accountno=" .$invoice->accountNo; ?>" target="_blank"
                                           class="btn btn-primary btn-flat pull-right"
                                           style="margin-right: 5px;width: 130px;"><i
                                                    class="fa fa-print"></i> &nbsp; Print Invoice</a>
                                    </div>
                                </div>
                            </section>
                            <?php } ?>
                            <?php if (!empty($invoice_list)) { ?>
                            <div id="example2_wrapper"
                                 class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6"></div>
                                </div>
                                    <div class="row">
                                        <div class="col-sm-12" style="overflow-y: auto;">
                                            <table id="view-ot-table-1"
                                                   class="table table-bordered table-hover dataTable"
                                                   role="grid" aria-describedby="example2_info">
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
                                                        Invoice #
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Date & Time
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Account #
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Patient MR#
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Patient Name
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Subtotal
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Discount
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Total
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if (!empty($invoice_list)) {
                                                    $srNo = 0;
                                                    foreach ($invoice_list as $i_key) {
                                                        $srNo++; ?>
                                                        <tr role="row" class="odd">
                                                            <td><?php echo $srNo; ?></td>
                                                            <td><?php echo $i_key['invoiceNo']; ?></td>
                                                            <td><?php echo $i_key['invoiceDateTime']; ?></td>
                                                            <td><?php echo $i_key['accountNo']; ?></td>
                                                            <td><?php echo $i_key['regNo']; ?></td>
                                                            <?php $patient_list = $this->model_hms->get_dischared_patient_detail_by_reg_no($i_key['regNo']); ?>
                                                            <td><?php echo $patient_list->patName; ?></td>
                                                            <td><?php echo $i_key['invoiceSubtotal']; ?></td>
                                                            <td><?php echo $i_key['invoiceDiscount']; ?></td>
                                                            <td><?php echo $i_key['invoiceTotal']; ?></td>
                                                            <td style="display: flex;"><a
                                                                        data-toggle="modal"
                                                                        href="<?php echo base_url('dashboard/search_invoice/') . "?invoiceno=" . $i_key['invoiceNo']; ?>">
                                                                    <button type="button"
                                                                            class="btn btn-default">
                                                                        <i
                                                                                class="fa fa-eye"
                                                                                aria-hidden="true"></i>
                                                                    </button>
                                                                </a> &nbsp;
                                                            </td>
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
                                    <div class="col-sm-7">
                                        <div class="dataTables_info" id="example2_info"
                                             role="status"
                                             aria-live="polite">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
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
