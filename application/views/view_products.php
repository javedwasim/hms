<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';

if (empty($expense_list) && isset($expense_list)) {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-error alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-ban"></i> Error!</h4>No expense found in this date range.   </div>';
}
if (isset($update_success) && $update_success == "true") {
    echo '<div style="position: fixed;top: 60px;right: 20px; z-index: 1030;" class="alert alert-success alert-dismissible"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button><h4><i class="icon fa fa-check"></i> Success!</h4>Expense has been updated successfully.   </div>';
}
?>
<html>
<head>
    <title>Medicine List | <?php echo SITE_TITLE_TEXT; ?></title>
    <?php $this->load->view('header'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">
    <?php $this->load->view('main_header'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Medicine List
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/view_products/'); ?>"> Medicine List</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="row pull-right">
                <div class="col-md-12">
                    <div class="form-group">
                        <a href="<?php echo base_url('dashboard/add_product/'); ?>" >
                            <button type="button"
                                    class="btn bg-blue btn-flat margin">
                                <i
                                        class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add Product
                            </button>
                        </a>
                    </div>
                </div>
            </div>
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
                                        <label>Product Code</label>
                                        <form name="search-by-name" id="search-product-by-code" method="get"
                                              action="">
                                            <select class="product-code-select form-control" name="search_by_product_id"
                                                    style="width: 100%;" tabindex="4">
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Product Name</label>
                                        <form name="search-by-name" id="search-product-by-name" method="get"
                                              action="">
                                            <select class="product-name-select form-control" name="search_by_product_id"
                                                    style="width: 100%;" tabindex="4">
                                            </select>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Category</label>
                                        <form name="search-by-name" id="search-product-by-categ" method="get"
                                              action="">
                                            <select class="product-categ-select form-control"
                                                    name="search_by_product_categ"
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
            <?php if (isset($products_list)) { ?>

                <div class="row" id="products-list">
                    <div class="col-md-12">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Product List</h3>
                                <div class="box-tools pull-right">
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                                class="fa fa-minus"></i></button>
                                </div>
                            </div><!-- /.box-header -->
                            <div class="box-body">
                                <div id="example2_wrapper"
                                     class="dataTables_wrapper form-inline dt-bootstrap">
                                    <div class="row">
                                        <div class="col-sm-6"></div>
                                        <div class="col-sm-6"></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12" style="overflow-y: auto;">
                                            <table id="view-ot-table-1"
                                                   class="table table-bordered table-hover dataTable"
                                                   role="grid" aria-describedby="example2_info">
                                                <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        Sr. No
                                                    </th>
                                                    <th class="sorting_asc" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending">
                                                        Product Code
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Product Description
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Formulation
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Product mg
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Product Price
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Sale Price
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Category
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Supplier
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Unit
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Product Status
                                                    </th>
                                                    <th class="sorting" tabindex="0"
                                                        aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Actions
                                                    </th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                <?php if (!empty($products_list)) {
                                                    $srNo = 0;
                                                    foreach ($products_list as $pro_key) {
                                                        $srNo++; ?>
                                                        <tr role="row" class="odd">
                                                            <td><?php echo $srNo; ?>
                                                                <input type="hidden" id="product-id"
                                                                       value="<?php echo $pro_key['productNo']; ?>">

                                                            </td>
                                                            <td><?php echo $pro_key['productCode']; ?></td>
                                                            <td><?php echo $pro_key['productName']; ?></td>
                                                            <td><?php echo $pro_key['productFormulation']; ?></td>
                                                            <td><?php echo $pro_key['productMg']; ?></td>
                                                            <td><?php echo $pro_key['productPurchasePrice']; ?></td>
                                                            <td><?php echo $pro_key['productSalePrice']; ?></td>
                                                            <?php $category_list = $this->model_hms->get_product_category_by_id($pro_key['productCategory']); ?>
                                                            <td><?php echo $category_list->categName; ?></td>
                                                            <td><?php echo $pro_key['productSupplier']; ?></td>
                                                            <td><?php echo $pro_key['productUnit']; ?></td>
                                                            <td><?php if ($pro_key['productStatus'] == "1") {
                                                                    echo "Active";
                                                                } else {
                                                                    echo "Inactive";
                                                                } ?></td>
                                                            <td style="display: flex;">
                                                                <a class="exp-update-btn"
                                                                   data-toggle="modal"
                                                                   href="<?php echo base_url('dashboard/edit_product/') . "?product_no=" . $pro_key['productNo']; ?>">
                                                                    <button type="button"
                                                                            class="btn btn-default ">
                                                                        <i
                                                                                class="fa fa-pencil-square-o"
                                                                                aria-hidden="true"></i>
                                                                    </button>
                                                                </a>&nbsp;
                                                                <button type="button"
                                                                        class="btn btn-default product-delete-submit-btn">
                                                                    <i class="fa fa-ban"
                                                                       aria-hidden="true"></i>
                                                                </button>&nbsp;
                                                                <input type="hidden" id="product-ava-qty"
                                                                       value="<?php echo $pro_key['productQty']; ?>">
                                                                <button type="button"
                                                                        class="btn btn-default product-purchase-btn">
                                                                    <i class="fa fa-plus"
                                                                       aria-hidden="true"></i>
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    <?php }
                                                } ?>
                                                </tbody>
                                                <tfoot>

                                                </tfoot>
                                            </table>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-sm-7">
                                            <div class="dataTables_info" id="example2_info"
                                                 role="status"
                                                 aria-live="polite">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <div class="modal fade" tabindex="-1" role="dialog" id="product-delete-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Confirmation Message</h4>
                        </div>
                        <div class="modal-body">
                            <p>Do you want to delete the product?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-default nodelete-product-row">No</button>
                            <button type="button" class="btn bg-blue delete-product-row">Yes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
            <div class="modal fade" tabindex="-1" role="dialog" id="product-purchase-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Enter the New Purchase Quantity.</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Purchase Quantity</label>
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input class="form-control" id="purchase-qty"
                                                   name="purchase-qty"
                                                   style="width: 100%;" placeholder="Enter the Quantity here"
                                                   required="required">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-default nopurchase-product-row">Cancel</button>
                            <button type="button" class="btn bg-blue purchase-product-row">Save</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
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
