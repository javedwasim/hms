<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        View Expense
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('dashboard/view_expense/'); ?>"> View Expense</a></li>
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
                                <form name="search_by_date" id="search-expense-by-date" method="post"
                                      action="<?php echo base_url('dashboard/view_expense'); ?>">
                                    <label>Search By Date Range</label>
                                    <div class="input-group">
                                        <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                        </div>
                                        <input type="hidden" id="expense-sdate" name="start_date">
                                        <input type="hidden" id="expense-edate" name="end_date">
                                        <input type="text"
                                               class="form-control pull-right search-expense-by-date"
                                               id="search-expense-by-daterange" name="search-expense-by-daterange"
                                               autocomplete="off"  placeholder="e.g. DD-MM-YYYY">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (!empty($expense_list)) { ?>

        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Expense List</h3>
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
                                                Expense Category
                                            </th>
                                            <th class="sorting" tabindex="0"
                                                aria-controls="example2"
                                                rowspan="1" colspan="1"
                                                aria-label="Browser: activate to sort column ascending">
                                                Date & Time
                                            </th>
                                            <th class="sorting" tabindex="0"
                                                aria-controls="example2"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Description
                                            </th>
                                            <th class="sorting" tabindex="0"
                                                aria-controls="example2"
                                                rowspan="1" colspan="1"
                                                aria-label="Platform(s): activate to sort column ascending">
                                                Total Amount
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
                                        <?php if (!empty($expense_list)) {
                                            $srNo = 0;
                                            foreach ($expense_list as $e_key) {
                                                $srNo++; ?>
                                                <tr role="row" class="odd">
                                                    <td><?php echo $srNo; ?>
                                                        <input type="hidden" id="expense-id" value="<?php echo $e_key['expNo']; ?>">
                                                    </td>
                                                    <?php  $category_list = $this->model_hms->get_expense_category_id($e_key['expCategNo']); ?>
                                                    <td><?php echo $category_list->categoryName; ?></td>
                                                    <td><?php echo $e_key['expDateString'] . " ". $e_key['expTimeString']; ?></td>
                                                    <td><?php echo $e_key['expDescription']; ?></td>
                                                    <td><?php echo $e_key['expAmount']; ?></td>
                                                    <td style="display: flex;">
                                                        <a class="exp-update-btn"
                                                           data-toggle="modal"
                                                           data-href="<?php echo $e_key['expNo']; ?>">
                                                            <button type="button"
                                                                    class="btn btn-default ">
                                                                <i
                                                                    class="fa fa-pencil-square-o"
                                                                    aria-hidden="true"></i>
                                                            </button>
                                                        </a>&nbsp;
                                                        <button type="button"
                                                                data-href = "<?php echo $e_key['expNo']; ?>"
                                                                class="btn btn-default exp-delete-submit-btn">
                                                            <i class="fa fa-ban"
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
                                <div class="col-sm-6"></div>
                                <div class="col-sm-6">
                                    <form target="_blank" id="print-expense-form" action="<?php echo base_url('dashboard/print_hospital_expenses/'); ?>" method="post" enctype="multipart/form-data">
                                        <input type="hidden" name="formdate" value="<?php echo $formdate; ?>">
                                        <input type="hidden" name="todate" value="<?php echo $todate; ?>">
                                    </form>
                                    <button type="button" id="print-expense-btn" class="btn btn-primary btn-flat pull-right">
                                        <i class="fa fa-print"
                                           aria-hidden="true"></i>&nbsp; Print Expense
                                    </button></div>
                            </div>
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
</section>
<!-- /.content -->
<div class="modal fade" tabindex="-1" role="dialog" id="exp-delete-modal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Confirmation Message</h4>
            </div>
            <div class="modal-body">
                <input type="hidden" name="delete_exp_id" id="delete_exp_id">
                <p>Do you want to delete the expense?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn bg-default nodelete-exp-row" data-dismiss="modal">No</button>
                <button type="button" class="btn bg-blue delete-exp-row">Yes</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- /.content -->
<script>
    $(document).ready(function () {
        $('#search-expense-by-daterange').daterangepicker({
            locale: {
                format: 'DD-MM-YYYY'
            },
            opens: 'right',
            autoApply: true

        }, function (start, end, label) {
            var sdate = start.format('YYYY-MM-DD');
            var edate = end.format('YYYY-MM-DD');
            $('#expense-sdate').val(sdate);
            $('#expense-edate').val(edate);
            var base_url = $('#base').val();
            $.ajax({
                url: base_url+'dashboard/view_expense',
                type:'post',
                data:$('#search-expense-by-date').serialize(),
                cache: false,
                success: function(response) {
                    if(response.result_html != ''){
                        $('.content-wrapper').empty();
                        $('.content-wrapper').append(response.result_html);
                    }
                }
            });

            //$('#search-expense-by-date').submit();
        });

        var exp_id;
        $('.exp-delete-submit-btn').click(function () {
            var expense_id =  $(this).attr('data-href');
            $('#delete_exp_id').val(expense_id);
            $('#exp-delete-modal').modal('show');
        });
    });
</script>