<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends CI_Controller {

    /**
     * Index Page for this controller.
     *
     * Maps to the following URL
     *        http://example.com/index.php/welcome
     *    - or -
     *        http://example.com/index.php/welcome/index
     *    - or -
     * Since this controller is set as the default controller in
     * config/routes.php, it's displayed at http://example.com/
     *
     * So any other public methods not prefixed with an underscore will
     * map to /index.php/welcome/<method_name>
     * @see https://codeigniter.com/user_guide/general/urls.html
     */
    function __construct() {
        parent::__construct();
        $this->load->model('model_hms');
        $this->load->helper('content-type');
        $this->load->helper('url');
        $this->load->library('form_validation');
    }

    public function index() {
        $this->load->view('dashboard');
    }

    public function view_patients() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ADMITTED_PATIENTS);
        if ($access_checker == 1) {
            $filter = $this->input->post();
            $data['patients'] = $this->model_hms->get_patients($filter);
            $data['wards'] = $this->model_hms->get_wards();
            $data['filter'] = $filter;
            $json['result_html'] = $this->load->view('admission/list',$data,true);
        } else {
            $this->insufficient_privileges();
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function new_admission() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, ALLOW_USER_TO_ADMIT);
        if ($access_checker == 1) {
            $data['reg_num'] = $this->model_hms->get_regNo();
            $data['cities'] = $this->model_hms->get_cities();
            $data['diseases'] = $this->model_hms->get_disease_names();
            $data['wards'] = $this->model_hms->get_wards();
            $json['result_html'] = $this->load->view('admission/add', $data,true);
        } else {
            $this->insufficient_privileges();
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }


    public function edit_patient($patient_id) {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, DISCHARGE_PATIENTS);

        if ($access_checker == 1) {
            $data['reg_num'] = $this->model_hms->get_regNo();
            $data['cities'] = $this->model_hms->get_cities();
            $data['diseases'] = $this->model_hms->get_disease_names();
            $data['wards'] = $this->model_hms->get_wards();
            $data['patient_reg_no'] = $patient_id;
            $data['patient_list'] = $this->model_hms->get_patient_byid($patient_id);
            $json['result_html'] = $this->load->view('admission/add', $data,true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }

        } else {
            $this->insufficient_privileges();
        }

    }

    public function shift_patient() {
        if (!empty($this->input->get("search_by_cnic"))) {
            $data['patient_list'] = $this->model_hms->search_result_by_cnic_chart($this->input->get("search_by_cnic"));
            $this->load->view('shift_patient', $data);
        }
        if (empty($this->input->get())) {
            $this->load->view('shift_patient');
        }
    }

    public function insert_discharge_patient(){
        $this->load->library('form_validation');
        $this->load->helper('security');
        //rules for required fields e.g email should be unique
        $this->form_validation->set_rules('patNoK', 'Next of kin', 'required|xss_clean');
        $this->form_validation->set_rules('patward_id', 'Ward Number', 'required|xss_clean');
        $this->form_validation->set_rules('patbed_id', 'Bed Number', 'required|xss_clean');
        $this->form_validation->set_rules('patAdmDate', 'Admit date', 'required|xss_clean');
        $this->form_validation->set_rules('AdmTime', 'Admit Time', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();

        }else{
            $udata = $this->input->post();
            $regNo = $this->input->post('RegNumber');
            if ($this->input->post('wardName') == "4") {
                date_default_timezone_set("Asia/Karachi");
                $udata['sideRoomDate'] = date('Y-m-d');
            }
            if (!empty($_FILES['patientphoto']['name'])) {
                $check = $this->patient_pic_upload($regNo);
                $udata['patient_pic_path'] = $check;
            }
            unset($udata['patient_reg_no']);
            $res = $this->model_hms->insert_users_to_db($udata);
            if ($res) {
                $this->model_hms->occupy_bed($udata['patward_id'], $udata['patbed_id']);
                load_class('Config')->config['base_url'];
                $json['success']=true;
                $json['message']='Record has been created successfully.';
            }else{
                $json['error']=true;
                $json['message']='Seem to be an error.';
            }

        }
        if ($this->input->is_ajax_request()) {
            $CI =& get_instance();
            return $CI->output->set_content_type('application/json') //set Json header
            ->set_output(json_encode($json));
        }
    }

    public function insert_user_db() {
        $this->load->library('form_validation');
        $this->load->helper('security');
        //rules for required fields e.g email should be unique
        $this->form_validation->set_rules('patNoK', 'Next of kin', 'required|xss_clean');
        $this->form_validation->set_rules('patward_id', 'Ward Number', 'required|xss_clean');
        $this->form_validation->set_rules('patbed_id', 'Bed Number', 'required|xss_clean');
        $this->form_validation->set_rules('patAdmDate', 'Admit date', 'required|xss_clean');
        $this->form_validation->set_rules('AdmTime', 'Admit Time', 'required|xss_clean');
        if ($this->form_validation->run() == FALSE) {
            $json['error'] = true;
            $json['message'] = validation_errors();

        }else{
            $udata = $this->input->post();
            $regNo = $this->input->post('RegNumber');
            if ($this->input->post('wardName') == "4") {
                date_default_timezone_set("Asia/Karachi");
                $udata['sideRoomDate'] = date('Y-m-d');
            }
            if (!empty($_FILES['patientphoto']['name'])) {
                $check = $this->patient_pic_upload($regNo);
                $udata['patient_pic_path'] = $check;
            }
            if(isset($udata['patient_reg_no'])&&!empty($udata['patient_reg_no'])){
                $res = $this->model_hms->update_patient($udata);
                if ($res) {
                    $this->model_hms->occupy_bed($udata['patward_id'], $udata['patbed_id']);
                    load_class('Config')->config['base_url'];
                    $json['success']=true;
                    $json['message']='Record updated successfully.';
                }else{
                    $json['error']=true;
                    $json['message']='Seem to be an error.';
                }
            }else{
                $res = $this->model_hms->insert_users_to_db($udata);
                if ($res) {
                    $this->model_hms->occupy_bed($udata['patward_id'], $udata['patbed_id']);
                    load_class('Config')->config['base_url'];
                    $json['success']=true;
                    $json['message']='Record has been created successfully.';
                }else{
                    $json['error']=true;
                    $json['message']='Seem to be an error.';
                }
            }


        }
        if ($this->input->is_ajax_request()) {
            $CI =& get_instance();
            return $CI->output->set_content_type('application/json') //set Json header
            ->set_output(json_encode($json));
        }

    }

    public function patient_revisit() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, CAN_REVISIT);
        $data['patients'] = $this->model_hms->get_discharged_patients();
        $data['reg_num'] = $this->model_hms->get_regNo();
        $data['cities'] = $this->model_hms->get_cities();
        $data['diseases'] = $this->model_hms->get_disease_names();
        $data['wards'] = $this->model_hms->get_wards();
        if ($access_checker == 1) {
            if (!empty($this->input->post("patient_id"))) {
                $data['reg_num'] = $this->model_hms->get_regNo();
                //$data['patient_list'] = $this->model_hms->search_discharged_result_by_cnic($this->input->post("patient_id"));
                $data['patient_list'] = $this->model_hms->get_discharge_patient_by_id($this->input->post("patient_id"));
                $data['old_regNo'] = $this->input->post("patient_id");
                $json['revisit_patient'] = $this->load->view('admission/insert_discharge_patient', $data,true);
            }
            $json['result_html']=$this->load->view('admission/revisit',$data,true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else {
            $this->insufficient_privileges();
        }
        $readmitPatient = $this->input->post("readmitPatient");
        if (isset($readmitPatient)) {
            $regNo = $this->input->post('RegNumber');
            $udata['patName'] = $this->input->post('patName');
            $udata['emNo'] = $this->input->post('emNo');
            $udata['admNo'] = $this->input->post('admNo');
            $udata['patNoKType'] = $this->input->post('patNoKType');
            $udata['patNoK'] = $this->input->post('patNoKName');
            $udata['patDoB'] = $this->input->post('patDoB');
            $udata['patAge'] = $this->input->post('patAge');
            $udata['patMonthAge'] = $this->input->post('patMonthAge');
            $udata['patDaysAge'] = $this->input->post('patDaysAge');
            $udata['patBldGrp'] = $this->input->post('patBldGrp');
            $udata['patDisease_id'] = $this->input->post('patDisease');
            $udata['patSex'] = $this->input->post('sex');
            $udata['patCNIC'] = $this->input->post('patCnic');
            $udata['patAddress'] = $this->input->post('patAddress');
            $udata['patAddress'] = $this->input->post('patCity');
            $udata['patOccupation'] = $this->input->post('patOccupation');
            $udata['patPhone'] = $this->input->post('patPhone');
            $udata['garName'] = $this->input->post('garName');
            $udata['garCnic'] = $this->input->post('garCnic');
            $udata['garPhone'] = $this->input->post('garPhone');
            $udata['garRel'] = $this->input->post('garRel');
            $udata['patEntitled'] = $this->input->post('entitled');
            $udata['patunit_Id'] = $this->input->post('admitted-through');
            $udata['patShiftedFrom'] = $this->input->post('patShiftedFrom');
            $udata['patward_id'] = $this->input->post('wardName');
            $udata['patbed_id'] = $this->input->post('bedNumber');
            $udata['patAdmDate'] = $this->input->post('patAdmDate');
            $udata['patChart_id'] = "22";
            $udata['patStatus'] = "Under Treatment";
            $udata['FreeCarePatient'] = $this->input->post('freeCarePatient');

            $check = $this->patient_pic_upload($regNo);
            $readmitPatient = $this->model_hms->updatePreviousRecordForReAdmission($this->input->post('oldRegNumber'));
            $udata['previousRegno'] = "RID" . " - " . $this->input->post('oldRegNumber');
            if (!$check['error']) {
                $udata['patient_pic_path'] = $check;
            }
            $res = $this->model_hms->insert_users_to_db($udata);
            if ($res) {
                $bedUpdate = $this->model_hms->occupy_bed($this->input->post('wardName'), $this->input->post('bedNumber'));
                $base_url = load_class('Config')->config['base_url'];
                //header('location:' . $base_url . "index.php/dashboard/new_admission?success=true");
                echo "1";
            }

            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        }


    }

    public function insert_discharge_db() {
        $udata['regNo'] = $this->input->post('regNo');
        $udata['emergency_no'] = $this->input->post('emergencyno');
        $udata['admi_no'] = $this->input->post('admino');
        $udata['patName'] = $this->input->post('patName');
        $udata['patNoKType'] = $this->input->post('patNoKType');
        $udata['patNoK'] = $this->input->post('patNoK');
        $dateob = $this->input->post('patDoB');
        $udata['patDoB'] = date('Y-m-d', strtotime($dateob));
        $dateod = $this->input->post('dischargeDate');
        $udata['discharge_date'] = date('Y-m-d', strtotime($dateod));
        $udata['patAge'] = $this->input->post('patAge');
        $udata['patMonthAge'] = $this->input->post('patMonthAge');
        $udata['patDaysAge'] = $this->input->post('patDaysAge');
        $udata['patBldGrp'] = $this->input->post('patBldGrp');
        $udata['patDisease_id'] = $this->input->post('patDisease_id');
        $udata['patSex'] = $this->input->post('patSex');
        $udata['patCNIC'] = $this->input->post('patCNIC');
        $udata['patAddress'] = $this->input->post('patAddress');
        $udata['patOccupation'] = $this->input->post('patOccupation');
        $udata['patPhone'] = $this->input->post('patPhone');
        $udata['patEntitled'] = $this->input->post('patEntitled');
        $udata['garName'] = $this->input->post('garName');
        $udata['garCnic'] = $this->input->post('garCnic');
        $udata['garContact'] = $this->input->post('garContact');
        $udata['garRelation'] = $this->input->post('garRelation');
        $udata['patunit_Id'] = $this->input->post('patunit_Id');
        $udata['patShiftedFrom'] = $this->input->post('patShiftedFrom');
        $udata['patward_id'] = $this->input->post('patward_id');
        $udata['patbed_id'] = $this->input->post('patbed_id');
        $udata['patAdmDate'] = $this->input->post('patAdmDate');
        $udata['patChart_id'] = $this->input->post('patChart_id');
        $udata['patStatus'] = $this->input->post('patStatus');
        $udata['discharge_advice'] = $this->input->post('discharge_advice');
        $udata['patient_pic_path'] = $this->input->post('patientPicPath');
        $udata['FreeCarePatient'] = $this->input->post('FreeCarePatient');


        $res = $this->model_hms->insert_discharge_to_db($udata);

        if ($this->input->post('patward_id') == "4") {
            $result = $this->model_hms->get_patient_side_room_date($this->input->post('regNo'));
            $sideRoomDate = strtotime($result->sideRoomDate);
            $start_date = date('Y-m-d', $sideRoomDate);
            $date1 = date_create($start_date);
            date_default_timezone_set("Asia/Karachi");
            $nowDate = date('Y-m-d');
            $date2 = date_create($nowDate);
            $diff = date_diff($date1, $date2);
            $days = $diff->format("%a");
            $days++;
            $result1 = $this->model_hms->check_patient_account($this->input->post('regNo'));
            if ($result1->counter == 0) {
                $accdata['patientRegNo'] = $this->input->post('regNo');
                $accdata['totalDepositedAmount'] = 0;
                $accdata['runningBill'] = 0;
                $accdata['remainingAmount'] = 0;
                $accdata['discount'] = 0;
                $accdata['refundableAmount'] = 0;
                $accdata['freeStatus'] = "";
                $accdata['isInvoiceGenerated'] = 0;
                $accdata['invoiceGeneratedDate'] = "";
                $accdata['invoiceGeneratedDate1'] = "";
                $this->model_hms->create_patient_account($accdata);
            }
            $patientAccount = $this->model_hms->get_patient_account_no_by_regno($this->input->post('regNo'));
            $sideRoomPrice = $this->model_hms->get_side_room_price();

            if ($days == "1") {
                date_default_timezone_set("Asia/Karachi");
                $nowdate = date("d-m-Y", strtotime("$start_date + 0 day"));

                $edata['patientAccountNo'] = $patientAccount->patientAccountNo;
                $edata['expenseDescription'] = "Side Room Dues";
                $edata['expenseAmount'] = $sideRoomPrice->rate;

                $edata['expenseDate'] = date("d-m-Y", strtotime($nowdate));
                $edata['expenseTime'] = date('h:i A');
                $edata['expenseDate1'] = date('Y-m-d', strtotime($nowdate));
                $edata['expenseTime1'] = date('H:i:s');
                $this->model_hms->insert_expense_db($edata);
            } else {
                for ($i = 0; $i <= $days; $i++) {
                    date_default_timezone_set("Asia/Karachi");
                    $nowdate = date("d-m-Y", strtotime("$start_date + $i day"));
                    if ($nowdate <= $date2) {
                        $edata['patientAccountNo'] = $patientAccount->patientAccountNo;
                        $edata['expenseDescription'] = "Side Room Dues";
                        $edata['expenseAmount'] = $sideRoomPrice->rate;

                        $edata['expenseDate'] = date("d-m-Y", strtotime($nowdate));
                        $edata['expenseTime'] = date('h:i A');
                        $edata['expenseDate1'] = date('Y-m-d', strtotime($nowdate));
                        $edata['expenseTime1'] = date('H:i:s');
                        $this->model_hms->insert_expense_db($edata);
                        unset($edata);
                    }
                }
            }
        }

        $del = $this->model_hms->delete_from_adm($this->input->post('regNo'));
        $shift = $this->shift_module();
        if ($res && $del) {
            $bedUpdate = $this->model_hms->vacate_bed($this->input->post('patward_id'), $this->input->post('patbed_id'));
            echo "success";
        }
    }

    public function search() {
        if (!empty($this->input->get("search_by_cnic"))) {
            $this->model_hms->ajax_search_by_cnic($this->input->get("search_by_cnic"));
        }
        if (!empty($this->input->get("search_by_ward"))) {
            $this->model_hms->ajax_search_by_ward($this->input->get("search_by_ward"));
        }
        if (!empty($this->input->get("search_discharged_by_cnic"))) {
            $this->model_hms->ajax_search_discharged_by_cnic($this->input->get("search_discharged_by_cnic"));
        }
        //=======================================================//
        //   Controller Code for OT Search Module starts here    //
        //                  By Muhammad Binyameen                //
        //                  GitHub: @imBinyameen                 //
        //=======================================================//
        if (!empty($this->input->get("search_by_otward"))) {
            $this->model_hms->ajax_search_by_otward($this->input->get("search_by_otward"));
        }
        if (!empty($this->input->get("search_ot_by_cnic"))) {
            $this->model_hms->ajax_ot_search_by_cnic($this->input->get("search_ot_by_cnic"));
        }
        if (!empty($this->input->get("search_by_wardnumber"))) {
            $this->model_hms->ajax_search_result_by_wardnumber($this->input->get("search_by_wardnumber"));
        }
        //=======================================================//
        //    Controller Code for OT Search Module ends here     //
        //                  By Muhammad Binyameen                //
        //                  GitHub: @imBinyameen                 //
        //=======================================================//
        //=======================================================//
        //    Controller Code for Account Module starts here     //
        //                  By Muhammad Binyameen                //
        //                  GitHub: @imBinyameen                 //
        //=======================================================//
        if (!empty($this->input->get("search_account_by_cnic"))) {
            $this->model_hms->ajax_account_search_by_cnic($this->input->get("search_account_by_cnic"));
        }
        if (!empty($this->input->get("search_invoice_by_no"))) {
            $this->model_hms->ajax_invoice_search_by_no($this->input->get("search_invoice_by_no"));
        }
        //=======================================================//
        //     Controller Code for Account Module ends here      //
        //                  By Muhammad Binyameen                //
        //                  GitHub: @imBinyameen                 //
        //=======================================================//
        //get_patient_details_by_bed
        //search_by_bed
        if (!empty($this->input->get("search_by_bed"))) {
            $data['bed_detail'] = $this->model_hms->get_patient_details_by_bed($this->input->get("search_by_bed"));
            //print_r($data['bed_detail']);
            if (is_array($data['bed_detail']) && count($data['bed_detail']) > 0) {
                $jsonEncoder = json_encode($data['bed_detail']);
                $jsonEncoder = str_replace(array('[', ']'), '', $jsonEncoder);
                echo $jsonEncoder;
            } else {
                $data['bed_detail'] = $this->model_hms->get_bed_details($this->input->get("search_by_bed"));
                $jsonEncoder = json_encode($data['bed_detail']);
                $jsonEncoder = str_replace(array('[', ']'), '', $jsonEncoder);
                echo $jsonEncoder;
            }
        }
    }

    public function get_bed_status_controller() {
        if ($this->input->get("bedId")) {
            echo $this->model_hms->get_bed_status($this->input->get("bedId"));
        }
    }

    public function bed_blocker_controller() {
        if ($this->input->post("bedId")) {
            echo $this->model_hms->bed_blocker($this->input->post("bedId"));
        }
    }

    public function get_all_diseases_controller() {
        if ($this->input->get("search_by_disease")) {
            echo $this->model_hms->get_all_diseases($this->input->get("search_by_disease"));
        } else {
            echo $this->model_hms->get_all_diseases($this->input->get());
        }
    }

    public function get_all_wards_controller() {
        echo $this->model_hms->ajax_get_all_wards();
    }

    public function get_beds_by_wards_controller() {
        if (!empty($this->input->get("wardId"))) {
            echo $this->model_hms->ajax_get_all_available_beds($this->input->get("wardId"));
        }
    }

    public function delete_bed() {
        if (!empty($this->input->post("bedId"))) {
            $delBed = $this->model_hms->delete_temporary_bed($this->input->post("bedId"));
            if ($delBed) {
                echo $delBed;
            } else {
                echo $delBed;
            }
        }
    }

    public function delete_ward() {
        if (!empty($this->input->post("wardId"))) {
            $delWard = $this->model_hms->delete_ward($this->input->post("wardId"));
            if ($delWard) {
                echo $delWard;
            } else {
                echo $delWard;
            }
        }
    }

    public function delete_ot_ward() {
        if (!empty($this->input->post("otwardId"))) {
            $delWard = $this->model_hms->delete_ot_ward($this->input->post("otwardId"));
            if ($delWard) {
                echo $delWard;
            } else {
                echo $delWard;
            }
        }
    }

    public function edit_category() {
        if (!empty($this->input->post("categoryNo")) && !empty($this->input->post("categoryName"))) {
            $delWard = $this->model_hms->edit_category($this->input->post("categoryNo"), $this->input->post("categoryName"));
            if ($delWard) {
                echo $delWard;
            } else {
                echo $delWard;
            }
        }
    }

    public function side_room_cost() {
//        if (!empty($this->input->post("cost"))) {
        $updateCost = $this->model_hms->update_sideroom_cost($this->input->post("cost"));
        if ($updateCost) {
            echo $updateCost;
        } else {
            echo $updateCost;
        }
//        }
    }



    public function delete_patient() {
        $getBedWard = $this->model_hms->get_bed_ward_id_by_cnic($this->input->post("patient_id"));
        $bedUpdate = $this->model_hms->vacate_bed($getBedWard->wardNo, $getBedWard->bedNo);
        $queryCheck = $this->model_hms->delete_from_adm($this->input->post("patient_id"));
        if ($queryCheck) {
            $json['success'] = true;
            $json['message'] = "Record successfully deleted.";
        } else {
            $json['error'] = true;
            $json['message'] = "Seems to an error.";
        }

        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ADMITTED_PATIENTS);
        if ($access_checker == 1) {
            $filter = $this->input->post();
            $data['patients'] = $this->model_hms->get_patients($filter);
            $data['wards'] = $this->model_hms->get_wards();
            $data['filter'] = $filter;
            $json['result_html'] = $this->load->view('admission/list',$data,true);
        } else {
            $this->insufficient_privileges();
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_patient_photo() {
        
    }

    public function get_menus() {
        $this->load->model('model_menu');
        $menus = $this->model_menu->index();
        //  $submenus = $this->model_menu->submenu();
        $data = array('menus' => $menus);
        $this->load->view('menu', $data);
    }

    public function discharge_patients() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, DISCHARGE_PATIENTS);
        if ($access_checker == 1) {
            $data['patients'] = $this->model_hms->get_all_patients();
            if (!empty($this->input->post("patient_id"))) {
                $data['patient_list'] = $this->model_hms->search_result_by_cnic($this->input->post("patient_id"));
                $data['discharge_status'] = 0;
                $data['filter'] = $this->input->post("patient_id");
            }
            $json['result_html'] = $this->load->view('admission/discharge_patients',$data,true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function patient_chart() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_HISTORY_AND_PLAN_CHART);
        if ($access_checker == 1) {
            $hp_input_status = $this->model_hms->access_checker($priv, CAN_UPDATE_HP_CHART);
            $filter = $this->input->post();
            if(isset($filter['patient_id'])){
                if ($hp_input_status == 1) {
                    $data['input_status'] = 1;
                    $data['patient_list'] = $this->model_hms->search_result_by_cnic_chart($filter['patient_id']);
                } else {
                    $data['input_status'] = 0;
                    $data['patient_list'] = $this->model_hms->search_result_by_cnic_chart($filter['patient_id']);
                }
                if (empty($data['patient_list'])) {
                    $data['patient_list'] = $this->model_hms->search_result_discharge_by_cnic_chart($filter['patient_id']);
                }
                $data['filter'] = $filter['patient_id'];
            }
            $data['patients'] = $this->model_hms->get_all_patients();
            $json['result_html'] = $this->load->view('admission/patient_chart',$data,true);
            if ($this->input->is_ajax_request()) {
                set_content_type($json);
            }
        } else {
            $this->insufficient_privileges();
        }

    }

    public function insert_brief_history() {
        $udata['patHistory'] = $this->input->post('patHistory');
        $udata['chartpatregNo'] = $this->input->post('chartpatregNo');
        $udata['docName'] = $this->input->post('docName');
        $res = $this->model_hms->insert_history($udata);
        if ($res) {
            $historycheck = $this->model_hms->get_history($udata['chartpatregNo']);
            $invcheck = $this->model_hms->get_investigation($udata['chartpatregNo']);
            $treatcheck = $this->model_hms->get_treatment($udata['chartpatregNo']);
            echo "History Data: " . $historycheck . "    investigation Data: " . $invcheck . "     Treatment Data: " . $treatcheck;
            if ($historycheck > 0 && $invcheck <= 0 && $treatcheck <= 0) {
                $result = $this->model_hms->update_status($udata['chartpatregNo'], "Under Determined");
                echo $result;
            } else {
                echo "Not Updated!";
            }
            echo "success" . "hasSomeText." . $udata['chartpatregNo'];
        }
    }

    public function insert_inv_plan() {
        $udata['patInvestigation'] = $this->input->post('patInvestigation');
        $udata['chartpatregNo'] = $this->input->post('chartpatregNo');
        $udata['docName'] = $this->input->post('docName');

        //       $udata['docName'] = "Dr. Ahmad";
        $res = $this->model_hms->insert_inverstigation($udata);

        if ($res) {
            $historycheck = $this->model_hms->get_history($this->input->post('chartpatregNo'));
            $invcheck = $this->model_hms->get_investigation($this->input->post('chartpatregNo'));
            $treatcheck = $this->model_hms->get_treatment($this->input->post('chartpatregNo'));
            echo "History Data: " . $historycheck . "investigation Data: " . $invcheck . "Treatment Data: " . $treatcheck;
            if ($historycheck > 0 && $invcheck > 0 && $treatcheck <= 0) {
                $this->model_hms->update_status($udata['chartpatregNo'], "Under Examination");
            } else {
                echo "Not Updated";
            }

            echo "success" . "Under Examination";
        }
    }

    public function insert_treatment_plan() {
        $udata['patTreatPlan'] = $this->input->post('patTreatPlan');
        $udata['chartpatregNo'] = $this->input->post('chartpatregNo');
        $udata['docName'] = $this->input->post('docName');
        // $udata['docName'] = "Dr. Ahmad";
        $res = $this->model_hms->insert_treatment($udata);

        if ($res) {
            $historycheck = $this->model_hms->get_history($udata['chartpatregNo']);
            $invcheck = $this->model_hms->get_investigation($udata['chartpatregNo']);
            $treatcheck = $this->model_hms->get_treatment($udata['chartpatregNo']);
            // echo "  History Data: " . $historycheck . "    investigation Data: " . $invcheck . "   Treatment Data: " . $treatcheck;
            if ($historycheck > 0 && $invcheck > 0 && $treatcheck >= 0) {
                $this->model_hms->update_status($udata['chartpatregNo'], "Diagnosed");
            } else {
                echo "Not Updated!";
            }
            echo "success" . $treatcheck;
        }
    }

    public function shift_module() {
        $udata['shiftFrom'] = $this->input->post('shiftFrom');
        $udata['shiftTo'] = $this->input->post('shiftTo');
        $udata['shiftPatId'] = $this->input->post('shiftPatId');
        $udata['patOutcome'] = $this->input->post('patOutcome');
        $udata['shiftBy'] = $this->input->post('shiftBy');
        if (!empty($this->input->post('shiftFrom')) || !empty($this->input->post('shiftTo')) || !empty($this->input->post('shiftPatId')) || !empty($this->input->post('patOutcome')) || !empty($this->input->post('shiftBy'))) {
            $res = $this->model_hms->insert_shift_data($udata);
            if ($res) {
                echo "success";
            }
        }
    }



    public function update() {
        $old_patward_id = $this->input->post('old_patward_id');
        $old_patbed_id = $this->input->post('old_patbed_id');
        if ($old_patward_id == "4" && $this->input->post('wardName') != "4") {
            $result = $this->model_hms->get_patient_side_room_date($this->input->post('reg'));
            $sideRoomDate = strtotime($result->sideRoomDate);
            $start_date = date('Y-m-d', $sideRoomDate);
            $date1 = date_create($start_date);
            date_default_timezone_set("Asia/Karachi");
            $nowDate = date('Y-m-d');
            $date2 = date_create($nowDate);
            $diff = date_diff($date1, $date2);
            $days = $diff->format("%a");
            $days++;
            $result1 = $this->model_hms->check_patient_account($this->input->post('reg'));
            if ($result1->counter == 0) {
                $accdata['patientRegNo'] = $this->input->post('reg');
                $accdata['totalDepositedAmount'] = 0;
                $accdata['runningBill'] = 0;
                $accdata['remainingAmount'] = 0;
                $accdata['discount'] = 0;
                $accdata['refundableAmount'] = 0;
                $accdata['freeStatus'] = "";
                $accdata['isInvoiceGenerated'] = 0;
                $accdata['invoiceGeneratedDate'] = "";
                $accdata['invoiceGeneratedDate1'] = "";
                $this->model_hms->create_patient_account($accdata);
            }
            $patientAccount = $this->model_hms->get_patient_account_no_by_regno($this->input->post('reg'));
            $sideRoomPrice = $this->model_hms->get_side_room_price();
            if ($days == "1") {
                date_default_timezone_set("Asia/Karachi");
                $nowdate = date("d-m-Y", strtotime("$start_date + 0 day"));

                $edata['patientAccountNo'] = $patientAccount->patientAccountNo;
                $edata['expenseDescription'] = "Side Room Dues";
                $edata['expenseAmount'] = $sideRoomPrice->rate;

                $edata['expenseDate'] = date("d-m-Y", strtotime($nowdate));
                $edata['expenseTime'] = date('h:i A');
                $edata['expenseDate1'] = date('Y-m-d', strtotime($nowdate));
                $edata['expenseTime1'] = date('H:i:s');
                $this->model_hms->insert_expense_db($edata);
            } else {
                for ($i = 0; $i <= $days; $i++) {
                    date_default_timezone_set("Asia/Karachi");
                    $nowdate = date("d-m-Y", strtotime("$start_date + $i day"));
                    if ($nowdate <= $date2) {
                        $edata['patientAccountNo'] = $patientAccount->patientAccountNo;
                        $edata['expenseDescription'] = "Side Room Dues";
                        $edata['expenseAmount'] = $sideRoomPrice->rate;

                        $edata['expenseDate'] = date("d-m-Y", strtotime($nowdate));
                        $edata['expenseTime'] = date('h:i A');
                        $edata['expenseDate1'] = date('Y-m-d', strtotime($nowdate));
                        $edata['expenseTime1'] = date('H:i:s');
                        $this->model_hms->insert_expense_db($edata);
                        unset($edata);
                    }
                }
            }
        } elseif ($this->input->post('wardName') == "4" && $old_patward_id != "4") {
            date_default_timezone_set("Asia/Karachi");
            $sideRoomDateUpdate = date('Y-m-d');
            $this->model_hms->update_side_Room_Date($sideRoomDateUpdate, $this->input->post('reg'));
        }

        $data = array(
            'patName' => $this->input->post('patName'),
            'patNoKType' => $this->input->post('patNoKType'),
            'patNoK' => $this->input->post('patNoKName'),
            'patDoB' => $this->input->post('patDoB'),
            'patAge' => $this->input->post('patAge'),
            'patMonthAge' => $this->input->post('patMonthAge'),
            'patDaysAge' => $this->input->post('patDaysAge'),
            'patBldGrp' => $this->input->post('patBldGrp'),
            'patDisease_id' => $this->input->post('patDisease'),
            'patSex' => $this->input->post('sex'),
            'patCNIC' => $this->input->post('patCnic'),
            'patAddress' => $this->input->post('patAddress'),
            'patOccupation' => $this->input->post('patOccupation'),
            'patPhone' => $this->input->post('patPhone'),
            'patEntitled' => $this->input->post('entitled'),
            'patunit_Id' => $this->input->post('admitted-through'),
            'patShiftedFrom' => $this->input->post('patShiftedFrom'),
            'patward_id' => $this->input->post('wardName'),
            'patbed_id' => $this->input->post('bedNumber'),
            'emergency_no' => $this->input->post('emNo'),
            'admi_no' => $this->input->post('admNo'),
            'patcity' => $this->input->post('patCity'),
            'garName' => $this->input->post('garName'),
            'garCnic' => $this->input->post('garCnic'),
            'garContact' => $this->input->post('garPhone'),
            'garRelation' => $this->input->post('garRel')
        );
        $bedUpdate = $this->model_hms->vacate_bed($old_patward_id, $old_patbed_id);
        $search_by_cnic = $this->input->post('reg');
        $this->db->where('regNo', $search_by_cnic);
        $check = $this->db->update('admissiontbl', $data);
        if ($check) {
            $bedUpdate = $this->model_hms->occupy_bed($this->input->post('wardName'), $this->input->post('bedNumber'));
            $base_url = load_class('Config')->config['base_url'];
            header('location:' . $base_url . "index.php/dashboard/view_patients");
        }
    }

    public function page_print() {
        $this->load->library('ciqrcode');

        if (!empty($this->input->get("search_by_cnic"))) {
            $data['patient_list'] = $this->model_hms->search_result_by_cnic($this->input->get("search_by_cnic"));
            $params['data'] = $this->input->get("search_by_cnic");
            $params['level'] = 'H';
            $params['size'] = 3;
            $params['savename'] = FCPATH . 'qr.png';
            $this->ciqrcode->generate($params);

            if (empty($data['patient_list'])) {
                $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
                $data['patient_list'] = $this->model_hms->search_result_discharge_by_cnic_chart($this->input->get("search_by_cnic"));
            }
            $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
            $data['patient_chart'] = $this->model_hms->search_patient_chart($this->input->get("search_by_cnic"));
            $this->load->view('print', $data);
        } else {
            $this->load->view('print');
        }
    }

    public function discharge_sheet_print() {
        $this->load->library('ciqrcode');

        if (!empty($this->input->get("search_by_cnic"))) {
            if (empty($data['patient_list'])) {
                $params['data'] = $this->input->get("search_by_cnic");
                $params['level'] = 'H';
                $params['size'] = 2;
                $params['savename'] = FCPATH . 'qr.png';
                $this->ciqrcode->generate($params);
                $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
                $data['patient_list'] = $this->model_hms->search_result_discharge_by_cnic_chart($this->input->get("search_by_cnic"));
                $data['patient_chart'] = $this->model_hms->search_patient_chart($this->input->get("search_by_cnic"));
                $data['ot_details'] = $this->model_hms->get_ot_details_of_discharged_patient($this->input->get("search_by_cnic"));

                $this->load->view('print_discharge_sheet', $data);
            } else {
                $this->load->view('print_discharge_sheet');
            }
        }
    }

    public function new_user() {
        $username = "test";
        $password = "test";
        $user_id = $this->authentication->create_user($username, $password);
    }

    public function login() {

        $this->load->view('login');
        if ($this->authentication->is_loggedin()) {
            redirect('dashboard/');
        }
        $check = $this->input->post('submit');
        if (isset($check)) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            if ($this->authentication->login($username, $password)) {
                header('location:' . base_url('dashboard/'));
            } else {
                header('location:' . base_url('dashboard/login?error=true'));
            }
        }
    }

    public function logout() {
        $this->authentication->logout();
        redirect(base_url('dashboard/login'));
    }

    public function register() {
        $this->load->view('register');
        if ($this->authentication->is_loggedin()) {
            redirect('dashboard/');
        }
        $check = $this->input->post('register');
        if (isset($check)) {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $rpassword = $this->input->post('password2');
            $fullname = $this->input->post('fullname');
            $desig = $this->input->post('desig');

            if ($password == $rpassword) {

                if ($this->authentication->create_user($username, $rpassword, $fullname, $desig, 'MBBS', '00000000000')) {

                    redirect('dashboard/register/?success=true');
                } else {
                    redirect('dashboard/register/?error=true');
                }
            } else {
                redirect('dashboard/register/?error=password_mismatch');
            }
        }
    }

    public function profile() {
        $user_id = $this->authentication->read('identifier');
        $data['desig'] = $this->model_hms->get_desig($user_id);
        $data['qual'] = $this->model_hms->get_qualifications($user_id);
        $data['path'] = $this->model_hms->get_profile_pic($user_id);
        $data['dpt'] = $this->model_hms->get_department($user_id);
        $data['phone'] = $this->model_hms->get_phone($user_id);
        $this->load->view('profile', $data);
//        if ($this->authentication->is_loggedin()) {
//            redirect('dashboard/profile');
//        }
        $deptcheck = $this->input->post('dept-submit');
        if (isset($deptcheck)) {
            $dept = $this->input->post('inputDepartment');
            $result = $this->model_hms->update_department($user_id, $dept);
            if ($result) {
                header('location:' . base_url('dashboard/profile'));
            } else {
                header('location:' . base_url('dashboard/profile'));
            }
        }
        $qualcheck = $this->input->post('qual-submit');
        if (isset($qualcheck)) {
            $qual = $this->input->post('inputQualifications');
            $result = $this->model_hms->update_qualifications($user_id, $qual);
            if ($result) {
                header('location:' . base_url('dashboard/profile'));
            } else {
                header('location:' . base_url('dashboard/profile'));
            }
        }

        $qualcheck = $this->input->post('qual-submit');
        if (isset($qualcheck)) {
            $qual = $this->input->post('inputQualifications');
            $result = $this->model_hms->update_qualifications($user_id, $qual);
            if ($result) {
                header('location:' . base_url('dashboard/profile'));
            } else {
                header('location:' . base_url('dashboard/profile'));
            }
        }
        $check = $this->input->post('submit');
        if (isset($check)) {
            $password = $this->input->post('inputNewpassword');
            $password1 = $this->input->post('inputNewpassword1');

            if ($password == $password1) {
                if ($this->authentication->change_password($password)) {
                    redirect('dashboard/profile/?success=true');
                } else {
                    redirect('dashboard/profile/?error=true');
                }
            } else {
                redirect('dashboard/profile/?error=password_mismatch');
            }
        }
        $desigcheck = $this->input->post('desig-submit');
        if (isset($desigcheck)) {
            $designation = $this->input->post('designation');
            $result = $this->model_hms->update_designation($user_id, $designation);
            if ($result) {
                header('location:' . base_url('dashboard/profile'));
            } else {
                header('location:' . base_url('dashboard/profile'));
            }
        }
        $phonecheck = $this->input->post('phone-submit');
        if (isset($phonecheck)) {
            $designation = $this->input->post('phone');
            $result = $this->model_hms->update_user_phone($user_id, $designation);
            if ($result) {
                header('location:' . base_url('dashboard/profile'));
            } else {
                header('location:' . base_url('dashboard/profile'));
            }
        }
    }

    public function do_upload() {
        $config['upload_path'] = "./assets/dist/img/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;

        //echo $config['upload_path'];
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('userfile')) {
            $error = array('error' => $this->upload->display_errors());
            $this->load->view('profile', $error);
        } else {
            $user_id = $this->authentication->read('identifier');
            $filename = $this->upload->data('file_name');
            $data = array('upload_data' => $this->upload->data());
            $data['uploaded'] = $this->model_hms->update_profile_pic($user_id, $filename);
            $this->load->view('profile', $data);
        }
    }

    public function get_history() {
        $data ['priv'] = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker(1, VIEW_ADMITTED_PATIENTS);
        echo $access_checker;
        //echo $access_checker;
    }

    public function master_list() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_MASTER_LIST);
        if ($access_checker == 1) {

            $data['user_count'] = $this->model_hms->count_all_user();
            $this->load->view('master_list', $data);
        } else {
            $this->insufficient_privileges();
        }
    }

    public function users() {
        $data['users'] = $this->model_hms->get_all_user();
        $this->load->view('users', $data);
    }

    public function insufficient_privileges() {
        $this->load->view('insufficient_privileges');
    }

    public function update_privileges() {
        if (!empty($this->input->post('uid')) && !empty($this->input->post('privid'))) {
            $user_id = $this->input->post('uid');
            $priv_id = $this->input->post('privid');
            $this->model_hms->update_user_priv($user_id, $priv_id);
        }
    }

    public function user_privileges() {
        $data["user_priv"] = $this->model_hms->get_all_user_priv();
        $this->load->view('user_privileges', $data);
    }

    public function update_ug() {
        $privid = $this->input->post('privid');
        $allow_user_to_admit = $this->input->post('allow_user_to_admit');
        $view_admitted_patients = $this->input->post('view_admitted_patients');
        $view_history_and_plan_chart = $this->input->post('view_history_and_plan_chart');
        $discharge_patients = $this->input->post('discharge_patients');
        $can_book_ot = $this->input->post('can_book_ot');
        $can_view_ot_list = $this->input->post('can_view_ot_list');
        $view_radiology_section = $this->input->post('view_radiology_section');
        $view_ward_bed_list = $this->input->post('view_ward_bed_list');
        $view_statistics = $this->input->post('view_statistics');
        $view_inventory = $this->input->post('view_inventory');
        $view_accounts = $this->input->post('view_accounts');
        $view_configurations = $this->input->post('view_configurations');
        $view_master_list = $this->input->post('view_master_list');
        $can_update_patient_record = $this->input->post('can_update_patient_record');
        $can_update_hp_chart = $this->input->post('can_update_hp_chart');


//echo $privid;
//echo $allow_user_to_admit;
//echo $view_admitted_patients;
//echo $view_history_and_plan_chart;
//echo $discharge_patients;
//echo $can_book_ot;
//echo $can_view_ot_list;
//echo $view_radiology_section;
//echo $view_ward_bed_list;
//echo $view_statistics;
//echo $view_inventory;
//echo $view_accounts;
//echo $view_configurations;
//echo $view_master_list;
//echo $can_update_patient_record;
//echo $can_update_hp_chart;


        $this->model_hms->update_priv(
                $privid, $allow_user_to_admit, $view_admitted_patients, $view_history_and_plan_chart, $discharge_patients, $can_book_ot, $can_view_ot_list, $view_radiology_section, $view_ward_bed_list, $view_statistics, $view_inventory, $view_accounts, $view_configurations, $view_master_list, $can_update_patient_record, $can_update_hp_chart
        );
    }

    public function insert_ug() {
        $privid = $this->input->post('priv_id');
        $ugdesc = $this->input->post('ug_desc');
        $allow_user_to_admit = $this->input->post('allow_user_to_admit');
        $view_admitted_patients = $this->input->post('view_admitted_patients');
        $view_history_and_plan_chart = $this->input->post('view_history_and_plan_chart');
        $discharge_patients = $this->input->post('discharge_patients');
        $can_book_ot = $this->input->post('can_book_ot');
        $can_view_ot_list = $this->input->post('can_view_ot_list');
        $view_radiology_section = $this->input->post('view_radiology_section');
        $view_ward_bed_list = $this->input->post('view_ward_bed_list');
        $view_statistics = $this->input->post('view_statistics');
        $view_inventory = $this->input->post('view_inventory');
        $view_accounts = $this->input->post('view_accounts');
        $view_configurations = $this->input->post('view_configurations');
        $view_master_list = $this->input->post('view_master_list');
        $can_update_patient_record = $this->input->post('can_update_patient_record');
        $can_update_hp_chart = $this->input->post('can_update_hp_chart');

        $this->model_hms->insert_priv(
                $privid, $ugdesc, $allow_user_to_admit, $view_admitted_patients, $view_history_and_plan_chart, $discharge_patients, $can_book_ot, $can_view_ot_list, $view_radiology_section, $view_ward_bed_list, $view_statistics, $view_inventory, $view_accounts, $view_configurations, $view_master_list, $can_update_patient_record, $can_update_hp_chart
        );
    }

    public function user_pwd_update() {
        $privid = $this->input->post('priv_id');
        $password = $this->input->post('password');
        $this->model_hms->update_pwd($privid, $password);
    }

    public function hide_user_in_ulist() {
        $uid = $this->input->post('id');
        $this->model_hms->user_deactivate($uid);
    }

    public function ug_delete() {
        $ug_id = $this->input->post('ug_id');
        $this->model_hms->delete_priv($ug_id);
    }

    public function patient_pic_upload($patID) {
        $filename = strtolower(str_replace(' ', '-', $patID . '-' . uniqid()));
        $config['upload_path'] = "./assets/dist/img/patient_photo";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['file_name'] = $filename;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload('patientphoto')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $fileName = $this->upload->data('file_name');
            $data = array('upload_data' => $this->upload->data());
            return $fileName;
        }
    }

    public function bedslist() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_WARD_BED_LIST);
        $fdata = $this->input->get();
        $ward_id = $this->input->get("ward_id");
        $data=$this->get_beds_status_count($ward_id);
        $data['wards'] = $this->model_hms->get_wards();
        $data['fdata'] = $fdata;
        if ($access_checker == 1) {
            if (!empty($fdata)) {
                $data['ward_beds_list'] = $this->model_hms->search_result_by_wardnumber($fdata);
                $json['result_html'] = $this->load->view('bedlist/list', $data,true);
            }else {
                $json['result_html'] = $this->load->view('bedlist/list',$data,true);
            }
        } else {
            $this->insufficient_privileges();
        }
        if ($this->input->is_ajax_request()) {
            set_content_type($json);
        }
    }

    public function get_beds_status_count($ward_id){
        $data['available'] = $this->model_hms->count_available_beds($ward_id);
        $data['occupied'] = $this->model_hms->count_occupied_beds($ward_id);
        $data['blocked'] = $this->model_hms->count_blocked_beds($ward_id);
        $data['temp'] = $this->model_hms->count_temp_beds($ward_id);
        return $data;
    }

    public function permanent_bedslist() {
//        $priv = $this->authentication->read('priv');
//        $access_checker = $this->model_hms->access_checker($priv, VIEW_WARD_BED_LIST);
//        if ($access_checker == 1) {
        if (!empty($this->input->get("search_by_wardnumber"))) {
            $data['ward_beds_list'] = $this->model_hms->search_permanent_beds($this->input->get("search_by_wardnumber"));
            $this->load->view('permanent_beds', $data);
        } elseif (!empty($this->input->get("search_by_status"))) {
            $data['search_by_status_list'] = $this->model_hms->search_result_by_status($this->input->get("search_by_status"));
            $this->load->view('permanent_beds', $data);
        } else {
            $this->load->view('permanent_beds');
        }
//        } else {
//            $this->insufficient_privileges();
//        }
    }

    public function insert_temp_bed() {
        $udata['bedNo'] = $this->input->post('bedNo');
        $udata['bedStatus'] = $this->input->post('bedStatus');
        $udata['wardId'] = $this->input->post('wardId');
        $res = $this->model_hms->insert_temporary_bed($udata);
        if ($res) {
            echo 'bed added successfuly';
        }
    }

    public function delete_temp_bed() {
        $udata['bedId'] = $this->input->post('bedId');
        $res = $this->model_hms->delete_temporary_bed($udata);
        if ($res) {
            echo $res;
        }
    }

    public function statistics() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_STATISTICS);
        if ($access_checker == 1) {
            $this->load->view('statistics');
        } else {
            $this->insufficient_privileges();
        }
    }

    public function generateByDateRange($startDate, $endDate) {
        $prefix = '';
        echo "[";
        foreach (new DateRangeIterator($startDate, $endDate) as $date) {
            $result1 = $this->model_hms->admission_discharge_date_range_graph($date);
            array_push($result1, $date);
            echo $prefix . " {";
            $dateFormat = strtotime($date);
            $converter = date('d-m', $dateFormat);
            echo '  "category": "' . $converter . '",' . "";
            echo '  "admission": ' . $result1['admission'] . ',' . "";
            echo '  "discharge": ' . $result1['discharge'] . '' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function generatemonthlyGraph($startDate, $endDate) {
        $prefix = '';
        echo "[";
        foreach (new DateRangeIterator($startDate, $endDate, 'Y-m', '+1 month') as $date) {

            $result1 = $this->model_hms->admission_discharge_monthly_graph($date);

            array_push($result1, $date);
            echo $prefix . " {";
            $dateFormat = strtotime($date);
            $converter = date('m-Y', $dateFormat);
            echo '  "category": "' . $converter . '",' . "";
            echo '  "admission": ' . $result1['admission'] . ',' . "";
            echo '  "discharge": ' . $result1['discharge'] . '' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function generateyearlyGraph($startDate, $endDate) {
        $prefix = '';
        echo "[";

        foreach (new DateRangeIterator($startDate, $endDate, 'Y', '+1 year') as $date) {

            $result1 = $this->model_hms->admission_discharge_year_graph($date);
            array_push($result1, $date);
            echo $prefix . " {";
            echo '  "category": "' . $date . '",' . "";
            echo '  "admission": ' . $result1['admission'] . ',' . "";
            echo '  "discharge": ' . $result1['discharge'] . '' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function admission_discharge_graph() {
        $startDate = $this->input->get('f');
        $endDate = $this->input->get('t');
        $generateParam = $this->input->get('generateBy'); //generateBy=month

        if ($generateParam == 'range') {
            $this->generateByDateRange($startDate, $endDate);
        }

        if ($generateParam == 'monthly') {
            $this->generatemonthlyGraph($startDate, $endDate);
        }
        if ($generateParam == 'yearly') {
            $this->generateyearlyGraph($startDate, $endDate);
        }
    }

    public function generateotGraphByDateRange($startDate, $endDate) {
        $prefix = '';
        echo "[";
        foreach (new DateRangeIterator($startDate, $endDate) as $date) {
            $result1 = $this->model_hms->operated_patients_date_range_graph($date);

            array_push($result1, $date);
            echo $prefix . " {";
            echo '  "category": "' . $date . '",' . "";
            echo '  "operated_patients_count": ' . $result1['operated_patients_count'] . '' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function operated_patients_graph() {
        $startDate = $this->input->get('f');
        $endDate = $this->input->get('t');
        $generateParam = $this->input->get('generateBy'); //generateBy=month

        if ($generateParam == 'range') {
            $this->generateotGraphByDateRange($startDate, $endDate);
        }
    }

    public function generateOutcomeGraphByDateRange($startDate, $endDate) {
        $prefix = '';
        echo "[";
        foreach (new DateRangeIterator($startDate, $endDate) as $date) {
            $result1 = $this->model_hms->outcome_based_date_range_graph($date);

            array_push($result1, $date);
            echo $prefix . " {";
            $dateFormat = strtotime($date);
            $converter = date('d-m', $dateFormat);
            echo '  "date": "' . $converter . '",' . "";
            echo '  "cured": "' . $result1['cured'] . '",' . "";
            echo '  "lama": "' . $result1['lama'] . '",' . "";
            echo '  "dor": "' . $result1['dor'] . '",' . "";
            echo '  "discharged": "' . $result1['discharged'] . '",' . "";
            echo '  "referred": "' . $result1['referred'] . '",' . "";
            echo '  "death": "' . $result1['death'] . '"' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function generateOutcomeGraphMonthly($startDate, $endDate) {
        $prefix = '';
        echo "[";
        foreach (new DateRangeIterator($startDate, $endDate, 'Y-m', '+1 month') as $date) {
            $result1 = $this->model_hms->outcome_based_monthly_graph($date);

            array_push($result1, $date);
            echo $prefix . " {";
            $dateFormat = strtotime($date);
            $converter = date('m-Y', $dateFormat);
            echo '  "date": "' . $converter . '",' . "";
            echo '  "cured": "' . $result1['cured'] . '",' . "";
            echo '  "lama": "' . $result1['lama'] . '",' . "";
            echo '  "dor": "' . $result1['dor'] . '",' . "";
            echo '  "discharged": "' . $result1['discharged'] . '",' . "";
            echo '  "referred": "' . $result1['referred'] . '",' . "";
            echo '  "death": "' . $result1['death'] . '"' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function generateOutcomeGraphYearly($startDate, $endDate) {
        $prefix = '';
        echo "[";
        foreach (new DateRangeIterator($startDate, $endDate, 'Y', '+1 year') as $date) {
            $result1 = $this->model_hms->outcome_based_year_graph($date);

            array_push($result1, $date);
            echo $prefix . " {";
            echo '  "date": "' . $date . '",' . "";
            echo '  "cured": "' . $result1['cured'] . '",' . "";
            echo '  "lama": "' . $result1['lama'] . '",' . "";
            echo '  "dor": "' . $result1['dor'] . '",' . "";
            echo '  "discharged": "' . $result1['discharged'] . '",' . "";
            echo '  "referred": "' . $result1['referred'] . '",' . "";
            echo '  "death": "' . $result1['death'] . '"' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function outcome_patients_graph() {
        $startDate = $this->input->get('f');
        $endDate = $this->input->get('t');
        $generateParam = $this->input->get('generateBy'); //generateBy=month

        if ($generateParam == 'range') {
            $this->generateOutcomeGraphByDateRange($startDate, $endDate);
        }
        if ($generateParam == 'monthly') {
            $this->generateOutcomeGraphMonthly($startDate, $endDate);
        }
        if ($generateParam == 'yearly') {
            $this->generateOutcomeGraphYearly($startDate, $endDate);
        }
    }

    //=======================================================//
    //  Controller Code for Re-Visit based Graph starts here //
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//
    public function generateRevisitGraphByDateRange($startDate, $endDate) {
        $prefix = '';
        echo "[";
        foreach (new DateRangeIterator($startDate, $endDate) as $date) {
            $result1 = $this->model_hms->revisits_date_range_graph($date);

            array_push($result1, $date);
            echo $prefix . " {";
            $dateFormat = strtotime($date);
            $converter = date('d-m', $dateFormat);
            echo '  "date": "' . $converter . '",' . "";
            echo '  "revisits": "' . $result1['revisit_count'] . '"' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function generateRevisitGraphMonthly($startDate, $endDate) {
        $prefix = '';
        echo "[";
        foreach (new DateRangeIterator($startDate, $endDate, 'Y-m', '+1 month') as $date) {
            $result1 = $this->model_hms->revisits_monthly_graph($date);
            array_push($result1, $date);
            echo $prefix . " {";
            $dateFormat = strtotime($date);
            $converter = date('m-Y', $dateFormat);
            echo '  "date": "' . $converter . '",' . "";
            echo '  "revisits": "' . $result1['revisit_count'] . '"' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function generateRevisitGraphYearly($startDate, $endDate) {
        $prefix = '';
        echo "[";
        foreach (new DateRangeIterator($startDate, $endDate, 'Y', '+1 year') as $date) {
            $result1 = $this->model_hms->revisits_yearly_graph($date);

            array_push($result1, $date);
            echo $prefix . " {";
            echo '  "date": "' . $date . '",' . "";
            echo '  "revisits": "' . $result1['revisit_count'] . '"' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function revisit_patients_graph() {
        $startDate = $this->input->get('f');
        $endDate = $this->input->get('t');
        $generateParam = $this->input->get('generateBy'); //generateBy=month

        if ($generateParam == 'range') {
            $this->generateRevisitGraphByDateRange($startDate, $endDate);
        }
        if ($generateParam == 'monthly') {
            $this->generateRevisitGraphMonthly($startDate, $endDate);
        }
        if ($generateParam == 'yearly') {
            $this->generateRevisitGraphYearly($startDate, $endDate);
        }
    }

    //=======================================================//
    //  Controller Code for Re-Visit based Graph ends here   //
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//
    //=======================================================//
    //Controller Code for disease based pie-chart starts here//
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//
    public function generateMonthBaseddiseasePiechart($month) {

        $prefix = '';
        echo "[";
        $result1 = $this->model_hms->disease_monthly_piechart($month);
        foreach ($result1 as $item) {

            echo $prefix . " {";
            echo '  "disease-name": "' . $item['disease_name'] . '",' . "";
            echo '  "disease-count": "' . $item['disease_count'] . '"' . "";
            echo " }";
            $prefix = ",";
        }

        echo "]";
    }

    public function generateYearBaseddiseasePiechart($year) {
        $prefix = '';
        echo "[";
        $result1 = $this->model_hms->disease_yearly_piechart($year);
        foreach ($result1 as $item) {
            echo $prefix . " {";
            echo '  "disease-name": "' . $item['disease_name'] . '",' . "";
            echo '  "disease-count": "' . $item['disease_count'] . '"' . "";
            echo " }";
            $prefix = ",";
        }
        echo "]";
    }

    public function disease_based_graph() {
        $date = $this->input->get('d');
        $generateParam = $this->input->get('generateBy'); //generateBy=month

        if ($generateParam == 'monthly') {
            $this->generateMonthBaseddiseasePiechart($date);
        }
        if ($generateParam == 'yearly') {
            $this->generateYearBaseddiseasePiechart($date);
        }
    }

    //=======================================================//
    // Controller Code for disease based pie-chart ends here //
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//


    public function patient_reports() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_RADIOLOGY_SECTION); //1, can_book_ot
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $data['patient_list'] = $this->model_hms->search_result_by_cnic_chart($this->input->get("search_by_cnic"));
                $data['report_list'] = $this->model_hms->report_view($this->input->get("search_by_cnic"));
                if (!empty($this->input->post("btn-report-submit"))) {
                    $report['reportName'] = $this->input->post("reportName");
                    $reporttype = preg_replace('/[^A-Za-z0-9\-]/','',$this->input->post("reportType"));
                    $report['reportType'] = $reporttype;
                    $reportcomment = preg_replace('/[^A-Za-z0-9\-]/','',$this->input->post("reportComments"));
                    $report['reportComments'] = $reportcomment;
                    $path = $this->input->post("reportUploaded");
                    $report['patregNo'] = $this->input->get("search_by_cnic");

                    $newReportName = $report['patregNo'] . "-" . $report['reportType'] . "-" . date("Y-m-d-h-i-sa");
                    $reportPath = $this->do_report_upload($newReportName);

                    $filteredExtension = preg_replace('/\d/', '', $reportPath['file_ext']);
                    $report['reportPath'] = $reportPath . $filteredExtension;
                    // $report['reportPath'] = $reportPath['file_name'];

                    $query = $this->model_hms->report_insert($report);
                    if ($query) {
                        redirect(base_url('dashboard/patient_reports/?search_by_cnic=' . $report['patregNo']));
                        // unset($_POST);
                    }
                }
                $this->load->view('patient_reports', $data);
            }
            if (empty($this->input->get()) || !empty($this->input->get('success') == "true")) {
                $this->load->view('patient_reports');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    //=======================================================//
    // Controller Code for patient vitals sheet starts here  //
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//
    public function patient_vitals_sheet() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_RADIOLOGY_SECTION); //1, can_book_ot
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $data['patient_list'] = $this->model_hms->search_result_by_cnic_chart($this->input->get("search_by_cnic"));
                $data['vitals_list'] = $this->model_hms->vitals_view($this->input->get("search_by_cnic"));
                if (!empty($this->input->post("btn-vitals-submit"))) {

                    $vitals['vital_timestamp'] = $this->input->post("vitals-date") . " " . $this->input->post("vitals-time");
                    $vitals['vital_bp'] = "SYS: " . $this->input->post("vitals-sys-bp") . " - " . "DIA: " . $this->input->post("vitals-dia-bp");
                    $vitals['vital_resp_rate'] = $this->input->post("vitals-resp");
                    $vitals['vital_height'] = $this->input->post("vitals-height");
                    $vitals['vital_weight'] = $this->input->post("vitals-weight");
                    $vitals['vital_bmi'] = $this->input->post("vitals-bmi");
                    $vitals['vital_pain'] = $this->input->post("vitals-pain");
                    $vitals['vital_temp'] = $this->input->post("vitals-temp");
                    $vitals['vital_pulse'] = $this->input->post("vitals-pulse-rate");
                    $vitals['regNo'] = $this->input->get("search_by_cnic");
                    $query = $this->model_hms->vitals_insert($vitals);
                    if ($query) {
                        redirect(base_url('dashboard/patient_vitals_sheet/?search_by_cnic=' . $vitals['regNo']));
                    }
                }
                $this->load->view('patient_vitals_sheet', $data);
            }
            if (empty($this->input->get()) || !empty($this->input->get('success') == "true")) {
                $this->load->view('patient_vitals_sheet');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    //=======================================================//
    // Controller Code for patient vitals sheet ends here    //
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//
    public function do_report_upload($reportName) {
        $config['upload_path'] = "./assets/dist/img/reports/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 5000;
        $config['max_width'] = 5000;
        $config['max_height'] = 5000;
        $config['file_name'] = $reportName;

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('reportUploaded')) {
            $error = array('error' => $this->upload->display_errors());
            return $error;
        } else {
            $filename = $this->upload->data('file_name');
            $data = array('upload_data' => $this->upload->data());
            return $filename;
        }
    }

    public function delete_report() {
        $res = $this->model_hms->delete_report_model($this->input->post('reportId'));
        if ($res) {
            echo $res;
        }
    }

    public function delete_vital() {
        $res = $this->model_hms->delete_vital_model($this->input->post('vitalId'));
        if ($res) {
            echo $res;
        }
    }

    public function wards_list() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, CAN_BOOK_OT); //1, can_book_ot
        if ($access_checker == 1) {

            $data['wards_list'] = $this->model_hms->get_all_wards();
            if (!empty($this->input->post("btn-ward-submit"))) {
                $report['wardName'] = $this->input->post("wardName");
                $query = $this->model_hms->insert_new_ward($report);
                if ($query) {
                    redirect(base_url('dashboard/wards_list'));
                    // unset($_POST);
                }
            }
            $this->load->view('wards', $data);
        } else {
            $this->insufficient_privileges();
        }
    }

    public function ot_wards_list() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_MASTER_LIST); //1, can_book_ot
        if ($access_checker == 1) {
            $data['wards_list'] = $this->model_hms->get_all_ot_wards();
            if (!empty($this->input->post("btn-ward-submit"))) {
                $ward['otwardName'] = $this->input->post("wardName");
                $query = $this->model_hms->insert_new_ot_ward($ward);
                if ($query) {
                    redirect(base_url('dashboard/ot_wards_list'));
                    // unset($_POST);
                }
            }
            $this->load->view('ot_wards', $data);
        } else {
            $this->insufficient_privileges();
        }
    }

    public function add_expense_category() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_MASTER_LIST); //1, can_book_ot
        if ($access_checker == 1) {
            $data['expense_list'] = $this->model_hms->get_all_expenses();
            if (!empty($this->input->post("btn-expense-submit"))) {
                $expense['categoryName'] = $this->input->post("categoryName");
                $query = $this->model_hms->insert_new_expense($expense);
                if ($query) {
                    redirect(base_url('dashboard/add_expense_category/'));
                    // unset($_POST);
                }
            }
            $this->load->view('add_expense_category', $data);
        } else {
            $this->insufficient_privileges();
        }
    }

    public function update_side_room_cost() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_MASTER_LIST); //1, can_book_ot
        if ($access_checker == 1) {
            $data['rate'] = $this->model_hms->get_side_room_cost();
            $this->load->view('side_room_cost', $data);
        } else {
            $this->insufficient_privileges();
        }
    }

    public function announcements() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_MASTER_LIST); //1, can_book_ot
        if ($access_checker == 1) {
            $data['announcements'] = $this->model_hms->get_all_announcements();
            $this->load->view('announcement', $data);
        } else {
            $this->insufficient_privileges();
        }
    }

    public function insert_new_announcement() {
        $data['ann_text'] = strip_tags($this->input->post('ann_text'));
        $data['docName'] = strip_tags($this->input->post('docName'));
        $query = $this->model_hms->insert_new_announcement($data);
        if ($query) {
            echo $query;
        } else {
            echo $query;
        }
    }

    //Arslan Code Ends Here
//=======================================================//
//       Controller Code for OT Module starts here       //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    public function operation_theatre() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, CAN_BOOK_OT); //1, can_book_ot
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $data['patient_list'] = $this->model_hms->search_result_by_cnic_chart($this->input->get("search_by_cnic"));
                $this->load->view('operation_theatre', $data);
            }
            if (empty($this->input->get()) || !empty($this->input->get('success') == "true") || !empty($this->input->get('error') == "true")) {
                $this->load->view('operation_theatre');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function insert_ot_booking_db() {
        $udata['otPatNo'] = $this->input->post('ot-patno');
        $udata['otWardNo'] = $this->input->post('ot-ward');
        $udata['otOperationType'] = $this->input->post('operation-type');
        $udata['otPatientStatus'] = $this->input->post('patient-status');
        $udata['otBookingDate'] = $this->input->post('opDateTime');
        $udata['otBookingTime'] = $this->input->post('opTime');
        $udata['otBookedBy'] = $this->authentication->read('identifier');
        $udata['otPatName'] = $this->input->post('ot-patname');
        $udata['otSurgeon'] = $this->input->post('ot-surgeon-name');


        $myDateTime = $this->input->post('opDateTime');
        $new_date = strtotime($myDateTime);
        $newDateString = date('Y-m-d', $new_date);
        $udata['otBookingDate1'] = $newDateString;

        $myDateTime = $this->input->post('opTime');
        $new_date = strtotime($myDateTime);
        $newDateString = date('H:i:s', $new_date);
        $udata['otBookingTime1'] = $newDateString;
        $check_ot = $this->model_hms->check_patient_ot_by_regno($this->input->post('ot-patno'));
        if (!empty($check_ot)) {
            header('location:' . base_url("dashboard/operation_theatre?error=true"));
        } else {
            $res = $this->model_hms->insert_ot_booking_to_db($udata);
            if ($res) {
                $base_url = load_class('Config')->config['base_url'];
                header('location:' . base_url("dashboard/operation_theatre?success=true"));
            }
        }
    }

    public function view_operationlist() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, CAN_VIEW_OT_LIST);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $data['search'] = "search_by_cnic";
                $data['id'] = $this->input->get("search_by_cnic");
                $data['operation_list'] = $this->model_hms->search_result_by_ot_patid($this->input->get("search_by_cnic"));
                $this->load->view('view_operationlist', $data);
            } elseif (!empty($this->input->get("search_by_otward"))) {
                $data['search'] = "search_by_otward";
                $data['id'] = $this->input->get("search_by_otward");
                $data['operation_list'] = $this->model_hms->search_result_by_otward($this->input->get("search_by_otward"));
                $this->load->view('view_operationlist', $data);
            } elseif (!empty($this->input->post("search_by_date"))) {
                $data['search'] = "search_by_date";
                $data['id'] = $this->input->get("search_by_date");
                $data['operation_list'] = $this->model_hms->search_result_ot_by_date($this->input->post("search_by_date"));
                $this->load->view('view_operationlist', $data);
            } elseif (!empty($this->input->get("search_by_otward_operated"))) {
                $data['search'] = "search_by_otward_operated";
                $data['id'] = $this->input->get("search_by_otward_operated");
                $data['operated_list'] = $this->model_hms->search_result_by_otward_operated($this->input->get("search_by_otward_operated"));
                $this->load->view('view_operationlist', $data);
            } elseif (!empty($this->input->post("search_by_date_operated"))) {
                $data['search'] = "search_by_date_operated";
                $data['id'] = $this->input->get("search_by_date_operated");
                $data['operated_list'] = $this->model_hms->search_result_ot_by_date_operated($this->input->post("search_by_date_operated"));
                $this->load->view('view_operationlist', $data);
            } else {
                $this->load->view('view_operationlist');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function ot_delete() {
        $ot_id = $this->input->post('ot_id');
        $this->model_hms->delete_ot($ot_id);
    }

    public function update_ot_operated_db() {
        $otid = $this->input->post('otBookingNo');
        $udata['otAnesthesia'] = $this->input->post('otAnesthesia');
        $udata['otOpFindingsProc'] = $this->input->post('otOpFindingsProc');


        if (!empty($this->input->post('dateOfOperation'))) {
            $udata['dateOfOperation'] = $this->input->post('dateOfOperation');

            $dateFormat = strtotime($this->input->post('dateOfOperation'));
            $converter = date('Y-m-d', $dateFormat);
            $udata['formatted_date_of_op'] = $converter;
        } else {
            date_default_timezone_set("Asia/Karachi");
            $udata['dateOfOperation'] = date('d-m-Y');
            $udata['formatted_date_of_op'] = date('Y-m-d');
        }

        $udata['timeOfOperation'] = $this->input->post('timeOfOperation');
        $udata['preOpDiagnosis'] = $this->input->post('preOpDiagnosis');
        $udata['postOpDiagnosis'] = $this->input->post('postOpDiagnosis');
        $udata['anesthesia'] = $this->input->post('anesthesia');
        $udata['assistant'] = $this->input->post('assistant');
        $udata['incision'] = $this->input->post('incision');
        $udata['durationOfProcedure'] = $this->input->post('durationOfProcedure');
        $udata['preOperativeFindings'] = $this->input->post('preOperativeFindings');
        $udata['biopsy'] = $this->input->post('biopsy');
        $udata['drains'] = $this->input->post('drains');
        $udata['referring_consultent'] = $this->input->post('referr_cons');
        $udata['vdoc_name'] = $this->input->post('vitaldrname');
        $udata['otVitalPulse'] = $this->input->post('opvitaloulse');
        $udata['otVitalbp'] = $this->input->post('opvitalbp');
        $udata['otVitaltemp'] = $this->input->post('opvitaltemp');
        $udata['otVitalrr'] = $this->input->post('opvitalrr');
        
        $this->model_hms->update_ot_operated_db($udata, $otid);
    }

    public function edit_operation_theatre() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, CAN_BOOK_OT);
        if ($access_checker == 1) {

            if (!empty($this->input->get("search_by_ot"))) {
                $data['operation_list'] = $this->model_hms->search_result_by_ot_id($this->input->get("search_by_ot"));
                $this->load->view('edit_operation_theatre', $data);
            }
            if (empty($this->input->get())) {
                $base_url = load_class('Config')->config['base_url'];
                header('location:' . $base_url . "index.php/dashboard/view_operationlist");
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function update_ot_booking_db() {
        $otid = $this->input->post('ot-booking-no');
        $udata['otSurgeon'] = $this->input->post('ot-surgeon-name');
        $udata['otWardNo'] = $this->input->post('ot-ward');
        $udata['otOperationType'] = $this->input->post('operation-type');
        $udata['otPatientStatus'] = $this->input->post('patient-status');
        $udata['otBookingDate'] = $this->input->post('opDateTime');
        $udata['otBookingTime'] = $this->input->post('opTime');

        $myDateTime = $this->input->post('opDateTime');
        $new_date = strtotime($myDateTime);
        $newDateString = date('Y-m-d', $new_date);
        $udata['otBookingDate1'] = $newDateString;

        $myDateTime = $this->input->post('opTime');
        $new_date = strtotime($myDateTime);
        $newDateString = date('H:i:s', $new_date);
        $udata['otBookingTime1'] = $newDateString;

        $res = $this->model_hms->update_ot_booking_to_db($udata, $otid);
        if ($res) {
            $base_url = load_class('Config')->config['base_url'];
            header('location:' . base_url("dashboard/view_operationlist?usuccess=true"));
        }
    }

//=======================================================//
//        Controller Code for OT Module ends here        //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
//=======================================================//
//     Controller Code for Account Module starts here    //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    public function patient_account_details() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $result = $this->model_hms->check_patient_account($this->input->get("search_by_cnic"));
                if ($result->counter == 0) {
                    $udata['patientRegNo'] = $this->input->get("search_by_cnic");
                    $udata['totalDepositedAmount'] = 0;
                    $udata['runningBill'] = 0;
                    $udata['remainingAmount'] = 0;
                    $udata['discount'] = 0;
                    $udata['refundableAmount'] = 0;
                    $udata['freeStatus'] = "";
                    $udata['isInvoiceGenerated'] = 0;
                    $udata['invoiceGeneratedDate'] = "";
                    $udata['invoiceGeneratedDate1'] = "";
                    $this->model_hms->create_patient_account($udata);
                }
                $data['patient_list'] = $this->model_hms->search_result_acc_by_pat_id($this->input->get("search_by_cnic"));
                if (empty($data['patient_list'])) {
                    $data['patient_list'] = $this->model_hms->search_result_acc_by_dis_pat_id($this->input->get("search_by_cnic"));
                }
                $accountno = $this->model_hms->get_patient_account_no($this->input->get("search_by_cnic"));
                $payment = $this->model_hms->get_payment_sum($accountno->patientAccountNo);
                $expense = $this->model_hms->get_expense_sum($accountno->patientAccountNo);
                $data['payment_sum'] = $payment;
                $data['expense_sum'] = $expense;

                $udata['patientAccountNo'] = $accountno->patientAccountNo;
                $udata['totalDepositedAmount'] = $payment->paymentSum;
                $udata['runningBill'] = $expense->expenseSum;
                $udata['remainingAmount'] = $payment->paymentSum - $expense->expenseSum;
                $this->model_hms->update_detail_by_account_no($udata);

                $data['account_list'] = $this->model_hms->get_patient_account($accountno->patientAccountNo);
                $data['payment_list'] = $this->model_hms->get_patient_payments($accountno->patientAccountNo);
                $data['expense_list'] = $this->model_hms->get_patient_expenses($accountno->patientAccountNo);

                $this->load->view('patient_account_details', $data);
            } else {
                $this->load->view('patient_account_details');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function insert_patient_payment() {
        $regNo = $this->input->post('regNo');
        $udata['patientAccountNo'] = $this->input->post('accountNo');
        $udata['paymentAmount'] = $this->input->post('amount');
        $udata['receivedBy'] = $this->authentication->read('identifier');
        $udata['paymentDate'] = date('d-m-Y');
        $udata['paymentDate1'] = date('Y-m-d');

        date_default_timezone_set("Asia/Karachi");
        $udata['paymentTime'] = date('h:i A');
        $udata['paymentTime1'] = date('H:i:s');

        $this->model_hms->insert_patient_payment($udata);
    }

    public function generate_invoice() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $result = $this->model_hms->check_patient_account($this->input->get("search_by_cnic"));
                if ($result->counter == 0) {
                    $udata['patientRegNo'] = $this->input->get("search_by_cnic");
                    $udata['totalDepositedAmount'] = 0;
                    $udata['runningBill'] = 0;
                    $udata['remainingAmount'] = 0;
                    $udata['discount'] = 0;
                    $udata['refundableAmount'] = 0;
                    $udata['freeStatus'] = "";
                    $udata['isInvoiceGenerated'] = 0;
                    $udata['invoiceGeneratedDate'] = "";
                    $udata['invoiceGeneratedDate1'] = "";
                    $this->model_hms->create_patient_account($udata);
                }
                $data['patient_list'] = $this->model_hms->search_result_acc_by_pat_id($this->input->get("search_by_cnic"));
                if (empty($data['patient_list'])) {
                    $data['patient_list'] = $this->model_hms->search_result_acc_by_dis_pat_id($this->input->get("search_by_cnic"));
                }
                $accountno = $this->model_hms->get_patient_account_no($this->input->get("search_by_cnic"));
                $payment = $this->model_hms->get_payment_sum($accountno->patientAccountNo);
                $expense = $this->model_hms->get_expense_sum($accountno->patientAccountNo);
                $data['payment_sum'] = $payment;
                $data['expense_sum'] = $expense;

                $udata['patientAccountNo'] = $accountno->patientAccountNo;
                $udata['totalDepositedAmount'] = $payment->paymentSum;
                $udata['runningBill'] = $expense->expenseSum;
                $udata['remainingAmount'] = $payment->paymentSum - $expense->expenseSum;
                $this->model_hms->update_detail_by_account_no($udata);

                $data['account_list'] = $this->model_hms->get_patient_account($accountno->patientAccountNo);
                $data['payment_list'] = $this->model_hms->get_patient_payments($accountno->patientAccountNo);
                $data['expense_list'] = $this->model_hms->get_patient_expenses($accountno->patientAccountNo);

                $this->load->view('generate_invoice', $data);
            } else {
                $this->load->view('generate_invoice');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function generated_invoice() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->get("accountno"))) {
                $data['invoice'] = $this->model_hms->get_invoice_by_acc_id($this->input->get("accountno"));
                $row_invoice = $this->model_hms->get_invoice_by_acc_id($this->input->get("accountno"));
                if (!empty($row_invoice)) {
                    $invoiceno = $row_invoice->invoiceNo;
                    $regno = $invoiceNo = $row_invoice->regNo;
                    $data['invoice_details'] = $this->model_hms->get_invoice_detail_by_invoice_no($invoiceno);

                    $data['patient_list'] = $this->model_hms->get_patient_detail_by_reg_no($regno);
                    if (empty($data['patient_list'])) {
                        $data['patient_list'] = $this->model_hms->get_dischared_patient_detail_by_reg_no($regno);
                    }
                    $this->load->view('generated_invoice', $data);
                } else {
                    header("location:" . base_url('dashboard/generate_invoice'));
                }
            } else {
                header("location:" . base_url('dashboard/generate_invoice'));
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function update_account_db() {
        $discount = $this->input->post('discount');
        $regno = $this->input->post('regno');
        $accountno = $this->input->post('accountno');
        date_default_timezone_set("Asia/Karachi");
        $datetimeString = date("d-m-Y h:i A");
        $nowdate = date("Y-m-d");
        if ($discount == "") {
            $discount = 0;
        }
        $this->model_hms->update_account_db($discount, $accountno, $datetimeString, $nowdate);
        $row_exp_sum = $this->model_hms->get_expense_sum_by_acc_id($accountno);
        $subtotal = $row_exp_sum->runningBill;
        $tax = 0;
        $sdata['invoiceDateTime'] = $datetimeString;
        $sdata['invoiceDate'] = $nowdate;
        $sdata['accountNo'] = $accountno;
        $sdata['regNo'] = $regno;
        $sdata['invoiceSubtotal'] = $subtotal;
        $sdata['invoiceTax'] = $tax;
        $sdata['invoiceDiscount'] = $discount;
        $sdata['invoiceTotal'] = ($subtotal + $tax) - $discount;

        $this->model_hms->insert_invoice_db($sdata);
        $row_invoice = $this->model_hms->get_invoice_no_by_acc_id($accountno);
        $invoiceNo = $row_invoice->invoiceNo;
        $array = $this->model_hms->get_expense_by_acc_id($accountno);

        foreach ($array as $a_key) {
            $udata['detailDescription'] = $a_key['expenseDescription'];
            $udata['detailQty'] = $a_key['qty'];
            $udata['detailSubtotal'] = $a_key['subtotal'];
            $udata['invoiceNo'] = $invoiceNo;
            $this->model_hms->insert_invoice_detail($udata);
        }
    }

    public function search_invoice() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->get("invoiceno"))) {
                $data['invoice'] = $this->model_hms->get_invoice_by_id($this->input->get("invoiceno"));
                $row_invoice = $this->model_hms->get_invoice_by_id($this->input->get("invoiceno"));
                if (!empty($row_invoice)) {
                    $regno = $invoiceNo = $row_invoice->regNo;
                    $data['invoice_details'] = $this->model_hms->get_invoice_detail_by_invoice_no($this->input->get("invoiceno"));

                    $data['patient_list'] = $this->model_hms->get_patient_detail_by_reg_no($regno);
                    if (empty($data['patient_list'])) {
                        $data['patient_list'] = $this->model_hms->get_dischared_patient_detail_by_reg_no($regno);
                    }
                    $this->load->view('search_invoice', $data);
                } else {
                    $data['error'] = "true";
                    $this->load->view('search_invoice', $data);
                }
            } else if (!empty($this->input->post("search-by-date"))) {
                $data['invoice_list'] = $this->model_hms->get_invoice_by_date($this->input->post("search-by-date"));
                if (!empty($data['invoice_list'])) {
                    $this->load->view('search_invoice', $data);
                } else {
                    $data['error'] = "true";
                    $this->load->view('search_invoice', $data);
                }
            } else {
                $this->load->view('search_invoice');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function refunds() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $result = $this->model_hms->check_patient_account($this->input->get("search_by_cnic"));
                if ($result->counter == 0) {
                    $udata['patientRegNo'] = $this->input->get("search_by_cnic");
                    $udata['totalDepositedAmount'] = 0;
                    $udata['runningBill'] = 0;
                    $udata['remainingAmount'] = 0;
                    $udata['discount'] = 0;
                    $udata['refundableAmount'] = 0;
                    $udata['freeStatus'] = "";
                    $udata['isInvoiceGenerated'] = 0;
                    $udata['invoiceGeneratedDate'] = "";
                    $udata['invoiceGeneratedDate1'] = "";
                    $this->model_hms->create_patient_account($udata);
                }
                $data['patient_list'] = $this->model_hms->search_result_acc_by_pat_id($this->input->get("search_by_cnic"));
                if (empty($data['patient_list'])) {
                    $data['patient_list'] = $this->model_hms->search_result_acc_by_dis_pat_id($this->input->get("search_by_cnic"));
                }
                $accountno = $this->model_hms->get_patient_account_no($this->input->get("search_by_cnic"));
                $payment = $this->model_hms->get_payment_sum($accountno->patientAccountNo);
                $expense = $this->model_hms->get_expense_sum($accountno->patientAccountNo);
                $data['payment_sum'] = $payment;
                $data['expense_sum'] = $expense;

                $udata['patientAccountNo'] = $accountno->patientAccountNo;
                $udata['totalDepositedAmount'] = $payment->paymentSum;
                $udata['runningBill'] = $expense->expenseSum;
                $udata['remainingAmount'] = $payment->paymentSum - $expense->expenseSum;
                $this->model_hms->update_detail_by_account_no($udata);

                $data['account_list'] = $this->model_hms->get_patient_account($accountno->patientAccountNo);

                $this->load->view('refunds', $data);
            } else {
                $this->load->view('refunds');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function update_account_refund_db() {
        $accountno = $this->input->post('accountno');
        $refundamount = $this->input->post('refundamount');
        $this->model_hms->update_account_refund_db($accountno, $refundamount);
    }

    public function outstanding_patients() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            $accounts = $this->model_hms->get_accounts();
            if (!empty($accounts)) {
                foreach ($accounts as $a_key) {
                    $accountno = $a_key['patientAccountNo'];
                    $payment = $this->model_hms->get_payment_sum($accountno);
                    $expense = $this->model_hms->get_expense_sum($accountno);

                    $udata['patientAccountNo'] = $accountno;
                    $udata['totalDepositedAmount'] = $payment->paymentSum;
                    $udata['runningBill'] = $expense->expenseSum;
                    $udata['remainingAmount'] = $payment->paymentSum - $expense->expenseSum;
                    $this->model_hms->update_detail_by_account_no($udata);
                }
                $data['accounts_list'] = $this->model_hms->get_accounts();
                $this->load->view('outstanding_patients', $data);
            } else {
                $this->load->view('outstanding_patients');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function add_expense() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->post("expense_category_no0"))) {
                $rows = $this->input->post("total-rows");
                for ($i = 0; $i <= $rows; $i++) {
                    if (!empty($this->input->post("expense_category_no" . $i))) {
                        $udata['expCategNo'] = $this->input->post("expense_category_no" . $i);
                        $datestring = $this->input->post("expense_date" . $i);
                        $udata['expDateString'] = $datestring;
                        $timestring = $this->input->post("expense_time" . $i);
                        $udata['expTimeString'] = $timestring;
                        $udata['expDescription'] = $this->input->post("expense_description" . $i);
                        $udata['expAmount'] = $this->input->post("expense_amount" . $i);
                        $udata['expAddBy'] = $this->authentication->read('identifier');
                        $new_date = strtotime($datestring);
                        $new_time = strtotime($timestring);
                        $udata['expDate'] = date('Y-m-d', $new_date);
                        $udata['expTime'] = date('H:i:s', $new_time);

                        $this->model_hms->insert_expense($udata);
                    }
                }
                $data['success'] = "true";
                $this->load->view('add_expense', $data);
            } else {
                $this->load->view('add_expense');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function search_expense_category() {
        if (!empty($this->input->get("search_expense_category_no"))) {
            $this->model_hms->ajax_search_category_by_no($this->input->get("search_expense_category_no"));
        }
        if (empty($this->input->get("search_expense_category_no"))) {
            $this->model_hms->ajax_search_category_by_no($this->input->get("search_expense_category_no"));
        }
    }

    public function view_expense() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->post("start_date"))) {
                $fromdate = $this->input->post("start_date");
                $todate = $this->input->post("end_date");
                $data['formdate'] = $fromdate;
                $data['todate'] = $todate;
                $data['expense_list'] = $this->model_hms->get_expense_list_by_daterange($fromdate, $todate);
                $this->load->view('view_expense', $data);
            } else {
                $this->load->view('view_expense');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function edit_expense() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->get("expense_no"))) {
                $data['expense_list'] = $this->model_hms->get_expense_by_id($this->input->get("expense_no"));
                $data['category_list'] = $this->model_hms->get_category_list();
                $this->load->view('edit_expense', $data);
            } elseif (!empty($this->input->post("expense_category_no"))) {
                $expno = $this->input->post("expense_no");
                $category = $this->input->post("expense_category_no");
                $datestring = $this->input->post("expense_date");
                $timestring = $this->input->post("expense_time");
                $description = $this->input->post("expense_description");
                $amount = $this->input->post("expense_amount");
                $new_date = strtotime($datestring);
                $new_time = strtotime($timestring);
                $nowdate = date('Y-m-d', $new_date);
                $nowtime = date('H:i:s', $new_time);
                $result = $this->model_hms->update_expense_by_no($expno, $category, $datestring, $timestring, $description, $amount, $nowdate, $nowtime);
                if ($result) {
                    $data['update_success'] = "true";
                    $this->load->view('view_expense', $data);
                }
            } else {
                $this->load->view('view_expense');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function exp_delete() {
        $exp_id = $this->input->post('exp_id');
        $this->model_hms->delete_exp($exp_id);
    }

    public function exp_update() {
        $exp_id = $this->input->post('exp_id');
        $this->model_hms->update_print_exp($exp_id);
    }

    public function print_invoice() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->get("accountno"))) {
                $data['invoice'] = $this->model_hms->get_invoice_by_acc_id($this->input->get("accountno"));
                $row_invoice = $this->model_hms->get_invoice_by_acc_id($this->input->get("accountno"));
                if (!empty($row_invoice)) {
                    $invoiceno = $row_invoice->invoiceNo;
                    $regno = $invoiceNo = $row_invoice->regNo;
                    $data['invoice_details'] = $this->model_hms->get_invoice_detail_by_invoice_no($invoiceno);

                    $data['patient_list'] = $this->model_hms->get_patient_detail_by_reg_no($regno);
                    if (empty($data['patient_list'])) {
                        $data['patient_list'] = $this->model_hms->get_dischared_patient_detail_by_reg_no($regno);
                    }
                    $this->load->view('print_invoice', $data);
                } else {
                    header("location:" . base_url('dashboard/generate_invoice'));
                }
            } else {
                header("location:" . base_url('dashboard/generate_invoice'));
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function print_hospital_expenses() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_ACCOUNTS);
        if ($access_checker == 1) {
            if (!empty($this->input->post("formdate")) && !empty($this->input->post("todate"))) {
                $fromdate = $this->input->post("formdate");
                $todate = $this->input->post("todate");
                $fdate = strtotime($this->input->post("formdate"));
                $tdate = strtotime($this->input->post("todate"));
                $data['fdate'] = date('d-m-Y', $fdate);
                $data['tdate'] = date('d-m-Y', $tdate);
                $data['expense_list'] = $this->model_hms->get_expense_list_by_daterange($fromdate, $todate);
                $this->load->view('print_hospital_expenses', $data);
            } else {
                header("location:" . base_url('dashboard/view_expense'));
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function print_operation_list() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, CAN_VIEW_OT_LIST);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $data['operation_list'] = $this->model_hms->search_result_by_ot_patid($this->input->get("search_by_cnic"));
                $this->load->view('print_operation_list', $data);
            } elseif (!empty($this->input->get("search_by_otward"))) {
                $data['operation_list'] = $this->model_hms->search_result_by_otward($this->input->get("search_by_otward"));
                $this->load->view('print_operation_list', $data);
            } elseif (!empty($this->input->post("search_by_date"))) {
                $data['operation_list'] = $this->model_hms->search_result_ot_by_date($this->input->post("search_by_date"));
                $this->load->view('print_operation_list', $data);
            } else {
                $this->load->view('view_operationlist');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

//=======================================================//
//      Controller Code for Account Module ends here     //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
//=======================================================//
//    Controller Code for OT Form Module starts here     //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    public function operation_theatre_form() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, CAN_VIEW_OT_LIST);
        if ($access_checker == 1) {
            $otBookingNo = $this->input->get("search_by_ot");
            $result = $this->model_hms->check_record_is_exist($otBookingNo);
            if (!empty($result)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_pre_op_fitness($udata);
            }
            $data['pre_op_fitness'] = $this->model_hms->get_pre_op_fitness_by_otno($otBookingNo);
            $result1 = $this->model_hms->check_pre_op_order_record_is_exist($otBookingNo);
            if (!empty($result1)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_pre_op_order($udata);
            }
            $data['pre_op_order'] = $this->model_hms->get_pre_op_order_by_otno($otBookingNo);

            $result2 = $this->model_hms->check_checklist_record_is_exist($otBookingNo);
            if (!empty($result2)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_preop_checklist($udata);
            }
            $data['pre_op_checklist'] = $this->model_hms->get_pre_op_checklist_by_otno($otBookingNo);

            $result3 = $this->model_hms->check_surgical_checklist_record_is_exist($otBookingNo);
            if (!empty($result3)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_surgical_checklist($udata);
            }
            $data['surgical_checklist'] = $this->model_hms->get_surgical_checklist_by_otno($otBookingNo);
            $result4 = $this->model_hms->check_post_operative_instructions_record_is_exist($otBookingNo);
            if (!empty($result4)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_post_operative_instructions($udata);
            }
            $data['post_operative_instructions'] = $this->model_hms->get_post_operative_instructions_by_otno($otBookingNo);
            $user_id = $this->authentication->read('identifier');
            $result_user = $this->model_hms->user_verify_is_nurse($user_id);
            if (!empty($result_user)) {
                $data['user_value'] = "1";
            } else {
                $data['user_value'] = "0";
            }

            $result5 = $this->model_hms->check_protocol_receiving_patient_ot_record_is_exist($otBookingNo);
            if (!empty($result5)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_protocol_receiving_patient_ot($udata);
            }
            $data['protocol_receiving_patient_ot'] = $this->model_hms->get_protocol_receiving_patient_ot_by_otno($otBookingNo);

            $result6 = $this->model_hms->check_consent_op_record_is_exist($otBookingNo);
            if (!empty($result6)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_consent_op($udata);
            }
            $data['consent_op'] = $this->model_hms->get_consent_op_by_otno($otBookingNo);
            $data['nurse_list'] = $this->model_hms->get_nurse_list_for_ot_form();

            $this->load->view('operation_theatre_form', $data);
        } else {
            $this->insufficient_privileges();
        }
    }

    public function update_pre_op_fitness() {
        $id = $this->input->post('preOpFNo');
        $udata['anesthetistRemarks'] = $this->input->post('anesthetistRemarks');
        $udata['anesthetistAdvice'] = $this->input->post('anesthetistAdvice');
        $udata['anesthetistName'] = $this->input->post('anesthetistName');
        $udata['physicianRemarks'] = $this->input->post('physicianRemarks');
        $udata['physicianAdvice'] = $this->input->post('physicianAdvice');
        $udata['physicianName'] = $this->input->post('physicianName');
        $udata['anyOther'] = $this->input->post('anyOther');

        $this->model_hms->update_pre_op_fitness_db($udata, $id);
    }

    public function update_pre_op_order() {
        $id = $this->input->post('preOpONo');
        $udata['dateString'] = $this->input->post('dateTimeNow');
        $udata['marksIdentification1'] = $this->input->post('marksIdentification1');
        $udata['marksIdentification2'] = $this->input->post('marksIdentification2');
        $udata['operationSite'] = $this->input->post('operationSite');
        $udata['operationSideMarked'] = $this->input->post('operationSideMarked');
        $udata['giveBath'] = $this->input->post('giveBath');
        $udata['markOperationSite'] = $this->input->post('markOperationSite');
        $udata['provideHospitalDress'] = $this->input->post('provideHospitalDress');
        $udata['areaName'] = $this->input->post('areaName');
        $udata['npoFormTime'] = $this->input->post('npoFormTime');
        $udata['arrangeBlood'] = $this->input->post('arrangeBlood');
        $udata['sendFInvestigationOt'] = $this->input->post('sendFInvestigationOt');
        $udata['preMedication'] = $this->input->post('preMedication');
        $udata['sendPatientOtTime'] = $this->input->post('sendPatientOtTime');
        $udata['anyOtherOrder'] = $this->input->post('anyOtherOrder');
        $udata['laproscopicUse'] = $this->input->post('laproscopicUse');
        $udata['diathermyUse'] = $this->input->post('diathermyUse');
        $udata['tourniquetUse'] = $this->input->post('tourniquetUse');
        $udata['xRayUse'] = $this->input->post('xRayUse');
        $udata['laserUse'] = $this->input->post('laserUse');
        $udata['doctorName'] = $this->authentication->read('identifier');

        $this->model_hms->update_pre_op_order_db($udata, $id);
    }

    public function update_pre_op_checklist() {
        $id = $this->input->post('preOpCL');
        $udata['regNo'] = $this->input->post('regNo');
        $udata['otBookingNo'] = $this->input->post('otBookingNo');
        $udata['filled_by_dr'] = $this->input->post('cldrname');
        $udata['checkList_date'] = $this->input->post('clDate');
        $udata['diagnosis'] = $this->input->post('cldiagnosis');
        $udata['operation_planned'] = $this->input->post('operationPlanned');
        $udata['informed_consent'] = $this->input->post('informedConsent');
        $udata['surgeon'] = $this->input->post('clSurgeon');
        $udata['checklist_bp'] = $this->input->post('clbp');
        $udata['checklist_pulse'] = $this->input->post('clpulse');
        $udata['chehcklist_temp'] = $this->input->post('cltemp');
        $udata['checklist_rep_rate'] = $this->input->post('clresprate');
        $udata['checklist_npo'] = $this->input->post('clnpoFormTime');
        $udata['givebath'] = $this->input->post('clgiveBath');
        $udata['hospital_dress'] = $this->input->post('clHospitalDress');
        $udata['shave'] = $this->input->post('clShave');
        $udata['checklist_hb'] = $this->input->post('clhb');
        $udata['checklist_esr'] = $this->input->post('clesr');
        $udata['checklist_sNa'] = $this->input->post('clsna');
        $udata['check_sK'] = $this->input->post('clsk');
        $udata['checklist_sCa'] = $this->input->post('clsca');
        $udata['checklist_pt'] = $this->input->post('clpt');
        $udata['checklist_aptt'] = $this->input->post('claptt');
        $udata['checklist_tlc'] = $this->input->post('cltlc');
        $udata['checklist_rbs'] = $this->input->post('clrbs');
        $udata['checklist_HBsAg'] = $this->input->post('clhbsab');
        $udata['anti_HCV'] = $this->input->post('clantihcv');
        $udata['diabatic_status'] = $this->input->post('cldiabeticstatus');
        $udata['hypertenstion_status'] = $this->input->post('clhypertensionstatus');
        $udata['checklist_ECG'] = $this->input->post('clecg');
        $udata['checklist_anyother'] = $this->input->post('clanyothercondition');
        $udata['biopsy'] = $this->input->post('clbiopsy');
        $udata['lopogram'] = $this->input->post('cllopogram');
        $udata['chalangiogram'] = $this->input->post('clchalangiogram');
        $udata['checklist_ct_mri'] = $this->input->post('clctmri');
        $udata['checklist_fnac'] = $this->input->post('clfnac');
        $udata['chekclist_us'] = $this->input->post('clus');
        $udata['checklist_cxr'] = $this->input->post('clcxr');
        $udata['si_ivu'] = $this->input->post('clivu');
        $udata['si_anyother'] = $this->input->post('clanyother');
        $udata['checklist_radio1'] = $this->input->post('clradio1');
        $udata['checklist_radio2'] = $this->input->post('clradio2');
        $udata['checklist_radio3'] = $this->input->post('clradio3');
        $udata['checklist_radio4'] = $this->input->post('clradio4');
        $udata['checklist_radio5'] = $this->input->post('clradio5');
        $udata['checklist_radio6'] = $this->input->post('clradio6');
        $udata['checklist_radio7'] = $this->input->post('clradio7');
        $udata['checklist_radio8'] = $this->input->post('clradio8');
        $this->model_hms->update_pre_op_checklist_db($udata, $id);
    }

    public function update_surgical_checklist() {
        $id = $this->input->post('surgicalSCNo');
        $udata['dateString'] = $this->input->post('dateTimeNow');
        $udata['checkbox1'] = $this->input->post('checkbox1');
        $udata['checkbox2'] = $this->input->post('checkbox2');
        $udata['checkbox3'] = $this->input->post('checkbox3');
        $udata['radio4'] = $this->input->post('radio4');
        $udata['radio5'] = $this->input->post('radio5');
        $udata['radio6'] = $this->input->post('radio6');
        $udata['checkbox7'] = $this->input->post('checkbox7');
        $udata['checkbox8'] = $this->input->post('checkbox8');
        $udata['checkbox9'] = $this->input->post('checkbox9');
        $udata['checkbox10'] = $this->input->post('checkbox10');
        $udata['checkbox11'] = $this->input->post('checkbox11');
        $udata['checkbox12'] = $this->input->post('checkbox12');
        $udata['checkbox13'] = $this->input->post('checkbox13');
        $udata['checkbox14'] = $this->input->post('checkbox14');
        $udata['checkbox15'] = $this->input->post('checkbox15');
        $udata['checkbox16'] = $this->input->post('checkbox16');
        $udata['checkbox17'] = $this->input->post('checkbox17');
        $udata['checkbox18'] = $this->input->post('checkbox18');
        $udata['checkbox19'] = $this->input->post('checkbox19');
        $udata['checkbox20'] = $this->input->post('checkbox20');
        $udata['checkbox21'] = $this->input->post('checkbox21');
        $udata['checkbox22'] = $this->input->post('checkbox22');
        $udata['checkbox23'] = $this->input->post('checkbox23');
        $udata['checkbox24'] = $this->input->post('checkbox24');
        $udata['checkbox25'] = $this->input->post('checkbox25');

        $this->model_hms->update_surgical_checklist_db($udata, $id);
    }

    public function update_post_operative_instructions() {
        $id = $this->input->post('postOpINo');
        $udata['dateString'] = $this->input->post('dateTimeNow');
        $udata['forRecoveryArea'] = $this->input->post('forRecoveryArea');
        $udata['fluids'] = $this->input->post('fluids');
        $udata['antibiotics'] = $this->input->post('antibiotics');
        $udata['analgesics'] = $this->input->post('analgesics');
        $udata['specialInstructions'] = $this->input->post('specialInstructions');
        $udata['instructionsForPathological'] = $this->input->post('instructionsForPathological');
        $udata['doctorName'] = $this->authentication->read('identifier');

        $this->model_hms->update_post_operative_instructions_db($udata, $id);
    }

    public function update_post_operative_instructions_nurse() {
        $id = $this->input->post('postOpINo');
        $udata['dateString'] = $this->input->post('dateTimeNow');
        $udata['bloodLoss'] = $this->input->post('bloodLoss');
        $udata['bloodTransfusion'] = $this->input->post('bloodTransfusion');
        $udata['ivFluids'] = $this->input->post('ivFluids');
        $udata['urineOutput'] = $this->input->post('urineOutput');
        $udata['sawbOrInstruments'] = $this->input->post('sawbOrInstruments');
        $udata['nurseName'] = $this->authentication->read('identifier');

        $this->model_hms->update_post_operative_instructions_nurse_db($udata, $id);
    }

    public function update_protocol_receiving_patient_ot() {
        $id = $this->input->post('recPatOtNo');
        $udata['dateString'] = $this->input->post('dateTimeNow');
        $udata['houseOfficerId'] = $this->input->post('houseOfficerId');
        $udata['nurseId'] = $this->input->post('nurseId');
        $udata['documentsReceived'] = $this->input->post('documentsReceived');
        $udata['patientCategory'] = $this->input->post('patientCategory');
        $udata['patientAlertness'] = $this->input->post('patientAlertness');
        $udata['pulseDoctor'] = $this->input->post('pulseDoctor');
        $udata['bpDoctor'] = $this->input->post('bpDoctor');
        $udata['tempDoctor'] = $this->input->post('tempDoctor');
        $udata['rrDoctor'] = $this->input->post('rrDoctor');
        $udata['gcsDoctor'] = $this->input->post('gcsDoctor');
        $udata['cvpDoctor'] = $this->input->post('cvpDoctor');
        $udata['pulseNurse'] = $this->input->post('pulseNurse');
        $udata['bpNurse'] = $this->input->post('bpNurse');
        $udata['tempNurse'] = $this->input->post('tempNurse');
        $udata['rrNurse'] = $this->input->post('rrNurse');
        $udata['gcsNurse'] = $this->input->post('gcsNurse');
        $udata['cvpNurse'] = $this->input->post('cvpNurse');
        $udata['statusOfDrains'] = $this->input->post('statusOfDrains');
        $udata['biopsySpecimen'] = $this->input->post('biopsySpecimen');
        $udata['biopsySpecimenReason'] = $this->input->post('biopsySpecimenReason');
        $udata['dressing'] = $this->input->post('dressing');
        $udata['bloodTransfusion'] = $this->input->post('bloodTransfusion');
        $udata['operationNotesOrdersChecked'] = $this->input->post('operationNotesOrdersChecked');

        $this->model_hms->update_protocol_receiving_patient_ot_db($udata, $id);
    }

    public function update_consent_op() {
        $id = $this->input->post('consentOpNo');
        $udata['dateString'] = $this->input->post('dateTimeNow');

        $this->model_hms->update_consent_op_db($udata, $id);
    }

    public function operation_theatre_form_view() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, CAN_VIEW_OT_LIST);
        if ($access_checker == 1) {
            $otBookingNo = $this->input->get("search_by_ot");
            $result = $this->model_hms->check_record_is_exist($otBookingNo);
            if (!empty($result)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_pre_op_fitness($udata);
            }
            $data['pre_op_fitness'] = $this->model_hms->get_pre_op_fitness_by_otno($otBookingNo);

            $result1 = $this->model_hms->check_pre_op_order_record_is_exist($otBookingNo);
            if (!empty($result1)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_pre_op_order($udata);
            }
            $data['pre_op_order'] = $this->model_hms->get_pre_op_order_by_otno($otBookingNo);

            $result2 = $this->model_hms->check_surgical_checklist_record_is_exist($otBookingNo);
            if (!empty($result2)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_surgical_checklist($udata);
            }
            $data['surgical_checklist'] = $this->model_hms->get_surgical_checklist_by_otno($otBookingNo);

            $result3 = $this->model_hms->check_post_operative_instructions_record_is_exist($otBookingNo);
            if (!empty($result3)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_post_operative_instructions($udata);
            }
            $data['post_operative_instructions'] = $this->model_hms->get_post_operative_instructions_by_otno($otBookingNo);

            $user_id = $this->authentication->read('identifier');
            $result_user = $this->model_hms->user_verify_is_nurse($user_id);
            if (!empty($result_user)) {
                $data['user_value'] = "1";
            } else {
                $data['user_value'] = "0";
            }

            $result4 = $this->model_hms->check_protocol_receiving_patient_ot_record_is_exist($otBookingNo);
            if (!empty($result4)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_protocol_receiving_patient_ot($udata);
            }
            $data['protocol_receiving_patient_ot'] = $this->model_hms->get_protocol_receiving_patient_ot_by_otno($otBookingNo);

            $result5 = $this->model_hms->check_consent_op_record_is_exist($otBookingNo);
            if (!empty($result5)) {
                
            } else {
                $rowRegNo = $this->model_hms->get_regno_otbookingno($otBookingNo);
                $udata['regNo'] = $rowRegNo->regNo;
                $udata['otBookingNo'] = $otBookingNo;
                $this->model_hms->insert_consent_op($udata);
            }
            $data['consent_op'] = $this->model_hms->get_consent_op_by_otno($otBookingNo);
            $data['nurse_list'] = $this->model_hms->get_nurse_list_for_ot_form();

            $this->load->view('operation_theatre_form_view', $data);
        } else {
            $this->insufficient_privileges();
        }
    }

