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
    <title>Print Admission Sheet | <?php echo SITE_TITLE_TEXT; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
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
            /*overflow: hidden;*/
            position: relative;
            /*box-sizing: border-box;*/
            /*page-break-after: always;*/
        }

        /** Paper sizes **/
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
            width: 297mm;
            height: 209mm
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
                background: white;
                box-shadow: 0 .5mm 2mm rgba(0, 0, 0, .3);
                margin: 5mm auto;
            }
        }

        /** Fix for Chrome issue #273306 **/
        @media print {
            body.A3.landscape {
                width: 420mm
            }

            body.A3, body.A4.landscape {
                width: 297mm
            }

            body.A4, body.A5.landscape {
                width: 210mm;
                margin-top: 0.30in;
                margin-bottom: 0.30in;
            }

            body.A5 {
                width: 148mm
            }

            body.letter, body.legal {
                width: 216mm
            }

            body.letter.landscape {
                width: 280mm
            }

            body.legal.landscape {
                width: 357mm
            }
        }

        .center {
            text-align: center;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        td, th {
            border: 1px solid black;
        }

        td {
            display: block;
            border-bottom: none;
            border-top: none;
        }

        tr {
            border-bottom: 1px solid black;
        }

        h1, h2, h3, h4, h5 {
            margin-top: 0.10em;
            margin-bottom: 0.10em;
        }

        .row {
            display: inline-flex;
        }

        .basic-info {
            margin: 0em 3em 0em 3em;
            line-height: 0.25in;
        }

        .history-tbl {
            width: 33.3333%;
        }

        .inv-tbl {
            width: 33.3333%;
        }

        .plan-tbl {
            width: 33.3333%;
        }

        table {
            margin: -1px;
        }

/*        .consent {
            background-image: url(<?php echo base_url('assets/dist/img/chart.png'); ?>);
            height: 330px;
            background-size: contain;
            background-repeat: no-repeat;
        }*/

        td {
            font-size: 14px;
            padding: 2px 0px 0px 5px;
        }

        tr.content {
            height: 3.4in;

        }

        .border > td {
            border: none;
        }

        .border {
            border: 1px solid black;
        }

        .no-border > td {
            border: none;
        }

        .no-border-sides {
            border-left: none;
            border-right: none;
        }

        .data-label {
            text-decoration: underline;
        }


    </style>
</head>
<body class="A4 ">
<section class="sheet padding-10mm">
  <?php if (!empty($patient_list)) {
        foreach ($patient_list as $p_key) {
        }
    } ?>
    <div class="header center">
        <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
             style="position: absolute; top: 0.2in; left: 0.79in; height: 100px">
        <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
        <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . ""  . '</label>' . '</div>' ; ?>
        <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
        <h4 style="margin-top: 0 !important;">ADMISSION SHEET</h4>
        <br>
    </div>
    <div class="basic-info">
        <div class="row">
            <div>
                <label>MR No.</label>
                <label class="data-label">
                    <?php
                    $iterator1 = 5;
                    for ($j = 0; $j <= $iterator1; $j++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['regNo'];
                    $iterator1 = 5;
                    for ($j = 0; $j <= $iterator1; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>           
            <div>
                <label>Emergency/OPD No.</label>
                <label class="data-label">
                    <?php
                    $iterator1 = 5;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['emergency_no'];
                    $iterator2 = 5;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
            <div>
                <label>Admission No.</label>
                <label class="data-label">
                    <?php
                    $iterator1 = 5;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['admi_no'];
                    $iterator2 = 5;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
        <br /> 
        </div>
        <div class="row">           
            <div>
                <label>Admitted Through</label>
                <label class="data-label">
                    <?php
                    $count = strlen($p_key['patunit_Id']);
                    $iterator1 = 20 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['patunit_Id'];
                    $iterator2 = 20 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
            <div>
                <label>Ward Name</label>
                <label class="data-label">
                    <?php
                    $count = strlen($p_key['patward_id']);
                    $iterator1 = 5 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    $wardNo = $this->model_hms->get_ward_by_id($p_key['patward_id']); 
                    echo $wardNo->wardName;
                    $iterator2 = 5 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
            <div>
                <label>Bed No.</label>
                <label class="data-label">
                    <?php
                    $count = strlen($p_key['patbed_id']);
                    $iterator1 = 10 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['patbed_id'];
                    $iterator2 = 10 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
            
        </div>
        <br>
        <div class="row">           
            <div>
                <label>Patient Name</label>
                <label class="data-label">
                    <?php
                    $count = strlen($p_key['patName']);
                    $iterator1 = 35 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['patName'];
                    $iterator2 = 35 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>

            <div>
                <label>
                    <?php if ($p_key['patNoKType'] == "S/O") {
                        echo "S/O";
                    } elseif ($p_key['patNoKType'] == "D/O") {
                        echo "D/O";
                    } elseif ($p_key['patNoKType'] == "W/O") {
                        echo "W/O";
                    } ?></label>
                <label class="data-label">
                    <?php
                    $count = strlen($p_key['patNoK']);
                    $iterator1 = 31 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['patNoK'];
                    $iterator2 = 31 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
        </div>
        <br>
        <div class="row">
            <div>
                <label>Age & Sex</label>
                <label class="data-label">
                    <?php
                    $count = strlen($p_key['patAge']);
                    $iterator1 = 5;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    if(!empty($p_key['patAge'])){
                        echo $p_key['patAge'];
                        echo " years";
                    }
                    echo "&nbsp;";
                    if(!empty($p_key['patMonthAge'])){
                        echo $p_key['patMonthAge'];
                        echo " months";
                    }
                    echo "&nbsp;";
                    if(!empty($p_key['patDaysAge'])){
                        echo $p_key['patDaysAge'];
                        echo " days";
                    }
                    echo "&nbsp; / &nbsp;";
                    echo $p_key['patSex'];
                    $iterator2 = 5;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
            <div>
                <label>Occupation</label>
                <label class="data-label">
                    <?php
                    $count = strlen($p_key['patOccupation']);
                    $iterator1 = 25 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['patOccupation'];
                    $iterator2 = 25 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
            
            
        </div>
        <br>
        <div class="row">
            <div>
                <label>Address</label>
                <label class="data-label">
                    <?php
                    $iterator1 = 5;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['patAddress']."&nbsp;-&nbsp; ".$p_key['patcity'];
                    $iterator2 = 5;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
            <div>
                <label>Phone</label>
                <label class="data-label">
                    <?php
                    $count = strlen($p_key['patPhone']);
                    $iterator1 = 15 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['patPhone'];
                    $iterator2 = 15 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>    
        </div>
        <br>
        <div class="row">
            
            <div>
                <label>Disease</label>
                <label class="data-label">
                    <?php
                    $iterator1 = 5;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']); 
                    echo $disease->disease_name;
                    $iterator2 = 5;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div> 
            <div>
                <label>Date of Admission</label>
                <label class="data-label">
                    <?php
                    
                    $date = date(' d-m-Y', strtotime($p_key['patAdmDate']));
                    
                    $count = strlen($p_key['patAdmDate']);
                    $iterator1 = 30 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $date;
                    $iterator2 = 30 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
           <!--  <div>
                <label>Date of Birth</label>
                <label class="data-label">
                    <?php
                    $count = strlen($p_key['patDoB']);
                    $iterator1 = 20 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $p_key['patDoB'];
                    $iterator2 = 20 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div> -->
        </div>
        <br>
        <div class="row">
            <div>
                <label>Time of Admission</label>
                <label class="data-label">
                    <?php
                    $time = date('h:i a', strtotime($p_key['patAdmDate']));
                    
                    $count = strlen($p_key['patAdmDate']);
                    $iterator1 = 30 - $count;
                    for ($i = 0; $i <= $iterator1; $i++) {
                        echo "&nbsp;";
                    }
                    echo $time;
                    $iterator2 = 30 - $count;
                    for ($j = 0; $j <= $iterator2; $j++) {
                        echo "&nbsp;";
                    }
                    ?>
                </label>
            </div>
            <div>
                <label>Date of Discharge</label>
                <label>__________________</label>
            </div>
        </div>
        <br>
        <div class="row">

            <div>

                <label>Entitled</label>
                <?php if ($p_key['patEntitled'] == "Yes") { ?>
                    <label><b>(a) Yes</b></label>
                <?php } else { ?>
                    <label>(b) No</label>
                <?php } ?>

            </div>
        </div>
        <br>
        <div class="row">
            <div>
                <label><b>Outcome of the Patient</b></label>
                <label>(a) Cured</label>
                <label>(b) LAMA</label>
                <label>(c) DOR</label>
                <label>(d) Discharged</label>
                <label>(e) Referred</label>
                <label>(f) Death</label>
            </div>
        </div>
        <br>
    </div>
    <div class="" style="margin: 0em 3em 0em 4em;">
        <p >
           <h2 style="text-align:center;margin:10px 0px;"> CONSENT FOR MEDICAL / SURGICAL PROCEDURES</h2>
           
           <h3 style="text-align:center;margin:10px 0px;" >رضا مندی /آمادگی برائے میڈیکل سرجیکل طریقہ علاج</h3>
           <p dir="rtl" style="font-size:16px; font-weight: bold; line-height: 28px;"><span>(1)</span>
               میں بقائمی ہوش و حواس اجازت دیتا  
           / دیتی ہوں کہ میں / میرا مریض<td><span style="text-decoration:underline;font-size:18px; font-weight: bold; padding: 3px 10px;"><?php echo $p_key['patName']; ?></span></td> ولد<span style="text-decoration:underline;font-size:18px; font-weight: bold; padding: 3px 10px;"><?php echo $p_key['patNoK']; ?></span><br /> قومی شناختی <span style="text-decoration:underline;font-size:18px; font-weight: bold; padding: 3px 10px; " dir="ltr"><?php echo $p_key['patCNIC']; ?></span>ــ کارڈ نمبر کا معائینہ / علاج <span style="text-decoration:underline;font-size:18px; font-weight: bold; padding: 3px 10px;"><?php echo $p_key['patward_id']; ?></span>     موجودہ یونٹ وارڈ کروانے لئے رضامند ہوں۔
<br /><span>(2)</span>
میرا /میرے مریض کے طریقہ علاج کا جو بھی طریقہ مناسب سمجھا جائے گا مجھے اس پر کوئی اعتراض نہ ہوگا ۔
<br /><span>(3)</span>
علاج /Procedures کے دوران اور اس کے بعد کے تمام ممکن فوائد اور خطرات مجھے / میرے مریض کو سمجھا دئیے گئے ہیں اور ہر قسم کے نتائج کی ذمہ داری قبول کرتا /کرتی ہوں۔علاج انشاء اللہ کوالیفائیڈ عملہ کرے گا تاہم نتائج / کامیابی کے متعلق کسی قسم کی گارنٹی نہیں دی جاسکتی ۔اس سلسلہ میں بعد ازاں میرا کوئی اعتراض احتجاج / ناجائز اور ناقابل قبول ہوگا۔مورخہ ـــــــــــــــــــــــ


<br />دستخط مریض   <span style="text-decoration:underline;font-size:18px; font-weight: bold; padding: 3px 10px; " dir="ltr"><?php echo $p_key['patName']; ?></span>
قومی شناختی کارڈ نمبر <span style="text-decoration:underline;font-size:18px; font-weight: bold; padding: 3px 10px; " dir="ltr"><?php echo $p_key['patCNIC']; ?></span>	نشان انگھوٹاـــــــــــــــــــــــــــ 
<br /><br />
دستخط رشتہ دار مریض  <span style="text-decoration:underline;font-size:18px; font-weight: bold; padding: 3px 10px; " dir="ltr"><?php echo $p_key['garName']; ?></span>
قومی شناختی کارڈ نمبر <span style="text-decoration:underline;font-size:18px; font-weight: bold; padding: 3px 10px; " dir="ltr"><?php echo $p_key['garCnic']; ?></span>	نشان انگھوٹاــــــــــــــــــــــ 	<br />
 مریض سے رشتہ <span style="text-decoration:underline;font-size:18px; font-weight: bold; padding: 3px 10px;"><?php echo $p_key['garRelation']; ?></span>			


           </p>

        </p>
        
<!--            
        <label style="position: relative;top: 64px;left: 240px;"><?php echo $p_key['patName']; ?></label>
        <label style="position: relative;top: 64px;left: 10px;"><?php echo $p_key['patNoK']; ?></label>
        <label style="position: relative; top: 90px; right: 266px; float: right;"><?php echo $p_key['patCNIC']; ?></label>
        <label style="position: relative;top: 90px;right: 400px;float: right;"><?php echo $p_key['patward_id']; ?></label>
        <label style="position: relative; top: 300px; right: 130px; float: right;"><?php echo $p_key['patCNIC']; ?></label>-->
    </div>
   
    <div style="display: -webkit-box;margin: 0em 3em 0em 4em;">
        <table class="history-tbl">
            <tr>
                <th>Brief History</th>
            </tr>
            <tr class="content border">
                <td>
                <?php
                if (!empty($patient_chart)) {
                    $i = 1;
                    $counter = 1;
                    foreach ($patient_chart as $index => $c_key) {
                        
                        if (!empty($c_key['patHistory'])) {
                            ?>
                            
                                <?php
                                echo $i . ". &nbsp;" . $c_key['patHistory']. "<br />";
                                $i++;
                                ?>
                            

                            <?php
                        }
                       
                        $counter++;
                    }

                }
                ?>
                </td>
                <div style="page-break-after: always !important;"></div>
            </tr>
        </table>
        <table class="inv-tbl">
            <tr>
                <th class="no-border-sides">Investigation Plan</th>
            </tr>
            <tr class="content no-border">
                <td>
                <?php
                if (!empty($patient_chart)) {
                    $i = 1;
                    foreach ($patient_chart as $c_key) {
                        if (!empty($c_key['patInvestigation']) && $i <= 15) {
                            ?>
                            <?php echo $i . ". &nbsp;" . $c_key['patInvestigation'] . "<br />";
                                $i++; ?>

                            <?php
                        }
                    }
                }
                ?>
                </td>
            </tr>
        </table>
        <table class="plan-tbl">
            <tr>
                <th>Treatment Plan</th>
            </tr>
            <tr class="content border">
                <td>
                    <?php
                    if (!empty($patient_chart)) {
                        $i = 1;
                        foreach ($patient_chart as $c_key) {
                            if (!empty($c_key['patTreatPlan'])) {
                                ?>
                                <?php echo $i . ". &nbsp;" . $c_key['patTreatPlan']. "<br />";
                                    $i++; ?>

                                <?php
                            }
                        }
                    }
                    ?>
                </td>
            </tr>
        </table>
    </div>

</section>
 <script type="text/javascript">
      window.onload = function() { window.print(); }
    </script> 
<div class="pagebreak"> </div>
</body>
</html>