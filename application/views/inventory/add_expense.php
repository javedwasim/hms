<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>
        Add Expense
        <small></small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li><a href="<?php echo base_url('dashboard/add_expense/'); ?>"> Add Expense</a></li>
    </ol>
    <br>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box  box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">New Expense</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <form name="add-expense-form" id="add-expense-form" method="post"
                          action="<?php echo base_url('dashboard/add_expense/'); ?>">
                        <input type="hidden" id="total-rows" name="total-rows">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-hover" id="table-expense-list"
                                       aria-describedby="example2_info">
                                    <tbody>
                                    <tr role="row" class="odd">
                                        <td>
                                            <section class="invoice">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Expense Category</label>
                                                            <select class="expense-category-select form-control" name="expCategNo[]" style="width: 100%;" required>
                                                                <option value="">Please select</option>
                                                                <?php foreach ($expenses as $expense): ?>
                                                                    <option value="<?php echo $expense['categoryNo'] ?>"><?php echo $expense['categoryName'] ?></option>
                                                                <?php endforeach; ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Date &amp; Time</label>
                                                            <div class="input-group date bootstrap-timepicker timepicker">
                                                                <div class="col-md-6" style="padding: 0;">
                                                                    <input type="text" class="form-control pull-right expense-datepicker"
                                                                           name="expDateString[]" autocomplete="off" placeholder="Select Date" required>
                                                                </div>
                                                                <div class="col-md-6 " style="padding: 0;">
                                                                    <input type="text" class="form-control pull-right expense-timepicker"
                                                                           name="expTimeString[]" placeholder="Set Time" required>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <input class="form-control" name="expDescription[]"
                                                                   style="width: 100%;" tabindex="4" placeholder="Type Expense Description" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label>Amount</label>
                                                            <input class="form-control" name="expAmount[]"  id="expense-amount" style="width: 100%;"
                                                                   tabindex="4"  placeholder="Enter Amount" required>
                                                        </div>
                                                    </div>
                                                </div>
                                            </section>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-offset-1">
                                    <div class="form-group">
                                        <button type="button" id="add-more-expense-btn"
                                                class="btn btn-flat btn-primary btn-sm">
                                            &nbsp; &nbsp;<i class="fa fa-plus"></i> &nbsp;Add More &nbsp; &nbsp;
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-xs-12">
                                                <button type="submit" name="add_expense_submit"
                                                        class="btn btn-primary btn-flat pull-right "
                                                        id="add-expen-submit"><i
                                                        class="fa fa-plus" aria-hidden="true"></i>&nbsp; Add
                                                    Expense
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    $(document).ready(function () {

        $('.expense-datepicker').datepicker({
            format: 'dd-mm-yyyy',
            autohide:true,
        });

        $('.expense-timepicker').timepicker({
            defaultTime: false
        });

        $('.select2').select2();

        var rows = 0;
        $('#add-more-expense-btn').click(function () {
            rows++;
            $('#table-expense-list').append('<tr role="row" class="odd">' +
                '<td>' +
                '<section class="invoice">' +
                '<div class="row">' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label>Expense Category</label>' +
                '<select class="expense-category-select form-control" name="expCategNo[]" style="width: 100%;" tabindex="4" required></select>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label>Date &amp; Time</label>' +
                '<div class="input-group date bootstrap-timepicker timepicker">' +
                '<div class="col-md-6" style="padding: 0;">' +
                '<input type="text" class="form-control pull-right expense-datepicker" name="expDateString[]" autocomplete="off" placeholder="Select Date" required>' +
                '</div>' +
                '<div class="col-md-6" style="padding: 0;">' +
                '<input type="text" class="form-control pull-right expense-timepicker" name="expTimeString[]' + rows + '" placeholder="Set Time" required>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label>Description</label>' +
                '<input class="form-control" name="expDescription[]" style="width: 100%;" tabindex="4" placeholder="Type Expense Description" required>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<label>Amount</label>' +
                '<input class="form-control" name="expAmount[]" id="expense-amount" style="width: 100%;" tabindex="4" placeholder="Enter Amount" required>' +
                '</div>' +
                '</div>' +
                '<div class="col-md-3">' +
                '<div class="form-group">' +
                '<button type="button" class="btn btn-flat bg-red btn-sm delete-row-btn" > Remove </button>' +
                '</div>' +
                '</div>' +
                '</div>' +
                '</section>' +
                '</td>' +
                '</tr>');
            $('.expense-category-select').select2({
                placeholder: "Select Category",
                ajax: {
                    url: base_url + "index.php/dashboard/search_expense_category",
                    dataType: 'json',
                    delay: 250,

                    data: function (params) {
                        var query = {
                            search_expense_category_no: params.term
                        }
                        // Query parameters will be ?search=[term]&type=public
                        return query;
                    },
                    processResults: function (data) {
                        return {

                            results: data
                        };

                    },
                    cache: true
                }
            });
            $('.expense-datepicker').datepicker({
                format: 'dd-mm-yyyy'
            });
            $('.expense-timepicker').timepicker({
                defaultTime: false
            });
            $('#expense-amount').keydown(function () {
                //allow  backspace, tab, ctrl+A, escape, carriage return
                if (event.keyCode == 8 || event.keyCode == 9
                    || event.keyCode == 27 || event.keyCode == 13
                    || (event.keyCode == 65 && event.ctrlKey === true))
                    return;
                if ((event.keyCode < 48 || event.keyCode > 57))
                    event.preventDefault();
            });
            $('#total-rows').val(rows);
        });

        $("#add-expense-form").on('submit',(function(e) {
            e.preventDefault();
            var base_url = $('#base').val();
            $.ajax({
                url: base_url+'dashboard/add_expense',
                type: "POST",
                data:  new FormData(this),
                contentType: false,
                cache: false,
                processData:false,
                beforeSend : function()
                {
                    $("#err").fadeOut();
                },
                success: function(response)
                {
                    if(response.success){
                        toastr["success"](response.message);
                    }else{
                        toastr["error"](response.message);
                    }
                },
                error: function(e)
                {
                    toastr["error"]('seem to be an error');
                }
            });
        }));
    });
</script>