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
        <title>Print Post OP | <?php echo SITE_TITLE_TEXT; ?></title>
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
            .sheet.padding-5mm {
                padding: 5mm
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

            h1, h2, h3, h4, h5 {
                margin-top: 0.10em;
                margin-bottom: 0.10em;
            }
            .basic-info {
                margin: 0em 2em 0em 2em;
            }
            .row {
                display: inline-flex;
                width:100%;
                margin:10px 0px;
            }   
            .data-label {
                
                font-size: 17px;
            }
            .cell1{
                width: 50%;
                float: left;
            }
            .td{
                margin: 10px 5px;
                border-bottom:1px solid #ccc;
            }
            .label{
                font-weight: bold;
            }
            .cell3{
                width:30%;
                float:left;
            }
            .cell4{
                width:40%;
                float: left;
            }
            .cell5{
                width:20%;
                float:left;
            }
            .cell6{
                width:15%;
                float: left;
            }
            .bre{    word-break: break-all;}
        </style>
    </head>
    <body class="A4">
        <section class="sheet padding-5mm">
            <?php
            if (!empty($pat_list)) {
                foreach ($pat_list as $lis) {
                    foreach ($postop as $op) {
                        ?>
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
                        <div style="display: -webkit-box;margin: 0 auto;">
                            <div class="basic-info">
                                <div class="row">
                                    <div class="cell4">
                                        <div class="td">
                                            <label class="label">Pt. Name:</label>
                                            <label class="data-label">
                                                <?php
                                                echo $op['patName'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell5">
                                        <div class = "td">
                                            <label class="label">Reg #:</label>
                                            <label class = "data-label">
                                                <?php
                                                echo $op['regNo'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell6">
                                        <div class="td">
                                            <label class="label">Bed #:</label>
                                            <label class="data-label">
                                                <?php
                                                echo $op['patbed_id'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell3">
                                        <div class="td">
                                            <label class="label">Age:</label>
                                            <label class="data-label">
                                                <?php
                                                if (!empty($op['patAge'])) {
                                                    echo $op['patAge'];
                                                    echo " years";
                                                }
                                                echo "&nbsp;";
                                                if (!empty($op['patMonthAge'])) {
                                                    echo $op['patMonthAge'];
                                                    echo " months";
                                                }
                                                echo "&nbsp;";
                                                if (!empty($op['patDaysAge'])) {
                                                    echo $op['patDaysAge'];
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
                                                echo $op['patSex'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell3">
                                        <div class="td">
                                            <label class="label">Admission date:</label>
                                            <label class="data-label">
                                                <?php
                                                $date = $op['patAdmDate'];
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
                                            echo $op['patAddress'] . "&nbsp;&nbsp;" . $op['patcity'];
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
                                            <label class="label">Date:</label>
                                            <label class="data-label">
                                                <?php
                                                echo $lis['otBookingDate'];
                                                ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="cell5">
                                        <div class="td">
                                            <label class="label">Time:</label>
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
            }
            ?>
        </section>
        <script type="text/javascript">
            window.onload = function () {
                window.print();
            }
        </script>   
    </body>
</html>