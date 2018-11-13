<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';

if (isset($success) && $success == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Product has been added successfully.   </div>';
}
if (empty($products_list)) {
    header('location:' . base_url('dashboard/view_products/'));
}
?>
<html>
<head>
    <title>Edit Product | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Edit Product
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/edit_product/'); ?>"> Edit Products</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box  box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Item Info</h3>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                            class="fa fa-minus"></i></button>
                            </div>
                        </div><!-- /.box-header -->
                        <div class="box-body">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product Code</label>
                                        <input type="hidden"
                                               id="product-no" name="product-no"
                                               value="<?php echo $products_list->productNo; ?>">
                                        <input class="form-control" required="required" type="text"
                                               id="product-code" name="product-code"
                                               placeholder="Enter Product Code"
                                               value="<?php echo $products_list->productCode; ?>">
                                    </div><!-- /.form-group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-name" name="product-name"
                                               placeholder="Enter Product Name"
                                               value="<?php echo $products_list->productName; ?>">
                                    </div><!-- /.form-group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Formulation</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-formulation" name="product-formulation"
                                               placeholder="Enter Product Formulation"
                                               value="<?php echo $products_list->productFormulation; ?>">
                                    </div><!-- /.form-group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product mg</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-mg" name="product-mg" placeholder="Enter Product mg"
                                               value="<?php echo $products_list->productMg; ?>">
                                    </div><!-- /.form-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Purchase Price</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-purchase-price" name="product-purchase-price"
                                               placeholder="Enter Product Purchase Price"
                                               value="<?php echo $products_list->productPurchasePrice; ?>">
                                    </div><!-- /.form-group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Sales Price</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-sales-price" name="product-sales-price"
                                               placeholder="Enter Product Sales Price"
                                               value="<?php echo $products_list->productSalePrice; ?>">
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
                                                    <option value="<?php echo $categ_key['categNo']; ?>" <?php if ($categ_key['categNo'] == $products_list->productCategory) {
                                                        echo "selected";
                                                    } ?>><?php echo $categ_key['categName']; ?></option>
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
                                            <option value="Box" <?php if ($products_list->productUnit == "Box") {
                                                echo "selected";
                                            } ?>>Box
                                            </option>
                                            <option value="Tablet" <?php if ($products_list->productUnit == "Tablet") {
                                                echo "selected";
                                            } ?>>Tablet
                                            </option>
                                            <option value="Case" <?php if ($products_list->productUnit == "Case") {
                                                echo "selected";
                                            } ?>>Case
                                            </option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Available Qty</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-qty" name="product-qty" placeholder="Enter Product Qty"
                                               value="<?php echo $products_list->productQty; ?>">
                                    </div><!-- /.form-group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product Location</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-location" name="product-location"
                                               placeholder="Enter Product Location"
                                               value="<?php echo $products_list->productLocation; ?>">
                                    </div><!-- /.form-group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Barcode</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-barcode" name="product-barcode"
                                               placeholder="Enter Product Barcode"
                                               value="<?php echo $products_list->productBarcode; ?>">
                                    </div><!-- /.form-group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Manufacture</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-manufacture" name="product-manufacture"
                                               placeholder="Enter Product Manufacture"
                                               value="<?php echo $products_list->productManufacture; ?>">
                                    </div><!-- /.form-group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Supplier Name</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-supplier" name="product-supplier"
                                               placeholder="Enter Supplier Name"
                                               value="<?php echo $products_list->productSupplier; ?>">
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Reorder Level</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-reorder-level" name="product-reorder-level"
                                               placeholder="Enter Reorder Level"
                                               value="<?php echo $products_list->productReorderLevel; ?>">
                                    </div><!-- /.form-group -->
                                </div>
                                <div class="col-md-3 date">
                                    <div class="form-group">
                                        <label>Expire Date</label>
                                        <input class="form-control" required="required" type="text"
                                               id="product-expire-date" name="product-expire-date"
                                               placeholder="Enter Expire Date" value="<?php
                                        $dateFormat = strtotime($products_list->productExpireDate);
                                        $converter = date('d-m-Y', $dateFormat);
                                        echo $converter; ?>">
                                    </div><!-- /.form-group -->

                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Unit</label>
                                        <select class="form-control pdct-status" required="required" type="text"
                                                id="product-status" name="product-status">
                                            <option value=""></option>
                                            <option value="1" <?php if ($products_list->productStatus == "1") {
                                                echo "selected";
                                            } ?>>Active
                                            </option>
                                            <option value="0" <?php if ($products_list->productStatus == "0") {
                                                echo "selected";
                                            } ?>>Inactive
                                            </option>
                                        </select>
                                    </div><!-- /.form-group -->
                                </div>
                            </div>
                            <div class="row pull-right">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit" id="Update-product-btn"
                                                class="btn bg-blue btn-flat margin">
                                            <i
                                                    class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Update Product
                                        </button>
                                    </div>
                                </div>
                            </div>
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
