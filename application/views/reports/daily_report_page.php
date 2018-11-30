<section class="content-header">
    <h1>
        Daily Reports
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('dashboard/daily_report_page'); ?>">Daily Report</a></li>
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
                        <form name="search-by-name" id="search-by-pat-name" method="get"
                              action="<?php echo base_url('dashboard/daily_reports'); ?>">
                            <select class="patname-select form-control select2" name="search_by_cnic" id="daily_report_search">
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
    <div class="box  box-primary">
        <div class="box-header with-border">
            <?php
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
                                <p><?php
                                    $wardNo = $this->model_hms->get_ward_by_id($p_key['patward_id']);
                                    echo $wardNo->wardName;
                                    ?></p>
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
    <?php
    }
    }
    ?>
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
                    <table id="reports-search" class="table table-bordered table-hover dataTable"
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
<!--                            --><?php //foreach ($daily_report as $report): ?>
<!--                                <tr>-->
<!--                                    <td>--><?php //echo $report['id']; ?><!--</td>-->
<!--                                    <td>--><?php //echo $report['id']; ?><!--</td>-->
<!--                                </tr>-->
<!--                            --><?php //endforeach; ?>
                        </tbody>
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
            <form action="" method="post" enctype="multipart/form-data" autocomplete="off" id="daily_report_form">
                <input type="hidden" name="regNo" value="<?php echo $patient_list[0]['regNo']; ?>">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Date</label>
                            <div class="input-group date bootstrap-timepicker timepicker">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input class="form-control " name="drp_date"  type="text" id="drp-date" placeholder="Select Time " autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>DOA/POD</label>
                            <input class="form-control" id="drp-doa" name="drp_doa" maxlength="10" placeholder="DOA/POD" >
                        </div>
                        <div class="form-group">
                            <label>A/C</label>
                            <input class="form-control" id="dr-pac"  type="text" maxlength="10" name="drp_ac" placeholder="A/C">
                        </div>
                        <div class="form-group">
                            <label>Pulse</label>
                            <input class="form-control" id="drp-pulse" name="drp_pulse" maxlength="10" placeholder="Pulse" >
                        </div>
                        <div class="form-group">
                            <label>R.R</label>
                            <input class="form-control" id="drp-rr" name="drp_rr" placeholder="R.R" maxlength="10" >
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Time</label>
                            <div class="input-group date bootstrap-timepicker timepicker">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input class="form-control "  type="text"
                                       id="drp-time" name="drp_time" placeholder="Select Time" autocomplete="off">
                            </div>
                        </div>
                        <div class="form-group">
                            <label>C/O</label>
                            <input type="text" class="form-control" id="drp-co" name="drp_co" maxlength="10" placeholder="C/O"  />
                        </div>
                        <div class="form-group">
                            <label>Wound Examination</label>
                            <input class="form-control" id="drp-wound"  maxlength="10" type="text" name="drp_wound" placeholder="Wound Examination">
                        </div>
                        <div class="form-group">
                            <label>B.P</label>
                            <input type="text" class="form-control" id="drp-bp" name="drp_bp" maxlength="10" placeholder="B.P"  />
                        </div>
                        <div class="form-group">
                            <label>Temp</label>
                            <input type="text" class="form-control" id="drp-temp" name="drp_temp" maxlength="10" placeholder="Temp"  />
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Dressing</label>
                            <textarea class="form-control" id="drp-dressing" name="drp_dressing" maxlength="10" placeholder="Dressing" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <h3 class="text-muted" style="margin-left: 12px;">Systemic Examination</h3>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>GIT</label>
                            <input class="form-control" id="drp-git"  maxlength="10" type="text" name="drp_git" placeholder="GIT">
                        </div>
                        <div class="form-group">
                            <label>CVS</label>
                            <input class="form-control" type="text" id="drp-cvs" name="drp_cvs" maxlength="10" placeholder="CVS" >
                        </div>
                        <div class="form-group">
                            <label>CNS</label>
                            <input type="text" class="form-control" id="drp-cns" name="drp_cns" maxlength="10" placeholder="CNS" >
                        </div>
                        <div class="form-group">
                            <label>Resp.</label>
                            <input class="form-control" type="text" id="drp-resp" name="drp_resp" maxlength="10" placeholder="Resp" >
                        </div>
                        <div class="form-group">
                            <label>Intake</label>
                            <input type="text" class="form-control" id="drp-intake" name="drp_intake" maxlength="10" placeholder="Intake" >
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Output(NG/Foley's / DRAINS)</label>
                            <input type="text" class="form-control" id="drp-output" name="drp_output" maxlength="10" placeholder="Output(NG/Foley's / DRAINS)" >
                        </div>
                        <div class="form-group">
                            <label>Pt. Seen by 1 House Officer</label>
                            <input type="text"  class="form-control" id="drp-seenby-officer"  maxlength="10" name="drp_pt_seen" placeholder="Pt. Seen by 1 House Officer">
                        </div>
                        <div class="form-group">
                            <label>MO/PGR</label>
                            <input type="text" class="form-control" id="drp-pgr" name="drp_pgr" maxlength="10" placeholder="MO/PGR" >
                        </div>
                        <div class="form-group">
                            <label>Plan</label>
                            <input class="form-control" id="drp-plan"  maxlength="10" type="text" name="drp_plan" placeholder="Plan">
                        </div>
                        <div class="form-group">
                            <label>Consultant Advice</label>
                            <input type="text" class="form-control" id="drp-consultant" maxlength="10" name="drp_consultant" placeholder="Consultant Advice" >
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="form-group" style="margin-top: 15px;">
                            <input type="submit" class="btn btn-block btn-primary" name="btn-daily-report-submit" value="Add New Report">
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>
            </form>
        </div><!-- /.col -->
    </div>
</section>

<script>
    $(document).ready(function () {
        $('#drp-date').datepicker({
            format: 'yyyy-mm-dd',
            autohide:true,
        });

        $('#drp-time').timepicker({
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

        $("#daily_report_form").on('submit',(function(e) {
            e.preventDefault();
            var base_url = $('#base').val();
            $.ajax({
                url: base_url+'dashboard/save_daily_report',
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function()
                {
                    $("#err").fadeOut();
                },
                success: function(response)
                {
                    if(response.success){
                        $('#report_list_container').empty();
                        toastr["success"](response.message);
                    }else{
                        toastr["error"](response.message);
                    }
                },
                error: function(e)
                {
                    toastr["error"]('seem to be an error');
                }
            });
        }));

    });
</script>