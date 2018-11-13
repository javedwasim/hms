<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Wards List | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Wards List
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('/dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('/dashboard/master_list/'); ?>">Master List</a></li>
                <li><a href="<?php echo base_url('/dashboard/wards_list/'); ?>"> Ward List</a></li>


            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="box  box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">List of Wards</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3 col-md-offset-9">
                            <button type="button" class="btn btn-block btn-primary btn-new-ward">Add New Ward
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
                                        Ward#
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Ward Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($wards_list)) {
                                    foreach ($wards_list as $index => $w_key) { ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" id="regNo">
                                                <?php echo $w_key['wardId']; ?>
                                                <input type="hidden" id="wardId" value="<?php echo $w_key['wardId']; ?>">
                                            </td>
                                            <td><?php echo $w_key['wardName']; ?></td>
                                            <td>
                                                <button class="btn btn-default delete-ward">
                                                    <i class="fa fa-trash-o" aria-hidden="true"></i>
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

            <div class="box  box-primary new-ward" id="add-a-ward">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new Ward</h3>
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
                                    <label>Ward Name</label>
                                    <input class="form-control" required="required" type="text" name="wardName"
                                           placeholder="Type Ward name...">
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-block btn-primary" name="btn-ward-submit"
                                           value="Add New Wards">
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