//=======================================================//
//     Controller Code for OT Form Module ends here      //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
//=======================================================//
//    Controller Code for Pharmacy Module starts here    //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    //============Products============//
    public function view_products() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_INVENTORY);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_product_id"))) {
                $data['products_list'] = $this->model_hms->search_product_by_id($this->input->get("search_by_product_id"));
                $this->load->view('view_products', $data);
            } elseif (!empty($this->input->get("search_by_product_categ"))) {
                $data['products_list'] = $this->model_hms->search_product_by_categ($this->input->get("search_by_product_categ"));
                $this->load->view('view_products', $data);
            } else {
                $this->load->view('view_products');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function add_product() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_INVENTORY);
        if ($access_checker == 1) {
            if (!empty($this->input->get('success')) && $this->input->get('success') == "true") {
                $data['success'] = "true";
                $data['product_categ_list'] = $this->model_hms->get_products_category();
                $this->load->view('add_product', $data);
            } else {
                $data['product_categ_list'] = $this->model_hms->get_products_category();
                $this->load->view('add_product', $data);
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function insert_product_db() {
        $udata['productCode'] = $this->input->post('product-code');
        $udata['productName'] = $this->input->post('product-name');
        $udata['productFormulation'] = $this->input->post('product-formulation');
        if (!empty($this->input->post('product-mg'))) {
            $udata['productMg'] = $this->input->post('product-mg');
        } else {
            $udata['productMg'] = " ";
        }
        $udata['productPurchasePrice'] = $this->input->post('product-purchase-price');
        $udata['productSalePrice'] = $this->input->post('product-sales-price');
        $udata['productCategory'] = $this->input->post('product-category');
        $udata['productUnit'] = $this->input->post('product-unit');
        $udata['productQty'] = $this->input->post('product-qty');
        $udata['productLocation'] = $this->input->post('product-location');
        $udata['productBarcode'] = $this->input->post('product-barcode');
        $udata['productManufacture'] = $this->input->post('product-manufacture');
        $udata['productSupplier'] = $this->input->post('product-supplier');
        $udata['productReorderLevel'] = $this->input->post('product-reorder-level');
        $dateFormat = strtotime($this->input->post('product-expire-date'));
        $converter = date('Y-m-d', $dateFormat);
        $udata['productExpireDate'] = $converter;

        $res = $this->model_hms->insert_product_db($udata);
        if ($res) {
            header('location:' . base_url('dashboard/add_product/?success=true'));
        }
    }

    public function search_product() {
        if (!empty($this->input->get("search_by_product_code"))) {
            $this->model_hms->ajax_search_by_product_code($this->input->get("search_by_product_code"));
        } elseif (!empty($this->input->get("search_by_product_name"))) {
            $this->model_hms->ajax_search_by_product_name($this->input->get("search_by_product_name"));
        } else {
            $this->model_hms->ajax_search_by_product_categ();
        }
    }

    public function edit_product() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_INVENTORY);
        if ($access_checker == 1) {
            if (!empty($this->input->get("product_no"))) {
                $data['product_categ_list'] = $this->model_hms->get_products_category();
                $data['products_list'] = $this->model_hms->get_product_by_id($this->input->get("product_no"));
                $this->load->view('edit_product', $data);
            } else {
                header('location:' . base_url('dashboard/view_products/'));
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function update_product() {
        $id = $this->input->post('productNo');
        $udata['productCode'] = $this->input->post('productCode');
        $udata['productName'] = $this->input->post('productName');
        $udata['productFormulation'] = $this->input->post('productFormulation');
        if (!empty($this->input->post('product-mg'))) {
            $udata['productMg'] = $this->input->post('product-mg');
        } else {
            $udata['productMg'] = " ";
        }
        $udata['productPurchasePrice'] = $this->input->post('productPurchasePrice');
        $udata['productSalePrice'] = $this->input->post('productSalePrice');
        $udata['productCategory'] = $this->input->post('productCategory');
        $udata['productUnit'] = $this->input->post('productUnit');
        $udata['productQty'] = $this->input->post('productQty');
        $udata['productLocation'] = $this->input->post('productLocation');
        $udata['productBarcode'] = $this->input->post('productBarcode');
        $udata['productManufacture'] = $this->input->post('productManufacture');
        $udata['productSupplier'] = $this->input->post('productSupplier');
        $udata['productReorderLevel'] = $this->input->post('productReorderLevel');
        $dateFormat = strtotime($this->input->post('productExpireDate'));
        $converter = date('Y-m-d', $dateFormat);
        $udata['productExpireDate'] = $converter;
        $udata['productStatus'] = $this->input->post('productStatus');

        $this->model_hms->update_product_db($udata, $id);
    }

    //============Prescription============//
    public function search_ot_patient_by_name() {
        if (!empty($this->input->get("search_ot_by_name"))) {
            $this->model_hms->ajax_search_ot_by_patient_name($this->input->get("search_ot_by_name"));
        }
    }

    public function add_prescription() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_INVENTORY);
        if ($access_checker == 1) {
            if (!empty($this->input->get('search_ot_by_name'))) {
                $data['patient_list'] = $this->model_hms->get_patient_by_id($this->input->get('search_ot_by_name'));
                $this->load->view('add_prescription', $data);
            } else {
                $this->load->view('add_prescription');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function get_product_by_no() {
        if (!empty($this->input->post("productNo"))) {
            $result = $this->model_hms->ajax_get_product_by_no($this->input->post("productNo"));
            $filtered = str_replace(array('[', ']'), '', $result);

            echo $filtered;
        }
    }

    public function search_product_by_name() {
        if (!empty($this->input->get("search_by_product_name"))) {
            $this->model_hms->ajax_search_product_by_name($this->input->get("search_by_product_name"));
        }
    }

    public function delete_product_db() {
        if (!empty($this->input->post("productNo"))) {
            $this->model_hms->delete_product_by_id($this->input->post("productNo"));
        }
    }

    public function insert_prescription() {
        $udata['regNo'] = $this->input->post('regNo');
        $udata['patName'] = $this->input->post('patName');
        $udata['patNoKType'] = $this->input->post('patNoKType');
        $udata['patNoK'] = $this->input->post('patNoK');
        date_default_timezone_set("Asia/Karachi");
        $udata['rxDate'] = date('Y-m-d');
        $udata['rxTime'] = date('h:i A');
        $udata['subTotal'] = $this->input->post('subTotal');
        $udata['discount'] = $this->input->post('discount');
        $udata['total'] = $this->input->post('total');

        $productList = json_decode(stripslashes($this->input->post('productList')));

        $res = $this->model_hms->insert_prescription_db($udata);
        echo $res;
        $rxNo = $this->model_hms->get_prescription_last_no();

        $result = $this->model_hms->check_patient_account($this->input->post('regNo'));
        if ($result->counter == 0) {
            $accdata['patientRegNo'] = $this->input->post('regNo');
            $accdata['totalDepositedAmount'] = 0;
            $accdata['runningBill'] = 0;
            $accdata['remainingAmount'] = 0;
            $accdata['discount'] = 0;
            $accdata['refundableAmount'] = 0;
            $accdata['freeStatus'] = "";
            $accdata['isInvoiceGenerated'] = 0;
            $accdata['invoiceGeneratedDate'] = "";
            $accdata['invoiceGeneratedDate1'] = "";
            $this->model_hms->create_patient_account($accdata);
        }
        $patientAccount = $this->model_hms->get_patient_account_no_by_regno($this->input->post('regNo'));

        $edata['patientAccountNo'] = $patientAccount->patientAccountNo;
        $edata['expenseDescription'] = "OT Pharmacy Dues";
        $edata['expenseAmount'] = $this->input->post('total');
        $edata['expenseDate'] = date('d-m-Y');
        $edata['expenseTime'] = date('h:i A');
        $edata['expenseDate1'] = date('Y-m-d');
        $edata['expenseTime1'] = date('H:i:s');
        $edata['expense_tblName'] = "prescriptiontbl";
        $edata['expense_tblNameId'] = $rxNo->rxNo;

        $this->model_hms->insert_expense_db($edata);

        $arrayLength = sizeof($productList);
        $rows = $arrayLength / 8;
        $counterSuccess = 0;
        for ($i = 0; $i < $rows; $i++) {
            unset($pdata);
            $j = $i * 8;
            $e = ($i + 1) * 8;
            $c = 0;
            $pdata['rxNo'] = $rxNo->rxNo;
            $qty = 0;
            $maxqty = 0;
            $id = 0;
            for ($j; $j < $e; $j++) {
                $c++;
                if ($c == 1) {
                    $pdata['productNo'] = $productList[$j];
                    $id = $productList[$j];
                } elseif ($c == 2) {
                    $maxqty = $productList[$j];
                } elseif ($c == 3) {
                    $pdata['productCode'] = $productList[$j];
                } elseif ($c == 4) {
                    $pdata['productName'] = $productList[$j];
                } elseif ($c == 5) {
                    $pdata['productMg'] = $productList[$j];
                } elseif ($c == 6) {
                    $pdata['productSaleQty'] = $productList[$j];
                    $qty = $productList[$j];
                } elseif ($c == 7) {
                    $pdata['productSalePrice'] = $productList[$j];
                } elseif ($c == 8) {
                    $pdata['productTotalAmount'] = $productList[$j];
                }
            }
            $updateQty = $maxqty - $qty;
            $resultDes = $this->model_hms->insert_prescription_des_db($pdata);
            if ($resultDes) {
                $counterSuccess++;
                $this->model_hms->update_product_qty_db($id, $updateQty, $qty);
            }
        }
        echo $counterSuccess;
    }

    public function view_prescription() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_INVENTORY);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_rx_by_no"))) {
                $rx = $this->model_hms->search_rx_by_id($this->input->get("search_rx_by_no"));
                $data['prescription'] = $this->model_hms->search_rxs_by_id($this->input->get("search_rx_by_no"));

                $data['patient_list'] = $this->model_hms->get_patient_by_id_for_rx($rx->regNo);

                $this->load->view('view_prescription', $data);
            } elseif (!empty($this->input->get("search_rx_by_regno"))) {

                $data['prescription'] = $this->model_hms->search_rxs_by_regno($this->input->get("search_rx_by_regno"));

                $data['patient_list'] = $this->model_hms->get_patient_by_id_for_rx($this->input->get("search_rx_by_regno"));

                $this->load->view('view_prescription', $data);
            } else {
                $this->load->view('view_prescription');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function search_prescription_by_no() {
        if (!empty($this->input->get("search_rx_by_no"))) {
            $this->model_hms->ajax_search_rx_by_no($this->input->get("search_rx_by_no"));
        }
    }

    public function search_rx_patient_by_name() {
        if (!empty($this->input->get("search_rx_by_name"))) {
            $this->model_hms->ajax_search_rx_by_patient_name($this->input->get("search_rx_by_name"));
        }
    }

    public function return_prescription() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_INVENTORY);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_rx_by_no"))) {
                $rx = $this->model_hms->search_rx_by_id($this->input->get("search_rx_by_no"));
                $data['prescription'] = $this->model_hms->search_rxs_by_id($this->input->get("search_rx_by_no"));

                $data['patient_list'] = $this->model_hms->get_patient_by_id_for_rx($rx->regNo);

                $this->load->view('return_prescription', $data);
            } elseif (!empty($this->input->get("search_rx_by_regno"))) {

                $data['prescription_list'] = $this->model_hms->search_rxs_by_regno($this->input->get("search_rx_by_regno"));

                $data['patient_list'] = $this->model_hms->get_patient_by_id_for_rx($this->input->get("search_rx_by_regno"));

                $this->load->view('return_prescription', $data);
            } else {
                $this->load->view('return_prescription');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function update_prescription() {
        $rxNo = $this->input->post('rxNo');
        $udata['subTotal'] = $this->input->post('subTotal');
        $udata['discount'] = $this->input->post('discount');
        $udata['total'] = $this->input->post('total');
        $udata['returnedAmount'] = $this->input->post('returnedAmount');

        $this->model_hms->update_prescription_db($udata, $rxNo);

        $expenseAmount = $this->input->post('total');

        $this->model_hms->update_expense_db($expenseAmount, $rxNo);

        $productList = json_decode(stripslashes($this->input->post('productList')));

        $arrayLength = sizeof($productList);
        $rows = $arrayLength / 5;
        $counterSuccess = 0;
        for ($i = 0; $i < $rows; $i++) {
            unset($pdata);
            $j = $i * 5;
            $e = ($i + 1) * 5;
            $c = 0;
            $returnQty = 0;
            for ($j; $j < $e; $j++) {
                $c++;
                if ($c == 1) {
                    $pdata['rxDesNo'] = $productList[$j];
                } elseif ($c == 2) {
                    $productNo = $productList[$j];
                } elseif ($c == 3) {
                    $pdata['productSaleQty'] = $productList[$j];
                } elseif ($c == 4) {
                    $pdata['productReturnQty'] = $productList[$j];
                    $returnQty = $productList[$j];
                } elseif ($c == 5) {
                    $pdata['productTotalAmount'] = $productList[$j];
                }
            }
            $this->model_hms->update_prescription_des_db($pdata);

            $counterSuccess++;
            $product = $this->model_hms->get_product_qty_db($productNo);
            $avaliableQty = $product->productQty + $returnQty;
            $soldQty = $product->productSoldQty - $returnQty;
            $this->model_hms->update_return_product_qty_db($productNo, $avaliableQty, $soldQty);
        }
    }

    public function products_stock_alert() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_INVENTORY);
        if ($access_checker == 1) {
            $data['products_list'] = $this->model_hms->get_products_stock_alert();
            $this->load->view('products_stock_alert', $data);
        } else {
            $this->insufficient_privileges();
        }
    }

    public function order_product_db() {
        if (!empty($this->input->post("productNo"))) {
            $this->model_hms->order_product_by_id($this->input->post("productNo"));
        }
    }

    public function dismiss_product_db() {
        if (!empty($this->input->post("productNo"))) {
            $this->model_hms->dismiss_product_by_id($this->input->post("productNo"));
        }
    }

    public function purchase_product_db() {
        if (!empty($this->input->post("productNo"))) {
            $this->model_hms->purchase_product_by_id($this->input->post("productNo"), $this->input->post("productQty"));
        }
    }

    public function print_patient_rx() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_INVENTORY);
        if ($access_checker == 1) {
            if (!empty($this->input->get("rxno"))) {

                $data['prescription'] = $this->model_hms->get_rx_by_no($this->input->get("rxno"));
                $data['prescription_des'] = $this->model_hms->get_rx_des_by_no($this->input->get("rxno"));
                $rxData = $this->model_hms->get_rx_by_no($this->input->get("rxno"));
                $data['patient_list'] = $this->model_hms->get_patient_by_regno($rxData->regNo);
                $this->load->view('print_patient_rx', $data);
            } else {
                header("location:" . base_url('dashboard/view_prescription'));
            }
        } else {
            $this->insufficient_privileges();
        }
    }

