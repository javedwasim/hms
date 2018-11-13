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
        <title>Patient Vitals Sheet | <?php echo SITE_TITLE_TEXT; ?></title>
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
                        Patient Vitals Sheet
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <li><a href="<?php echo base_url('/dashboard/patient_vitals_sheet/'); ?>"> Patient Vitals Sheet</a></li>
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
                    <?php
                    $regno = "";
                    if (!empty($patient_list)) {
                        foreach ($patient_list as $p_key) {
                            ?>
                            <div class="box  box-primary">
                                <div class="box-header with-border">

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
                                                    $datetime = date(' d-m-Y h:i a', strtotime($date));
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
                            <?php
                        }
                    ?>
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <div class="col-md-4">
                                <h3 class="box-title">Vitals Chart</h3>
                            </div>
                            <div class="col-md-2 col-md-offset-5 " style="margin-right:5px;">

                                <button type="button" class="btn btn-block btn-primary " id="btn-print-vital">Print Sheet</button>
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
                                                    Date &amp; Time
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    B.P SYS
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    B.P DIA
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Pulse Rate
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Body Temperature
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Resperatory Rate
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Height
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Weight
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    BMI
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $count = 0;
                                            if (!empty($vitals_list)) {
                                                foreach ($vitals_list as $index => $v_key) {
                                                    ?>

                                                    <tr role="row" class="odd">

                                                        <td class="sorting_1" id="regNo"><?php echo $index + 1; ?>
                                                            <input type="hidden" class="vitalID" value="<?php echo $v_key['vital_id']; ?>" id="regisno">
                                                        </td>
                                                        <?php
                                                        $datetime = $v_key['vital_timestamp'];
                                                        $dates = explode(' ', $datetime);
                                                        $date = $dates[0];
                                                        $time = $dates[1];
                                                        $date = date('d-m-Y', strtotime($date));
                                                        $time = date('h:i:s', strtotime($time));
                                                        ?>
                                                        <td><div class="input-group date bootstrap-timepicker timepicker">

                                                                <div class="col-md-12" style="padding: 0;">
                                                                    <input type="text" class="form-control pull-right datepicker-vital" id="" name="vitals-date" autocomplete="off" placeholder="Set Date" style="width:100%" value="<?php echo $date; ?>">
                                                                </div>
                                                                <div class="col-md-12" style="padding: 0;">
                                                                    <input type="text" class="form-control pull-right timepicker-vital" id="" name="vitals-time" placeholder="Set Time" style="width:100%" value="<?php echo $time; ?>">
                                                                </div>
                                                            </div></td>
                                                        <td>
                                                            <?php
                                                            $bp = $v_key['vital_bp'];

                                                            $exploder = explode('-', $bp);
                                                            ?>
                                                            <input type="text" value="<?php echo $exploder[0]; ?>" class="editdatatab" id="bp1" />

                                                        </td>
                                                        <td>
                                                            <input type="text" value="<?php echo $exploder[1]; ?>" class="editdatatab" id="bp2" />
                                                        </td>
                                                        <td><input type="text" value="<?php echo $v_key['vital_pulse']; ?>" class="editdata" id="pulse" ></td>
                                                        <td><input type="text" value="<?php echo $v_key['vital_temp']; ?>" class="editdata" id="temp" /></td>
                                                        <td><input type="text" value="<?php echo $v_key['vital_resp_rate']; ?>" class="editdata" id="resp" /></td>
                                                        <td><input type="text" value="<?php echo $v_key['vital_height']; ?>" class="editdata" id="height" /></td>
                                                        <td><input type="text" value="<?php echo $v_key['vital_weight']; ?>" class="editdata" id="weight" /></td>
                                                        <td><input type="text" value="<?php echo $v_key['vital_bmi']; ?>" class="editdata" id="bmi" /></td>
                                                        <td>
                                                            <button class="btn btn-default delete-vital">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </button>
                                                            <br />
                                                            <button class="btn btn-default update-vital ">
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
                                                <td>
                                                    <div class="input-group date bootstrap-timepicker timepicker">
                                                        <div class="col-md-12" style="padding: 0;">
                                                            <input type="text" class="form-control pull-right datepicker-vital-rw" id="datepic" name="vitals-date-rw" autocomplete="off" placeholder="Set Date" style="width:100%" >
                                                        </div>
                                                        <div class="col-md-12" style="padding: 0;">
                                                            <input type="text" class="form-control pull-right timepicker-vital-rw"  name="vitals-time-rw" placeholder="Set Time" style="width:100%">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td><input type="text" class="editdata cursre-onload" id="bp1"></td>
                                                <td><input type="text" class="editdata" id="bp2"></td>
                                                <td><input type="text" class="editdata" id="pulse"></td>
                                                <td><input type="text" class="editdata" id="temp"></td>
                                                <td><input type="text" class="editdata" id="resp"></td>
                                                <td><input type="text" class="editdata" id="height"></td>
                                                <td><input type="text" class="editdata" id="weight"></td>
                                                <td><input type="text" class="editdata" id="bmi"></td>
                                                <td><button class="btn btn-default vital-save" id="save-vital">
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
                 <?php   }
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
            $(".vital-save").click(function () {
                var tr = $(this).closest('tr');
                var regno = $('#regsno').text();
                var vitaldate = $('.datepicker-vital-rw').val();
                var vitaltime = $('.timepicker-vital-rw').val();
                var vitalId = $('#regisno').val();
                var vitalbp1 = tr.find('#bp1').val();
                var vitalbp2 = tr.find('#bp2').val();
                var vitalpulse = tr.find('#pulse').val();
                var vitaltemp = tr.find('#temp').val();
                var vitalresp = tr.find('#resp').val();
                var vitalheight = tr.find('#height').val();
                var vitalweight = tr.find('#weight').val();
                var vitalbmi = tr.find('#bmi').val();
                $.ajax({
                    url: "<?php echo base_url(); ?>dashboard/save_vital_report/",
                    type: "post",
                    data: {
                        regno: regno,
                        vitalId: vitalId,
                        vitaldate: vitaldate,
                        vitaltime: vitaltime,
                        vitalbp1: vitalbp1,
                        vitalbp2: vitalbp2,
                        vitalpulse: vitalpulse,
                        vitaltemp: vitaltemp,
                        vitalresp: vitalresp,
                        vitalheight: vitalheight,
                        vitalweight: vitalweight,
                        vitalbmi: vitalbmi

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
                        location.reload();
                        console.log(data);
                    }
                });

//                var new_row = '<tr><td><?php echo $count = $count + 2; ?></td><td><div class="input-group date bootstrap-timepicker timepicker"><div class="col-md-12" style="padding: 0;"><input type="text" class="form-control pull-right datepicker-vital" id="" name="vitals-date" autocomplete="off" placeholder="Set Date" style="width:100%"></div><div class="col-md-12" style="padding: 0;"><input type="text" class="form-control pull-right timepicker-vital" id="" name="vitals-time" placeholder="Set Time" style="width:100%"></div></div></td><td><input type="text" class="editdata"></td><td><input type="text" class="editdata"></td><td><input type="text" class="editdata"></td><td><input type="text" class="editdata"></td><td><input type="text" class="editdata"></td><td><input type="text" class="editdata"></td><td><input type="text" class="editdata"></td><td><input type="text" class="editdata"></td><td><button class="btn btn-default save-vital" ><i class="fa fa-save" aria-hidden="true"></i></button></td></tr>';
//                $('#vitals-search').append(new_row);
//                return false;
            });

            $(".update-vital").click(function () {
                var tr = $(this).closest('tr');
                var regno = $('#regsno').text();
                var vitalId = tr.find('.vitalID').val();
                var vitaldate = $('.datepicker-vital').val();
                var vitaltime = $('.timepicker-vital').val();
                var vitalbp1 = tr.find('#bp1').val();
                var vitalbp2 = tr.find('#bp2').val();
                var vitalpulse = tr.find('#pulse').val();
                var vitaltemp = tr.find('#temp').val();
                var vitalresp = tr.find('#resp').val();
                var vitalheight = tr.find('#height').val();
                var vitalweight = tr.find('#weight').val();
                var vitalbmi = tr.find('#bmi').val();
                $.ajax({
                    url: "<?php echo base_url(); ?>dashboard/vital_update/",
                    type: "post",
                    data: {
                        regno: regno,
                        vitalId: vitalId,
                        vitaldate: vitaldate,
                        vitaltime: vitaltime,
                        vitalbp1: vitalbp1,
                        vitalbp2: vitalbp2,
                        vitalpulse: vitalpulse,
                        vitaltemp: vitaltemp,
                        vitalresp: vitalresp,
                        vitalheight: vitalheight,
                        vitalweight: vitalweight,
                        vitalbmi: vitalbmi

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
                $(".cursre-onload").focus();
            });



        </script>
    </body>
</html>
