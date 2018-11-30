<table id="vitals-search"
       class="table table-bordered table-hover dataTable"
       role="grid" aria-describedby="example2_info">
    <thead>
    <tr role="row">
        <th class="sorting_asc" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1" aria-sort="ascending"
            aria-label="Rendering engine: activate to sort column descending">
            Serial#
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            Date &amp; Time
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            B.P SYS
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            B.P DIA
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="Platform(s): activate to sort column ascending">
            Pulse Rate
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Body Temperature
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Resperatory Rate
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Height
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Weight
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            BMI
        </th>
        <th class="sorting" tabindex="0" aria-controls="example2"
            rowspan="1" colspan="1"
            aria-label="CSS grade: activate to sort column ascending">
            Actions
        </th>
    </tr>
    </thead>
    <tbody>
    <?php
    $count = 0;
    if (!empty($vitals_list)) {
        foreach ($vitals_list as $index => $v_key) {
            ?>

            <tr role="row" class="odd">

                <td class="sorting_1" id="regNo"><?php echo $index + 1; ?>
                    <input type="hidden" class="vitalID" value="<?php echo $v_key['vital_id']; ?>" id="regisno">
                </td>
                <?php
                $datetime = $v_key['vital_timestamp'];
                $dates = explode(' ', $datetime);
                $date = $dates[0];
                $time = $dates[1];
                $date = date('d-m-Y', strtotime($date));
                $time = date('h:i:s', strtotime($time));
                ?>
                <td>
                    <div class="input-group date bootstrap-timepicker timepicker">

                        <div class="col-md-12" style="padding: 0;">
                            <input type="text" class="form-control pull-right datepicker-vital" id="" name="vitals-date" autocomplete="off" placeholder="Set Date" style="width:100%" value="<?php echo $date; ?>">
                        </div>
                        <div class="col-md-12" style="padding: 0;">
                            <input type="text" class="form-control pull-right timepicker-vital" id="" name="vitals-time" placeholder="Set Time" style="width:100%" value="<?php echo $time; ?>">
                        </div>
                    </div>
                </td>
                <td>
                    <?php
                    $bp = $v_key['vital_bp'];

                    $exploder = explode('-', $bp);
                    ?>
                    <input type="text" value="<?php echo $exploder[0]; ?>" class="editdatatab" id="bp1" />

                </td>
                <td>
                    <input type="text" value="<?php echo $exploder[1]; ?>" class="editdatatab" id="bp2" />
                </td>
                <td><input type="text" value="<?php echo $v_key['vital_pulse']; ?>" class="editdata" id="pulse" ></td>
                <td><input type="text" value="<?php echo $v_key['vital_temp']; ?>" class="editdata" id="temp" /></td>
                <td><input type="text" value="<?php echo $v_key['vital_resp_rate']; ?>" class="editdata" id="resp" /></td>
                <td><input type="text" value="<?php echo $v_key['vital_height']; ?>" class="editdata" id="height" /></td>
                <td><input type="text" value="<?php echo $v_key['vital_weight']; ?>" class="editdata" id="weight" /></td>
                <td><input type="text" value="<?php echo $v_key['vital_bmi']; ?>" class="editdata" id="bmi" /></td>
                <td>
                    <button class="btn btn-default delete-vital"
                            data-href="<?php echo $v_key['vital_id']; ?>"
                            data-patientid="<?php echo $v_key['regNo']; ?>">
                        <i class="fa fa-trash" aria-hidden="true"></i>
                    </button>
                    <br />
                    <button class="btn btn-default update-vital ">
                        <i class="fa fa-edit" aria-hidden="true"></i>
                    </button>
                </td>
            </tr>
            <?php
            $count = $index + 1;
        }
    }
    ?>
    <tr>
        <td ><?php echo $count + 1; ?></td>
        <td>
            <div class="input-group date bootstrap-timepicker timepicker">
                <div class="col-md-12" style="padding: 0;">
                    <input type="text" class="form-control pull-right datepicker-vital-rw" id="datepic" name="vitals-date-rw" autocomplete="off" placeholder="Set Date" style="width:100%" >
                </div>
                <div class="col-md-12" style="padding: 0;">
                    <input type="text" class="form-control pull-right timepicker-vital-rw"  name="vitals-time-rw" placeholder="Set Time" style="width:100%">
                </div>
            </div>
        </td>
        <td><input type="text" class="editdata cursre-onload" id="bp1"></td>
        <td><input type="text" class="editdata" id="bp2"></td>
        <td><input type="text" class="editdata" id="pulse"></td>
        <td><input type="text" class="editdata" id="temp"></td>
        <td><input type="text" class="editdata" id="resp"></td>
        <td><input type="text" class="editdata" id="height"></td>
        <td><input type="text" class="editdata" id="weight"></td>
        <td><input type="text" class="editdata" id="bmi"></td>
        <td><button class="btn btn-default vital-save" id="save-vital">
                <i class="fa fa-save" aria-hidden="true"></i>
            </button>
        </td>
    </tr>
    </tbody>
    <tfoot>

    </tfoot>
</table>