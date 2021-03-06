<section class="content-header">
    <h1>
        Beds List
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('/dashboard/bedslist/'); ?>"> Beds List</a></li>
    </ol>
    <br>
    <div class="row">
        <div class="col-md-4 col-sm-6 col-xs-12" style="float: right;">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="fa fa-bed" aria-hidden="true"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Admission Statistics</span>
                    <span style="font-size: 20px"><?php $patcount = $this->model_hms->patient_counter();
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
<section class="content">
    <div class="box box-primary">
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
                        <label>Search By Ward Name / Number</label>
                        <form name="search-by-ward-number" id="search-by-ward-number" method="get"
                              action="#details">
                            <select class="wardName-select form-control bed-status" name="search_by_wardnumber"  style="width: 100%;" tabindex="4">
                                <option value="">Please select</option>
                                <?php foreach ($wards as $ward): ?>
                                    <option value="<?php echo $ward['wardId']; ?>"<?php echo isset($fdata['ward_id']) && ($ward['wardId']==$fdata['ward_id'])?'selected':''; ?>>
                                        <?php echo $ward['wardName']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </form>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Search By Availability Status</label>
                        <form name="search-by-status" id="search-by-status" method="get"
                              action="#details">
                            <select class="form-control status-select bed-status" name="search_by_status" style="width: 100%;" tabindex="4">
                                <option value="">Please select</option>
                                <option value="available"<?php echo isset($fdata['ward_id']) && ("available"==$fdata['status'])?'selected':''; ?>>Available</option>
                                <option value="occupied"<?php echo isset($fdata['ward_id']) && ("occupied"==$fdata['status'])?'selected':''; ?>>Occupied</option>
                                <option value="blocked"<?php echo isset($fdata['ward_id']) && ("blocked"==$fdata['status'])?'selected':''; ?>>Blocked</option>
                                <option value="Extra Bed"<?php echo isset($fdata['ward_id']) && ("Extra Bed"==$fdata['status'])?'selected':''; ?>>Extra Bed</option>
                            </select>
                        </form>
                    </div>
                </div>
                <?php
                if (!empty($ward_beds_list)) { ?>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Status</label><br>
                            <span class="label label-primary custom-span"
                                  style="margin-left: 15px !important; margin-right: 15px !important; padding: 10px !important;"
                                  id="color-available">Available
                                <span class="badge bg-gray"><?php  echo $available->counter; ?></span>
                            </span>
                            <span class="label label-primary custom-span"
                                  style="margin-left: 15px !important; margin-right: 15px !important; padding: 10px !important;"
                                  id="color-occupied">Occupied
                                <span class="badge bg-gray"><?php  echo $occupied->counter; ?></span>
                            </span>
                            <span class="label label-primary custom-span"
                                  style="margin-left: 15px !important; margin-right: 15px !important; padding: 10px !important;"
                                  id="color-blocked">Blocked
                                <span class="badge bg-gray"><?php echo $blocked->counter; ?></span>
                            </span>
                            <span class="label label-primary custom-span"
                                  style="margin-left: 15px !important; margin-right: 15px !important; padding: 10px !important; "
                                  id="color-temp-bed">Extra Bed
                                <span class="badge bg-gray temp-bed-number">  <?php echo $temp->counter; ?></span>
                            </span>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>

    </div>

    <?php
    if (!empty($ward_beds_list)) { ?>
        <div class="box box-primary">
            <div class="box-header with-border" id="details">
                <h3 class="box-title">Search Results</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="col-sm-offset-10 col-xs-12">
                        <input type="number" id="extra-bed" value="1" style="display: none;">
                        <button type="button" class="btn btn-primary btn-flat" id="bed-btn"><i
                                class="fa fa-plus" aria-hidden="true"></i> Add Extra Beds
                        </button>
                    </div>
                </div>
                <div class="row">


                    <div class="row">
                        <div class="col-sm-12 testbeds">
                            <?php foreach ($ward_beds_list as $b_key) { ?>
                                <div class="col-sm-3 col-xs-4 allbeds">
                                        <span class="label label-primary custom-span infopopover"
                                              id="<?php $statusColor = $this->model_hms->bed_colors($b_key['bedStatus']);
                                              echo $statusColor; ?>"><?php if ($b_key['bedStatus'] == 'Extra Bed') {
                                                echo "Extra Bed. " . $b_key['bedNo'];
                                            } else {
                                                echo "Bed No. " . $b_key['bedNo'];
                                            } ?>
                                            <input type="hidden" class="bedID"
                                                   value="<?php echo $b_key['bedId']; ?>">
                                        <input type="hidden" class="bedNo" value="<?php echo $b_key['bedNo']; ?>">
                                        <input type="hidden" class="wardId" value="<?php echo isset($fdata['ward_id'])?$fdata['ward_id']:''; ?>">
                                        </span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    <?php } ?>

    <?php if (!empty($search_by_status_list)) { ?>
        <div class="box box-primary">
            <div class="box-header with-border" id="details">
                <h3 class="box-title">Search Results</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                    <div class="row">
                        <div class="col-sm-12 testbeds">
                            <?php foreach ($search_by_status_list as $b_key) { ?>
                                <div class="col-sm-3 col-xs-4 allbeds">
                                        <span class="label label-primary custom-span infopopover"
                                              id="<?php $statusColor = $this->model_hms->bed_colors($b_key['bedStatus']);
                                              echo $statusColor; ?>"><?php if ($b_key['bedStatus'] == 'Extra Bed') {
                                                echo "Extra Bed. " . $b_key['bedNo'];
                                            } else {
                                                echo "Bed No. " . $b_key['bedNo'];
                                            } ?>
                                            <input type="hidden" class="bedID"
                                                   value="<?php echo $b_key['bedId']; ?>">
                                        <input type="hidden" class="bedNo" value="<?php echo $b_key['bedNo']; ?>">
                                        <input type="hidden" class="wardId"
                                               value="<?php echo $this->input->get('search_by_wardnumber'); ?>">
                                        </span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } ?>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation Message</h4>
            </div>
            <div class="modal-body">
                <p>Do you want to permanently delete the information of this patient?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-default hide-patient-delete-modal">No</button>
                <button type="button" class="btn bg-blue confirm-delete-patient">Yes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>
    $('.infopopover').hover(function (e) {
        $('.infopopover').not(this).popover('hide');
    });
    $('.infopopover').focus(function (e) {
        $('.infopopover').not(this).popover('hide');
    });
    $('.custom-delete-span').click(function (e) {
        console.debug(e);
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
</script>