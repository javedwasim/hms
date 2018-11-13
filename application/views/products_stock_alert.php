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
    <title>Products Stock Alert | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Products Stock Alert
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/products_stock_alert/'); ?>"> Products Stock Alert</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
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
                                                        Available Qty
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
                                                        if ($pro_key['productQty'] <= $pro_key['productReorderLevel']) {
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
                                                                <?php $category_list = $this->model_hms->get_product_category_by_id($pro_key['productCategory']); ?>
                                                                <td><?php echo $category_list->categName; ?></td>
                                                                <td><?php echo $pro_key['productSupplier']; ?></td>
                                                                <td><?php echo $pro_key['productQty']; ?></td>
                                                                <td id="product-status"><?php if ($pro_key['productOrderStatus'] == "1") {
                                                                        echo "Ordered";
                                                                    } else {
                                                                        echo "Unordered";
                                                                    } ?></td>
                                                                <td style="display: flex;">

                                                                        <button type="button"
                                                                                class="btn btn-default order-btn ">
                                                                            <i
                                                                                    class="fa fa-check-square-o"
                                                                                    aria-hidden="true"></i>
                                                                        </button>&nbsp;
                                                                    <button type="button"
                                                                            class="btn btn-default dismiss-btn">
                                                                        <i class="fa fa-ban"
                                                                           aria-hidden="true"></i>
                                                                    </button>
                                                                </td>
                                                            </tr>
                                                        <?php }
                                                    }
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

            <div class="modal fade" tabindex="-1" role="dialog" id="product-order-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Confirmation Message</h4>
                        </div>
                        <div class="modal-body">
                            <p>Do you want to order the product?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-default noorder-product-row">No</button>
                            <button type="button" class="btn bg-blue order-product-row">Yes</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->

            <div class="modal fade" tabindex="-1" role="dialog" id="product-dismiss-modal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Confirmation Message</h4>
                        </div>
                        <div class="modal-body">
                            <p>Do you want to dismiss the product?</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn bg-default nodismiss-product-row">No</button>
                            <button type="button" class="btn bg-blue dismiss-product-row">Yes</button>
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
