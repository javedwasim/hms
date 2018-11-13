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
    <title>Blood Sugar Profile | <?php echo SITE_TITLE_TEXT; ?></title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;width:90%;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 15px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-size:14px;font-weight:bold;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-yw4l{vertical-align:top;  text-align: center; width: 2%;}



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

        
</style>
</head>
<body class="A4 " >
    <section class="sheet padding-10mm">
        <div class="header center">
        <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>"
             style="position: absolute; top: 0.2in; left: 0.79in; height: 100px">
        <h1>BAHAWAL VICTORIA HOSPITAL BAHAWALPUR</h1>
        <?php echo '<div style="position: absolute; top: 0.3in; right: 0.79in; display: grid;" >' . $qr . '<label>' . ""  . '</label>' . '</div>' ; ?>
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
                 <?php foreach($sugar_list as $v){
                    $date = date('d-m-Y',strtotime($v['bs_date']));
                ?>
             <tr>
               <td class="tg-yw4l"><?php  echo $date; ?></td>
               <td class="tg-yw4l"><?php  echo $v['bs_bsf']; ?></td>
               <td class="tg-yw4l"><?php echo $v['bs_hrbsf']; ?></td>
               <td class="tg-yw4l"><?php  echo $v['bs_pre_lunch']; ?></td>
               <td class="tg-yw4l"><?php  echo $v['bs_post_lunch']; ?></td>
               <td class="tg-yw4l"><?php  echo $v['bs_pre_dinner']; ?></td>
               <td class="tg-yw4l"><?php  echo $v['bs_post_dinner']; ?></td>
             </tr>
            <?php } ?>
             </tbody>
            
        </table>
    </section>
    <script type="text/javascript">
      window.onload = function() { window.print(); }
    </script>
</body>
</html>
