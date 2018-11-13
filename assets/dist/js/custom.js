$(document).ready(function () {
    $('#example').vTicker();
});
$(document).ready(function () {
    $('.alert-error').delay(4000).fadeOut('slow');
    var base_url = $('#base').val();
    $('.sidebar-menu').load(base_url + "index.php/dashboard/get_menus/", function () {
        $('.sidebar-menu').fadeIn('fast');
        $("#adm-minimaximizer").click(function () {
            if ($("#adm-minimaximizer>span>i").hasClass("fa-plus-circle")) {
                $("#adm-minimaximizer>span>i").removeClass("fa-plus-circle").addClass("fa-minus-circle");


            }
            else {
                $("#adm-minimaximizer>span>i").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            }
        });
        $("#otb-minimaximizer").click(function () {
            if ($("#otb-minimaximizer>span>i").hasClass("fa-plus-circle")) {
                $("#otb-minimaximizer>span>i").removeClass("fa-plus-circle").addClass("fa-minus-circle");
            }
            else {
                $("#otb-minimaximizer>span>i").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            }
        });
        $("#otp-minimaximizer").click(function () {
            if ($("#otp-minimaximizer>span>i").hasClass("fa-plus-circle")) {
                $("#otp-minimaximizer>span>i").removeClass("fa-plus-circle").addClass("fa-minus-circle");
            }
            else {
                $("#otp-minimaximizer>span>i").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            }
        });
        $("#lab-minimaximizer").click(function () {
            if ($("#lab-minimaximizer>span>i").hasClass("fa-plus-circle")) {
                $("#lab-minimaximizer>span>i").removeClass("fa-plus-circle").addClass("fa-minus-circle");
            }
            else {
                $("#lab-minimaximizer>span>i").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            }
        });
        $("#wrl-minimaximizer").click(function () {
            if ($("#wrl-minimaximizer>span>i").hasClass("fa-plus-circle")) {
                $("#wrl-minimaximizer>span>i").removeClass("fa-plus-circle").addClass("fa-minus-circle");
            }
            else {
                $("#wrl-minimaximizer>span>i").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            }
        });
        $("#rep-minimaximizer").click(function () {
            if ($("#rep-minimaximizer>span>i").hasClass("fa-plus-circle")) {
                $("#rep-minimaximizer>span>i").removeClass("fa-plus-circle").addClass("fa-minus-circle");
            }
            else {
                $("#rep-minimaximizer>span>i").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            }
            $('#shifted-modal').modal('show');
        });
        $("#acc-minimaximizer").click(function () {
            if ($("#acc-minimaximizer>span>i").hasClass("fa-plus-circle")) {
                $("#acc-minimaximizer>span>i").removeClass("fa-plus-circle").addClass("fa-minus-circle");
            }
            else {
                $("#acc-minimaximizer>span>i").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            }

        });
        $("#hos-minimaximizer").click(function () {
            if ($("#hos-minimaximizer>span>i").hasClass("fa-plus-circle")) {
                $("#hos-minimaximizer>span>i").removeClass("fa-plus-circle").addClass("fa-minus-circle");
            }
            else {
                $("#hos-minimaximizer>span>i").removeClass("fa-minus-circle").addClass("fa-plus-circle");
            }
        });
    });
    $('.patName-select').select2({
        placeholder: "Search by MR# or Name",
        minimumInputLength: 2,
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_cnic: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.patName-select').change(function () {
        $('#search-by-name').submit();
    });
    $('.shifted-from').select2({
        placeholder: "Select Shifted From"
    });
    $('.shifted-to').select2({
        placeholder: "Select Shifted To"
    });
    $('.updated-ward').select2({
        placeholder: "New Ward Number"
    });
    $('.ward-select').select2({
        placeholder: "Search By Ward",
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_ward: "true"
                }
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.ward-select').change(function () {
        $('#search-by-ward').submit();
    });
    $('.sex-select').select2({
        placeholder: "Search By Gender"
    });
    $('.sex-select').change(function () {
        console.debug("changed");
        $('#search-by-gender').submit();
    });
    $('.opt-select').select2({
        placeholder: "Search Patients in OPT"
    });
    $('.bld-grp').select2({
        placeholder: "Select Blood Group"
    });
    $('.disease').select2({
        placeholder: "Search Disease"
    });
    $('.admitted-th').select2({
        placeholder: "Admitted Through"
    });
    $('.next-of-kin').select2({
        placeholder: "Select Next of Kin"
    });
    $('.history-select').select2({
        placeholder: "Search by Name or CNIC"
    });
    $('.discharge-select').select2({
        placeholder: "Search by MR# or Name"
    });
    
    $('.district').select2({
        placeholder: "Select District"
    });
    $('.patcity').select2({
        placeholder: "Select City"
    });
    $('.gar-relation').select2({
        placeholder: "Select Relationship"
    });
    
    $(document).ready(function () {
        $('#emNo').focus();
    });
    
    $('.discharge-patient-select').select2({
        placeholder: "Search by MR# or Name",
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_discharged_by_cnic: params.term
                }
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.discharge-patient-select').change(function () {
        $('#search-discharged-patients').submit();
    });
    $('#hist-submit').click(function () {
        var patHistory1 = $('#patHistory').val();
        var chartpatregNo1 = $('#chartpatregNo').val();
        var historycount = $('.history-texts>.direct-chat-name').last().text();
        var docName = $('.docName').text().trim();
        if (historycount == "") {
            historycount = 0;
        }
        var newhistorycount = parseInt(historycount) + 1;
        var historytime = 'Just Now';
        console.log('starting ajax');
        $.ajax({
            url: base_url + "index.php/dashboard/insert_brief_history",
            type: "post",
            data: {patHistory: patHistory1, chartpatregNo: chartpatregNo1, docName: docName},
            success: function (data) {
                $('#patHistory').val("");
                $(".history-texts").append('<span class="direct-chat-name pull-left" style="padding: 10px;" >' + newhistorycount + '.</span><div class="direct-chat-text">' + patHistory1 + '</div><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-right">' + historytime + ' By &nbsp;' + docName + ' </span>');
                scrollDown();
                

            }
        });
    });

    $('#patHistory').keydown(function (event) {
        if (event.which == 13) {
            var patHistory1 = $('#patHistory').val();
            var chartpatregNo1 = $('#chartpatregNo').val();
            var historycount = $('.history-texts>.direct-chat-name').last().text();
            var docName = $('.docName').text().trim();
            if (historycount == "") {
                historycount = 0;
            }
            var newhistorycount = parseInt(historycount) + 1;
            var historytime = 'Just Now';
            console.log('starting ajax');
            $.ajax({
                url: base_url + "index.php/dashboard/insert_brief_history",
                type: "post",
                data: {patHistory: patHistory1, chartpatregNo: chartpatregNo1, docName: docName},
                success: function (data) {
                    $('#patHistory').val("");
                    $(".history-texts").append('<span class="direct-chat-name pull-left" style="padding: 10px;" >' + newhistorycount + '.</span><div class="direct-chat-text">' + patHistory1 + '</div><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-right">' + historytime + ' By &nbsp;' + docName + ' </span>');
                    scrollDown();
                    

                }
            });
        }
    });
    $('#patInverstigation').keydown(function (event) {
        if (event.which == 13) {
            var patInvestigation1 = $('#patInverstigation').val();
            var chartpatregNo1 = $('#chartpatregNo').val();
            var historycount = $('.inv-texts>.direct-chat-name').last().text();
            var docName = $('.docName').text().trim();
            if (historycount == "") {
                historycount = 0;
            }
            var newhistorycount = parseInt(historycount) + 1;
            var historytime = 'Just Now';
            console.log('starting ajax');
            $.ajax({
                url: base_url + "index.php/dashboard/insert_inv_plan",
                type: "post",
                data: {patInvestigation: patInvestigation1, chartpatregNo: chartpatregNo1, docName: docName},
                success: function (data) {
                    $('#patInverstigation').val("");
                    $(".inv-texts").append('<span class="direct-chat-name pull-left" style="padding: 10px;" >' + newhistorycount + '.</span><div class="direct-chat-text">' + patInvestigation1 + '</div><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-right">' + historytime + ' By &nbsp;' + docName + ' </span>');

                    scrollDown();
                    
                }
            });
        }
    });
    $('#patTreatPlan').keydown(function (event) {
        if (event.which == 13) {
            var patTreat = $('#patTreatPlan').val();
            var chartpatregNo2 = $('#chartpatregNo').val();
            var treatcount = $('.treat-texts>.direct-chat-name').last().text();
            var docName = $('.docName').text().trim();
            if (treatcount == "") {
                treatcount = 0;
            }
            var newhistorycount = parseInt(treatcount) + 1;
            var historytime = 'Just Now';
            console.log('starting ajax');
            $.ajax({
                url: base_url + "index.php/dashboard/insert_treatment_plan",
                type: "post",
                data: {patTreatPlan: patTreat, chartpatregNo: chartpatregNo2, docName: docName},
                success: function (data) {
                    $('#patTreatPlan').val("");
                    $(".treat-texts").append('<span class="direct-chat-name pull-left" style="padding: 10px;" >' + newhistorycount + '.</span><div class="direct-chat-text">' + patTreat + '</div><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-right">' + historytime + ' By &nbsp;' + docName + ' </span>');
                    scrollDown();
                    

                }
            });
        }
    });

    $('#inv-submit').click(function () {
        var patInvestigation1 = $('#patInverstigation').val();
        var chartpatregNo1 = $('#chartpatregNo').val();
        var historycount = $('.inv-texts>.direct-chat-name').last().text();
        var docName = $('.docName').text().trim();
        if (historycount == "") {
            historycount = 0;
        }
        var newhistorycount = parseInt(historycount) + 1;
        var historytime = 'Just Now';
        console.log('starting ajax');
        $.ajax({
            url: base_url + "index.php/dashboard/insert_inv_plan",
            type: "post",
            data: {patInvestigation: patInvestigation1, chartpatregNo: chartpatregNo1, docName: docName},
            success: function (data) {
                $('#patInverstigation').val("");
                $(".inv-texts").append('<span class="direct-chat-name pull-left" style="padding: 10px;" >' + newhistorycount + '.</span><div class="direct-chat-text">' + patInvestigation1 + '</div><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-right">' + historytime + ' By &nbsp; ' + docName + ' </span>');

                scrollDown();
                
            }
        });
    });
    $('#treat-submit').click(function () {
        var patTreat = $('#patTreatPlan').val();
        var chartpatregNo2 = $('#chartpatregNo').val();
        var treatcount = $('.treat-texts>.direct-chat-name').last().text();
        var docName = $('.docName').text().trim();
        if (treatcount == "") {
            treatcount = 0;
        }
        var newhistorycount = parseInt(treatcount) + 1;
        var historytime = 'Just Now';
        console.log('starting ajax');
        $.ajax({
            url: base_url + "index.php/dashboard/insert_treatment_plan",
            type: "post",
            data: {patTreatPlan: patTreat, chartpatregNo: chartpatregNo2, docName: docName},
            success: function (data) {
                $('#patTreatPlan').val("");
                $(".treat-texts").append('<span class="direct-chat-name pull-left" style="padding: 10px;" >' + newhistorycount + '.</span><div class="direct-chat-text">' + patTreat + '</div><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-right">' + historytime + ' By &nbsp;' + docName + ' </span>');
                scrollDown();
                

            }
        });
    });
    $('#announcement-text').keydown(function (event) {
        if (event.which == 13) {

            var ann_text = $('#announcement-text').val();
            ann_text = ann_text.replace(/</g, "&lt;").replace(/>/g, "&gt;");
            var textcount = $('.announcement-texts>.direct-chat-name').last().text();
            var docName = $('.docName').text().trim();
            if (textcount == "") {
                textcount = 0;
            }
            var newhistorycount = parseInt(textcount) + 1;
            var historytime = 'Just Now';
            console.log('starting ajax');
            $.ajax({
                url: base_url + "index.php/dashboard/insert_new_announcement",
                type: "post",
                data: {ann_text: ann_text, docName: docName},
                success: function (data) {
                    $('#announcement-text').val("");
                    $(".announcement-texts").append('<span class="direct-chat-name pull-left" style="padding: 10px;" >' + newhistorycount + '.</span><div class="direct-chat-text">' + ann_text + '</div><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-right">' + historytime + ' By &nbsp;' + docName + ' </span>');
                    scrollDown();
                    

                }
            });
        }
    });
    $('#announcement-submit').click(function () {
        var ann_text = $('#announcement-text').val();
        ann_text = ann_text.replace(/</g, "&lt;").replace(/>/g, "&gt;");
        var textcount = $('.announcement-texts>.direct-chat-name').last().text();
        var docName = $('.docName').text().trim();
        if (textcount == "") {
            textcount = 0;
        }
        var newhistorycount = parseInt(textcount) + 1;
        var historytime = 'Just Now';
        console.log('starting ajax');
        $.ajax({
            url: base_url + "index.php/dashboard/insert_new_announcement",
            type: "post",
            data: {ann_text: ann_text, docName: docName},
            success: function (data) {
                $('#announcement-text').val("");
                $(".announcement-texts").append('<span class="direct-chat-name pull-left" style="padding: 10px;" >' + newhistorycount + '.</span><div class="direct-chat-text">' + ann_text + '</div><div class="direct-chat-info clearfix"><span class="direct-chat-timestamp pull-right">' + historytime + ' By &nbsp;' + docName + ' </span>');
                scrollDown();
                

            }
        });
    });
    scrollDown();

    function scrollDown() {
        $(".direct-chat-messages").animate({
            scrollTop: $(document).height() + $(window).height()
        });
    }

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
    
    
    
    $('#entitled-true').on('ifChecked', function () {
        $('.customlabel').removeClass("hide-label");
    });
    $('#entitled-false').on('ifChecked', function () {
        $('.customlabel').addClass("hide-label");
    });
    $('.submit-btn').click(function () {
        $('#print-modal').modal('show');
    });
    $('#insert-form-btn').click(function () {
        $('.submit-form').submit();
    });
    $('#chkshift').on('ifChecked', function () {
        $('.shift-menu').removeAttr("style").attr("style", "display:block");

    });
    $('#chkshift').on('ifUnchecked', function () {
        $('.shift-menu').removeAttr("style").attr("style", "display:none");
    });

    function isChecked() {
        isCheck = true;
        $('#chkshift').on('ifChecked', function () {
            return isCheck = true;
        });
        $('#chkshift').on('ifUnchecked', function () {
            return isCheck = false;
        });
    }

    function validateForm() {
        var isValid = true;
        $('.submit-form').each(function () {
            if ($(this).val() === '')
                isValid = false;
        });
        return isValid;
    }

    function validateShiftForm() {
        var isValid = true;
        $('#shift-f').each(function () {
            if ($(this).val() === '')
                isValid = false;
        });
        return isValid;
    }

    $('#insert-print-form-btn').click(function () {
        var patID = $('#regName').val();
        if (1==1) {
            var win = window.open(base_url + 'dashboard/page_print/?search_by_cnic=' + patID, '_blank');
            if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
        }
        else {
            $('#print-modal').modal('hide');
            $('.wrapper').append('<div style="position: fixed;\n' +
                'top: 20px;\n' +
                'right: 20px;\n' +
                'z-index: 1030;" class="alert alert-danger alert-dismissible">\n' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                '<h4><i class="icon fa fa-check"></i> Error!</h4>\n' +
                'Please fill-up all the required information to proceed.\n' +
                '</div>');
            $('.alert-danger').delay(3000).fadeOut('slow');
        }
    });
    $('.alert-success').delay(3000).fadeOut('slow');
});
$(document).ready(function () {
    var base_url = $('#base').val();
    $('input').iCheck({
        checkboxClass: 'icheckbox_flat',
        radioClass: 'iradio_flat',
        increaseArea: '20%' // optional
    });
    $('#datepicker').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#regdatepicker').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#newadm-datepicker').datepicker({
        format: 'dd-m-yyyy'
    });
    $('#datepicker').change(function () {
        var exploder = $('#datepicker').val();
        var now = new Date();
        var today = new Date(now.getYear(),now.getMonth(),now.getDate());
        var yearNow = now.getYear();
        var monthNow = now.getMonth();
        var dateNow = now.getDate();
        var dob = new Date(exploder.substring(6,10),
                     exploder.substring(0,2)-1,                   
                     exploder.substring(3,5)                  
                     );
        var yearDob = dob.getYear();
        var monthDob = dob.getMonth();
        var dateDob = dob.getDate();
        var age = {};
        var ageString = "";
        var yearString = "";
        var monthString = "";
        var dayString = "";
        var yearAge = yearNow - yearDob;
        if (monthNow >= monthDob){
          var monthAge = monthNow - monthDob;
      }
        else {
          yearAge--;
          var monthAge = 12 + monthNow -monthDob;
        }
        if (dateNow >= dateDob){
        var dateAge = dateNow - dateDob;
    }
        else {
        monthAge--;
        var dateAge = 31 + dateNow - dateDob;
    }
    if (monthAge < 0) {
      monthAge = 11;
      yearAge--;
    }
  

  age = {
      years: yearAge,
      months: monthAge,
      days: dateAge
      };

  if ( age.years > 1 ) yearString = " years";
  else yearString = " year";
  if ( age.months> 1 ) monthString = " months";
  else monthString = " month";
  if ( age.days > 1 ) dayString = " days";
  else dayString = " day";


  if ( (age.years > 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.years + yearString + ", " + age.months + monthString + "," + age.days + dayString;
  else if ( (age.years == 0) && (age.months == 0) && (age.days > 0) )
    ageString = "" + age.days + dayString + "";
  else if ( (age.years > 0) && (age.months == 0) && (age.days == 0) )
    ageString = age.years + yearString + "";
  else if ( (age.years > 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.years + yearString + "," + age.months + monthString;
  else if ( (age.years == 0) && (age.months > 0) && (age.days > 0) )
    ageString = age.months + monthString + "," + age.days + dayString;
  else if ( (age.years > 0) && (age.months == 0) && (age.days > 0) )
    ageString = age.years + yearString + "," + age.days + dayString;
  else if ( (age.years == 0) && (age.months > 0) && (age.days == 0) )
    ageString = age.months + monthString;
  else ageString = "";

//  return ageString;
//        var newdate = exploder[2] + "/" + exploder[1] + "/" + exploder[0];
//        dob = new Date(newdate);
//        console.log(dob);
//        console.log(newdate);
//        var today = new Date();
//        var age = Math.floor((today - dob) / (365.25 * 24 * 60 * 60 * 1000));
        $('#patAge').val(ageString);
    });
    
    function formatAMPM(date) {
        var hours = date.getHours();
        var minutes = date.getMinutes();
        var ampm = hours >= 12 ? 'PM' : 'AM';
        hours = hours % 12;
        hours = hours ? hours : 12; // the hour '0' should be '12'
        minutes = minutes < 10 ? '0' + minutes : minutes;
        var strTime = hours + ':' + minutes + ' ' + ampm;
        return strTime;
    }

    $('.next-of-kin').change(function () {
        var nokVal = $('.next-of-kin').val();
        if (nokVal == "S/O") {
            $('#sex-male').iCheck('check');
        }
        else {
            
            $('#sex-female').iCheck('check');
        }
    });
    $('#datepicker2').click(function () {
        $('#datepicker2').datepicker();
    });
    var dNow = new Date();
    var localdate = dNow.getDate() + '-' + (dNow.getMonth() + 1) + '-' + dNow.getFullYear() + ' ' + formatAMPM(dNow);
    $('#datepicker1').val(localdate);
    var admlocaldate = dNow.getDate() + '-' + (dNow.getMonth() + 1) + '-' + dNow.getFullYear();
    var admlocaltime = formatAMPM(dNow);
    $('#datepicker-adm').val(admlocaldate);
    $('#timepicker-adm').val(admlocaltime);
    $('#search-by-to-date').datepicker({
        format: 'd-m-yyyy'
    });
    $('#search-by-from-date').datepicker({
        format: 'd-m-yyyy'
    });
    $('.search-by-to-date').change(function () {
        $('#search-by-date').submit();
    });
    
    //////search by date discharged patients/////////////
    
    $('#search-discharged-by-to-date').change(function () {
        $('#search_discharged_by_date').submit();
    });
    
    $('#search-discharged-by-from-date').datepicker({
        format: 'd-m-yyyy'
    });
    $('#search-discharged-by-to-date').datepicker({
        format: 'd-m-yyyy'
    });
    
    
    
    
    
    $('#cnic').keydown(function (e) {
          var key = e.which || e.keyCode;

             if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
             // numbers   
                 key >= 48 && key <= 57 ||
             // Numeric keypad
                 key >= 96 && key <= 105)
                 
        var length = $(this).val().length;
        console.log(length);
        if (length == 5 || length == 13)
            $(this).val($(this).val() + '-');
        return true;
    });
    $('#garcnic').keydown(function (e) {
          var key = e.which || e.keyCode;

             if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
             // numbers   
                 key >= 48 && key <= 57 ||
             // Numeric keypad
                 key >= 96 && key <= 105 ||
             // comma, period and minus, . on keypad
                key == 190 || key == 188 || key == 109 || key == 110 ||
             // Backspace and Tab and Enter
                key == 8 || key == 9 || key == 13 ||
             // Home and End
                key == 35 || key == 36 ||
             // left and right arrows
                key == 37 || key == 39 ||
             // Del and Ins
                key == 46 || key == 45)
                 
        var length = $(this).val().length;
        console.log(length);
        if (length == 5 || length == 13)
            $(this).val($(this).val() + '-');
        return true;
    });

//$(document).ready(function () {
//     $("#cnic").forceNumeric();
// });
//
// // forceNumeric() plug-in implementation
// jQuery.fn.forceNumeric = function () {
//     return this.each(function () {
//         $(this).keydown(function (e) {
//             var key = e.which || e.keyCode;
//
//             if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
//             // numbers   
//                 key >= 48 && key <= 57 ||
//             // Numeric keypad
//                 key >= 96 && key <= 105 ||
//             // comma, period and minus, . on keypad
//                key == 190 || key == 188 || key == 109 || key == 110 ||
//             // Backspace and Tab and Enter
//                key == 8 || key == 9 || key == 13 ||
//             // Home and End
//                key == 35 || key == 36 ||
//             // left and right arrows
//                key == 37 || key == 39 ||
//             // Del and Ins
//                key == 46 || key == 45)
//                 return true;
//
//             return false;
//         });
//     });
// }


    $(".mybutton").click(function () {
        var tr = $(this).closest('tr');
        var access_id = tr.find('.form-control option:selected').val();
        var uid = tr.find('#userid').val();
        console.debug("Access ID: " + access_id);
        console.debug("User ID: " + uid);
        $.ajax({
            url: base_url + "/dashboard/update_privileges/",
            type: "post",
            data: {privid: access_id, uid: uid},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Permission has been granted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                
            }
        });
    });
    $(".priv-submit").click(function () {
        var tr = $(this).closest('tr');
        var privid = tr.find('#privid').val();
        var allow_user_to_admit = tr.find('#allow_user_to_admit').prop('checked');
        var view_admitted_patients = tr.find('#view_admitted_patients').prop('checked');
        var view_history_and_plan_chart = tr.find('#view_history_and_plan_chart').prop('checked');
        var discharge_patients = tr.find('#discharge_patients').prop('checked');
        var can_book_ot = tr.find('#can_book_ot').prop('checked');
        var can_view_ot_list = tr.find('#can_view_ot_list').prop('checked');
        var view_radiology_section = tr.find('#view_radiology_section').prop('checked');
        var view_ward_bed_list = tr.find('#view_ward_bed_list').prop('checked');
        var view_statistics = tr.find('#view_statistics').prop('checked');
        var view_inventory = tr.find('#view_inventory').prop('checked');
        var view_accounts = tr.find('#view_accounts').prop('checked');
        var view_configurations = tr.find('#view_configurations').prop('checked');
        var view_master_list = tr.find('#view_master_list').prop('checked');
        var can_update_patient_record = tr.find('#can_update_patient_record').prop('checked');
        var can_update_hp_chart = tr.find('#can_update_hp_chart').prop('checked');

        function converter(param) {
            if (param === true) {
                return "1";
            }
            else {
                return "0";
            }
        }

        var new_allow_user_to_admit = converter(allow_user_to_admit);
        var new_view_admitted_patients = converter(view_admitted_patients);
        var new_view_history_and_plan_chart = converter(view_history_and_plan_chart);
        var new_discharge_patients = converter(discharge_patients);
        var new_can_book_ot = converter(can_book_ot);
        var new_can_view_ot_list = converter(can_view_ot_list);
        var new_view_radiology_section = converter(view_radiology_section);
        var new_view_ward_bed_list = converter(view_ward_bed_list);
        var new_view_statistics = converter(view_statistics);
        var new_view_inventory = converter(view_inventory);
        var new_view_accounts = converter(view_accounts);
        var new_view_configurations = converter(view_configurations);
        var new_view_master_list = converter(view_master_list);
        var new_can_update_patient_record = converter(can_update_patient_record);
        var new_can_update_hp_chart = converter(can_update_hp_chart);
        $.ajax({
            url: base_url + "dashboard/update_ug/",
            type: "post",
            data: {
                privid: privid,
                allow_user_to_admit: new_allow_user_to_admit,
                view_admitted_patients: new_view_admitted_patients,
                view_history_and_plan_chart: new_view_history_and_plan_chart,
                discharge_patients: new_discharge_patients,
                can_book_ot: new_can_book_ot,
                can_view_ot_list: new_can_view_ot_list,
                view_radiology_section: new_view_radiology_section,
                view_ward_bed_list: new_view_ward_bed_list,
                view_statistics: new_view_statistics,
                view_inventory: new_view_inventory,
                view_accounts: new_view_accounts,
                view_configurations: new_view_configurations,
                view_master_list: new_view_master_list,
                can_update_hp_chart: new_can_update_hp_chart,
                can_update_patient_record: new_can_update_patient_record
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'User Privileges have been updated successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                
                tr.find(".priv-submit").prop('disabled', true);
            }
        });
    });
    $(".new-priv").click(function () {
        var iterator = $('.sorting_1:last').last().text().trim();
        var nextPrivilege = $('td #privid:last').val();
        $('table .odd:last-child').after('<tr role="row"  class="odd">\n' +
            '                                                <td class="sorting_1"> ' + (parseInt(iterator) + 1) + ' </td>\n' +
            '                                                <td><input type="text" id="new-ug-desc" placeholder="Type User Privilege Description...">\n' +
            '                                                <input type="hidden" id="privid" value="' + (parseInt(nextPrivilege) + 1) + '">\n' +
            '                                                </td>\n' +
            '                                                <td><input type="checkbox" id="allow_user_to_admit"></td>\n' +
            '                                                <td><input type="checkbox" id="view_admitted_patients"></td>\n' +
            '                                                <td><input type="checkbox" id="view_history_and_plan_chart"></td>\n' +
            '                                                <td><input type="checkbox" id="discharge_patients"></td>\n' +
            '                                                <td><input type="checkbox" id="can_book_ot"></td>\n' +
            '                                                <td><input type="checkbox" id="can_view_ot_list"></td>\n' +
            '                                                <td><input type="checkbox" id="view_radiology_section"></td>\n' +
            '                                                <td><input type="checkbox" id="view_ward_bed_list"></td>\n' +
            '                                                <td><input type="checkbox" id="view_statistics"></td>\n' +
            '                                                <td><input type="checkbox" id="view_inventory"></td>\n' +
            '                                                <td><input type="checkbox" id="view_accounts"></td>\n' +
            '                                                <td><input type="checkbox" id="view_configurations"></td>\n' +
            '                                                <td><input type="checkbox" id="view_master_list"></td>\n' +
            '                                                <td><input type="checkbox" id="can_update_patient_record"></td>\n' +
            '                                                <td><input type="checkbox" id="can_update_hp_chart"></td>\n' +
            '                                                <td><button type="button" class="btn btn-default priv-insert"><i class="fa fa-floppy-o"></i></button></td>\n' +
            '                                            </tr>');
        $('.odd').find('input').iCheck({
            checkboxClass: 'icheckbox_flat',
            radioClass: 'iradio_flat',
            increaseArea: '20%' // optional
        });
    });
    $('table').on('click', '.priv-insert', function () {

        var tr = $(this).closest('tr');
        var priv_id = tr.find('#privid').val();
        var ug_desc = tr.find('#new-ug-desc').val();
        var allow_user_to_admit = tr.find('#allow_user_to_admit').prop('checked');
        var view_admitted_patients = tr.find('#view_admitted_patients').prop('checked');
        var view_history_and_plan_chart = tr.find('#view_history_and_plan_chart').prop('checked');
        var discharge_patients = tr.find('#discharge_patients').prop('checked');
        var can_book_ot = tr.find('#can_book_ot').prop('checked');
        var can_view_ot_list = tr.find('#can_view_ot_list').prop('checked');
        var view_radiology_section = tr.find('#view_radiology_section').prop('checked');
        var view_ward_bed_list = tr.find('#view_ward_bed_list').prop('checked');
        var view_statistics = tr.find('#view_statistics').prop('checked');
        var view_inventory = tr.find('#view_inventory').prop('checked');
        var view_accounts = tr.find('#view_accounts').prop('checked');
        var view_configurations = tr.find('#view_configurations').prop('checked');
        var view_master_list = tr.find('#view_master_list').prop('checked');
        var can_update_patient_record = tr.find('#can_update_patient_record').prop('checked');
        var can_update_hp_chart = tr.find('#can_update_hp_chart').prop('checked');

        function converter(param) {
            if (param === true) {
                return "1";
            }
            else {
                return "0";
            }
        }

        var new_allow_user_to_admit = converter(allow_user_to_admit);
        var new_view_admitted_patients = converter(view_admitted_patients);
        var new_view_history_and_plan_chart = converter(view_history_and_plan_chart);
        var new_discharge_patients = converter(discharge_patients);
        var new_can_book_ot = converter(can_book_ot);
        var new_can_view_ot_list = converter(can_view_ot_list);
        var new_view_radiology_section = converter(view_radiology_section);
        var new_view_ward_bed_list = converter(view_ward_bed_list);
        var new_view_statistics = converter(view_statistics);
        var new_view_inventory = converter(view_inventory);
        var new_view_accounts = converter(view_accounts);
        var new_view_configurations = converter(view_configurations);
        var new_view_master_list = converter(view_master_list);
        var new_can_update_patient_record = converter(can_update_patient_record);
        var new_can_update_hp_chart = converter(can_update_hp_chart);

        console.log(priv_id);
        console.log(ug_desc);
        console.log(new_allow_user_to_admit);
        console.log(new_view_admitted_patients);
        console.log(new_view_history_and_plan_chart);
        console.log(new_discharge_patients);
        console.log(new_can_book_ot);
        console.log(new_can_view_ot_list);
        console.log(new_view_radiology_section);
        console.log(new_view_ward_bed_list);
        console.log(new_view_statistics);
        console.log(new_view_inventory);
        console.log(new_view_accounts);
        console.log(new_view_configurations);
        console.log(new_view_master_list);
        console.log(new_can_update_patient_record);
        console.log(new_can_update_hp_chart);


        $.ajax({
            url: base_url + "dashboard/insert_ug/",
            type: "post",
            data: {
                priv_id: priv_id,
                ug_desc: ug_desc,
                allow_user_to_admit: new_allow_user_to_admit,
                view_admitted_patients: new_view_admitted_patients,
                view_history_and_plan_chart: new_view_history_and_plan_chart,
                discharge_patients: new_discharge_patients,
                can_book_ot: new_can_book_ot,
                can_view_ot_list: new_can_view_ot_list,
                view_radiology_section: new_view_radiology_section,
                view_ward_bed_list: new_view_ward_bed_list,
                view_statistics: new_view_statistics,
                view_inventory: new_view_inventory,
                view_accounts: new_view_accounts,
                view_configurations: new_view_configurations,
                view_master_list: new_view_master_list,
                can_update_hp_chart: new_can_update_hp_chart,
                can_update_patient_record: new_can_update_patient_record
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'New User Privileges have been added successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                
                tr.find(".priv-insert").prop('disabled', true);
            }

        });
    });
    $(".update-pwd").click(function () {
        var tr = $(this).closest('tr');
        var uid = tr.find('#userid').val();
        $('.hidden-input-div input[type=hidden]').remove();
        $('.hidden-input-div').append('<input type="hidden" id="user-id" value="' + uid + '">');
    });
    $(".save-password").click(function () {
        var password = $('#new-password').val();
        var priv_id = $('.hidden-input-div input[type=hidden]').val();
        $.ajax({
            url: base_url + "index.php/dashboard/user_pwd_update/",
            type: "post",
            data: {priv_id: priv_id, password: password},
            success: function (data) {
                $('.pwd-modal').modal('hide');
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Password Updated Successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                

            }
        })
    });
    $(".pwd-hider").click(function () {
        if ($('#new-password').prop('type') === "password") {
            $('#new-password').attr("type", "text");
        }
        else {
            $('#new-password').attr("type", "password");
        }
    });
    $(".delete-user").click(function () {
        var tr = $(this).closest('tr');
        var uid = tr.find('#userid').val();
        $.ajax({
            url: base_url + "dashboard/hide_user_in_ulist/",
            type: "post",
            data: {id: uid},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'User has been deleted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                
                tr.remove();
            }

        });
    });
    $(".delete-priv").click(function () {
        var tr = $(this).closest('tr');
        var ug_id = tr.find('#ugid').val();
        $.ajax({
            url: base_url + "dashboard/ug_delete/",
            type: "post",
            data: {ug_id: ug_id},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'User has been deleted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                
                tr.remove();
            }
        });
    });
    var deltr;
    var delpatuid;
    $(".delete-patient").click(function () {
        deltr = $(this).closest('tr');
        delpatuid = deltr.find('#regNo').text();
        $('#delete-modal').modal('show');
    });
    $(".confirm-delete-patient").click(function () {
        $.ajax({
            url: base_url + "dashboard/delete_patient/",
            type: "post",
            data: {search_by_cnic: delpatuid},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Patient has been deleted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                console.log(data + " " + delpatuid);
                deltr.remove();
            }
        });
        $('#delete-modal').modal('hide');
    });
    $('.hide-patient-delete-modal').click(function () {
        $('#delete-modal').modal('hide');
    });

    $("#admitted-patient-search").DataTable();
    $("#vitals-search").DataTable(
        {
            searching: false
        }
    );
    $("#discharged-patient-search").DataTable();
    $("#view-ot-table-1").DataTable();
    $("#view-ot-table-2").DataTable();

    $('.wardName-select').select2({
        placeholder: "Search By Ward",
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_wardnumber: "true"
                }
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };

            },
            cache: true
        }
    });

    $('.status-select').select2({
        placeholder: "Search By Availability"
    });
    $('.status-select').change(function () {
        console.debug("changed");
        $('#search-by-status').submit();
    });
    var data, bedData;

    function details_in_popup(bedParam) {

        $.ajax({
            url: base_url + "/dashboard/search/?search_by_bed=" + bedParam,
            delay: 250,
            async: false,
            success: function (response) {
                data = response
            }
        });
        $.ajax({
            url: base_url + "/dashboard/get_bed_status_controller/?bedId=" + bedParam,
            delay: 250,
            async: false,
            success: function (response) {
                bedData = response
            }
        });
        console.debug(bedData);
        var parser;

        try {
            
            parser = JSON.parse(data);
            if (!parser.hasOwnProperty('bedStatus')) {
                return '<label><b>MR#: </b></label>&nbsp;' + parser.regNo + '<br>' +
                    '<label><b>Patient Name: </b></label>&nbsp;' + parser.patName + '<br>' +
                    '<label><b>' + parser.patNoKType + ': </b></label>&nbsp;' + parser.patNoK + '<br>' +
                    '<label><b>Ward#: </b></label>&nbsp;' + parser.patward_id + '<br>' +
                    '<label><b>Bed#: </b></label>&nbsp;' + parser.patbed_id + '<br>' +
                    '<label><b>Patient Chart: </b></label>&nbsp;' + '<a href="' + base_url + 'dashboard/patient_chart?search_by_cnic=' + parser.regNo + '" target="_blank">View Patient Chart</a>';
            }
            if (parser.hasOwnProperty('bedStatus')) {

                if (parser.bedStatus == 'Extra Bed') {
                    return '<label>' +
                        '<b>Ward#: </b>' +
                        '</label>' +
                        '&nbsp;' + parser.wardId + '<br>' +
                        '<label class="lblbed"><b>Bed#: </b>' +
                        '</label>' +
                        '&nbsp;' + parser.bedNo + '<br>' +
                        '<input type="hidden" class="pbedNo" value="' + parser.bedId + '">' +
                        '<label><b>Status: </b>' +
                        '</label>' +
                        '&nbsp;' + parser.bedStatus + '<br>' +
                        '<a class="label label-primary custom-delete-span">Delete Extra Bed</a>';
                }
                else {


                    if (bedData == 0) {
                        //alert(bedData);
                        //  $('.markasblocked').removeAttr('checked');
                        return '<label>' +
                            '<b>Ward#: </b>' +
                            '</label>' +
                            '&nbsp;' + parser.wardId + '<br>' +
                            '<label><b>Bed#: </b>' +
                            '</label>' +
                            '&nbsp;' + parser.bedNo + '<br>' +
                            '<input type="hidden" class="pbedNo" value="' + parser.bedId + '">' +
                            '<label><b>Status: </b>' +
                            '</label>' +
                            '&nbsp;' + parser.bedStatus + '<br>' +
                            '<label><b>Mark as Blocked/ Unblocked: </b>' +
                            '</label>' +
                            '&nbsp;' + '<input type="checkbox" class="markasblocked" checked>';
                    }
                    else {
                        return '<label>' +
                            '<b>Ward#: </b>' +
                            '</label>' +
                            '&nbsp;' + parser.wardId + '<br>' +
                            '<label><b>Bed#: </b>' +
                            '</label>' +
                            '&nbsp;' + parser.bedNo + '<br>' +
                            '<input type="hidden" class="pbedNo" value="' + parser.bedId + '">' +
                            '<label><b>Status: </b>' +
                            '</label>' +
                            '&nbsp;' + parser.bedStatus + '<br>' +
                            '<label><b>Mark as Blocked/ Unblocked: </b>' +
                            '</label>' +
                            '&nbsp;' + '<input type="checkbox" class="markasblocked">';
                    }
                }
            }

        }
        catch (e) {
            return 'JSON Error!';
        }
    }

    $('.infopopover').hover(function (e) {
        $('.infopopover').not(this).popover('hide');
    });
    $('.infopopover').focus(function (e) {
        $('.infopopover').not(this).popover('hide');
    });
    $('.custom-delete-span').click(function (e) {
        console.debug(e);
    });

    $('body').on('click', '.markasblocked', function () {
        var closest = $(this).closest('.popover-content');
        var bedId = closest.find('.pbedNo').val();
        //alert(bedId);
        $.ajax({
            url: base_url + "dashboard/bed_blocker_controller/",
            type: "post",
            data: {
                bedId: bedId
            },
            success: function (data) {
                if (data == 1) {
                    closest.parent().parent().find('.custom-span').removeAttr('id');
                    closest.parent().parent().find('.custom-span').attr('id', "color-blocked");
                    console.log(closest.parent().parent().find('.custom-span').attr("id"));
                }
                else {
                    closest.parent().parent().find('.custom-span').removeAttr('id');
                    closest.parent().parent().find('.custom-span').attr('id', "color-available");
                    console.log(closest.parent().parent().find('.custom-span').attr("id"));
                }

                //alert(dump);
            }
        });

    });

    $('body').on('click', '.custom-delete-span', function () {
        var closest = $(this).closest('.popover-content');
        var bedId = closest.find('.pbedNo').val();
        // alert(bedId);

        $.ajax({
            url: base_url + "dashboard/delete_bed/",
            type: "post",
            data: {
                bedId: bedId
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Extra Bed has been delteted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                
                var dump = closest.parent().parent().remove();
                //alert(dump);
            }
        });


    });


    setTimeout(function () {
        $('.infopopover').popover({
            content: function () {
                var closest = $(this).closest('span');
                var bedId = closest.find('.bedID').val();
                //console.log(closest + bedId);
                return details_in_popup(bedId);
            },
            html: true,
            title: 'Bed Details' + '<button type="button" class="close custom-close" data-dismiss="alert" aria-hidden="true">×</button>',
            placement: 'top',
            delay: {hide: 100000},
            trigger: "hover focus"
        });
    }, 200);
    $('.infopopover').on('shown.bs.popover', function () {
        $('.custom-close').on('click', function () {
            $('.infopopover').popover('hide');
        });
    });

    function addExtraBeds(lastBedParam, nExtraBedsParam, lastBedIdParam, wardParam) {
        for (var i = 0; i < nExtraBedsParam; i++) {
            var href;
            function fhref(lastBedId) {
                href = '<a class=' + 'custom-delete-span' + '>Delete Extra Bed</a><input type=' + 'hidden' + ' class=' + 'pbedNo' + ' value=' + (parseInt(lastBedIdParam) + 1) + '>';
                console.debug(href);
                return href;
            }
            $('.testbeds').append(
                '<div class="col-sm-3 col-xs-4 allbeds">\n' +
                '<span class="label label-primary custom-span infopopover" id="color-temp-bed" data-toggle="popover" data-trigger="focus hover" data-content="' + '<label>' + '<b>Ward#: </b>' + '</label>' + '&nbsp;' + parseInt(wardParam) + '<br>' + '<label><b>Bed#: </b>' + '</label>' + '&nbsp;' + (parseInt(lastBedParam) + 1) + '<br>' + '<label><b>Status: </b>' + '</label>' + '&nbsp;' + 'Extra Bed<br>' + fhref(parseInt(lastBedIdParam) + 1) + '">Extra Bed. ' + (parseInt(lastBedParam) + 1) + ' \n' +
                '<input type="hidden" class="bedID" value="' + (parseInt(lastBedIdParam) + 1) + '">\n' +
                '<input type="hidden" class="bedNo" value=" ' + (parseInt(lastBedParam) + 1) + ' ">\n' +
                '<input type="hidden" class="wardNo" value=" ' + parseInt(wardParam) + ' ">\n' +
                '</span>\n' +
                '</div>'
            );
            var postedBedNo = (parseInt(lastBedParam) + 1);
            var postedWardId = parseInt(wardParam);
            var postedBedStatus = "Extra Bed";
            //console.debug(postedBedNo + "->" + postedWardId + '->' + postedBedStatus);
            $("#bed-btn").attr("disabled", true);
            $.ajax({
                url: base_url + "index.php/dashboard/insert_temp_bed/",
                type: "post",
                data: {
                    bedNo: postedBedNo,
                    wardId: postedWardId,
                    bedStatus: postedBedStatus
                },
                success: function (data) {
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                        'Extra Bed has been added successfully.\n' +
                        '</div>');
                    $('.alert-success').delay(4000).fadeOut('slow');
                    $("#bed-btn").attr("disabled", false);
                    
                }
            });
            var tempBed = $('.temp-bed-number').html().trim();
            tempBed = $('.temp-bed-number').html(parseInt(tempBed) + 1);
        }


        $('.infopopover').hover(function (e) {
            $('.infopopover').not(this).popover('hide');
        });
        $('.infopopover').focus(function (e) {
            $('.infopopover').not(this).popover('hide');
        });
        setTimeout(function () {
            $('.infopopover').popover({
                content: function () {
                    var closest = $(this).closest('span');
                    var bedId = closest.find('.bedID').val();
                    //console.log(closest + bedId);
                    return details_in_popup(bedId);
                },
                html: true,
                title: 'Bed Details' + '<button type="button" class="close custom-close" data-dismiss="alert" aria-hidden="true">×</button>',
                placement: 'top',
                delay: {hide: 100000},
                trigger: "hover focus"
            });
        }, 200);
        $('.infopopover').on('shown.bs.popover', function () {
            $('.custom-close').on('click', function () {
                $('.infopopover').popover('hide');
            });
            // $('.custom-delete-span').click(function () {
            //     var closest = $(this).closest('.popover-content');
            //     var bedId = closest.find('.pbedNo').val();
            //     alert("from click"+ bedId);
            // });
        });
        window.location.href = base_url + "dashboard/bedslist/?search_by_wardnumber=" + wardParam;
    }

    function addPermanentBeds(lastBedParam, nExtraBedsParam, lastBedIdParam, wardParam) {
        for (var i = 0; i < nExtraBedsParam; i++) {
            var href;

            function fhref(lastBedId) {
                href = '<a class=' + 'custom-delete-span' + '>Delete Extra Bed</a><input type=' + 'hidden' + ' class=' + 'pbedNo' + ' value=' + (parseInt(lastBedIdParam) + 1) + '>';
                console.debug(href);
                return href;
            }

            $('.testbeds').append(
                '<div class="col-sm-3 col-xs-4 allbeds">\n' +
                '<span class="label label-primary custom-span infopopover" id="color-available" data-toggle="popover" data-trigger="focus hover" data-content="' + '<label>' + '<b>Ward#: </b>' + '</label>' + '&nbsp;' + parseInt(wardParam) + '<br>' + '<label><b>Bed#: </b>' + '</label>' + '&nbsp;' + (parseInt(lastBedParam) + 1) + '<br>' + '<label><b>Status: </b>' + '</label>' + '&nbsp;' + 'Bed No.<br>' + fhref(parseInt(lastBedIdParam) + 1) + '">Bed No. ' + (parseInt(lastBedParam) + 1) + ' \n' +
                '<input type="hidden" class="bedID" value="' + (parseInt(lastBedIdParam) + 1) + '">\n' +
                '<input type="hidden" class="bedNo" value=" ' + (parseInt(lastBedParam) + 1) + ' ">\n' +
                '<input type="hidden" class="wardNo" value=" ' + parseInt(wardParam) + ' ">\n' +
                '</span>\n' +
                '</div>'
            );
            var postedBedNo = (parseInt(lastBedParam) + 1);
            var postedWardId = parseInt(wardParam);
            var postedBedStatus = "Available";
            //console.debug(postedBedNo + "->" + postedWardId + '->' + postedBedStatus);
            $.ajax({
                url: base_url + "index.php/dashboard/insert_temp_bed/",
                type: "post",
                data: {
                    bedNo: postedBedNo,
                    wardId: postedWardId,
                    bedStatus: postedBedStatus
                },
                success: function (data) {
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                        'New Bed has been added successfully.\n' +
                        '</div>');
                    $('.alert-success').delay(4000).fadeOut('slow');
                    
                }
            });
            // var tempBed = $('.temp-bed-number').html().trim();
            // tempBed = $('.temp-bed-number').html(parseInt(tempBed) + 1);
        }


        $('.infopopover').hover(function (e) {
            $('.infopopover').not(this).popover('hide');
        });
        $('.infopopover').focus(function (e) {
            $('.infopopover').not(this).popover('hide');
        });
        setTimeout(function () {
            $('.infopopover').popover({
                content: function () {
                    var closest = $(this).closest('span');
                    var bedId = closest.find('.bedID').val();
                    console.log(closest + bedId);
                    return details_in_popup(bedId);
                },
                html: true,
                title: 'Bed Details' + '<button type="button" class="close custom-close" data-dismiss="alert" aria-hidden="true">×</button>',
                placement: 'top',
                delay: {hide: 100000},
                trigger: "hover focus"
            });
        }, 200);
        $('.infopopover').on('shown.bs.popover', function () {
            $('.custom-close').on('click', function () {
                $('.infopopover').popover('hide');
            });
            // $('.custom-delete-span').click(function () {
            //     var closest = $(this).closest('.popover-content');
            //     var bedId = closest.find('.pbedNo').val();
            //     alert("from click"+ bedId);
            // });
        });
        window.location.href = base_url + "dashboard/permanent_bedslist/?search_by_wardnumber=" + wardParam;
    }

    $('#bed-btn').click(function () {
        var lastBedNumber = $('.allbeds > span > .bedNo').last().val();
        var lastBedId = $('.allbeds > span > .bedID').last().val();
        var numberOfExtraBeds = $('#extra-bed').val();
        var wardNo = $('.allbeds > span > .wardId').last().val();
        //console.log(lastBedNumber + '=>' + lastBedId + '=>' + numberOfExtraBeds);
        addExtraBeds(lastBedNumber, numberOfExtraBeds, lastBedId, wardNo);

    });
    $('#permanent-bed-btn').click(function () {
        var lastBedNumber = $('.allbeds > span > .bedNo').last().val();
        var lastBedId = $('.allbeds > span > .bedID').last().val();
        var numberOfExtraBeds = $('#extra-bed').val();
        var wardNo = $('.allbeds > span > .wardId').last().val();
        console.log(lastBedNumber + '=>' + lastBedId + '=>' + numberOfExtraBeds);
        addPermanentBeds(lastBedNumber, numberOfExtraBeds, lastBedId, wardNo);

    });
    var isExpVisible = 0;
    $('.new-expense').hide();
    $('.btn-new-category').on('click', function () {

        switch (isExpVisible) {
            case 0:
                $('.new-expense').slideDown();
                isExpVisible = 1;
                $('html, body').animate({
                    scrollTop: $("#add-a-category").offset().top
                }, 2000);
                break;
            case 1:
                $('.new-expense').slideUp();
                isExpVisible = 0;
                //alert(0);
                break;

            default:
                isExpVisible = 0;
        }
    });


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

    $('.datepicker-vital').datepicker({
        format: 'd-m-yyyy'
    });
    $('.timepicker-vital').timepicker({
        defaultTime: false
    });
    
     $('.datepicker-vital-rw').datepicker({
        format: 'd-m-yyyy'
    });
    $('.timepicker-vital-rw').timepicker({
        defaultTime: false
    });
    $('.timepicker-vital-rw').val(admlocaltime);
    $('.datepicker-vital-rw').val(admlocaldate);
    $('.timepicker-vital-rwgenerate-btn').val(admlocaltime);
    
    $('#dischargeDate').datepicker({
        format: 'yyyy-mm-dd'
    }).datepicker("setDate", new Date());
    
    
    var isvitalVisible = 0;
    $('.new-vital').hide();
    $('.btn-new-vital').on('click', function () {

        switch (isvitalVisible) {
            case 0:
                $('.new-vital').slideDown();
                isVisible = 1;
                $('html, body').animate({
                    scrollTop: $("#add-a-vital").offset().top
                }, 2000);
                break;
            case 1:
                $('.new-vital').slideUp();
                isVisible = 0;
                break;
            default:
                isvitalVisible = 0;
        }
    });

    var isNewWardBtnVisible = 0;
    $('.new-ward').hide();
    $('.btn-new-ward').on('click', function () {

        switch (isNewWardBtnVisible) {
            case 0:
                $('.new-ward').slideDown();
                isNewWardBtnVisible = 1;
                $('html, body').animate({
                    scrollTop: $("#add-a-ward").offset().top
                }, 2000);
                break;
            case 1:
                $('.new-ward').slideUp();
                isNewWardBtnVisible = 0;
                //alert(0);
                break;

            default:
                isNewWardBtnVisible = 0;
        }
    });
    $(".delete-report").click(function () {
        var tr = $(this).closest('tr');
        var reportId = tr.find('.reportID').val();

        $.ajax({
            url: base_url + "dashboard/delete_report/",
            type: "post",
            data: {reportId: reportId},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Report has been deleted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                //
                tr.remove();
            }
        });
    });
    $(".delete-vital").click(function () {
        var tr = $(this).closest('tr');
        var vitalId = tr.find('.vitalID').val();

        $.ajax({
            url: base_url + "dashboard/delete_vital/",
            type: "post",
            data: {vitalId: vitalId},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Report has been deleted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                //
                tr.remove();
            }
        });
    });
      
