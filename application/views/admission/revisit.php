<div id="patient_list_container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Patient Revisit
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('/dashboard/edit_patient/'); ?>"> Patient Revisit</a></li>

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
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Search Discharged Patients</label>
                            <form name="search-discharged-patients" id="search-discharged-patients" method="get"
                                  action="#patient-info">
                                <select class="discharge-patient-select form-control select2" name="search_discharged_by_cnic" >
                                    <option value="">Please select</option>
                                    <?php foreach ($patients as $patient): ?>
                                        <option value="<?php echo $patient['regNo']; ?>"<?php echo isset($filter)&&($filter == $patient['regNo'])?'selected':''; ?>>
                                            <?php  echo $patient['regNo'].' '.$patient['patName'].' '.$patient['patNoKType'].' '.$patient['patNoK']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div id="patient_detail_container"></div>
    </section>

    <!-- /.content -->
</div>

<script>
    $(document).ready(function () {
        $('.select2').select2();
    });
</script>