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
        <title>Blood Sugar Profile | <?php echo SITE_TITLE_TEXT; ?></title>
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
                        Blood Sugar Sheet
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a href="<?php echo base_url('/dashboard/blood_sugar'); ?>"> Blood Sugar Profile</a></li>
                    </ol>
                    <br>
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-12" style="float: right;">
                            <div class="info-box">
                                <span class="info-box-icon bg-green"><i class="fa fa-bed" aria-hidden="true"></i>
                                </span>
                                <div class="info-box-content">
                                    <span class="info-box-text">Admission Statistics</span>
                                    <span style="font-size: 20px"><?php
                                        $patcount = $this->model_hms->patient_counter();
                                        if (!empty($patcount)) {
                                            echo $patcount->counter;
                                        }
                                        ?></span> Patient(s) / <span
                                        style="font-size: 20px"><?php
                                            $bedcount = $this->model_hms->bed_counter();
                                            if (!empty($bedcount)) {
                                                echo $bedcount->counter;
                                            }
                                            ?></span> Bed(s)</span>
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
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>MR# or Patient Name</label>
                                        <form name="search-by-name" id="search-by-name" method="get"
                                              action="#">
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
                            <?php
                            $regno = "";
                            if (!empty($patient_list)) {
                                foreach ($patient_list as $p_key) {
                                    ?>
                                    <?php $var = $this->model_hms->get_pat_pic($p_key['regNo']); ?>
                                    <div class="col-md-1">
                                        <img src="<?php echo base_url('assets/dist/img/patient_photo/') . $var->patient_pic_path; ?>"
                                             class="img-thumbnail">
                                    </div>
                                    <div class="col-md-11" style="padding:0px;">
                                        <h3 class="box-title" style="margin-top: 20px;">Patient Information</h3>
                                    </div>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
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
                                                        <p id="regsno"><?php echo $regno = $p_key['regNo']; ?></p>
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
                                                    <div class="col-md-5">
                                                        <label>S/O, D/O, W/O</label>
                                                    </div>
                                                    <div class="col-md-7">
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
                                                        <label>Ward Number</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p> <?php
                                                            $wardNo = $this->model_hms->get_ward_by_id($p_key['patward_id']);
                                                            echo $wardNo->wardName;
                                                            ?> </p>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-md-5">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-5">
                                                        <label>Disease</label>
                                                    </div>
                                                    <div class="col-md-7">
                                                        <p><?php
                                                            $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']);
                                                            echo $disease->disease_name;
                                                            ?></p>
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
                                                        <label>Bed Number</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <p>
                                                            <?php
                                                            //echo $p_key['patbed_id'];
                                                            $bedNo = $this->model_hms->get_bed_name_wrt_ward($p_key['patbed_id']);
                                                            if ($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed") {
                                                                echo "Extra Bed " . $bedNo->bed;
                                                            } else {
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
                                                    <div class="col-md-5">
                                                        <label>Admission Date</label>
                                                    </div>
                                                    <?php
                                                    $date = $p_key['patAdmDate'];
                                                    $datetime = date(' d-m-Y', strtotime($date));
                                                    ?>
                                                    <div class="col-md-7">
                                                        <p><?php echo $datetime; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="box  box-primary">
                                <div class="box-header with-border">
                                    <div class="col-md-4">
                                        <h3 class="box-title">Blood Sugar Chart</h3>
                                    </div>
                                    <div class="col-md-2 col-md-offset-5 " style="margin-right:5px;">

                                        <button type="button" class="btn btn-block btn-primary " id="print-sugar-report">Print Sheet</button>
                                    </div>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-12" >
                                            <table id="vitals-search"
                                                   class="table table-bordered table-hover dataTable"
                                                   role="grid" aria-describedby="example2_info">
                                                <thead>
                                                    <tr role="row">
                                                        <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1" aria-sort="ascending"
                                                            aria-label="Rendering engine: activate to sort column descending">
                                                            Serial#
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Date
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            BSF
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            2HrBSF
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Platform(s): activate to sort column ascending">
                                                            Pre Lunch
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            Post Lunch
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            Pre Dinner
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            Post Dinner
                                                        </th>
                                                        <th class="sorting" tabindex="0" aria-controls="example2"
                                                            rowspan="1" colspan="1"
                                                            aria-label="CSS grade: activate to sort column ascending">
                                                            Action
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $count = 0;
                                                    if (!empty($sugar_list)) {
                                                        foreach ($sugar_list as $index => $v_key) {
                                                            ?>
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1"><?php echo $index + 1; ?>
                                                                    <input type="hidden" class="bsID" value="<?php echo $v_key['id']; ?>" id="regisno">
                                                                </td>
                                                                <?php
                                                                $bsdate = $v_key['bs_date'];
                                                                $date = date('d-m-Y', strtotime($bsdate));
                                                                ?>
                                                                <td>
                                                                    <input type="text" class="form-control pull-right bs-datepicker" name="bs-date" autocomplete="off" placeholder="Set Date" style="width:100%" value="<?php echo $date; ?>">
                                                                </td>
                                                                <td><input type="text" value="<?php echo $v_key['bs_bsf']; ?>" class="editdatatab" id="bsf" /></td>
                                                                <td><input type="text" value="<?php echo $v_key['bs_hrbsf']; ?>" class="editdata" id="hrbsf" /></td>
                                                                <td><input type="text" value="<?php echo $v_key['bs_pre_lunch']; ?>" class="editdata" id="prelunch" /></td>
                                                                <td><input type="text" value="<?php echo $v_key['bs_post_lunch']; ?>" class="editdata" id="postlunch" /></td>
                                                                <td><input type="text" value="<?php echo $v_key['bs_pre_dinner']; ?>" class="editdata" id="predinner" /></td>
                                                                <td><input type="text" value="<?php echo $v_key['bs_post_dinner']; ?>" class="editdata" id="postdinner" /></td>
                                                                <td>
                                                                    <button class="btn btn-default delete-blood-report">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </button>
                                                                    <br />
                                                                    <button class="btn btn-default update-blood-report ">
                                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                            <?php
                                                            $count = $index + 1;
                                                        }
                                                    }
                                                    ?>
                                                    <tr>
                                                        <td ><?php echo $count + 1; ?></td>
                                                        <td><input type="text" class="form-control pull-right" id="bs-date" name="bs_date" autocomplete="off" placeholder="Set Date" style="width:100%" ></td>
                                                        <td><input type="text" class="editdata onload-cur" id="bs-bsf"></td>
                                                        <td><input type="text" class="editdata" id="bs-hrbsf"></td>
                                                        <td><input type="text" class="editdata" id="bs-prelunch"></td>
                                                        <td><input type="text" class="editdata" id="bs-postlunch"></td>
                                                        <td><input type="text" class="editdata" id="bs-predinner"></td>
                                                        <td><input type="text" class="editdata" id="bs-postdinner"></td>
                                                        <td><button class="btn btn-default save-sugar-report" id="save-sugar-report">
                                                                <i class="fa fa-save" aria-hidden="true"></i>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>
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

        <script>
            $(".save-sugar-report").click(function () {
                var tr = $(this).closest('tr');
                var regno = $('#regsno').text();
                var bsdate = $('#bs-date').val();
                var bsbsf = $('#bs-bsf').val();
                var bshrbsf = $('#bs-hrbsf').val();
                var bsprelunch = tr.find('#bs-prelunch').val();
                var bspostlunch = tr.find('#bs-postlunch').val();
                var bspredinner = tr.find('#bs-predinner').val();
                var bspostdinner = tr.find('#bs-postdinner').val();
                $.ajax({
                    url: "<?php echo base_url(); ?>dashboard/save_bloodsugar_report",
                    type: "post",
                    data: {
                        regno: regno,
                        bsdate: bsdate,
                        bsbsf: bsbsf,
                        bshrbsf: bshrbsf,
                        bsprelunch: bsprelunch,
                        bspostlunch: bspostlunch,
                        bspredinner: bspredinner,
                        bspostdinner: bspostdinner
                    },
                    success: function (data) {
                        $('.wrapper').append('<div style="position: fixed;\n' +
                                'top: 20px;\n' +
                                'right: 20px;\n' +
                                'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                                '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                                'Report has been saved successfully.\n' +
                                '</div>');
                        $('.alert-success').delay(4000).fadeOut('slow');
                        location.reload();
                        console.log(data);
                    }
                });
            });

            $(".update-blood-report").click(function () {
                var tr = $(this).closest('tr');
                var bsId = tr.find('.bsID').val();
                var regno = tr.find('#regisno').val();
                var bsdate = tr.find('.bs-datepicker').val();
                var bsbsf = tr.find('#bsf').val();
                var bshrbsf = tr.find('#hrbsf').val();
                var bsprelunch = tr.find('#prelunch').val();
                var bspostlunch = tr.find('#postlunch').val();
                var bspredinner = tr.find('#predinner').val();
                var bspostdinner = tr.find('#postdinner').val();
                $.ajax({
                    url: "<?php echo base_url(); ?>dashboard/update_sugar_report",
                    type: "post",
                    data: {
                        regNo: regno,
                        bsid: bsId,
                        bsdate: bsdate,
                        bsbsf: bsbsf,
                        bshrbsf: bshrbsf,
                        bsprelunch: bsprelunch,
                        bspostlunch: bspostlunch,
                        bspredinner: bspredinner,
                        bspostdinner: bspostdinner

                    },
                    success: function (data) {
                        $('.wrapper').append('<div style="position: fixed;\n' +
                                'top: 20px;\n' +
                                'right: 20px;\n' +
                                'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                                '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                                'Report has been updated successfully.\n' +
                                '</div>');
                        $('.alert-success').delay(4000).fadeOut('slow');
                        console.log(data);
                    }
                });
            });



           $(document).ready(function () {
               $(".onload-cur").focus();
           });



        </script>
    </body>
</html>