//      $(".delete-vital").click(function () {
//        var tr = $(this).closest('tr');
//        var vitalId = tr.find('.vitalID').val();
//
//        $.ajax({
//            url: base_url + "dashboard/delete_vital/",
//            type: "post",
//            data: {vitalId: vitalId},
//            success: function (data) {
//                $('.wrapper').append('<div style="position: fixed;\n' +
//                    'top: 20px;\n' +
//                    'right: 20px;\n' +
//                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
//                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
//                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
//                    'Report has been deleted successfully.\n' +
//                    '</div>');
//                $('.alert-success').delay(4000).fadeOut('slow');
//                
//                tr.remove();
//            }
//        });
//    });
  
  
    
    
    $(".edit-category").click(function () {
        var tr = $(this).closest('tr');
        var categoryNo = tr.find('#categoryNo').val();
        tr.find('#cattd').hide();
        tr.find('#txtCatName').attr("type", "text");
        var categoryName = tr.find('#categoryName').val();
        tr.find('.save-category').show();
        $(this).hide();

    });


    $(".save-category").click(function () {
        var tr = $(this).closest('tr');
        var categoryNo = tr.find('#categoryNo').val();
        var categoryName = tr.find('#txtCatName').val();
        $.ajax({
            url: base_url + "dashboard/edit_category/",
            type: "post",
            data: {categoryNo: categoryNo, categoryName: categoryName},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Category has been edited successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
               // 

                tr.find('#txtCatName').attr("type", "hidden");
                tr.find('#cattd').text(tr.find('#txtCatName').val()).show();
                tr.find('.edit-category').show();
                $('.save-category').hide();
            }
        });
    });

    $(".delete-category").click(function () {
        var tr = $(this).closest('tr');
        var wardId = tr.find('#wardId').val();
        $.ajax({
            url: base_url + "dashboard/delete_ot_ward/",
            type: "post",
            data: {otwardId: wardId},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Ward has been deleted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
                tr.remove();
            }
        });
    });
    $('.update-side-room').click(function () {
        var cost = $('#side-room-rate-textbox').val();
        $.ajax({
            url: base_url + "dashboard/side_room_cost/",
            type: "post",
            data: {cost: cost},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Cost has been updated successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
                tr.remove();
            }
        });
    });
    $('#datepicker-adm').datepicker({
        format: 'd-m-yyyy'
    });
    $('#timepicker-adm').timepicker({
        defaultTime: false
    });


    // $('.slide').slideDown();
    //Arslan Codes ends here

