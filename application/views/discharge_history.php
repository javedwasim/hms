<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
    <head>
        <title>Discharge Patient History | <?php echo SITE_TITLE_TEXT; ?></title>
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
                        Discharge Patients History
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a href="<?php echo base_url('/dashboard/view_discharge_history/'); ?>"> Discharge Patient History</a></li>
                    </ol>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12" style="float: right;">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-bed" aria-hidden="true"></i>
                                </span>

                                <div class="info-box-content">
                                    <span class="info-box-text">Admission Statistics</span>
                                    <span style="font-size: 20px"><?php $patcount = $this->model_hms->patient_counter();
            if (!empty($patcount)) {
                echo $patcount->counter;
            } ?></span> Patient(s) / <span
                                        style="font-size: 20px"><?php $bedcount = $this->model_hms->bed_counter();
            if (!empty($bedcount)) {
                echo $bedcount->counter;
            } ?></span> Bed(s)</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                    </div>
                </section>

                <!-- Main content -->

                <section class="content">
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
                                        <label>Search Discharged Patients</label>
                                        <form name="search-discharged-patients" id="search-discharged-patients" method="get" action="<?php echo base_url('dashboard/view_discharge_history'); ?>">
                                            <select class="discharge-patient-select form-control"
                                                    name="search_discharged_by_cnic" style="width: 100%;" tabindex="4">
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <form name="search_discharged_by_date" id="search_discharged_by_date" method="get" action="<?php echo base_url('dashboard/view_discharge_history'); ?>">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Search By From Date</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right search-discharged-by-from-date" id="search-discharged-by-from-date" name="search_discharged_by_from_date" autocomplete="off" placeholder="e.g. DD-MM-YYYY">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Search By To Date</label>
                                                <div class="input-group date">
                                                    <div class="input-group-addon">
                                                        <i class="fa fa-calendar"></i>
                                                    </div>
                                                    <input type="text" class="form-control pull-right search-discharged-by-to-date" id="search-discharged-by-to-date" name="search_discharged_by_to_date" autocomplete="off" placeholder="e.g. DD-MM-YYYY">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
<?php if (!empty($patient_list)) { ?>
                        <div class="box  box-primary">
                            <div class="box-header with-border" id="details">
                                <h3 class="box-title">Search Results</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="box-body">
                                        <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                            <div class="row">
                                                <div class="col-sm-6"></div>
                                                <div class="col-sm-6"></div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-12" style="overflow-y: auto;">
                                                    <table id="discharged-patient-search" class="table table-bordered table-hover dataTable"
                                                           role="grid" aria-describedby="example2_info">
                                                        <thead>
                                                            <tr role="row">
                                                                <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                                    aria-label="Rendering engine: activate to sort column descending">
                                                                    Patient MR#
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Browser: activate to sort column ascending">Patient
                                                                    Name
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending">Next
                                                                    of Kin
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending">Sex
                                                                </th>

                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending">
                                                                    Bed Number
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending">
                                                                    Ward Number
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Engine version: activate to sort column ascending">
                                                                    Disease
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending">
                                                                    Admission Date
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="Platform(s): activate to sort column ascending">
                                                                    Status
                                                                </th>

                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending">
                                                                    Actions
                                                                </th>
                                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                                    rowspan="1" colspan="1"
                                                                    aria-label="CSS grade: activate to sort column ascending">
                                                                    Print all reports
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                        <?php if (!empty($patient_list)) {
                                                            foreach ($patient_list as $p_key) {
                                                                ?>
                                                                    <tr role="row" class="odd">
                                                                        <td class="sorting_1"
                                                                            id="regNo<?php echo $p_key['regNo']; ?>"><?php echo $p_key['regNo']; ?></td>
                                                                        <td><?php echo $p_key['patName']; ?></td>
                                                                        <td><?php echo $p_key['patNoK']; ?></td>
                                                                        <td><?php echo $p_key['patSex']; ?></td>
                                                                        <td><?php echo $p_key['patbed_id']; ?></td>
                                                                        <td><?php echo $p_key['patward_id']; ?></td>
                                                                        <td><?php $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']);
                                                            echo $disease->disease_name; ?></td>
                                                                        <td><?php echo $p_key['patAdmDate']; ?></td>
                                                                        <td id="status"><?php echo $p_key['patStatus']; ?></td>
                                                                            <?php
                                                                            foreach ($p_key as $pkey => $pvalue) {
                                                                                echo '<input type="hidden" id="' . $pkey . '" value="' . $pvalue . '">' . PHP_EOL;
                                                                            }
                                                                            ?>


                                                                        <td style="display:flex;">
                                                                            <?php if ($discharge_status == 1) { ?>
                                                                                <a target="_blank" data-toggle="modal" class="btn btn-default"
                                                                                   href="<?php echo $base_url; ?>dashboard/patient_chart/?search_by_cnic=<?php echo $p_key['regNo']; ?>">
                                                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                                                </a> &nbsp;
                                                                                <a target="_blank" data-toggle="modal" class="btn btn-default"
                                                                                   href="<?php echo $base_url; ?>dashboard/discharge_sheet_print/?search_by_cnic=<?php echo $p_key['regNo']; ?>">
                                                                                    <i class="fa fa-print" aria-hidden="true"></i>
                                                                                </a>
                                                                            <?php } ?>
                                                                            <?php if ($discharge_status !== 1) { ?>
                                                                                &nbsp;
                                                                                <a data-toggle="modal"  class="btn btn-default" href="#discharge-modal">
                                                                                    <i class="fa fa-minus-square-o"
                                                                                       aria-hidden="true"></i>
                                                                                </a>
                                                                            <?php } ?>
                                                                        </td>
                                                                        <td>
                                                                        <?php if ($discharge_status == 1) { ?>
                                                                                <a target="_blank" data-toggle="modal" class="btn btn-default"
                                                                                   href="<?php echo $base_url; ?>dashboard/print_all_reports/?search_by_cnic=<?php echo $p_key['regNo']; ?>">
                                                                                    <i class="fa fa-print" aria-hidden="true"></i>
                                                                                </a>
                                                                        <?php } ?>
                                                                    <?php if ($discharge_status !== 1) { ?>
                                                                                &nbsp;
                                                                                <a data-toggle="modal"  class="btn btn-default" href="#discharge-modal">
                                                                                    <i class="fa fa-minus-square-o"
                                                                                       aria-hidden="true"></i>
                                                                                </a>
                                                                    <?php } ?>
                                                                        </td>
                                                                    </tr>
                                                                    <?php }
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
        </div>
<?php $this->load->view('footer'); ?>
    </body>
</html>