//=======================================================//
//    Controller Code for Pharmacy Module ends here      //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
//==========================================================//
//    Controller Code starts here                           //
//                  By Sohaib Rashid                      //
//                                                       //
//=======================================================//

    public function save_vital_report() { {
            $vitalregno = $this->input->post("regno");
            $vitalsdatetime = $this->input->post("vitaldate") . " " . $this->input->post("vitaltime");
            $vitalId = $this->input->post("vitalId");
            $vitalsbp = $this->input->post("vitalbp1") . " - " . $this->input->post("vitalbp2");
            $vitalspulse = $this->input->post("vitalpulse");
            $vitalsheight = $this->input->post("vitalheight");
            $vitalsweight = $this->input->post("vitalweight");
            $vitalsbmi = $this->input->post("vitalbmi");
            $vitalstemp = $this->input->post("vitaltemp");
            $vitalsresp = $this->input->post("vitalresp");
            $vitals = array(
                'regNo' => $vitalregno,
                'vital_timestamp' => $vitalsdatetime,
                'vital_bp' => $vitalsbp,
                'vital_pulse' => $vitalspulse,
                'vital_temp' => $vitalstemp,
                'vital_resp_rate' => $vitalsresp,
                'vital_height' => $vitalsheight,
                'vital_weight' => $vitalsweight,
                'vital_bmi' => $vitalsbmi
            );
            $query = $this->model_hms->save_vital($vitals);
            if ($query) {
                echo $query;
            }
        }
    }

    public function vital_update() {
        $vitalsdatetime = $this->input->post("vitaldate") . " " . $this->input->post("vitaltime");
        $vitalId = $this->input->post("vitalId");
        $vitalsbp = $this->input->post("vitalbp1") . " - " . $this->input->post("vitalbp2");
        $vitalspulse = $this->input->post("vitalpulse");
        $vitalsheight = $this->input->post("vitalheight");
        $vitalsweight = $this->input->post("vitalweight");
        $vitalsbmi = $this->input->post("vitalbmi");
        $vitalstemp = $this->input->post("vitaltemp");
        $vitalsresp = $this->input->post("vitalresp");
        $vitals = array(
            'vital_timestamp' => $vitalsdatetime,
            'vital_bp' => $vitalsbp,
            'vital_pulse' => $vitalspulse,
            'vital_temp' => $vitalstemp,
            'vital_resp_rate' => $vitalsresp,
            'vital_height' => $vitalsheight,
            'vital_weight' => $vitalsweight,
            'vital_bmi' => $vitalsbmi
        );
        $query = $this->model_hms->update_vital($vitals, $vitalId);
        if ($query) {
            echo $query;
        }
    }

    public function insert_diseases() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_STATISTICS);
        if ($access_checker == 1) {
            $this->load->view('add_diseases');
        } else {
            $this->insufficient_privileges();
        }
    }

    public function disease_insert() {
        $data = $this->input->post('in_disease');
        $result = $this->model_hms->diseas_insertion($data);
        if ($result) {
            $base_url = load_class('Config')->config['base_url'];
            header('location:' . $base_url . "index.php/dashboard/insert_diseases?success=true");
        } else {
            $base_url = load_class('Config')->config['base_url'];
            header('location:' . $base_url . "index.php/dashboard/insert_diseases?success=false");
        }
    }

    public function view_discharge_history() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, DISCHARGE_PATIENTS);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_discharged_by_cnic"))) {
                $data['patient_list'] = $this->model_hms->search_result_discharged_by_cnic($this->input->get("search_discharged_by_cnic"));
                $data['discharge_status'] = 1;
                $this->load->view('discharge_history', $data);
            } elseif (!empty($this->input->get("search_discharged_by_to_date")) && !empty($this->input->get("search_discharged_by_from_date"))) {
                $todate = $this->input->get("search_discharged_by_to_date");
                $fromdate = $this->input->get("search_discharged_by_from_date");
                $todate = date('Y-m-d', strtotime($todate));
                $fromdate = date('Y-m-d', strtotime($fromdate));
                $data['discharge_status'] = 1;
                $data['patient_list'] = $this->model_hms->search_result_discharged_by_date($fromdate, $todate);
                $this->load->view('discharge_history', $data);
            } else {
                $this->load->view('discharge_history');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function vital_print() {
        $this->load->library('ciqrcode');
        $params['data'] = $this->input->get("regno");
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = FCPATH . 'qr.png';
        $this->ciqrcode->generate($params);
        $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
        $regno = $this->input->get('regno');
        $data['vitals'] = $this->model_hms->get_all_vitals($regno);
        $this->load->view('print_vital', $data);
    }

    public function print_post_oprative() {
        $this->load->library('ciqrcode');
        $params['data'] = $regno = $this->input->get("regno");
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = FCPATH . 'qr.png';
        $this->ciqrcode->generate($params);
        $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
        $data['pat_list'] = $this->model_hms->get_post_op_dat($regno);
        $data['postop'] = $this->model_hms->search_result_by_cnic($regno);
//            print_r($data);die();
        $this->load->view('print_post_op', $data);
    }

    public function print_pre_oprative() {
        $this->load->library('ciqrcode');
        $params['data'] = $regno = $this->input->get("regno");
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = FCPATH . 'qr.png';
        $this->ciqrcode->generate($params);
        $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
        $data['pre_op_fitness'] = $this->model_hms->get_pre_op_fitness_for_print($regno);
//            print_r($data);die();
        $this->load->view('print_pre_op', $data);
    }

    public function print_preop_order() {
        $this->load->library('ciqrcode');
        $params['data'] = $regno = $this->input->get("regno");
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = FCPATH . 'qr.png';
        $this->ciqrcode->generate($params);
        $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
        $data['pat_list'] = $this->model_hms->search_result_by_cnic($regno);
        $data['pre_op_order'] = $this->model_hms->get_pre_op_order_for_print($regno);
//            print_r($data);die();
        $this->load->view('print_pre_order', $data);
    }

    public function print_postop_instruction() {
        $this->load->library('ciqrcode');
        $params['data'] = $regno = $this->input->get("regno");
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = FCPATH . 'qr.png';
        $this->ciqrcode->generate($params);
        $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
//            $data['pat_list'] = $this->model_hms->search_result_by_cnic($regno);
//            print_r($data);die();
        $data['post_operative_instructions'] = $this->model_hms->get_post_operative_instructions_for_print($regno);
        $this->load->view('print_post_op_instruction', $data);
    }

    public function print_ot_consent_form() {
        $this->load->library('ciqrcode');
        $params['data'] = $regno = $this->input->get("regno");
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = FCPATH . 'qr.png';
        $this->ciqrcode->generate($params);
        $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
        $data['pat_list'] = $this->model_hms->search_result_by_cnic($regno);
//            print_r($data);die();
        $this->load->view('print_ot_consent', $data);
    }

    public function print_ot_checklist_form() {
        $this->load->library('ciqrcode');
        $params['data'] = $regno = $this->input->get("regno");
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = FCPATH . 'qr.png';
        $this->ciqrcode->generate($params);
        $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
        $data['pat_list'] = $this->model_hms->search_result_by_cnic($regno);
        $data['pre_op_checklist'] = $this->model_hms->get_pre_op_checklist_for_print($regno);
//            print_r($data);die();
        $this->load->view('print_preop_checklist', $data);
    }

    public function daily_reports() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_RADIOLOGY_SECTION);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $data['patient_list'] = $this->model_hms->search_result_by_cnic_chart($this->input->get("search_by_cnic"));