//=======================================================//
//            Js Code for OT Module starts here          //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    $('#datepicker-ot').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#timepicker1').timepicker({
        defaultTime: false
    });
    $('.otward-select').select2({
        placeholder: "Search By Operation Theatre",
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_otward: "true"
                }
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.otward-select').change(function () {
        $('#search-by-otward').submit();
    });
    $('.operated-otward-select').select2({
        placeholder: "Search By Operation Theatre",
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_otward: "true"
                }
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.operated-otward-select').change(function () {
        $('#search-by-otward-operated').submit();
    });
    $('.ot-patName-select').select2({
        placeholder: "Search by MR# or Name",
        minimumInputLength: 2,
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_ot_by_cnic: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.ot-patName-select').change(function () {
        $('#search-ot-by-name').submit();
    });
    $('#search-ot-by-date').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('.search-ot-by-date').change(function () {
        $('#search-ot-by-date').submit();
    });
    $('#search-ot-by-date-operated').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('.search-ot-by-date-operated').change(function () {
        $('#search-ot-by-date-operated').submit();
    });
    var ot_id;
    var tr;
    $('.ot-delete-submit-btn').click(function () {
        $('#delete-modal').modal('show');
        tr = $(this).closest('tr');
        ot_id = tr.find('#otid').val();
    });
    $('.ot-operation-submit-btn').click(function () {
        $('#operated-modal').modal('show');
        tr = $(this).closest('tr');
        ot_findings = tr.find('#otfindings').val();
        $('#ot-op-finding-procedure').text(ot_findings);
    });
    $('#close-operated-submit-btn').click(function () {
        $('#operated-modal').modal('hide');
    });
    $('.ot-complete-submit-btn').click(function () {
        $('#op-complete-modal').modal('show');
        tr = $(this).closest('tr');
        ot_id = tr.find('#otid').val();

        var dNow = new Date();
        var dateOfOperation = ("0" + dNow.getDate()).slice(-2) + '-' + ("0" + (dNow.getMonth() + 1)).slice(-2) + '-' + dNow.getFullYear();
        var timeOfOperation = formatAMPM(dNow);
        $('#date-of-operation').val(dateOfOperation);
        $('#time-of-operation').val(timeOfOperation);
    });
    $('.ot-surgeon').select2({
        placeholder: "Select Surgeon"
    });
    $('.ot-anesthesia').select2({
        placeholder: "Select Anesthesiologist"
    });
    $('#ot-operated-submit').click(function () {
        var otBookingNo = ot_id;
        var otAnesthesia = $('#ot-anesthesiologist-name').val();
        var otOpFindingsProc = $('#ot-op-finding-proc').val();
//        var dateOfOperation = $('#date-of-operation').val();
//        var timeOfOperation = $('#time-of-operation').val();
        var preOpDiagnosis = $('#pre-op-diagnosis').val();
        var postOpDiagnosis = $('#post-op-diagnosis').val();
        var anesthesia = $('#anesthesia').val();
        var assistant = $('#assistant-name').val();
        var incision = $('#incision').val();
        var durationOfProcedure = $('#duration-of-procedure').val();
        var preOperativeFindings = $('#pre-operative-findings').val();
        var biopsy = $('#biopsy').val();
        var drains = $('#drains').val();
        var referr_cons = $('#ot-op-referr-cons').val();
        var vitaldrname = $('#ot-op-vital-dr-name').val();
        var opvitaloulse = $('#ot-op-vital-pulse').val();
        var opvitalbp = $('#ot-op-vital-bp').val();
        var opvitaltemp = $('#ot-op-vital-temp').val();
        var opvitalrr = $('#ot-op-vital-rr').val();

        if (otAnesthesia !== '' && otOpFindingsProc !== '' && otBookingNo !== '') {
            $.ajax({
                url: base_url + "index.php/dashboard/update_ot_operated_db",
                type: "post",
                data: {
                    otBookingNo: otBookingNo,
                    otAnesthesia: otAnesthesia,
                    otOpFindingsProc: otOpFindingsProc,
//                    dateOfOperation: dateOfOperation,
//                    timeOfOperation: timeOfOperation,
                    preOpDiagnosis: preOpDiagnosis,
                    postOpDiagnosis: postOpDiagnosis,
                    anesthesia: anesthesia,
                    assistant: assistant,
                    incision: incision,
                    durationOfProcedure: durationOfProcedure,
                    preOperativeFindings: preOperativeFindings,
                    biopsy: biopsy,
                    drains: drains,
                    referr_cons: referr_cons,
                    vitaldrname: vitaldrname,
                    opvitaloulse: opvitaloulse,
                    opvitalbp: opvitalbp,
                    opvitaltemp: opvitaltemp,
                    opvitalrr: opvitalrr
                },
                success: function (data) {
                    $('#op-complete-modal').modal('hide');
                    tr.find('#status').text("Operated");
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                        'Patient has been Operated Successfully.\n' +
                        '</div>');
                    $('.alert-success').delay(4000).fadeOut('slow');
                   // 
                }
            });
        }
        else {
            alert("Please fill in the Operation Information to proceed!");
        }
    });
    $(".delete-ot-row").click(function () {
        // var tr = $(button1).closest('tr');
        // var ot_id = tr.find('#otid').val();
        console.log("a" + ot_id);
        $.ajax({
            url: base_url + "dashboard/ot_delete/",
            type: "post",
            data: {ot_id: ot_id},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Operation theatre booking has been canceled successfully.\n' +
                    '</div>');
                $('#delete-modal').modal('hide');
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
                tr.remove();
            }
        });
    });
    $(".nodelete-ot-row").click(function () {
        $('#delete-modal').modal('hide');
    });
    $('.operation-ty').select2({placeholder: "Operation Type"});
    $('.patient-status').select2({placeholder: "Patient Status"});
    $('.ot-ward').select2({placeholder: "Select Operation Theatre"});
