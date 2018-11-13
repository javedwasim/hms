<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Dashboard | <?php echo SITE_TITLE_TEXT; ?></title>
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
            <h1>User Profile
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('/dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('/dashboard/profile/'); ?>"> Edit Profile</a></li>

            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="row">
                <div class="col-md-4">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="<?php if (!empty($path)) {
                                     foreach ($path as $pt) {
                                         echo base_url('assets/dist/img/') . $pt['path'];
                                     }
                                 } ?>" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $this->authentication->read('fullname'); ?></h3>

                            <p class="text-muted text-center"><?php if (!empty($qual)) {
                                    foreach ($qual as $q) {
                                        echo $q['qualifications'];
                                    }
                                } ?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Username</b> <a
                                            class="pull-right"><?php echo $this->authentication->read('username'); ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Designation</b> <a class="pull-right"><?php echo $desig->desig; ?></a>
                                </li>

                                <li class="list-group-item">
                                    <b>Contact</b> <a class="pull-right"><?php echo $phone->phone; ?></a>
                                </li>

                            </ul>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->

                    <!-- /.box -->
                </div>
                <!-- /.col -->


                <div class="col-md-8">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#settings" data-toggle="tab" aria-expanded="true">Profile
                                    Settings</a>
                            <li>
                                <a href="#settings-1" data-toggle="tab" aria-expanded="false">
                                    Security Settings
                                </a>
                            </li>
                            <!--                            <li>-->
                            <!--                                <a href="#settings-2" data-toggle="tab" aria-expanded="false">-->
                            <!--                                    Settings 2-->
                            <!--                                </a>-->
                            <!--                            </li>-->
                            <!--                            <li>-->
                            <!--                                <a href="#settings-3" data-toggle="tab" aria-expanded="false">-->
                            <!--                                    Settings 3-->
                            <!--                                </a>-->
                            <!--                            </li>-->
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="settings">
                                <form action="<?php echo base_url('dashboard/profile/') ?>" method="post"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    <h3>Edit Designation:</h3>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Designation</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="designation"
                                                   placeholder="Type Designation here..." autocomplete="off"
                                                   value="<?php if (!empty($desig)) {
                                                       echo $desig->desig;
                                                   } ?>" required>
                                        </div>
                                        <p>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-7">
                                            <button type="submit" class="btn btn-custom" name="desig-submit">Save
                                                Designation
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form action="<?php echo base_url('dashboard/profile/') ?>" method="post"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    <h3>Edit Qualifications:</h3>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Qualifications</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="inputQualifications"
                                                   placeholder="Type Qualifications here..." autocomplete="off"
                                                   value="<?php if (!empty($qual)) {
                                                       foreach ($qual as $q) {
                                                           echo $q['qualifications'];
                                                       }
                                                   } ?>" required>
                                        </div>
                                        <p>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-7">
                                            <button type="submit" class="btn btn-custom" name="qual-submit">Save
                                                Qualifications
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form action="<?php echo base_url('dashboard/profile/') ?>" method="post"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    <h3>Edit Department:</h3>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Department</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="inputDepartment"
                                                   placeholder="Type Department Name here..." autocomplete="off"
                                                   value="<?php if (!empty($qual)) {
                                                       foreach ($dpt as $d) {
                                                           echo $d['department'];
                                                       }
                                                   } ?>" required>
                                        </div>
                                        <p>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-7">
                                            <button type="submit" class="btn btn-custom" name="dept-submit">Save
                                                Department
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <form action="<?php echo base_url('dashboard/profile/') ?>" method="post"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    <h3>Edit Contact:</h3>
                                    <div class="form-group">
                                        <label class="col-sm-2 control-label">Contact</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control" name="phone"
                                                   placeholder="Type Contact Number here..." autocomplete="off"
                                                   value="<?php echo $phone->phone; ?>" required>
                                        </div>
                                        <p>
                                        </p>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-7">
                                            <button type="submit" class="btn btn-custom" name="phone-submit">Save
                                                Contact
                                            </button>
                                        </div>
                                    </div>
                                </form>

                                <form action="<?php echo base_url('dashboard/do_upload/') ?>" method="post"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    <H3>Update your Profile Picture: </H3>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-7">


                                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                                <div class="fileinput-preview thumbnail" data-trigger="fileinput"
                                                     style="width: 65px; height: 70px;">

                                                    <img src="<?php $data['path'] = $this->model_hms->get_profile_pic($this->authentication->read('identifier'));
                                                    foreach ($data as $dt) {
                                                        foreach ($dt as $d) {
                                                            echo base_url('assets/dist/img/') . $d['path'];
                                                        }
                                                    } ?>"
                                                         class="img-thumbnail">


                                                </div>
                                                <div style="display: inline;">
                                        <span class="btn btn-default btn-file"><span
                                                    class="fileinput-new">Select image</span><span
                                                    class="fileinput-exists">Change</span>
                                           <input type="file" name="userfile" size="20"/>
                                        </span>
                                                    <a href="#" class="btn btn-default fileinput-exists"
                                                       data-dismiss="fileinput">Remove</a>
                                                </div>
                                            </div>
                                            <?php if (!empty($error)) {
                                                echo $error;
                                                echo " <br/>";
                                            } elseif (!empty($data)) {
                                                //  echo " <br/>";
                                                //echo "Image has been uploaded successfully!";
                                                echo " <br/>";
                                            } ?>
                                            <input type="submit" value="Upload Photo" class="btn btn-custom"/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="settings-1">
                                <form action="<?php echo base_url('dashboard/profile/') ?>" method="post"
                                      class="form-horizontal" enctype="multipart/form-data">
                                    <h3>Change Password:</h3>

                                    <div class="form-group">
                                        <label for="inputNewpassword" class="col-sm-3 control-label">New
                                            Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="inputNewpassword"
                                                   placeholder="New Password" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputNewpassword1" class="col-sm-3 control-label">Re-type New
                                            Password</label>
                                        <div class="col-sm-6">
                                            <input type="password" class="form-control" name="inputNewpassword1"
                                                   placeholder="Re-type Password" required>
                                        </div>
                                    </div>
                                    <?php if (!empty($this->input->get("error") || !empty($this->input->get("success")))) { ?>
                                        <p>
                                            <b><?php
                                                if ($this->input->get("success") == "true") {
                                                    echo "Passowrd change successful";
                                                } elseif ($this->input->get("error") == "true") {

                                                    echo "Password Change failed, try again!";
                                                } elseif ($this->input->get("error") == "password_mismatch") {

                                                    echo "Password mismatch, please retype your Password";
                                                }
                                                ?>
                                            </b>
                                        </p>
                                        <?php
                                        echo "<br>";
                                    }
                                    ?>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-7">
                                            <button type="submit" class="btn btn-custom" name="submit">Change Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="tab-pane" id="settings-2">
                                The European languages are members of the same family. Their separate existence is a
                                myth.
                                For science, music, sport, etc, Europe uses the same vocabulary. The languages only
                                differ
                                in their grammar, their pronunciation and their most common words. Everyone realizes why
                                a
                                new common language would be desirable: one could refuse to pay expensive translators.
                                To
                                achieve this, it would be necessary to have uniform grammar, pronunciation and more
                                common
                                words. If several languages coalesce, the grammar of the resulting language is more
                                simple
                                and regular than that of the individual languages.
                            </div>
                            <div class="tab-pane" id="settings-3">
                                The European languages are members of the same family. Their separate existence is a
                                myth.
                                For science, music, sport, etc, Europe uses the same vocabulary. The languages only
                                differ
                                in their grammar, their pronunciation and their most common words. Everyone realizes why
                                a
                                new common language would be desirable: one could refuse to pay expensive translators.
                                To
                                achieve this, it would be necessary to have uniform grammar, pronunciation and more
                                common
                                words. If several languages coalesce, the grammar of the resulting language is more
                                simple
                                and regular than that of the individual languages.
                            </div>
                            <!-- /.tab-pane -->
                        </div>
                        <!-- /.tab-content -->
                    </div>
                    <!-- /.nav-tabs-custom -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div>

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
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
