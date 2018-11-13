<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Patient Expense | <?php echo SITE_TITLE_TEXT; ?></title>
    <link rel="stylesheet" href="<?php echo base_url('/assets/bower_components/bootstrap/dist/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/font-awesome/css/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('/assets/dist/css/print-hospital-expense-custom.css'); ?>">
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
            </div>
            <div class="invoice-body">
                <label class="heading">Hospital Expenditure</label></ul>
                <div>
                    <ul>
                        <li class="date-range">From: <?php echo $fdate; ?>&nbsp;&nbsp;To: <?php echo $tdate; ?></li>
                    </ul>
                </div>
                <div class="invoice-detail">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Expense Category</th>
                            <th>Date & Time</th>
                            <th>Description</th>
                            <th>Total Amount</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $srNo = 0;
                        foreach ($expense_list as $e_key){
                            $srNo++;?>
                            <tr>
                                <td> <?php echo $srNo; ?></td>
                                <?php  $category_list = $this->model_hms->get_expense_category_id($e_key['expCategNo']); ?>
                                <td> <?php echo $category_list->categoryName; ?></td>
                                <td> <?php echo $e_key['expDateString'] . " ". $e_key['expTimeString']; ?></td>
                                <td> <?php echo $e_key['expDescription']; ?></td>
                                <td> <?php echo $e_key['expAmount']; ?></td>
                            </tr>
                        <?php  } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
<script>
    setTimeout(function () {
        window.print();
    }, 4000);
</script>