//=======================================================//
//             Js Code for OT Module ends here           //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//

    //Arslan Code for disease, ward and beds select boxes starts here
    $('.disease').select2({
        placeholder: "Select a Disease",
        ajax: {
            url: base_url + "index.php/dashboard/get_all_diseases_controller",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                var query = {
                    search_by_disease: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {
                    results: data
                };
                alert(data);

            },
            cache: true
        }
    });
    $('.ward-name').select2({
        placeholder: "Select a Ward",
        ajax: {
            url: base_url + "dashboard/get_all_wards_controller",
            dataType: 'json',
            delay: 250,
            processResults: function (data) {
                return {
                    results: data
                };
//                alert(data);

            },
            cache: true
        }
    });
    $('.beds').select2({placeholder: "Select a Ward First"});
    $('.ward-name').on('change', function () {
        var wardName = $('.ward-name option:selected').val();
        $('.beds').select2({
            placeholder: "Select a Bed",
            ajax: {
                url: base_url + "dashboard/get_beds_by_wards_controller",
                dataType: 'json',
                delay: 250,

                data: function (params) {
                    var query = {
                        wardId: wardName
                    }
                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data) {
                    return {

                        results: data
                    };

                },
                cache: true
            }
        });
    });
    $(document).on('click', '[data-toggle="lightbox"]', function (event) {

        event.preventDefault();
        $(this).ekkoLightbox();
    });
    //Arslan Code for disease, ward and beds select boxes ends here

