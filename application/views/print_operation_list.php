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
    <link rel="stylesheet" href="<?php echo base_url('/assets/dist/css/print-operation-list-custom.css'); ?>">
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
                <label class="heading">Operation List</label></ul>
                <div>
                    <ul>

                    </ul>
                </div>
                <div class="invoice-detail">
                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Operation Theatre</th>
                            <th>Date & Time</th>
                            <th>Procedure</th>
                            <th>Patient MR#</th>
                            <th>Patient Name</th>
                            <th>Booked By</th>
                            <th>Surgeon</th>
                            <th>Patient Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $srNo = 0;
                        foreach ($operation_list as $op_key){
                            $srNo++;?>
                            <tr>
                                <td><?php echo $srNo; ?></td>
                                <?php $otward_list = $this->model_hms->get_otward_by_id($op_key['otWardNo']); ?>
                                <td><?php echo $otward_list->otwardName; ?></td>
                                <td><?php echo $op_key['otBookingDate'] . " " . $op_key['otBookingTime']; ?></td>
                                <td><?php echo $op_key['otOperationType']; ?></td>
                                <td><?php echo $op_key['otPatNo']; ?></td>
                                <?php $patient_list = $this->model_hms->get_patirnt_name_by_id($op_key['otPatNo']); ?>
                                <td><?php echo $patient_list->patName; ?></td>
                                <?php $user_list = $this->model_hms->get_user_name_by_id($op_key['otBookedBy']); ?>
                                <td><?php echo $user_list->full_name; ?></td>
                                <?php $user_list = $this->model_hms->get_user_name_by_id($op_key['otSurgeon']); ?>
                                <td><?php echo $user_list->full_name; ?></td>
                                <td id="status"><?php echo $op_key['otPatientStatus']; ?></td>
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