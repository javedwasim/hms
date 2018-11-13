<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
if ($this->input->get("success") == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Advance payment has been added successfully.</div>';
}
?>
<html>
<head>
    <title>Add Prescription | <?php echo SITE_TITLE_TEXT; ?></title>
    <?php $this->load->view('header'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php $this->load->view('main_header'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Issue Prescription
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/add_prescription/'); ?>"> Add Prescription</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Search Filters</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>OT Patient Name or MR#</label>
                                        <form name="search-by-name" id="search-prescription-patient-by-name"
                                              method="get"
                                              action="<?php echo base_url('dashboard/add_prescription/'); ?>">
                                            <select class="prescription-patName-select form-control"
                                                    name="search_ot_by_name"
                                                    style="width: 100%;" tabindex="4">
                                            </select>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (!empty($patient_list)) {
                foreach ($patient_list as $p_key) {
                    ?>
                    <div class="row">
                        <div class="col-md-12">
                            <?php $var = $this->model_hms->get_pat_pic($p_key['regNo']);
                            if (empty($var)) {
                                $var = $this->model_hms->get_discharged_pat_pic($p_key['regNo']);
                            } ?>
                            <div class="col-md-offset-11">
                                <img src="<?php echo base_url('assets/dist/img/patient_photo/') . $var->patient_pic_path; ?>"
                                     class="img-thumbnail">
                            </div>
                            <br>
                            <div class="box  box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Patient Information</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                    class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>MR#</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label id="reg-no" ><?php echo $p_key['regNo']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Name</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label id="pat-name"><?php echo $p_key['patName']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label id="pat-nok-type"><?php echo $p_key['patNoKType']; ?></label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label id="pat-nok"><?php echo $p_key['patNoK']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Sex</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><?php echo $p_key['patSex']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Age</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><?php echo $p_key['patAge']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Disease</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><?php $disease = $this->model_hms->get_disease_by_id($p_key['patDisease_id']);
                                                            echo $disease->disease_name; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Ward Number</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><?php $ward_list = $this->model_hms->get_ward_by_id($p_key['patward_id']);
                                                            echo $ward_list->wardName; ?></label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Bed Number</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label>
                                                            <?php
                                                            //echo $p_key['patbed_id'];
                                                            $bedNo = $this->model_hms->get_bed_name_wrt_ward($p_key['patbed_id']);
                                                            if ($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed") {
                                                                echo "Extra Bed " . $bedNo->bed;
                                                            } else {
                                                                echo $bedNo->bed;
                                                            }
                                                            ?>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Admission Date</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><?php echo $p_key['patAdmDate'] ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Addmission Status</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><?php if (isset($p_key['discharge_id'])) {
                                                                echo "Discharged";
                                                            } else {
                                                                echo "Admitted";
                                                            } ?></label>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Contact No</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><?php echo $p_key['patPhone']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <div class="col-md-6">
                                                        <label>Address</label>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label><?php echo $p_key['patAddress']; ?></label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box  box-primary">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Rx</h3>
                                    <div class="box-tools pull-right">
                                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                    class="fa fa-minus"></i></button>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Search Product</label>
                                                <select class="product-name-select-for-prescription form-control"
                                                        name="search_by_product_id"
                                                        id="search_by_product_id"
                                                        style="width: 100%;" tabindex="4">
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-xs-12 table-responsive">
                                                <table class="table dataTable no-footer table-striped bill-table">
                                                    <thead>
                                                    <tr>
                                                        <th>Sr No</th>
                                                        <th>Product Code</th>
                                                        <th>Product Name</th>
                                                        <th>Product mg</th>
                                                        <th>Quantity</th>
                                                        <th style="text-align: right;">Unit Price</th>
                                                        <th style="text-align: right;" class="sum">Total Amount</th>
                                                        <th>Action</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>

                                                    </tbody>
                                                </table>
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                        <br>
                                        <div class="row">
                                            <!-- accepted payments column -->
                                            <div class="col-xs-8 col-md-4 pull-right">
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                        <tr>
                                                            <th style="width:50%">Subtotal:</th>
                                                            <td style="text-align: right;" id="sub-total">0.00</td>
                                                        </tr>
                                                        <tr>
                                                            <th>Discount:</th>
                                                            <td style="text-align: right;"><input
                                                                        style="text-align: right;"
                                                                        type="text"
                                                                        style="width: 60%;"
                                                                        id="discount" value="0"></td>
                                                        </tr>
                                                        <tr>
                                                            <th>Total:</th>
                                                            <td style="text-align: right;" id="total">0.00</td>
                                                        </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                        <br>
                                        <div class="row pull-right">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="button" id="add-prescription-btn"
                                                            class="btn bg-blue btn-flat margin">
                                                        <i
                                                                class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add
                                                        Prescription
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
        <div class="pull-right hidden-xs">
            <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; <?php echo date("Y"); ?> <a target="_blank"
                                                             href="<?php echo SITEURL; ?>"><?php echo COMPANYNAME; ?></a>.</strong>
        All rights
        reserved.
    </footer>
    <div class="control-sidebar-bg"></div>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