//=======================================================//
//          Js Code for Account Module starts here       //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    //============Account Details============//
    $('.account-patName-select').select2({
        placeholder: "Search by MR# or Name",
        minimumInputLength: 2,
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_account_by_cnic: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.account-patName-select').change(function () {
        $('#search-account-by-name').submit();
    });
    $('.advance-payment-submit-btn').click(function () {
        $('#advance-payment-modal').modal('show');
    });
    $('#advance-amount').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('#add-advance-payment-submit').click(function () {
        var account = $('#account-no').text();
        var amount = $('#advance-amount').val();

        var nowdate = new Date();
        var regno = $('#reg-no').text();
        var username = $('#user-name').val();
        var datetime1 = $('#date-time').val();
        if (amount !== '' && account !== '') {
            $.ajax({
                url: base_url + "index.php/dashboard/insert_patient_payment/",
                type: "post",
                data: {
                    accountNo: account,
                    amount: amount,
                    nowDate: nowdate,
                    regNo: regno
                },
                success: function (data) {
                    $('#advance-payment-modal').modal('hide');
                    var rows = $('#payment-table tr').length;
                    $('#payment-table').find('tbody').append("<tr><td>" + rows + "</td><td>" + datetime1 + "</td><td>" + username + "</td><td>" + amount + "</td></tr>");
                    var total = parseInt($('#total-deposited').text());
                    var balance = parseInt($('#remaining-balance').text());
                    var totalamount = total + parseInt(amount);
                    var remainingbalance = balance + parseInt(amount);
                    $('#total-payment').text(totalamount);
                    $('#total-deposited').text(totalamount);
                    $('#remaining-balance').text(remainingbalance);
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                        'Advance payment has been added successfully.\n' +
                        '</div>');
                    $('.alert-success').delay(4000).fadeOut('slow');
                  //  
                }
            });
        }
        else {
            alert("Please fill in the Operation Information to proceed!");
        }
    });
    //============Generate Invoice============//
    $('#discount-amount').keyup(function () {
        var totaldeposited = parseInt($('#total-deposited').text());
        var runningbill = parseInt($('#running-bill').text());
        var remainingbalance = parseInt($('#remaining-balance').text());
        if ($('#discount-amount').val() != "") {
            var discountamount = parseInt($('#discount-amount').val());
            if (discountamount > runningbill) {
                discountamount = runningbill;
                $('#discount-amount').val(discountamount);
            }
            var refundableamount = totaldeposited - runningbill + discountamount;
            $('#refundable-amount').text(refundableamount);
        } else {
            var refundableamount = totaldeposited - runningbill;
            $('#refundable-amount').text(refundableamount);
        }
    });
    $('#discount-amount').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    //============Generated Invoice============//
    $('#generate-invoice-submit').click(function () {
        var admissionStatus = $('#admission-status').text();
        var isInvoiceGenerated = $('#is-invoice-generated').val();
        var discount = $('#discount-amount').val();
        var regno = $('#reg-no').text();
        var accountno = $('#pat-account-no').val();
        var remainingBalance = parseInt($('#remaining-balance').text());
        var refundableAmount = $('#refundable-amount').text();
        var runningbill = parseInt($('#running-bill').text());
        if (admissionStatus == "Discharged") {
            if (isInvoiceGenerated == "0") {
                if (runningbill >= 0) {
                    if (refundableAmount >= 0) {
                        $.ajax({
                            url: base_url + "dashboard/update_account_db/",
                            type: "post",
                            data: {
                                discount: discount,
                                regno: regno,
                                accountno: accountno
                            },
                            success: function (data) {
                                $('.wrapper').append('<div style="position: fixed;\n' +
                                    'top: 20px;\n' +
                                    'right: 20px;\n' +
                                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                                    'Invoice has been Generated Successfully.\n' +
                                    '</div>');
                                $('.alert-success').delay(3000).fadeOut('slow');
                              //  
                                setTimeout(function () {
                                    window.location = (base_url + "dashboard/generated_invoice/?accountno=" + accountno);
                                }, 4000);
                            }
                        });
                    } else {
                        $('.wrapper').append('<div style="position: fixed;\n' +
                            'top: 20px;\n' +
                            'right: 20px;\n' +
                            'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                            '<h4><i class="icon fa fa-ban"></i> Error!</h4>\n' +
                            'Sorry! Balance is remaining.\n' +
                            '</div>');
                        $('.alert-error').delay(4000).fadeOut('slow');
                    }
                } else {
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-ban"></i> Error!</h4>\n' +
                        'Sorry! Running bill is 0.\n' +
                        '</div>');
                    $('.alert-error').delay(4000).fadeOut('slow');
                }
            } else {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-ban"></i> Already Exist!</h4>\n' +
                    'Invoice has been already generated.\n' +
                    '</div>');
                $('.alert-error').delay(3000).fadeOut('slow');
                setTimeout(function () {
                    window.location = (base_url + "dashboard/generated_invoice/?accountno=" + accountno);
                }, 4000);
            }
        } else {
            $('.wrapper').append('<div style="position: fixed;\n' +
                'top: 20px;\n' +
                'right: 20px;\n' +
                'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                '<h4><i class="icon fa fa-ban"></i> Error!</h4>\n' +
                'Patient has not currently been discharged.\n' +
                '</div>');
            $('.alert-error').delay(4000).fadeOut('slow');
        }
    });
    //============Search Invoice============//
    $('.invoice-no').select2({
        placeholder: "Search by Invoice #",
        minimumInputLength: 1,
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_invoice_by_no: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.invoice-no').change(function () {
        $('#search-invoice-no').submit();
    });
    $('#search-invoice-by-date1').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('.search-invoice-by-date').change(function () {
        $('#search-invoice-by-date').submit();
    });
    //============Refunds============//
    $('#refunds-submit').click(function () {
        var admissionStatus = $('#admission-status').text();
        var isInvoiceGenerated = $('#is-invoice-generated').val();
        var accountno = $('#account-no').text();
        var refundamount = parseInt($('#refundable-amount').text());
        if (admissionStatus == "Discharged") {
            if (isInvoiceGenerated == "1") {
                if (refundamount > 0) {
                    $.ajax({
                        url: base_url + "dashboard/update_account_refund_db/",
                        type: "post",
                        data: {
                            accountno: accountno,
                            refundamount: refundamount
                        },
                        success: function (data) {
                            $('#refundable-amount').text("0");
                            $('#refunded-amount').text(refundamount);
                            $('#remaining-balance').text("0");
                            $('.wrapper').append('<div style="position: fixed;\n' +
                                'top: 20px;\n' +
                                'right: 20px;\n' +
                                'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                                '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                                'Amount Refunded Successfully.\n' +
                                '</div>');
                            $('.alert-success').delay(3000).fadeOut('slow');
                           // 
                        }
                    });
                } else {
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-ban"></i> Error!</h4>\n' +
                        'Sorry! Remaining balance is ' + refundamount + '.\n' +
                        '</div>');
                    $('.alert-error').delay(4000).fadeOut('slow');
                }
            } else {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-ban"></i> Already Exist!</h4>\n' +
                    'Sorry! Invoice has not been generated. Please generate the invoice first.\n' +
                    '</div>');
                $('.alert-error').delay(3000).fadeOut('slow');
            }
        } else {
            $('.wrapper').append('<div style="position: fixed;\n' +
                'top: 20px;\n' +
                'right: 20px;\n' +
                'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                '<h4><i class="icon fa fa-ban"></i> Error!</h4>\n' +
                'Sorry! Admitted patient can not refund amount.\n' +
                '</div>');
            $('.alert-error').delay(4000).fadeOut('slow');
        }
    });
    //============Hospital Expense============//
    $('.expense-category-select').select2({
        placeholder: "Select Category",
        ajax: {
            url: base_url + "index.php/dashboard/search_expense_category",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_expense_category_no: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.expense-datepicker').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('.expense-timepicker').timepicker({
        defaultTime: false
    });
    $('#expense-amount').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('#add-expense-submit').click(function () {
        $('#add-expense-form').submit();
    });
    var rows = 0;
    $('#add-more-expense-btn').click(function () {
        rows++;
        $('#table-expense-list').append('<tr role="row" class="odd">' +
            '<td>' +
            '<section class="invoice">' +
            '<div class="row">' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            '<label>Expense Category</label>' +
            '<select class="expense-category-select form-control" name="expense_category_no' + rows + '" style="width: 100%;" tabindex="4" required></select>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            '<label>Date &amp; Time</label>' +
            '<div class="input-group date bootstrap-timepicker timepicker">' +
            '<div class="col-md-6" style="padding: 0;">' +
            '<input type="text" class="form-control pull-right expense-datepicker" name="expense_date' + rows + '" autocomplete="off" placeholder="Select Date" required>' +
            '</div>' +
            '<div class="col-md-6" style="padding: 0;">' +
            '<input type="text" class="form-control pull-right expense-timepicker" name="expense_time' + rows + '" placeholder="Set Time" required>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            '<label>Description</label>' +
            '<input class="form-control" name="expense_description' + rows + '" style="width: 100%;" tabindex="4" placeholder="Type Expense Description" required>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            '<label>Amount</label>' +
            '<input class="form-control" name="expense_amount' + rows + '" id="expense-amount" style="width: 100%;" tabindex="4" placeholder="Enter Amount" required>' +
            '</div>' +
            '</div>' +
            '<div class="col-md-3">' +
            '<div class="form-group">' +
            '<button type="button" class="btn btn-flat bg-red btn-sm delete-row-btn" > Remove </button>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</section>' +
            '</td>' +
            '</tr>');
        $('.expense-category-select').select2({
            placeholder: "Select Category",
            ajax: {
                url: base_url + "index.php/dashboard/search_expense_category",
                dataType: 'json',
                delay: 250,

                data: function (params) {
                    var query = {
                        search_expense_category_no: params.term
                    }
                    // Query parameters will be ?search=[term]&type=public
                    return query;
                },
                processResults: function (data) {
                    return {

                        results: data
                    };

                },
                cache: true
            }
        });
        $('.expense-datepicker').datepicker({
            format: 'dd-mm-yyyy'
        });
        $('.expense-timepicker').timepicker({
            defaultTime: false
        });
        $('#expense-amount').keydown(function () {
            //allow  backspace, tab, ctrl+A, escape, carriage return
            if (event.keyCode == 8 || event.keyCode == 9
                || event.keyCode == 27 || event.keyCode == 13
                || (event.keyCode == 65 && event.ctrlKey === true))
                return;
            if ((event.keyCode < 48 || event.keyCode > 57))
                event.preventDefault();
        });
        $('#total-rows').val(rows);
    });
    

    $('body').on('click', '.delete-row-btn', function () {
        var tr = $(this).closest('.odd');
        var dump = tr.remove();
    });
    var isMenuVisible = 0;
    $('body').on('click', '.menu-li', function () {
        if ($('.ahref').attr("href") != '') {

            // var closest = $(this).s('.slide');
            //var bedId = closest.find('.pbedNo').val();
            // console.debug(closest);

            switch (isMenuVisible) {
                case 0:
                    $(this).find('.slide').slideDown();
                    isMenuVisible = 1;
                    break;
                case 1:
                    $(this).find('.slide').slideUp();
                    isMenuVisible = 0;
                    break;

                default:
                    isMenuVisible = 0;
            }
        }
    });
    $('#search-expense-by-daterange').daterangepicker({
        locale: {
            format: 'DD-MM-YYYY'
        },
        opens: 'right',
        autoApply: true

    }, function (start, end, label) {
        var sdate = start.format('YYYY-MM-DD');
        var edate = end.format('YYYY-MM-DD');
        $('#expense-sdate').val(sdate);
        $('#expense-edate').val(edate);
        $('#search-expense-by-date').submit();
    });
    $('.exp-category-select').select2({
        placeholder: "Select Category"
    });
    var exp_id;
    $('.exp-delete-submit-btn').click(function () {
        $('#exp-delete-modal').modal('show');
        tr = $(this).closest('tr');
        exp_id = tr.find('#expense-id').val();
    });
    $(".delete-exp-row").click(function () {
        $.ajax({
            url: base_url + "dashboard/exp_delete/",
            type: "post",
            data: {exp_id: exp_id},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Expense has been deleted successfully.\n' +
                    '</div>');
                $('#exp-delete-modal').modal('hide');
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
                tr.remove();
            }
        });
    });
    $(".nodelete-exp-row").click(function () {
        $('#exp-delete-modal').modal('hide');
    });
    $('.exp-print-submit-btn').click(function () {
        tr = $(this).closest('tr');
        exp_id = tr.find('#expense-id').val();
        tr.find('.exp-delete-submit-btn').remove();
        tr.find('.exp-update-btn').remove();
        $.ajax({
            url: base_url + "dashboard/exp_update/",
            type: "post",
            data: {exp_id: exp_id},
            success: function (data) {
            }
        });
    });
    $('#print-generate-invoice-submit').click(function () {
        var admissionStatus = $('#admission-status').text();
        var isInvoiceGenerated = $('#is-invoice-generated').val();
        var discount = $('#discount-amount').val();
        var regno = $('#reg-no').text();
        var accountno = $('#pat-account-no').val();
        var remainingBalance = parseInt($('#remaining-balance').text());
        var refundableAmount = $('#refundable-amount').text();
        var runningbill = parseInt($('#running-bill').text());
        if (admissionStatus == "Discharged") {
            if (isInvoiceGenerated == "0") {
                if (runningbill >= 0) {
                    if (refundableAmount >= 0) {
                        $.ajax({
                            url: base_url + "dashboard/update_account_db/",
                            type: "post",
                            data: {
                                discount: discount,
                                regno: regno,
                                accountno: accountno
                            },
                            success: function (data) {
                                $('.wrapper').append('<div style="position: fixed;\n' +
                                    'top: 20px;\n' +
                                    'right: 20px;\n' +
                                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                                    'Invoice has been Generated Successfully.\n' +
                                    '</div>');
                                $('.alert-success').delay(3000).fadeOut('slow');
                               // 

                                window.open(base_url + "dashboard/print_invoice/?accountno=" + accountno, '_blank');

                                setTimeout(function () {
                                    window.location = (base_url + "dashboard/generated_invoice/?accountno=" + accountno);
                                }, 4000);
                            }
                        });
                    } else {
                        $('.wrapper').append('<div style="position: fixed;\n' +
                            'top: 20px;\n' +
                            'right: 20px;\n' +
                            'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                            '<h4><i class="icon fa fa-ban"></i> Error!</h4>\n' +
                            'Sorry! Balance is remaining.\n' +
                            '</div>');
                        $('.alert-error').delay(4000).fadeOut('slow');
                    }
                } else {
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-ban"></i> Error!</h4>\n' +
                        'Sorry! Running bill is 0.\n' +
                        '</div>');
                    $('.alert-error').delay(4000).fadeOut('slow');
                }
            } else {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-ban"></i> Already Exist!</h4>\n' +
                    'Invoice has been already generated.\n' +
                    '</div>');
                $('.alert-error').delay(3000).fadeOut('slow');
                window.open(base_url + "dashboard/print_invoice/?accountno=" + accountno, '_blank');
                setTimeout(function () {
                    window.location = (base_url + "dashboard/generated_invoice/?accountno=" + accountno);
                }, 4000);
            }
        } else {
            $('.wrapper').append('<div style="position: fixed;\n' +
                'top: 20px;\n' +
                'right: 20px;\n' +
                'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                '<h4><i class="icon fa fa-ban"></i> Error!</h4>\n' +
                'Patient has not currently been discharged.\n' +
                '</div>');
            $('.alert-error').delay(4000).fadeOut('slow');
        }
    });
    $('#print-expense-btn').click(function () {
        $('#print-expense-form').submit();
    });
//=======================================================//
//           Js Code for Account Module ends here        //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//

