<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        New Operation Theatre Booking
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('dashboard/operation_theatre/'); ?>"> New Operation Theatre Booking</a>
        </li>
    </ol>
    <br>
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
                              action="#details">
                            <select class="patName-select form-control select2" name="search_by_cnic" id="search_by_cnic">
                                <?php foreach ($patients as $patient): ?>
                                    <option value="<?php echo $patient['regNo']; ?>"<?php echo isset($filter)&&($filter == $patient['regNo'])?'selected':''; ?>>
                                        <?php echo $patient['patName'].' '.$patient['patNoKType'].' '.$patient['patNoK']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <?php if (!empty($patient_list)) {
        foreach ($patient_list as $p_key) { ?>
            <div class="box  box-primary">
                <div class="box-header with-border" id="details">
                    <h3 class="box-title">Patient Information</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>MR#</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><?php echo $p_key['regNo']; ?></label>
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
                                        <label><?php echo $p_key['patName']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>S/O, D/O, W/O</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><?php echo $p_key['patNoK']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Sex</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><?php echo $p_key['patSex']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Age</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><?php echo $p_key['patAge']; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Disease</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><?php $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']);
                                            echo $disease->disease_name; ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Ward Number</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><?php $ward_list = $this->model_hms->get_ward_by_id($p_key['patward_id']);
                                            echo $ward_list->wardName; ?></label>

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
                                        <label>
                                            <?php
                                            //echo $p_key['patbed_id'];
                                            $bedNo = $this->model_hms->get_bed_name_wrt_ward($p_key['patbed_id']);
                                            if ($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed") {
                                                echo "Extra Bed " . $bedNo->bed;
                                            } else {
                                                echo $bedNo->bed;
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Admission Date</label>
                                    </div>
                                    <div class="col-md-6">
                                        <label><?php echo $p_key['patAdmDate'] ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        <?php }
    } ?>
    <form data-action="<?php echo base_url('dashboard/insert_ot_booking_db'); ?>"
          class="submit-form" method="post" id="ot_booking_form">
        <?php if (!empty($patient_list)) {
            foreach ($patient_list as $p_key) { ?>
                <input type="hidden" class="form-control" name="ot-patno"
                       value="<?php echo $p_key['regNo']; ?>">
                <input type="hidden" class="form-control" name="ot-patname"
                       value="<?php echo $p_key['patName']; ?>">
                <div class="box  box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Operation Information</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Surgeon</label>
                                <select class="form-control ot-surgeon select2" id="ot-surgeon-name"
                                        name="ot-surgeon-name" required="required">
                                    <option></option>
                                    <?php $surgeon_list = $this->model_hms->get_surgeon_list(); ?>
                                    <?php if (!empty($surgeon_list)) {
                                        foreach ($surgeon_list as $sl_key) { ?>
                                            <option value="<?php echo $sl_key['id']; ?>"><?php echo $sl_key['full_name']; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Operation Theatre</label>
                                <select required="required" class="form-control ot-ward select2"  name="ot-ward">
                                    <option></option>
                                    <?php $operation_theatre = $this->model_hms->get_operation_theatre_list(); ?>
                                    <?php if (!empty($operation_theatre)) {
                                        foreach ($operation_theatre as $opt_key) { ?>
                                            <option value="<?php echo $opt_key['otwardId']; ?>"><?php echo $opt_key['otwardName']; ?></option>
                                        <?php }
                                    } ?>
                                </select>
                            </div><!-- /.col -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Operation Procedure</label>
                                <input required="required" class="form-control"
                                       style="width: 100%;"
                                       name="operation-type" Required placeholder="Type Operation Procedure" maxlength="100" tabindex="3" id="tab3">
                            </div><!-- /.col -->
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Patient Status</label>
                                <input required="required" class="form-control "
                                       style="width: 100%;"
                                       name="patient-status" Required placeholder="Type Patient Status" maxlength="30" tabindex="4" id="tab4">
                            </div>
                        </div><!-- /.col -->
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Operation Date &amp; Time</label>
                                <div class="input-group date bootstrap-timepicker timepicker">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <div class="col-md-6" style="padding: 0;">
                                        <input type="text" class="form-control pull-right" id="datepicker-ot"
                                               name="opDateTime" autocomplete="off" placeholder="Set Date" tabindex="5">
                                    </div>
                                    <div class="col-md-6" style="padding: 0;">
                                        <input type="text" class="form-control pull-right" id="timepicker1"
                                               name="opTime" placeholder="Set Time" tabindex="6">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group"></div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                                <button type="submit" class="btn bg-blue margin ot_booking_btn">
                                    <i class="fa fa-address-book-o" aria-hidden="true"></i> &nbsp;Book Operation Theatre
                                </button>
                            </div>
                        </div><!-- /.col -->
                    </div>
                </div>
            <?php }
        } ?>
    </form>

</section>
<!-- /.content -->
<script>
    $(document).ready(function () {
        $('.select2').select2();
        $('#datepicker-ot').datepicker({
            format: 'yyyy-mm-dd'
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });;
        $('#timepicker1').timepicker({
            defaultTime: false
        });

    });
</script>