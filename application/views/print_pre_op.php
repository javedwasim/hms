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
        <title>Print Preoprative | <?php echo SITE_TITLE_TEXT; ?></title>
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
                position: relative;
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
                margin:20px 0px;
            }   
            .data-label {
                text-decoration: underline;
                font-size: 17px;
                word-wrap: break-word;
                width: 90%;
            }
            .label{
                font-weight: bold;
            }
            .heading{
                text-decoration: underline;
            }
            .cell1{
                width: 50%;
                float: left;
            }
        </style>
    </head>
    <body class="A4">
        <section class="sheet padding-10mm">
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
                        <p class="data-label"><?php
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
                        <p class="data-label"><?php
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
                            <label class="data-label"><?php
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
                            <label class="data-label"><?php
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
                        <p class="data-label"><?php
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
                        <p class="data-label"><?php
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
                            <label class="data-label"><?php
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
                            <label class="data-label"><?php
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

        <script type="text/javascript">
            window.onload = function () {
                window.print();
            }
        </script>
    </body>
</html>