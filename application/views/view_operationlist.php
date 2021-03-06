<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
if ($this->input->get("usuccess") == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Operation theatre Booking has been updated successfully!</div>';
}
?>
<html>
    <head>
        <title>View Operation List | <?php echo SITE_TITLE_TEXT; ?></title>
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
                        View Operation List
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a href="<?php echo base_url('dashboard/view_operationlist/'); ?>"> View Operation List</a></li>
                    </ol>
                    <br>
                </section>

                <!-- Main content -->

                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- Custom Tabs -->
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="<?php
                                    if (!isset($operated_list)) {
                                        echo "active";
                                    }
                                    ?>"><a href="#tab_1" data-toggle="tab">Operation List</a></li>
                                    <li class="<?php
                                    if (isset($operated_list)) {
                                        echo "active";
                                    }
                                    ?>"><a href="#tab_2" data-toggle="tab">Operated Patients</a></li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane <?php
                                    if (!isset($operated_list)) {
                                        echo "active";
                                    }
                                    ?>" id="tab_1">
                                        <div class="box  box-primary">
                                            <div class="box-header with-border">
                                                <h3 class="box-title">Search Filters</h3>
                                                <div class="box-tools pull-right">
                                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                                </div>
                                            </div><!-- /.box-header -->
                                            <div class="box-body">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Operation Theater</label>
                                                            <form name="search-by-ward" id="search-by-otward" method="get" action="<?php echo base_url('dashboard/view_operationlist/'); ?>">
                                                                <select class="form-control otward-select"
                                                                        name="search_by_otward"
                                                                        style="width: 100%;"
                                                                        tabindex="4">
                                                                </select>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>MR# or Patient Name</label>
                                                            <form name="search-by-name" id="search-ot-by-name" method="get" action="<?php echo base_url('dashboard/view_operationlist/'); ?>">
                                                                <select class="ot-patName-select form-control" name="search_by_cnic" style="width: 100%;" tabindex="4">
                                                                </select>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <form name="search-by-date" id="search-ot-by-date" method="post" action="<?php echo base_url('dashboard/view_operationlist/'); ?>">
                                                                <label>Search By Date</label>
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text"
                                                                           class="form-control pull-right search-ot-by-date" id="search-ot-by-date" name="search_by_date" autocomplete="off" placeholder="e.g. DD-MM-YYYY">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (isset($operation_list)) { ?>
                                            <div class="box  box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Search Results</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
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
                                                                <?php if (!empty($operation_list)) { ?>
                                                                    <div class="row">
                                                                        <div class="col-sm-12" style="overflow-y: auto;">
                                                                            <table id="view-ot-table-1"
                                                                                   class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                                                                <thead>
                                                                                    <tr role="row">
                                                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"> Sr. No
                                                                                        </th>
                                                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending"> Operation Theatre
                                                                                        </th>
                                                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending"> Date & Time
                                                                                        </th>
                                                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"> Procedure
                                                                                        </th>
                                                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending"> Patient MR#
                                                                                        </th>
                                                                                        <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                                                                                            Patient Name
                                                                                        </th>
                                                                                        <th class="sorting" tabindex="0"
                                                                                            aria-controls="example2"
                                                                                            rowspan="1" colspan="1"
                                                                                            aria-label="Engine version: activate to sort column ascending">
                                                                                            Booked By
                                                                                        </th>
                                                                                        <th class="sorting" tabindex="0"
                                                                                            aria-controls="example2"
                                                                                            rowspan="1" colspan="1"
                                                                                            aria-label="Engine version: activate to sort column ascending">
                                                                                            Surgeon
                                                                                        </th>
                                                                                        <th class="sorting" tabindex="0"
                                                                                            aria-controls="example2"
                                                                                            rowspan="1" colspan="1"
                                                                                            aria-label="Engine version: activate to sort column ascending">
                                                                                            Patient Status
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
                                                                                    <?php
                                                                                    if (!empty($operation_list)) {
                                                                                        $srNo = 0;
                                                                                        foreach ($operation_list as $op_key) {
                                                                                            $srNo++;
                                                                                            ?>
                                                                                            <tr role="row" class="odd">
                                                                                                <td><?php echo $srNo; ?>
                                                                                                    <input type="hidden" id="otid" value="<?php echo $op_key['otBookingNo']; ?>">
                                                                                                </td>
                                                                                                <?php $otward_list = $this->model_hms->get_otward_by_id($op_key['otWardNo']); ?>
                                                                                                <td><?php echo $otward_list->otwardName; ?></td>
                                                                                                <td><?php echo $op_key['otBookingDate'] . " " . $op_key['otBookingTime']; ?></td>
                                                                                                <td><?php echo $op_key['otOperationType']; ?></td>
                                                                                                <td id="patid"><?php echo $op_key['otPatNo']; ?></td>
                                                                                                <?php $patient_list = $this->model_hms->get_patirnt_name_by_id($op_key['otPatNo']); ?>
                                                                                                <td><?php echo $patient_list->patName; ?></td>
                                                                                                <?php $user_list = $this->model_hms->get_user_name_by_id($op_key['otBookedBy']); ?>
                                                                                                <td><?php echo $user_list->full_name; ?></td>
                                                                                                <?php $user_list = $this->model_hms->get_user_name_by_id($op_key['otSurgeon']); ?>
                                                                                                <td><?php echo $user_list->full_name; ?></td>
                                                                                                <td id="status"><?php echo $op_key['otPatientStatus']; ?></td>
                                                                                                <td>
                                                                                                    <div style="display: flex;">
                                                                                                        <a data-toggle="modal" href="<?php echo base_url('dashboard/operation_theatre_form/') . "?search_by_ot=" . $op_key['otBookingNo']; ?>">
                                                                                                            <button type="button" class="btn btn-default">
                                                                                                                <i class="fa fa-file-text-o" aria-hidden="true"></i>
                                                                                                            </button>
                                                                                                        </a> &nbsp;
                                                                                                        <a
                                                                                                            data-toggle="modal"
                                                                                                            href="<?php echo base_url('dashboard/edit_operation_theatre/') . "?search_by_ot=" . $op_key['otBookingNo']; ?>">
                                                                                                            <button type="button"
                                                                                                                    class="btn btn-default">
                                                                                                                <i
                                                                                                                    class="fa fa-pencil-square-o"
                                                                                                                    aria-hidden="true"></i>
                                                                                                            </button>
                                                                                                        </a> &nbsp;
                                                                                                        <button type="button"
                                                                                                                class="btn btn-default ot-delete-submit-btn">
                                                                                                            <i
                                                                                                                class="fa fa-ban"
                                                                                                                aria-hidden="true"></i>
                                                                                                        </button> 
                                                                                                    </div>
                                                                                                    <div style="display: flex; margin-top:5px; ">
                                                                                                        <button type="button"
                                                                                                                class="btn btn-default ot-complete-submit-btn">
                                                                                                            <i class="fa fa-check"
                                                                                                               aria-hidden="true"></i>
                                                                                                        </button>
                                                                                                        &nbsp;
                                                                                                        <button type="button" class="btn btn-primary" id="print-post-op">
                                                                                                            <i class="fa fa-print" aria-hidden="true"></i>
                                                                                                        </button>
                                                                                                    </div>
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
                                                                    <?php
                                                                } else {
                                                                    $error = " &nbsp No record found.";
                                                                }
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-sm-7">
                                                                        <div class="dataTables_info" id="example2_info"
                                                                             role="status"
                                                                             aria-live="polite"><?php
                                                                                 if (isset($error)) {
                                                                                     echo $error;
                                                                                 }
                                                                                 ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <?php if (!isset($error)) { ?>
                                                        <div class="row">
                                                            <div class="col-sm-6"></div>
                                                            <div class="col-sm-6"><a
                                                                    href="<?php echo base_url('dashboard/print_operation_list/') . "?" . $search . "=" . $id; ?>"
                                                                    target="_blank">
                                                                    <button type="button"
                                                                            class="btn btn-primary btn-flat pull-right">
                                                                        <i class="fa fa-print"
                                                                           aria-hidden="true"></i>&nbsp; Print Operation List
                                                                    </button>
                                                                </a></div>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <!-- /.tab-pane -->
                                    <div class="tab-pane <?php
                                    if (isset($operated_list)) {
                                        echo "active";
                                    }
                                    ?>" id="tab_2">
                                        <div class="box box-primary">
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
                                                            <label>Operation Theater</label>
                                                            <form name="search-by-otward" id="search-by-otward-operated"
                                                                  method="get"
                                                                  action="<?php echo base_url('dashboard/view_operationlist/'); ?>">
                                                                <select class="form-control operated-otward-select"
                                                                        name="search_by_otward_operated"
                                                                        style="width: 100%;"
                                                                        tabindex="4">
                                                                </select>
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <form name="search-by-date" id="search-ot-by-date-operated"
                                                                  method="post"
                                                                  action="<?php echo base_url('dashboard/view_operationlist/'); ?>">
                                                                <label>Search By Date</label>
                                                                <div class="input-group date">
                                                                    <div class="input-group-addon">
                                                                        <i class="fa fa-calendar"></i>
                                                                    </div>
                                                                    <input type="text"
                                                                           class="form-control pull-right search-ot-by-date-operated"
                                                                           id="search-ot-by-date-operated"
                                                                           name="search_by_date_operated"
                                                                           autocomplete="off"
                                                                           placeholder="e.g. DD-MM-YYYY">
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (isset($operated_list)) { ?>
                                            <div class="box  box-primary">
                                                <div class="box-header with-border">
                                                    <h3 class="box-title">Search Results</h3>
                                                    <div class="box-tools pull-right">
                                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                                class="fa fa-minus"></i></button>
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
                                                                <?php if (!empty($operated_list)) { ?>
                                                                    <div class="row">
                                                                        <div class="col-sm-12" style="overflow-y: auto;">
                                                                            <table id="view-ot-table-2"
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
                                                                                            Operation Theatre
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
                                                                                            Procedure
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
                                                                                            Booked By
                                                                                        </th>
                                                                                        <th class="sorting" tabindex="0"
                                                                                            aria-controls="example2"
                                                                                            rowspan="1" colspan="1"
                                                                                            aria-label="Engine version: activate to sort column ascending">
                                                                                            Surgeon
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
                                                                                    <?php
                                                                                    if (!empty($operated_list)) {
                                                                                        $srNo = 0;
                                                                                        foreach ($operated_list as $opd_key) {
                                                                                            $srNo++;
                                                                                            ?>
                                                                                            <tr role="row" class="odd">
                                                                                                <td><?php echo $srNo; ?>
                                                                                                    <input type="hidden" id="otid"
                                                                                                           value="<?php echo $opd_key['otBookingNo']; ?>">
                                                                                                </td>
                                                                                                <?php $otward_list = $this->model_hms->get_otward_by_id($opd_key['otWardNo']); ?>
                                                                                                <td><?php echo $otward_list->otwardName; ?></td>
                                                                                                <td><?php echo $opd_key['otBookingDate'] . " " . $opd_key['otBookingTime']; ?></td>
                                                                                                <td><?php echo $opd_key['otOperationType']; ?></td>
                                                                                                <td><?php echo $opd_key['otPatNo']; ?></td>
                                                                                                <?php $patient_list = $this->model_hms->get_patirnt_name_by_id($opd_key['otPatNo']); ?>
                                                                                                <td><?php echo $patient_list->patName; ?></td>
                                                                                                <?php $user_list = $this->model_hms->get_user_name_by_id($opd_key['otBookedBy']); ?>
                                                                                                <td><?php echo $user_list->full_name; ?></td>
                                                                                                <?php $user_list_surgeon = $this->model_hms->get_user_name_by_id($opd_key['otSurgeon']); ?>
                                                                                                <td><?php echo $user_list_surgeon->full_name; ?></td>
                                                                                                <td style="display: flex;"><input type="hidden"
                                                                                                                                  id="otfindings"
                                                                                                                                  value="<?php echo $opd_key['otOpFindingsProc']; ?>">
                                                                                                    <a
                                                                                                        data-toggle="modal"
                                                                                                        href="<?php echo base_url('dashboard/operation_theatre_form/') . "?search_by_ot=" . $opd_key['otBookingNo']; ?>">
                                                                                                        <button type="button"
                                                                                                                class="btn btn-default">
                                                                                                            <i
                                                                                                                class="fa fa-file-text-o"
                                                                                                                aria-hidden="true"></i>
                                                                                                        </button>
                                                                                                    </a>&nbsp; <a
                                                                                                        data-toggle="modal"
                                                                                                        href="<?php echo base_url('dashboard/operation_theatre_form_view/') . "?search_by_ot=" . $opd_key['otBookingNo']; ?>">
                                                                                                        <button type="button"
                                                                                                                class="btn btn-default">
                                                                                                            <i
                                                                                                                class="fa fa-eye"
                                                                                                                aria-hidden="true"></i>
                                                                                                        </button>
                                                                                                    </a>
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
                                                                    <?php
                                                                } elseif (empty($operated_list)) {
                                                                    $error_tab2 = " &nbsp No record found.";
                                                                }
                                                                ?>
                                                                <div class="row">
                                                                    <div class="col-sm-7">
                                                                        <div class="dataTables_info" id="example2_info"
                                                                             role="status"
                                                                             aria-live="polite"><?php
                                                                                 if (isset($error_tab2)) {
                                                                                     echo $error_tab2;
                                                                                 }
                                                                                 ?>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>

                                </div>
                                <!-- /.tab-content -->
                            </div>
                            <!-- nav-tabs-custom -->
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>

                                    <h4 class="modal-title">Confirmation Message</h4>
                                </div>
                                <div class="modal-body">
                                    <p>Do you want to cancel the operation theater booking?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn bg-default nodelete-ot-row">No</button>
                                    <button type="button" class="btn bg-blue delete-ot-row">Yes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->


                    <!--new added start here by Binni-->
                    <div class="modal fade" tabindex="-1" role="dialog" id="op-complete-modal">
                        <div class="modal-dialog modal-lg" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                            aria-hidden="true">&times;</span></button>
                                    <h4 class="modal-title">Post Operative Performa</h4>
                                </div>
                                <div class="modal-body">
<!--                                    <div class="row">
								<div class="col-md-6">
									<div class="col-md-4">
										<div class="form-group">
											<label>Date of Operation</label>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<div class="input-group date">
												<div class="input-group-addon">
													<i class="fa fa-calendar"></i>
												</div>
												<input type="text"
													   class="form-control"
													   id="date-of-operation"
													   autocomplete="off"
													   placeholder="e.g. DD-MM-YYYY">
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="col-md-4">
										<div class="form-group">
											<label>Time</label>
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<div class="input-group date bootstrap-timepicker timepicker">
												<div class="input-group-addon">
													<i class="fa fa-clock-o"></i>
												</div>
												<input class="form-control" id="time-of-operation" type="text"
													   style="width: 100%;" placeholder="Select time here "
													   required="required">
											</div>
										</div>
									</div>
								</div>
							</div>-->
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Pre-op Diagnosis</label>
                                                    <input class="form-control" id="pre-op-diagnosis" name="pre-op-diagnosis"
                                                           style="width: 100%;" placeholder="Type pre-op diagnosis here" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Post-op Diagnosis</label>
                                                    <input class="form-control" id="post-op-diagnosis" name="post-op-diagnosis"
                                                           style="width: 100%;" placeholder="Type post-op diagnosis here" required="required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Anesthesia</label>
                                                    <input class="form-control" id="anesthesia" name="anesthesia"
                                                           style="width: 100%;" placeholder="Type anesthesia here" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Anesthetist</label>
                                                    <input class="form-control" id="ot-anesthesiologist-name" name="ot-anesthesiologist-name"
                                                           style="width: 100%;" placeholder="Enter Anesthesiologist Name" required="required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Assistant</label>
                                                    <input class="form-control" id="assistant-name"
                                                           name="assistant-name"
                                                           style="width: 100%;" placeholder="Type assistant name here"
                                                           required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Incision</label>
                                                    <input class="form-control" id="incision"
                                                           name="incision"
                                                           style="width: 100%;" placeholder="Type incision here"
                                                           required="required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Duration of Procedure</label>
                                                    <input class="form-control" id="duration-of-procedure" name="duration-of-procedure"
                                                           style="width: 100%;" placeholder="Type duration of procedure here" required="required">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="col-md-10">
                                                <div class="form-group">
                                                    <label>Referring Consultant</label>
                                                    <input class="form-control" id="ot-op-referr-cons" name="ot_op_referr_cons"
                                                           style="width: 100%;" placeholder="Enter name here" required="required">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Pre Operative Findings</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea id="pre-operative-findings" class="form-control" rows="2"
                                                          placeholder="Type pre operative findings here..."
                                                          autocomplete="off"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Biopsy (If any)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea id="biopsy" class="form-control" rows="2"
                                                          placeholder="Type biopsy here..."
                                                          autocomplete="off"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Drains</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <textarea id="drains" class="form-control" rows="2"
                                                          placeholder="Type drains here..."
                                                          autocomplete="off"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <label>Operation Findings / Procedure</label>
                                        </div>
                                        <div class="col-md-9">
                                            <textarea id="ot-op-finding-proc" class="form-control" rows="4"
                                                      placeholder="Type operation findings / procedure here..."
                                                      autocomplete="off"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label>Post OP Vitals Prepared by:</label>
                                        </div>
                                        <div class="col-md-5">
                                            <input type="text" id="ot-op-vital-dr-name" class="form-control"
                                                   placeholder="Enter Name here..." autocomplete="off" style="width: 96%; margin-left: 15px;" />
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Pulse:</label>
                                                <input class="form-control" id="ot-op-vital-pulse" name="ot_op_vital_pulse"
                                                       style="width: 100%;" placeholder="Pulse" required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>B.P</label>
                                                <input class="form-control" id="ot-op-vital-bp" name="ot_op_vital_bp"
                                                       style="width: 100%;" placeholder="B.P....." required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>Temp</label>
                                                <input class="form-control" id="ot-op-vital-temp" name="ot_op_vital_temp"
                                                       style="width: 100%;" placeholder="Temp..." required="required">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label>R/R</label>
                                                <input class="form-control" id="ot-op-vital-rr" name="ot_op_vital_rr"
                                                       style="width: 100%;" placeholder="R/R..." required="required">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary btn-flat" id="ot-operated-submit"><i
                                            class="fa fa-floppy-o" aria-hidden="true"> </i>&nbsp; Save Information
                                    </button>
                                </div>
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
            </div>
            <!--new added end here by Binni-->

            <div class="modal fade" tabindex="-1" role="dialog" id="operated-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Operation Findings / Procedure</h4>
                        </div>
                        <div class="modal-body">
                            <p id="ot-op-finding-procedure"></p>
                        </div>
                        <br>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-default" id="close-operated-submit-btn">Close
                            </button>
                        </div>
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
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
