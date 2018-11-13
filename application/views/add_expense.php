<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
if (!empty($success) && $success == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Expense(s) have been added successfully.</div>';
}
?>
<html>
<head>
    <title>Add Expense | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Add Expense
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/add_expense/'); ?>"> Add Expense</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">New Expense</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form name="add-expense-form" id="add-expense-form" method="post"
                                  action="<?php echo base_url('dashboard/add_expense/'); ?>">
                                <input type="hidden" id="total-rows" name="total-rows">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table class="table table-hover" id="table-expense-list"
                                               aria-describedby="example2_info">
                                            <tbody>
                                            <tr role="row" class="odd">
                                                <td>
                                                    <section class="invoice">
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Expense Category</label>
                                                                    <select class="expense-category-select form-control"
                                                                            name="expense_category_no0"
                                                                            style="width: 100%;" tabindex="4" required>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Date &amp; Time</label>
                                                                    <div class="input-group date bootstrap-timepicker timepicker">
                                                                        <div class="col-md-6" style="padding: 0;">
                                                                            <input type="text"
                                                                                   class="form-control pull-right expense-datepicker"
                                                                                   name="expense_date0"
                                                                                   autocomplete="off"
                                                                                   placeholder="Select Date" required>
                                                                        </div>
                                                                        <div class="col-md-6 " style="padding: 0;">
                                                                            <input type="text"
                                                                                   class="form-control pull-right expense-timepicker"
                                                                                   name="expense_time0"
                                                                                   placeholder="Set Time"
                                                                                   required>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Description</label>
                                                                    <input class="form-control"
                                                                           name="expense_description0"
                                                                           style="width: 100%;" tabindex="4"
                                                                           placeholder="Type Expense Description"
                                                                           required>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label>Amount</label>
                                                                    <input class="form-control" name="expense_amount0"
                                                                           id="expense-amount" style="width: 100%;"
                                                                           tabindex="4"
                                                                           placeholder="Enter Amount" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </td>
                                            </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-1">
                                            <div class="form-group">
                                                <button type="button" id="add-more-expense-btn"
                                                        class="btn btn-flat btn-primary btn-sm">
                                                    &nbsp; &nbsp;<i class="fa fa-plus"></i> &nbsp;Add More &nbsp; &nbsp;
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-xs-12">
                                                        <button type="submit" name="add_expense_submit"
                                                                class="btn btn-primary btn-flat pull-right "
                                                                id="add-expen-submit"><i
                                                                    class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add
                                                            Expense
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
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
