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
    <title>Outstanding Patients | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Outstanding Patients
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/search_invoice/'); ?>"> Outstanding List</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"> Outstanding List</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
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
                                                        Patient MR#
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Patient Name
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Admission Date
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Total Balance
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Total Receivable
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Remaining Receivable
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if (!empty($accounts_list)) {
                                                    $srNo = 0;
                                                    foreach ($accounts_list as $a_key) {
                                                        if ($a_key['remainingAmount'] < 0) {
                                                            $srNo++; ?>
                                                            <tr role="row" class="odd">
                                                                <td><?php echo $srNo; ?></td>
                                                                <td><?php echo $a_key['patientRegNo']; ?></td>
                                                                <?php $patient_list = $this->model_hms->get_patient_detail_by_reg_no($a_key['patientRegNo']);
                                                                if (empty($patient_list)) {
                                                                    $patient_list = $this->model_hms->get_dischared_patient_detail_by_reg_no($a_key['patientRegNo']);
                                                                }
                                                                ?>
                                                                <td><?php echo $patient_list->patName; ?></td>
                                                                <td><?php echo $patient_list->patAdmDate; ?></td>
                                                                <td><?php echo $a_key['totalDepositedAmount']; ?></td>
                                                                <td><?php echo $a_key['runningBill']; ?></td>
                                                                <td style="color: #F44336;"><?php echo $a_key['remainingAmount']; ?></td>
                                                            </tr>
                                                        <?php }
                                                    }
                                                }?>
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
