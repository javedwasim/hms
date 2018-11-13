<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
$success = $this->input->get("success");
if ($success == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Disease has been saved successfully!</div>';
}elseif($success == "false"){
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-danger alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-cross"></i> Success!</h4>Disease already exists!</div>';
}
?>
<html>
    <head>
        <title>Add Diseases | <?php echo SITE_TITLE_TEXT; ?></title>
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
                        Add Diseases
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li>
                            <a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('dashboard/add_diseases/'); ?>"> Add Diseases</a>
                        </li>
                    </ol>
                    <br>
                </section>
                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box  box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Add Disease</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                
                                <div class="box-body">
                                    <div class="row">
                                        <form name="add-disease-form" id="add-disease-form" method="post" action="<?php echo base_url('dashboard/disease_insert'); ?>">
                                            <div class="">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label>Enter Disease</label>
                                                        <input class="form-control" required="required" type="text" id="indisease" name="in_disease" placeholder="Enter Disease here" />
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col -->
                                                <div class="col-md-2">
                                                    <div class="form-group" style="margin-top: 24px;">
                                                        <button type="submit" class="btn bg-blue btn-submit"><i class="fa fa-user-plus" aria-hidden="true" ></i> &nbsp; Submit</button>
                                                    </div>
                                                </div><!-- /.col -->
                                            </div>
                                        </form>
                                        <div class="col-md-3 ">
                                            <div class="form-group" style="margin-top: 24px;">
                                                <a href="<?php echo base_url('/dashboard/new_admission'); ?>" class="btn bg-blue">Add New Patient</a>
                                            </div><!-- /.form-group -->
                                        </div><!-- /.col -->
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