//=======================================================//
//          Js Code for OT Form Module starts here       //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    //=============Collapse/Expend=============//
    //1st next btn click
    $('#pre-op-fitness-next-btn').click(function () {
        $('#pre-op-fitness-body').slideUp();
        $('#pre-op-fitness-form').addClass("collapsed-box");
        $('#preoperative-order-form').removeClass("collapsed-box");
        setTimeout(function () {
            $('#pre-op-fitness-body').attr("style", "display:none");
            $('#preoperative-order-body').slideDown();
        }, 700);
        setTimeout(function () {
            $('#preoperative-order-body').removeAttr("style", "display:none");
        }, 800);
    });
    //2nd previous btn click
    $('#preoperative-order-previous-btn').click(function () {
        //collapse the body div
        $('#preoperative-order-body').slideUp();
        //add class collapsed-box in div
        $('#preoperative-order-form').addClass("collapsed-box");
        //add class collapsed-box in div
        $('#pre-op-fitness-form').removeClass("collapsed-box");

        setTimeout(function () {
            $('#preoperative-order-body').attr("style", "display:none");
            $('#pre-op-fitness-body').slideDown();
            //add style in box-body div
        }, 700);

        setTimeout(function () {
            $('#pre-op-fitness-body').removeAttr("style", "display:none");
        }, 800);

    });
    //2nd next btn click
    $('#preoperative-order-next-btn').click(function () {
        $('#preoperative-order-body').slideUp();
        $('#preoperative-order-form').addClass("collapsed-box");
        $('#preoperative-check-form').removeClass("collapsed-box");
        setTimeout(function () {
            $('#preoperative-order-body').attr("style", "display:none");
            $('#preoperative-check-body').slideDown();
        }, 700);
        setTimeout(function () {
            $('#preoperative-check-body').removeAttr("style", "display:none");
        }, 800);
    });
    //3nd previous btn click
    $('#preoperative-checklist-previous-btn').click(function () {
        //collapse the body div
        $('#preoperative-check-body').slideUp();
        //add class collapsed-box in div
        $('#preoperative-check-form').addClass("collapsed-box");
        //add class collapsed-box in div
        $('#preoperative-order-form').removeClass("collapsed-box");

        setTimeout(function () {
            $('#preoperative-check-body').attr("style", "display:none");
            $('#pre-op-order-body').slideDown();
            //add style in box-body div
        }, 700);

        setTimeout(function () {
            $('#preoperative-order-body').removeAttr("style", "display:none");
        }, 800);

    });
    //3nd next btn click
    $('#preoperative-checklist-next-btn').click(function () {
        $('#preoperative-check-body').slideUp();
        $('#preoperative-check-body').addClass("collapsed-box");
        $('#post-operative-performa-body').removeClass("collapsed-box");
        setTimeout(function () {
            $('#preoperative-check-body').attr("style", "display:none");
            $('#post-operative-performa-body').slideDown();
        }, 700);
        setTimeout(function () {
            $('#post-operative-performa-body').removeAttr("style", "display:none");
        }, 800);
    });
    //4rd previous btn click
    $('#post-operative-performa-previous-btn').click(function () {
        $('#post-operative-performa-body').slideUp();
        $('#post-operative-performa-form').addClass("collapsed-box");
        $('#preoperative-check-form').removeClass("collapsed-box");

        setTimeout(function () {
            $('#surgical-safety-checklist-body').attr("style", "display:none");
            $('#preoperative-checl-body').slideDown();
            //add style in box-body div
        }, 700);

        setTimeout(function () {
            $('#preoperative-check-body').removeAttr("style", "display:none");
        }, 800);

    });
    //4rd next btn click
    $('#post-operative-performa-next-btn').click(function () {
        $('#post-operative-performa-body').slideUp();
        $('#post-operative-performa-form').addClass("collapsed-box");
        $('#surgical-safety-checklist-form').removeClass("collapsed-box");
        setTimeout(function () {
            $('#post-operative-performa-body').attr("style", "display:none");
            $('#surgical-safety-checklist-body').slideDown();
        }, 700);
        setTimeout(function () {
            $('#surgical-safety-checklist-body').removeAttr("style", "display:none");
        }, 800);
    });
    //5th previous btn click
    $('#surgical-safety-checklist-previous-btn').click(function () {
        $('#surgical-safety-checklist-body').slideUp();
        $('#surgical-safety-checklist-form').addClass("collapsed-box");
        $('#post-operative-performa-form').removeClass("collapsed-box");

        setTimeout(function () {
            $('#surgical-safety-checklist-body').attr("style", "display:none");
            $('#post-operative-performa-body').slideDown();
            //add style in box-body div
        }, 700);

        setTimeout(function () {
            $('#post-operative-performa-body').removeAttr("style", "display:none");
        }, 800);

    });
    //5th next btn click
    $('#surgical-safety-checklist-next-btn').click(function () {
        $('#surgical-safety-checklist-body').slideUp();
        $('#surgical-safety-checklist-form').addClass("collapsed-box");
        $('#post-operative-instructions-form').removeClass("collapsed-box");
        setTimeout(function () {
            $('#post-operative-performa-body').attr("style", "display:none");
            $('#post-operative-instructions-body').slideDown();
        }, 700);
        setTimeout(function () {
            $('#post-operative-instructions-body').removeAttr("style", "display:none");
        }, 800);
    });
    //6th previous btn click
    $('#post-operative-instructions-previous-btn').click(function () {
        $('#post-operative-instructions-body').slideUp();
        $('#post-operative-instructions-form').addClass("collapsed-box");
        $('#surgical-safety-checklist-form').removeClass("collapsed-box");

        setTimeout(function () {
            $('#post-operative-instructions-body').attr("style", "display:none");
            $('#surgical-safety-checklist-body').slideDown();
            //add style in box-body div
        }, 700);

        setTimeout(function () {
            $('#surgical-safety-checklist-body').removeAttr("style", "display:none");
        }, 800);

    });
    //6th next btn click
    $('#post-operative-instructions-next-btn').click(function () {
        $('#post-operative-instructions-body').slideUp();
        $('#post-operative-instructions-form').addClass("collapsed-box");
        $('#protocol-receiving-patient-ot-form').removeClass("collapsed-box");
        setTimeout(function () {
            $('#post-operative-instructions-body').attr("style", "display:none");
            $('#protocol-receiving-patient-ot-body').slideDown();
        }, 700);
        setTimeout(function () {
            $('#protocol-receiving-patient-ot-body').removeAttr("style", "display:none");
        }, 800);
    });
    //7th previous btn click
    $('#protocol-receiving-patient-ot-previous-btn').click(function () {
        $('#protocol-receiving-patient-ot-body').slideUp();
        $('#protocol-receiving-patient-ot-form').addClass("collapsed-box");
        $('#post-operative-instructions-form').removeClass("collapsed-box");

        setTimeout(function () {
            $('#protocol-receiving-patient-ot-body').attr("style", "display:none");
            $('#post-operative-instructions-body').slideDown();
            //add style in box-body div
        }, 700);

        setTimeout(function () {
            $('#post-operative-instructions-body').removeAttr("style", "display:none");
        }, 800);

    });
    $('#pre-op-fitness-save-btn').click(function () {
        var preOpFNo = $('#pre-opf-no').val();
        var regNo = $('#reg-no').val();
        var otBookingNo = $('#ot-booking-no').val();
        var anesthetistRemarks = $('#anesthetist-remarks').val();
        var anesthetistAdvice = $('#anesthetist-advice').val();
        var anesthetistName = $('#anesthetist-name').val();
        var physicianRemarks = $('#physician-remarks').val();
        var physicianAdvice = $('#physician-advice').val();
        var physicianName = $('#physician-name').val();
        var anyOther = $('#any-other').val();
        $("#pre-op-fitness-print-btn").css("visibility", "visible");

        $.ajax({
            url: base_url + "index.php/dashboard/update_pre_op_fitness/",
            type: "post",
            data: {
                preOpFNo: preOpFNo,
                regNo: regNo,
                otBookingNo: otBookingNo,
                anesthetistRemarks: anesthetistRemarks,
                anesthetistAdvice: anesthetistAdvice,
                anesthetistName: anesthetistName,
                physicianRemarks: physicianRemarks,
                physicianAdvice: physicianAdvice,
                physicianName: physicianName,
                anyOther: anyOther
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Patient Pre-Operation Fitness Form has been Saved Successfully.\n' +
                    '</div>');
                $('#sty-1').attr("style", "color: green;");
                $('.alert-success').delay(4000).fadeOut('slow');
                
               // 
            }
        });

    });
    $('#npo-form').timepicker({
        defaultTime: false
    });
    $('#send-patient-ot').timepicker({
        defaultTime: false
    });
    $('#preoperative-order-save-btn').click(function () {
        var preOpONo = $('#pre-opo-no').val();
        var regNo = $('#reg-no1').val();
        var otBookingNo = $('#ot-booking-no1').val();
        var dateTimeNow = $('#date-time-now').text();
        var marksIdentification1 = $('#marks-identification-1').val();
        var marksIdentification2 = $('#marks-identification-2').val();
        var operationSite = $("input[name='operation-site']:checked").val();
        var operationSideMarked = $("input[name='operation-side-marked']:checked").val();
        var giveBath = $('#give-bath').prop('checked');
        var markOperationSite = $('#mark-operation-site').prop('checked');
        var provideHospitalDress = $('#provide-hospital-dress').prop('checked');
        var areaName = $('#area-name').val();
        var npoFormTime = $('#npo-form').val();
        var arrangeBlood = $('#arrange-blood').val();
        var sendFInvestigationOt = $('#send-f-investigation-ot').val();
        var preMedication = $('#pre-medication').val();
        var sendPatientOtTime = $('#send-patient-ot').val();
        var anyOtherOrder = $('#any-other-order').val();
        var laproscopicUse = $("input[name='laproscopic-use']:checked").val();
        var diathermyUse = $("input[name='diathermy-use']:checked").val();
        var tourniquetUse = $("input[name='tourniquet-use']:checked").val();
        var xRayUse = $("input[name='x-ray-use']:checked").val();
        var laserUse = $("input[name='laser-use']:checked").val();
        $("#pre-op-order-print-btn").css("visibility", "visible");
        $.ajax({
            url: base_url + "index.php/dashboard/update_pre_op_order/",
            type: "post",
            data: {
                preOpONo: preOpONo,
                regNo: regNo,
                otBookingNo: otBookingNo,
                dateTimeNow: dateTimeNow,
                marksIdentification1: marksIdentification1,
                marksIdentification2: marksIdentification2,
                operationSite: operationSite,
                operationSideMarked: operationSideMarked,
                giveBath: giveBath,
                markOperationSite: markOperationSite,
                provideHospitalDress: provideHospitalDress,
                areaName: areaName,
                npoFormTime: npoFormTime,
                arrangeBlood: arrangeBlood,
                sendFInvestigationOt: sendFInvestigationOt,
                preMedication: preMedication,
                sendPatientOtTime: sendPatientOtTime,
                anyOtherOrder: anyOtherOrder,
                laproscopicUse: laproscopicUse,
                diathermyUse: diathermyUse,
                tourniquetUse: tourniquetUse,
                xRayUse: xRayUse,
                laserUse: laserUse
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Patient Pre-Operative Order Form has been Saved Successfully.\n' +
                    '</div>');
                $('#sty-2').attr("style", "color: green;");
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
            }
        });

    });
    $('#surgical-safety-checklist-save-btn').click(function () {
        var surgicalSCNo = $('#surgical-sc-no').val();
        var regNo = $('#reg-no1').val();
        var otBookingNo = $('#ot-booking-no1').val();
        var dNow = new Date();
        var dateTimeNow = dNow.getDate() + '-' + (dNow.getMonth() + 1) + '-' + dNow.getFullYear() + ' ' + formatAMPM(dNow);
        var checkbox1 = $('#checkbox-1').prop('checked');
        var checkbox2 = $('#checkbox-2').prop('checked');
        var checkbox3 = $('#checkbox-3').prop('checked');
        var radio4 = $("input[name='radio-4']:checked").val();
        var radio5 = $("input[name='radio-5']:checked").val();
        var radio6 = $("input[name='radio-6']:checked").val();
        var checkbox7 = $('#checkbox-7').prop('checked');
        var checkbox8 = $('#checkbox-8').prop('checked');
        var checkbox9 = $('#checkbox-9').prop('checked');
        var checkbox10 = $('#checkbox-10').prop('checked');
        var checkbox11 = $('#checkbox-11').prop('checked');
        var checkbox12 = $('#checkbox-12').prop('checked');
        var checkbox13 = $('#checkbox-13').prop('checked');
        var checkbox14 = $('#checkbox-14').prop('checked');
        var checkbox15 = $('#checkbox-15').prop('checked');
        var checkbox16 = $('#checkbox-16').prop('checked');
        var checkbox17 = $('#checkbox-17').prop('checked');
        var checkbox18 = $('#checkbox-18').prop('checked');
        var checkbox19 = $('#checkbox-19').prop('checked');
        var checkbox20 = $('#checkbox-20').prop('checked');
        var checkbox21 = $('#checkbox-21').prop('checked');
        var checkbox22 = $('#checkbox-22').prop('checked');
        var checkbox23 = $('#checkbox-23').prop('checked');
        var checkbox24 = $('#checkbox-24').prop('checked');
        var checkbox25 = $('#checkbox-25').prop('checked');

        $.ajax({
            url: base_url + "index.php/dashboard/update_surgical_checklist/",
            type: "post",
            data: {
                surgicalSCNo: surgicalSCNo,
                regNo: regNo,
                otBookingNo: otBookingNo,
                dateTimeNow: dateTimeNow,
                checkbox1: checkbox1,
                checkbox2: checkbox2,
                checkbox3: checkbox3,
                radio4: radio4,
                radio5: radio5,
                radio6: radio6,
                checkbox7: checkbox7,
                checkbox8: checkbox8,
                checkbox9: checkbox9,
                checkbox10: checkbox10,
                checkbox11: checkbox11,
                checkbox12: checkbox12,
                checkbox13: checkbox13,
                checkbox14: checkbox14,
                checkbox15: checkbox15,
                checkbox16: checkbox16,
                checkbox17: checkbox17,
                checkbox18: checkbox18,
                checkbox19: checkbox19,
                checkbox20: checkbox20,
                checkbox21: checkbox21,
                checkbox22: checkbox22,
                checkbox23: checkbox23,
                checkbox24: checkbox24,
                checkbox25: checkbox25
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Patient Surgical Safety Checklist / Surgical Ward II Form has been Saved Successfully.\n' +
                    '</div>');
                $('#sty-3').attr("style", "color: green;");
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
            }
        });

    });
    $('#post-operative-instructions-save-btn').click(function () {
        var postOpINo = $('#post-op-i-no').val();
        var regNo = $('#reg-no1').val();
        var otBookingNo = $('#ot-booking-no1').val();
        var dNow = new Date();
        var dateTimeNow = dNow.getDate() + '-' + (dNow.getMonth() + 1) + '-' + dNow.getFullYear() + ' ' + formatAMPM(dNow);
        var forRecoveryArea = $('#for-recovery-area').val();
        var fluids = $('#fluids').val();
        var antibiotics = $('#antibiotics').val();
        var analgesics = $('#analgesics').val();
        var specialInstructions = $('#special-instructions').val();
        var instructionsForPathological = $('#instructions-for-pathological').val();
        $("#post-op-instruction-print-btn").css("visibility", "visible");
        $.ajax({
            url: base_url + "index.php/dashboard/update_post_operative_instructions/",
            type: "post",
            data: {
                postOpINo: postOpINo,
                regNo: regNo,
                otBookingNo: otBookingNo,
                dateTimeNow: dateTimeNow,
                forRecoveryArea: forRecoveryArea,
                fluids: fluids,
                antibiotics: antibiotics,
                analgesics: analgesics,
                specialInstructions: specialInstructions,
                instructionsForPathological: instructionsForPathological
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Patient Post Operative Instructions Form has been Saved Successfully.\n' +
                    '</div>');
                $('#sty-4').attr("style", "color: green;");
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
            }
        });

    });
    $('#post-operative-instructions-nurse-save-btn').click(function () {
        var postOpINo = $('#post-op-i-no').val();
        var regNo = $('#reg-no1').val();
        var otBookingNo = $('#ot-booking-no1').val();
        var dNow = new Date();
        var dateTimeNow = dNow.getDate() + '-' + (dNow.getMonth() + 1) + '-' + dNow.getFullYear() + ' ' + formatAMPM(dNow);
        var bloodLoss = $('#blood-loss').val();
        var bloodTransfusion = $('#blood-transfusion').val();
        var ivFluids = $('#iv-fluids').val();
        var urineOutput = $('#urine-output').val();
        var sawbOrInstruments = $("input[name='sawb-radio']:checked").val();
        $("#post-op-instruction-print-btn").css("visibility", "visible");

        $.ajax({
            url: base_url + "index.php/dashboard/update_post_operative_instructions_nurse/",
            type: "post",
            data: {
                postOpINo: postOpINo,
                regNo: regNo,
                otBookingNo: otBookingNo,
                dateTimeNow: dateTimeNow,
                bloodLoss: bloodLoss,
                bloodTransfusion: bloodTransfusion,
                ivFluids: ivFluids,
                urineOutput: urineOutput,
                sawbOrInstruments: sawbOrInstruments
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Patient Post Operative Instructions Form has been Saved Successfully.\n' +
                    '</div>');
                $('#sty-4').attr("style", "color: green;");
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
            }
        });

    });
    $('#protocol-receiving-patient-ot-save-btn').click(function () {
        var recPatOtNo = $('#pro-rec-pat-ot-no').val();
        var regNo = $('#reg-no1').val();
        var otBookingNo = $('#ot-booking-no1').val();
        var dNow = new Date();
        var dateTimeNow = dNow.getDate() + '-' + (dNow.getMonth() + 1) + '-' + dNow.getFullYear() + ' ' + formatAMPM(dNow);
        var houseOfficerId = $('#house-officer-id').val();
        var nurseId = $('#nurse-id').val();
        var documentsReceived = $("input[name='documents-received']:checked").val();
        var patientCategory = $("input[name='patient-category']:checked").val();
        var patientAlertness = $("input[name='patient-alertness']:checked").val();
        var pulseDoctor = $('#pulse-doctor').val();
        var bpDoctor = $('#bp-doctor').val();
        var tempDoctor = $('#temp-doctor').val();
        var rrDoctor = $('#rr-doctor').val();
        var gcsDoctor = $('#gcs-doctor').val();
        var cvpDoctor = $('#cvp-doctor').val();
        var pulseNurse = $('#pulse-nurse').val();
        var bpNurse = $('#bp-nurse').val();
        var tempNurse = $('#temp-nurse').val();
        var rrNurse = $('#rr-nurse').val();
        var gcsNurse = $('#gcs-nurse').val();
        var cvpNurse = $('#cvp-nurse').val();
        var statusOfDrains = $("input[name='status-of-drains']:checked").val();
        var biopsySpecimen = $("input[name='biopsy-specimen']:checked").val();
        var biopsySpecimenReason = $('#biopsy-specimen-reason').val();
        var dressing = $("input[name='dressing']:checked").val();
        var bloodTransfusion = $("input[name='blood-transfusion']:checked").val();
        var operationNotesOrdersChecked = $("input[name='operation-notes-order-checked']:checked").val();

        $.ajax({
            url: base_url + "index.php/dashboard/update_protocol_receiving_patient_ot/",
            type: "post",
            data: {
                recPatOtNo: recPatOtNo,
                regNo: regNo,
                otBookingNo: otBookingNo,
                dateTimeNow: dateTimeNow,
                houseOfficerId: houseOfficerId,
                nurseId: nurseId,
                documentsReceived: documentsReceived,
                patientCategory: patientCategory,
                patientAlertness: patientAlertness,
                pulseDoctor: pulseDoctor,
                bpDoctor: bpDoctor,
                tempDoctor: tempDoctor,
                rrDoctor: rrDoctor,
                gcsDoctor: gcsDoctor,
                cvpDoctor: cvpDoctor,
                pulseNurse: pulseNurse,
                bpNurse: bpNurse,
                tempNurse: tempNurse,
                rrNurse: rrNurse,
                gcsNurse: gcsNurse,
                cvpNurse: cvpNurse,
                statusOfDrains: statusOfDrains,
                biopsySpecimen: biopsySpecimen,
                biopsySpecimenReason: biopsySpecimenReason,
                dressing: dressing,
                bloodTransfusion: bloodTransfusion,
                operationNotesOrdersChecked: operationNotesOrdersChecked
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Patient Protocol of Receiving Patient from Operation Theatre \n Form has been Saved Successfully.\n' +
                    '</div>');
                $('#sty-5').attr("style", "color: green;");
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
            }
        });

    });
    $('.nurse-no').select2({
        placeholder: "Select Nurse"
    });
    $('#post-operative-performa-save-btn').click(function () {
        var consentOpNo = $('#consent-op-no').val();
        var dNow = new Date();
        var dateTimeNow = dNow.getDate() + '-' + (dNow.getMonth() + 1) + '-' + dNow.getFullYear() + ' ' + formatAMPM(dNow);
        $("#ot-consent-print-btn").css("visibility", "visible");
        
        $.ajax({
            url: base_url + "index.php/dashboard/update_consent_op/",
            type: "post",
            data: {
                consentOpNo: consentOpNo,
                dateTimeNow: dateTimeNow
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Patient Consent for Operation Form has been Saved Successfully.\n' +
                    '</div>');
                $('#sty-6').attr("style", "color: green;");
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
            }
        });

    });
    $('#date-of-operation').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#time-of-operation').timepicker({
        defaultTime: false
    });
