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
                            <select class="patName-select form-control select2" name="search_by_cnic" id="daily_vital_report">
                                <option value="">Please select</option>
                                <?php foreach ($patients as $patient): ?>
                                    <option value="<?php echo $patient['regNo']; ?>"<?php echo isset($filter)&&($filter == $patient['regNo'])?'selected':''; ?>>
                                        <span><?php echo $patient['regNo'].' '; ?></span><?php echo $patient['patName'].' '.$patient['patNoKType'].' '.$patient['patNoK']; ?></option>
                                <?php endforeach; ?>
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
                    <div class="col-sm-12" id="vital_chart_report">
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
                                        <td>
                                            <div class="input-group date bootstrap-timepicker timepicker">

                                                <div class="col-md-12" style="padding: 0;">
                                                    <input type="text" class="form-control pull-right datepicker-vital" id="" name="vitals-date" autocomplete="off" placeholder="Set Date" style="width:100%" value="<?php echo $date; ?>">
                                                </div>
                                                <div class="col-md-12" style="padding: 0;">
                                                    <input type="text" class="form-control pull-right timepicker-vital" id="" name="vitals-time" placeholder="Set Time" style="width:100%" value="<?php echo $time; ?>">
                                                </div>
                                            </div>
                                        </td>
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
                                            <button class="btn btn-default delete-vital"
                                                data-href="<?php echo $v_key['vital_id']; ?>"
                                                data-patientid="<?php echo $v_key['regNo']; ?>">
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
<script>

    $(document).ready(function () {
        $(".cursre-onload").focus();

        $('.datepicker-vital-rw').datepicker({
            format: 'd-m-yyyy',
            autohide: true,
        });
        $('.timepicker-vital-rw').timepicker({
            defaultTime: false
        });

        $('.select2').select2();

        var isVisible = 0;
        $('.new-report').hide();
        $('.btn-new-report').on('click', function () {

            switch (isVisible) {
                case 0:
                    $('.new-report').slideDown();
                    isVisible = 1;
                    $('html, body').animate({
                        scrollTop: $("#add-a-report").offset().top
                    }, 2000);
                    break;
                case 1:
                    $('.new-report').slideUp();
                    isVisible = 0;
                    //alert(0);
                    break;

                default:
                    isVisible = 0;
            }
        });

    });
</script>