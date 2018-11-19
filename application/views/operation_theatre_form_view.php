<!DOCTYPE html>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$base_url = load_class('Config')->config['base_url'];
echo '<input type="hidden" id="base" value="' . $base_url . '">';

?>
<html>
<head>
    <title>Operation Theatre Form | <?php echo SITE_TITLE_TEXT; ?></title>
    <?php $this->load->view('header'); ?>
    <style>
        #consent-form {
            background-size: contain;
            /* height: 100%; */
            background-size: 100%;
            background: url("<?php echo base_url('assets/dist/img/consent_form.png');?>") no-repeat;
            background-position: center;
        }

        .res-img {
            min-height: 920px;
        }

        #label-name {
            margin-top: 7%;
            margin-left: 34%;
            font-weight: 500;
            font-size: 12px;
            padding-top: 3px;
        }

        #label-reg {
            margin-top: -1%;
            margin-right: 26%;
            font-weight: 500;
            font-size: 12px;
        }

        @media (max-width: 414px) {
            #consent-form {
                max-width: 360px;
                max-height: 500px;
                background-size: 340px 500px;
            }

            .res-img {
                min-height: 500px;
            }

            #label-name {
                margin-top: 13%;
                margin-left: 14%;
                font-weight: 400;
                font-size: 8px;
            }

            #label-reg {
                margin-top: -3%;
                margin-right: 0%;
                font-weight: 400;
                font-size: 8px;
            }
        }

        @media (width: 1366px) {
            #label-name {
                margin-top: 8%;
                margin-left: 32%;
                font-weight: 500;
                font-size: 12px;
            }

            #label-reg {
                margin-top: -1%;
                margin-right: 26%;
                font-weight: 500;
                font-size: 12px;
            }
        }

        @media (width: 1280px) {
            #label-name {
                margin-top: 8%;
                margin-left: 31%;
                font-weight: 500;
                font-size: 12px;
                padding-top: 5px;
            }

            #label-reg {
                margin-top: -1%;
                margin-right: 23%;
                font-weight: 500;
                font-size: 12px;
            }
        }
        @media print {
            #consent-form {
                background-size: contain !important;
                /* height: 100%; */
                background-size: 100% !important;
                background: url("<?php echo base_url('assets/dist/img/consent_form.png');?>") no-repeat !important;
                background-position: center !important;
            }
            #label-name {
                margin-top: 12%;
                margin-left: 22%;
                font-weight: 500;
                font-size: 12px;
                padding-top: 3px;
            }

            #label-reg {
                margin-top: -1%;
                margin-right: 10%;
                font-weight: 500;
                font-size: 12px;
            }
            .main-footer {
                display: none !important;
            }
            .print-ot-form-btn {
                display: none !important;
            }
        }

    </style>
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
                Operation Theatre Forms
                <small></small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo base_url('dashboard/'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                <li><a href="<?php echo base_url('dashboard/view_operationlist/'); ?>"> Operation Theatre</a></li>
            </ol>
            <br>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary">
                <?php $patient_list = $this->model_hms->get_add_discharge_patient_by_reg_no($pre_op_order->regNo); ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <i class="fa fa-check-circle-o" id="sty-6"
                               style="<?php if ($consent_op->isSave == "1") {
                                   echo "color: green;";
                               } ?>"></i>
                            <h3 class="box-title">Consent for Operation</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <input type="hidden" id="consent-op-no" name="consent-op-no"
                                   value="<?php echo $consent_op->consentOpNo; ?>">
                            <div class="row pull-right">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn bg-blue btn-flat margin print-ot-form-btn">
                                            <i
                                                    class="fa fa-print" aria-hidden="true"></i>&nbsp; Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12 res-img" id="consent-form">
                                            <label id="label-name"><?php echo isset($patient_list->patName)?$patient_list->patName . " " . $patient_list->patNoKType . " " . $patient_list->patNoK:''; ?></label>
                                            <br>
                                            <label class="pull-right"
                                                   id="label-reg"><?php echo isset($patient_list->regNo)?$patient_list->regNo:''; ?></label>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <i class="fa fa-check-circle-o" id="sty-1"
                               style="<?php if ($pre_op_fitness->isSave == "1") {
                                   echo "color: green;";
                               } ?>"></i>
                            <h3 class="box-title">Pre-Operation Fitness Form</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <input type="hidden" id="pre-opf-no" name="pre-opf-no"
                                   value="<?php echo $pre_op_fitness->preOpFNo; ?>">
                            <input type="hidden" id="reg-no" name="reg-no"
                                   value="<?php echo isset($pre_op_fitness->regNo)?$pre_op_fitness->regNo:''; ?>">
                            <input type="hidden" id="ot-booking-no" name="ot-booking-no"
                                   value="<?php echo $pre_op_fitness->otBookingNo; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Anesthesia Fitness by Anesthetist</h4>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Remarks</label>
                                        </div>
                                        <div class="col-md-9">
                                            <label class="checklist-text"><?php if (!empty($pre_op_fitness->anesthetistRemarks)) {
                                                    echo $pre_op_fitness->anesthetistRemarks;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Advice</label>
                                        </div>
                                        <div class="col-md-9">
                                            <label class="checklist-text"><?php if (!empty($pre_op_fitness->anesthetistAdvice)) {
                                                    echo $pre_op_fitness->anesthetistAdvice;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Name of Anesthetist</label>
                                        </div>
                                        <div class="col-md-9">
                                            <label class="checklist-text"><?php if (!empty($pre_op_fitness->anesthetistName)) {
                                                    echo $pre_op_fitness->anesthetistName;
                                                } ?></label>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Medical Fitness by Physician</h4>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Remarks</label>
                                        </div>
                                        <div class="col-md-9">
                                            <label class="checklist-text"><?php if (!empty($pre_op_fitness->physicianRemarks)) {
                                                    echo $pre_op_fitness->physicianRemarks;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div><!-- /.col -->
                            </div><!-- /.row -->
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Advice</label>
                                        </div>
                                        <div class="col-md-9">
                                            <label class="checklist-text"><?php if (!empty($pre_op_fitness->physicianAdvice)) {
                                                    echo $pre_op_fitness->physicianAdvice;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Name of Anesthetist</label>
                                        </div>
                                        <div class="col-md-9">
                                            <label class="checklist-text"><?php if (!empty($pre_op_fitness->physicianName)) {
                                                    echo $pre_op_fitness->physicianName;
                                                } ?></label>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Any Other</h4>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="checklist-text"><?php if (!empty($pre_op_fitness->anyOther)) {
                                                    echo $pre_op_fitness->anyOther;
                                                } ?></label>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <i class="fa fa-check-circle-o" id="sty-2" style="<?php if ($pre_op_order->isSave == "1") {
                                echo "color: green;";
                            } ?>"></i>
                            <h3 class="box-title">Preoperative Orders</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <input type="hidden" id="pre-opo-no" name="pre-opo-no"
                                   value="<?php echo $pre_op_order->preOpONo; ?>">
                            <input type="hidden" id="reg-no1" name="reg-no1"
                                   value="<?php echo isset($pre_op_order->regNo)?$pre_op_order->regNo:''; ?>">
                            <input type="hidden" id="ot-booking-no1" name="ot-booking-no1"
                                   value="<?php echo $pre_op_order->otBookingNo; ?>">


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Patient Information</h4>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <label>MR#</label>&nbsp;&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php echo isset($patient_list->regNo)?$patient_list->regNo:''; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <label>Patient Name</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php echo $patient_list->patName; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <label><?php echo $patient_list->patNoKType; ?></label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php echo $patient_list->patNoK; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <label>Bed Number</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php $bedNo = $this->model_hms->get_bed_name_wrt_ward($patient_list->patbed_id);
                                            if ($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed") {
                                                echo "Extra Bed " . $bedNo->bed;
                                            } else {
                                                echo $bedNo->bed;
                                            }
                                            ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <label>Sex</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php echo $patient_list->patSex; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <label>Age</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php echo $patient_list->patAge; ?></label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12">
                                        <label>Date &amp; Time</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($pre_op_order->dateString)) {
                                                echo $pre_op_order->dateString;
                                            } else {
                                                date_default_timezone_set("Asia/Karachi");
                                                $nowdatetime = date('d-m-Y h:i A');
                                                echo $nowdatetime;
                                            }
                                            ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Marks of Identification</h4>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>1. </label> <label
                                                    class="checklist-text"><?php if (!empty($pre_op_order->marksIdentification1)) {
                                                    echo $pre_op_order->marksIdentification1;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>2. </label> <label
                                                    class="checklist-text"><?php if (!empty($pre_op_order->marksIdentification2)) {
                                                    echo $pre_op_order->marksIdentification2;
                                                } ?></label>
                                        </div>

                                    </div>
                                </div><!-- /.form-group -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label>Operation Site</label>&nbsp;&nbsp;&nbsp;
                                    <label class="checklist-text"><?php if (!empty($pre_op_order->operationSite)) {
                                            echo $pre_op_order->operationSite;
                                        } ?></label>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Operation Side Marked</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($pre_op_order->operationSideMarked)) {
                                                echo $pre_op_order->operationSideMarked;
                                            } ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <?php if ($pre_op_order->giveBath == "true") { ?>
                                                <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                            <?php } else { ?>
                                                <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                            <?php } ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Give Bath</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <?php if ($pre_op_order->markOperationSite == "true") { ?>
                                                <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                            <?php } else { ?>
                                                <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                            <?php } ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Mark Operation Site</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <?php if ($pre_op_order->provideHospitalDress == "true") { ?>
                                                <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                            <?php } else { ?>
                                                <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                            <?php } ?>
                                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Provide Hospital Dress</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Shave and Prepare the area</label>&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($pre_op_order->areaName)) {
                                                    echo $pre_op_order->areaName;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group ">
                                        <div class="col-md-12 ">
                                            <label>N.P.O From</label>&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($pre_op_order->npoFormTime)) {
                                                    echo $pre_op_order->npoFormTime;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Arrange</label> &nbsp;&nbsp;<label
                                                    class="checklist-text"><?php if (!empty($pre_op_order->arrangeBlood)) {
                                                    echo $pre_op_order->arrangeBlood;
                                                } ?></label> &nbsp;&nbsp;<label> Pints of blood</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Send following investigation to the operation theatre</h5>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label class="checklist-text"><?php if (!empty($pre_op_order->sendFInvestigationOt)) {
                                                    echo $pre_op_order->sendFInvestigationOt;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Pre-Medication</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="checklist-text"><?php if (!empty($pre_op_order->preMedication)) {
                                                    echo $pre_op_order->preMedication;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <label>Send Patient to Operation Theatre at</label>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="checklist-text"><?php if (!empty($pre_op_order->sendPatientOtTime)) {
                                                    echo $pre_op_order->sendPatientOtTime;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h5>Any Other Specific Order</h5>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-9">
                                            <label class="checklist-text"><?php if (!empty($pre_op_order->anyOtherOrder)) {
                                                    echo $pre_op_order->anyOtherOrder;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Instructions About Use of Special Instruments</h4>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <label>Laproscopic Use</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($pre_op_order->laproscopicUse)) {
                                                echo $pre_op_order->laproscopicUse;
                                            } ?></label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <label>Diathermy Use</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($pre_op_order->diathermyUse)) {
                                                echo $pre_op_order->diathermyUse;
                                            } ?></label>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <label>Tourniquet Use</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($pre_op_order->tourniquetUse)) {
                                                echo $pre_op_order->tourniquetUse;
                                            } ?></label>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <label>X-Ray Use</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($pre_op_order->xRayUse)) {
                                                echo $pre_op_order->xRayUse;
                                            } ?></label>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-6">
                                        <label>Laser Use</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($pre_op_order->laserUse)) {
                                                echo $pre_op_order->laserUse;
                                            } ?></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <i class="fa fa-check-circle-o" id="sty-3"
                               style="<?php if ($surgical_checklist->isSave == "1") {
                                   echo "color: green;";
                               } ?>"></i>
                            <h3 class="box-title">Surgical Safety Checklist / Surgical Ward II</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <input type="hidden" id="surgical-sc-no" name="surgical-sc-no"
                                   value="<?php echo $surgical_checklist->surgicalSCNo; ?>">
                            <!--  <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>Patient Information</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                                <label>MR#</label>
                                            </div>
                                            <div class="col-md-7">
                                                <label><?php //echo $patient_list->regNo; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                                <label>Patient Name</label>
                                            </div>
                                            <div class="col-md-7">
                                                <label><?php //echo $patient_list->patName; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                                <label><?php //echo $patient_list->patNoKType; ?></label>
                                            </div>
                                            <div class="col-md-7">
                                                <label><?php //echo $patient_list->patNoK; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                                <label>Bed Number</label>
                                            </div>
                                            <div class="col-md-7">
                                                <label><?php $bedNo = $this->model_hms->get_bed_name_wrt_ward($patient_list->patbed_id);
                            if ($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed") {
                                //echo "Extra Bed " . $bedNo->bed;
                            } else {
                                /// echo $bedNo->bed;
                            }
                            ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                                <label>Sex</label>
                                            </div>
                                            <div class="col-md-7">
                                                <label><?php //echo $patient_list->patSex; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="col-md-5">
                                                <label>Age</label>
                                            </div>
                                            <div class="col-md-7">
                                                <label><?php //echo $patient_list->patAge; ?></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>-->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>SIGN IN</h4>
                                        <h5>Before induction of anaesthesia</h5>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Has the patient confirmed his/her identify, site, procedure and
                                            consent?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox1 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Is the surgical site marked?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox2 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">Yes/not applicable</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Is the anaesthesia machine and medication check complete?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox3 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label>Does the patient
                                            have a:</label><br>
                                        <label>Known allergy?</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($surgical_checklist->radio4)) {
                                                echo $surgical_checklist->radio4;
                                            } ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="col-md-12">
                                        <label>Difficult airway/aspiration risk:</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($surgical_checklist->radio5)) {
                                                if ($surgical_checklist->radio5 == "No") {
                                                    echo "No";
                                                } else {
                                                    echo "Yes and equipment/assistance
                                                    available";
                                                }
                                            } ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Risk of >500ml blood loss (7ml/kg in children)?</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($surgical_checklist->radio6)) {
                                                if ($surgical_checklist->radio6 == "No") {
                                                    echo "No";
                                                } else {
                                                    echo "Yes and adequate IV access/fluids planned";
                                                }
                                            } ?></label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>TIME OUT</h4>
                                        <h5>Before start of surgical intervertion for example, skin inclsion</h5>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Have all team members introduced hemselves by name androle?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox7 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">Yes</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Surgeon and anaesthetist verbally confirm:</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox8 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;What is the patient's name?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox9 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;What procodure, Site and position
                                            areplanned?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Anticipated critical events</label><br>
                                        <label>Surgeon:</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox10 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;How much blood loss is anticipated?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox11 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Are there any specific equipment
                                            requirements or special investigation?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox12 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Are there any critical or unexpected steps
                                            you
                                            want the team to know about?</label>
                                        <br>
                                        <label>Anaesthetist:</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox13 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Are there any patient specific
                                            concerns?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox14 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;What is the patient's ASA grade?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox15 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;What monitoring equipment and other specific
                                            levels of support are required for example blood?</label>
                                        <br>
                                        <label>Nurse/ODP:</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox16 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Has the sterility of the instrumentation
                                            been
                                            confirmed (including indicator results)?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox17 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Are there any equipment issues of
                                            concerns?</label>
                                        <br>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Has the surgical site infection (SSI) bundle been
                                            undertaken?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox18 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Yes/not applicable</label>
                                        <br>
                                        <label class="checklist-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-
                                            Antibcaemic controliotic prophylaxis within the last 60
                                            minutes</label><br>
                                        <label class="checklist-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-
                                            Patient
                                            warming</label><br>
                                        <label class="checklist-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Hair
                                            removal</label><br>
                                        <label class="checklist-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-
                                            Glycaemic control</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Has VTE prophylaxis been undertaken?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox19 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Yes/not applicable</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Is essential imaging displayed?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox20 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Yes/not applicable</label>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>SIGN OUT</h4>
                                        <h5>Before any member of the team leaves the operation room</h5>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Surgeon verbally confirms with the team:</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox21 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Has the name of the procadure been
                                            recorded?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox22 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Has it been confirmed that instruments,
                                            swabs
                                            and
                                            sharps counts are complete (or not applicable)?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox23 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Have the specimens been labelled (including
                                            patient name)?</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox24 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;Have any equipment problems been identifies
                                            that
                                            need to be addressed?</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>Surgeon and anaesthetist:</label>
                                        <br>
                                        <?php if ($surgical_checklist->checkbox25 == "true") { ?>
                                            <i class="fa fa-check-square" style="font-size: 18px;"></i>
                                        <?php } else { ?>
                                            <i class="fa fa-square-o" style="font-size: 18px;"></i>
                                        <?php } ?>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text">&nbsp;What are the key concerns for recovery and
                                            management of this patient?</label>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <i class="fa fa-check-circle-o" id="sty-4"
                               style="<?php if ($post_operative_instructions->isSave == "1") {
                                   echo "color: green;";
                               } ?>"></i>
                            <h3 class="box-title">Post-Operative Instructions</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body">
                            <input type="hidden" id="post-op-i-no" name="post-op-i-no"
                                   value="<?php echo $post_operative_instructions->postOpINo; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>1. For Recovery Area</h4>
                                </div><!-- /.form-group -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->forRecoveryArea)) {
                                                echo $post_operative_instructions->forRecoveryArea;
                                            } ?></label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>2. For next 24 to 48 Hours</h4>
                                    <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Post Operative Orders</h5>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label>Fluids</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->fluids)) {
                                                echo $post_operative_instructions->fluids;
                                            } ?></label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label>Antibiotics</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->antibiotics)) {
                                                echo $post_operative_instructions->antibiotics;
                                            } ?></label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label>Analgesics</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->analgesics)) {
                                                echo $post_operative_instructions->analgesics;
                                            } ?></label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>3. Special Instructions</h4>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->specialInstructions)) {
                                                echo $post_operative_instructions->specialInstructions;
                                            } ?></label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>4. Instructions for Pathological / Biopsy Specimen</h4>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->instructionsForPathological)) {
                                                echo $post_operative_instructions->instructionsForPathological;
                                            } ?></label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>5. (To be filled in by Scrub Nurse)</h4>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label>Intra Operative estimated blood loss</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->bloodLoss)) {
                                                echo $post_operative_instructions->bloodLoss;
                                            } ?>&nbsp;ml</label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label>Intra Operative Blood Transfusion</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->bloodTransfusion)) {
                                                echo $post_operative_instructions->bloodTransfusion;
                                            } ?></label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label>Intra Operative I.V fluids </label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->ivFluids)) {
                                                echo $post_operative_instructions->ivFluids;
                                            } ?></label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-12">
                                        <label>Intra Operative Urine Output </label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->urineOutput)) {
                                                echo $post_operative_instructions->urineOutput;
                                            } ?>&nbsp;ml</label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="col-md-7">
                                        <label>Swab / Instruments count complete </label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($post_operative_instructions->sawbOrInstruments)) {
                                                echo $post_operative_instructions->sawbOrInstruments;
                                            } ?></label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                        </div><!-- /.box-body -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="box-header with-border">
                            <i class="fa fa-check-circle-o" id="sty-5"
                               style="<?php if ($protocol_receiving_patient_ot->isSave == "1") {
                                   echo "color: green;";
                               } ?>"></i>
                            <h3 class="box-title">Protocol of Receiving Patient from Operation Theatre</h3>
                        </div><!-- /.box-header -->
                        <div class="box-body" >
                            <input type="hidden" id="pro-rec-pat-ot-no" name="pro-rec-pat-ot-no"
                                   value="<?php echo $protocol_receiving_patient_ot->recPatOtNo; ?>">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>1. Patient form operation theater should be received by House
                                                Officer
                                                and Nurse
                                                on duty present on Nursing Station.</label>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>&nbsp;&nbsp;&nbsp;Name of House Officer in block letters</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->houseOfficerId)) {
                                                echo $protocol_receiving_patient_ot->houseOfficerId;
                                            } ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>&nbsp;&nbsp;&nbsp;Name of Nurse in block letters</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->nurseId)) {
                                                if (!empty($nurse_list)) {
                                                    foreach ($nurse_list as $n_key) {
                                                        if ($n_key['id'] == $protocol_receiving_patient_ot->nurseId) {
                                                            echo $n_key['full_name'];;
                                                        }
                                                    }
                                                }
                                            } ?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label>2. Documents Received</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->documentsReceived)) {
                                                echo $protocol_receiving_patient_ot->documentsReceived;
                                            } ?></label>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label>3. Patient Category</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->patientCategory)) {
                                                echo $protocol_receiving_patient_ot->patientCategory;
                                            } ?></label>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>4. Receiving notes should include</label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;&nbsp;&bull; Patient Alertness</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->patientAlertness)) {
                                                echo $protocol_receiving_patient_ot->patientAlertness;
                                            } ?></label>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;&nbsp;&bull; Vitals</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Doctor</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pulse</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->pulseDoctor)) {
                                                    echo $protocol_receiving_patient_ot->pulseDoctor;
                                                } ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B.P</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->bpDoctor)) {
                                                    echo $protocol_receiving_patient_ot->bpDoctor;
                                                } ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temp</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->tempDoctor)) {
                                                    echo $protocol_receiving_patient_ot->tempDoctor;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R/R</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->rrDoctor)) {
                                                    echo $protocol_receiving_patient_ot->rrDoctor;
                                                } ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GCS</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->gcsDoctor)) {
                                                    echo $protocol_receiving_patient_ot->gcsDoctor;
                                                } ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CVP</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->cvpDoctor)) {
                                                    echo $protocol_receiving_patient_ot->cvpDoctor;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nurse</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Pulse</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->pulseNurse)) {
                                                    echo $protocol_receiving_patient_ot->pulseNurse;
                                                } ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;B.P</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->bpNurse)) {
                                                    echo $protocol_receiving_patient_ot->bpNurse;
                                                } ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Temp</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->tempNurse)) {
                                                    echo $protocol_receiving_patient_ot->tempNurse;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;R/R</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->rrNurse)) {
                                                    echo $protocol_receiving_patient_ot->rrNurse;
                                                } ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;GCS</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->gcsNurse)) {
                                                    echo $protocol_receiving_patient_ot->gcsNurse;
                                                } ?></label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="col-md-12">
                                            <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;CVP</label>&nbsp;&nbsp;&nbsp;
                                            <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->cvpNurse)) {
                                                    echo $protocol_receiving_patient_ot->cvpNurse;
                                                } ?></label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <label>&nbsp;&nbsp;&nbsp;&bull; Status of drains</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->statusOfDrains)) {
                                                echo $protocol_receiving_patient_ot->statusOfDrains;
                                            } ?></label>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>&nbsp;&nbsp;&nbsp;&bull; Biopsy specimen</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->biopsySpecimen)) {
                                                echo $protocol_receiving_patient_ot->biopsySpecimen;
                                            } ?></label>&nbsp;&nbsp;&nbsp;<label> Reason</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->biopsySpecimenReason)) {
                                                echo $protocol_receiving_patient_ot->biopsySpecimenReason;
                                            } ?></label>&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>&nbsp;&nbsp;&nbsp;&bull; Dressing</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->dressing)) {
                                                echo $protocol_receiving_patient_ot->dressing;
                                            } ?></label>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>5. Patient should be nursed in lateral position with all drains
                                            and
                                            I/V lines on one side of the bed.</label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>6. Extra I/V lines + ECG electrodes should be removed.</label>
                                    </div>
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>7. Blood transfusion</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->bloodTransfusion)) {
                                                echo $protocol_receiving_patient_ot->bloodTransfusion;
                                            } ?></label>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <label>8. Operation Notes and postoperative orders checked</label>&nbsp;&nbsp;&nbsp;
                                        <label class="checklist-text"><?php if (!empty($protocol_receiving_patient_ot->operationNotesOrdersChecked)) {
                                                echo $protocol_receiving_patient_ot->operationNotesOrdersChecked;
                                            } ?></label>&nbsp;&nbsp;&nbsp;
                                    </div>
                                </div>
                            </div>
                            <div class="row pull-right">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <button type="submit"
                                                class="btn bg-blue btn-flat margin print-ot-form-btn">
                                            <i
                                                    class="fa fa-print" aria-hidden="true"></i>&nbsp; Print
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.box-body -->
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
<script>
    $('.print-ot-form-btn').click(function () {
        window.print();
    });
</script>
</html>
