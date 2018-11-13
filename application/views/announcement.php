<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Latest Announcements | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Latest Announcements                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('/dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('/dashboard/announcements/'); ?>"> Latest Announcements</a></li>
            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box  box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Announcements</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-2"></div>

                        <div class="col-md-8">
                            <!-- DIRECT CHAT WARNING -->
                            <div class="box box-primary box-solid direct-chat direct-chat-primary">
                                <div class="box-header treatment-plan">
                                    <h3 class="box-title">Latest Announcements</h3>
                                    <div class="box-tools pull-right">
                                    </div>
                                </div>
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <!-- Conversations are loaded here -->
                                    <div class="direct-chat-messages">
                                        <!-- Message. Default to the left -->
                                        <div class="direct-chat-msg announcement-texts">

                                            <!-- /.direct-chat-info -->
                                            <?php if (!empty($announcements)) {
                                                $i = 1;
                                                foreach ($announcements as $a_key) {
                                                    if (!empty($a_key['ann_text'])) { ?>
                                                        <!-- /.direct-chat-img -->
                                                        <span class="direct-chat-name pull-left treat-count"
                                                              style="padding: 10px;"><?php echo $i; ?>.</span>
                                                        <div class="direct-chat-text treat-msg"><?php echo strip_tags($a_key['ann_text']); ?></div>
                                                        <div class="direct-chat-info clearfix">
                                                                    <span class="direct-chat-timestamp pull-right treat-timestamp"><?php
                                                                        $date = new DateTime($a_key['timestamp']);
                                                                        echo $date->format('h:i:s a m-d-Y') ;
                                                                        ?>
                                                                        &nbsp; By <?php echo $a_key['docName']; ?></span>

                                                        </div>
                                                        <?php $i++;
                                                    }
                                                }
                                            } ?>
                                            <!-- /.direct-chat-text -->
                                        </div>
                                        <!-- /.direct-chat-msg -->
                                        <!-- Message to the right -->

                                        <!-- /.direct-chat-msg -->
                                    </div>
                                    <!--/.direct-chat-messages-->
                                    <!-- Contacts are loaded here -->

                                    <!-- /.direct-chat-pane -->
                                </div>
                                <!-- /.box-body -->
                                <div class="box-footer">

                                    <div class="input-group">
                                        <input type="text" name="patTreatPlan" id="announcement-text"
                                               placeholder="Type Any Announcement ..."
                                               class="form-control"
                                               autocomplete="off" <?php // if ($input_status != 1) {
                                           // echo "disabled";
                                       // } ?>> <span
                                                class="input-group-btn">
                                              <input type="hidden" name="chartpatregNo" id="chartpatregNo"
                                                     value="<?php // $param = $this->input->get("search_by_cnic");
                                                    // if (isset($param)) {
                                                      //   echo $this->input->get("search_by_cnic");
                                                    // } ?>">

                                              <button type="button" class="btn btn-primary btn-flat"
                                                      id="announcement-submit" <?php // if ($input_status != 1) {
                                               //   echo "disabled";
                                            //  } ?>>Post</button>
                    </span>
                                    </div>

                                </div>
                                <!-- /.box-footer-->
                            </div>
                            <!--/.direct-chat -->
                        </div>

                        <div class="col-md-2"></div>
                    </div><!-- /.col -->
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
</div>
<?php $this->load->view('footer'); ?>
</body>
</html>
