function get_patient_accounts(func_call) {
    var base_url = $('#base').val();
    $.ajax({
        url: base_url+func_call,
        cache: false,
        success: function(response) {
            if(response.result_html != ''){
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
            }
        }
    });
}
$(document.body).on('change', '.bed-status', function(){
    var base_url = $('#base').val();
    var ward_id = $('.wardName-select').val();
    var status = $('.status-select').val();
    $.ajax({
        url: base_url+'dashboard/bedslist',
        type: 'get',
        data : { ward_id : ward_id,status:status },
        cache: false,
        success: function(response) {
            if (response.result_html != '') {
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
                $('#title').html('SMS | Bedlist');
            }
        }
    });

});
$(document.body).on('click', '#bed-btn', function(){
    var lastBedNumber = $('.allbeds > span > .bedNo').last().val();
    var lastBedId = $('.allbeds > span > .bedID').last().val();
    var numberOfExtraBeds = $('#extra-bed').val();
    var wardNo = $('.allbeds > span > .wardId').last().val();
    console.log(lastBedNumber + '=>' + lastBedId + '=>' + numberOfExtraBeds);
    addExtraBeds(lastBedNumber, numberOfExtraBeds, lastBedId, wardNo);

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
    });
}
$(document.body).on('change', '.ward-name', function(){
    var base_url = $('#base').val();
    var ward_id = $('.ward-name').val();
    $.ajax({
        url: base_url+'dashboard/get_beds/'+ward_id,
        type: 'get',
        cache: false,
        success: function(response) {
            $('#bedNumber').empty();
            $('#bedNumber').append(response);
        }
    });
});

$(document.body).on('click', '.delete-patient', function(){
    $('#deleted_patient_id').val($(this).attr('data-href'));
    $('#delete-modal').modal('show');
});

$(document.body).on('click', '.confirm-delete-patient', function(){
    var base_url = $('#base').val();
    var patient_id = $('#deleted_patient_id').val();
    $.ajax({
        url: base_url + "dashboard/delete_patient",
        type: "post",
        data: {patient_id: patient_id},
        success: function (response) {
            if(response.success){
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
                toastr["success"](response.message);
            }else{
                toastr["success"](response.message);
            }
        }
    });
    $('#delete-modal').modal('hide');
});

$(document.body).on('click', '.edit_patient_btn', function(){
    var url = $(this).attr('data-href');
    $.ajax({
        url: url,
        type: "get",
        success: function (response) {
            if(response.result_html != ''){
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
            }
        }
    });
    $('#delete-modal').modal('hide');
});

$(document.body).on('change', '.patient-reg-select', function(){
    var base_url = $('#base').val();
    var patient_id = $('.patient-reg-select').val();
    $.ajax({
        url: base_url+'dashboard/patient_chart',
        type: 'post',
        data:{patient_id:patient_id},
        cache: false,
        success: function(response) {
            if(response.result_html != ''){
                $('#patient_list_container').empty();
                $('#patient_list_container').append(response.result_html);
            }
        }
    });
});


$(document.body).on('change', '.patient-discharge-select', function(){
    var base_url = $('#base').val();
    var patient_id = $('.patient-discharge-select').val();
    $.ajax({
        url: base_url+'dashboard/discharge_patients',
        type: 'post',
        data:{patient_id:patient_id},
        cache: false,
        success: function(response) {
            if(response.result_html != ''){
                $('#patient_list_container').empty();
                $('#patient_list_container').append(response.result_html);
            }
        }
    });
});


$(document.body).on('change', '.discharge-patient-select', function(){
    var base_url = $('#base').val();
    var patient_id = $('.discharge-patient-select').val();
    $.ajax({
        url: base_url+'dashboard/patient_revisit',
        type: 'post',
        data:{patient_id:patient_id},
        cache: false,
        success: function(response) {
            if(response.revisit_patient != ''){
                $('#patient_detail_container').empty();
                $('#patient_detail_container').append(response.revisit_patient);
            }
        }
    });
});

$(document.body).on('click', '.custom-submit-btn', function(){
    var base_url = $('#base').val();
    var patient_id = $('.discharge-history-select').val();
    var from_date = $('.search-discharged-by-from-date').val();
    var to_date = $('.search-discharged-by-to-date').val();
    $.ajax({
        url: base_url+'dashboard/view_discharge_history',
        type: 'post',
        data:{patient_id:patient_id,from_date:from_date,to_date:to_date},
        cache: false,
        success: function(response) {
            if(response.result_html != ''){
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
            }
        }
    });
});


$(document.body).on('click', '.patient_chart', function(){
    var base_url = $(this).attr('data-href');
    var patient_id = $(this).attr('data-value');
    $.ajax({
        url: base_url,
        type: 'post',
        data:{patient_id:patient_id},
        cache: false,
        success: function(response) {
            if(response.result_html != ''){
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
            }
        }
    });
});

$(document.body).on('change', '#search_by_cnic', function(){
    var base_url = $('#base').val();
    var patient_id = $('#search_by_cnic').val();
    $.ajax({
        url: base_url+'dashboard/operation_theatre',
        type: 'post',
        data:{patient_id:patient_id},
        cache: false,
        success: function(response) {
            if(response.result_html != ''){
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
            }
        }
    });
});

$(document.body).on('click', '.ot_booking_btn', function(){
    $.ajax({
        url: $('#ot_booking_form').attr('data-action'),
        type: 'post',
        data: $('#ot_booking_form').serialize(),
        cache: false,
        success: function(response) {
            if (response.success) {
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
                toastr["success"](response.message);
            } else {
                toastr["error"](response.message);
            }
        }
    });
    return false;
});

$(document.body).on('click', '.ot-submit-btn', function(){
    var base_url = $('#base').val();
    var toward = $('#search_by_otward').val();
    var patient_id = $('#ot_patient_id').val();
    var ot_date = $('#search-ot-by-date').val();
    $.ajax({
        url: base_url+'dashboard/view_operationlist',
        type: 'post',
        data:{toward:toward,patient_id:patient_id,ot_date:ot_date},
        cache: false,
        success: function(response) {
            if(response.result_html != ''){
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
            }
        }
    });
});