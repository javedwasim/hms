<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>User Privileges | <?php echo SITE_TITLE_TEXT; ?></title>
    <?php $this->load->view('header'); ?>
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

    <?php $this->load->view('main_header');
    ?> <!-- Left side column. contains the logo and sidebar -->
    <!-- Left side column. contains the logo and sidebar -->
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                User Privileges
                <small></small>
            </h1>
            <ol class="breadcrumb">
                 <li><a href="<?php base_url('/dashboard/master_list'); ?>"><i class="fa fa-dashboard"></i> Master List</a></li>
                <li><a href="<?php base_url('/dashboard/user_priviliges/'); ?>"> Edit Patient</a></li>

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
                    <div class="row" style="margin-left: 0px; margin-right: 0px;">
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
                                                        Sr. No#
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending">
                                                        Privilege Description
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        Allow User to Admit
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Platform(s): activate to sort column ascending">
                                                        View Admitted Patients
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        View History &amp; Plan Chart
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Engine version: activate to sort column ascending">
                                                        Allow Discharge of Patients
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can Book OT
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can View OT List
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can View Radiology Section
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can View Ward/ Bed List
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can View Statistics
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can View Inventory
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can View Accounts
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can View Configurations
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can View Master List
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can Update Patient Record
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can Update History/Plan Chart
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Can Re-Admit Patient
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="example2"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending">
                                                        Action
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            if(!empty($user_priv)){
                                                $iterater = 1;
                                            foreach ($user_priv as $u_key) {
                                            ?>
                                            <tr role="row"  class="odd">
                                                <td class="sorting_1">
                                                    <?php echo $iterater; ?>
                                                </td>
                                                <td><?php echo $u_key['ug_desc']; ?>
                                                <input type="hidden" id="privid" value="<?php echo $u_key['priv_id']; ?>">
                                                <input type="hidden" id="ugid" value="<?php echo $u_key['ug_id']; ?>">
                                                </td>
                                                <td><input type="checkbox" id="<?php echo ALLOW_USER_TO_ADMIT; ?>" <?php if($u_key[ALLOW_USER_TO_ADMIT] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo VIEW_ADMITTED_PATIENTS; ?>" <?php if($u_key[VIEW_ADMITTED_PATIENTS] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo VIEW_HISTORY_AND_PLAN_CHART; ?>" <?php if($u_key[VIEW_HISTORY_AND_PLAN_CHART] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo DISCHARGE_PATIENTS; ?>" <?php if($u_key[DISCHARGE_PATIENTS] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo CAN_BOOK_OT; ?>" <?php if($u_key[CAN_BOOK_OT] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo CAN_VIEW_OT_LIST; ?>" <?php if($u_key[CAN_VIEW_OT_LIST] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo VIEW_RADIOLOGY_SECTION; ?>" <?php if($u_key[VIEW_RADIOLOGY_SECTION] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo VIEW_WARD_BED_LIST; ?>" <?php if($u_key[VIEW_WARD_BED_LIST] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo VIEW_STATISTICS; ?>" <?php if($u_key[VIEW_STATISTICS] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo VIEW_INVENTORY; ?>" <?php if($u_key[VIEW_INVENTORY] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo VIEW_ACCOUNTS; ?>" <?php if($u_key[VIEW_ACCOUNTS] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo VIEW_CONFIGURATIONS; ?>" <?php if($u_key[VIEW_CONFIGURATIONS] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo VIEW_MASTER_LIST; ?>" <?php if($u_key[VIEW_MASTER_LIST] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo CAN_UPDATE; ?>" <?php if($u_key[CAN_UPDATE] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo  CAN_UPDATE_HP_CHART; ?>" <?php if($u_key[CAN_UPDATE_HP_CHART] == 1){ echo "checked=checked"; } ?>></td>
                                                <td><input type="checkbox" id="<?php echo  CAN_REVISIT; ?>" <?php if($u_key[CAN_REVISIT] == 1){ echo "checked=checked"; } ?>></td>
                                                <td style="display: flex; text-align: center;"><button type="button" class="btn btn-default priv-submit"><i class="fa fa-floppy-o"></i></button>
                                                    <button type="button" class="btn btn-default delete-priv"><i class="fa fa-ban"></i></button>
                                                </td>
                                            </tr>

                                                <?php
                                                $iterater++;
                                            }
                                            } ?>
                                            </tbody>
                                            <tfoot>
                                            </tfoot>
                                        </table>
                                        <button type="button" class="btn btn-custom new-priv">Add new Privilege</i></button>
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
        <strong>Copyright &copy;  <?php echo date("Y"); ?> <a target="_blank" href="<?php echo SITEURL; ?>"><?php echo COMPANYNAME; ?></a>.</strong> All rights
        reserved.
    </footer>
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
