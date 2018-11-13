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
        <title>Print post operative instruction | <?php echo SITE_TITLE_TEXT; ?></title>
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
               
                line-height: 25px;
            }
            .row {
                display: inline-flex;
                width:100%;
                margin:10px 0px;
            }   
            .data-label {
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
                padding: 25px 10px;
                font-weight:bold;
                width: 33%;
            }
            .tb .th{
                width:15%;
            }
        </style>
    </head>
    <body class="A4">
        <section class="sheet padding-10mm">
            <?php
            if($post_operative_instructions){
               
                    ?>
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
            <div style="display: -webkit-box;margin: 0 auto;">
                <div class="basic-info">
                    <ol>
                        <div>
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
                        <div style="margin-top:5%;margin-bottom:5%;">
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
                        <div style="margin-top:5%;">
                        <li class="label"><label class="label">(To be filled in by Scrub Nurse)</label><br /></li>
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
                    </ol>
                </div>
            </div>
                <?php
                }?>
        </section>
<!--        <script type="text/javascript">
            window.onload = function () {
                window.print();
            }
        </script>-->
    </body>
</html>