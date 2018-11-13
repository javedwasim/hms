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
        <title>Print OT Consent | <?php echo SITE_TITLE_TEXT; ?></title>
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
                width: 250mm;
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
                font-size: 18px;
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
                width: 48%;
                float: left;
                margin:1%;
            }
            .cell{
                width: 48%;
                float: left;
                margin:1%;
            }
        </style>
    </head>
    <body class="A4">
        <section class="sheet padding-10mm">
            <?php
            if ($pat_list) {
                foreach ($pat_list as $lis) {
                    ?>
                    <div class="header center">
                        <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
                             style="position: absolute; top: 0.2in; left: 0.7in; height: 100px">
                        <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
                        <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . "" . '</label>' . '</div>'; ?>
                        <h3 style="margin-top: 0 !important;">DEPARTMENT OF NEUROSURGERY &amp; NICU</h3>
                        <br>

                        <h2 style="margin-top: 0 !important;font-size: 30px;">اجازت نامہ برائے آپریشن</h2>
                        <br>
                    </div>
                    <div class="basic-info">
                        <div style="border-bottom:1px solid #000; padding-bottom: 1%;">
                            <div class="cell">
                                <label class="label" >Patient Name:</label> 
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
                            <div class="cell1" >
                                <div style="float:right">
                                    <label class="label" >Registration No.:</label> 
                                    <label class="data-label">
                                        <?php
                                        $iterator1 = 10;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        echo $lis['regNo'];
                                        $iterator1 = 10;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
                                        ?>
                                    </label>
                                </div>
                            </div>
                            <label class="label" >Procedure (Mention Side where applicable)</label>
                        </div>
                        <div class="rw row">
                            <div class="cell1">
                                <p style="font-size: 30px; text-align: center;">
                                    مریض کا بیان</p><p dir="rtl" style="font-size: 22px;text-align: justify;">
                                    میں اس آپریشن کی اجازت دیتا/دیتی ہوں جو میرے مریض کے لئے تجویز کیا گیا ہے اور اس فارم میں لکھا گیا ہے۔
                                    مجھے اس آپریشن کے فوائد اور پیچدگیوں کے متعلق تفصیلابتا بتادیا گیا ہے مجھے تجویز کردا آپریشن کے علاوہ اس بیماری کے دیگر مروج و مستند طریقہ علاج ان کے فوائد و نقصانات بشمول  اپنی رضامندی کے ساتھ کوئی بھی علاج نہ کروانا متعلق تفصیلاَ آگاہ کردیا گیا ہے۔میں یہ بات سمجھتا/سمجھتی ہوں کہ دوران آپریشن بیماری کی صورتِ حال کو مدِنظر رکھتے ہوئی آپریشن کی نوعیت میں تبدیلی یا آپریشن کی تبیلی ممکن ہےجو کہ میرے/مریض کے بہترین مفاد میں کی جائے گی میں یہ بات سمجھتا/سمجھتی ہوں کہ میرا آپریشن کسی مخصوص سرجن سے کروانے کی گرانٹی نہیں دی جا سکتی البتہ جو سرجن بھی آپریشن کریگا وہ اپنے کام میں ماہر اور قابل ہوگا۔
                                    میں اس بات کا اقرار کرتا/کرتی ہوں کہ مجھے آپریشن کے تمام تفصیلات عام فہم زبان میں سمجھا دی گئی ہیں اور میں اجازت نامہ کو مکمل طور پر سمجھ گیا/گئی ہوں

                                </p>
                                <div>

                                    <div  >
                                        <label class="label" style="border-bottom:1px solid #000;">Signature of consenting Person</label>
                                    </div>
                                    <div style="margin-top:15%;">
                                        <label class="label" >Signature / Thumb Impression:</label>
                                    </div>
                                </div>
                                <div style="margin-top:10%;">
                                    <div style="margin-top:3%;">
                                        <label class="label" >Relationship with Patient:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 20;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 20;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div><br />
                                    <div style="margin-top:3%;">
                                        <label class="label" >Name:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 42;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 40;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div><br />
                                    <div style="margin-top:3%;">
                                        <label class="label" >Date:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 44;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 41;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div><br />
                                    <div style="margin-top:3%;">
                                        <label class="label" >Contact No:</label>
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 40;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 30;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div><br />
                                    <div style="margin-top:3%;">
                                        <label class="label" >Address:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 113;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 100;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div><br />
                                </div>
                            </div>
                            <div class="cell1">
                                <p style="font-size: 30px; text-align: center;">
                                    ڈاکٹر کا بیان </p><p dir="rtl" style="font-size: 22px;text-align: justify;">
                                    میں نے اوپر لکھے گئے آپریشن کے متعلق اور اس کے رشتہ داروں کو تفصیلابتا دیا ہے۔اس آپریشن کے فوائد اور عمومی طور پر پیدا ہونے والی پیچدگیاں بشمول ممکنہ خطرناک نتائج سے بھی آگاہ کردیا ہے۔
                                    میں نے اس آپریشن کے علاوہ دیگر مروج و مستند طریقہ علاج بشمول اپنی رضامندی سے کوئی بھی علاج نہ کروانا کے متعلق بھی مریض اور اس کے رشتہ داروں کو بتا دیا ہے اس آپریشن کے لئے درج ذیل طریقہ بے ہوشی استعمال کیا جائےگا۔

                                </p>
                                <div  style="margin-top:15%;">
                                    <label class="label">&nbsp;&nbsp;&nbsp;G/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;S/A&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;L/A</label>
                                </div>
                                <div style="margin-top:10%;">
                                    <div style="margin-top:2%;">
                                        <label class="label" >Signature of the Doctor:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 20;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 30;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div><br />
                                    <div style="margin-top:2%;">
                                        <label class="label" >Name:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 40;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 47;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div><br />
                                    <div style="margin-top:2%;">
                                        <label class="label" >Date:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 50;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 40;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <div style="margin-top:10%;">
                                    <div style="margin-top:2%;">
                                        <label class="label" >Witness:<br />Signature:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 40;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 40;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div><br />
                                    <div style="margin-top:2%;">
                                        <label class="label" >Name:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 43;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 45;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div><br />
                                    <div style="margin-top:2%;">
                                        <label class="label" >Date:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 50;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 41;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <div style="margin-top:10%;">
                                    <div style="margin-top:2%;">
                                        <label class="label" >Special Consent:</label> 
                                        <label class="data-label">
                                            <?php
                                            $iterator1 = 268;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }

                                            $iterator1 = 270;
                                            for ($i = 0; $i <= $iterator1; $i++) {
                                                echo "&nbsp;";
                                            }
                                            ?>
                                        </label>
                                    </div>
                                </div>
                                <div style="margin-top:10%;float:right;">
                                    <div style="margin-top:2%;"></div>
                                    <label class="label" >Signature:</label> 
                                    <label class="data-label">
                                        <?php
                                        $iterator1 = 20;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }

                                        $iterator1 = 20;
                                        for ($i = 0; $i <= $iterator1; $i++) {
                                            echo "&nbsp;";
                                        }
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
    <script type="text/javascript">
        window.onload = function () {
            window.print();
        }
    </script>
</body>
</html>