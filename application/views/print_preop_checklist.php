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
        <title>Print Preoprative Check List | <?php echo SITE_TITLE_TEXT; ?></title>
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
                margin:3px 0px;
            }   
            .data-label {
                text-decoration: underline;
                font-size: 17px;
            }
            .cell1{
                width: 50%;
                float: left;
            }
            .cell2{
                width:25%;
                float: left;
            }
            .label{
                font-weight: bold;
            }
            
        </style>
    </head>
    <body class="A4">
        <section class="sheet padding-10mm">
            <?php
            $iterator = 5;
            $iterator2 = 2;
            if (!empty($pre_op_checklist)) {
                foreach ($pat_list as $lis) {
                    ?>
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
                        <div style="display: -webkit-box;margin: 0 auto;">
                            <div class="basic-info">
                                <div class="row">
                                    <div class="cell1">
                                        <div class="row">
                                            <label class="label">Name of Patient:</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $lis['patName'];
                                                for ($i = 0; $i <= $iterator; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <label class="label">Patient Age/Sex.</label>
                                            <label class="data-label">
                                                <?php
                                                for ($i = 0; $i <= $iterator; $i++) {
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
                                                for ($j = 0; $j <= $iterator; $j++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                            </label>
                                        </div>
                                        <div class="row">
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
                                        <div class="row">
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
                                    <div class="cell1">
                                        <div class="row">
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
                                        <div class="row">
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
                                        <div class="row">
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
                                <div class="row">
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
                                <div class="row">
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
                                <div class="row">
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
                                <div class="row">
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
                                <hr />
                                <h2 style="border-bottom:1px solid #000;width:30%;">Special Investigations</h2>
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
                                <hr />
                                <label class="label" >1. Call for fitness from anesthesia accomplished</label> 
                                <label class="data-label">
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
                                </label><br />
                                <label class="label" >2. Patient Categorized according to anesthesia(ASA)</label> 
                                <label class="data-label">
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
                                </label><br />
                                <label class="label" >3.Donor of blood arrange(In case of indication)</label> 
                                <label class="data-label">
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
                                </label><br />
                                <label class="label" >4.items required for operatonal arranged</label>
                                <label class="data-label">
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
                                </label><br />
                                <label class="label" >5.Pre-Op orders carried out</label> 
                                <label class="data-label">
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
                                </label><br />
                                <label class="label" >6.Pre-Medication Given</label> 
                                <label class="data-label">
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
                                </label><br />
                                <label class="label" >7.Any Drug Allergie</label> 
                                <label class="data-label">
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
                                </label><br />
                                <label class="label" >8.Theatre Asepsis Confirmed out</label> 
                                <label class="data-label">
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
                                </label><br />

                            </div>
                        </div>
                    </div>
                    <?php
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
