<section class="content-header">
    <h1>
        View Admitted Patients
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('/dashboard/view_patients/'); ?>"> View Admitted Patient</a></li>
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
                <form action="<?php echo base_url('dashboard/view_patients'); ?>" class="submit-form" method="post"
                      enctype="multipart/form-data" id="search_patient_form">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>MR# or Patient Namess</label>
                            <select class="patName-select form-control select2" name="search_by_name">
                                <option value="0">All</option>
                                <?php foreach ($patients as $patient): ?>
                                    <option value="<?php echo $patient['regNo']; ?>"<?php echo isset($filter['search_by_name'])&&($filter['search_by_name'] == $patient['regNo'])?'selected':''; ?>>
                                       <div style="color;: #ffff"><?php echo $patient['regNo']; ?></div> <?php echo $patient['patName'].' '.$patient['patNoKType'].' '.$patient['patNoK']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Search By Ward</label>
                            <select class="form-control ward-select" name="search_by_ward">
                                <option value="0">All</option>
                                <?php foreach ($wards as $ward): ?>
                                    <option value="<?php echo $ward['wardId'] ?>"<?php echo isset($filter['search_by_ward'])&&($filter['search_by_ward'] == $ward['wardId'])?'selected':''; ?>>
                                        <?php echo $ward['wardName']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Search By Gender</label>
                            <select class="sex-select form-control" name="search_by_gender">
                                <option value="0">All</option>
                                <option value="Male"<?php echo isset($filter['search_by_gender'])&&($filter['search_by_gender'] == 'Male')?'selected':''; ?>>Male</option>
                                <option value="Female"<?php echo isset($filter['search_by_gender'])&&($filter['search_by_gender'] == 'Female')?'selected':''; ?>>Female</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>From Date</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right search-by-from-date" value="<?php echo isset($filter['search_by_from_date'])?$filter['search_by_from_date']:''; ?>"
                                       id="search-by-from-date" name="search_by_from_date" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>To Date</label>
                            <div class="input-group date">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control pull-right search-by-to-date" value="<?php echo isset($filter['search_by_to_date'])?$filter['search_by_to_date']:''; ?>"
                                       id="search-by-to-date" name="search_by_to_date" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                            <button type="submit" class="btn bg-blue margin submit-btn custom-submit-btn">
                                <i class="fa fa-search" aria-hidden="true"></i>Search Patient</button>
                        </div>
                    </div><!-- /.col -->
                </form>
            </div>
        </div>
    </div>
    <div class="box  box-primary">
        <div class="box-header with-border" id="details">
            <h3 class="box-title">Search Results</h3>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                            class="fa fa-minus"></i></button>
            </div>
        </div><!-- /.box-header -->
        <div class="box-body">
            <div class="row">
                <div class="box-body">
                    <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12" style="overflow-y: auto;">
                                <div id="patient_list_container">
                                    <table id="admitted-patient-search"
                                           class="table table-bordered table-hover dataTable"
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

                                            <th class="sorting" style="width: 12% !important;">
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($patients as $patient) { ?>
                                                <tr role="row" class="odd">
                                                    <td class="sorting_1" id="regNo"><?php echo $patient['regNo']; ?></td>
                                                    <td><?php echo $patient['patName']; ?></td>
                                                    <td><?php echo $patient['patNoK']; ?></td>
                                                    <td><?php echo $patient['patSex']; ?></td>
                                                    <?php $bed_list = $this->model_hms->get_bed_by_id($patient['patbed_id']); ?>
                                                    <td><?php echo $bed_list->bedNo; ?></td>
                                                    <?php $ward_list = $this->model_hms->get_ward_by_id($patient['patward_id']); ?>
                                                    <td><?php echo $ward_list->wardName; ?></td>
                                                    <td><?php $disease = $this->model_hms->get_disease_by_id($patient['patDisease_id']);
                                                        echo isset($disease->disease_name)?$disease->disease_name:'';
                                                        ?></td>
                                                    <td><?php
                                                        $date = $patient['patAdmDate'];
                                                        $datetime = date(' d-m-Y h:i a', strtotime($date));
                                                        echo $datetime;
                                                        ?></td>
                                                    <td><?php echo $patient['patStatus']; ?></td>
                                                    <td style="width: 12% !important;">
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-default">Action</button>
                                                            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                                <span class="caret"></span>
                                                                <span class="sr-only">Toggle Dropdown</span>
                                                            </button>
                                                            <ul class="dropdown-menu" role="menu">
                                                                <li><a target="_blank" data-toggle="modal" class="btn btn-default" style="text-align: left"
                                                                       href="<?php echo base_url('dashboard/page_print/') . "?search_by_cnic=" . $patient['regNo']; ?>">
                                                                       <i class="fa fa-print"  aria-hidden="true"></i>Print</a></li>
                                                                <li><a data-toggle="modal" class="btn btn-default patient_chart" style="text-align: left"
                                                                       data-value = "<?php echo  $patient['regNo']; ?>"
                                                                       data-href="<?php echo base_url('dashboard/patient_chart') ?>">
                                                                       <i class="fa fa-eye"  aria-hidden="true"></i> View</a></li>
                                                                <li><a  class="btn btn-default edit_patient_btn" style="text-align: left" href="javascript:void(0)"
                                                                        data-href="<?php echo base_url('dashboard/edit_patient/').$patient['regNo']; ?>">
                                                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>Edit</a></li>
                                                                <li>
                                                                    <?php if ($patient['patStatus'] == 'Under Treatment') { ?>
    <!--                                                                <button type="button" class="btn btn-default delete-patient"><i class="fa fa-ban"></i> Delete</button>-->
                                                                        <a data-toggle="modal" class="btn btn-default delete-patient" style="text-align: left" href="javascript:void(0)"
                                                                           data-href="<?php echo $patient['regNo']; ?>"><i
                                                                           class="fa fa-trash" aria-hidden="true"></i>Delete</a>
                                                                    <?php } ?>
                                                                </li>

                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<div class="modal fade" tabindex="-1" role="dialog" id="delete-modal">
    <div class="modal-dialog" role="document">
        <input type="hidden" id="deleted_patient_id" name="deleted_patient_id">
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
                <button type="button" class="btn bg-default hide-patient-delete-modal" data-dismiss="modal">No</button>
                <button type="button" class="btn bg-blue confirm-delete-patient">Yes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
    $(document).ready(function () {
        $("#admitted-patient-search").DataTable();
        $('.select2').select2();
        $('.ward-select').select2();
        $('#search-by-from-date').datepicker({
            format: 'yyyy-mm-dd'
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });;
        $('#search-by-to-date').datepicker({
            format: 'yyyy-mm-dd',
            autohide:true
        }).on('changeDate', function(e){
            $(this).datepicker('hide');
        });

        $("#search_patient_form").on('submit',(function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo base_url('dashboard/view_patients'); ?>",
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
                    if(response.result_html != ''){
                        $('.content-wrapper').empty();
                        $('.content-wrapper').append(response.result_html);
                        $('#title').html('SMS | Patients');
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