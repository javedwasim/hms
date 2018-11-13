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

            .row {
                display: inline-flex;
                width:100%;
                margin:20px 0px;
            }
            .rw{
                width:100%;
                margin:20px 0px;
                line-height: 25px;

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
                width: 49%;
                float: left;
                margin:1% 0%;
            }
            .cell{
                width: 48%;
                float: left;
                margin: 1% 0.5%;
            }
            .subfont{
                margin: 0px;
                padding: 0px;
                font-style: italic;
                font-size: 12px;
                position: relative;
                left: 30%;
            }
        </style>
    </head>
    <body class="A4 landscape">
        <section class="sheet padding-10mm">
            <?php
            if (!empty($patient_list)) {
                foreach ($patient_list as $p_key) {
                    ?>
                    <div class="header center">
                        <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
                             style="position: absolute; top: 0.2in; left: 0.79in; height: 100px">
                        <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
                        <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                        <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
                        <h4 style="margin-top: 0 !important;">Professor: Dr.Muhammad Arshad Ch.</h4>
                        <h6 style="margin-top: 0 !important;">(FCPS-Neurosurgery) Fellow of Spine Surgery (Singapore)</h6>
                        <br>
                    </div>
                    <section class="basic-info">
                        <div class="row">
                            <div style="width:60%; float: left;">
                                <div class="row">
                                    <div class="cell" >
                                        <h3 style="font-style:italic; text-decoration: underline;">Associate Professor:</h3>
                                        <p style="margin:0px; padding:0px;">Dr.Shahid Samaija</p><p class="subfont">FCPS(Nuero) FCPS (Surgery)</p>
                                        <h3 style="font-style:italic; text-decoration: underline;"> Assistant Professor:</h3> 
                                        <p style="margin:0px; padding:0px;">Senior Dr.Mumtaz Ahmad</p>
                                        <p class="subfont">FCPS(Nuero)FCPS(Surgery)</p>
                                        <h3 style="font-style:italic; text-decoration: underline;">Senior Registrar Admin:</h3>
                                        <p style="margin:0px; padding:0px;">Dr.Faisal Ali Bukhari</p>
                                        <p class="subfont">MCPS-FCPS</p>
                                        <p style="margin:0px; padding:0px;">Dr.Asad Kamran</p>
                                        <p class="subfont">(FCPS)</p>
                                        <p style="margin:0px; padding:0px;">Dr.Feroz Nawaz</p>
                                        <p class="subfont">(FCPS Nuerosurgery)</p>
                                        <p style="font-style:italic; text-decoration: underline;" >Registrar Nuero ICU</p>
                                        <p style="margin:0px; padding:0px;">Dr.M.Sajjid</p>
                                        <h3 style="font-style:italic; text-decoration: underline;">Medical officer Nuero ICU</h3>
                                        <p style="margin:0px; padding:0px;">Dr.Tahir Siddique</p>
                                        <p style="margin:0px; padding:0px;">Dr.Hassan Kamran</p>
                                    </div>
                                    <div class="cell">
                                        <h3 style="font-style:italic; text-decoration: underline;">Medical officer NSW:</h3>
                                        <p style="margin:0px; padding:0px;">Dr.Zul Qurnain</p>
                                        <p style="margin:0px; padding:0px;">Dr. Abdul Majeed</p>
                                        <p style="margin:0px; padding:0px;">Dr. Amin Abbasi</p>
                                        <p style="margin:0px; padding:0px;">Dr. Shameem Akhtar</p>
                                        <br>
                                        <h3 style="font-style:italic;text-decoration: underline;"">P.G.R(NSW)</h3>
                                        <p style="margin:0px; padding:0px;">Dr.M.Imran</p>
                                        <p style="margin:0px; padding:0px;">Dr.M.Sajjad Dasti</p>
                                        <p style="margin:0px; padding:0px;">Dr.Zeeshan Jamil</p>
                                        <p style="margin:0px; padding:0px;">Dr.Ghulam Mustafa</p>
                                        <br>
                                        <h3 style="font-style:italic; text-decoration: underline;"">House officers</h3>
                                        <p style="margin:0px; padding:0px;">Dr.Naseem , Dr.Nazim</p>
                                        <p style="margin:0px; padding:0px;">Dr.Masood , Dr.Awais</p>
                                        <p style="margin:0px; padding:0px;">Dr.Ayesha Haneef</p>
                                        <p style="margin:0px; padding:0px;">Dr.Daniyal Shabbir</p>
                                        <p style="margin:0px; padding:0px;">Dr.Sampana Fatima</p>
                                    </div>
                                </div>
                                <br>
                                <br>
                                
                            </div>
                            <div style="width:40%; float: left;">
                                <h3>POST OPERATIVE COURSE</h3>
                                <label class="label" >1.Biobpsy report:</label>
                                <label class="data-label"> </label>
                                <label class="label" >Discharge & Advice</label>
                                <label class="data-label" ><?php
                                    $iterator1 = 5;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    echo $p_key['discharge_advice']; 
                                    $iterator1 = 5;
                                    for ($i = 0; $i <= $iterator1; $i++) {
                                        echo "&nbsp;";
                                    }
                                    ?></label>
                                <div>
                                    <div style="margin-top:5%;">
                                        <label class="label" >Follow up:</label>
                                        <label class="data-label"></label>
                                    </div>
                                </div>
                                <div style="margin-top:5%;">
                                    <div style="margin-top:3%; direction:ltr">
                                        <label class="label" >(سوموار،جمعرات اور ہفتہ کو نیوروسرجری آوٹ ڈور کمرہ نمبر ۶ میں تشریف لائیں۔)Registrar</h2> -۔Neurosurgery Ward BVH, Bahawalpur</label>
                                    </div>
                                    <div style="font-size:12px">
                                        <label class="label" >NOT VALID FOR COURT</label>
                                    </div><br />
                                    <div style="margin-top:3%; font-size:12px">
                                        <label class="label" >InjVoco (1G) Cap .XIQRANT(500mg) Cap.Secure(400mg) Tab Tobital(20mg) Tab&inj Zune(40mg) Tab.Exen-D Syp.Flore Tab.Agile Forte(4mg)</label>
                                    </div><br />
                                </div>
                                
                                <div style="clear: both;">
                                    <div>
                                        <label class="label" >Name:</label>
                                        <label class="data-label"><?php echo $p_key['patName']; ?></label>
                                    </div>
                                    <div style="margin-top:1%;">
                                        <div class="cell1">
                                            <label class="label" >Age/Sex:</label>
                                            <label class="data-label"><?php echo $p_key['patAge'] . "&nbsp; / &nbsp;" . $p_key['patSex']; ?></label>
                                        </div>
                                        <div class="cell1">
                                            <label class="label">Registration No:</label>
                                            <label class="data-label"><?php echo $p_key['regNo']; ?></label>
                                        </div>
                                    </div>
                                    <br />
                                    <div style="margin-top:2%;">
                                        <label class="label" >Diagnosis:</label>
                                        <label class="data-label"></label>
                                    </div>
                                </div>
                                <div style="margin-top:2%;">
                                    <div style="margin-top:2%;">
                                        <label class="label" >Date of Admission:</label>
                                        <label class="data-label"><?php echo $date = date('d-m-Y', strtotime($p_key['patAdmDate'])); ?></label>
                                        <br />
                                        <label class="label">Date of Discharge:</label>
                                        <label class="data-label"><?php echo $date = date('d-m-Y', strtotime($p_key['discharge_date'])); ?></label>
                                    </div><br />
                                    <div style="margin-top:2%;">
                                        <label class="label" >Address:</label>
                                        <label class="data-label"><?php echo $p_key['patAddress']; ?></label>
                                    </div><br />
                                </div>
                            </div>
                        </div>
                    </section>
                </section>
                <section class="sheet padding-10mm">
                    <section class="background-back">
                        <div class="row">
                            <div class="cell1">
                                <label class="label">Brief History:</label><br>
                                <p class="data-label"><?php
                                    if (!empty($patient_chart)) { // print_r($patient_chart);
                                        foreach ($patient_chart as $c_key) {
                                            if (!empty($c_key['patHistory'])) {
                                                ?>
                                                <?php
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                echo $c_key['patHistory'] . ", ";
                                                $iterator1 = 5;
                                                for ($i = 0; $i <= $iterator1; $i++) {
                                                    echo "&nbsp;";
                                                }
                                                ?>
                                                <?php
                                            }
                                        }
                                    }
                                    ?></p>
                                <br>
                                <br>
                                <label class="label">Physical Information:</label>
                                <label class="data-label">
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
                                </label>
                            </div>

                            <div class="cell1">
                                    <label class="label">Investigation:<br></label>
                                <br>
                                1.X-Ray:__________________________________________________________<br>
                                <br>
                                2.C.T Scan:________________________________________________________<br>
                                <br>
                                3.MRI:___________________________________________________________<br>

                                <br>
                                <?php
                                foreach ($ot_details as $ot_key) {
                                    ?>
                                    <h3>Operation Notes:</h3><br>
                                    <label class="label">Date of operation:</label>
                                    <label class="data-label"><?php echo $ot_key['otBookingDate']; ?></label>
                                    <br>
                                    <label class="label">Operation:</label><br>
                                    <label class="data-label"><?php echo $ot_key['otOperationType']; ?></label>
                                    <br>
                                    <label class="label">Surgeon:</label>
                                    <label class="data-label">
            <?php
            $surgeon = $this->model_hms->get_user_name_by_id($ot_key['otSurgeon']);
            echo $surgeon->full_name;
            ?></label>
                                    <br>
                                    <label class="label">Anesthesia:</label>
                                    <label class="data-label">
            <?php echo $ot_key['otAnesthesia']; ?></label>
                                    <br>
                                    <label class="label">
                                        Operation finding/proceedure:</label>
                                    <label class="data-label"><?php echo $ot_key['otOpFindingsProc']; ?></label>
                                </div>
                            </div>
                        </section>
                    </section>
            <?php
        }
        break;
    }
}
?>
    <script type="text/javascript">
window.onload = function() { window.print(); }
</script>
    </body>
</html>