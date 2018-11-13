<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';
?>
<html>
<head>
    <title>Statistics | <?php echo SITE_TITLE_TEXT; ?></title>
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
                Statistics
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('/dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('/dashboard/statistics/'); ?>">Statistics</a></li>
            </ol>
            <br>
        </section>

        <!-- Main content -->
        <section class="content">

            <div class="box  box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><a style="cursor: pointer" data-widget="collapse">Generate Patient Admission/
                            Discharge Statistics</a></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                    </div>

                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">

                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Generate Report: </label>

                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default col-md-6" id="daterange-btn">
                                 <span>
                                  <i class="fa fa-calendar"></i> Select Date Range
                                 </span>
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        &nbsp;
                                        <input type="submit" class="btn btn-primary" id="generate-btn"
                                               value="Generate by Date Range">
                                        &nbsp;
                                        <input type="submit" class="btn btn-primary" id="generate-month-btn"
                                               value="Generate by Month">
                                        &nbsp;
                                        <input type="submit" class="btn btn-primary" id="generate-year-btn"
                                               value="Generate by Year">
                                    </div>

                                    <div id="chartdiv"
                                         style="display: none; width: 100%; height: 400px; background-color: #FFFFFF;"></div>
                                </div>
                            </div>
                        </div>

                    </div><!-- /.col -->
                </div>
            </div>
            <div class="box  box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><a style="cursor: pointer" data-widget="collapse">Generate Statistics of
                            Operated Patients</a></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Generate Report: </label>

                                <div class="col-md-12">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <button type="button" class="btn btn-default col-md-6" id="otg-daterange-btn">
                                 <span>
                                  <i class="fa fa-calendar"></i> Select Date Range
                                 </span>
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        &nbsp;
                                        <input type="submit" class="btn btn-primary" id="generate-ot-btn"
                                               value="Generate by Date Range">
                                        &nbsp;
                                    </div>
                                    <div class="col-md-2"></div>
                                    <div id="otg-chartdiv"
                                         style="display: none; width: 100%; height: 400px; background-color: #FFFFFF;"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="box  box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><a style="cursor: pointer" data-widget="collapse">Generate Statistics Based On
                            the Outcome of the Patient</a></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body" id="slideUp">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Generate Report: </label>

                                <div class="col-md-12">

                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default col-md-6"
                                                id="outcome-daterange-btn">

                                 <span>
                                  <i class="fa fa-calendar"></i> Select Date Range
                                 </span>
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        &nbsp;
                                        <input type="submit" class="btn btn-primary" id="generate-outcome-btn"
                                               value="Generate by Date Range">
                                        &nbsp;<input type="submit" class="btn btn-primary"
                                                     id="outcome-generate-month-btn" value="Generate by Month">
                                        &nbsp;
                                        <input type="submit" class="btn btn-primary" id="outcome-generate-year-btn"
                                               value="Generate by Year">
                                    </div>

                                    <div id="outcome-chartdiv"
                                         style="display: none; width: 100%; height: 400px; background-color: #FFFFFF;"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="box  box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><a style="cursor: pointer" data-widget="collapse">Generate Statistics Based on
                            Patient Re-visits</a></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Generate Report: </label>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-default col-md-6"
                                                id="revisit-daterange-btn">

                                 <span>
                                  <i class="fa fa-calendar"></i> Select Date Range
                                 </span>
                                            <i class="fa fa-caret-down"></i>
                                        </button>
                                        &nbsp;
                                        <input type="submit" class="btn btn-primary" id="generate-revisit-btn"
                                               value="Generate by Date Range">
                                        &nbsp;<input type="submit" class="btn btn-primary"
                                                     id="revisit-generate-month-btn" value="Generate by Month">
                                        &nbsp;
                                        <input type="submit" class="btn btn-primary" id="revisit-generate-year-btn"
                                               value="Generate by Year">

                                    </div>
                                    <div id="revisit-chartdiv"
                                         style="display: none; width: 100%; height: 400px; background-color: #FFFFFF;"></div>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.col -->
                </div>
            </div>
            <div class="box  box-primary collapsed-box">
                <div class="box-header with-border">
                    <h3 class="box-title"><a style="cursor: pointer" data-widget="collapse">Generate Statistics Based on Diseases</a></h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-plus"></i></button>
                    </div>
                </div><!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">

                                <label>Generate Report: </label>
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                        <select id="month-selectbox" class="form-control">
                                            <option value="" disabled selected>Select a Month</option>
                                            <?php for($i=1; $i <= date('m'); $i++ ) { ?>
                                            <option value="<?php if($i < 10) { echo date('Y')."-"."0".$i; } else { echo date('Y')."-".$i; }  ?>">
                                                <?php

                                                $monthArray = array(
                                                                    1=>'January',
                                                                    2=>'February',
                                                                    3=>'March',
                                                                    4=>'April',
                                                                    5=>'May',
                                                                    6=>'June',
                                                                    7=>'July',
                                                                    8=>'August',
                                                                    9=>'September',
                                                                    10=>'October',
                                                                    11=>'November',
                                                                    12=>'December');
                                                echo $monthArray[$i] . " " . date('Y');
                                                ?>
                                            </option>
                                            <?php } ?>
                                        </select>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <input type="submit" class="btn btn-primary"
                                                     id="disease-generate-month-btn" value="Generate by Month">
                                        &nbsp;
                                        <br>
                                        <br>
                                        <div class="col-md-4"></div>
                                        <div class="col-md-4">
                                            <select id="year-selectbox" class="form-control">
                                                <option value="" disabled selected>Select a Year</option>
                                                <?php
                                                for($i = 2018 ; $i <= date('Y'); $i++){
                                                    echo "<option value=".$i." >$i</option>";
                                                }
                                               ?>
                                            </select>
                                        </div>
                                        <div class="col-md-4"></div>
                                        <input type="submit" class="btn btn-primary" id="disease-generate-year-btn"
                                               value="Generate by Year">
                                    </div>
                                    <div id="disease-chartdiv"
                                         style="display: none; width: 100%; height: 400px; background-color: #FFFFFF;"></div>
                                </div>
                            </div>
                        </div>
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
<script src="<?php echo base_url('/assets/dist/js/amcharts/amcharts.js'); ?>"></script>
<script src="<?php echo base_url('/assets/dist/js/amcharts/themes/light.js'); ?>"></script>
<script src="<?php echo base_url('/assets/dist/js/amcharts/serial.js'); ?>"></script>
<script src="<?php echo base_url('/assets/dist/js/amcharts/pie.js'); ?>"></script>
<script src="<?php echo base_url('/assets/dist/js/amcharts/graph.js'); ?>"></script>

</body>

</html>