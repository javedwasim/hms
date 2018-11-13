<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Print Discharge Sheet | <?php echo SITE_TITLE_TEXT; ?></title>
        <style>
            @page {
                margin: 0;
                size: A4
            }

            body {
                margin: 0;
                font-family: Calibri;

            }

            .sheet {
                margin: 0;
                position: relative;
            }

            body.A3 .sheet {
                width: 297mm;
                height: 419mm
            }

            body.A3.landscape .sheet {
                width: 420mm;
                height: 296mm
            }

            body.A4 .sheet {
                width: 210mm;
                height: 100%;
            }

            body.A4.landscape .sheet {
                width: 11.68in;
                height: 8.27in;
            }

            body.A5 .sheet {
                width: 148mm;
                height: 209mm
            }

            body.A5.landscape .sheet {
                width: 210mm;
                height: 147mm
            }

            body.letter .sheet {
                width: 216mm;
                height: 279mm
            }

            body.letter.landscape .sheet {
                width: 280mm;
                height: 215mm
            }

            body.legal .sheet {
                width: 216mm;
                height: 356mm
            }

            body.legal.landscape .sheet {
                width: 357mm;
                height: 215mm
            }

            /** Padding area **/
            .sheet.padding-10mm {
                padding: 10mm
            }

            .sheet.padding-15mm {
                padding: 15mm
            }

            .sheet.padding-20mm {
                padding: 20mm
            }

            .sheet.padding-25mm {
                padding: 25mm
            }

            /** For screen preview **/
            @media screen {
                body {
                    background: #e0e0e0
                }

                .sheet {
                    box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
                    margin: 5mm auto;
                    background: white;
                }

                .background-front {
                    background-size: contain;
                    height: 100%;
                    background: url(<?php echo base_url('assets/dist/img/new-discharge-front.jpg'); ?>) no-repeat;
                    background-size: 100%;
                }

                .background-back {
                    background-size: contain;
                    height: 100%;
                    background: url(<?php echo base_url('assets/dist/img/new-discharge-back.jpg'); ?>) no-repeat;
                    background-size: 100%;
                }
            }

            .background-front label {
                position: absolute;
                font-weight: 600;
            }

            .background-front p {
                font-weight: 600;
            }

            @media print {
                @page {
                    size: landscape;
                }

                .background-front, .background-back   {
                    background: none;
                }

            }
            .center {
                text-align: center;
            }

            h1, h2, h3, h4, h5 {
                margin-top: 0.10em;
                margin-bottom: 0.10em;
            }
            .tg  {border-collapse:collapse;border-spacing:0;width:90%;}
            .tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 15px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
            .tg th{font-size:14px;font-weight:bold;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
            .tg .tg-baqh{text-align:center;vertical-align:top}
            .tg .tg-yw4l{vertical-align:top; text-align: center; width: 2%;}
            .history-tbl {
                width: 33.3333%;
            }

            .inv-tbl {
                width: 33.3333%;
            }

            .plan-tbl {
                width: 33.3333%;
            }
            .po-op .row {
                display: inline-flex;
                width:100%;
                margin:10px 0px;
            }
            .po-op .cell3{
                width:30%;
                float:left;
            }
            .po-op .cell4{
                width:40%;
                float: left;
            }
            .po-op .cell5{
                width:20%;
                float:left;
            }
            .po-op .cell6{
                width:15%;
                float: left;
            }
            .po-op .bre{    word-break: break-all;}
            .po-op .td{
                margin: 10px 5px;
                border-bottom:1px solid #ccc;
            }
            .cell1{
                width: 50%;
                float: left;
            }
            .basic-info {
                margin: 0em 2em 0em 2em;
            }
            .pre-op-fitness .row {
                display: inline-flex;
                width:100%;
                margin:10px 0px;
            }
            .tb{
                width: 100%;
                border-collapse: collapse;
            }
            .tb td{
                border: 1px solid #ccc;
                padding: 5px;
                font-weight:bold;
                width: 33%;
            }
            .pre-op-order .td{
                margin: 10px 5px;
                border-bottom:1px solid #ccc;
            }
            .pre-op-order .row {
                display: inline-flex;
                width:100%;
            }
            .pre-op-order .cell3{
                width:30%;
                float:left;
            }
            .pre-op-order .cell4{
                width:40%;
                float: left;
            }
            .pre-op-order .cell5{
                width:20%;
                float:left;
            }
            .pre-op-order .cell6{
                width:15%;
                float: left;

            }
            .pre-op-order .cell2{
                width:25%;
                float: left;

            }
            .pre-op-order .cell10{
                width:10%;
                float: left;

            }
            .bold{
                font-weight:bold;

            }
            .pre-op-order .cell1 ul li {
                margin-bottom: 10px;
            }
            .pre-op-checklist .cell2{
                width:25%;
                float: left;
            }
            .pre-op-checklist .label{
                font-weight: bold;
            }
            .pre-op-checklist .row {
                display: inline-flex;
                width:100%;
                margin:3px 0px;
            }

            .pre-op-checklist .cell3{
                width:30%;
                float:left;
            }
            .pre-op-checklist .cell4{
                width:40%;
                float: left;
            }
            .pre-op-checklist .cell5{
                width:20%;
                float:left;
            }
            .pre-op-checklist .cell6{
                width:15%;
                float: left;

            }
            .pre-op-checklist .cell2{
                width:25%;
                float: left;

            }
            .pre-op-checklist .cell10{
                width:10%;
                float: left;

            }
            .right{
                float:right;
            }
            .pre-op-checklist .tb{
                margin: 10px 5px;
                border-bottom:1px solid #ccc;
            }
            
            .post-op-ins .td{
                margin: 20px 5px;
            }
            .post-op-ins .label{
                font-weight: bold;
            }
            .post-op-ins .tb{
                width: 100%;
                margin: 10px 0px;
                border-collapse: collapse;
            }
            .post-op-ins .tb td{
                border: 1px solid #000;
                padding: 25px 10px;
                font-weight:bold;
                width: 33%;
            }
            .post-op-ins .tb .th{
                width:15%;
            }
            .post-op-ins .data-label {
                text-decoration: underline;
                font-size: 17px;
                white-space: -moz-pre-wrap !important;
                white-space: -pre-wrap;
                white-space: -o-pre-wrap;
                white-space: pre-wrap;
                word-wrap: break-word;
                word-break: break-all;
                white-space: normal;
            }
        </style>
    </head>
    <body class="A4 landscape">
        <section class="sheet padding-10mm">
            <?php
            if (!empty($patient_list)) { //print_r($patient_list);
                foreach ($patient_list as $p_key) {
                    ?>

                    <section class="background-front">
                        <?php echo '<div class="qr" style="position: absolute;     top: 1.65in; right: 0.5in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                        <label style="bottom: 2.75in;left: 7.26in;"><?php echo $p_key['patName']; ?></label>
                        <label style="bottom: 2.4in;left: 7.4in;"><?php echo $p_key['patAge'] . "&nbsp; / &nbsp;" . $p_key['patSex']; ?></label>
                        <label style="bottom: 2.4in;left: 9.9in;"><?php echo $p_key['regNo']; ?></label>
                        <label style="bottom: 1.74in;left: 7.8in;"><?php echo $date = date('d-m-Y', strtotime($p_key['patAdmDate'])); ?></label>
                        <label style="bottom: 1.74in;left: 10in;"><?php echo $date = date('d-m-Y', strtotime($p_key['discharge_date'])); ?></label>
                        <label style="bottom: 1.45in;left: 7.2in;"><?php echo $p_key['patAddress']; ?></label>
                        <label style="width: 40%; top: 2.3in; left: 1in; line-height: 0.4in;"><?php echo $p_key['discharge_advice']; ?></label>

                    </section>


                </section>
                <section class="sheet padding-10mm">
                    <section class="background-back">
                        <p style="width: 40%; top: 1.56in; left: 1in; line-height: 0.4in; position:absolute;">
                            <?php
                            if (!empty($patient_chart)) { // print_r($patient_chart);
                                foreach ($patient_chart as $c_key) {
                                    if (!empty($c_key['patHistory'])) {
                                        ?>
                                        <?php echo $c_key['patHistory'] . ", "; ?>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </p>
                        <p style="width: 40%; top: 4.2in;left: 0.55in;; line-height: 0.4in; position:absolute;">
                            <?php
                            if (!empty($patient_chart)) { // print_r($patient_chart);
                                foreach ($patient_chart as $c_key) {
                                    if (!empty($c_key['patInvestigation'])) {
                                        ?>
                                        <?php echo $c_key['patInvestigation'] . ", "; ?>
                                        <?php
                                    }
                                }
                            }
                            ?>
                        </p>

                        <?php
                        if (!empty($ot_details)) { //print_r($patient_list);
                            foreach ($ot_details as $ot_key) {
                                
                            }
                            ?>
                            <p style="width: 40%;top: 3.47in;left: 8in;line-height: 0.4in;position: absolute;"><?php echo $ot_key['otBookingDate']; ?></p>
                            <p style="width: 40%;top: 3.9in;left: 8in;line-height: 0.4in;position: absolute;"><?php echo $ot_key['otOperationType']; ?></p>
                            <p style="width: 40%;top: 4.3in;left: 7.55in;line-height: 0.4in;position: absolute;"><?php
                                $surgeon = $this->model_hms->get_user_name_by_id($ot_key['otSurgeon']);
                                echo $surgeon->full_name;
                                ?></p>
                            <p style="width: 40%;top: 4.73in;left: 7.55in;line-height: 0.4in;position: absolute;"><?php echo $ot_key['otAnesthesia']; ?></p>
                            <p style="width: 40%;top: 5.7in;left: 7.5in;line-height: 0.4in;position: absolute;"><?php echo $ot_key['otOpFindingsProc']; ?></p>



                            <?php
                        }
                        ?>
                    </section>
                </section>
                <?php
                    if($vitals){
                ?>
                <section class="sheet padding-10mm" style="margin-top:10%;  ">
                    <div class="header center">
                        <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
                             style="position: absolute; top: 0.2in; left: 0.79in; height: 100px">
                        <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
                        <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                        <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
                        <br>

                        <h2 style="margin-top: 0 !important;">VITAL SHEET</h2>
                        <br>
                    </div>
                    <table class="tg" style="display: -webkit-box;margin: 0 auto;">
                        <thead>
                            <tr>
                                <th class="tg-yw4l">Date</th>
                                <th class="tg-yw4l">Time</th>
                                <th class="tg-yw4l">B.P.</th>
                                <th class="tg-yw4l">Pulse</th>
                                <th class="tg-yw4l">Temp &#8451;</th>
                                <th class="tg-yw4l tg-1">sign</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($vitals as $v) { ?>
                                <tr>
                                    <?php
                                    $datetime = $v->vital_timestamp;
                                    $dates = explode(' ', $datetime);
                                    $dat = $dates[0];
                                    $time = $dates[1];
                                    ?>
                                    <?php
                                    $date = $v->vital_timestamp;
                                    $time = date('h:i a', strtotime($date));
                                    ?>
                                    <td class="tg-yw4l"><?php echo $dat; ?></td>
                                    <td class="tg-yw4l"><?php echo $time; ?></td>
                                    <?php
                                    $bp = $v->vital_bp;
                                    $exploder = explode('-', $bp);
                                    ?>
                                    <td class="tg-yw4l"><?php echo $exploder[0] . " - " . $exploder[1]; ?></td>
                                    <td class="tg-yw4l"><?php echo $v->vital_pulse; ?></td>
                                    <td class="tg-yw4l"><?php echo $v->vital_temp; ?></td>
                                    <td class="tg-yw4l"></td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </section>
                <?php
                    }
                ?>
                <?php
                    if($sugar_list){
                ?>
                <section class="sheet padding-10mm" style="margin-top:10%;  ">
                    <div class="header center">
                        <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
                             style="position: absolute; top: 0.2in; left: 0.79in; height: 100px">
                        <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
                        <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                        <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
                        <br>

                        <h2 style="margin-top: 0 !important;">Blood Sugar Profile</h2>
                        <br>
                    </div>
                    <table class="tg" style="display: -webkit-box;margin: 0 auto;">
                        <thead>
                            <tr>
                                <th class="tg-yw4l">Date</th>
                                <th class="tg-yw4l">BSF</th>
                                <th class="tg-yw4l">2 HrBSF</th>
                                <th class="tg-yw4l">Pre Lunch</th>
                                <th class="tg-yw4l">Post Lunch</th>
                                <th class="tg-yw4l tg-1">Pre Dinner</th>
                                <th class="tg-yw4l tg-1">Post Dinner</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($sugar_list as $v) {
                                $date = date('d-m-Y', strtotime($v['bs_date']));
                                ?>
                                <tr>
                                    <td class="tg-yw4l"><?php echo $date; ?></td>
                                    <td class="tg-yw4l"><?php echo $v['bs_bsf']; ?></td>
                                    <td class="tg-yw4l"><?php echo $v['bs_hrbsf']; ?></td>
                                    <td class="tg-yw4l"><?php echo $v['bs_pre_lunch']; ?></td>
                                    <td class="tg-yw4l"><?php echo $v['bs_post_lunch']; ?></td>
                                    <td class="tg-yw4l"><?php echo $v['bs_pre_dinner']; ?></td>
                                    <td class="tg-yw4l"><?php echo $v['bs_post_dinner']; ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </section>
                <?php
                    }
                ?>
                <?php
                if (!empty($postop)) {
                    foreach ($postop as $lis) {
                        ?>
                        <section class="sheet padding-10mm po-op" style="margin-top:10%;  ">

                            <div class="header center">
                                <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
                                     style="position: absolute; top: 0.2in; left: 0.7in; height: 100px">
                                <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
                                <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                                <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
                                <br>

                                <h2 style="margin-top: 0 !important;">Post Opreative performa</h2>
                                <h4 style="margin-top: 0 !important;">Opreation notes</h4>
                                <br>
                            </div>
                            <div style="margin: 0 auto;">
                                <div class="basic-info ">
                                    <div class="row">
                                        <div class="cell4">
                                            <div class="td">
                                                <label class="label">Pt. Name:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $p_key['patName'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell5">
                                            <div class = "td">
                                                <label class="label">Reg #:</label>
                                                <label class = "data-label">
                                                    <?php
                                                    echo $p_key['regNo'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell6">
                                            <div class="td">
                                                <label class="label">Bed #:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $p_key['patbed_id'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell3">
                                            <div class="td">
                                                <label class="label">Age:</label>
                                                <label class="data-label">
                                                    <?php
                                                    if (!empty($p_key['patAge'])) {
                                                        echo $p_key['patAge'];
                                                        echo " years";
                                                    }
                                                    echo "&nbsp;";
                                                    if (!empty($p_key['patMonthAge'])) {
                                                        echo $p_key['patMonthAge'];
                                                        echo " months";
                                                    }
                                                    echo "&nbsp;";
                                                    if (!empty($p_key['patDaysAge'])) {
                                                        echo $p_key['patDaysAge'];
                                                        echo " days";
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell6">
                                            <div class="td">
                                                <label class="label">Sex:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $p_key['patSex'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell3">
                                            <div class="td">
                                                <label class="label">Admission date:</label>
                                                <label class="data-label">
                                                    <?php
                                                    $date = $p_key['patAdmDate'];
                                                    $date = date(' d-m-Y', strtotime($date));
                                                    echo $date;
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell3">
                                            <div class="td">
                                                <label class="label">Operation date:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['dateOfOperation'];
                                                    ?>
                                                </label>
                                            </div> 
                                        </div>
                                        <div class="cell3">
                                            <div class="td">
                                                <label class="label">Operation Time:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['otBookingTime'];
                                                    ?>
                                                </label>
                                            </div>         
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell1">
                                            <div class="td">
                                                <label class="label">Referring Consultant:</label>
                                                <label class="data-label">
                                                    <?php echo $lis['referring_consultent']; ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="bre">
                                            <label class="label">Address:</label>
                                            <label class="data-label">
                                                <?php
                                                echo $p_key['patAddress'];
                                                if (!empty($p_key['patcity'])) {
                                                    echo $p_key['patcity'];
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell1">
                                            <div class="td">
                                                <label class="label">Pre-op Diagnosis:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['preOpDiagnosis'];
                                                    ?>
                                                </label>
                                            </div>        
                                        </div>
                                        <div class="cell1">
                                            <div class="td">
                                                <label class="label">Post op Diagnosis:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['postOpDiagnosis'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="bre">
                                            <label class="label">Operation/Procedure:</label>
                                            <label class="data-label">
                                                <?php
                                                echo $lis['otOperationType'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell1">

                                            <div class="td">
                                                <label class="label">Anesthesia:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['otAnesthesia'];
                                                    ?>
                                                </label>
                                            </div>           
                                            <div class="td">
                                                <label class="label">Surgeon:</label>
                                                <label class="data-label">
                                                    <?php
                                                    $user_list_surgeon = $this->model_hms->get_user_name_by_id($lis['otSurgeon']);
                                                    echo $user_list_surgeon->full_name;
                                                    ?>
                                                </label>
                                            </div>
                                            <div class="td">
                                                <label class="label">Incision:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['incision'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell1">

                                            <div class="td">
                                                <label class="label">Anesthetist:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['otAnesthesia'];
                                                    ?>
                                                </label>
                                            </div>
                                            <div class="td">
                                                <label class="label">Assistant:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['assistant'];
                                                    ?>
                                                </label>
                                            </div>
                                            <div class="td">
                                                <label class="label">Duration of Procedure:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['durationOfProcedure'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="bre">
                                            <label class="label">Pre Operative Findings:</label>
                                            <label class="data-label">
                                                <?php
                                                echo $lis['preOperativeFindings'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="bre">
                                            <label class="label">Biopsy(if any):</label>
                                            <label class="data-label">
                                                <?php
                                                echo $lis['biopsy'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="bre">
                                            <label class="label">Drains:</label>
                                            <label class="data-label">
                                                <?php
                                                echo $lis['drains'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell3">
                                            <div class="td">
                                                <label class="label">Vitals- Pulse:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['otVitalPulse'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell5">
                                            <div class = "td">
                                                <label class="label">B.P:</label>
                                                <label class = "data-label">
                                                    <?php
                                                    echo $lis['otVitalbp'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell5">
                                            <div class="td">
                                                <label class="label">Temp:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['otVitaltemp'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell5">
                                            <div class="td">
                                                <label class="label">R.R:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['otVitalrr'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="cell3">
                                            <div class="td">
                                                <label class="label">Prepared by:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['vdoc_name'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell5">
                                            <div class = "td">
                                                <label class="label">Sign:</label>
                                                <label class = "data-label">

                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell5">
                                            <div class="td">
                                                <label class="label">Time:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['otBookingDate'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell5">
                                            <div class="td">
                                                <label class="label">Date:</label>
                                                <label class="data-label">
                                                    <?php
                                                    echo $lis['otBookingTime'];
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>	
                            </div>
                            <?php
                        }
                    }
                    ?>
                </section>
                <?php

                    if($pre_op_fitness){

                ?>
                <section class="sheet padding-10mm pre-op-fitness" style="margin-top:10%;  ">
                    <div class="header center">
                        <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
                             style="position: absolute; top: 0.2in; left: 0.7in; height: 100px">
                        <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
                        <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                        <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
                        <br>

                        <h2 style="margin-top: 0 !important;">PRE-OP FITNESS FORM</h2>
                        <h4 style="margin-top: 0 !important;">Operation notes</h4>
                        <br>
                    </div>
                    <div class="container">			
                        <div class="basic-info">
                            <h3 class="heading">Anesthesia Fitness by Anesthetist</h3>
                            <div class="row"> 
                                <label class="label">Remarks:</label>
                                <p class="data-label" style="border-bottom:1px solid #ccc;"><?php
                                    $iterator1 = 5;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    echo $pre_op_fitness->anesthetistRemarks;
                                    $iterator1 = 5;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="row">
                                <label class="label">Advice:</label>
                                <p class="data-label" style="border-bottom:1px solid #ccc;"><?php
                                    $iterator1 = 5;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    echo $pre_op_fitness->anesthetistAdvice;

                                    $iterator1 = 5;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    ?>
                                </p>
                            </div>
                            <div class="row">
                                <div class="cell1">
                                    <label class="label">Name of Anesthetist:</label>
                                    <label class="data-label" style="border-bottom:1px solid #ccc;"><?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_fitness->anesthetistName;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                </div>
                                <div class="cell1">
                                    <label class="label">Signature:</label>
                                    <label class="data-label" style="border-bottom:1px solid #ccc;"><?php
                                        $iterator1 = 15;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        $iterator1 = 15;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?></label>
                                </div>
                            </div>
                            <div class="row">        </div>
                            <h3 class="heading">Medical Fitness by Physician</h3>
                            <div class="row">
                                <label class="label">Remarks:</label>
                                <p class="data-label" style="border-bottom:1px solid #ccc;"><?php
                                    $iterator1 = 15;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    echo $pre_op_fitness->physicianRemarks;
                                    $iterator1 = 15;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    ?></p>
                            </div>
                            <div class="row">
                                <label class="label">Advice:</label>
                                <p class="data-label" style="border-bottom:1px solid #ccc;"><?php
                                    $iterator1 = 15;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    echo $pre_op_fitness->physicianAdvice;
                                    $iterator1 = 15;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    ?></p>
                            </div>
                            <div class="row">        </div>
                            <div class="row">
                                <div class="cell1">
                                    <label class="label">Name of Anesthetist:</label>
                                    <label class="data-label" style="border-bottom:1px solid #ccc;"><?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_fitness->physicianName;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?></label>
                                </div>
                                <div class="cell1">
                                    <label class="label">Signature</label>
                                    <label class="data-label" style="border-bottom:1px solid #ccc;"><?php
                                        $iterator1 = 15;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }

                                        $iterator1 = 15;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?></label>
                                </div>
                            </div>
                            <div class="row">        </div>
                            <h3 class="heading label">Any Other</h3>
                            <div class="row">
                                <label class="data-label"><?php echo $pre_op_fitness->physicianRemarks; ?></label>
                            </div>	
                        </div>
                    </div>
                </section>

                <?php
                    }
                ?>
                <?php
                if (!empty($pre_op_order)) {
                    foreach ($pre_op_order as $op) {
                        ?>
                        <section class="sheet padding-10mm pre-op-order" style="margin-top:10%;">

                            <div class="header center">
                                <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
                                     style="position: absolute; top: 0.2in; left: 0.7in; height: 100px">
                                <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
                                <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                                <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
                                <br>
                                <h2 style="margin-top: 0 !important;">Pre Operative Orders</h2>
                                <br>
                            </div>
                            <div >
                                <div style="margin: 0 auto;">
                                    <div class="basic-info">
                                        <table class="tb">
                                            <tr>
                                                <td>Operation Site</td>
                                                <td>Side: </td>
                                                <td><?php echo $pre_op_order->operationSite ?></td>
                                            </tr>
                                        </table>

                                        <div class="">
                                            <table class="tb">
                                                <tr>
                                                    <td>Operation Side</td>
                                                    <td>Marked as: </td>
                                                    <td><?php echo $pre_op_order->operationSideMarked; ?></td>
                                                </tr>
                                            </table>
                                        </div>

                                        <div class="row" style="display:block;">
                                            <div class="cell4">
                                                <div class="td">
                                                    <label class="label">Patient Name:</label>
                                                    <label class="data-label">
                                                        <?php
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        echo $p_key['patName'];
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="cell5">
                                                <div class="td">
                                                    <label class="label">Registration No.</label>
                                                    <label class="data-label">
                                                        <?php
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        echo $pre_op_order->regNo;
                                                        ;
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="cell10">
                                                <div class="td">
                                                    <label class="label">Bed No:</label>
                                                    <label class="data-label">
                                                        <?php
                                                        echo $p_key['patbed_id'];
                                                        ?>     
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="cell3">
                                                <div class="td">
                                                    <label class="label">Age & Sex:</label>
                                                    <label class="data-label">
                                                        <?php
                                                        if (!empty($p_key['patAge'])) {
                                                            echo $p_key['patAge'];
                                                            echo " years";
                                                        }
                                                        echo "&nbsp;";
                                                        if (!empty($p_key['patMonthAge'])) {
                                                            echo $p_key['patMonthAge'];
                                                            echo " months";
                                                        }
                                                        echo "&nbsp;";
                                                        if (!empty($p_key['patDaysAge'])) {
                                                            echo $p_key['patDaysAge'];
                                                            echo " days";
                                                        }
                                                        echo "&nbsp; / &nbsp;";
                                                        echo $p_key['patSex'];
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="cell3">
                                                <div class="td">
                                                    <label class="label">Father's Name:</label>
                                                    <label class="data-label">
                                                        <?php
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        echo $p_key['patNoK'];
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        ?>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cell5">
                                            <div class="td">
                                                <label class="label">Date:</label>
                                                <label class="data-label">
                                                    <?php
                                                    $datetime = $pre_op_order->dateString;
                                                    $dates = explode(' ', $datetime);
                                                    $date = $dates[0];
                                                    $time = $dates[1];
                                                    $date = date('d-m-Y', strtotime($date));
                                                    $time = date('h:i a', strtotime($time));

                                                    $time = $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }

                                                    echo $date;
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    ?>
                                                </label>
                                            </div>

                                        </div>

                                        <div class="cell1">
                                            <div class="td">
                                                <label class="label">Time:</label>
                                                <label class="data-label">
                                                    <?php
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }

                                                    echo $time;
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    ?>
                                                </label>
                                            </div>


                                        </div>


                                        <br />
                                        <div class="row">
                                            <label class="label" style="font-size:18px; font-weight: bold;margin:10px 0px;">Marks of identification:</label> 
                                        </div>
                                        <div class="row" style="border-bottom:1px solid #ccc;margin:10px 0px;" >
                                            1:<label class="data-label"><?php
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_order->marksIdentification1;
                                                ;
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?></label>
                                        </div>
                                        <div class="row" style="border-bottom:1px solid #ccc;margin:10px 0px;">
                                            2:<label class="data-label"><?php
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_order->marksIdentification2;
                                                ;
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?> </label>
                                        </div>

                                        <div class="row">
                                            <div class="cell1">
                                                <ul>
                                                    <li>
                                                        <label class="label bold">Give Bath</label>
                                                        <label class="data-label">
                                                            <?php
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            echo $pre_op_order->giveBath;
                                                            ;
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="label bold">Provide Hospital Dress</label>
                                                        <label class="data-label">
                                                            <?php
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            echo $pre_op_order->provideHospitalDress;
                                                            ;
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="label bold">N.P.O Form</label>
                                                        <label class="data-label">
                                                            <?php
                                                            $nptime = date('h:i a', strtotime($pre_op_order->npoFormTime));
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            echo $nptime;
                                                            ;
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            ?>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="cell1">
                                                <ul>
                                                    <li>
                                                        <label class="label bold">Mark Operation Site</label>
                                                        <label class="data-label">
                                                            <?php
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            echo $pre_op_order->markOperationSite;
                                                            ;
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="label bold">Shave & prepare the area</label>
                                                        <label class="data-label">
                                                            <?php
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            echo $pre_op_order->areaName;
                                                            ;
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            ?>
                                                        </label>
                                                    </li>
                                                    <li>
                                                        <label class="label bold">Arrange</label>
                                                        <label class="data-label" style="border-bottom:1px solid #ccc;">
                                                            <?php
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            echo $pre_op_order->arrangeBlood;
                                                            ;
                                                            $iterator1 = 5;
                                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                                echo "&nbsp;";
                                                            }
                                                            ?>
                                                        </label><strong>Pints of Blood</strong>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <label class="label" style="font-size:18px; font-weight: bold;">Send following investigation to the operation theater:</label>
                                            <p class="data-label">
                                                <?php
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_order->sendFInvestigationOt;
                                                ;
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </p>
                                        </div>
                                        <div class="row">
                                            <ul>
                                                <li><label class="label">Pre-Medication</label>
                                                    <p class="data-label">
                                                        <?php
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        echo $pre_op_order->preMedication;
                                                        ;
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        ?>
                                                    </p>
                                                </li>
                                                <li>
                                                    <label class="label" >Send Patient to Operation Theater at</label>
                                                    <label class="data-label">
                                                        <?php
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        echo $pre_op_order->sendPatientOtTime;
                                                        ;
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        ?>
                                                    </label>
                                                </li>
                                                <li>
                                                    <label class="label" >Any Other Specific Order:</label>
                                                    <label class="data-label">
                                                        <?php
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        echo $pre_op_order->anyOtherOrder;
                                                        ;
                                                        $iterator1 = 5;
                                                        for ($i = 0; $i <= $iterator1; $i++) {
                                                            echo "&nbsp;";
                                                        }
                                                        ?>
                                                    </label>
                                                </li>
                                            </ul>
                                        </div>
                                        <h2>Instruction about use of special instruments</h2>
                                        <label class="label" >Laproscopic Use</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_order->laproscopicUse;
                                            ;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label><br />
                                        <label class="label" >Diathermy Use</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_order->diathermyUse;
                                            ;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label><br />
                                        <label class="label" >Tourniquet Use</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_order->tourniquetUse;
                                            ;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label><br />
                                        <label class="label" >X-Ray use</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_order->xRayUse;
                                            ;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label><br />
                                        <label class="label" >Laser Use</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_order->laserUse;
                                            ;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label><br />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        break;
                    }
                }
                ?>
            </section>
            <?php
            $iterator = 5;
            $iterator2 = 2;
            if (!empty($pre_op_checklist)) {
                ?>
                <section class="sheet padding-10mm pre-op-checklist" style="margin-top: 10%;">

                    <div class="header center">
                        <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
                             style="position: absolute; top: 0.2in; left: 0.7in; height: 100px">
                        <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
                        <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                        <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
                        <br>
                        <h2 style="margin-top: 0 !important;">PRE-OP CHECK LIST</h2>
                        <br>
                    </div>
                    <div >
                        <div style="margin: 0 auto;">
                            <div class="basic-info">
                                <div class="row">
                                    <div class="cell4">
                                        <div class="tb">
                                            <label class="label">Name of Patient:</label>
                                            <label class="data-label">
                                                <?php
                                                echo $p_key['patName'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell3">
                                        <div class="tb">
                                            <label class="label">Patient Age/Sex.</label>
                                            <label class="data-label">
                                                <?php
                                                if (!empty($p_key['patAge'])) {
                                                    echo $p_key['patAge'];
                                                    echo " years";
                                                }
                                                echo "&nbsp;";
                                                if (!empty($p_key['patMonthAge'])) {
                                                    echo $p_key['patMonthAge'];
                                                    echo " months";
                                                }
                                                echo "&nbsp;";
                                                if (!empty($p_key['patDaysAge'])) {
                                                    echo $p_key['patDaysAge'];
                                                    echo " days";
                                                }
                                                echo "&nbsp; / &nbsp;";
                                                echo $p_key['patSex'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell3">
                                        <div class="tb">
                                            <label class="label">Filled By Dr.</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->filled_by_dr;
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="cell5">
                                        <div class="tb">
                                            <label class="label">Date:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                if (!empty($pre_op_checklist->checkList_date)) {
                                                    echo $cldate = date('d-m-Y', strtotime($pre_op_checklist->checkList_date));
                                                }
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>     
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell4">
                                        <div class="tb">
                                            <label class="label">Surgeon</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->surgeon;
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell3">
                                        <div class="tb">
                                            <label class="label">Informed Consent:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->informed_consent;
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">    
                                    <div class="cell1">
                                        <div class="tb">
                                            <label class="label">Operation Planned</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->operation_planned;
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell1">
                                        <div class="tb">
                                            <label class="label">Diagnosis</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->diagnosis;
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row" style="margin-top:2%;">
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">B.P:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_bp;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">Pulse:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_pulse;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">Temp:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->chehcklist_temp;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">Resp/Rate:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_rep_rate;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">N.P.O from:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                if (!empty($pre_op_checklist->checklist_npo)) {
                                                    echo $cldate = date('h:i A', strtotime($pre_op_checklist->checklist_npo));
                                                }
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">Bath:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->givebath;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">Hospital Dress:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->hospital_dress;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">Shave:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->shave;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                <h2 style="border-bottom:1px solid #000; width:15%;">Test Result</h2>
                                <div class="row">
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">Hb:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_hb;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">ESR:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_esr;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">S/Na+:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_sNa;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">S/K+:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->check_sK;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cell1">
                                        <div class="row">
                                            <label class="label">S/Ca++(in a case thyroid):</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_sCa;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">PT:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_pt;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>    
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">APTT:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_aptt;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">TLC:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_tlc;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">RBS:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_rbs;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">HBsAg:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->checklist_HBsAg;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell2">
                                        <div class="row">
                                            <label class="label">Anti HCV:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $pre_op_checklist->anti_HCV;
                                                for ($i = 0; $i <= $iterator2; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cell1">
                                        <label class="label">Diabetic Status:</label>
                                        <label class="data-label">
                                            <?php
                                            for ($i = 0; $i <= $iterator; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->diabatic_status;
                                            for ($i = 0; $i <= $iterator; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="cell1">
                                        <label class="label">Hypertension Status:</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->hypertenstion_status;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="cell1">
                                        <label class="label">ECG(for every pit above 30years):</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->checklist_ECG;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="cell1">
                                        <label class="label">Any other co-morbid condition:</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->checklist_anyother;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <hr />
                                <h2 style="border-bottom:1px solid #000;width:30%;">Special Investigations</h2>
                                <div class="cell1">
                                    <div class="row">
                                        <label class="label">Biopsy(Specify):</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->biopsy;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label class="label">Lopogram:</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->lopogram;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label class="label">Chalangiogram:</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->chalangiogram;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label class="label">CT/MRI:</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->checklist_ct_mri;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label class="label">FNAC:</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->checklist_fnac;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label class="label">U/S(Specify):</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->chekclist_us;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label class="label">CXR:</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->checklist_cxr;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label class="label">IVU:</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->si_ivu;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                    <div class="row">
                                        <label class="label">Any Other(Specify):</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $pre_op_checklist->si_anyother;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <div class="cell1">
                                    <label class="label" >1. Call for fitness from anesthesia accomplished</label> 
                                    <label class="data-label right">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_checklist->checklist_radio1;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                    <div style="height:6px;"></div>
                                    <label class="label" >2. Patient Categorized according to anesthesia(ASA)</label> 
                                    <label class="data-label right">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_checklist->checklist_radio2;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                    <div style="height:6px;"></div>
                                    <label class="label" >3.Donor of blood arrange(In case of indication)</label> 
                                    <label class="data-label right">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_checklist->checklist_radio3;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                    <div style="height:6px;"></div>
                                    <label class="label" >4.items required for operatonal arranged</label>
                                    <label class="data-label right">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_checklist->checklist_radio4;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                    <div style="height:6px;"></div>
                                    <label class="label" >5.Pre-Op orders carried out</label> 
                                    <label class="data-label right">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_checklist->checklist_radio5;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                    <div style="height:6px;"></div>
                                    <label class="label" >6.Pre-Medication Given</label> 
                                    <label class="data-label right">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_checklist->checklist_radio6;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                    <div style="height:6px;"></div>
                                    <label class="label" >7.Any Drug Allergie</label> 
                                    <label class="data-label right">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_checklist->checklist_radio7;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                    <div style="height:6px;"></div>
                                    <label class="label" style="margin: 3px 0px;">8.Theatre Asepsis Confirmed out</label> 
                                    <label class="data-label right">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $pre_op_checklist->checklist_radio8;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
                ?>
            </section>
         <?php
                if ($post_operative_instructions) {
                    ?>
            <section class="sheet padding-10mm post-op-ins">
               
                    <div class="header center">
                        <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
                             style="position: absolute; top: 0.2in; left: 0.7in; height: 100px">
                        <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
                        <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                        <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
                        <br>
                        <h2 style="margin-top: 0 !important;">Post-Operative Instruction</h2>
                        <br>
                    </div>
                    <div style="margin: 0 auto;">
                        <div class="basic-info">
                            <ol>
                                <div class="row">
                                    <li class="label">For Recovery Area</li>
                                    <p class="data-label">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $post_operative_instructions->forRecoveryArea;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </p>
                                </div>
                                <li class="label">For next 24 to 48 hours</li>
                                <div class="row">

                                    <table class="tb">
                                        <thead>
                                        <th colspan="2" style="border: 1px solid #000;font-weight:bold;font-size:18px;">Post operative orders</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="th">Fluids</td>
                                                <td><?php echo $post_operative_instructions->fluids; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="th">Antibiotics</td>
                                                <td><?php echo $post_operative_instructions->antibiotics; ?></td>
                                            </tr>
                                            <tr>
                                                <td class="th">Analgesics</td>
                                                <td><?php echo $post_operative_instructions->analgesics; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div style="margin-top:2%;margin-bottom:3%;">
                                    <div>
                                        <li class="label">Special Instructions:</li>
                                    </div>
                                    <div style="margin-left:10%;">
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            echo $post_operative_instructions->specialInstructions;
                                            $iterator1 = 5;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <div >
                                    <li class="label">Instructions for Pathology / Biopsy Specimen:</li>
                                </div>
                                <div style="margin-left:10%;">
                                    <label class="data-label">
                                        <?php
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $post_operative_instructions->instructionsForPathological;
                                        $iterator1 = 5;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                </div>
                                <div style="margin-top:2%;">
                                    <li class="label"><label class="label">(To be filled in by Scrub Nurse)</label></li><br />
                                    <div class="row">
                                        <div class="cell1">
                                            <label class="label" >Intra Operative estimated blood loss</label> 
                                            <label class="data-label">
                                                <?php
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $post_operative_instructions->bloodLoss;
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label><br />
                                            <label class="label" >Intra Operative Blood Transfusion</label> 
                                            <label class="data-label">
                                                <?php
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $post_operative_instructions->bloodTransfusion;
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label><br />
                                            <label class="label" >Intra Operative I.V fluids</label> 
                                            <label class="data-label">
                                                <?php
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $post_operative_instructions->ivFluids;
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label><br />
                                        </div>
                                        <div class="cell1">
                                            <label class="label" >Intra Operative Urine Output</label>
                                            <label class="data-label">
                                                <?php
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $post_operative_instructions->urineOutput;
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label><br />
                                            <label class="label" >Swab / Instruments count complete</label> 
                                            <label class="data-label">
                                                <?php
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $post_operative_instructions->sawbOrInstruments;
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label><br />
                                        </div>
                                    </div>
                                </div>
                            </ol>
                        </div>
                    </div>
                    <?php }
                ?>
            </section>
            <?php
        }
    }
    ?>
</body>
</html>