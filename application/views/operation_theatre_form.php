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
    label{
        line-height: 10px;
    }
    #consent-form {
        background-size: contain;
        /* height: 100%; */
        background-size: 100%;
        background: url("<?php echo base_url('assets/dist/img/consent_form.png'); ?>") no-repeat;
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
        .box-heading{
            border-bottom: 1px solid #f4f4f4;
            padding: 20px 40px;
        }
    }
    .serg-header{
        margin:15px;
        border-bottom:1px solid #f0f0f0;
    }
    .panel-body label {
        line-height: 20px;
        font-weight:500;
        font-size:13px;
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
                    <div id="pre-op-fitness-form" class="row">
                        <div class="col-md-12">
                            <div class="box-header with-border">
                                <i class="fa fa-check-circle-o" id="sty-1"
                                style="<?php
                                if ($pre_op_fitness->isSave == "1") {
                                   echo "color: green;";
                               }
                               ?>"></i>
                               <h3 class="box-title">Pre-Operation Fitness Form</h3>
                           </div><!-- /.box-header -->
                           <div id="pre-op-fitness-body" class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="hidden" id="pre-opf-no" name="pre-opf-no"
                                    value="<?php echo $pre_op_fitness->preOpFNo; ?>">
                                    <input type="hidden" id="reg-no" name="reg-no"
                                    value="<?php echo $pre_op_fitness->regNo; ?>">
                                    <input type="hidden" id="ot-booking-no" name="ot-booking-no"
                                    value="<?php echo $pre_op_fitness->otBookingNo; ?>">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <h4 class="text-center">Anesthesia Fitness by Anesthetist</h4>
                                            </div><!-- /.form-group -->
                                        </div><!-- /.col -->
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">

                                                <div class="col-md-12">
                                                    <label>Remarks</label>
                                                    <textarea class="form-control" type="text" name="anesthetist-remarks"
                                                    id="anesthetist-remarks" rows="4"
                                                    required="required" maxlength="100"
                                                    placeholder="Type the remarks here"><?php
                                                    if (!empty($pre_op_fitness->anesthetistRemarks)) {
                                                      echo $pre_op_fitness->anesthetistRemarks;
                                                  }
                                                  ?>
                                              </textarea>
                                          </div>
                                      </div>
                                  </div><!-- /.col -->
                              </div><!-- /.row -->
                              <br>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Advice</label>
                                            <textarea class="form-control" type="text" name="anesthetist-advice"
                                            id="anesthetist-advice" rows="4"
                                            required="required" maxlength="100"
                                            placeholder="Type the advice here">
                                            <?php
                                            if (!empty($pre_op_fitness->anesthetistAdvice)) {
                                              echo $pre_op_fitness->anesthetistAdvice;
                                          }
                                          ?>
                                      </textarea>
                                  </div>
                              </div>
                          </div><!-- /.col -->
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Name of Anesthetist</label>
                                    <input class="form-control" required="required" type="text" maxlength="15"
                                    value="<?php
                                    if (!empty($pre_op_fitness->anesthetistName)) {
                                       echo $pre_op_fitness->anesthetistName;
                                   }
                                   ?>"
                                   name="anesthetist-name" id="anesthetist-name"
                                   placeholder="Type the name of anesthetist">
                               </div>
                           </div><!-- /.form-group -->
                       </div><!-- /.col -->
                   </div>
               </div>
            <div class="col-md-6" style="border-left:1px solid #ccc;">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <h4 class="text-center">Medical Fitness by Physician</h4>
                        </div><!-- /.form-group -->
                    </div><!-- /.col -->
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Remarks</label>
                                <textarea class="form-control" type="text" name="physician-remarks"
                                id="physician-remarks" rows="4" maxlength="100"
                                required="required"
                                placeholder="Type the remarks here"><?php
                                if (!empty($pre_op_fitness->physicianRemarks)) {
                                  echo $pre_op_fitness->physicianRemarks;
                              }
                              ?></textarea>
                          </div>
                      </div>
                  </div><!-- /.col -->
              </div><!-- /.row -->
              <br>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>Advice</label>
                            <textarea class="form-control" type="text" name="physician-advice"
                            id="physician-advice" rows="4" maxlength="100"
                            required="required"
                            placeholder="Type the advice here"><?php
                            if (!empty($pre_op_fitness->physicianAdvice)) {
                              echo $pre_op_fitness->physicianAdvice;
                          }
                          ?></textarea>
                      </div>
                  </div>
              </div><!-- /.col -->
          </div>
          <br>
          <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>Name of Anesthetist</label>
                        <input class="form-control" required="required" type="text" maxlength="15"
                        value="<?php
                        if (!empty($pre_op_fitness->physicianName)) {
                           echo $pre_op_fitness->physicianName;
                       }
                       ?>"
                       name="physician-name" id="physician-name"
                       placeholder="Type the name of anesthetist">
                   </div>
               </div><!-- /.form-group -->
           </div><!-- /.col -->
       </div>
   </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <div class="col-md-8 ">
                <h4>Any Other</h4>
                <textarea class="form-control" required="required" type="text" rows="4" maxlength="100" name="any-other" id="any-other" placeholder="Type any other information here">
                    <?php
                    if (!empty($pre_op_fitness->anyOther)) {
                        echo $pre_op_fitness->anyOther;
                    }
                    ?>
                </textarea>
            </div>
        </div><!-- /.form-group -->
    </div><!-- /.col -->
</div>
<br>
<div class="row pull-right">
    <div class="col-md-12">
        <div class="form-group">
            <button type="submit" id="pre-op-fitness-save-btn"
            class="btn bg-green btn-flat margin">
            <i
            class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save
        </button>
        <button type="submit" id="pre-op-fitness-print-btn"
        class="btn bg-green btn-flat margin" style="visibility:hidden;">
        <i
        class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Print
    </button>
    <button type="submit" id="pre-op-fitness-next-btn"
    class="btn bg-blue btn-flat margin">
    Next &nbsp;<i
    class="fa fa-chevron-right" aria-hidden="true"></i>
</button>
</div>
</div>
</div>
</div>
</div>
</div>
<div id="preoperative-order-form" class="row collapsed-box" >
    <div class="col-md-12">
        <div class="box-header with-border">
            <i class="fa fa-check-circle-o" id="sty-2" style="<?php
            if ($pre_op_order->isSave == "1") {
                echo "color: green;";
            }
            ?>"></i>
            <h3 class="box-title">Preoperative Orders</h3>
        </div><!-- /.box-header -->
        <div id="preoperative-order-body"  class="box-body" style="display:none;">
            <input type="hidden" id="pre-opo-no" name="pre-opo-no"
            value="<?php echo $pre_op_order->preOpONo; ?>">
            <input type="hidden" id="reg-no1" name="reg-no1"
            value="<?php echo $pre_op_order->regNo; ?>">
            <input type="hidden" id="ot-booking-no1" name="ot-booking-no1"
            value="<?php echo $pre_op_order->otBookingNo; ?>">

            <?php $patient_list = $this->model_hms->get_add_discharge_patient_by_reg_no($pre_op_order->regNo); ?>
            <div class="container" style="width:100%;">
                <div class="panel panel-default">
                    <div class="panel-heading">Patient Information</div>
                    <div class="panel-body">
                        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <label>MR#:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $patient_list->regNo; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-5">
                                            <label>Patient Name:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <p><?php echo $patient_list->patName; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <label><?php echo $patient_list->patNoKType; ?>:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $patient_list->patNoK; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <label>Age:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $patient_list->patAge; ?></p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-5">
                                            <label>Bed Number:</label>
                                        </div>
                                        <div class="col-md-7">
                                            <p><?php
                                            $bedNo = $this->model_hms->get_bed_name_wrt_ward($patient_list->patbed_id);
                                            if ($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed") {
                                                echo "Extra Bed " . $bedNo->bed;
                                            } else {
                                                echo $bedNo->bed;
                                            }
                                            ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-4">
                                            <label>Sex:</label>
                                        </div>
                                        <div class="col-md-8">
                                            <p><?php echo $patient_list->patSex; ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row" style="border-bottom: 1px solid #f4f4f4; margin: 10px 0px;">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="col-md-6">
                                            <label>Date &amp; Time:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <p id="date-time-now"><?php
                                            if (!empty($pre_op_order->dateString)) {
                                                echo $pre_op_order->dateString;
                                            } else {
                                                date_default_timezone_set("Asia/Karachi");
                                                $nowdatetime = date('d-m-Y h:i A');
                                                echo $nowdatetime;
                                            }
                                            ?></p>
                                        </div>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>
                </div>
            </div> <br><br>
            <div class="row" style="margin:0px; ">
                <div class="col-md-6">
                    <div class="form-group">

                        <div class="col-md-5">
                            <label>Operation Site</label>
                        </div>
                        <div class="col-md-5">
                            <input type="radio" required="required"
                            class="custom-radio" name="operation-site"
                            id="operation-site"
                            value="Left" <?php
                            if ($pre_op_order->operationSite == "Left") {
                               echo "checked";
                           }
                           ?> ><label
                           class="radio-labels"> Left</label>
                           <input type="radio" required="required" name="operation-site"
                           class="custom-radio"
                           id="operation-site"
                           value="Right" <?php
                           if ($pre_op_order->operationSite == "Right") {
                               echo "checked";
                           }
                           ?> ><label class="radio-labels">
                           Right</label></div>
                       </div><!-- /.form-group -->
                   </div><!-- /.col -->
                   <div class="col-md-6">
                    <div class="form-group">

                        <div class="col-md-5">
                            <label>Operation Side Marked</label>
                        </div>
                        <div class="col-md-5">
                            <input type="radio" required="required" name="operation-side-marked"
                            class="custom-radio"
                            id="operation-side-marked"
                            value="Yes" <?php
                            if ($pre_op_order->operationSideMarked == "Yes") {
                               echo "checked";
                           }
                           ?>><label
                           class="radio-labels"> Yes&nbsp;</label>
                           <input type="radio" required="required" name="operation-side-marked"
                           class="custom-radio"
                           id="operation-side-marked"
                           value="No" <?php
                           if ($pre_op_order->operationSideMarked == "No") {
                               echo "checked";
                           }
                           ?>><label
                           class="radio-labels">
                       No</label></div>
                   </div><!-- /.form-group -->
               </div><!-- /.col -->
           </div>
           <br />
           <div class="row" style="margin:0px;">
            <div class="col-md-4">
                <div class="form-group">
                    <h4 style="margin-top: 28px; margin-left: 12px;">Marks of Identification</h4>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
            <div class="col-md-4">
                <div class="form-group">
                    <div class="col-md-11">
                        <label>1.Marks of Identification</label>
                        <input class="form-control" required="required" type="text"
                        id="marks-identification-1" maxlength="20"
                        value="<?php
                        if (!empty($pre_op_order->marksIdentification1)) {
                           echo $pre_op_order->marksIdentification1;
                       }
                       ?>"
                       placeholder="Type the marks of Identification here"
                       autocomplete="off">
                   </div>
               </div>
           </div>
           <div class="col-md-4">
            <div class="form-group">
                <div class="col-md-11">
                    <label>2.Marks of Identification</label>
                    <input class="form-control" required="required" type="text"
                    id="marks-identification-2" maxlength="20"
                    value="<?php
                    if (!empty($pre_op_order->marksIdentification2)) {
                       echo $pre_op_order->marksIdentification2;
                   }
                   ?>"
                   placeholder="Type the marks of Identification here"
                   autocomplete="off">
               </div>
           </div>
       </div><!-- /.form-group -->
   </div>
   <br />
   <div class="row" style="margin: 10px 0px;">
    <div class="col-md-4">
        <div class="form-group">
            <div class="col-md-12">
                <input type="checkbox"
                id="give-bath" <?php
                if ($pre_op_order->giveBath == "true") {
                   echo "checked";
               }
               ?> >
               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Give Bath</label>
           </div>
       </div>
   </div>
   <div class="col-md-4">
    <div class="form-group">
        <div class="col-md-12">
            <input type="checkbox"
            id="mark-operation-site" <?php
            if ($pre_op_order->markOperationSite == "true") {
               echo "checked";
           }
           ?>>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Mark Operation Site</label>
       </div>
   </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <div class="col-md-12">
            <input type="checkbox"
            id="provide-hospital-dress" <?php
            if ($pre_op_order->provideHospitalDress == "true") {
               echo "checked";
           }
           ?>>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<label>Provide Hospital Dress</label>
       </div>
   </div>
</div>
</div>
<br>
<div class="row" style="margin: 10px 0px;">
    <div class="col-md-4">
        <div class="form-group">
            <div class="col-md-12">
                <label>Shave and Prepare the area</label>
                <input class="form-control" required="required" type="text" id="area-name"
                autocomplete="off" maxlength="30"
                value="<?php
                if (!empty($pre_op_order->areaName)) {
                   echo $pre_op_order->areaName;
               }
               ?>">
           </div>
       </div>
   </div>
   <div class="col-md-4">
    <div class="form-group ">
        <div class="col-md-12 ">
            <label>N.P.O From</label>
            <div class="input-group date bootstrap-timepicker timepicker">
                <div class="input-group-addon">
                    <i class="fa fa-clock-o"></i>
                </div>
                <input class="form-control " required="required" type="text"
                id="npo-form"
                value="<?php
                if (!empty($pre_op_order->npoFormTime)) {
                   echo $pre_op_order->npoFormTime;
               }
               ?>"
               placeholder="Select Time" autocomplete="off">
           </div>
       </div>
   </div>
</div>
<div class="col-md-4">
    <div class="form-group">
        <div class="col-md-12">
            <label>Arrange _________ Pints of blood</label>
            <input class="form-control" required="required" type="text"
            id="arrange-blood" autocomplete="off" maxlength="10"
            value="<?php
            if (!empty($pre_op_order->arrangeBlood)) {
               echo $pre_op_order->arrangeBlood;
           }
           ?>">

       </div>
   </div>
</div>
</div>
<br>
<div class="row" style="margin: 10px 0px;">
    <div class="col-md-4">
        <div class="form-group">
            <div class="col-md-12">
                <label>Send Patient to Operation Theatre at</label>
                <div class="input-group date bootstrap-timepicker timepicker">
                    <div class="input-group-addon">
                        <i class="fa fa-clock-o"></i>
                    </div>
                    <input class="form-control " required="required" type="text"
                    id="send-patient-ot" 
                    value="<?php
                    if (!empty($pre_op_order->sendPatientOtTime)) {
                       echo $pre_op_order->sendPatientOtTime;
                   }
                   ?>"
                   placeholder="Select Time " autocomplete="off">
               </div>
           </div>
       </div>
   </div><!-- /.col -->
   <div class="col-md-8">
    <div class="form-group">
        <div class="col-md-12">
            <label>Send following investigation to the operation theatre</label>
            <input class="form-control" required="required" type="text"
            id="send-f-investigation-ot" autocomplete="off" maxlength="20"
            value="<?php
            if (!empty($pre_op_order->sendFInvestigationOt)) {
               echo $pre_op_order->sendFInvestigationOt;
           }
           ?>">
       </div>
   </div>
</div>

</div>

<br>
<div class="row" style=" margin: 10px 0px;">
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-12">
                <label>Pre-Medication</label>
                <textarea class="form-control" required="required" id="pre-medication"
                placeholder="Type the Pre-Medication here" rows="3" maxlength="100"
                autocomplete="off"><?php
                if (!empty($pre_op_order->preMedication)) {
                  echo $pre_op_order->preMedication;
              }
              ?></textarea>
          </div>
      </div>
  </div>
  <div class="col-md-6">
    <div class="form-group">
        <div class="col-md-12">
            <label>Any Other Specific Order</label>
            <textarea class="form-control" required="required" type="text"
            id="any-other-order" maxlength="50"
            placeholder="Type the any other specific order here"
            rows="3"
            autocomplete="off"><?php
            if (!empty($pre_op_order->anyOtherOrder)) {
              echo $pre_op_order->anyOtherOrder;
          }
          ?></textarea>
      </div>
  </div>
</div>
</div>
<br>
<div class="row" style="margin: 10px 0px;">
    <div class="col-md-12">
        <div class="form-group">
            <h4>Instructions About Use of Special Instruments</h4>
        </div><!-- /.form-group -->
    </div><!-- /.col -->
</div>
<div class="row" style="margin: 10px 0px;">
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-4">
                <label>Laproscopic Use</label>
            </div>
            <div class="col-md-4">
                <input type="radio" required="required" name="laproscopic-use"
                class="custom-radio"
                id="laproscopic-use"
                value="Yes" <?php
                if ($pre_op_order->laproscopicUse == "Yes") {
                   echo "checked";
               }
               ?> ><label class="radio-labels">
               Yes</label>
               <input type="radio" required="required" name="laproscopic-use"
               class="custom-radio"
               id="laproscopic-use"
               value="No" <?php
               if ($pre_op_order->laproscopicUse == "No") {
                   echo "checked";
               }
               ?> ><label class="radio-labels">
               No</label></div>
           </div><!-- /.form-group -->
       </div><!-- /.col -->
   </div>
   <div class="row" style=" margin: 10px 0px;">
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-4">
                <label>Diathermy Use</label>
            </div>
            <div class="col-md-4">
                <input type="radio" required="required" name="diathermy-use"
                class="custom-radio"
                id="diathermy-use"
                value="Yes" <?php
                if ($pre_op_order->diathermyUse == "Yes") {
                   echo "checked";
               }
               ?> ><label class="radio-labels">
               Yes</label>
               <input type="radio" required="required" name="diathermy-use"
               class="custom-radio"
               id="diathermy-use"
               value="No" <?php
               if ($pre_op_order->diathermyUse == "No") {
                   echo "checked";
               }
               ?> ><label class="radio-labels">
               No</label></div>
           </div><!-- /.form-group -->
       </div><!-- /.col -->
   </div>
   <div class="row" style=" margin: 10px 0px;">
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-4">
                <label>Tourniquet Use</label>
            </div>
            <div class="col-md-4">
                <input type="radio" required="required" name="tourniquet-use"
                class="custom-radio"
                id="tourniquet-use"
                value="Yes" <?php
                if ($pre_op_order->tourniquetUse == "Yes") {
                   echo "checked";
               }
               ?> ><label
               class="radio-labels">
           Yes</label>
           <input type="radio" required="required" name="tourniquet-use"
           class="custom-radio"
           id="tourniquet-use"
           value="No" <?php
           if ($pre_op_order->tourniquetUse == "No") {
               echo "checked";
           }
           ?> ><label class="radio-labels">
           No</label>
       </div>
   </div><!-- /.form-group -->
</div><!-- /.col -->
</div>
<div class="row" style=" margin: 10px 0px;">
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-4">
                <label>X-Ray Use</label>
            </div>
            <div class="col-md-4">
                <input type="radio" required="required" name="x-ray-use"
                class="custom-radio"
                id="x-ray-use"
                value="Yes" <?php
                if ($pre_op_order->xRayUse == "Yes") {
                   echo "checked";
               }
               ?> ><label class="radio-labels"> Yes</label>
               <input type="radio" required="required" name="x-ray-use"
               class="custom-radio"
               id="x-ray-use" value="No" <?php
               if ($pre_op_order->xRayUse == "No") {
                   echo "checked";
               }
               ?> ><label class="radio-labels">
               No</label></div>
           </div><!-- /.form-group -->
       </div><!-- /.col -->
   </div>
   <div class="row" style=" margin: 10px 0px;">
    <div class="col-md-6">
        <div class="form-group">
            <div class="col-md-4">
                <label>Laser Use</label>
            </div>
            <div class="col-md-4">
                <input type="radio" required="required" name="laser-use"
                class="custom-radio"
                id="laser-use"
                value="Yes" <?php
                if ($pre_op_order->laserUse == "Yes") {
                   echo "checked";
               }
               ?> ><label
               class="radio-labels"> Yes</label>
               <input type="radio" required="required" name="laser-use"
               class="custom-radio"
               id="laser-use"
               value="No" <?php
               if ($pre_op_order->laserUse == "No") {
                   echo "checked";
               }
               ?> ><label class="radio-labels">
               No</label></div>
           </div><!-- /.form-group -->
       </div><!-- /.col -->
   </div>
   <br>
   <br>
   <div class="row pull-right">
    <div class="col-md-12">
        <div class="form-group">
            <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
            <button type="submit" id="preoperative-order-previous-btn"
            class="btn bg-blue btn-flat margin"><i
            class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;
            Previous
        </button>
        <?php if ($user_value == "0") { ?>
            <button type="submit" class="btn bg-green btn-flat margin"
            id="preoperative-order-save-btn"><i
            class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save
        </button>
    <?php } ?>
    <button type="submit" id="preoperative-order-next-btn"
    class="btn bg-blue btn-flat margin"> Next &nbsp;<i
    class="fa fa-chevron-right" aria-hidden="true"></i>
</button>
<button type="submit" id="pre-op-order-print-btn"
class="btn bg-green btn-flat margin" style="visibility:hidden;">
<i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print
</button>
</div>
</div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div id="preoperative-check-form" class="row collapsed-box" >
    <div class="col-md-12">
        <div class="box-header with-border">
            <i class="fa fa-check-circle-o" id="sty-2" style="<?php
            if ($pre_op_checklist->isSave == "1") {
                echo "color: green;";
            }
            ?>"></i>
            <h3 class="box-title">Preoperative Check list</h3>
        </div><!-- /.box-header -->
        <div id="preoperative-check-body"  class="box-body" style="display:none;">
            <input type="hidden" id="pre-opc-no" name="pre-opc-no"
            value="<?php echo $pre_op_checklist->preOpCLid; ?>">
            <input type="hidden" id="cl-regno" name="cl_reg-no"
            value="<?php echo $pre_op_checklist->regNo; ?>">
            <input type="hidden" id="cl-ot-booking-no" name="cl_ot-booking-no"
            value="<?php echo $pre_op_checklist->otBookingNo; ?>">
            <br />
            <div class="row" >
                <div class="col-md-6">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Filled By Dr.</label>
                            <input class="form-control" required="required" type="text" maxlength="20" id="cl-drname" value="<?php echo $pre_op_checklist->filled_by_dr; ?>" placeholder="Enter Doctor Name " autocomplete="off">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">

                            <label>Date</label>
                            <div class="input-group date bootstrap-timepicker timepicker">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" class="form-control" id="cl-datepicker"  value="<?php
                                if (!empty($pre_op_checklist->checkList_date)) {
                                    echo $cldate = date('Y-m-d', strtotime($pre_op_checklist->checkList_date));
                                    } else {
                                        date_default_timezone_set("Asia/Karachi");
                                        $nowdatetime = date('d-m-Y h:i A');
                                        echo $nowdatetime;
                                    }
                                    ?>" name="cl_date" autocomplete="off" placeholder="Set Date">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">

                                <label>Diagnosis</label>
                                <input class="form-control" required="required" type="text" name="cl_diagnosis" maxlength="20" id="cl-diagnosis" value="<?php echo $pre_op_checklist->diagnosis; ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group">

                                <label>Operation Planned</label>
                                <input class="form-control" required="required" type="text" id="cl-operation-planned" maxlength="20" name="cl_op_planned" value="<?php echo $pre_op_checklist->operation_planned; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">

                                <label>Informed Consent</label>
                                <input class="form-control" required="required" type="text" id="cl-informed-consent" maxlength="20" name="cl_informed_consent" value="<?php echo $pre_op_checklist->informed_consent; ?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">

                                <label>Surgeon</label>
                                <input class="form-control" required="required" type="text" id="cl-surgeon" name="cl_surgeon" maxlength="20" value="<?php echo $pre_op_checklist->surgeon; ?>" autocomplete="off">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="row" style="margin:0px;">
                    <div class="col-md-3">
                        <label>B.P.</label>
                        <input class="form-control" required="required" type="text" id="cl-bp" maxlength="3" value="<?php echo $pre_op_checklist->checklist_bp; ?>" name="cl_bp" autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <label>Pulse</label>
                        <input class="form-control" required="required" type="text" id="cl-pulse" maxlength="3" value="<?php echo $pre_op_checklist->checklist_pulse; ?>" name="cl_pulse" autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <label>Temp</label>
                        <input class="form-control" required="required" type="text" id="cl-temp" maxlength="3" value="<?php echo $pre_op_checklist->chehcklist_temp; ?>" name="cl_temp" autocomplete="off">
                    </div>
                    <div class="col-md-3">
                        <label>Resp/Rate</label>
                        <input class="form-control" required="required" type="text" id="cl-resprate" maxlength="3" value="<?php echo $pre_op_checklist->checklist_rep_rate; ?>" name="cl_resprate" autocomplete="off">
                    </div>
                </div>
                <br />
                <div class="row" style="margin: 10px 0px;">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>N.P.O From</label>
                            <div class="input-group date bootstrap-timepicker timepicker">
                                <div class="input-group-addon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <input class="form-control " required="required" type="text"
                                id="lis-npo-form" value="<?php
                                if (!empty($pre_op_checklist->checklist_npo)) {
                                   echo $cldate = date('h:i A', strtotime($pre_op_checklist->checklist_npo));
                                   } else {
                                       date_default_timezone_set("Asia/Karachi");
                                       $nowdatetime = date('h:i A');
                                       echo $nowtime;
                                   }
                                   ?>" placeholder="Select Time" name="cl_npo" autocomplete="off">
                               </div>
                           </div>
                       </div>
                       <div class="col-md-3">
                        <div class="form-group" style="margin-top: 28px;">
                            <label style="margin-right: 20px;">Give Bath</label>
                            <input type="checkbox" id="cl-give-bath" name="cl_birth" maxlength="10" <?php
                            if ($pre_op_checklist->givebath == "true") {
                                echo "checked";
                            }
                            ?> >
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 28px;">
                            <div class="col-md-12">
                                <label style="margin-right: 20px;">Hospital Dress</label>
                                <input type="checkbox" id="cl-hospital-dress" name="cl_hp_dress" maxlength="20"  <?php
                                if ($pre_op_checklist->hospital_dress == "true") {
                                    echo "checked";
                                }
                                ?>>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group" style="margin-top: 28px;">
                            <label style="margin-right: 20px;">Shave</label>
                            <input type="checkbox" id="cl-shave" name="cl_shave" maxlength="10" <?php
                            if ($pre_op_checklist->shave == "true") {
                                echo "checked";
                            }
                            ?>>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="container" style="width:100%;">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3>Test Result</h3></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Hb</label>
                                        <input class="form-control" required="required" type="text" id="cl-hb" name="cl_hb" maxlength="10" value="<?php echo $pre_op_checklist->checklist_hb; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <label>ESR</label>
                                        <input class="form-control" required="required" type="text" id="cl-esr" name="cl_esr" maxlength="10" value="<?php echo $pre_op_checklist->checklist_esr; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <label>S/Na<sup>+</sup></label>
                                        <input class="form-control" required="required" type="text" id="cl-sna" name="cl_sna" maxlength="10" value="<?php echo $pre_op_checklist->checklist_sNa; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <label>S/K<sup>+</sup></label>
                                        <input class="form-control" required="required" type="text" id="cl-sk" name="cl_sk" maxlength="10" value="<?php echo $pre_op_checklist->check_sK; ?>" autocomplete="off">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>S/Ca++(in a case thyroid)</label>
                                        <input class="form-control" required="required" type="text" id="cl-sca" name="cl_sca" maxlength="10" value="<?php echo $pre_op_checklist->checklist_sCa; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <label>PT</label>
                                        <input class="form-control" required="required" type="text" id="cl-pt" name="cl_pt" maxlength="10" value="<?php echo $pre_op_checklist->checklist_pt; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <label>APTT<sup>+</sup></label>
                                        <input class="form-control" required="required" type="text" id="cl-aptt" name="cl_aptt" maxlength="10" value="<?php echo $pre_op_checklist->checklist_aptt; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <label>TLC</label>
                                        <input class="form-control" required="required" type="text" id="cl-tlc" name="cl_tlc" maxlength="10" value="<?php echo $pre_op_checklist->checklist_tlc; ?>" autocomplete="off">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>RBS</label>
                                        <input class="form-control" required="required" type="text" id="cl-rbs" name="cl_rbs"  maxlength="10" value="<?php echo $pre_op_checklist->checklist_rbs; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <label>HBsAg</label>
                                        <input class="form-control" required="required" type="text" id="cl-hbsab" name="cl_hbsab" maxlength="10" value="<?php echo $pre_op_checklist->checklist_HBsAg; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Anti HCV</label>
                                        <input class="form-control" required="required" type="text" id="cl-antihcv" name="cl_antihcv" maxlength="10" value="<?php echo $pre_op_checklist->anti_HCV; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-3">
                                        <label>Diabetic Status</label>
                                        <input class="form-control" required="required" type="text" id="cl-diabetic-status" name="cl_diabetic_status" maxlength="10" value="<?php echo $pre_op_checklist->diabatic_status; ?>" autocomplete="off">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Hypertension Status</label>
                                        <input class="form-control" required="required" type="text" id="cl-hypertension-status" name="cl_hypertension_status" maxlength="10" value="<?php echo $pre_op_checklist->hypertenstion_status; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>ECG (For every Pt above 30years)</label>
                                        <input class="form-control" required="required" type="text" id="cl-ecg"  maxlength="10" name="cl_ecg" value="<?php echo $pre_op_checklist->checklist_ECG; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Any other Co-morbid Conditions</label>
                                        <input class="form-control" required="required" type="text" id="cl-anyother-condition" name="cl_anyother_condition" maxlength="10" value="<?php echo $pre_op_checklist->checklist_anyother; ?>" autocomplete="off">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container" style="width:100%;">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h3>Special Investigations</h3></div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>Biopsy(Specify)</label>
                                        <input class="form-control" required="required" type="text" id="cl-biopsy" maxlength="50" value="<?php echo $pre_op_checklist->biopsy; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Lopogram</label>
                                        <input class="form-control" required="required" type="text" id="cl-lopogram" maxlength="10" value="<?php echo $pre_op_checklist->lopogram; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Chalangiogram</label>
                                        <input class="form-control" required="required" type="text" id="cl-chalangiogram" maxlength="10" value="<?php echo $pre_op_checklist->chalangiogram; ?>" autocomplete="off">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>CT/MRI</label>
                                        <input class="form-control" required="required" type="text" id="cl-ct-mri" maxlength="10" value="<?php echo $pre_op_checklist->checklist_ct_mri; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>FNAC</label>
                                        <input class="form-control" required="required" type="text" id="cl-fnac" maxlength="10" value="<?php echo $pre_op_checklist->checklist_fnac; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>U/S(Specify)</label>
                                        <input class="form-control" required="required" type="text" id="cl-us" maxlength="10" value="<?php echo $pre_op_checklist->chekclist_us; ?>" autocomplete="off">
                                    </div>
                                </div>
                                <br />
                                <div class="row">
                                    <div class="col-md-4">
                                        <label>CXR</label>
                                        <input class="form-control" required="required" type="text" id="cl-cxr" maxlength="10" value="<?php echo $pre_op_checklist->checklist_cxr; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>IVU</label>
                                        <input class="form-control" required="required" type="text" id="cl-ivu" maxlength="10" value="<?php echo $pre_op_checklist->si_ivu; ?>" autocomplete="off">
                                    </div>
                                    <div class="col-md-4">
                                        <label>Any Other(Specify)</label>
                                        <input class="form-control" required="required" type="text" id="cl-anyother" maxlength="10" value="<?php echo $pre_op_checklist->si_anyother; ?>" autocomplete="off">
                                    </div>
                                </div>
                                <br />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="container" style="width:100%;">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3>Circle Correct Answer</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Call for fitness from anesthesia accomplished</label>
                                            </div>
                                            <div class="col-md-3">
                                                <input type="radio" required="required" name="cl_radio1"
                                                class="custom-radio"
                                                id="cl-radio1"
                                                value="Yes" <?php
                                                if ($pre_op_checklist->checklist_radio1 == "Yes") {
                                                   echo "checked";
                                               }
                                               ?> ><label class="radio-labels">
                                               Yes</label>
                                               <input type="radio" required="required" name="cl_radio1"
                                               class="custom-radio"
                                               id="cl-radio1"
                                               value="No" <?php
                                               if ($pre_op_checklist->checklist_radio1 == "No") {
                                                   echo "checked";
                                               }
                                               ?> ><label class="radio-labels">
                                               No</label></div>
                                           </div><!-- /.form-group -->
                                       </div><!-- /.col -->
                                   </div>
                                   <br />
                                   <div class="row" >
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="col-md-6">
                                                <label>Patient Categorized according to anesthesia(ASA)</label>
                                            </div>
                                            <div class="col-md-6">
                                                <input type="radio" required="required" name="cl_radio2"
                                                class="custom-radio"
                                                id="cl-asa"
                                                value="Completeley fit" <?php
                                                if ($pre_op_checklist->checklist_radio2 == "Yes") {
                                                   echo "checked";
                                               }
                                               ?> ><label class="radio-labels">
                                               Completely fit</label>
                                               <input type="radio" required="required" name="cl_radio2"
                                               class="custom-radio"
                                               id="cl-asa"
                                               value="Cont Premorbid" <?php
                                               if ($pre_op_checklist->checklist_radio2 == "No") {
                                                   echo "checked";
                                               }
                                               ?> ><label class="radio-labels">
                                               Cont Premorbid</label>
                                               <input type="radio" required="required" name="cl_radio2"
                                               class="custom-radio"
                                               id="cl-asa"
                                               value="Uncount" <?php
                                               if ($pre_op_checklist->checklist_radio2 == "No") {
                                                   echo "checked";
                                               }
                                               ?> ><label class="radio-labels">
                                               Uncount</label>
                                           </div>
                                       </div><!-- /.form-group -->
                                   </div><!-- /.col -->
                               </div>
                               <br />
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Donor of blood arrange(In case of indication)</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" required="required" name="cl_radio3"
                                            class="custom-radio"
                                            id="cl-blood-donor"
                                            value="Yes" <?php
                                            if ($pre_op_checklist->checklist_radio3 == "Yes") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           Yes</label>
                                           <input type="radio" required="required" name="cl_radio3"
                                           class="custom-radio"
                                           id="cl-blood-donor"
                                           value="No" <?php
                                           if ($pre_op_checklist->checklist_radio3 == "No") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           No</label></div>
                                       </div><!-- /.form-group -->
                                   </div><!-- /.col -->
                               </div>
                               <br />
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>items required for operation arranged</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" required="required" name="cl_radio4"
                                            class="custom-radio"
                                            id="cl-items-arranged"
                                            value="Yes" <?php
                                            if ($pre_op_checklist->checklist_radio4 == "Yes") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           Yes</label>
                                           <input type="radio" required="required" name="cl_radio4"
                                           class="custom-radio"
                                           id="cl-items-arranged"
                                           value="No" <?php
                                           if ($pre_op_checklist->checklist_radio4 == "No") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           No</label></div>
                                       </div><!-- /.form-group -->
                                   </div><!-- /.col -->
                               </div>
                               <br />
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Pre-Op orders carried out</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" required="required" name="cl_radio5"
                                            class="custom-radio"
                                            id="cl-preoporder-carried"
                                            value="Yes" <?php
                                            if ($pre_op_checklist->checklist_radio5 == "Yes") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           Yes</label>
                                           <input type="radio" required="required" name="cl_radio5"
                                           class="custom-radio"
                                           id="cl-preoporder-carried"
                                           value="No" <?php
                                           if ($pre_op_checklist->checklist_radio5 == "No") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           No</label></div>
                                       </div><!-- /.form-group -->
                                   </div><!-- /.col -->
                               </div>
                               <br />
                               <div class="row" >
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Pre-Medication Given</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" required="required" name="cl_radio6"
                                            class="custom-radio"
                                            id="cl-pre-medication"
                                            value="Yes" <?php
                                            if ($pre_op_checklist->checklist_radio6 == "Yes") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           Yes</label>
                                           <input type="radio" required="required" name="cl_radio6"
                                           class="custom-radio"
                                           id="cl-pre-medication"
                                           value="No" <?php
                                           if ($pre_op_checklist->checklist_radio6 == "No") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           No</label></div>
                                       </div><!-- /.form-group -->
                                   </div><!-- /.col -->
                               </div>
                               <br />
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Any Drug Allergies</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" required="required" name="cl_radio7"
                                            class="custom-radio"
                                            id="cl_drug_allergies"
                                            value="Yes" <?php
                                            if ($pre_op_checklist->checklist_radio7 == "Yes") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           Yes</label>
                                           <input type="radio" required="required" name="cl_radio7"
                                           class="custom-radio"
                                           id="cl_drug_allergies"
                                           value="No" <?php
                                           if ($pre_op_checklist->checklist_radio7 == "No") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           No</label></div>
                                       </div><!-- /.form-group -->
                                   </div><!-- /.col -->
                               </div>
                               <br />
                               <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <label>Theater Asepsis Confirmed</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="radio" required="required" name="cl_radio8"
                                            class="custom-radio"
                                            id="cl-theater-asepsis"
                                            value="Yes" <?php
                                            if ($pre_op_checklist->checklist_radio8 == "Yes") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           Yes</label>
                                           <input type="radio" required="required" name="cl_radio8"
                                           class="custom-radio"
                                           id="cl-theater-asepsis"
                                           value="No" <?php
                                           if ($pre_op_checklist->checklist_radio8 == "No") {
                                               echo "checked";
                                           }
                                           ?> ><label class="radio-labels">
                                           No</label></div>
                                       </div><!-- /.form-group -->
                                   </div><!-- /.col -->
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
               <br>
               <br>
               <div class="row pull-right">
                <div class="col-md-12">
                    <div class="form-group">
                        <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                        <button type="submit" id="preoperative-checklist-previous-btn"
                        class="btn bg-blue btn-flat margin"><i
                        class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;
                        Previous
                    </button>
                    <?php if ($user_value == "0") { ?>
                        <button type="submit" class="btn bg-green btn-flat margin"
                        id="preoperative-check-save-btn"><i
                        class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save
                    </button>
                <?php } ?>
                <button type="submit" id="preoperative-checklist-next-btn"
                class="btn bg-blue btn-flat margin"> Next &nbsp;<i
                class="fa fa-chevron-right" aria-hidden="true"></i>
            </button>
            <button type="submit" id="pre-op-check-print-btn"
            class="btn bg-green btn-flat margin" style="visibility:hidden;">
            <i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print
        </button>
    </div>
</div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div id="post-operative-performa-form" class="row collapsed-box">
    <div class="col-md-12">
        <div class="box-header with-border">
            <i class="fa fa-check-circle-o" id="sty-6" style="<?php
            if ($consent_op->isSave == "1") {
                echo "color: green;";
            }
            ?>"></i>
            <h3 class="box-title">Consent for Operation</h3>
        </div><!-- /.box-header -->
        <div id="post-operative-performa-body" class="box-body" style="display: none;">
            <input type="hidden" id="consent-op-no" name="consent-op-no"
            value="<?php echo $consent_op->consentOpNo; ?>">
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12 res-img" id="consent-form">
                            <label id="label-name"><?php echo $patient_list->patName . " " . $patient_list->patNoKType . " " . $patient_list->patNoK; ?></label>
                            <br>
                            <label class="pull-right"
                            id="label-reg"><?php echo $patient_list->regNo; ?></label>
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
            </div>
            <br>
            <div class="row pull-right">
                <div class="col-md-12">
                    <div class="form-group">
                        <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                        <button type="submit" id="post-operative-performa-previous-btn"
                        class="btn bg-blue btn-flat margin"><i
                        class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;
                        Previous
                    </button>
                    <button type="submit" id="post-operative-performa-save-btn"
                    class="btn bg-green btn-flat margin"><i
                    class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save
                </button>
                <button type="submit" id="post-operative-performa-next-btn"
                class="btn bg-blue btn-flat margin"> Next &nbsp;<i
                class="fa fa-chevron-right" aria-hidden="true"></i>
            </button>
            <button type="submit" id="ot-consent-print-btn"
            class="btn bg-green btn-flat margin" style="visibility:hidden;">
            <i class="fa fa-print" aria-hidden="true"></i>&nbsp; Print
        </button>
    </div>
</div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div id="surgical-safety-checklist-form" class="row collapsed-box">
    <div class="col-md-12">
        <div class="box-header with-border">
            <i class="fa fa-check-circle-o" id="sty-3"
            style="<?php
            if ($surgical_checklist->isSave == "1") {
               echo "color: green;";
           }
           ?>"></i>
           <h3 class="box-title">Surgical Safety Checklist / Surgical Ward II</h3>
       </div><!-- /.box-header -->
       <div id="surgical-safety-checklist-body" class="box-body" style="display:none;">
        <input type="hidden" id="surgical-sc-no" name="surgical-sc-no"
        value="<?php echo $surgical_checklist->surgicalSCNo; ?>">
        <div class="container" style="width:100%;">
            <div class="panel panel-default">
                <div class="panel-heading">Patient Information</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <label>MR#</label>
                                    </div>
                                    <div class="col-md-7">
                                        <p><?php echo $patient_list->regNo; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <label>Patient Name</label>
                                    </div>
                                    <div class="col-md-7">
                                        <p><?php echo $patient_list->patName; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <label><?php echo $patient_list->patNoKType; ?></label>
                                    </div>
                                    <div class="col-md-7">
                                        <p><?php echo $patient_list->patNoK; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-8">
                                        <label>Bed Number</label>
                                    </div>
                                    <div class="col-md-4">
                                        <p><?php
                                        $bedNo = $this->model_hms->get_bed_name_wrt_ward($patient_list->patbed_id);
                                        if ($bedNo->status == "Extra Bed" || $bedNo->status == "Occupied Extra Bed") {
                                            echo "Extra Bed " . $bedNo->bed;
                                        } else {
                                            echo $bedNo->bed;
                                        }
                                        ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <div class="col-md-5">
                                        <label>Sex</label>
                                    </div>
                                    <div class="col-md-7">
                                        <p><?php echo $patient_list->patSex; ?></p>
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
                                        <p><?php echo $patient_list->patAge; ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <br>
        <div class="row" style="border-bottom:1px solid #000; margin-bottom:10px;">
            <div class="col-md-6" style="padding:0px;">
                <div class="container" style="width:100%;">
                    <h4>SIGN IN</h4>
                    <div class="panel panel-default">
                        <div class="panel-heading">Before induction of Anesthesia</div>
                        <div class="panel-body">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <label>Has the patient
                                    confirmed his/her identify, site, procedure and consent?</label><br>
                                    <label class="checklist-text">
                                        <input type="checkbox" id="checkbox-1" 
                                        <?php
                                        if ($surgical_checklist->checkbox1 == "true") {
                                            echo "checked";
                                        }
                                        ?>>&nbsp;&nbsp;&nbsp;Yes</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Is the surgical
                                        site marked?</label><br>
                                        <label class="checklist-text">
                                            <input type="checkbox" id="checkbox-2" 
                                            <?php
                                            if ($surgical_checklist->checkbox2 == "true") {
                                                echo "checked";
                                            }
                                            ?>>&nbsp;&nbsp;&nbsp; Yes/not applicable </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>Is the
                                            anesthesia machine and medication check complete?</label><br>
                                            <label class="checklist-text">
                                                <input type="checkbox" id="checkbox-3" 
                                                <?php
                                                if ($surgical_checklist->checkbox3 == "true") {
                                                    echo "checked";
                                                }
                                                ?> >&nbsp;&nbsp;&nbsp;Yes</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <label>Does the patient
                                                    have a: <br>Known allergy? </label><br>
                                                    <label class="checklist-text">
                                                        <input type="radio" id="radio-4" name="radio-4" value="No" 
                                                        <?php
                                                        if ($surgical_checklist->radio4 == "No") {
                                                            echo "checked";
                                                        }
                                                        ?> >&nbsp;&nbsp;&nbsp;No</label><br>
                                                        <label class="checklist-text">
                                                            <input type="radio" id="radio-4" name="radio-4" value="Yes" 
                                                            <?php
                                                            if ($surgical_checklist->radio4 == "Yes") {
                                                                echo "checked";
                                                            }
                                                            ?> >&nbsp;&nbsp;&nbsp;Yes</label>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label>Difficult airway/aspiration risk:</label><br>
                                                            <label class="checklist-text">
                                                                <input type="radio" id="radio-5" name="radio-5" value="No" 
                                                                <?php
                                                                if ($surgical_checklist->radio5 == "No") {
                                                                    echo "checked";
                                                                }
                                                                ?>>&nbsp;&nbsp;&nbsp;No</label><br>
                                                                <label class="checklist-text">
                                                                    <input type="radio" id="radio-5" name="radio-5" value="Yes" 
                                                                    <?php
                                                                    if ($surgical_checklist->radio5 == "Yes") {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>&nbsp;&nbsp;&nbsp;Yes and equipment/assistance
                                                                available</label>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label>Risk of >500ml blood loss (7ml/kg in children)?</label><br>
                                                                <label class="checklist-text">
                                                                    <input type="radio" id="radio-6" name="radio-6" value="No" 
                                                                    <?php
                                                                    if ($surgical_checklist->radio6 == "No") {
                                                                        echo "checked";
                                                                    }
                                                                    ?>>&nbsp;&nbsp;&nbsp;No</label><br>
                                                                    <label class="checklist-text">
                                                                        <input type="radio" id="radio-6" name="radio-6" value="Yes" 
                                                                        <?php
                                                                        if ($surgical_checklist->radio6 == "Yes") {
                                                                            echo "checked";
                                                                        }
                                                                        ?>>&nbsp;&nbsp;&nbsp;Yes
                                                                        and adequate IV access/fluids
                                                                    planned</label>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="serg-header">
                                                                        <h4>SIGN OUT</h4>
                                                                        <h5>Before any member of the team leaves the operation room</h5>
                                                                    </div><!-- /.form-group -->
                                                                </div><!-- /.col -->
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label>Surgeon verbally confirms with the team:</label><br>
                                                                            <label class="checklist-text">
                                                                                <input type="checkbox" id="checkbox-21" 
                                                                                <?php
                                                                                if ($surgical_checklist->checkbox21 == "true") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>&nbsp;&nbsp;&nbsp;Has the name of the procadure been
                                                                                recorded?
                                                                            </label><br>
                                                                            <label class="checklist-text">
                                                                                <input type="checkbox" id="checkbox-22" 
                                                                                <?php
                                                                                if ($surgical_checklist->checkbox22 == "true") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>&nbsp;&nbsp;&nbsp;Has it been confirmed that instruments, swabs and
                                                                                sharps counts are complete (or not applicable)?
                                                                            </label><br>
                                                                            <label class="checklist-text">
                                                                                <input type="checkbox" id="checkbox-23" 
                                                                                <?php
                                                                                if ($surgical_checklist->checkbox23 == "true") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>&nbsp;&nbsp;&nbsp;Have the specimens been labelled (including
                                                                                patient name)?
                                                                            </label><br>
                                                                            <label class="checklist-text">
                                                                                <input type="checkbox" id="checkbox-24" 
                                                                                <?php
                                                                                if ($surgical_checklist->checkbox24 == "true") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>&nbsp;&nbsp;&nbsp;Have any equipment problems been identifies that
                                                                                need to be addressed?
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <div class="col-md-12">
                                                                            <label>Surgeon and anaesthetist:</label><br>
                                                                            <label class="checklist-text">
                                                                                <input type="checkbox" id="checkbox-25" 
                                                                                <?php
                                                                                if ($surgical_checklist->checkbox25 == "true") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>&nbsp;&nbsp;&nbsp;What are the key concerns for recovery and
                                                                            management of this patient?</label><br>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="container" style="width:100%;">
                                            <div class="col-md-6" style="padding:0px;">
                                                <h4>TIME OUT</h4>
                                                <div class="panel panel-default">
                                                    <div class="panel-heading">Before start of surgical intervention for example, skin inclusion</div>
                                                    <div class="panel-body">

                                                        <div class="form-group">
                                                            <div class="col-md-12">
                                                                <label>Have all team members introduced himselves by name and
                                                                role?</label><br>
                                                                <label class="checklist-text">
                                                                    <input type="checkbox" id="checkbox-7" 
                                                                    <?php
                                                                    if ($surgical_checklist->checkbox7 == "true") {
                                                                        echo "checked";
                                                                    }
                                                                    ?> >&nbsp;&nbsp;&nbsp;Yes</label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label>Surgeon and anaesthetist verbally confirm:</label><br>
                                                                    <label class="checklist-text">
                                                                        <input type="checkbox" id="checkbox-8" 
                                                                        <?php
                                                                        if ($surgical_checklist->checkbox8 == "true") {
                                                                            echo "checked";
                                                                        }
                                                                        ?>>&nbsp;&nbsp;&nbsp;What is the patient's name?</label><br>
                                                                        <label class="checklist-text">
                                                                            <input type="checkbox" id="checkbox-9" 
                                                                            <?php
                                                                            if ($surgical_checklist->checkbox9 == "true") {
                                                                                echo "checked";
                                                                            }
                                                                            ?> >&nbsp;&nbsp;&nbsp;What procedure, Site and position are
                                                                        planned?</label>
                                                                    </div>
                                                                </div>
                                                                <div class="form-group">
                                                                    <div class="col-md-12">
                                                                        <label>Anticipated critical events</label><br>
                                                                        <label>Surgeon:</label><br>
                                                                        <label class="checklist-text">
                                                                            <input type="checkbox" id="checkbox-10" 
                                                                            <?php
                                                                            if ($surgical_checklist->checkbox10 == "true") {
                                                                                echo "checked";
                                                                            }
                                                                            ?>>&nbsp;&nbsp;&nbsp;How much blood loss is anticipated?</label><br>
                                                                            <label class="checklist-text">
                                                                                <input type="checkbox" id="checkbox-11" 
                                                                                <?php
                                                                                if ($surgical_checklist->checkbox11 == "true") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>&nbsp;&nbsp;&nbsp;Are there any specific equipment requirements or
                                                                            special investigation?</label><br>
                                                                            <label class="checklist-text">
                                                                                <input type="checkbox" id="checkbox-12" 
                                                                                <?php
                                                                                if ($surgical_checklist->checkbox12 == "true") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>&nbsp;&nbsp;&nbsp;Are there any critical or unexpected steps you
                                                                            want the team to know about?</label><br>
                                                                            <label>Anaesthetist:</label><br>
                                                                            <label class="checklist-text">
                                                                                <input type="checkbox" id="checkbox-13" 
                                                                                <?php
                                                                                if ($surgical_checklist->checkbox13 == "true") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>&nbsp;&nbsp;&nbsp;Are there any patient specific
                                                                            concerns?</label><br>
                                                                            <label class="checklist-text">
                                                                                <input type="checkbox" id="checkbox-14" 
                                                                                <?php
                                                                                if ($surgical_checklist->checkbox14 == "true") {
                                                                                    echo "checked";
                                                                                }
                                                                                ?>>&nbsp;&nbsp;&nbsp;What is the patient's ASA grade?</label><br>
                                                                                <label class="checklist-text">
                                                                                    <input type="checkbox" id="checkbox-15" 
                                                                                    <?php
                                                                                    if ($surgical_checklist->checkbox15 == "true") {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>&nbsp;&nbsp;&nbsp;What monitoring equipment and other specific
                                                                                levels of support are required for example blood?</label><br>
                                                                                <label>Nurse/ODP:</label><br>
                                                                                <label class="checklist-text">
                                                                                    <input type="checkbox" id="checkbox-16" 
                                                                                    <?php
                                                                                    if ($surgical_checklist->checkbox16 == "true") {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>&nbsp;&nbsp;&nbsp;Has the sterility of the instrumentation been
                                                                                confirmed (including indicator results)?</label><br>
                                                                                <label class="checklist-text">
                                                                                    <input type="checkbox" id="checkbox-17" 
                                                                                    <?php
                                                                                    if ($surgical_checklist->checkbox17 == "true") {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>&nbsp;&nbsp;&nbsp;Are there any equipment issues of
                                                                                    concerns?
                                                                                </label>
                                                                                <br>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <label>Has the surgical site infection (SSI) bundle been undertaken?</label><br>
                                                                                <label class="checklist-text">
                                                                                    <input type="checkbox" id="checkbox-18" 
                                                                                    <?php
                                                                                    if ($surgical_checklist->checkbox18 == "true") {
                                                                                        echo "checked";
                                                                                    }
                                                                                    ?>>&nbsp;&nbsp;&nbsp;Yes/not applicable</label><br>
                                                                                    <label class="checklist-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-
                                                                                        Antianemic controliotic prophylaxis within the last 60
                                                                                    minutes</label><br>
                                                                                    <label class="checklist-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Patient
                                                                                    warming</label><br>
                                                                                    <label class="checklist-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;- Hair
                                                                                    removal</label><br>
                                                                                    <label class="checklist-text">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-
                                                                                    Glycemic  control</label>
                                                                                </div>
                                                                            </div>
                                                                            <div class="form-group">
                                                                                <div class="col-md-12">
                                                                                    <label>Has VTE prophylaxis been undertaken?</label><br>
                                                                                    <label class="checklist-text">
                                                                                        <input type="checkbox" id="checkbox-19" 
                                                                                        <?php
                                                                                        if ($surgical_checklist->checkbox19 == "true") {
                                                                                            echo "checked";
                                                                                        }
                                                                                        ?>>&nbsp;&nbsp;&nbsp;Yes/not applicable</label>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-12">
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-12">
                                                                                            <label>Is essential imaging displayed?</label><br>
                                                                                            <label class="checklist-text">
                                                                                                <input type="checkbox" id="checkbox-20" 
                                                                                                <?php
                                                                                                if ($surgical_checklist->checkbox20 == "true") {
                                                                                                    echo "checked";
                                                                                                }
                                                                                                ?>>&nbsp;&nbsp;&nbsp;Yes/not applicable</label>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>

                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>

                                                                <div class="row pull-right">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group">
                                                                            <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                                                                            <button type="submit" id="surgical-safety-checklist-previous-btn"
                                                                            class="btn bg-blue btn-flat margin"><i
                                                                            class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;
                                                                            Previous
                                                                        </button>
                                                                        <button type="submit" class="btn bg-green btn-flat margin"
                                                                        id="surgical-safety-checklist-save-btn"><i
                                                                        class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save
                                                                    </button>
                                                                    <button type="submit" id="surgical-safety-checklist-next-btn"
                                                                    class="btn bg-blue btn-flat margin"> Next &nbsp;<i
                                                                    class="fa fa-chevron-right" aria-hidden="true"></i>
                                                                </button>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.box-body -->
                                            </div>
                                        </div>
                                        <div id="post-operative-instructions-form" class="row collapsed-box">
                                            <div class="col-md-12">
                                                <div class="box-header with-border">
                                                    <i class="fa fa-check-circle-o" id="sty-4"
                                                    style="<?php
                                                    if ($post_operative_instructions->isSave == "1") {
                                                       echo "color: green;";
                                                   }
                                                   ?>"></i>
                                                   <h3 class="box-title">Post-Operative Instructions</h3>
                                               </div><!-- /.box-header -->
                                               <div id="post-operative-instructions-body" class="box-body" style="display: none;">
                                                <input type="hidden" id="post-op-i-no" name="post-op-i-no"
                                                value="<?php echo $post_operative_instructions->postOpINo; ?>">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <h4>1. For Recovery Area</h4>
                                                        </div><!-- /.form-group -->
                                                    </div><!-- /.col -->
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-7">
                                                        <div class="form-group">
                                                            <div class="col-md-2">
                                                                <label></label>
                                                            </div>
                                                            <div class="col-md-10">
                                                                <textarea class="form-control" type="text" name="for-recovery-area"
                                                                id="for-recovery-area" rows="4" maxlength="100"
                                                                required="required"
                                                                placeholder="Type here"><?php
                                                                if (!empty($post_operative_instructions->forRecoveryArea)) {
                                                                  echo $post_operative_instructions->forRecoveryArea;
                                                              }
                                                              ?></textarea>
                                                          </div>
                                                      </div>
                                                  </div><!-- /.col -->
                                              </div>
                                              <br>
                                              <div class="row">
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <h4>2. For next 24 to 48 Hours</h4>
                                                        <h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Post Operative Orders</h5>
                                                    </div><!-- /.form-group -->
                                                </div><!-- /.col -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <div class="col-md-2">
                                                            <label>Fluids</label>
                                                        </div>
                                                        <div class="col-md-10">
                                                            <textarea class="form-control" type="text" name="fluids"
                                                            id="fluids" rows="4" maxlength="100"
                                                            required="required"
                                                            placeholder="Type the fluids here"><?php
                                                            if (!empty($post_operative_instructions->fluids)) {
                                                              echo $post_operative_instructions->fluids;
                                                          }
                                                          ?></textarea>
                                                      </div>
                                                  </div>
                                              </div><!-- /.col -->
                                          </div>
                                          <br>
                                          <div class="row">
                                            <div class="col-md-7">
                                                <div class="form-group">
                                                    <div class="col-md-2">
                                                        <label>Antibiotics</label>
                                                    </div>
                                                    <div class="col-md-10">
                                                        <textarea class="form-control" type="text" name="antibiotics"
                                                        id="antibiotics" rows="4" maxlength="100"
                                                        required="required"
                                                        placeholder="Type the antibiotics here"><?php
                                                        if (!empty($post_operative_instructions->antibiotics)) {
                                                          echo $post_operative_instructions->antibiotics;
                                                      }
                                                      ?></textarea>
                                                  </div>
                                              </div>
                                          </div><!-- /.col -->
                                      </div>
                                      <br>
                                      <div class="row">
                                        <div class="col-md-7">
                                            <div class="form-group">
                                                <div class="col-md-2">
                                                    <label>Analgesics</label>
                                                </div>
                                                <div class="col-md-10">
                                                    <textarea class="form-control" type="text" name="analgesics"
                                                    id="analgesics" rows="4" maxlength="100"
                                                    required="required"
                                                    placeholder="Type the analgesics here"><?php
                                                    if (!empty($post_operative_instructions->analgesics)) {
                                                      echo $post_operative_instructions->analgesics;
                                                  }
                                                  ?></textarea>
                                              </div>
                                          </div>
                                      </div><!-- /.col -->
                                  </div>
                                  <br>
                                  <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <h4>3. Special Instructions</h4>
                                        </div><!-- /.form-group -->
                                    </div><!-- /.col -->
                                </div>
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="form-group">
                                            <div class="col-md-2">
                                                <label></label>
                                            </div>
                                            <div class="col-md-10">
                                                <textarea class="form-control" type="text" name="special-instructions"
                                                id="special-instructions" rows="4" maxlength="100"
                                                required="required"
                                                placeholder="Type the special instructions here"><?php
                                                if (!empty($post_operative_instructions->specialInstructions)) {
                                                  echo $post_operative_instructions->specialInstructions;
                                              }
                                              ?></textarea>
                                          </div>
                                      </div>
                                  </div><!-- /.col -->
                              </div>
                              <br>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <h4>4. Instructions for Pathological / Biopsy Specimen</h4>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <div class="col-md-2">
                                            <label></label>
                                        </div>
                                        <div class="col-md-10">
                                            <textarea class="form-control" type="text"
                                            name="instructions-for-pathological" maxlength="100"
                                            id="instructions-for-pathological" rows="4"
                                            required="required"
                                            placeholder="Type the instructions for Pathological / Biopsy Specimen here"><?php
                                            if (!empty($post_operative_instructions->instructionsForPathological)) {
                                              echo $post_operative_instructions->instructionsForPathological;
                                          }
                                          ?></textarea>
                                      </div>
                                  </div>
                              </div><!-- /.col -->
                          </div>
                          <br>
                          <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <h4>5. (To be filled in by Scrub Nurse)</h4>
                                </div><!-- /.form-group -->
                            </div><!-- /.col -->
                        </div>
                        <div class="row">
                            <div class="col-md-7">
                                <div class="form-group">
                                    <div class="col-md-7">
                                        <label>Intra Operative estimated blood loss</label>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="input-group">
                                            <input class="form-control" type="text" name="blood-loss"
                                            id="blood-loss" maxlength="10"
                                            required="required"
                                            placeholder="Type here"
                                            value="<?php
                                            if (!empty($post_operative_instructions->bloodLoss)) {
                                               echo $post_operative_instructions->bloodLoss;
                                           }
                                           ?>">
                                           <div class="input-group-addon">
                                            ml
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.col -->
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-7">
                            <div class="form-group">
                                <div class="col-md-7">
                                    <label>Intra Operative Blood Transfusion</label>
                                </div>
                                <div class="col-md-5">
                                    <input class="form-control" type="text" name="blood-transfusion"
                                    id="blood-transfusion"
                                    required="required" maxlength="10"
                                    placeholder="Type here"
                                    value="<?php
                                    if (!empty($post_operative_instructions->bloodTransfusion)) {
                                       echo $post_operative_instructions->bloodTransfusion;
                                   }
                                   ?>">
                               </div>
                           </div>
                       </div><!-- /.col -->
                   </div>
                   <br>
                   <div class="row">
                    <div class="col-md-7">
                        <div class="form-group">
                            <div class="col-md-7">
                                <label>Intra Operative I.V fluids </label>
                            </div>
                            <div class="col-md-5">
                                <input class="form-control" type="text" name="iv-fluids"
                                id="iv-fluids" maxlength="10"
                                required="required"
                                placeholder="Type here"
                                value="<?php
                                if (!empty($post_operative_instructions->ivFluids)) {
                                   echo $post_operative_instructions->ivFluids;
                               }
                               ?>">
                           </div>
                       </div>
                   </div><!-- /.col -->
               </div>
               <br>
               <div class="row">
                <div class="col-md-7">
                    <div class="form-group">
                        <div class="col-md-7">
                            <label>Intra Operative Urine Output </label>
                        </div>
                        <div class="col-md-5">
                            <div class="input-group">
                                <input class="form-control" type="text" name="urine-output"
                                id="urine-output" maxlength="10"
                                required="required"
                                placeholder="Type here"
                                value="<?php
                                if (!empty($post_operative_instructions->urineOutput)) {
                                   echo $post_operative_instructions->urineOutput;
                               }
                               ?>">
                               <div class="input-group-addon">
                                ml
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- /.col -->
        </div>
        <br>
        <div class="row">
            <div class="col-md-7">
                <div class="form-group">
                    <div class="col-md-7">
                        <label>Swab / Instruments count complete </label>
                    </div>
                    <div class="col-md-5">
                        <input class="form-control" type="radio" name="sawb-radio"
                        id="sawb-radio"
                        value="Yes" <?php
                        if ($post_operative_instructions->sawbOrInstruments == "Yes") {
                           echo "checked";
                       }
                       ?>> Yes
                       &nbsp;&nbsp;&nbsp;&nbsp;
                       <input class="form-control" type="radio" name="sawb-radio"
                       id="sawb-radio"
                       value="No" <?php
                       if ($post_operative_instructions->sawbOrInstruments == "No") {
                           echo "checked";
                       }
                       ?>> No
                   </div>
               </div>
           </div><!-- /.col -->
       </div>
       <br>
       <div class="row pull-right">
        <div class="col-md-12">
            <div class="form-group">
                <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                <button type="submit" id="post-operative-instructions-previous-btn"
                class="btn bg-blue btn-flat margin"><i
                class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;
                Previous
            </button>
            <?php if ($user_value == "0") { ?>
                <button type="submit" id="post-operative-instructions-save-btn"
                class="btn bg-green btn-flat margin"><i
                class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save
            </button>
        <?php } elseif ($user_value == "1") { ?>
            <button type="submit" id="post-operative-instructions-nurse-save-btn"
            class="btn bg-green btn-flat margin"><i
            class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save
        </button>
    <?php } ?>
    <button type="submit" id="post-operative-instructions-next-btn"
    class="btn bg-blue btn-flat margin"> Next &nbsp;<i
    class="fa fa-chevron-right" aria-hidden="true"></i>
</button>
<button type="submit" id="post-op-instruction-print-btn"
class="btn bg-green btn-flat margin" style="visibility:hidden;">
<i
class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Print
</button>
</div>
</div>
</div>
</div><!-- /.box-body -->
</div>
</div>
<div id="protocol-receiving-patient-ot-form" class="row collapsed-box">
    <div class="col-md-12">
        <div class="box-header with-border">
            <i class="fa fa-check-circle-o" id="sty-5"
            style="<?php
            if ($protocol_receiving_patient_ot->isSave == "1") {
               echo "color: green;";
           }
           ?>"></i>
           <h3 class="box-title">Protocol of Receiving Patient from Operation Theatre</h3>
       </div><!-- /.box-header -->
       <div id="protocol-receiving-patient-ot-body" class="box-body" style="display:none;">
        <input type="hidden" id="pro-rec-pat-ot-no" name="pro-rec-pat-ot-no"
        value="<?php echo $protocol_receiving_patient_ot->recPatOtNo; ?>">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <div class="col-md-12">
                        <label>1. Patient form operation theatre should be received by House Officer
                            and Nurse
                        on duty present on Nursing Station.</label>
                    </div>
                </div><!-- /.form-group -->
            </div><!-- /.col -->
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
                <div class="col-md-3">
                    <div class="form-group">
                        <label>Name of House Officer in block
                        letters</label>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <input class="form-control" id="house-officer-id" required="required" maxlength="20"
                        value="<?php
                        if (!empty($protocol_receiving_patient_ot->houseOfficerId)) {
                           echo $protocol_receiving_patient_ot->houseOfficerId;
                       }
                       ?>"
                       placeholder="Type house officer name here">
                   </div>
               </div>
           </div>
       </div>
       <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Name of Nurse in block letters</label>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <select class="form-control nurse-no" required="required"
                    style="width:100%;" id="nurse-id">
                    <option value=""></option>
                    <?php
                    if (!empty($nurse_list)) {
                        foreach ($nurse_list as $n_key) {
                            ?>
                            <option value="<?php echo $n_key['id']; ?>" <?php
                            if ($n_key['id'] == $protocol_receiving_patient_ot->nurseId) {
                                echo "selected";
                            }
                            ?>><?php echo $n_key['full_name']; ?></option>
                            <?php
                        }
                    }
                    ?>
                </select>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label>2. Documents Received</label>
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group">
                <label class="checklist-text"><input type="radio" name="documents-received"
                 value="Yes" <?php
                 if ($protocol_receiving_patient_ot->documentsReceived == "Yes") {
                     echo "checked";
                 }
                 ?> >&nbsp;&nbsp;&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;
                 <label class="checklist-text"><input type="radio" name="documents-received"
                     value="No" <?php
                     if ($protocol_receiving_patient_ot->documentsReceived == "No") {
                         echo "checked";
                     }
                     ?> >&nbsp;&nbsp;&nbsp;No</label>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
        <div class="col-md-12">
            <div class="col-md-3">
                <div class="form-group">
                    <label>3. Patient Category</label>
                </div>
            </div>
            <div class="col-md-9">
                <div class="form-group">
                    <label class="checklist-text"><input type="radio"
                     name="patient-category"
                     value="HDU" <?php
                     if ($protocol_receiving_patient_ot->patientCategory == "HDU") {
                         echo "checked";
                     }
                     ?> >&nbsp;&nbsp;&nbsp;HDU</label>&nbsp;&nbsp;&nbsp;
                     <label class="checklist-text"><input type="radio" name="patient-category"
                         value="Ward" <?php
                         if ($protocol_receiving_patient_ot->patientCategory == "Ward") {
                             echo "checked";
                         }
                         ?> >&nbsp;&nbsp;&nbsp;Ward</label>&nbsp;&nbsp;&nbsp;
                         <label class="checklist-text"><input type="radio" name="patient-category"
                             value="Side Room" <?php
                             if ($protocol_receiving_patient_ot->patientCategory == "Side Room") {
                                 echo "checked";
                             }
                             ?> >&nbsp;&nbsp;&nbsp;Side Room</label>
                         </div>
                     </div>
                 </div>
             </div>
             <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="col-md-12">
                            <label>4. Receiving notes should include</label>
                        </div>
                    </div><!-- /.form-group -->
                </div><!-- /.col -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>&bull; Patient Alertness</label>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="form-group">
                            <label class="checklist-text"><input type="radio" name="patient-alertness" maxlength="10"
                             value="A" <?php
                             if ($protocol_receiving_patient_ot->patientAlertness == "A") {
                                 echo "checked";
                             }
                             ?> >&nbsp;&nbsp;&nbsp;A</label>&nbsp;&nbsp;&nbsp;
                             <label class="checklist-text"><input type="radio" name="patient-alertness" maxlength="10"
                                 value="V" <?php
                                 if ($protocol_receiving_patient_ot->patientAlertness == "V") {
                                     echo "checked";
                                 }
                                 ?> >&nbsp;&nbsp;&nbsp;V</label>&nbsp;&nbsp;&nbsp;
                                 <label class="checklist-text"><input type="radio" name="patient-alertness" maxlength="10"
                                     value="No" <?php
                                     if ($protocol_receiving_patient_ot->patientAlertness == "P") {
                                         echo "checked";
                                     }
                                     ?> >&nbsp;&nbsp;&nbsp;P</label>&nbsp;&nbsp;&nbsp;
                                     <label class="checklist-text"><input type="radio" name="patient-alertness" maxlength="10"
                                         value="U" <?php
                                         if ($protocol_receiving_patient_ot->patientAlertness == "U") {
                                             echo "checked";
                                         }
                                         ?> >&nbsp;&nbsp;&nbsp;U</label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                        <div class="container" style="width:100%;">
                            <h4>Vitals</h4>
                            <div class="panel panel-default">
                                <div class="panel-heading">Doctor</div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                        <strong>Pulse</strong>
                                                    </div>
                                                    <div class="col-md-9">
                                                        <input class="form-control" type="text"
                                                        id="pulse-doctor" maxlength="10"
                                                        required="required"
                                                        value="<?php
                                                        if (!empty($protocol_receiving_patient_ot->pulseDoctor)) {
                                                           echo $protocol_receiving_patient_ot->pulseDoctor;
                                                       }
                                                       ?>"
                                                       placeholder="Type here">
                                                   </div>
                                               </div>
                                           </div>
                                           <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-3">
                                                    <strong>B.P</strong>
                                                </div>
                                                <div class="col-md-9">
                                                    <input class="form-control" type="text" id="bp-doctor"
                                                    required="required" maxlength="10"
                                                    value="<?php
                                                    if (!empty($protocol_receiving_patient_ot->bpDoctor)) {
                                                       echo $protocol_receiving_patient_ot->bpDoctor;
                                                   }
                                                   ?>"
                                                   placeholder="Type here">
                                               </div>
                                           </div>
                                       </div>
                                       <div class="col-md-4">
                                        <div class="form-group">
                                            <div class="col-md-3">
                                                <strong>Temp</strong>
                                            </div>
                                            <div class="col-md-9">
                                                <input class="form-control" type="text" id="temp-doctor"
                                                required="required" maxlength="10"
                                                value="<?php
                                                if (!empty($protocol_receiving_patient_ot->tempDoctor)) {
                                                   echo $protocol_receiving_patient_ot->tempDoctor;
                                               }
                                               ?>"
                                               placeholder="Type here">
                                           </div>
                                       </div>
                                   </div>
                               </div>
                           </div>
                           <br />
                           <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <div class="col-md-3">
                                            <strong>R/R</strong>
                                        </div>
                                        <div class="col-md-9">
                                            <input class="form-control" type="text" id="rr-doctor"
                                            required="required" maxlength="10"
                                            value="<?php
                                            if (!empty($protocol_receiving_patient_ot->rrDoctor)) {
                                               echo $protocol_receiving_patient_ot->rrDoctor;
                                           }
                                           ?>"
                                           placeholder="Type here">
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-4">
                                <div class="form-group">
                                    <div class="col-md-3">
                                        <strong>GCS</strong>
                                    </div>
                                    <div class="col-md-9">
                                        <input class="form-control" type="text" id="gcs-doctor"
                                        required="required" maxlength="10"
                                        value="<?php
                                        if (!empty($protocol_receiving_patient_ot->gcsDoctor)) {
                                           echo $protocol_receiving_patient_ot->gcsDoctor;
                                       }
                                       ?>"
                                       placeholder="Type here">
                                   </div>
                               </div>
                           </div>
                           <div class="col-md-4">
                            <div class="form-group">
                                <div class="col-md-3">
                                    <strong>CVP</strong>
                                </div>
                                <div class="col-md-9">
                                    <input class="form-control" type="text" id="cvp-doctor"
                                    required="required" maxlength="10"
                                    value="<?php
                                    if (!empty($protocol_receiving_patient_ot->cvpDoctor)) {
                                       echo $protocol_receiving_patient_ot->cvpDoctor;
                                   }
                                   ?>"
                                   placeholder="Type here">
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <div class="container" style="width:100%;">
    <div class="panel panel-default">
        <div class="panel-heading">Nurse</div>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-4">
                        <div class="form-group">
                            <div class="col-md-3">
                                <label>Pulse</label>
                            </div>
                            <div class="col-md-9">
                                <input class="form-control" type="text" id="pulse-nurse"
                                required="required"
                                value="<?php
                                if (!empty($protocol_receiving_patient_ot->pulseNurse)) {
                                   echo $protocol_receiving_patient_ot->pulseNurse;
                               }
                               ?>"
                               placeholder="Type here">
                           </div>
                       </div>
                   </div>
                   <div class="col-md-4">
                    <div class="form-group">
                        <div class="col-md-3">
                            <strong>B.P</strong>
                        </div>
                        <div class="col-md-9">
                            <input class="form-control" type="text" id="bp-nurse"
                            required="required"
                            value="<?php
                            if (!empty($protocol_receiving_patient_ot->bpNurse)) {
                               echo $protocol_receiving_patient_ot->bpNurse;
                           }
                           ?>"
                           placeholder="Type here">
                       </div>
                   </div>
               </div>
               <div class="col-md-4">
                <div class="form-group">
                    <div class="col-md-3">
                        <strong>Temp</strong>
                    </div>
                    <div class="col-md-9">
                        <input class="form-control" type="text" id="temp-nurse"
                        required="required"
                        value="<?php
                        if (!empty($protocol_receiving_patient_ot->tempNurse)) {
                           echo $protocol_receiving_patient_ot->tempNurse;
                       }
                       ?>"
                       placeholder="Type here">
                   </div>
               </div>
           </div>
       </div>
   </div>
   <br>
   <div class="row">
    <div class="col-md-12">
        <div class="col-md-4">
            <div class="form-group">
                <div class="col-md-3">
                    <strong>R/R</strong>
                </div>
                <div class="col-md-9">
                    <input class="form-control" type="text" id="rr-nurse"
                    required="required"
                    value="<?php
                    if (!empty($protocol_receiving_patient_ot->rrNurse)) {
                       echo $protocol_receiving_patient_ot->rrNurse;
                   }
                   ?>"
                   placeholder="Type here">
               </div>
           </div>
       </div>
       <div class="col-md-4">
        <div class="form-group">
            <div class="col-md-3">
                <strong>GCS</strong>
            </div>
            <div class="col-md-9">
                <input class="form-control" type="text" id="gcs-nurse"
                required="required"
                value="<?php
                if (!empty($protocol_receiving_patient_ot->gcsNurse)) {
                   echo $protocol_receiving_patient_ot->gcsNurse;
               }
               ?>"

               placeholder="Type here">
           </div>
       </div>
   </div>
   <div class="col-md-4">
    <div class="form-group">
        <div class="col-md-3">
            <strong>CVP</strong>
        </div>
        <div class="col-md-9">
            <input class="form-control" type="text" id="cvp-nurse"
            required="required"
            value="<?php
            if (!empty($protocol_receiving_patient_ot->cvpNurse)) {
               echo $protocol_receiving_patient_ot->cvpNurse;
           }
           ?>"
           placeholder="Type here">
       </div>
   </div>
</div>
</div>
</div>
</div>
</div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="col-md-3">
            <div class="form-group">
                <label>&bull; Status of drains</label>
            </div>
        </div>
        <div class="col-md-9">
            <div class="form-group">
                <label class="checklist-text"><input type="radio" name="status-of-drains"
                 value="NG" <?php
                 if ($protocol_receiving_patient_ot->statusOfDrains == "NG") {
                     echo "checked";
                 }
                 ?> >&nbsp;&nbsp;&nbsp;NG</label>&nbsp;&nbsp;&nbsp;
                 <label class="checklist-text"><input type="radio" name="status-of-drains"
                     value="Foley" <?php
                     if ($protocol_receiving_patient_ot->statusOfDrains == "Foley") {
                         echo "checked";
                     }
                     ?> >&nbsp;&nbsp;&nbsp;Foley</label>&nbsp;&nbsp;&nbsp;
                     <label class="checklist-text"><input type="radio" name="status-of-drains"
                         value="T Tube" <?php
                         if ($protocol_receiving_patient_ot->statusOfDrains == "T Tube") {
                             echo "checked";
                         }
                         ?> >&nbsp;&nbsp;&nbsp;T Tube</label>&nbsp;&nbsp;&nbsp;
                         <label class="checklist-text"><input type="radio" name="status-of-drains"
                             value="Drain 1" <?php
                             if ($protocol_receiving_patient_ot->statusOfDrains == "Drain 1") {
                                 echo "checked";
                             }
                             ?> >&nbsp;&nbsp;&nbsp;Drain 1</label>
                             &nbsp;&nbsp;&nbsp;
                             <label class="checklist-text"><input type="radio" name="status-of-drains"
                                 value="Drain 2" <?php
                                 if ($protocol_receiving_patient_ot->statusOfDrains == "Drain 2") {
                                     echo "checked";
                                 }
                                 ?> >&nbsp;&nbsp;&nbsp;Drain 2</label>
                                 &nbsp;&nbsp;&nbsp;
                                 <label class="checklist-text"><input type="radio" name="status-of-drains"
                                     value="Chest tube" <?php
                                     if ($protocol_receiving_patient_ot->statusOfDrains == "Chest tube") {
                                         echo "checked";
                                     }
                                     ?> >&nbsp;&nbsp;&nbsp;Chest tube</label>
                                     &nbsp;&nbsp;&nbsp;
                                     <label class="checklist-text"><input type="radio" name="status-of-drains"
                                         value="Suction drains" <?php
                                         if ($protocol_receiving_patient_ot->statusOfDrains == "Suction drains") {
                                             echo "checked";
                                         }
                                         ?> >&nbsp;&nbsp;&nbsp;Suction drains</label>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>&bull; Biopsy specimen</label>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label class="checklist-text"><input type="radio" name="biopsy-specimen"
                                         value="Sent" <?php
                                         if ($protocol_receiving_patient_ot->biopsySpecimen == "Sent") {
                                             echo "checked";
                                         }
                                         ?> >&nbsp;&nbsp;&nbsp;Sent</label>&nbsp;&nbsp;&nbsp;
                                         <label class="checklist-text"><input type="radio" name="biopsy-specimen"
                                             value="Not Sent" <?php
                                             if ($protocol_receiving_patient_ot->biopsySpecimen == "Not Sent") {
                                                 echo "checked";
                                             }
                                             ?> >&nbsp;&nbsp;&nbsp;Not Sent</label>

                                         </div>
                                     </div>
                                     <div class="col-md-1">
                                        <div class="form-group">
                                            <label class="checklist-text">Reason</label>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input class="form-control" type="text" id="biopsy-specimen-reason" maxlength="30"
                                            value="<?php
                                            if (!empty($protocol_receiving_patient_ot->biopsySpecimenReason)) {
                                               echo $protocol_receiving_patient_ot->biopsySpecimenReason;
                                           }
                                           ?>"
                                           name="radio-4">
                                       </div>
                                   </div>

                               </div>
                           </div>
                           <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>&bull; Dressing</label>
                                    </div>
                                </div>
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label class="checklist-text"><input type="radio" name="dressing"
                                         value="Soaked" <?php
                                         if ($protocol_receiving_patient_ot->dressing == "Soaked") {
                                             echo "checked";
                                         }
                                         ?> >&nbsp;&nbsp;&nbsp;Soaked</label>&nbsp;&nbsp;&nbsp;
                                         <label class="checklist-text"><input type="radio" name="dressing"
                                             value="Not Soaked" <?php
                                             if ($protocol_receiving_patient_ot->dressing == "Not Soaked") {
                                                 echo "checked";
                                             }
                                             ?> >&nbsp;&nbsp;&nbsp;Not Soaked</label>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>5. Patient should be nursed in lateral position with all drains and
                                            I/V lines on one side of the bed.</label>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <label>6. Extra I/V lines + ECG electrodes should be removed.</label>
                                        </div>
                                    </div><!-- /.form-group -->
                                </div><!-- /.col -->
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>7. Blood transfusion</label>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label class="checklist-text"><input type="radio" name="blood-transfusion"
                                             value="Needed" <?php
                                             if ($protocol_receiving_patient_ot->bloodTransfusion == "Needed") {
                                                 echo "checked";
                                             }
                                             ?> >&nbsp;&nbsp;&nbsp;Needed</label>&nbsp;&nbsp;&nbsp;
                                             <label class="checklist-text"><input type="radio" name="blood-transfusion"
                                                 value="Not Needed" <?php
                                                 if ($protocol_receiving_patient_ot->bloodTransfusion == "Not Needed") {
                                                     echo "checked";
                                                 }
                                                 ?> >&nbsp;&nbsp;&nbsp;Not Needed</label>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>8. Operation Notes and postoperative orders checked</label>
                                            </div>
                                        </div>
                                        <div class="col-md-9">
                                            <div class="form-group">
                                                <label class="checklist-text"><input type="radio"
                                                 name="operation-notes-order-checked"
                                                 value="Yes" <?php
                                                 if ($protocol_receiving_patient_ot->operationNotesOrdersChecked == "Yes") {
                                                     echo "checked";
                                                 }
                                                 ?> >&nbsp;&nbsp;&nbsp;Yes</label>&nbsp;&nbsp;&nbsp;
                                                 <label class="checklist-text"><input type="radio"
                                                     name="operation-notes-order-checked"
                                                     value="No" <?php
                                                     if ($protocol_receiving_patient_ot->operationNotesOrdersChecked == "No") {
                                                         echo "checked";
                                                     }
                                                     ?> >&nbsp;&nbsp;&nbsp;No</label>
                                                 </div>
                                             </div>
                                         </div>
                                     </div>

                                     <div class="row pull-right">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <!--<input type="submit" class="btn bg-blue margin" value ="Admit Patient &amp; Print Adm. Sheet"</input>-->
                                                <button type="submit" id="protocol-receiving-patient-ot-previous-btn"
                                                class="btn bg-blue btn-flat margin"><i
                                                class="fa fa-chevron-left" aria-hidden="true"></i>&nbsp;
                                                Previous
                                            </button>
                                            <button type="submit" id="protocol-receiving-patient-ot-save-btn"
                                            class="btn btn-flat bg-green margin"><i
                                            class="fa fa-floppy-o" aria-hidden="true"></i>&nbsp; Save
                                        </button>
                                        <a
                                        data-toggle="modal"
                                        href="<?php echo base_url('dashboard/view_operationlist/'); ?>">
                                        <button class="btn bg-blue btn-flat margin"> Finish
                                        </button>
                                    </a> &nbsp;
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
</html>
