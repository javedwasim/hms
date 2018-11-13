<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';

if ($this->input->get("success") == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Information has been updated successfully!</div>';
}
?>

<html>
<head>
    <title>Radiology/ Lab Reports | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Radiology/ Lab Reports
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('/dashboard/patient_reports/'); ?>"> Radiology/ Lab Reports</a></li>
            </ol>
            <br>
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12" style="float: right;">
                    <div class="info-box">
            <span class="info-box-icon bg-green"><i class="fa fa-bed" aria-hidden="true"></i>
</span>
                        <div class="info-box-content">
                            <span class="info-box-text">Admission Statistics</span>
                            <span style="font-size: 20px"><?php $patcount = $this->model_hms->patient_counter(); if(!empty($patcount)){ echo $patcount->counter; } ?></span> Patient(s) / <span
                                        style="font-size: 20px"><?php $bedcount = $this->model_hms->bed_counter(); if(!empty($bedcount)){ echo $bedcount->counter; } ?></span> Bed(s)</span>
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
                                <label>MR# or Patient Name</label>
                                <form name="search-by-name" id="search-by-name" method="get"
                                      action="<?php echo base_url('dashboard/patient_reports/'); ?>">
                                    <select class="patName-select form-control" name="search_by_cnic"
                                            style="width: 100%;" tabindex="4">
                                    </select>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box  box-primary">
                <div class="box-header with-border">
                    <?php if (!empty($patient_list)) {
                foreach ($patient_list as $p_key) { ?>
                    <?php $var = $this->model_hms->get_pat_pic($p_key['regNo']); ?>
                    <div class="col-md-1">
                        <img src="<?php echo base_url('assets/dist/img/patient_photo/') . $var->patient_pic_path; ?>"
                             class="img-thumbnail">
                    </div>
                    <div class="col-md-11" style="padding:0px;">
                        <h3 class="box-title" style="margin-top: 20px;">Patient Information</h3>
                    </div>
                        <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label>MR#</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $p_key['regNo']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label>Name</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $p_key['patName']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label>S/O, D/O, W/O</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $p_key['patNoK']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label>Sex</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $p_key['patSex']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label>Ward Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php $wardNo = $this->model_hms->get_ward_by_id($p_key['patward_id']); echo $wardNo->wardName; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    
                                </div>
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label>Disease</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']);
                                                    echo $disease->disease_name; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
				<div class="col-md-3">
                                    <div class="form-group">
                                        
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label>Age</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $p_key['patAge']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                 <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label>Bed Number</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
												<?php
												//echo $p_key['patbed_id'];
												$bedNo = $this->model_hms->get_bed_name_wrt_ward($p_key['patbed_id']);
												if($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed")
												{
                                                  echo "Extra Bed " .$bedNo->bed;
												}
												else{
												 echo $bedNo->bed;
												}
												   ?>
											    </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-5">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-6">
                                                <label>Admission Date</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $datetime = date(' d-m-Y h:i a', strtotime($p_key['patAdmDate'])) ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php }
            } ?>
            <div class="box  box-primary">
                <div class="box-header with-border">
                    <div class="col-md-4">
                        <h3 class="box-title" style="margin-top:10px;">List of Reports of the Patient</h3>
                    </div>
                    <div class="col-md-2 col-md-offset-5 " style="margin-right:5px;">
                        <button type="button" class="btn btn-block btn-primary btn-new-report">Add New Report </button>
                    </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-sm-12" style="overflow-y: auto;">
                            <table id="reports-search"
                                   class="table table-bordered table-hover dataTable"
                                   role="grid" aria-describedby="example2_info">
                                <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1" aria-sort="ascending"
                                        aria-label="Rendering engine: activate to sort column descending">
                                        Report#
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Report Name
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        ReportType
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="Platform(s): activate to sort column ascending">
                                        Comments
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                        rowspan="1" colspan="1"
                                        aria-label="CSS grade: activate to sort column ascending">
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($report_list)) {
                                    foreach ($report_list as $index=>$r_key) { ?>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1" id="regNo"><?php echo $index + 1; ?>
                                            <input type="hidden" class="reportID" value="<?php echo $r_key['reportId']; ?>">
                                            </td>
                                            <td><?php echo $r_key['reportName']; ?></td>
                                            <td><?php echo $r_key['reportType']; ?></td>
                                            <td style="word-break: break-word;"><?php echo $r_key['reportComments']; ?></td>
                                            <td>

                                                <a href="<?php echo base_url('/assets/dist/img/reports/') . $r_key['reportPath']; ?>" data-toggle="lightbox" class="btn btn-default">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <button class="btn btn-default delete-report">
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

            <div class="box  box-primary new-report" id="add-a-report">
                <div class="box-header with-border">
                    <h3 class="box-title">Add new Report</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form action="" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                    <label>Report Name</label>
                                    <input class="form-control" required="required" type="text" name="reportName" maxlength="20" placeholder="Type Report name...">
                            </div>
                            <div class="form-group">
                                <label>Report Type</label>
                                <input class="form-control" name="reportType" placeholder="Type report type..." maxlength="20" required="required">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Comments</label>
                                <textarea class="form-control" name="reportComments"
                                          placeholder="Type any comments..." maxlength="100"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Upload Report</label>
                                <input type="file" name="reportUploaded" required="required">
                                <?php if (!empty($r)) {
                                    print_r($r);
                                } ?>
                            </div>
                            
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-3"></div>
                            <div class="col-md-6">
                                <div class="form-group" style="margin-top: 15px;">
                                    <input type="submit" class="btn btn-block btn-primary" name="btn-report-submit" value="Add New Report">
                                </div>
                            </div>
                            <div class="col-md-3"></div>
                        </div>
                </form>
                    </div><!-- /.col -->
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
