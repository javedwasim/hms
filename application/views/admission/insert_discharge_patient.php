<form action="<?php echo base_url('dashboard/insert_discharge_patient'); ?>" class="submit-form" method="post"
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
                        <?php if(isset($patient_list) && !empty($patient_list['regNo'])): ?>
                            <input type="hidden" name="patient_reg_no" value="<?php echo $patient_list['regNo']; ?>">
                            <input class="form-control" type="text" name="RegNumber" id="regName" placeholder="MR#" readonly
                                   value="<?php echo $patient_list['regNo']; ?>">
                        <?php else: ?>
                            <input class="form-control" type="text" name="RegNumber" id="regName" placeholder="MR#" readonly
                                   value="<?php if (!empty($reg_num)) { foreach ($reg_num as $reg) {  echo $reg["regNo"] + 1; } } ?>">
                        <?php endif; ?>

                    </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Emergency/OPD Number</label>
                        <input tabindex=1 class="form-control" maxlength="12" type="text" id="emergency_no"
                               name="emergency_no" placeholder="Type Number" value="<?php echo isset($patient_list['emergency_no'])?$patient_list['emergency_no']:''; ?>"
                               onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"/>
                    </div><!-- /.form-group -->

                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Admission Number</label>
                        <input tabindex=2 class="form-control" maxlength="12" type="text" id="admi_no"
                               name="admi_no" placeholder="Type Number" value="<?php echo isset($patient_list['admi_no'])?$patient_list['admi_no']:''; ?>"
                               onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"/>
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Name</label>
                        <input tabindex=3 class="form-control" maxlength="15" type="text"
                               value="<?php echo isset($patient_list['patName'])?$patient_list['patName']:''; ?>"
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
                                <option value="S/O"<?php echo isset($patient_list['patNoKType'])&&($patient_list['patNoKType']=='S/O')?'selected':''; ?>>S/O</option>
                                <option value="D/O"<?php echo isset($patient_list['patNoKType'])&&($patient_list['patNoKType']=='D/O')?'selected':''; ?>>D/O</option>
                                <option value="W/O"<?php echo isset($patient_list['patNoKType'])&&($patient_list['patNoKType']=='W/O')?'selected':''; ?>>W/O</option>
                            </select>
                        </div>
                        <div class="col-md-8" style="padding: 0">
                            <input tabindex=5 class="form-control" maxlength="15" required="required"
                                   type="text" id="guardianName" name="patNoK" placeholder="Enter name"
                                   value="<?php echo isset($patient_list['patNoK'])?$patient_list['patNoK']:''; ?>"  />
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Sex</label>
                        <br>
                        <input type="radio" name="patSex" class="custom-radio" id="sex-male" value="Male"
                            <?php echo isset($patient_list['patSex'])&&($patient_list['patSex']=='Male')?'checked':''; ?>>
                        <label class="radio-labels">Male</label>
                        <input type="radio" name="patSex" class="custom-radio" id="sex-female" value="Female"
                            <?php echo isset($patient_list['patSex'])&&($patient_list['patSex']=='Female')?'checked':''; ?>>
                        <label class="radio-labels">Female</label>
                        <input type="radio" name="patSex" class="custom-radio" id="sex-other" value="Other"
                            <?php echo isset($patient_list['patSex'])&&($patient_list['patSex']=='Other')?'checked':''; ?>>
                        <label class="radio-labels">Other</label>
                    </div><!-- /.form-group -->
                </div><!-- /.col -->

                <div class="col-md-2">
                    <div class="form-group">

                        <label>Age in years</label>
                        <input tabindex=6 class="form-control" maxlength="3" type="text" name="patAge"id="patAge" placeholder="Years"
                               value="<?php echo isset($patient_list['patAge'])?$patient_list['patAge']:''; ?>" >
                    </div><!-- /.form-group -->
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Months</label>
                        <input tabindex=7 class="form-control" maxlength="2" type="text" name="patMonthAge" placeholder="months"
                               value="<?php echo isset($patient_list['patMonthAge'])?$patient_list['patMonthAge']:''; ?>">
                    </div>
                </div><!-- /.col -->
                <div class="col-md-2">
                    <div class="form-group">
                        <label>Days</label>
                        <input tabindex=8 class="form-control" maxlength="2" type="text" name="patDaysAge" placeholder="Days"
                               value="<?php echo isset($patient_list['patDaysAge'])?$patient_list['patDaysAge']:''; ?>">
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
                            <option value="A+VE"<?php echo isset($patient_list['patBldGrp'])&&($patient_list['patBldGrp']=='A+VE')?'selected':''; ?>>A+VE</option>
                            <option value="A-VE"<?php echo isset($patient_list['patBldGrp'])&&($patient_list['patBldGrp']=='A-VE')?'selected':''; ?>>A-VE</option>
                            <option value="B+VE"<?php echo isset($patient_list['patBldGrp'])&&($patient_list['patBldGrp']=='B+VE')?'selected':''; ?>>B+VE</option>
                            <option value="B-VE"<?php echo isset($patient_list['patBldGrp'])&&($patient_list['patBldGrp']=='B-VE')?'selected':''; ?>>B-VE</option>
                            <option value="AB+VE"<?php echo isset($patient_list['patBldGrp'])&&($patient_list['patBldGrp']=='AB+VE')?'selected':''; ?>>AB+VE</option>
                            <option value="AB-VE"<?php echo isset($patient_list['patBldGrp'])&&($patient_list['patBldGrp']=='AB-VE')?'selected':''; ?>>AB-VE</option>
                            <option value="O+VE"<?php echo isset($patient_list['patBldGrp'])&&($patient_list['patBldGrp']=='O+VE')?'selected':''; ?>>O+VE</option>
                            <option value="O-VE"<?php echo isset($patient_list['patBldGrp'])&&($patient_list['patBldGrp']=='O-VE')?'selected':''; ?>>O-VE</option>
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
                                    <option value="<?php echo $disease['disease_id']; ?>"
                                        <?php echo isset($patient_list['patDisease_id'])&&($patient_list['patDisease_id']==$disease['disease_id'])?'selected':''; ?>><?php echo $disease['disease_name']; ?></option>
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
                    <input tabindex=11 class="form-control" maxlength="15" type="text" id="occupation" name="patOccupation" placeholder="Type Occupation"
                           value="<?php echo isset($patient_list['patOccupation'])?$patient_list['patOccupation']:''; ?>">
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>CNIC</label>
                        <input tabindex=12 class="form-control" maxlength="15" type="text" name="patCNIC"
                               value="<?php echo isset($patient_list['patCNIC'])?$patient_list['patCNIC']:''; ?>"
                               id="cnic" placeholder="Type CNIC number" maxlength="15" autocomplete="off"
                               onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"/>
                    </div><!-- /.form-group -->
                </div><!-- /.col -->

            </div><!-- /.row -->
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Address</label>
                        <input tabindex=13 type="text" class="form-control" maxlength="30" id="address" name="patAddress" placeholder="Type Address"
                               value="<?php echo isset($patient_list['patAddress'])?$patient_list['patAddress']:''; ?>">
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>City</label>
                        <select class="form-control patcity select2" name="patcity">
                            <option value="">Please select</option>
                            <?php foreach ($cities as $city): ?>
                                <option value="<?php echo $city['city']; ?>"
                                    <?php echo isset($patient_list['patcity'])&&($patient_list['patcity']==$city['city'])?'selected':''; ?>><?php echo $city['city']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Phone</label>
                        <input tabindex=15 class="form-control" maxlength="11" type="text"
                               value="<?php echo isset($patient_list['patPhone'])?$patient_list['patPhone']:''; ?>"
                               onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                               id="phone" name="patPhone" placeholder="Type Phone Number" maxlength="11"/>
                    </div><!-- /.form-group -->

                </div><!-- /.col -->

                <div class="col-md-3">
                    <div class="form-group">
                        <label>Entitled</label>
                        <br>
                        <input tabindex=16 type="radio" name="patEntitled" class="custom-radio entitled-rad" id="entitled-true" value="Yes"
                            <?php echo isset($patient_list['patEntitled'])&&($patient_list['patEntitled']=='yes')?'checked':''; ?>>
                        <label class="radio-labels">Yes</label>
                        <input type="radio" name="patEntitled" class="custom-radio entitled-rad" id="entitled-false" value="No"
                            <?php echo isset($patient_list['patEntitled'])&&($patient_list['patEntitled']=='No')?'checked':''; ?>>
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
                        <div class="fileinput-preview thumbnail" data-trigger="fileinput"  style="width: 65px; height: 70px;">
                            <?php if(isset($patient_list['patient_pic_path']) && !empty($patient_list['patient_pic_path'])): ?>
                                <img src="<?php echo base_url("/assets/dist/img/patient_photo/").$patient_list['patient_pic_path']; ?>" class="img-circle" alt="User Image">
                            <?php else: ?>
                                <i class="fa fa-user" aria-hidden="true" style="font-size: 4em;"></i>
                            <?php endif; ?>
                        </div>
                        <div style="display: inline;">
                                <span class="btn btn-default btn-file">
                                    <span class="fileinput-new">Select image</span>
                                    <span class="fileinput-exists">Change</span>
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
                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                    <i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Guardian Name</label>
                    <input class="form-control" type="text" maxlength="12" name="garName" placeholder="Enter Guardian Name"
                           value="<?php echo isset($patient_list['garName'])?$patient_list['garName']:''; ?>">
                </div>
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <label>CNIC</label>
                    <input class="form-control" type="text" maxlength="15" name="garCnic" id="garcnic"
                           value="<?php echo isset($patient_list['garCnic'])?$patient_list['garCnic']:''; ?>"
                           placeholder="Type CNIC number" maxlength="15" autocomplete="off" tabindex=19
                           onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"/>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <label>Contact Number</label>
                    <input class="form-control" type="text" maxlength="11" name="garContact"placeholder="Type Phone Number"
                           value="<?php echo isset($patient_list['garContact'])?$patient_list['garContact']:''; ?>"
                           onkeypress="return /\d/.test(String.fromCharCode(((event||window.event).which||(event||window.event).which)));"
                           maxlength="11" id="id19" tabindex=20/>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <label>Relationship</label>
                    <select class="form-control gar-relation" style="width: 100%;" name="garRelation" id="id20" tabindex=21>
                        <option value="">Please select</option>
                        <option value="Father"<?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Father')?'selected':''; ?>>Father</option>
                        <option value="Mother"<?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Mother')?'selected':''; ?>>Mother</option>
                        <option value="Brother"<?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Brother')?'selected':''; ?>>Brother</option>
                        <option value="Sister"<?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Sister')?'selected':''; ?>>Sister</option>
                        <option value="Uncle"<?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Uncle')?'selected':''; ?>>Uncle</option>
                        <option value="Aunt"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Aunt')?'selected':''; ?>>Aunt</option>
                        <option value="Father in Law"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Father in Law')?'selected':''; ?>>Father in Law</option>
                        <option value="Brother in Law"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Brother in Law')?'selected':''; ?>>Brother in Law</option>
                        <option value="Sister in Law"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Sister in Law')?'selected':''; ?>>Sister in Law</option>
                        <option value="Grandmother"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Grandmother')?'selected':''; ?>>Grandmother</option>
                        <option value="Grandfather"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Grandfather')?'selected':''; ?>>Grandfather</option>
                        <option value="Niece"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Niece')?'selected':''; ?>>Niece</option>
                        <option value="Nephew"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Nephew')?'selected':''; ?>>Nephew</option>
                        <option value="Husband"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Husband')?'selected':''; ?>>Husband</option>
                        <option value="Wife"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Wife')?'selected':''; ?>>Wife</option>
                        <option value="Son"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Son')?'selected':''; ?>>Son</option>
                        <option value="Daughter"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Daughter')?'selected':''; ?>>Daughter</option>
                        <option value="Grandson"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Grandson')?'selected':''; ?>>Grandson</option>
                        <option value="Granddaughter"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Granddaughter')?'selected':''; ?>>Granddaughter</option>
                        <option value="Neighbour"
                            <?php echo isset($patient_list['garRelation'])&&($patient_list['garRelation']=='Neighbour')?'selected':''; ?>>Neighbour</option>
                    </select>
                </div><!-- /.col -->
            </div>
        </div>
    </div>
    <div class="box  box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Admission Information</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">

            <div class="col-md-3">
                <div class="form-group">
                    <label>Admitted Through</label>
                    <select class="form-control admitted-th" style="width: 100%;" name="patunit_Id">
                        <option></option>
                        <option value="OPD"
                            <?php echo isset($patient_list['patunit_Id'])&&($patient_list['patunit_Id']=='OPD')?'selected':''; ?>>OPD</option>
                        <option value="Emergency"
                            <?php echo isset($patient_list['patunit_Id'])&&($patient_list['patunit_Id']=='Emergency')?'selected':''; ?>>Emergency</option>
                        <option value="Private Clinic"
                            <?php echo isset($patient_list['patunit_Id'])&&($patient_list['patunit_Id']=='Private Clinic')?'selected':''; ?>>Private Clinic</option>
                    </select>
                </div><!-- /.col -->
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Shifted From</label>
                    <input tabindex=23 class="form-control" type="text" name="patShiftedFrom" id="Disease" maxlength="10" placeholder="Type Shifted From"
                           value="<?php echo isset($patient_list['patShiftedFrom'])?$patient_list['patShiftedFrom']:''; ?>">
                </div>
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <label>Ward Number</label>
                    <select class="form-control ward-name select2"  name="patward_id" required>
                        <option value="">Please select</option>
                        <?php foreach ($wards as $ward): ?>
                            <option value="<?php echo $ward['wardId']; ?>"
                                <?php echo isset($patient_list['patward_id'])&&($patient_list['patward_id']==$ward['wardId'])?'selected':''; ?>><?php echo $ward['wardName']; ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div><!-- /.col -->
            <div class="col-md-3">
                <div class="form-group">
                    <label>Bed Number</label>
                    <select class="form-control beds select2" id="bedNumber" name="patbed_id" required>
                        <?php if($patient_list['patbed_id']): ?>
                            <option value="<?php echo $patient_list['patbed_id']; ?>"><?php echo " Bed Number ".$patient_list['patbed_id']; ?></option>
                        <?php endif; ?>
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
                                   value="<?php echo isset($patient_list['patAdmDate'])?$patient_list['patAdmDate']:''; ?>"
                                   id="datepicker-adm" name="patAdmDate" autocomplete="off" placeholder="Set Date" required>
                        </div>
                        <div class="col-md-6" style="padding: 0;">
                            <input type="text" class="form-control pull-right"
                                   value="<?php echo isset($patient_list['patAdmDate'])?date('h:i A', strtotime($patient_list['patAdmDate'])):''; ?>"
                                   id="timepicker-adm" name="AdmTime" placeholder="Set Time" required>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Is a Free Care Patient?</label>
                    <br>
                    <input type="radio" name="freeCarePatient" class="custom-radio freecare-rad" value="1"
                        <?php echo isset($patient_list['freeCarePatient'])&&($patient_list['freeCarePatient']==1)?'checked':''; ?>>
                    <label class="radio-labels">Yes</label>
                    <input type="radio" name="freeCarePatient" class="custom-radio freecare-rad" value="0"
                        <?php echo isset($patient_list['freeCarePatient'])&&($patient_list['freeCarePatient']==0)?'checked':''; ?>>
                    <label  class="radio-labels"> No</label>
                    <br>
                </div><!-- /.form-group -->
            </div>

            <div class="col-md-3">
                <div class="form-group">
                    <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                    <button type="submit" class="btn bg-blue margin submit-btn custom-submit-btn">
                        <i class="fa fa-user-plus" aria-hidden="true"></i><?php echo isset($patient_reg_no)?'Update Paitent':'Admit Patient' ?></button>
                </div>
            </div><!-- /.col -->
        </div>

    </div>

    <div class="modal fade" role="dialog" id="print-modal">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
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
                url: "<?php echo base_url('dashboard/insert_discharge_patient'); ?>",
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
                        $('#spinner').hide();
                    }
                    else
                    {
                        toastr["error"](response.message);
                        $('#spinner').hide();
                    }
                },
                error: function(e)
                {
                    toastr["error"]('seem to be an error');
                    $('#spinner').hide();
                }
            });
        }));
    });
</script>