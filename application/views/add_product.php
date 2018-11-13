<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';

if (isset($success) && $success == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Product has been added successfully.   </div>';
}
?>
<html>
<head>
    <title>Add Product | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Add Product
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/add_product/'); ?>"> Add Products</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">New Item Info</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <form action="<?php echo base_url('dashboard/insert_product_db'); ?>" method="post"
                                  enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Product Code</label>
                                            <input class="form-control" required="required" type="text"
                                                   id="product-code" name="product-code"
                                                   placeholder="Enter Product Code">
                                        </div><!-- /.form-group -->

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Product Name</label>
                                            <input class="form-control" required="required" type="text"
                                                   id="product-name" name="product-name"
                                                   placeholder="Enter Product Name">
                                        </div><!-- /.form-group -->

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Formulation</label>
                                            <input class="form-control" required="required" type="text"
                                                   id="product-formulation" name="product-formulation"
                                                   placeholder="Enter Product Formulation">
                                        </div><!-- /.form-group -->

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Product mg</label>
                                            <input class="form-control" type="text"
                                                   id="product-mg" name="product-mg" placeholder="Enter Product mg">
                                        </div><!-- /.form-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Purchase Price</label>
                                            <input class="form-control" required="required" type="text"
                                                   id="product-purchase-price" name="product-purchase-price"
                                                   placeholder="Enter Product Purchase Price">
                                        </div><!-- /.form-group -->

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Sales Price</label>
                                            <input class="form-control" required="required" type="text"
                                                   id="product-sales-price" name="product-sales-price"
                                                   placeholder="Enter Product Sales Price">
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Category</label>
                                            <select class="form-control pdct-category" required="required" type="text"
                                                    id="product-category" name="product-category">
                                                <option></option>
                                                <?php if (!empty($product_categ_list)) {
                                                    foreach ($product_categ_list as $categ_key) { ?>
                                                        <option value="<?php echo $categ_key['categNo']; ?>"><?php echo $categ_key['categName']; ?></option>
                                                    <?php }
                                                } ?>
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Unit</label>
                                            <select class="form-control pdct-unit" required="required" type="text"
                                                    id="product-unit" name="product-unit">
                                                <option value=""></option>
                                                <option value="Box">Box</option>
                                                <option value="Tablet">Tablet</option>
                                                <option value="Case">Case</option>
                                            </select>
                                        </div><!-- /.form-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Available Qty</label>
                                            <input class="form-control" required="required" type="text"
                                                   id="product-qty" name="product-qty" placeholder="Enter Product Qty">
                                        </div><!-- /.form-group -->

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Product Location</label>
                                            <input class="form-control" type="text"
                                                   id="product-location" name="product-location"
                                                   placeholder="Enter Product Location">
                                        </div><!-- /.form-group -->

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Barcode</label>
                                            <input class="form-control" type="text"
                                                   id="product-barcode" name="product-barcode"
                                                   placeholder="Enter Product Barcode">
                                        </div><!-- /.form-group -->

                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Manufacture</label>
                                            <input class="form-control" type="text"
                                                   id="product-manufacture" name="product-manufacture"
                                                   placeholder="Enter Product Manufacture">
                                        </div><!-- /.form-group -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Supplier Name</label>
                                            <input class="form-control" type="text"
                                                   id="product-supplier" name="product-supplier"
                                                   placeholder="Enter Supplier Name">
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Reorder Level</label>
                                            <input class="form-control" required="required" type="text"
                                                   id="product-reorder-level" name="product-reorder-level"
                                                   placeholder="Enter Reorder Level">
                                        </div><!-- /.form-group -->
                                    </div>
                                    <div class="col-md-3 date">
                                        <div class="form-group">
                                            <label>Expire Date</label>
                                            <input class="form-control" required="required" type="text"
                                                   id="product-expire-date" name="product-expire-date"
                                                   placeholder="Enter Expire Date">
                                        </div><!-- /.form-group -->

                                    </div>
                                </div>
                                <div class="row pull-right">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="submit" id="add-product-btn"
                                                    class="btn bg-blue btn-flat margin">
                                                <i
                                                        class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Product
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
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
