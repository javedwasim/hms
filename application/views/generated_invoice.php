<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Invoice | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Invoice
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/generate_invoice/'); ?>"> Generate Invoice</a></li>
                <li><a href="#"> Invoice</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="invoice" id="printable">
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
                    <address style="display: block;">
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
                        foreach ($invoice_details as $i_key){ ?>
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
                    <!--                    <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;"><i class="fa fa-download"></i> Generate PDF</button>-->
                    <a href="<?php echo base_url('dashboard/print_invoice/') . "?accountno=" .$invoice->accountNo; ?>" target="_blank"><button
                       class="btn btn-primary btn-flat pull-right" style="margin-right: 5px;width: 130px;"><i
                                    class="fa fa-print"></i> &nbsp; Print Invoice</button></a>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
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
