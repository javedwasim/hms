function get_patient_accounts(func_call) {
    var base_url = $('#base').val();
    $.ajax({
        url: base_url+'dashboard/'+func_call,
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

