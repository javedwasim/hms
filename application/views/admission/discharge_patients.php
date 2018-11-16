<div id="patient_list_container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Discharge Patients
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('/dashboard/discharge_patients/'); ?>"> Discharge Patient</a></li>

        </ol>
        <br>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12" style="float: right;">
                <div class="info-box">
                    <span class="info-box-icon bg-green">
                        <i class="fa fa-bed" aria-hidden="true"></i>
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
                    <button type="button" class="btn btn-box-tool" data-widget="collapse">
                        <i class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>MR# or Patient Name</label>
                            <form name="search-by-name" id="search-by-name" method="get" action="#details">
                                <select class="patient-discharge-select form-control select2" name="search_by_cnic">
                                    <option value=""></option>
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
        <?php if (!empty($patient_list)) { ?>
            <div class="box  box-primary">
                <div class="box-header with-border" id="details">
                    <h3 class="box-title">Search Results</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse">
                            <i  class="fa fa-minus"></i></button>
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
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if (!empty($patient_list)) {
                                                foreach ($patient_list as $p_key) { ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"
                                                            id="regNo<?php echo $p_key['regNo']; ?>"><?php echo $p_key['regNo']; ?></td>
                                                        <td><?php echo $p_key['patName']; ?></td>
                                                        <td><?php echo $p_key['patNoK']; ?></td>
                                                        <td><?php echo $p_key['patSex']; ?></td>
                                                        <td><?php echo $p_key['patbed_id']; ?></td>
                                                        <td><?php echo $p_key['patward_id']; ?></td>
                                                        <td><?php $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']); echo $disease->disease_name; ?></td>
                                                        <td><?php $date = $p_key['patAdmDate']; $datetime = date(' d-m-Y h:i a', strtotime($date)); echo $datetime; ?></td>
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
                                                    </tr>
                                                <?php }
                                            } ?>


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
</div>
<div class="modal fade" tabindex="-1" role="dialog" id="discharge-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Discharge Patient</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-4"><label>Outcome of the Patient:</label></div>
                    <div class="col-md-8">
                        <input type="radio" required="required" name="outcome"
                               class="discharge-custom-radio" id="outcome-cured" value="Cured"><label
                            class="radio-labels"> Cured</label>
                        <input type="radio" required="required" name="outcome"
                               class="discharge-custom-radio" id="outcome-lama" value="LAMA"><label
                            class="radio-labels"> LAMA</label>
                        <input type="radio" required="required" name="outcome"
                               class="discharge-custom-radio" id="outcome-Discharged"
                               value="Discharged"><label class="radio-labels"> Discharged</label>
                        <input type="radio" required="required" name="outcome"
                               class="discharge-custom-radio" id="outcome-referred" value="Referred"><label
                            class="radio-labels"> Referred</label>
                        <input type="radio" required="required" name="outcome"
                               class="discharge-custom-radio" id="outcome-referred" value="Referred"><label
                            class="radio-labels"> Death</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Discharge Advice:</label>
                    </div>
                    <div class="col-md-8">
                                    <textarea id="discharge-advice" class="form-control" rows="3"
                                              placeholder="Input Discharge advice here..."
                                              autocomplete="off"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <label>Discharge Date</label>
                    </div>
                    <div class="col-md-8">
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control" id="dischargeDate" name="dischareDate"  required="required">
                        </div><!-- /.form-group -->
                    </div>
                </div>

                <label>Is the patient being shifted?</label>
                <input type="checkbox" id="chkshift">

                <div class="row shift-menu" style="display: none">
                    <br>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Shifted From</label>
                            <select class="form-control shifted-from" name="shifted-from"
                                    style="width: 100%;" required="required">
                                <option></option>
                                <option>OPD</option>
                                <option>Emergency</option>
                            </select>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Shifted To</label>
                            <input class="form-control" type="text" id="shifted-to" name="shift-to"
                                   placeholder="Input Department Name" required="required">
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Shifted By</label>
                            <input class="form-control" type="text" id="shift-by" name="shift-by"
                                   placeholder="Input Doctor's Name" required="required">
                        </div>
                    </div>
                </div><!-- /.modal-content -->

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary btn-flat" id="discharge-submit"><i class="fa fa-floppy-o" aria-hidden="true"> </i>&nbsp; Save &amp; Print
                        Information
                    </button>
                </div>
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
</div>
<script>
    $(document).ready(function () {
        $('.select2').select2();
        $('#chkshift').on('ifChecked', function () {
            $('.shift-menu').removeAttr("style").attr("style", "display:block");

        });
        $('#chkshift').on('ifUnchecked', function () {
            $('.shift-menu').removeAttr("style").attr("style", "display:none");
        });

        $('input').iCheck({
            checkboxClass: 'icheckbox_flat',
            radioClass: 'iradio_flat',
            increaseArea: '20%' // optional
        });

        $('#discharge-submit').click(function () {

            var regNo = $('#regNo').val();
            var emergencyno = $('#emergency_no').val();
            var admino = $('#admi_no').val();
            var patName = $('#patName').val();
            var patNoKType = $('#patNoKType').val();
            var patNoK = $('#patNoK').val();
            var patDoB = $('#patDoB').val();
            var patAge = $('#patAge').val();
            var patMonthAge = $('#patMonthAge').val();
            var patDaysAge = $('#patDaysAge').val();
            var patBldGrp = $('#patBldGrp').val();
            var patDisease_id = $('#patDisease_id').val();
            var patSex = $('#patSex').val();
            var patCNIC = $('#patCNIC').val();
            var patAddress = $('#patAddress').val();
            var patOccupation = $('#patOccupation').val();
            var patPhone = $('#patPhone').val();
            var patEntitled = $('#patEntitled').val();
            var garName = $('#garName').val();
            var garCnic = $('#garCnic').val();
            var garContact = $('#garContact').val();
            var garRelation = $('#garRelation').val();
            var patunit_Id = $('#patunit_Id').val();
            var patShiftedFrom = $('#patShiftedFrom').val();
            var patward_id = $('#patward_id').val();
            var patbed_id = $('#patbed_id').val();
            var patAdmDate = $('#patAdmDate').val();
            var patChart_id = $('#patChart_id').val();
            var patStatus = $('.discharge-custom-radio:checked').val();
            var dischargeadvice = $('#discharge-advice').val();
            var shiftedFrom = $('.shifted-from').val();
            var shiftedTo = $('#shifted-to').val();
            var shiftedBy = $('#shift-by').val();
            var outcome = $('.discharge-custom-radio:checked').val();
            var patID = $('#regNo').val();
            var check = $('#chkshift').prop("checked");
            var FreeCarePatient = $('#FreeCarePatient').val();
            var patient_pic_path = $('#patient_pic_path').val();
            var discharge_date = $('#dischargeDate').val();
            console.log('starting ajax' + check);
            setTimeout(function () {
                var win = window.open(base_url + 'dashboard/discharge_sheet_print/?search_by_cnic=' + patID, '_blank');
                if (win) {
                    console.log("new tab opened");
                    win.focus();
                } else {
                    //Browser has blocked it
                    alert('Please allow popups for this website');
                }
            }, 1000);

            if (check == true) {
                if (shiftedFrom !== '' && shiftedTo !== '' && shiftedBy !== '' && outcome !== '' && patID !== '') {
                    $.ajax({
                        url: base_url + "index.php/dashboard/insert_discharge_db/",
                        type: "post",
                        data: {
                            regNo: regNo,
                            emergencyno: emergencyno,
                            admino: admino,
                            patName: patName,
                            patNoKType: patNoKType,
                            patNoK: patNoK,
                            patDoB: patDoB,
                            patAge: patAge,
                            patMonthAge: patMonthAge,
                            patDaysAge: patDaysAge,
                            patBldGrp: patBldGrp,
                            patDisease_id: patDisease_id,
                            patSex: patSex,
                            patCNIC: patCNIC,
                            patAddress: patAddress,
                            patOccupation: patOccupation,
                            patPhone: patPhone,
                            patEntitled: patEntitled,
                            garName: garName,
                            garCnic: garCnic,
                            garContact:garContact,
                            garRelation: garRelation,
                            patunit_Id: patunit_Id,
                            patShiftedFrom: patShiftedFrom,
                            patward_id: patward_id,
                            patbed_id: patbed_id,
                            patAdmDate: patAdmDate,
                            patChart_id: patChart_id,
                            patStatus: patStatus,
                            shiftFrom: shiftedFrom,
                            shiftTo: shiftedTo,
                            shiftPatId: patID,
                            patOutcome: outcome,
                            shiftBy: shiftedBy,
                            discharge_advice: dischargeadvice,
                            FreeCarePatient: FreeCarePatient,
                            patientPicPath: patient_pic_path,
                            dischargeDate: discharge_date
                        },
                        success: function (data) {
                            $('#discharge-modal').modal('hide');
                            $('#status').text("Discharged");
                            $('.wrapper').append('<div style="position: fixed;\n' +
                                'top: 20px;\n' +
                                'right: 20px;\n' +
                                'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                                '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                                'Patient has been Discharged Successfully.\n' +
                                '</div>');
                            $('.alert-success').delay(4000).fadeOut('slow');


                        }
                    });

                }
                else {
                    alert("Please fill in the Shift Information to proceed!");
                }
            }
            else {
                if ($('.discharge-custom-radio:checked').prop("checked") === true && dischargeadvice !== "") {
                    $.ajax({
                        url: base_url + "index.php/dashboard/insert_discharge_db/",
                        type: "post",
                        data: {
                            regNo: regNo,
                            emergencyno: emergencyno,
                            admino: admino,
                            patName: patName,
                            patNoKType: patNoKType,
                            patNoK: patNoK,
                            patDoB: patDoB,
                            patAge: patAge,
                            patMonthAge: patMonthAge,
                            patDaysAge: patDaysAge,
                            patBldGrp: patBldGrp,
                            patDisease_id: patDisease_id,
                            patSex: patSex,
                            patCNIC: patCNIC,
                            patAddress: patAddress,
                            patOccupation: patOccupation,
                            patPhone: patPhone,
                            patEntitled: patEntitled,
                            garName: garName,
                            garCnic: garCnic,
                            garContact:garContact,
                            garRelation: garRelation,
                            patunit_Id: patunit_Id,
                            patShiftedFrom: patShiftedFrom,
                            patward_id: patward_id,
                            patbed_id: patbed_id,
                            patAdmDate: patAdmDate,
                            patChart_id: patChart_id,
                            patStatus: patStatus,
                            discharge_advice: dischargeadvice,
                            FreeCarePatient: FreeCarePatient,
                            patientPicPath: patient_pic_path,
                            dischargeDate: discharge_date
                        },
                        success: function (data) {
                            $('#discharge-modal').modal('hide');
                            $('#status').text("Discharged");
                            $('.wrapper').append('<div style="position: fixed;\n' +
                                'top: 20px;\n' +
                                'right: 20px;\n' +
                                'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                                '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                                'Patient has been Discharged Successfully.\n' +
                                '</div>');
                            $('.alert-success').delay(4000).fadeOut('slow');

                        }
                    });
                }
                else {
                    alert("Please select an option from the Outcome options and fill the discharge advice!")
                }
            }
        });

        $('#dischargeDate').datepicker({
            format: 'yyyy-mm-dd'
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

    });
</script>