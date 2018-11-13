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
        <title>Print Pre Order | <?php echo SITE_TITLE_TEXT; ?></title>
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
                text-decoration: underline;
                font-size: 17px;
            }
            .cell1{
                width: 50%;
                float: left;
            }
            .td{
                margin: 20px 5px;
            }
            .label{
                font-weight: bold;
            }
            .tb{
                width: 100%;
                margin: 10px 0px;
                border-collapse: collapse;
            }
            .tb td{
                border: 1px solid #000;
                padding: 5px;
                font-weight:bold;
                width: 33%;
            }
        </style>
    </head>
    <body class="A4">
        <section class="sheet padding-10mm">
            <?php
            if (!empty($pre_op_order)) {
                foreach ($pre_op_order as $op) {
                    foreach ($pat_list as $lis) {
                        ?>
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
                            <div style="display: -webkit-box;margin: 0 auto;">
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

                                    <div class="row">
                                        <div class="cell1">
                                            <div class="row">
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
                                            <div class="row">
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
                                            <div class="row">
                                                <label class="label">Patient Name:</label>
                                                <label class="data-label">
                                                    <?php
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    echo $lis['patName'];
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="label">Father's Name:</label>
                                                <label class="data-label">
                                                    <?php
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    echo $lis['patNoK'];
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                        </div>
                                        <div class="cell1">
                                            <div class="row">
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
                                            <div class="row">
                                                <label class="label">Bed No:</label>
                                                <label class="data-label">
                                                    <?php
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }

                                                    echo $lis['patbed_id'];
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    ?>     
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class="label">Age & Sex:</label>
                                                <label class="data-label">
                                                    <?php
                                                    $count = strlen($lis['patAge']);
                                                    $iterator1 = 5;
                                                    for ($i = 0; $i <= $iterator1; $i++) {
                                                        echo "&nbsp;";
                                                    }
                                                    if (!empty($lis['patAge'])) {
                                                        echo $lis['patAge'];
                                                        echo " years";
                                                    }
                                                    echo "&nbsp;";
                                                    if (!empty($lis['patMonthAge'])) {
                                                        echo $lis['patMonthAge'];
                                                        echo " months";
                                                    }
                                                    echo "&nbsp;";
                                                    if (!empty($lis['patDaysAge'])) {
                                                        echo $lis['patDaysAge'];
                                                        echo " days";
                                                    }
                                                    echo "&nbsp; / &nbsp;";
                                                    echo $lis['patSex'];
                                                    $iterator2 = 5;
                                                    for ($j = 0; $j <= $iterator2; $j++) {
                                                        echo "&nbsp;";
                                                    }
                                                    ?>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <label class="label">Marks of identifcation:</label> 
                                    </div>
                                    <div class="row" style="margin-left:20%;">
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
                                    <div class="row" style="margin-left:20%;">
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
                                                    <label class="label">Give Bath</label>
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
                                                    <label class="label">Provide Hospital Dress</label>
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
                                                    <label class="label">N.P.O Form</label>
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
                                                    <label class="label">Mark Operation Site</label>
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
                                                    <label class="label">Shave & prepare the area</label>
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
                                                    <label class="label">Arrange<label class="data-label">
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
                                                        </label>Pints of Blood</label>

                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>Send following investigation to the operation theater</label>
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
                        <?php
                        
                    }
                break;}
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