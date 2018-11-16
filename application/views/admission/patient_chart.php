<div id="patient_list_container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            History and Plan Chart
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li><a href="<?php echo base_url('/dashboard/patient_chart/'); ?>"> History and Plan Chart </a></li>
        </ol>
        <br>
        <div class="row">
            <div class="col-md-4 col-sm-6 col-xs-12" style="float: right;">
                <div class="info-box">
                <span class="info-box-icon bg-green" style="padding: 20px;">
                    <i class="fa fa-bed" aria-hidden="true"></i>
                </span>
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
                            <form name="search-by-name" id="search-by-name" method="get"
                                  action="#details">
                                <select class="patient-reg-select form-control select2" name="search_by_cnic">
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
        <?php
            if (!empty($patient_list)) { foreach ($patient_list as $p_key) { ?>
            <?php $var = $this->model_hms->get_pat_pic($p_key['regNo']); ?>
            <div class="box  box-primary">
                <div class="box-header with-border" id="details">
                    <div class="col-md-1">
                        <img src="<?php if (!empty($var)) {
                            echo base_url('assets/dist/img/patient_photo/') . $var->patient_pic_path;
                        } else {
                            echo base_url('assets/dist/img/patient_photo/person.jpg');
                        } ?>" class="img-thumbnail">
                    </div>
                    <div class="col-md-11" style="padding:0px;">
                        <h3 class="box-title" style="margin-top: 20px;">Patient Information</h3>
                    </div>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>MR#:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $p_key['regNo']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Name:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $p_key['patName']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>S/O, D/O, W/O:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $p_key['patNoK']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Sex:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $p_key['patSex']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Ward Number:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php
                                            $wardNo = $this->model_hms->get_ward_by_id($p_key['patward_id']);
                                            echo $wardNo->wardName;
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Disease:</label>
                                    </div>
                                    <div class="col-md-6">

                                        <p><?php $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']);
                                            echo $disease->disease_name; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Age:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $p_key['patAge']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Bed Number:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p>
                                            <?php
                                            //echo $p_key['patbed_id'];
                                            $bedNo = $this->model_hms->get_bed_name_wrt_ward($p_key['patbed_id']);
                                            if($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed")
                                            {
                                                echo "Extra Bed " .$bedNo->bed;
                                            }
                                            else{
                                                echo $bedNo->bed;
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <label>Admission Date:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <p><?php echo $p_key['patAdmDate']; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label>Revisits:</label>
                                    </div>
                                    <div class="col-md-8" style="padding-left: 0px;">
                                        <?php	 if(!empty($p_key['previousRegno'])) { ?>
                                        <p><?php $result = $this->model_hms->getPreviousVisits($p_key['previousRegno']);
                                            if (!empty($result)) {

                                                foreach ($result as $visit) {
                                                    //print_r($visit);
                                                    if($visit['regNo'] != $this->input->get("search_by_cnic")) {
                                                        echo "Patient previously visited on " . $visit['patAdmDate'] . ": " . '<a target="_blank" href="' . base_url('dashboard/patient_chart/?search_by_cnic=') . $visit['regNo'] . '">' . "Click here to view chart" . '</a><br>';
                                                    }
                                                    else{
                                                        echo "No previous visit found";
                                                    }
                                                }

                                            }
                                            else{
                                                echo "No previous visit found";
                                            }
                                            }
                                            ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php }
        } ?>

        <?php if (!empty($patient_list)) {
            foreach ($patient_list as $p_key) { ?>
                <div class="box  box-primary">
                    <div class="box-header with-border">
                        <div class="col-md-4">
                            <h3 class="box-title" style="margin-top:10px; ">History &amp; Plan Chart Details</h3>
                        </div>
                        <div class="col-md-5 col-md-offset-3" style="margin-bottom: 10px;">
                            <a href="<?php echo base_url('dashboard/patient_reports?search_by_cnic=' . $p_key['regNo']); ?>"
                               target="_blank" class="btn btn-primary">View Patient Reports</a>
                            <a href="<?php echo base_url('dashboard/patient_vitals_sheet?search_by_cnic=' . $p_key['regNo']); ?>"
                               target="_blank" class="btn btn-primary">View Patient Vitals Sheet</a>

                        </div>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                        </div>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-4">
                                <!-- DIRECT CHAT WARNING -->
                                <div class="box box-primary box-solid direct-chat direct-chat-primary">
                                    <div class="box-header brief-history">
                                        <h3 class="box-title">Brief History</h3>
                                        <div class="box-tools pull-right">
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- Conversations are loaded here -->

                                        <div class="direct-chat-messages">
                                            <!-- Message. Default to the left -->
                                            <div class="direct-chat-msg history-texts">
                                                <!-- /.direct-chat-info -->
                                                <?php if (!empty($patient_chart)) {
                                                    $i = 1;
                                                    foreach ($patient_chart as $c_key) {
                                                        if (!empty($c_key['patHistory'])) { ?>
                                                            <!-- /.direct-chat-img -->
                                                            <span class="direct-chat-name pull-left history-count"
                                                                  style="padding: 10px;"><?php echo $i; ?>.</span>
                                                            <div class="direct-chat-text histroy-msg"><?php echo $c_key['patHistory']; ?></div>
                                                            <div class="direct-chat-info clearfix">
                                                                    <span class="direct-chat-timestamp pull-right history-timestamp"><?php echo $c_key['timestamp']; ?>
                                                                        &nbsp; By <?php echo $c_key['docName']; ?></span>

                                                            </div>
                                                            <?php $i++;
                                                        }
                                                    }
                                                } ?>
                                                <!-- /.direct-chat-text -->
                                            </div>

                                            <!-- /.direct-chat-msg -->
                                            <!-- Message to the right -->

                                            <!-- /.direct-chat-msg -->
                                        </div>

                                        <!--/.direct-chat-messages-->
                                        <!-- Contacts are loaded here -->
                                        <!-- /.direct-chat-pane -->
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">

                                        <div class="input-group">
                                            <input type="text" name="patHistory" id="patHistory"
                                                   placeholder="Type Brief History ..." class="form-control"
                                                   autocomplete="off" <?php if ($input_status != 1) {
                                                echo "disabled";
                                            } ?>>
                                            <input type="hidden" name="chartpatregNo" id="chartpatregNo"
                                                   value="<?php echo isset($patient_id)?$patient_id:''; ?>">

                                            <span class="input-group-btn">
                                          <button type="button" class="btn btn-primary btn-flat"
                                                  id="hist-submit" <?php if ($input_status != 1) {
                                              echo "disabled";
                                          } ?>>Save</button>
                                        </span>
                                        </div>

                                    </div>
                                    <!-- /.box-footer-->
                                </div>
                                <!--/.direct-chat -->
                            </div>
                            <div class="col-md-4">
                                <!-- DIRECT CHAT WARNING -->
                                <div class="box box-primary box-solid direct-chat direct-chat-primary">
                                    <div class="box-header investigation-plan">
                                        <h3 class="box-title">Investigation Plan</h3>
                                        <div class="box-tools pull-right">
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- Conversations are loaded here -->
                                        <div class="direct-chat-messages">
                                            <!-- Message. Default to the left -->
                                            <div class="direct-chat-msg inv-texts">

                                                <!-- /.direct-chat-info -->
                                                <?php if (!empty($patient_chart)) {
                                                    $i = 1;
                                                    foreach ($patient_chart as $c_key) {
                                                        if (!empty($c_key['patInvestigation'])) { ?>
                                                            <!-- /.direct-chat-img -->
                                                            <span class="direct-chat-name pull-left inv-count"
                                                                  style="padding: 10px;"><?php echo $i; ?>.</span>
                                                            <div class="direct-chat-text inv-msg"><?php echo $c_key['patInvestigation']; ?></div>
                                                            <div class="direct-chat-info clearfix">
                                                                    <span class="direct-chat-timestamp pull-right inv-timestamp"><?php echo $c_key['timestamp']; ?>
                                                                        &nbsp; By <?php echo $c_key['docName']; ?></span>

                                                            </div>
                                                            <?php $i++;
                                                        }
                                                    }
                                                } ?>
                                                <!-- /.direct-chat-text -->
                                            </div>
                                            <!-- /.direct-chat-msg -->
                                            <!-- Message to the right -->

                                            <!-- /.direct-chat-msg -->
                                        </div>
                                        <!--/.direct-chat-messages-->
                                        <!-- Contacts are loaded here -->

                                        <!-- /.direct-chat-pane -->
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">

                                        <div class="input-group">
                                            <input type="text" name="patInverstigation" id="patInverstigation"
                                                   placeholder="Type Investigation Plan ..."
                                                   class="form-control"
                                                   autocomplete="off" <?php if ($input_status != 1) {
                                                echo "disabled";
                                            } ?>> <span
                                                class="input-group-btn">
                                              <input type="hidden" name="chartpatregNo" id="chartpatregNo"
                                                     value="<?php echo isset($patient_id)?$patient_id:''; ?>">

                                              <button type="button" class="btn btn-primary btn-flat"
                                                      id="inv-submit" <?php if ($input_status != 1) {
                                                  echo "disabled";
                                              } ?>>Save</button></span>
                                        </div>

                                    </div>
                                    <!-- /.box-footer-->
                                </div>
                                <!--/.direct-chat -->
                            </div>

                            <div class="col-md-4">
                                <!-- DIRECT CHAT WARNING -->
                                <div class="box box-primary box-solid direct-chat direct-chat-primary">
                                    <div class="box-header treatment-plan">
                                        <h3 class="box-title">Treatment Plan</h3>
                                        <div class="box-tools pull-right">
                                        </div>
                                    </div>
                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <!-- Conversations are loaded here -->
                                        <div class="direct-chat-messages">
                                            <!-- Message. Default to the left -->
                                            <div class="direct-chat-msg treat-texts">
                                                <!-- /.direct-chat-info -->
                                                <?php if (!empty($patient_chart)) {
                                                    $i = 1;
                                                    foreach ($patient_chart as $c_key) {
                                                        if (!empty($c_key['patTreatPlan'])) { ?>
                                                            <!-- /.direct-chat-img -->
                                                            <span class="direct-chat-name pull-left treat-count"
                                                                  style="padding: 10px;"><?php echo $i; ?>.</span>
                                                            <div class="direct-chat-text treat-msg"><?php echo $c_key['patTreatPlan']; ?></div>
                                                            <div class="direct-chat-info clearfix">
                                                                    <span class="direct-chat-timestamp pull-right treat-timestamp"><?php echo $c_key['timestamp']; ?>
                                                                        &nbsp; By <?php echo $c_key['docName']; ?></span>

                                                            </div>
                                                            <?php $i++;
                                                        }
                                                    }
                                                } ?>
                                                <!-- /.direct-chat-text -->
                                            </div>
                                            <!-- /.direct-chat-msg -->
                                            <!-- Message to the right -->

                                            <!-- /.direct-chat-msg -->
                                        </div>
                                        <!--/.direct-chat-messages-->
                                        <!-- Contacts are loaded here -->

                                        <!-- /.direct-chat-pane -->
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">

                                        <div class="input-group">
                                            <input type="text" name="patTreatPlan" id="patTreatPlan"
                                                   placeholder="Type Investigation Plan ..."
                                                   class="form-control"
                                                   autocomplete="off" <?php if ($input_status != 1) {
                                                echo "disabled";
                                            } ?>>
                                            <span class="input-group-btn">
                                              <input type="hidden" name="chartpatregNo" id="chartpatregNo"
                                                     value="<?php echo isset($patient_id)?$patient_id:''; ?>">

                                              <button type="button" class="btn btn-primary btn-flat"
                                                      id="treat-submit" <?php if ($input_status != 1) {
                                                  echo "disabled";
                                              } ?>>Save</button>
                                        </span>
                                        </div>

                                    </div>
                                    <!-- /.box-footer-->
                                </div>
                                <!--/.direct-chat -->
                            </div>
                        </div>
                    </div>
                </div>
            <?php }
        } ?>
    </section>
</div>
<script>
    $(document).ready(function () {
        $('.select2').select2();

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
    });
</script>