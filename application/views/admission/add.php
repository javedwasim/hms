<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        New Admission
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('/dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('/dashboard/new_admission/'); ?>"> New Admission</a></li>
    </ol>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12" style="float: right;">
            <div class="info-box">
                    <span class="info-box-icon bg-green"><i class="fa fa-bed" aria-hidden="true"></i>
                    </span>

                <div class="info-box-content">
                    <span class="info-box-text">Admission Statistics</span>
                    <span class="info-box-number"><span
                            style="font-size: 20px"><?php $patcount = $this->model_hms->patient_counter();
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
    <form action="<?php echo base_url('dashboard/insert_user_db'); ?>" class="submit-form" method="post"
          enctype="multipart/form-data" id="add_patient_form">
        <div class="box  box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Patient Personal Information</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>MR#</label>
                            <input class="form-control" type="text" name="RegNumber" id="regName" placeholder="MR#" readonly
                                   value="<?php if (!empty($reg_num)) { foreach ($reg_num as $reg) {  echo $reg["regNo"] + 1; } } ?>">
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Emergency/OPD Number</label>
                            <input tabindex=1 class="form-control" maxlength="12" type="text" id="emergency_no"
                                   name="emergency_no" placeholder="Type Number"
                                   onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"/>
                        </div><!-- /.form-group -->

                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Admission Number</label>
                            <input tabindex=2 class="form-control" maxlength="12" type="text" id="admi_no"
                                   name="admi_no" placeholder="Type Number"
                                   onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"/>
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Name</label>
                            <input tabindex=3 class="form-control" maxlength="15" type="text"
                                   id="patName" name="patName" placeholder="Type Name">
                        </div><!-- /.form-group -->

                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Next of Kin</label>
                        <div class="form-group">
                            <div class="col-md-4" style="padding: 0">
                                <select tabindex=4 class="form-control next-of-kin"
                                        style="width: 100%;" name="patNoKType" id="id1">
                                    <option></option>
                                    <option value="S/O">S/O</option>
                                    <option value="D/O">D/O</option>
                                    <option value="W/O">W/O</option>
                                </select>
                            </div>
                            <div class="col-md-8" style="padding: 0">
                                <input tabindex=5 class="form-control" maxlength="15" required="required"
                                       type="text" id="guardianName" name="patNoK"
                                       placeholder="Enter name"/>
                            </div>
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Sex</label>
                            <br>
                            <input type="radio" name="patSex" class="custom-radio"
                                   id="sex-male" value="Male" checked="checked"><label class="radio-labels">
                                Male</label>
                            <input type="radio" name="patSex" class="custom-radio"
                                   id="sex-female" value="Female"><label class="radio-labels"> Female</label>
                            <input type="radio" name="patSex" class="custom-radio"
                                   id="sex-other" value="Other"><label class="radio-labels"> Other</label>
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->

                    <div class="col-md-2">
                        <div class="form-group">

                            <label>Age in years</label>
                            <input tabindex=6 class="form-control" maxlength="3" type="text" name="patAge"
                                   id="patAge" placeholder="Years">
                        </div><!-- /.form-group -->
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Months</label>
                            <input tabindex=7 class="form-control" maxlength="2" type="text" name="patMonthAge"
                                   placeholder="months">
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Days</label>
                            <input tabindex=8 class="form-control" maxlength="2" type="text" name="patDaysAge"
                                   placeholder="Days">
                        </div>
                    </div><!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Select Blood Group</label>
                        <div class="form-group">
                            <select class="form-control bld-grp" style="width: 100%;"
                                    tabindex="9" name="patBldGrp">
                                <option></option>
                                <option value="A+VE">A+VE</option>
                                <option value="A-VE">A-VE</option>
                                <option value="B+VE">B+VE</option>
                                <option value="B-VE">B-VE</option>
                                <option value="AB+VE">AB+VE</option>
                                <option value="AB-VE">AB-VE</option>
                                <option value="O+VE">O+VE</option>
                                <option value="O-VE">O-VE</option>
                            </select>
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="col-md-9" style="padding: 0">
                                <label>Disease</label>
                                <select tabindex=10 class="form-control disease select2" style="width: 100%;" name="patDisease_id" id="id10">
                                    <option value="">Please select</option>
                                    <?php foreach ($diseases as $disease): ?>
                                        <option value="<?php echo $disease['disease_id']; ?>"><?php echo $disease['disease_name']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="col-md-3" style="margin-top: 25px;padding: 0">
                                <a href="<?php echo base_url('/dashboard/insert_diseases'); ?>" class="btn btn-default btn-sm" style="font-size: 10px;padding: 8px 10px;">Add disease</a>
                            </div>
                        </div>
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <label>Occupation</label>
                        <input tabindex=11 class="form-control" maxlength="15" type="text" id="occupation"
                               name="patOccupation" placeholder="Type Occupation">
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>CNIC</label>
                            <input tabindex=12 class="form-control" maxlength="15" type="text" name="patCNIC"
                                   id="cnic" placeholder="Type CNIC number" maxlength="15" autocomplete="off"
                                   onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"/>
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->

                </div><!-- /.row -->
                <div class="row">

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Address</label>
                            <input tabindex=13 type="text" class="form-control" maxlength="30" id="address"
                                   name="patAddress" placeholder="Type Address"/>
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>City</label>
                            <select class="form-control patcity select2" name="patcity">
                                <option value="">Please select</option>
                                <?php foreach ($cities as $city): ?>
                                    <option value="<?php echo $city['city']; ?>"><?php echo $city['city']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Phone</label>
                            <input tabindex=15 class="form-control" maxlength="11" type="text"
                                   onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                                   id="phone" name="patPhone" placeholder="Type Phone Number" maxlength="11"/>
                        </div><!-- /.form-group -->

                    </div><!-- /.col -->

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Entitled</label>
                            <br>
                            <input tabindex=16 type="radio" name="patEntitled"
                                   class="custom-radio entitled-rad" id="entitled-true" value="Yes"><label
                                class="radio-labels">Yes</label>
                            <input type="radio" name="patEntitled"
                                   class="custom-radio entitled-rad" id="entitled-false" value="No" checked="checked">
                            <label class="radio-labels"> No</label>
                            <br>
                            <label class="customlabel hide-label">(If Yes attach valid documents)</label>
                        </div><!-- /.form-group -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3">
                        <label>Attach Photo (Optional)</label>
                        <?php if (!empty($error)) {
                            echo $error;
                        } ?>
                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                 style="width: 65px; height: 70px;">
                                <i class="fa fa-user" aria-hidden="true" style="font-size: 4em;"></i>
                            </div>
                            <div style="display: inline;">
                    <span class="btn btn-default btn-file"><span
                            class="fileinput-new">Select image</span><span
                            class="fileinput-exists">Change</span>
                        <input tabindex=17 type="file" name="patientphoto" size="20"/>
                    </span>
                                <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.box-body -->
        </div>
        <div class="box  box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Guardian Information</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Guardian Name</label>
                        <input class="form-control" type="text" maxlength="12" name="garName"
                               placeholder="Enter Guardian Name" id="id17" tabindex=18>
                    </div>
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>CNIC</label>
                        <input class="form-control" type="text" maxlength="15" name="garCnic" id="garcnic"
                               placeholder="Type CNIC number" maxlength="15" autocomplete="off" tabindex=19
                               onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"/>
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Contact Number</label>
                        <input class="form-control" type="text" maxlength="11" name="garContact"
                               placeholder="Type Phone Number"
                               onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                               maxlength="11" id="id19" tabindex=20/>
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Relationship</label>
                        <select class="form-control gar-relation" style="width: 100%;" name="garRelation" id="id20" tabindex=21>
                            <option value="">Please select</option>
                            <option value="Father">Father</option>
                            <option value="Mother">Mother</option>
                            <option value="Brother">Brother</option>
                            <option value="Sister">Sister</option>
                            <option value="Uncle">Uncle</option>
                            <option value="Aunt">Aunt</option>
                            <option value="Father in Law">Father in Law</option>
                            <option value="Father in Law">Mother in Law</option>
                            <option value="Brother in Law">Brother in Law</option>
                            <option value="Sister in Law">Sister in Law</option>
                            <option value="Grandmother">Grandmother</option>
                            <option value="Grandfather">Grandfather</option>
                            <option value="Niece">Niece</option>
                            <option value="Nephew">Nephew</option>
                            <option value="Husband">Husband</option>
                            <option value="Wife">Wife</option>
                            <option value="Son">Son</option>
                            <option value="Daughter">Daughter</option>
                            <option value="Nephew">Cousin</option>
                            <option value="Grandson">Grandson</option>
                            <option value="Granddaughter">Granddaughter</option>
                            <option value="Neighbour">Neighbour</option>
                        </select>
                    </div><!-- /.col -->
                </div>
            </div>
        </div>
        <div class="box  box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Admission Information</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Admitted Through</label>
                        <select class="form-control admitted-th" style="width: 100%;" name="patunit_Id"
                                id="id21" tabindex="22">
                            <option></option>
                            <option value="OPD">OPD</option>
                            <option value="Emergency">Emergency</option>
                            <option value="Private Clinic">Private Clinic</option>
                        </select>
                    </div><!-- /.col -->
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Shifted From</label>
                        <input tabindex=23 class="form-control" type="text" name="patShiftedFrom" id="Disease"
                               maxlength="10" placeholder="Type Shifted From">
                    </div>
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Ward Number</label>
                        <select class="form-control ward-name select2"  name="patward_id" required>
                            <option value="">Please select</option>
                            <?php foreach ($wards as $ward): ?>
                                <option value="<?php echo $ward['wardId']; ?>"><?php echo $ward['wardName']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Bed Number</label>
                        <select class="form-control beds select2" id="bedNumber" name="patbed_id" required>

                        </select>
                    </div>
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Admission Date &amp; Time</label>
                        <div class="input-group date bootstrap-timepicker timepicker">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <input tabindex=25 type="text" class="form-control pull-right"
                                       id="datepicker-adm" name="patAdmDate" autocomplete="off" placeholder="Set Date" required>
                            </div>
                            <div class="col-md-6" style="padding: 0;">
                                <input type="text" class="form-control pull-right"
                                       id="timepicker-adm" name="AdmTime" placeholder="Set Time" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Is a Free Care Patient?</label>
                        <br>
                        <input type="radio" name="freeCarePatient" class="custom-radio freecare-rad" value="1" checked>
                        <label class="radio-labels">Yes</label>
                        <input type="radio" name="freeCarePatient" class="custom-radio freecare-rad" value="0">
                        <label  class="radio-labels"> No</label>
                        <br>
                    </div><!-- /.form-group -->
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                        <button type="submit" class="btn bg-blue margin submit-btn custom-submit-btn">
                            <i class="fa fa-user-plus" aria-hidden="true"></i> &nbsp;Admit Patient</button>
                    </div>
                </div><!-- /.col -->
            </div>

        </div>

        <div class="modal fade" role="dialog" id="print-modal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                aria-hidden="true">&times;</span></button>

                        <h4 class="modal-title">Confirmation Message</h4>
                    </div>
                    <div class="modal-body">
                        <p>Do you want to save the admission sheet?</p>
                    </div>
                    <div class="modal-footer">
                        <input type="submit" class="btn bg-blue" id="add_patient" value="Save Information">
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </form>
</section>
<!-- /.content -->
<script>
    $(document).ready(function () {
        $('.select2').select2({});
        $('#datepicker-adm').datepicker({
            format: 'yyyy-mm-dd'
        });
        $('#timepicker-adm').timepicker({
            defaultTime: false
        });

        $("#add_patient_form").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo base_url('dashboard/insert_user_db'); ?>",
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

                    if(response.success)
                    {
                        toastr["success"](response.message);
                        $("#add_patient_form")[0].reset();
                    }
                    else
                    {
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