//=======================================================//
//           Js Code for OT Form Module ends here        //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//

//=======================================================//
//         Js Code for Pharmacy Module starts here       //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    //============Products============//
    $('.pdct-category').select2({
        placeholder: "Select Product Category"
    });
    $('.pdct-unit').select2({
        placeholder: "Select Product Unit"
    });
    $('#product-expire-date').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#product-code').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('#product-purchase-price').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13 || event.keyCode == 190
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('#product-sales-price').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13 || event.keyCode == 190
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('#product-qty').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('#product-barcode').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('#product-reorder-level').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('.product-code-select').select2({
        placeholder: "Search by Product Code",
        minimumInputLength: 2,
        ajax: {
            url: base_url + "index.php/dashboard/search_product",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_product_code: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.product-code-select').change(function () {
        $('#search-product-by-code').submit();
    });
    $('.product-name-select').select2({
        placeholder: "Search by Product Name",
        minimumInputLength: 2,
        ajax: {
            url: base_url + "index.php/dashboard/search_product",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_product_name: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.product-name-select').change(function () {
        $('#search-product-by-name').submit();
    });
    $('.product-categ-select').select2({
        placeholder: "Search by Product Category",
        minimumInputLength: 0,
        ajax: {
            url: base_url + "index.php/dashboard/search_product",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_product_categ: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
    $('.product-categ-select').change(function () {
        $('#search-product-by-categ').submit();
    });
    $('.pdct-status').select2({
        placeholder: "Select Product Status"
    });
    $('#Update-product-btn').click(function () {
        var productNo = $('#product-no').val();
        var productCode = $('#product-code').val();
        var productName = $('#product-name').val();
        var productFormulation = $('#product-formulation').val();
        var productMg = $('#product-mg').val();
        var productPurchasePrice = $('#product-purchase-price').val();
        var productSalePrice = $('#product-sales-price').val();
        var productCategory = $('#product-category').val();
        var productUnit = $('#product-unit').val();
        var productQty = $('#product-qty').val();
        var productLocation = $('#product-location').val();
        var productBarcode = $('#product-barcode').val();
        var productManufacture = $('#product-manufacture').val();
        var productSupplier = $('#product-supplier').val();
        var productReorderLevel = $('#product-reorder-level').val();
        var productExpireDate = $('#product-expire-date').val();
        var productStatus = $('#product-status').val();
        if (productCode !== '' && productName !== '' && productFormulation !== '' && productPurchasePrice !== '' && productSalePrice !== '' && productUnit !== '' && productCategory !== '' && productReorderLevel !== '' && productExpireDate !== '' && productQty !== '') {
            $.ajax({
                url: base_url + "index.php/dashboard/update_product",
                type: "post",
                data: {
                    productNo: productNo,
                    productCode: productCode,
                    productName: productName,
                    productFormulation: productFormulation,
                    productMg: productMg,
                    productPurchasePrice: productPurchasePrice,
                    productSalePrice: productSalePrice,
                    productCategory: productCategory,
                    productUnit: productUnit,
                    productQty: productQty,
                    productLocation: productLocation,
                    productBarcode: productBarcode,
                    productManufacture: productManufacture,
                    productSupplier: productSupplier,
                    productReorderLevel: productReorderLevel,
                    productExpireDate: productExpireDate,
                    productStatus: productStatus
                },
                success: function (data) {
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                        'Product has been Updated Successfully.\n' +
                        '</div>');
                    $('.alert-success').delay(4000).fadeOut('slow');
                    setTimeout(function () {
                        window.location = (base_url + "dashboard/view_products/?search_by_product_id=" + productNo);
                    }, 5000);
                  //  
                }
            });
        } else {
            alert("Please fill in the product info to proceed!");
        }
    });
    //============Prescription============//

    $('.prescription-patName-select').select2({
        placeholder: "Search by MR# or Name",
        minimumInputLength: 2,
        ajax: {
            url: base_url + "index.php/dashboard/search_ot_patient_by_name",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_ot_by_name: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {

                return {

                    results: data

                };

            },
            cache: true
        }
    });
    $('.prescription-patName-select').change(function () {
        $('#search-prescription-patient-by-name').submit();
    });
    $('.product-name-select-for-prescription').select2({
        placeholder: "Search by Product Name",
        minimumInputLength: 2,
        ajax: {
            url: base_url + "index.php/dashboard/search_product_by_name",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_product_name: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });

    $('body').on('change', '.product-name-select-for-prescription', function () {
        var productNo = $('#search_by_product_id').val();
        var rows = $('.bill-table tr').length;
        var html;
        var checkQty = 0;
        $.ajax({
            url: base_url + "index.php/dashboard/get_product_by_no",
            type: "post",
            data: {productNo: productNo},
            success: function (data) {
                var json = JSON.parse(data);

                function trMaker() {
                    html = "<tr><td><input type='hidden' id='product-no' value='" + json["productNo"] + "'><input type='hidden' id='product-max-qty' value='" + json["productQty"] + "'>" + (parseInt(rows)) + "</td><td>" + json["productCode"] + "</td><td>" + json["productName"] + "</td><td>" + json["productMg"] + "</td><td><input type='number' style='width: 50%; text-align: center;' class='product-qty1' id='product-qty' min='1' max='" + json["productQty"] + "' value='1'></td><td id='product-unit-price' style='text-align: right;'>" + json["productSalePrice"] + "</td><td style='text-align: right;' id='product-total' > " + parseFloat(json["productSalePrice"]).toFixed(2) + "</td><td><button type='button' class='btn btn-default delete-tr-btn btn-sm'><i class='fa fa-ban' aria-hidden='true'></i></button></td></tr>";
                    return html;
                }

                if (parseInt(json["productQty"]) > 0) {

                    if ($('.bill-table tr > td:contains(' + json["productCode"] + ')').text().length > 0) {
                        var tr = $('.bill-table tr > td:contains(' + json["productCode"] + ')').closest('tr');
                        var qty = parseInt(tr.find('#product-qty').val());
                        var unitPrice = parseFloat(tr.find('#product-unit-price').text());
                        var qtyIncrese = qty + 1;
                        var itemTotal = unitPrice * parseFloat(qtyIncrese);
                        tr.find('#product-qty').val(qtyIncrese);
                        tr.find('#product-total').text(itemTotal.toFixed(2));
                    }
                    else {
                        trMaker();
                        $('.bill-table').find('tbody').append(html);
                    }
                    setTimeout(function () {
                        var table = $('.bill-table').DataTable({
                                searching: false,
                                paging: false,
                                bFilter: false,
                                bInfo: false
                            }
                        );
                        table.columns('.sum').every(function () {
                            var sum = this
                                .data()
                                .reduce(function (a, b) {
                                    return parseFloat(a) + parseFloat(b);
                                });

                            $('#sub-total').text(parseFloat(sum).toFixed(2));
                            table.destroy();
                            $('.product-name-select-for-prescription').val(0);
                        });
                        var subtotal = parseFloat($('#sub-total').text());
                        var discount = parseFloat($('#discount').val());
                        var total = subtotal - discount;
                        $('#total').text(Math.round(total).toFixed(2));
                        if ($('#discount').val().length == 0) {
                            $('#discount').val(0);
                            var total = subtotal - 0;
                            $('#total').text(Math.round(total).toFixed(2));
                        } else if (discount > 0 && discount <= subtotal) {
                            var total = subtotal - discount;
                            $('#total').text(Math.round(total).toFixed(2));
                        } else if (discount > subtotal) {
                            $('#discount').val(subtotal);
                            var total = subtotal - subtotal;
                            $('#total').text(Math.round(total).toFixed(2));
                        }
                        checkQty = 0;
                    }, 300);

                } else {

                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-check"></i> Error!</h4>\n' +
                        'Product has not been avaliable in stock. \n' +
                        '</div>');
                    $('.alert-error').delay(3000).fadeOut('slow');
                }
                console.log(html);
            }
        });
    });
    $('body').on('change', '.product-qty1', function () {
        tr = $(this).closest('tr');
        if (tr.find('#product-qty').val().length == 0 || tr.find('#product-qty').val() == 0) {
            tr.find('#product-qty').val(1);
        }
        var nowQty = parseInt(tr.find('#product-qty').val());
        var maxQty = parseInt(tr.find('#product-max-qty').val());
        if (nowQty >= maxQty) {
            var resetQty = tr.find('#product-max-qty').val();
            tr.find('#product-qty').val(resetQty);
            $('.wrapper').append('<div style="position: fixed;\n' +
                'top: 20px;\n' +
                'right: 20px;\n' +
                'z-index: 1030;" class="alert alert-warning alert-dismissible">\n' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                '<h4><i class="icon fa fa-check"></i> Warning!</h4>\n' +
                'Product Qty has been exceeded. \n' +
                '</div>');
            $('.alert-warning').delay(3000).fadeOut('slow');

        }
        var qty = parseInt(tr.find('#product-qty').val());
        var unitPrice = parseFloat(tr.find('#product-unit-price').text());
        var itemTotal = unitPrice * parseFloat(qty);
        tr.find('#product-total').text(parseFloat(itemTotal).toFixed(2));

        setTimeout(function () {
            var table = $('.bill-table').DataTable({
                    searching: false,
                    paging: false,
                    bFilter: false,
                    bInfo: false
                }
            );
            table.columns('.sum').every(function () {
                var sum = this
                    .data()
                    .reduce(function (a, b) {
                        return parseFloat(a) + parseFloat(b);
                    });

                $('#sub-total').text(parseFloat(sum).toFixed(2));
                table.destroy();
            });
            var subtotal = parseFloat($('#sub-total').text());
            var discount = parseFloat($('#discount').val());
            var total = subtotal - discount;
            $('#total').text(Math.round(total).toFixed(2));
            if ($('#discount').val().length == 0) {
                $('#discount').val(0);
                var total = subtotal - 0;
                $('#total').text(Math.round(total).toFixed(2));
            } else if (discount > 0 && discount <= subtotal) {
                var total = subtotal - discount;
                $('#total').text(Math.round(total).toFixed(2));
            } else if (discount > subtotal) {
                $('#discount').val(subtotal);
                var total = subtotal - subtotal;
                $('#total').text(Math.round(total).toFixed(2));
            }

        }, 300);

    });
    $('body').on('click', '.delete-tr-btn', function () {
        tr = $(this).closest('tr');
        tr.remove();
        var rowCount = $('.bill-table >tbody >tr').length;
        if (rowCount > 0) {
            setTimeout(function () {
                var table = $('.bill-table').DataTable({
                        searching: false,
                        paging: false,
                        bFilter: false,
                        bInfo: false
                    }
                );
                table.columns('.sum').every(function () {
                    var sum = this
                        .data()
                        .reduce(function (a, b) {
                            return parseFloat(a) + parseFloat(b);
                        });

                    $('#sub-total').text(parseFloat(sum).toFixed(2));
                    table.destroy();
                });
                var subtotal = parseFloat($('#sub-total').text());
                var discount = parseFloat($('#discount').val());
                var total = subtotal - discount;
                $('#total').text(Math.round(total).toFixed(2));
                if ($('#discount').val().length == 0) {
                    $('#discount').val(0);
                    var total = subtotal - 0;
                    $('#total').text(Math.round(total).toFixed(2));
                } else if (discount > 0 && discount <= subtotal) {
                    var total = subtotal - discount;
                    $('#total').text(Math.round(total).toFixed(2));
                } else if (discount > subtotal) {
                    $('#discount').val(subtotal);
                    var total = subtotal - subtotal;
                    $('#total').text(Math.round(total).toFixed(2));
                }

            }, 300);
        } else {
            $('#sub-total').text("0.00");
            $('#discount').val(0.00);
            $('#total').text("0.00");
        }
    });
    $('#discount').keydown(function () {
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13 || event.keyCode == 37 || event.keyCode == 38 || event.keyCode == 39 || event.keyCode == 40
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('#discount').keyup(function () {

        var subtotal = parseFloat($('#sub-total').text());
        var discount = parseFloat($('#discount').val());
        var total = subtotal - discount;
        $('#total').text(Math.round(total).toFixed(2));
        if ($('#discount').val().length == 0) {
            var total = subtotal - 0;
            $('#total').text(Math.round(total).toFixed(2));
        } else if (discount > 0 && discount <= subtotal) {
            var total = subtotal - discount;
            $('#total').text(Math.round(total).toFixed(2));
        } else if (discount > subtotal) {
            $('#discount').val(subtotal);
            var total = subtotal - subtotal;
            $('#total').text(Math.round(total).toFixed(2));
        }
    });
    var product_id
    $('.product-delete-submit-btn').click(function () {
        $('#product-delete-modal').modal('show');
        tr = $(this).closest('tr');
        product_id = tr.find('#product-id').val();
    });
    $('.nodelete-product-row').click(function () {
        $('#product-delete-modal').modal('hide');
    });
    $('.delete-product-row').click(function () {
        var productNo = product_id;

        $.ajax({
            url: base_url + "index.php/dashboard/delete_product_db/",
            type: "post",
            data: {
                productNo: productNo
            },
            success: function (data) {
                $('#product-delete-modal').modal('hide');
                tr.remove();
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Product has been deleted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
            }
        });
    });

    $('#add-prescription-btn').click(function () {
        var myTr = [];
        var trNo = 0;
        $('.bill-table tbody tr').each(function () {
            var tdNo = 0;
            $(this).find('td').each(function () {
                if ($(this).text() == "") {
                    if (tdNo == 4) {
                        myTr.push($(this).find('.product-qty1').val());
                    }
                    if (tdNo == 7) {

                    }
                } else {
                    if (tdNo == 0) {
                        myTr.push($(this).find('#product-no').val());
                        myTr.push($(this).find('#product-max-qty').val());
                    } else {
                        myTr.push($(this).text());
                    }
                }
                tdNo++;
            });
            trNo++;
        });
        var jsonString = JSON.stringify(myTr);
        var regNo = $('#reg-no').text();
        var patName = $('#pat-name').text();
        var patNoKType = $('#pat-nok-type').text();
        var patNoK = $('#pat-nok').text();

        var subTotal = $('#sub-total').text();
        var discount;
        if ($('#discount').val().length == 0) {
            discount = 0;
        } else {
            discount = $('#discount').val();
        }
        var total = $('#total').text();
        if (parseInt(subTotal) > 0) {
            $.ajax({
                url: base_url + "dashboard/insert_prescription/",
                type: "post",
                data: {
                    regNo: regNo,
                    patName: patName,
                    patNoKType: patNoKType,
                    patNoK: patNoK,
                    subTotal: subTotal,
                    discount: discount,
                    total: total,
                    productList: jsonString
                },
                success: function (data) {
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                        'Prescription has been added successfully.\n' +
                        '</div>');
                    $('.alert-success').delay(4000).fadeOut('slow');
                    setTimeout(function () {
                        window.location = (base_url + "dashboard/add_prescription/");
                    }, 5000);
                   // 
                }
            });
        }

    });
    $('.prescription-no-select').select2({
        placeholder: "Search by Prescription#",
        minimumInputLength: 1,
        ajax: {
            url: base_url + "index.php/dashboard/search_prescription_by_no",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_rx_by_no: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {

                return {

                    results: data

                };

            },
            cache: true
        }
    });
    $('.prescription-no-select').change(function () {
        $('#search-by-prescription-no').submit();
    });
    $('.prescription-patRegNo-select').select2({
        placeholder: "Search by MR# or Name",
        minimumInputLength: 2,
        ajax: {
            url: base_url + "index.php/dashboard/search_rx_patient_by_name",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_rx_by_name: params.term
                }
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {

                return {

                    results: data

                };

            },
            cache: true
        }
    });
    $('.prescription-patRegNo-select').change(function () {
        $('#search-prescription-patient-by-regNo').submit();
    });
    $('.return-qty').select2({
        placeholder: "Return Qty"
    });
    $('body').on('change', '.return-qty', function () {
        tr = $(this).closest('tr');
        if (tr.find('#product-return-qty').val() >= 0 && parseInt(tr.find('#product-qty').text()) > 0) {
            var currentQty = parseInt(tr.find('#product-qty').text());
            var returnQty = tr.find('#product-return-qty').val();
            var remainingQty = currentQty - returnQty;

            var unitPrice = parseFloat(tr.find('#product-unit-price').text());
            var itemTotal = unitPrice * parseFloat(remainingQty);
            tr.find('#product-total').text(parseFloat(itemTotal).toFixed(2));

            setTimeout(function () {
                var table = $('.bill-table').DataTable({
                        searching: false,
                        paging: false,
                        bFilter: false,
                        bInfo: false
                    }
                );
                table.columns('.sum').every(function () {
                    var sum = this
                        .data()
                        .reduce(function (a, b) {
                            return parseFloat(a) + parseFloat(b);
                        });

                    $('#sub-total').text(parseFloat(sum).toFixed(2));
                    table.destroy();
                });
                var subtotal = parseFloat($('#sub-total').text());
                var discount = parseFloat($('#discount').text());
                var total = subtotal - discount;
                if (total < 0) {
                    total = 0;
                }
                $('#total').text(Math.round(total).toFixed(2));

                var totalAmountpaid = parseFloat($('#total-amount-store').val());
                var returnAmount = totalAmountpaid - total;
                $('#returned-amount').text(Math.round(returnAmount).toFixed(2));
            }, 300);
        }
    });
    $('#return-rx-btn').click(function () {
        var myTr = [];
        var trNo = 0;
        $('.bill-table tbody tr').each(function () {
            var tdNo = 0;
            $(this).find('td').each(function () {
                if (tdNo == 0) {
                    myTr.push($(this).find('#rxdesNo').val());
                }
                if (tdNo == 1) {
                    myTr.push($(this).find('#productNo').val());
                }
                if (tdNo == 4) {
                    myTr.push($(this).text());
                }
                if (tdNo == 5) {
                    myTr.push($(this).find('#product-return-qty').val());
                }
                if (tdNo == 7) {
                    myTr.push($(this).text());
                }
                tdNo++;
            });
            trNo++;
        });
        console.log(myTr);
        var jsonString = JSON.stringify(myTr);
        var rxNo = $('#rx-no').text();
        var subTotal = $('#sub-total').text();
        var discount = $('#discount').text();
        var total = $('#total').text();
        var returnedAmount = parseFloat($('#returned-amount').text());
        console.log(jsonString);
        if (returnedAmount > 0) {
            $.ajax({
                url: base_url + "dashboard/update_prescription/",
                type: "post",
                data: {
                    rxNo: rxNo,
                    subTotal: subTotal,
                    discount: discount,
                    total: total,
                    returnedAmount: returnedAmount,
                    productList: jsonString
                },
                success: function (data) {
                    $('.wrapper').append('<div style="position: fixed;\n' +
                        'top: 20px;\n' +
                        'right: 20px;\n' +
                        'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                        '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                        '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                        'Prescription has been returned successfully.\n' +
                        '</div>');
                    $('.alert-success').delay(4000).fadeOut('slow');
                    setTimeout(function () {
                        window.location = (base_url + "dashboard/return_prescription/");
                    }, 5000);
                   // 
                }
            });
        } else {
            $('.wrapper').append('<div style="position: fixed;\n' +
                'top: 20px;\n' +
                'right: 20px;\n' +
                'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                '<h4><i class="icon fa fa-check"></i> Error!</h4>\n' +
                'No Return Qty Selected. Please select the return qty from prescription.\n' +
                '</div>');
            $('.alert-error').delay(4000).fadeOut('slow');
        }

    });
    //============Stock Level============//
    $('.order-btn').click(function () {
        tr = $(this).closest('tr');
        var ststus = tr.find('#product-status').text();
        console.log(status);
        if (ststus == "Ordered") {
            $('.wrapper').append('<div style="position: fixed;\n' +
                'top: 20px;\n' +
                'right: 20px;\n' +
                'z-index: 1030;" class="alert alert-error alert-dismissible">\n' +
                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                'Product has already been ordered.\n' +
                '</div>');
            $('.alert-error').delay(3000).fadeOut('slow');
        } else {
            $('#product-order-modal').modal('show');
            product_id = tr.find('#product-id').val();
        }
    });
    $('.noorder-product-row').click(function () {
        $('#product-order-modal').modal('hide');
    });
    $('.order-product-row').click(function () {
        var productNo = product_id;

        $.ajax({
            url: base_url + "index.php/dashboard/order_product_db/",
            type: "post",
            data: {
                productNo: productNo
            },
            success: function (data) {
                $('#product-order-modal').modal('hide');
                tr.find('#product-status').text("Ordered");
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Product has been ordered successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                
            }
        });
    });

    $('.dismiss-btn').click(function () {
        tr = $(this).closest('tr');
        $('#product-dismiss-modal').modal('show');
        product_id = tr.find('#product-id').val();
    });
    $('.nodismiss-product-row').click(function () {
        $('#product-dismiss-modal').modal('hide');
    });
    $('.dismiss-product-row').click(function () {
        var productNo = product_id;

        $.ajax({
            url: base_url + "index.php/dashboard/dismiss_product_db/",
            type: "post",
            data: {
                productNo: productNo
            },
            success: function (data) {
                $('#product-dismiss-modal').modal('hide');
                tr.remove();
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Product has been dismissed successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                
            }
        });
    });
    var product_ava_qty;
    $('.product-purchase-btn').click(function () {
        tr = $(this).closest('tr');
        $('#product-purchase-modal').modal('show');
        product_id = tr.find('#product-id').val();
        product_ava_qty = tr.find('#product-ava-qty').val();
    });
    $('.nopurchase-product-row').click(function () {
        $('#product-purchase-modal').modal('hide');
    });
    $('#purchase-qty').keydown(function () {
        //allow  backspace, tab, ctrl+A, escape, carriage return
        if (event.keyCode == 8 || event.keyCode == 9
            || event.keyCode == 27 || event.keyCode == 13
            || (event.keyCode == 65 && event.ctrlKey === true))
            return;
        if ((event.keyCode < 48 || event.keyCode > 57))
            event.preventDefault();
    });
    $('.purchase-product-row').click(function () {
        var productNo = product_id;
        var ProductAva_qty = product_ava_qty;
        var newPurchase = $('#purchase-qty').val();
        var productQty = parseInt(product_ava_qty) + parseInt(newPurchase);
        $('#product-ava-qty').val(productQty);
        $.ajax({
            url: base_url + "index.php/dashboard/purchase_product_db/",
            type: "post",
            data: {
                productNo: productNo,
                productQty: productQty

            },
            success: function (data) {
                $('#product-purchase-modal').modal('hide');
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Product purchase quantity has been added successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
                
            }
        });
    });
//=======================================================//
//          Js Code for Pharmacy Module ends here        //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
//=======================================================//
//                                                       //
//                 Changes by Sohaib                     //
//                                                       //
//=======================================================//
$("#btn-print-vital").click(function () {
        var patID = $('#regsno').text();
//        alert(patID);
        var win = window.open(base_url + 'dashboard/vital_print/?regno=' + patID, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
    });

$("#print-post-op").click(function () {
        var patID = $('#patid').text();

        var win = window.open(base_url + 'dashboard/print_post_oprative/?regno=' + patID, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
    });
    
    $("#pre-op-fitness-print-btn").click(function () {
        var regNo = $('#reg-no').val();
        var win = window.open(base_url + 'dashboard/print_pre_oprative/?regno=' + regNo, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
    });
    $("#pre-op-order-print-btn").click(function () {
        var regNo = $('#reg-no').val();
        var win = window.open(base_url + 'dashboard/print_preop_order/?regno=' + regNo, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
    });
     $("#post-op-instruction-print-btn").click(function () {
        var regNo = $('#reg-no').val();
        var win = window.open(base_url + 'dashboard/print_postop_instruction/?regno=' + regNo, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
    });
    
    $("#ot-consent-print-btn").click(function () {
        var regNo = $('#reg-no').val();
        var win = window.open(base_url + 'dashboard/print_ot_consent_form/?regno=' + regNo, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
    });
    
     $('#cl-datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
    
    $('#lis-npo-form').timepicker({
        defaultTime: false
    });
    $('#preoperative-check-save-btn').click(function () {
        var preOpCL = $('#pre-opc-no').val();
        var regNo = $('#cl-regno').val();
        var otBookingNo = $('#cl-ot-booking-no').val();
        var cldrname = $('#cl-drname').val();
        var cldate = $('#cl-datepicker').val();
        var cldiagnosis = $('#cl-diagnosis').val();
        var operationPlanned = $('#cl-operation-planned').val();
        var informedConsent = $('#cl-informed-consent').val();
        var clSurgeon = $('#cl-surgeon').val();
        var clbp = $('#cl-bp').val();
        var clpulse = $('#cl-pulse').val();
        var cltemp = $('#cl-temp').val();
        var clresprate = $('#cl-resprate').val();
        var clnpoFormTime = $('#lis-npo-form').val();
        var clgiveBath = $('#cl-give-bath').prop('checked');
        var clHospitalDress = $('#cl-hospital-dress').prop('checked');
        var clShave = $('#cl-shave').prop('checked');
        var clhb = $('#cl-hb').val();
        var clesr = $('#cl-esr').val();
        var clsna = $('#cl-sna').val();
        var clsk = $('#cl-sk').val();
        var clsca = $('#cl-sca').val();
        var clpt = $('#cl-pt').val();
        var claptt = $('#cl-aptt').val();
        var cltlc = $('#cl-tlc').val();
        var clrbs = $('#cl-rbs').val();
        var clhbsab = $('#cl-hbsab').val();
        var clantihcv = $('#cl-antihcv').val();
        var cldiabeticstatus = $('#cl-diabetic-status').val();
        var clhypertensionstatus = $('#cl-hypertension-status').val();
        var clecg = $('#cl-ecg').val();
        var clanyothercondition = $('#cl-anyother-condition').val();
        var clbiopsy = $('#cl-biopsy').val();
        var cllopogram = $('#cl-lopogram').val();
        var clchalangiogram = $('#cl-chalangiogram').val();
        var clctmri = $('#cl-ct-mri').val();
        var clfnac = $('#cl-fnac').val();
        var clus = $('#cl-us').val();
        var clcxr = $('#cl-cxr').val();
        var clivu = $('#cl-ivu').val();
        var clanyother = $('#cl-anyother').val();
        var clradio1 = $("input[name='cl_radio1']:checked").val();
        var clradio2 = $("input[name='cl_radio2']:checked").val();
        var clradio3 = $("input[name='cl_radio3']:checked").val();
        var clradio4 = $("input[name='cl_radio4']:checked").val();
        var clradio5 = $("input[name='cl_radio5']:checked").val();
        var clradio6 = $("input[name='cl_radio6']:checked").val();
        var clradio7 = $("input[name='cl_radio7']:checked").val();
        var clradio8 = $("input[name='cl_radio8']:checked").val();
        $("#pre-op-check-print-btn").css("visibility", "visible");
        $.ajax({
            url: base_url + "index.php/dashboard/update_pre_op_checklist/",
            type: "post",
            data: {
                preOpCL: preOpCL,
                regNo: regNo,
                otBookingNo: otBookingNo,
                cldrname: cldrname,
                clDate: cldate,
                cldiagnosis: cldiagnosis,
                operationPlanned: operationPlanned,
                informedConsent: informedConsent,
                clSurgeon: clSurgeon,
                clbp: clbp,
                clpulse: clpulse,
                cltemp: cltemp,
                clresprate: clresprate,
                clnpoFormTime: clnpoFormTime,
                clgiveBath: clgiveBath,
                clHospitalDress: clHospitalDress,
                clShave: clShave,
                clhb: clhb,
                clesr: clesr,
                clsna: clsna,
                clsk: clsk,
                clsca: clsca,
                clpt: clpt,
                claptt: claptt,
                cltlc: cltlc,
                clrbs: clrbs,
                clhbsab: clhbsab,
                clantihcv: clantihcv,
                cldiabeticstatus: cldiabeticstatus,
                clhypertensionstatus: clhypertensionstatus,
                clecg: clecg,
                clanyothercondition: clanyothercondition,
                clbiopsy: clbiopsy,
                cllopogram: cllopogram,
                clchalangiogram: clchalangiogram,
                clctmri: clctmri,
                clfnac: clfnac,
                clus: clus,
                clcxr: clcxr,
                clivu: clivu,
                clanyother:clanyother,
                clradio1: clradio1,
                clradio2: clradio2,
                clradio3: clradio3,
                clradio4: clradio4,
                clradio5: clradio5,
                clradio6: clradio6,
                clradio7: clradio7,
                clradio8: clradio8
                
            },
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Patient Pre-Operative Check List Form has been Saved Successfully.\n' +
                    '</div>');
                $('#sty-2').attr("style", "color: green;");
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
            }
        });

    });
    
    $("#pre-op-check-print-btn").click(function () {
        var regNo = $('#cl-regno').val();
        var win = window.open(base_url + 'dashboard/print_ot_checklist_form/?regno=' + regNo, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
    });
    $('.patname-select').select2({
        placeholder: "Search by MR# or Name",
        minimumInputLength: 2,
        ajax: {
            url: base_url + "index.php/dashboard/search",
            dataType: 'json',
            delay: 250,

            data: function (params) {
                var query = {
                    search_by_cnic: params.term
                };
                // Query parameters will be ?search=[term]&type=public
                return query;
            },
            processResults: function (data) {
                return {

                    results: data
                };

            },
            cache: true
        }
    });
     $('.patname-select').change(function () {
        $('#search-by-pat-name').submit();
    });
    
     $('#drp-date').datepicker({
        format: 'yyyy-mm-dd'
    });
    
    $('#drp-time').timepicker({
        defaultTime: false
    });
    
    
    $('.bs-datepicker').datepicker({
        format: 'dd-mm-yyyy'
    });
    
    
    $('#bs-date').datepicker({
        format: 'dd-mm-yyyy'
    });
    $('#bs-date').val(admlocaldate);
    
    $("#print-sugar-report").click(function () {
        var patID = $('#regsno').text();
//        alert(patID);
        var win = window.open(base_url + 'dashboard/sugar_report_print/?regno=' + patID, '_blank');
        if (win) {
                console.log("new tab opened")
                win.focus();
            } else {
                //Browser has blocked it
                alert('Please allow popups for this website');
            }
    });
    
     $(".delete-blood-report").click(function () {
        var tr = $(this).closest('tr');
        var bsid = tr.find('.bsID').val();

        $.ajax({
            url: base_url + "dashboard/delete_blood_sugar_report",
            type: "post",
            data: {bsId: bsid},
            success: function (data) {
                $('.wrapper').append('<div style="position: fixed;\n' +
                    'top: 20px;\n' +
                    'right: 20px;\n' +
                    'z-index: 1030;" class="alert alert-success alert-dismissible">\n' +
                    '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>\n' +
                    '<h4><i class="icon fa fa-check"></i> Success!</h4>\n' +
                    'Report has been deleted successfully.\n' +
                    '</div>');
                $('.alert-success').delay(4000).fadeOut('slow');
               // 
                tr.remove();
            }
        });
    });

});

