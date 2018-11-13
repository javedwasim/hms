<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Add Expenses Category | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Add Expenses Category
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('/dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('/dashboard/master_list/'); ?>">Master List</a></li>
                <li><a href="<?php echo base_url('/dashboard/add_expense_category/'); ?>">Add Expenses Category</a></li>
            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box  box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List of Expanse Categories</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-9">
                            <button type="button" class="btn btn-block btn-primary btn-new-category">Add New Category
                            </button>
                        </div>
                        <div class="col-sm-12" style="overflow-y: auto;">
                            <table id="reports-search"
                                   class="table table-bordered table-hover dataTable"
                                   role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        Category#
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Category Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($expense_list)) {
                                    foreach ($expense_list as $index => $e_key) { ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" id="regNo">
                                                <?php echo $e_key['categoryNo']; ?>
                                                <input type="hidden" id="categoryNo" value="<?php echo $e_key['categoryNo']; ?>">
                                            </td>
                                            <td><p id="cattd"><?php echo $e_key['categoryName']; ?></p>
                                            <input type="hidden" id="txtCatName" value="<?php echo $e_key['categoryName']; ?>">
                                            </td>

                                            <td>
                                                <button class="btn btn-default edit-category">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </button>
                                                <button class="btn btn-default save-category" style="display: none;">
                                                    <i class="fa fa-floppy-o" aria-hidden="true"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                ?>

                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>

                        </div>
                    </div>
                </div>
            </div>

            <div class="box  box-primary new-expense" id="add-a-category" style="display: none;">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new Expense Category</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6">
                            <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input class="form-control" required="required" type="text" name="categoryName"
                                           placeholder="Type Expense name...">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-block btn-primary" name="btn-expense-submit"
                                           value="Add New Expense">
                                </div>
                            </form>

                        </div>
                        <div class="col-md-3"></div>
                    </div><!-- /.col -->
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
        <strong>Copyright &copy; <?php echo date("Y"); ?> <a target="_blank"
                                                             href="<?php echo SITEURL; ?>"><?php echo COMPANYNAME; ?></a>.</strong>
        All rights
        reserved.
    </footer>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
