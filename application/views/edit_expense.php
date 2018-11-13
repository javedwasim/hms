<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
if (empty($expense_list)) {
    header("location:".base_url("dashboard/view_expense"));
}
?>
<html>
<head>
    <title>Edit Expense | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Edit Expense
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/edit_expense/'); ?>"> Edit Expense</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
            <?php if(!empty($expense_list)){ ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit Expense</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form name="edit-expense-form" id="edit-expense-form" method="post"
                                  action="<?php echo base_url('dashboard/edit_expense/'); ?>">
                                <input type="hidden"  name="expense_no" value="<?php echo $expense_list->expNo; ?>">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <section class="invoice">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Expense Category</label>
                                                        <select class="exp-category-select form-control"
                                                                name="expense_category_no"
                                                                style="width: 100%;" tabindex="4" required>
                                                            <?php if(!empty($category_list)){
                                                                foreach ($category_list as $c_key){ ?>
                                                                <option value="<?php echo $c_key['categoryNo']; ?>" <?php if($c_key['categoryNo'] == $expense_list->expCategNo){ echo "selected"; } ?>><?php echo $c_key['categoryName']; ?></option>
                                                            <?php }
                                                                } ?>
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
                                                                       name="expense_date"
                                                                       autocomplete="off"
                                                                       placeholder="Select Date" value="<?php echo $expense_list->expDateString; ?>" required>
                                                            </div>
                                                            <div class="col-md-6 " style="padding: 0;">
                                                                <input type="text"
                                                                       class="form-control pull-right expense-timepicker"
                                                                       name="expense_time"
                                                                       placeholder="Set Time" value="<?php echo $expense_list->expTimeString; ?>"
                                                                       required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input class="form-control"
                                                               name="expense_description"
                                                               style="width: 100%;" tabindex="4"
                                                               placeholder="Type Expense Description" value="<?php echo $expense_list->expDescription; ?>"
                                                               required>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Amount</label>
                                                        <input class="form-control" name="expense_amount"
                                                               id="expense-amount" style="width: 100%;"
                                                               tabindex="4" value="<?php echo $expense_list->expAmount; ?>"
                                                               placeholder="Enter Amount" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="col-xs-12">
                                                    <button type="submit" name="update_expense_submit"
                                                            class="btn btn-primary btn-flat pull-right "
                                                            id="update-expense-submit"><i
                                                                class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp;
                                                        Save
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