//                $data['report_list'] = $this->model_hms->report_view($this->input->get("search_by_cnic"));
                if (!empty($this->input->post("btn-daily-report-submit"))) {
                    $report['regNo'] = $this->input->get("search_by_cnic");
                    $report['drp_date'] = $this->input->post("drp-date");
                    $report['drp_time'] = $this->input->post('drp_time');
                    $report['drp_doa'] = $this->input->post('drp_doa');
                    $report['drp_co'] = $this->input->post('drp_co');
                    $report['drp_ac'] = $this->input->post('drp_ac');
                    $report['drp_pulse'] = $this->input->post('drp_pulse');
                    $report['drp_bp'] = $this->input->post('drp_bp');
                    $report['drp_rr'] = $this->input->post('drp_rr');
                    $report['drp_temp'] = $this->input->post('drp_temp');
                    $report['drp_wound'] = $this->input->post('drp_wound');
                    $report['drp_resp'] = $this->input->post('drp_resp');

                    $report['drp_dressing'] = $this->input->post('drp_dressing');
                    $report['drp_git'] = $this->input->post('drp_git');
                    $report['drp_cvs'] = $this->input->post('drp_cvs');
                    $report['drp_cns'] = $this->input->post('drp_cns');

                    $report['drp_intake'] = $this->input->post('drp_intake');
                    $report['drp_output'] = $this->input->post('drp_output');
                    $report['drp_pt_seen'] = $this->input->post('drp_seenby_officer');
                    $report['drp_pgr'] = $this->input->post('drp_pgr');
                    $report['drp_plan'] = $this->input->post('drp_plan');
                    $report['drp_consultant'] = $this->input->post('drp_consultant');
                    $query = $this->model_hms->daily_report_insert($report);
                    if ($query) {
                        redirect(base_url('dashboard/daily_reports/?search_by_cnic=' . $report['regNo']));
                    }
                }
                $this->load->view('daily_report_page', $data);
            }
            if (empty($this->input->get()) || !empty($this->input->get('success') == "true")) {
                $this->load->view('daily_report_page');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function blood_sugar() {
        $priv = $this->authentication->read('priv');
        $access_checker = $this->model_hms->access_checker($priv, VIEW_RADIOLOGY_SECTION);
        if ($access_checker == 1) {
            if (!empty($this->input->get("search_by_cnic"))) {
                $data['patient_list'] = $this->model_hms->search_result_by_cnic_chart($this->input->get("search_by_cnic"));
                $data['sugar_list'] = $this->model_hms->blood_sugar_view($this->input->get("search_by_cnic"));
                $this->load->view('blood_sugar_profile', $data);
            }else{
                $this->load->view('blood_sugar_profile');
            }
        } else {
            $this->insufficient_privileges();
        }
    }

    public function save_bloodsugar_report() {
        $bregno = $this->input->post("regno");
        $bsdate = date("Y-m-d", strtotime($this->input->post("bsdate")));
        $bsbsf = $this->input->post("bsbsf");
        $bshrbsf = $this->input->post("bshrbsf");
        $bsprelunch = $this->input->post("bsprelunch");
        $bspostlunch = $this->input->post("bspostlunch");
        $bspredinner = $this->input->post("bspredinner");
        $bspostdinner = $this->input->post("bspostdinner");
        $bsreport = array(
            'regNo' => $bregno,
            'bs_date' => $bsdate,
            'bs_bsf' => $bsbsf,
            'bs_hrbsf' => $bshrbsf,
            'bs_pre_lunch' => $bsprelunch,
            'bs_post_lunch' => $bspostlunch,
            'bs_pre_dinner' => $bspredinner,
            'bs_post_dinner' => $bspostdinner
        );
        $query = $this->model_hms->save_blood_sugar_report($bsreport);
        if ($query) {
            echo $query;
        }
    }

    public function update_sugar_report() {
        $bsid = $this->input->post("bsid");
        $bsregno = $this->input->post("regNo");
        $bsdate =  date("Y-m-d", strtotime($this->input->post("bsdate")));
        $bsbsf = $this->input->post("bsbsf");
        $bshrbsf = $this->input->post("bshrbsf");
        $bsprelunch = $this->input->post("bsprelunch");
        $bspostlunch = $this->input->post("bspostlunch");
        $bspredinner = $this->input->post("bspredinner");
        $bspostdinner = $this->input->post("bspostdinner");
        $bsreport = array(
            'bs_date' => $bsdate,
            'bs_bsf' => $bsbsf,
            'bs_hrbsf' => $bshrbsf,
            'bs_pre_lunch' => $bsprelunch,
            'bs_post_lunch' => $bspostlunch,
            'bs_pre_dinner' => $bspredinner,
            'bs_post_dinner' => $bspostdinner
        );
        $query = $this->model_hms->update_blood_sugar($bsreport, $bsid);
        if ($query) {
            echo $query;
        }
    }
    
    public function sugar_report_print() {
        $this->load->library('ciqrcode');
        $params['data'] = $this->input->get("regno");
        $params['level'] = 'H';
        $params['size'] = 3;
        $params['savename'] = FCPATH . 'qr.png';
        $this->ciqrcode->generate($params);
        $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
        $regno = $this->input->get('regno');
        $data['sugar_list'] = $this->model_hms->blood_sugar_view($regno);
        $this->load->view('print_sugar_report', $data);
    }
    
    public function delete_blood_sugar_report() {
        $res = $this->model_hms->delete_blood_sugar_report($this->input->post('bsId'));
        if ($res) {
            echo $res;
        }
    }
    
    public function print_all_reports(){
        $this->load->library('ciqrcode');
        if (!empty($this->input->get("search_by_cnic"))) {
            $data['admit_patient_list'] = $this->model_hms->search_result_by_cnic_chart($this->input->get("search_by_cnic"));
            if (empty($data['admit_patient_list'])) {
                $params['data'] = $regno = $this->input->get("search_by_cnic");
                $params['level'] = 'H';
                $params['size'] = 2;
                $params['savename'] = FCPATH . 'qr.png';
                $this->ciqrcode->generate($params);
                $data['qr'] = '<img src="' . base_url() . 'qr.png" />';
                $data['patient_list'] = $this->model_hms->search_result_discharge_by_cnic_chart($this->input->get("search_by_cnic"));
                $data['patient_chart'] = $this->model_hms->search_patient_chart($this->input->get("search_by_cnic"));
                $data['ot_details'] = $this->model_hms->get_ot_details_of_discharged_patient($this->input->get("search_by_cnic"));
                $data['vitals'] = $this->model_hms->get_all_vitals($regno);
                $data['sugar_list'] = $this->model_hms->blood_sugar_view($regno);
                $data['postop'] = $this->model_hms->get_post_op_dat($regno);
                $data['pre_op_fitness'] = $this->model_hms->get_pre_op_fitness_for_print($regno);
                $data['pre_op_order'] = $this->model_hms->get_pre_op_order_for_print($regno);
                $data['pre_op_checklist'] = $this->model_hms->get_pre_op_checklist_for_print($regno);
                $data['post_operative_instructions'] = $this->model_hms->get_post_operative_instructions_for_print($regno);
                $this->load->view('print_all_reports', $data);
            } else {
                $this->load->view('print_all_reports');
            }
        }
       
    }

    public function get_beds($ward_id){
        $beds  = $this->model_hms->get_available_beds($ward_id);
        $options = '';
        $options.="<option value=''>Select a bed</option>";
        foreach ($beds as $bed){
            $id = $bed['id'];
            if ($bed['status'] == "Extra Bed") {
                $bed_number = "Extra Bed. ".$bed['name'];
            } else {
                $bed_number = "Bed No. ".$bed['name'];
            }
            $options.="<option value='$id'>$bed_number</option>";
        }
        echo  $options;
    }

}

/////////////////////////////////////////// Date generator class ////////////////////////////////////////

class DateRangeIterator implements Iterator {

    private $from;
    private $to;
    private $format;
    private $interval;
    private $current;
    private $key;

    function __construct($from, $to, $format = 'Y-m-d', $interval = '+1 days') {
        if (false === ($this->from = strtotime($from))) {
            throw new Exception("Could not parse $from");
        }
        if (false === ($this->to = strtotime($to))) {
            throw new Exception("Could not parse $to");
        }
        $this->format = $format;
        $this->interval = $interval;
    }

    function rewind() {
        $this->current = $this->from;
        $this->key = 0;
    }

    function valid() {
        return $this->current <= $this->to;
    }

    function next() {
        $this->current = strtotime($this->interval, $this->current);
        ++$this->key;
    }

    function key() {
        return $this->key;
    }

    function current() {
        return date($this->format, $this->current);
    }


}
