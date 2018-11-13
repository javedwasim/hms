<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>User List | <?php echo SITE_TITLE_TEXT; ?></title>
    <?php $this->load->view('header'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

    <?php $this->load->view('main_header'); ?> <!-- Left side column. contains the logo and sidebar -->

    <!-- Left side column. contains the logo and sidebar -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Users List
                <small></small>
            </h1>
            <ol class="breadcrumb">
				<li><a href="<?php echo base_url('/dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('/dashboard/master_list/'); ?>">Master List</a></li>
                <li><a href="<?php echo base_url('/dashboard/user/'); ?>"> Users List</a></li>


            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box  box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">All Users</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="box-body">
                            <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                                <div class="row">
                                    <div class="col-sm-6"></div>
                                    <div class="col-sm-6"></div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12" style="overflow-y: auto;">
                                        <table id="example2" class="table table-bordered table-hover dataTable"
                                               role="grid" aria-describedby="example2_info">
                                            <thead>
                                            <tr role="row">
                                                <th class="sorting_asc" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1" aria-sort="ascending"
                                                    aria-label="Rendering engine: activate to sort column descending">
                                                    User ID#
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Browser: activate to sort column ascending">Full Name
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Designation
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Platform(s): activate to sort column ascending">
                                                    Department
                                                </th>

                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Username
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Engine version: activate to sort column ascending">
                                                    Current Privileges
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="example2"
                                                    rowspan="1" colspan="1"
                                                    aria-label="CSS grade: activate to sort column ascending">
                                                    Actions
                                                </th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php if (!empty($users)) {
                                                foreach ($users as $u_key) { ?>
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1"><?php echo $u_key['id']; ?></td>
                                                        <td><?php echo $u_key['full_name']; ?></td>
                                                        <td><?php echo $u_key['desig']; ?></td>
                                                        <td><?php echo $u_key['department']; ?></td>
                                                        <td><?php echo $u_key['email']; ?></td>
                                                        <td>
                                                            <div class="form-group" style="display: -webkit-box;" id="userdata<?php echo $u_key['id']; ?>">
                                                            <?php $all_priv = $this->model_hms->get_all_priv();
                                                            if(!empty($all_priv)){
                                                                ?>
                                                                <select class="form-control" data-id="select" style="width: auto;">
                                                                    <?php foreach ($all_priv as $item) {?>
                                                                    <option value="<?php echo $item['priv_id']; ?>" <?php if($item['priv_id'] == $u_key['priv']) { echo "selected"; } ?>><?php echo $item['ug_desc']; ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                                <input type="hidden" name="userid" id="userid" value="<?php echo $u_key['id']; ?>">
                                                                <?php
                                                            }
                                                            ?>
                                                            <button type="button" class="btn btn-default mybutton" id="btn"><i class="fa fa-floppy-o"></i></button>
                                                            </div>
                                                        </td>
                                                        <td><button type="button" data-toggle="modal" data-target="#discharge-modal" class="btn btn-default update-pwd"><i class="fa fa-key"></i></button> &nbsp;
                                                            <button type="button" class="btn btn-default delete-user"><i class="fa fa-ban"></i></button>
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
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal fade pwd-modal" tabindex="-1" role="dialog" id="discharge-modal">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title">Change or Assign New Password</h4>
                        </div>
                        <div class="modal-body">

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 ">
                                    <div class="form-group">
                                    <label class="col-sm-4 control-label">New Password:</label>
                                        <div class="col-sm-6 hidden-input-div">
                                 <input type="password" id="new-password" class="form-control">
                                        </div>
                                        <div class="col-sm-2">
                                            <button type="button" class="btn btn-default pwd-hider"><i class="fa fa-eye-slash"></i></button> &nbsp;
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-flat save-password"><i
                                            class="fa fa-floppy-o" aria-hidden="true"> </i>&nbsp; Update Password
                                </button>
                            </div>
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
        <strong>Copyright &copy;  <?php echo date("Y"); ?> <a target="_blank" href="<?php echo SITEURL; ?>"><?php echo COMPANYNAME; ?></a>.</strong> All rights
        reserved.
    </footer>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
