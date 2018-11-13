<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';


?>
<html>
<head>
    <title>Invoice | <?php echo SITE_TITLE_TEXT; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/dist/css/print-invoice-custom.css'); ?>">

</head>
<body>
<div class="main-page">
    <div class="invoice-page">
        <div class="invoice">
            <div class="invoice-header">
                <img src="<?php echo base_url('assets/dist/img/logo.png'); ?>" class="invoice-logo">
                <div class="invoice-header-text">
                    <h2>Department of Neurosugery & NICU</h2>
                    <label>Bahawal Victoria Hospital, Bahawalpur, Pakistan</label>
                    <label>Phone: (062) 27878888</label>
                </div>
                <br>
               <!-- <label class="invoice-tag">Office Copy</label> -->
            </div>
            <div class="invoice-body">
                <div>
                    <ul>
                        <li class="heading-left">Prescription No:</li>
                        <li class="heading-left-data"><?php echo $prescription->rxNo; ?></li>

                        <li class="heading-right">Prescription Date:</li>
                        <li class="heading-right-data"><?php echo $prescription->rxDate . " " . $prescription->rxTime; ?></li>

                        <li class="heading-left">Patient MR#:</li>
                        <li class="heading-left-data"><?php echo $patient_list->regNo; ?></li>

                        <li class="heading-right">&nbsp;&nbsp;&nbsp;</li>
                        <li class="heading-right-data">&nbsp;&nbsp;&nbsp;</li>

                        <li class="heading-left">Patient Name:</li>
                        <li class="heading-left-data"><?php echo $patient_list->patName . "&nbsp; ". $patient_list->patNoKType . "&nbsp; " . $patient_list->patNoK; ?></li>

                        <li class="heading-right">Age/Sex:</li>
                        <li class="heading-right-data"><?php echo $patient_list->patAge . " / ". $patient_list->patSex; ?></li>

                        <li class="heading-left">CNIC:</li>
                        <li class="heading-left-data"><?php echo $patient_list->patCNIC; ?></li>

                        <li class="heading-right">Contact No:</li>
                        <li class="heading-right-data"><?php echo $patient_list->patPhone; ?></li>

                        <li class="heading-left">Admission Date:</li>
                        <li class="heading-left-data"><?php echo $patient_list->patAdmDate; ?></li>

                        <li class="heading-right">&nbsp; </li>
                        <li class="heading-right-data"> &nbsp;</li>

                        <li class="heading-left">Room/Ward:</li>
                        <?php $ward_list = $this->model_hms->get_ward_by_id($patient_list->patward_id); ?>
                        <li class="heading-left-data"><?php echo  $ward_list->wardName; ?></li>

                        <li class="heading-right">Room/Bed No:</li>
                        <?php $bed_list = $this->model_hms->get_bed_by_id($patient_list->patbed_id); ?>
                        <li class="heading-right-data"><?php echo $bed_list->bedNo; ?></li>
                        <br>
                        <li style="width:99%; float: left; text-align: left; font-weight: 600; font-family: 'Source Sans Pro', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif; font-size: 15px; margin-top: 8px; ">Patient Prescription</li></ul>
                </div>
                <br>
                <div class="invoice-detail">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th style="text-align: center;">Sr No</th>
                            <th style="text-align: center;">Product Name</th>
                            <th style="text-align: center;">Product Mg</th>
                            <th style="text-align: center;">Qty</th>
                            <th style="text-align: center;">Unit Price</th>
                            <th style="text-align: center;">Total Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php $srNo = 1;
                            foreach ($prescription_des as $pdes_key){ ?>
                            <tr>
                                <td style="text-align: center;"><?php echo $srNo; ?></td>
                                <td><?php echo $pdes_key['productName']; ?></td>
                                <td><?php echo $pdes_key['productMg']; ?></td>
                                <td style="text-align: center;"><?php echo $pdes_key['productSaleQty']; ?></td>
                                <td style="text-align: right;"><?php echo $pdes_key['productSalePrice']; ?></td>
                                <td style="text-align: right;"><?php echo $pdes_key['productTotalAmount']; ?></td>
                            </tr>
                            <?php  } ?>
                        </tbody>
                    </table>
                </div>
                <div class="invoice-footer table-responsive">
                    <table class="table  table-bordered">
                        <tbody>
                        <tr>
                            <th style="width:50%">Subtotal:</th>
                            <td style="font-weight: 500; text-align: right;"> <?php echo $prescription->subTotal; ?></td>
                        </tr>
                        <tr>
                            <th>Discount:</th>
                            <td style="text-align: right;"> <?php echo $prescription->discount; ?></td>
                        </tr>
                        <tr>
                            <th>Total:</th>
                            <td style="font-weight: 500; text-align: right;"> <?php echo $prescription->total; ?></td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div style="float: left; width: 98%; font-family: 'Source Sans Pro', 'Helvetica Neue', 'Helvetica', 'Arial', sans-serif; font-size: 12px; margin-top: -30px;   padding-left: 10px;">
                    <label style="float: left; font-size: 14px; font-weight: 500; width: 144px; margin-top: -30px;">
                        Signature:___________________</label></br>
                    <label style="float: left; font-weight: 400; margin-bottom:0;">Printed on: <?php  date_default_timezone_set("Asia/Karachi"); echo date('d-m-Y h:i A');  ?></label>
                </div>
            </div>
        </div>
       <!-- <i style="margin-top: 8px; float: left;" class="fa fa-scissors" aria-hidden="true"></i><div class="test" style="float: left; width: 7.7in; height: 15px; border-top: 1px dashed; margin-top: 15px;"
             id="dottedLines"></div> -->

    </div>
</div>
</body>
</html>
<script>
    setTimeout(function () {
        window.print();
    }, 4000);
</script>