function get_patient_accounts(func_call) {
    var base_url = $('#base').val();
    $.ajax({
        url: base_url+func_call,
        cache: false,
        success: function(response) {
            if(response.result_html != ''){
                $('.content-wrapper').empty();
                $('.content-wrapper').append(response.result_html);
                $('#title').html('SMS | Bedlist');
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
        // $('.custom-delete-span').click(function () {
        //     var closest = $(this).closest('.popover-content');
        //     var bedId = closest.find('.pbedNo').val();
        //     alert("from click"+ bedId);
        // });
    });
   // window.location.href = base_url + "dashboard/bedslist/?search_by_wardnumber=" + wardParam;
}
