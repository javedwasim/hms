<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class model_hms extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->database('hmsdb');
    }

    public function get_all_users() {
        $query = $this->db->get('admissiontbl');
        return $query->result();
    }

    public function get_regNo() {
        $query = $this->db->select('regNo')->order_by('regNo', 'desc')->limit(1)->get('admissiontbl');
        return $query->result_array();
    }

    public function insert_users_to_db($data) {
        $admidate['datetime'] = $data['patAdmDate'] . " " . $data['AdmTime'];
        $data['patAdmDate'] = date('Y-m-d H:i:s a', strtotime($admidate['datetime']));
        $data['patChart_id'] = "22";
        $data['patStatus'] = "Under Treatment";
        unset($data['hour']);
        unset($data['minute']);
        unset($data['meridian']);
        unset($data['AdmTime']);
        unset($data['RegNumber']);
        unset($data['patientphoto']);
        return $this->db->insert('admissiontbl', $data);
    }

    public function diseas_insertion($disease) {
        $this->db->where('disease_name', $disease);
        $query = $this->db->get('diseasetbl');
        if ($query->num_rows() > 0) {
            return false;
        } else {
            $data = array(
                'disease_name' => $disease
            );
            return $this->db->insert('diseasetbl', $data);
        }
    }

    public function insert_discharge_to_db($data) {
        return $this->db->insert('dischargetbl', $data);
    }

    public function delete_from_adm($id) {
        $this->db->delete('admissiontbl', array('regNo' => $id));
        //echo $this->db->last_query();
        return $this->db->affected_rows();
    }

    public function get_pat_pic($id) {
        if (!empty($id)) {
            $query = $this->db->select("patient_pic_path")
                    ->where('regNo', $id)
                    ->get('admissiontbl');
            return $query->row();
        } else {
            echo "Invalid Paramenter supplied";
        }
    }

    public function ajax_search_by_cnic($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("regNo AS id, patName AS name, patStatus, patNoKType AS patnoktype, patNoK AS patnok")
                    ->like('patCNIC', $qs)
                    ->or_like('patName', $qs)
                    ->or_like('regNo', $qs)
                    ->where('patStatus !=', 'Discharged')
                    ->get('admissiontbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['name'] . " " . $result['patnoktype'] . " " . $result['patnok'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function ajax_get_all_wards() {
        //?_type=query&q=page
        $json = [];

        $query = $this->db->select("wardId AS id, wardName AS name")
                ->get('wardtbl');
        $json = $query->result_array();

        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['name'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function ajax_get_all_available_beds($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("bedId AS id, bedNo AS name, bedStatus AS status")
                    ->where('wardId', $qs)
                    ->where('bedStatus!=', 'Blocked')
                    ->where('bedStatus!=', 'Occupied')
                    ->where('bedStatus!=', 'Occupied Extra Bed')
                    ->get('bedtbl');
            $json = $query->result_array();

            echo "[";
            $braces = '';
            foreach ($json as $result) {

                echo $braces . " {\n";
                echo '  "id": "' . $result['id'] . '",' . "\n";
                if ($result['status'] == "Extra Bed") {
                    echo '	"text": "' . "Extra Bed. " . $result['name'] . '"' . "\n";
                } else {
                    echo '	"text": "' . "Bed No. " . $result['name'] . '"' . "\n";
                }
                $braces = ",\n";
                echo "}\n";
            }
            echo "]";
        }
    }

    public function occupy_bed($wardId, $bedId) {
        //echo $wardId.' '.$bedId;
        $query = $this->db->select('bedStatus AS status')
                ->where('wardId', $wardId)
                ->where('bedId', $bedId)
                ->get('bedtbl');
        $status = $query->row();

        if ($status->status == "Extra Bed") {

            $this->db->set('bedStatus', 'Occupied Extra Bed')
                    ->where('wardId', $wardId)
                    ->where('bedId', $bedId)
                    ->update('bedtbl');
        } else {
            $this->db->set('bedStatus', 'Occupied')
                    ->where('wardId', $wardId)
                    ->where('bedId', $bedId)
                    ->update('bedtbl');
        }
    }

    public function vacate_bed($wardId, $bedId) {
        $query = $this->db->select('bedStatus AS status')
                ->where('wardId', $wardId)
                ->where('bedId', $bedId)
                ->get('bedtbl');
        $status = $query->row();

        if ($status->status == "Occupied Extra Bed") {
            $this->db->set('bedStatus', 'Extra Bed')
                    ->where('wardId', $wardId)
                    ->where('bedId', $bedId)
                    ->update('bedtbl');
        } else {
            $this->db->set('bedStatus', 'Available')
                    ->where('wardId', $wardId)
                    ->where('bedId', $bedId)
                    ->update('bedtbl');
        }
    }

    public function search_result_by_cnic($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->like('patCNIC', $qs)
                    ->or_like('patName', $qs)
                    ->or_like('regNo', $qs)
                    ->where('patStatus !=', 'Discharged')
                    ->get('admissiontbl');
            return $query->result_array();
        }
    }

    public function search_discharged_result_by_cnic($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->like('patCNIC', $qs)
                    ->or_like('patName', $qs)
                    ->or_like('regNo', $qs)
                    ->get('dischargetbl');
            return $query->result_array();
        }
    }

    public function ajax_search_discharged_by_cnic($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("regNo AS id, patName AS name, patStatus, patNoKType AS patnoktype, patNoK AS patnok")
                    ->like('patCNIC', $qs)
                    ->or_like('patName', $qs)
                    ->or_like('regNo', $qs)
                    ->get('dischargetbl');
            $json = $query->result_array();
        }
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['name'] . " " . $result['patnoktype'] . " " . $result['patnok'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function search_result_discharged_by_cnic($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('dischargetbl');
            return $query->result_array();
        }
    }

    public function search_result_discharged_by_date($fromdate, $todate) {

        if (!empty($fromdate) && !empty($todate)) {
            $sql = "SELECT * FROM `dischargetbl` WHERE discharge_date BETWEEN '$fromdate' AND '$todate' ORDER BY `discharge_date` ASC";
            $query_result = $this->db->query($sql);
            $result = $query_result->result_array();
            return $result;
        }
    }

    public function ajax_search_by_ward($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs) && $qs == "true") {
            $query = $this->db->select("wardId AS id, wardName")
                    ->get('wardtbl');
            $json = $query->result_array();
        }

        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['wardName'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function search_result_by_ward($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('patward_Id', $qs)
                    ->get('admissiontbl');
            return $query->result_array();
        }
    }

    public function search_result_by_gender($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('patSex', $qs)
                    ->get('admissiontbl');
            return $query->result_array();
        }
    }

    public function search_result_by_date($todate, $fromdate) {
        if (!empty($todate) && !empty($fromdate)) {
            $sql = "SELECT * FROM `admissiontbl` WHERE patAdmDate BETWEEN DATE_FORMAT('$fromdate', '%Y-%m-%d') AND DATE_FORMAT('$todate', '%Y-%m-%d') ORDER BY `patAdmDate` ASC";
            $query_result = $this->db->query($sql);
            $result = $query_result->result_array();
            return $result;
        }
    }

    public function search_result_by_cnic_chart($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->like('regNo', $qs)
                    ->or_like('patName', $qs)
                    ->or_like('patCNIC', $qs)
                    ->get('admissiontbl');
            return $query->result_array();
        }
    }

    public function search_result_discharge_by_cnic_chart($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->like('regNo', $qs)
                    ->or_like('patName', $qs)
                    ->or_like('patCNIC', $qs)
                    ->get('dischargetbl');
            return $query->result_array();
        }
    }

    public function search_patient_chart($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('chartpatregNo', $qs)
                    ->get('charttbl');
            return $query->result_array();
        }
    }

    public function insert_history($data) {
        return $this->db->insert('charttbl', $data);
    }

    public function insert_shift_data($data) {
        return $this->db->insert('shifttbl', $data);
    }

    public function insert_inverstigation($data) {
        return $this->db->insert('charttbl', $data);
    }

    public function insert_treatment($data) {
        return $this->db->insert('charttbl', $data);
    }

    public function get_profile_pic($qs) {
        $query = $this->db->select('profile_pic_path as path')
                ->where('id', $qs)
                ->get('users');
        return $query->result_array();
    }

    public function update_profile_pic($qs, $data) {

        $check = $this->db->set('profile_pic_path', $data)->where('id', $qs)->update('users');  //table name

        if ($check) {
            header('location:' . base_url("/dashboard/profile"));
        }
    }

    public function update_user_phone($qs, $data) {
        $check = $this->db->set('phone', $data)->where('id', $qs)->update('users');  //table name

        if ($check) {
            header('location:' . base_url("/dashboard/profile"));
        }
    }

    public function get_desig($uid) {
        $query = $this->db->select('desig')
                ->where('id', $uid)
                ->get('users');
        return $query->row();
    }

    public function get_phone($uid) {
        $query = $this->db->select('phone')
                ->where('id', $uid)
                ->get('users');
        return $query->row();
    }

    public function insert_patient_pic($patID, $picPath) {
        $this->db->set('patient_pic_path', $picPath)->where('regNo', $patID)->update('admissiontbl');  //table name
    }

    public function update_qualifications($qs, $data) {
        $check = $this->db->set('qualifications', $data)->where('id', $qs)->update('users');
        if ($check) {
            header('location:' . base_url("/dashboard/profile"));
        } else {
            echo "Failed";
        }
    }

    public function update_designation($qs, $data) {
        $check = $this->db->set('desig', $data)->where('id', $qs)->update('users');
        if ($check) {
            header('location:' . base_url("/dashboard/profile"));
        } else {
            echo "Failed";
        }
    }

    public function get_qualifications($qs) {
        $check = $this->db->select('qualifications')->where('id', $qs)->get('users');
        if ($check) {
            return $check->result_array();
        }
    }

    public function update_department($qs, $data) {
        $check = $this->db->set('department', $data)->where('id', $qs)->update('users');
        if ($check) {
            header('location:' . base_url("/dashboard/profile"));
        } else {
            echo "Failed";
        }
    }

    public function get_department($qs) {
        $check = $this->db->select('department')->where('id', $qs)->get('users');
        if ($check) {
            return $check->result_array();
        }
    }

    public function get_history($qs) {
        $query = "SELECT count(NULLIF(patHistory, '')) AS temp FROM charttbl WHERE chartpatregNo = " . $qs . " AND (patHistory != '' or patHistory IS NOT NULL)";
        $exec = $query = $this->db->query($query);
        if ($exec) {
            $arr = $exec->result_array();
            foreach ($arr as $item) {
                $strchk = $item['temp'];
                return $strchk;
            }
        }
    }

    public function get_investigation($qs) {
        $query = "SELECT count(NULLIF(patInvestigation, '')) AS temp FROM charttbl WHERE chartpatregNo = " . $qs . " AND (patInvestigation != '' or patInvestigation IS NOT NULL)";
        $exec = $query = $this->db->query($query);
        $arr = $exec->result_array();
        foreach ($arr as $item) {
            $strchk = $item['temp'];
            return $strchk;
        }
    }

    public function get_treatment($qs) {
        $query = "SELECT count(NULLIF(patTreatPlan, '')) AS temp FROM charttbl WHERE chartpatregNo = " . $qs . " AND (patTreatPlan != '' or patTreatPlan IS NOT NULL)";
        $exec = $query = $this->db->query($query);
        $arr = $exec->result_array();
        foreach ($arr as $item) {
            $strchk = $item['temp'];
            return $strchk;
        }
    }

    public function update_status($qs, $data) {
        $check = $this->db->set('patStatus', $data)->where('regNo', $qs)->update('admissiontbl');
        if ($check) {
            return "success";
        } else {
            return "Failed";
        }
    }

    public function get_all_user() {
        $query = $this->db->select('*')
                ->where('isActive', "1")
                ->get('users');
        return $query->result_array();
    }

    public function count_all_user() {
        $query = $this->db->select('count(id) AS counter')
                ->get('users');
        return $query->result();
    }

    public function access_checker($privid, $access) {
        $query = $this->db->select($access)
                ->where('priv_id', $privid)
                ->get('user_groups');
        $row = $query->row();
        return $row->$access;
    }

    public function get_all_priv() {
        $query = $this->db->select('priv_id,ug_desc')
                ->get('user_groups');
        return $query->result_array();
    }

    public function get_priv_desc($privid) {
        $query = $this->db->select('ug_desc')
                ->where('priv_id', $privid)
                ->get('user_groups');
        $row = $query->row();
        return $row->ug_desc;
    }

    public function update_user_priv($user_id, $privid) {
        $query = $this->db->set('priv', $privid)
                ->where('id', $user_id)
                ->update('users');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Privileges Failed!";
        }
    }

    public function get_all_user_priv() {
        $query = $this->db->select('*')
                ->get('user_groups');
        return $query->result_array();
    }

    public function update_priv($privid, $allow_user_to_admit, $view_admitted_patients, $view_history_and_plan_chart, $discharge_patients, $can_book_ot, $can_view_ot_list, $view_radiology_section, $view_ward_bed_list, $view_statistics, $view_inventory, $view_accounts, $view_configurations, $view_master_list, $can_update_patient_record, $can_update_hp_chart
    ) {

        $updateArray = array(
            'allow_user_to_admit' => $allow_user_to_admit,
            'view_admitted_patients' => $view_admitted_patients,
            'view_history_and_plan_chart' => $view_history_and_plan_chart,
            'discharge_patients' => $discharge_patients,
            'can_book_ot' => $can_book_ot,
            'can_view_ot_list' => $can_view_ot_list,
            'view_radiology_section' => $view_radiology_section,
            'view_ward_bed_list' => $view_ward_bed_list,
            'view_statistics' => $view_statistics,
            'view_inventory' => $view_inventory,
            'view_accounts' => $view_accounts,
            'view_configurations' => $view_configurations,
            'view_master_list' => $view_master_list,
            'can_update_patient_record' => $can_update_patient_record,
            'can_update_hp_chart' => $can_update_hp_chart
        );

        $query = $this->db
                ->set($updateArray)
                ->where('priv_id', $privid)
                ->update('user_groups');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Privileges Failed!";
        }
    }

    public function insert_priv($privid, $ugdesc, $allow_user_to_admit, $view_admitted_patients, $view_history_and_plan_chart, $discharge_patients, $can_book_ot, $can_view_ot_list, $view_radiology_section, $view_ward_bed_list, $view_statistics, $view_inventory, $view_accounts, $view_configurations, $view_master_list, $can_update_patient_record, $can_update_hp_chart
    ) {

        $insertArray = array(
            'priv_id' => $privid,
            'ug_desc' => $ugdesc,
            'allow_user_to_admit' => $allow_user_to_admit,
            'view_admitted_patients' => $view_admitted_patients,
            'view_history_and_plan_chart' => $view_history_and_plan_chart,
            'discharge_patients' => $discharge_patients,
            'can_book_ot' => $can_book_ot,
            'can_view_ot_list' => $can_view_ot_list,
            'view_radiology_section' => $view_radiology_section,
            'view_ward_bed_list' => $view_ward_bed_list,
            'view_statistics' => $view_statistics,
            'view_inventory' => $view_inventory,
            'view_accounts' => $view_accounts,
            'view_configurations' => $view_configurations,
            'view_master_list' => $view_master_list,
            'can_update_patient_record' => $can_update_patient_record,
            'can_update_hp_chart' => $can_update_hp_chart
        );

        $query = $this->db->insert('user_groups', $insertArray);
        if ($query) {
            echo "Successfully Inserted!";
        } else {
            echo "Inserting Privileges Failed!";
        }
    }

    public function update_pwd($uid, $pwd) {
        $salt = $this->authentication->generate_salt();
        $password = $this->authentication->generate_hash($pwd, $salt);
        // Generate hash
        $query = $this->db->set('password', $password)
                ->where('id', $uid)
                ->update('users');
        if ($query) {
            echo "Password Successfully Updated!";
        } else {
            echo "Updating Privileges Failed!";
        }
    }

    public function user_deactivate($uid) {
        $query = $this->db->set('isActive', "0")
                ->where('id', $uid)
                ->update('users');
        if ($query) {
            echo "User Successfully Deactivated!";
        } else {
            echo "User Deactivation Failed!";
        }
    }

    public function delete_priv($ug_id) {

        $query = $this->db->delete('user_groups', array('ug_id' => $ug_id));
        if ($query) {
            echo "Privilege Successfully Deactivated!";
        } else {
            echo "Privilege Deactivation Failed!";
        }
    }

//=======================================================//
//          Model Code for OT Module starts here         //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    public function get_operation_theatre_list() {
        $query = $this->db->select('*')
                ->get('otwardtbl');
        return $query->result_array();
    }

    public function insert_ot_booking_to_db($data) {
        return $this->db->insert('operationtheatretbl', $data);
    }

    public function ajax_ot_search_by_cnic($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("otPatNo AS id, otIsOperated AS status")
                    ->like('otPatNo', $qs)
                    ->or_like('otPatName', $qs)
                    ->get('operationtheatretbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            if ($result['status'] == 0) {
                $tempArray = $this->get_patient_name_by_id($result['id']);

                echo $braces . " {\n";
                echo '  "id": "' . $result['id'] . '",' . "\n";
                echo '	"text": "' . $tempArray->patName . " " . $tempArray->patNoKType . " " . $tempArray->patNoK . '"' . "\n";
                $braces = ",\n";
                echo "}\n";
            }
        }
        echo "]";
    }

    public function ajax_search_by_otward($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs) && $qs == "true") {
            $query = $this->db->select("otwardId AS id, otwardName AS name")
                    ->get('otwardtbl');
            $json = $query->result_array();
        }

        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['name'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function search_result_by_otward($qs) {
        if (!empty($qs)) {
            $whereArray = array(
                'otWardNo' => $qs,
                'otIsOperated' => '0'
            );
            $query = $this->db->select('*')
                    ->where($whereArray)
                    ->order_by('otBookingDate1 asc, otBookingTime1 asc')
                    ->get('operationtheatretbl');
            return $query->result_array();
        }
    }

    public function get_otward_by_id($qs) {
        if (!empty($qs)) {

            $query = $this->db->select('otwardName')
                    ->where('otwardId', $qs)
                    ->get('otwardtbl');
            return $query->row();
        }
    }

    public function get_patirnt_name_by_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('patName, patNoKType, patNoK')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            $result = $query->row();

            if (!empty($result)) {
                return $result;
            } else {
                $query = $this->db->select('patName, patNoKType, patNoK')
                        ->where('regNo', $qs)
                        ->get('dischargetbl');
                return $query->row();
            }
        }
    }

    public function get_patient_name_by_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('patName, patNoKType, patNoK')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            return $query->row();
        }
    }

    public function get_user_name_by_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('full_name')
                    ->where('id', $qs)
                    ->get('users');
            return $query->row();
        }
    }

    public function search_result_by_ot_patid($qs) {
        if (!empty($qs)) {
            $whereArray = array(
                'otPatNo' => $qs,
                'otIsOperated' => '0'
            );
            $query = $this->db->select('*')
                    ->where($whereArray)
                    ->order_by('otBookingDate1 asc, otBookingTime1 asc')
                    ->get('operationtheatretbl');
            return $query->result_array();
        }
    }

    public function search_result_ot_by_date($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->like('otBookingDate', $qs)
                    ->where('otIsOperated', '0')
                    ->order_by("otBookingTime1", "asc")
                    ->get('operationtheatretbl');
            return $query->result_array();
        }
    }

    public function delete_ot($ot_id) {

        $query = $this->db->delete('operationtheatretbl', array('otBookingNo' => $ot_id));
        if ($query) {
            echo "Privilege Successfully Deactivated!";
        } else {
            echo "Privilege Deactivation Failed!";
        }
    }

    public function update_ot_operated_db($data, $id) {
        $updateArray = array(
            'otAnesthesia' => $data['otAnesthesia'],
            'otOpFindingsProc' => $data['otOpFindingsProc'],
            'otIsOperated' => '1',
            'dateOfOperation' => $data['dateOfOperation'],
            'timeOfOperation' => $data['timeOfOperation'],
            'preOpDiagnosis' => $data['preOpDiagnosis'],
            'postOpDiagnosis' => $data['postOpDiagnosis'],
            'anesthesia' => $data['anesthesia'],
            'assistant' => $data['assistant'],
            'incision' => $data['incision'],
            'durationOfProcedure' => $data['durationOfProcedure'],
            'preOperativeFindings' => $data['preOperativeFindings'],
            'biopsy' => $data['biopsy'],
            'drains' => $data['drains'],
            'referring_consultent' => $data['referring_consultent'],
            'vdoc_name' => $data['vdoc_name'],
            'otVitalPulse' => $data['otVitalPulse'],
            'otVitalbp' => $data['otVitalbp'],
            'otVitaltemp' => $data['otVitaltemp'],
            'otVitalrr' => $data['otVitalrr'],
            'formatted_date_of_op' => $data['formatted_date_of_op']
        );
        $query = $this->db->set($updateArray)
                ->where('otBookingNo', $id)
                ->update('operationtheatretbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function search_result_by_otward_operated($qs) {
        if (!empty($qs)) {
            $whereArray = array(
                'otWardNo' => $qs,
                'otIsOperated' => '1'
            );
            $query = $this->db->select('*')
                    ->where($whereArray)
                    ->order_by('otBookingDate1 asc, otBookingTime1 asc')
                    ->get('operationtheatretbl');
            return $query->result_array();
        }
    }

    public function search_result_ot_by_date_operated($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->like('otBookingDate', $qs)
                    ->where('otIsOperated', '1')
                    ->order_by("otBookingTime1", "asc")
                    ->get('operationtheatretbl');
            return $query->result_array();
        }
    }

    public function get_surgeon_list() {
        $query = $this->db->select('*')
                ->where('isSurgeon', '1')
                ->get('users');
        return $query->result_array();
    }

    public function search_result_by_ot_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('operationtheatretbl');
            return $query->result_array();
        }
    }

    public function update_ot_booking_to_db($data, $id) {
        $updateArray = array(
            'otWardNo' => $data['otWardNo'],
            'otOperationType' => $data['otOperationType'],
            'otPatientStatus' => $data['otPatientStatus'],
            'otBookingDate' => $data['otBookingDate'],
            'otBookingTime' => $data['otBookingTime'],
            'otBookingDate1' => $data['otBookingDate1'],
            'otBookingTime1' => $data['otBookingTime1'],
            'otSurgeon' => $data['otSurgeon']
        );
        $query = $this->db->set($updateArray)
                ->where('otBookingNo', $id)
                ->update('operationtheatretbl');
        if ($query) {
            return 1;
        }
    }

    public function check_patient_ot_by_regno($qs) {
        if (!empty($qs)) {
            $whereArray = array(
                'otPatNo' => $qs,
                'otIsOperated' => '0'
            );
            $query = $this->db->select('*')
                    ->where($whereArray)
                    ->get('operationtheatretbl');
            return $query->row();
        }
    }

//=======================================================//
//           Model Code for OT Module ends here          //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    //Arslan Code for beds and wards starts here
    public function bed_colors($statusParam) {
        if ($statusParam == 'Available') {
            return "color-available";
        } elseif ($statusParam == 'Occupied') {
            return "color-occupied";
        } elseif ($statusParam == 'Blocked') {
            return "color-blocked";
        } elseif ($statusParam == 'Extra Bed') {
            return "color-temp-bed";
        } elseif ($statusParam == 'Occupied Extra Bed') {
            return "color-occu-temp-bed";
        }
    }

    public function get_bed_status($bedId) {
        if (!empty($bedId)) {
            $query = $this->db->select('bedStatus')
                    ->where('bedId', $bedId)
                    ->get('bedtbl');
            $result = $query->row();
            if ($result->bedStatus == 'Blocked') {
                return 0;
            } else {
                return 1;
            }
        }
    }

    public function get_bed_name_wrt_ward($bedId) {
        $query = $this->db->select('bedNo AS bed, bedStatus AS status')
                ->where('bedId', $bedId)
                ->get('bedtbl');
        $result = $query->row();
        return $result;
    }

    public function bed_blocker($bedId) {
        if (!empty($bedId)) {
            $query = $this->db->select('bedStatus')
                    ->where('bedId', $bedId)
                    ->get('bedtbl');
            $result = $query->row();
            if ($result->bedStatus == 'Blocked') {
                $this->db->set('bedStatus', 'Available')->where('bedId', $bedId)->update('bedtbl');
                return 0;
            } else {
                $this->db->set('bedStatus', 'Blocked')->where('bedId', $bedId)->update('bedtbl');
                return 1;
            }
        }
    }

    public function search_result_by_wardnumber($qs) {
        if (!empty($qs['ward_id']) || !empty($qs['status'])) {
            $where = ' 1 ';
            $ward_id = $qs['ward_id'];
            $status = $qs['status'];
            if(!empty($qs['ward_id']) && !empty($qs['status'])){
                $where.= " AND wardId = $ward_id AND bedStatus = '$status' ";
            }elseif(!empty($qs['ward_id'])){
                $where.= " AND wardId = $ward_id ";
            }elseif(!empty($qs['status'])){
                $where.= " AND bedStatus = '$status' ";
            }
            $query = $this->db->select('*')
                    ->where($where)
                    ->get('bedtbl');
            //echo $this->db->last_query();
            return $query->result_array();
        }else{
            return array();
        }
    }

    public function search_permanent_beds($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('bedStatus!=', 'Occupied Extra Bed')
                    ->where('bedStatus!=', 'Extra Bed')
                    ->where('wardId', $qs)
                    ->get('bedtbl');
            return $query->result_array();
        }
    }

    public function search_result_by_status($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->like('bedStatus', $qs)
                    ->get('bedtbl');
            return $query->result_array();
        }
    }

    public function ajax_search_result_by_wardnumber() {
        $json = [];

        $query = $this->db->select("wardId AS id, wardName AS name")
                ->get('wardtbl');
        $json = $query->result_array();

        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['name'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function ajax_search_result_by_status() {
        
    }

    public function count_available_beds($qs) {
        $query = $this->db->select('count(bedStatus) AS counter')
                ->where('bedStatus', 'Available')
                ->where('wardId', $qs)
                ->get('bedtbl');
        return $query->row();
    }

    public function count_occupied_beds($qs) {
        $query = $this->db->select('count(bedStatus) AS counter')
                    ->where('bedStatus', 'Occupied')
                    ->where('wardId', $qs)
                    ->get('bedtbl');
        //echo $this->db->last_query();
        return $query->row();
    }

    public function count_blocked_beds($qs) {
        $query = $this->db->select('count(bedStatus) AS counter')
                ->where('bedStatus', 'Blocked')
                ->where('wardId', $qs)
                ->get('bedtbl');
        return $query->row();
    }

    public function count_temp_beds($qs) {
        $query = $this->db->select('count(bedStatus) AS counter')
                ->where('bedStatus', 'Extra Bed')
                ->where('wardId', $qs)
                ->get('bedtbl');
        return $query->row();
    }

    public function get_patient_details_by_bed($qs) {
        $query = $this->db->select('*')
                ->where('patbed_id', $qs)
                ->get('admissiontbl');
        return $query->result_array();
    }

    public function get_bed_details($qs) {
        $query = $this->db->select('*')
                ->where('bedId', $qs)
                ->get('bedtbl');
        return $query->result_array();
    }

    public function insert_temporary_bed($data) {
        return $this->db->insert('bedtbl', $data);
    }

    public function delete_temporary_bed($bedId) {

        $query = $query = $this->db->select('*')
                ->where('patbed_id', $bedId)
                ->get('admissiontbl');

        $numrow = $query->num_rows();

        if ($numrow < 1) {
            return $this->db->delete('bedtbl', array('bedId' => $bedId)) . $bedId;
        } else {
            return "Couldn't delete extra bed, currently a patient is being treated on this bed";
        }
    }

    public function get_all_diseases($qs) {

        if (!empty($qs)) {
            //?_type=query&q=page
            $json = [];
            $query = $this->db->select("disease_id AS id, 	disease_name AS name")
                    ->like('disease_name', $qs)
                    ->get('diseasetbl');
            $json = $query->result_array();

            //echo json_encode($json);
            // print_r($json);
            echo "[";
            $braces = '';
            foreach ($json as $result) {
                echo $braces . " {\n";
                echo '  "id": "' . $result['id'] . '",' . "\n";
                echo '	"text": "' . $result['name'] . '"' . "\n";
                $braces = ",\n";
                echo "}\n";
            }
            echo "]";
        } else {
            //?_type=query&q=page
            $json = [];
            $query = $this->db->select("disease_id AS id, 	disease_name AS name")
                    ->get('diseasetbl');
            $json = $query->result_array();

            //echo json_encode($json);
            // print_r($json);
            echo "[";
            $braces = '';
            foreach ($json as $result) {
                echo $braces . " {\n";
                echo '  "id": "' . $result['id'] . '",' . "\n";
                echo '	"text": "' . $result['name'] . '"' . "\n";
                $braces = ",\n";
                echo "}\n";
            }
            echo "]";
        }
    }

    public function get_disease_by_id($qs) {
        if (!empty($qs)) {

            $query = $this->db->select('disease_name')
                    ->where('disease_id', $qs)
                    ->get('diseasetbl');
            return $query->row();
        }
    }

    public function get_ot_details_of_discharged_patient($qs) {
        if (!empty($qs)) {

            $query = $this->db->select('*')
                    ->where('otPatNo', $qs)
                    ->get('operationtheatretbl');
            return $query->result_array();
        }
    }

    public function report_insert($data) {
        return $this->db->insert('reportstbl', $data);
    }

    public function vitals_insert($data) {
        return $this->db->insert('vitals_sheettbl', $data);
    }

    public function report_view($qs) {
        if (!empty($qs)) {

            $query = $this->db->select('*')
                    ->where('patregNo', $qs)
                    ->get('reportstbl');
            return $query->result_array();
        }
    }

    public function vitals_view($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('vitals_sheettbl');
            return $query->result_array();
        }
    }

    public function delete_report_model($reportId) {
        $query = $this->db->delete('reportstbl', array('reportId' => $reportId));
        if ($query) {
            echo "Report has been deleted successfully! " . $reportId;
        } else {
            echo "Report deletion failed!";
        }
    }

    public function delete_vital_model($vitalId) {
        $query = $this->db->delete('vitals_sheettbl', array('vital_id' => $vitalId));
        if ($query) {
            echo "Vitals Record has been deleted successfully! " . $vitalId;
        } else {
            echo "Vitals Record deletion failed!";
        }
    }

    public function patient_counter() {
        $query = $this->db->select('count(regNo) AS counter')
                ->get('admissiontbl');
        return $query->row();
    }

    public function bed_counter() {
        $query = $this->db->select('count(bedId) AS counter')
                ->get('bedtbl');
        return $query->row();
    }

    public function updatePreviousRecordForReAdmission($qs) {
        $this->db->set('previousRegno', "RID" . " - " . $qs)
                ->where('regNo', $qs)
                ->update('dischargetbl');
    }

    public function getPreviousVisits($qs) {
        $query = $this->db->select('regNo, patAdmDate, previousRegno')
                ->where('previousRegno', $qs)
                ->get('dischargetbl');
        return $query->result_array();
    }

    public function get_all_wards() {
        $query = $this->db->select('*')
                ->get('wardtbl');
        return $query->result_array();
    }

    public function get_all_ot_wards() {
        $query = $this->db->select('*')
                ->get('otwardtbl');
        return $query->result_array();
    }

    public function get_all_expenses() {
        $query = $this->db->select('*')
                ->get('expense_categorytbl');
        return $query->result_array();
    }

    public function get_side_room_cost() {
        $query = $this->db->select('rate')
                ->where('rateId', '1')
                ->get('sideroomsrate');
        return $query->result_array();
    }

    public function get_all_announcements() {
        $query = $this->db->select('*')
                ->get('announcement_tbl');
        return $query->result_array();
    }

    public function get_last_five_announcements() {
        $query = $this->db->select('*')
                ->order_by('timestamp', 'desc')
                ->limit(5)
                ->get('announcement_tbl');
        return $query->result_array();
    }

    public function insert_new_announcement($wardName) {
        return $this->db->insert('announcement_tbl', $wardName);
    }

    public function insert_new_ward($wardName) {
        return $this->db->insert('wardtbl', $wardName);
    }

    public function insert_new_ot_ward($wardName) {
        return $this->db->insert('otwardtbl', $wardName);
    }

    public function insert_new_expense($expenseName) {
        return $this->db->insert('expense_categorytbl', $expenseName);
    }

    public function delete_ward($wardId) {
        return $this->db->delete('wardtbl', array('wardId' => $wardId));
    }

    public function delete_ot_ward($wardId) {
        return $this->db->delete('otwardtbl', array('otwardId' => $wardId));
    }

    public function edit_category($categoryNo, $categoryName) {
        $check = $this->db->set('categoryName', $categoryName)->where('categoryNo', $categoryNo)->update('expense_categorytbl');
        if ($check) {
            echo "edited successfully";
        }
    }

    public function update_sideroom_cost($cost) {
        $check = $this->db->set('rate', $cost)->where('rateId', '1')->update('sideroomsrate');
        if ($check) {
            echo "edited successfully";
        }
    }

    //Graph for admisson-discharge Model Code starts here - Arslan
    public function admission_discharge_date_range_graph($iteratorDate) {
        if (!empty($iteratorDate)) {
            //SELECT * FROM `admissiontbl` WHERE CAST(`admission_timestamp` AS DATE) = '2018-03-11'
            $dailyAdmissionQuery = $this->db->select('count(regNo) AS admitted_patients, CAST(`patAdmDate` AS DATE) AS admDate')
                    ->where("CAST(`patAdmDate` AS DATE)=", $iteratorDate)
                    ->get('admissiontbl');
            $dailyDischargeQuery = $this->db->select('count(discharge_id) AS discharged_patients, CAST(`discharge_date` AS DATE) AS disDate')
                    ->where("CAST(`discharge_date` AS DATE)=", $iteratorDate)
                    ->get('dischargetbl');
            $dailyAdmissionResult = $dailyAdmissionQuery->row();
            $dailyDischargeResult = $dailyDischargeQuery->row();
            //return $dailyAdmissionResult;
            return array('category' => "Admission - Discharge", 'admission' => $dailyAdmissionResult->admitted_patients, 'discharge' => $dailyDischargeResult->discharged_patients);
        }
    }

    public function admission_discharge_monthly_graph($iteratorMonth) {
        if (!empty($iteratorMonth)) {
            $filteredMonth = str_replace('-', '', $iteratorMonth);
            //   SELECT count(*), EXTRACT(YEAR_MONTH FROM `admission_timestamp`) AS date FROM `admissiontbl` WHERE EXTRACT(YEAR_MONTH FROM `admission_timestamp`) = '201803'
            $monthlyAdmissionQuery = $this->db->select('count(regNo) AS admitted_patients, EXTRACT(YEAR_MONTH FROM `patAdmDate`)')
                    ->where("EXTRACT(YEAR_MONTH FROM `patAdmDate`)=", $filteredMonth)
                    ->get('admissiontbl');
            $monthlyDischargeQuery = $this->db->select('count(discharge_id) AS discharged_patients, EXTRACT(YEAR_MONTH FROM `discharge_date`)')
                    ->where("EXTRACT(YEAR_MONTH FROM `discharge_date`)=", $filteredMonth)
                    ->get('dischargetbl');
            $monthlyAdmissionResult = $monthlyAdmissionQuery->row();
            $monthlyDischargeResult = $monthlyDischargeQuery->row();
            //return $dailyAdmissionResult;
            return array('category' => "Admission - Discharge", 'admission' => $monthlyAdmissionResult->admitted_patients, 'discharge' => $monthlyDischargeResult->discharged_patients);
        }
    }

    public function admission_discharge_year_graph($iteratorYear) {
        if (!empty($iteratorYear)) {
            //   SELECT count(*), EXTRACT(YEAR_MONTH FROM `admission_timestamp`) AS date FROM `admissiontbl` WHERE EXTRACT(YEAR_MONTH FROM `admission_timestamp`) = '201803'
            $yearlyAdmissionQuery = $this->db->select('count(regNo) AS admitted_patients, EXTRACT(YEAR FROM `patAdmDate`)')
                    ->where("EXTRACT(YEAR FROM `patAdmDate`)=", $iteratorYear)
                    ->get('admissiontbl');
            $yearlyDischargeQuery = $this->db->select('count(discharge_id) AS discharged_patients, EXTRACT(YEAR FROM `discharge_date`)')
                    ->where("EXTRACT(YEAR FROM `discharge_date`)=", $iteratorYear)
                    ->get('dischargetbl');
            $yearlyAdmissionResult = $yearlyAdmissionQuery->row();
            $yearlyDischargeResult = $yearlyDischargeQuery->row();
            //return $dailyAdmissionResult;
            return array('category' => "Admission - Discharge", 'admission' => $yearlyAdmissionResult->admitted_patients, 'discharge' => $yearlyDischargeResult->discharged_patients);
        }
    }

    //Graph for admission-discharge Model Code ends here - Arslan
    //Graph for operated patient Model Code starts here - Arslan
    public function operated_patients_date_range_graph($iteratorDate) {
        if (!empty($iteratorDate)) {
            $operatedPatientsQuery = $this->db->select('count(*) AS operated_patients_count, CAST(`formatted_date_of_op` AS DATE) as operation_date')
                    ->where("CAST(`formatted_date_of_op` AS DATE)=", $iteratorDate)
                    ->get('operationtheatretbl');
            $operatedPatientsResult = $operatedPatientsQuery->row();
            return array('category' => $operatedPatientsResult->operation_date, 'operated_patients_count' => $operatedPatientsResult->operated_patients_count);
        }
    }

    //Graph for operated patient Model Code ends here - Arslan
    //Graph for outcome Model starts here - Arslan
    public function outcome_based_date_range_graph($iteratorDate) {
        if (!empty($iteratorDate)) {
            //SELECT * FROM `admissiontbl` WHERE CAST(`admission_timestamp` AS DATE) = '2018-03-11'
            //SELECT count(*), `patStatus`,  CAST(`discharge_timestamp` AS DATE) as dt FROM `dischargetbl` WHERE CAST(`discharge_timestamp` AS DATE) = '2018-03-13' AND `patStatus` = 'Discharged';
            //Cured (b) LAMA (c) DOR (d) Discharged (e) Referred (f) Death
            $dailyOutcomeQueryforCured = $this->db->select('count(*) AS cured_patients, CAST(`discharge_date` AS DATE) AS outDate')
                    ->where("CAST(`discharge_date` AS DATE)=", $iteratorDate)
                    ->where("patStatus", "Cured")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforLama = $this->db->select('count(*) AS lama_patients, CAST(`discharge_date` AS DATE) AS outDate')
                    ->where("CAST(`discharge_date` AS DATE)=", $iteratorDate)
                    ->where("patStatus", "LAMA")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforDor = $this->db->select('count(*) AS dor_patients, CAST(`discharge_date` AS DATE) AS outDate')
                    ->where("CAST(`discharge_date` AS DATE)=", $iteratorDate)
                    ->where("patStatus", "DOR")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforDischarged = $this->db->select('count(*) AS discharged_patients, CAST(`discharge_date` AS DATE) AS outDate')
                    ->where("CAST(`discharge_date` AS DATE)=", $iteratorDate)
                    ->where("patStatus", "Discharged")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforReferred = $this->db->select('count(*) AS referred_patients, CAST(`discharge_date` AS DATE) AS outDate')
                    ->where("CAST(`discharge_date` AS DATE)=", $iteratorDate)
                    ->where("patStatus", "Referred")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforDeath = $this->db->select('count(*) AS died_patients, CAST(`discharge_date` AS DATE) AS outDate')
                    ->where("CAST(`discharge_date` AS DATE)=", $iteratorDate)
                    ->where("patStatus", "Death")
                    ->get('dischargetbl');

            $dailyOutcomeResultforCured = $dailyOutcomeQueryforCured->row();
            $dailyOutcomeResultforLama = $dailyOutcomeQueryforLama->row();
            $dailyOutcomeResultforDor = $dailyOutcomeQueryforDor->row();
            $dailyOutcomeResultforDischarged = $dailyOutcomeQueryforDischarged->row();
            $dailyOutcomeResultforReferred = $dailyOutcomeQueryforReferred->row();
            $dailyOutcomeResultforDeath = $dailyOutcomeQueryforDeath->row();

            return array('category' => $iteratorDate,
                'cured' => $dailyOutcomeResultforCured->cured_patients,
                'lama' => $dailyOutcomeResultforLama->lama_patients,
                'dor' => $dailyOutcomeResultforDor->dor_patients,
                'discharged' => $dailyOutcomeResultforDischarged->discharged_patients,
                'referred' => $dailyOutcomeResultforReferred->referred_patients,
                'death' => $dailyOutcomeResultforDeath->died_patients
            );
        }
    }

    public function outcome_based_monthly_graph($iteratorMonth) {
        if (!empty($iteratorMonth)) {
            //SELECT * FROM `admissiontbl` WHERE CAST(`admission_timestamp` AS DATE) = '2018-03-11'
            //SELECT count(*), `patStatus`,  CAST(`discharge_timestamp` AS DATE) as dt FROM `dischargetbl` WHERE CAST(`discharge_timestamp` AS DATE) = '2018-03-13' AND `patStatus` = 'Discharged';
            //Cured (b) LAMA (c) DOR (d) Discharged (e) Referred (f) Death
            $filteredMonth = str_replace('-', '', $iteratorMonth);
            $dailyOutcomeQueryforCured = $this->db->select('count(*) AS cured_patients, EXTRACT(YEAR_MONTH FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR_MONTH FROM `discharge_date`)=", $filteredMonth)
                    ->where("patStatus", "Cured")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforLama = $this->db->select('count(*) AS lama_patients, EXTRACT(YEAR_MONTH FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR_MONTH FROM `discharge_date`)=", $filteredMonth)
                    ->where("patStatus", "LAMA")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforDor = $this->db->select('count(*) AS dor_patients, EXTRACT(YEAR_MONTH FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR_MONTH FROM `discharge_date`)=", $filteredMonth)
                    ->where("patStatus", "DOR")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforDischarged = $this->db->select('count(*) AS discharged_patients, EXTRACT(YEAR_MONTH FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR_MONTH FROM `discharge_date`)=", $filteredMonth)
                    ->where("patStatus", "Discharged")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforReferred = $this->db->select('count(*) AS referred_patients, EXTRACT(YEAR_MONTH FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR_MONTH FROM `discharge_date`)=", $filteredMonth)
                    ->where("patStatus", "Referred")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforDeath = $this->db->select('count(*) AS died_patients, EXTRACT(YEAR_MONTH FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR_MONTH FROM `discharge_date`)=", $iteratorMonth)
                    ->where("patStatus", "Death")
                    ->get('dischargetbl');

            $dailyOutcomeResultforCured = $dailyOutcomeQueryforCured->row();
            $dailyOutcomeResultforLama = $dailyOutcomeQueryforLama->row();
            $dailyOutcomeResultforDor = $dailyOutcomeQueryforDor->row();
            $dailyOutcomeResultforDischarged = $dailyOutcomeQueryforDischarged->row();
            $dailyOutcomeResultforReferred = $dailyOutcomeQueryforReferred->row();
            $dailyOutcomeResultforDeath = $dailyOutcomeQueryforDeath->row();

            return array('category' => $iteratorMonth,
                'cured' => $dailyOutcomeResultforCured->cured_patients,
                'lama' => $dailyOutcomeResultforLama->lama_patients,
                'dor' => $dailyOutcomeResultforDor->dor_patients,
                'discharged' => $dailyOutcomeResultforDischarged->discharged_patients,
                'referred' => $dailyOutcomeResultforReferred->referred_patients,
                'death' => $dailyOutcomeResultforDeath->died_patients
            );
        }
    }

    public function outcome_based_year_graph($iteratorYear) {
        if (!empty($iteratorYear)) {
            //SELECT * FROM `admissiontbl` WHERE CAST(`admission_timestamp` AS DATE) = '2018-03-11'
            //SELECT count(*), `patStatus`,  CAST(`discharge_timestamp` AS DATE) as dt FROM `dischargetbl` WHERE CAST(`discharge_timestamp` AS DATE) = '2018-03-13' AND `patStatus` = 'Discharged';
            //Cured (b) LAMA (c) DOR (d) Discharged (e) Referred (f) Death
            $dailyOutcomeQueryforCured = $this->db->select('count(*) AS cured_patients, EXTRACT(YEAR FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR FROM `discharge_date`)=", $iteratorYear)
                    ->where("patStatus", "Cured")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforLama = $this->db->select('count(*) AS lama_patients, EXTRACT(YEAR FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR FROM `discharge_date`)=", $iteratorYear)
                    ->where("patStatus", "LAMA")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforDor = $this->db->select('count(*) AS dor_patients, EXTRACT(YEAR FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR FROM `discharge_date`)=", $iteratorYear)
                    ->where("patStatus", "DOR")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforDischarged = $this->db->select('count(*) AS discharged_patients, EXTRACT(YEAR FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR FROM `discharge_date`)=", $iteratorYear)
                    ->where("patStatus", "Discharged")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforReferred = $this->db->select('count(*) AS referred_patients, EXTRACT(YEAR FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR FROM `discharge_date`)=", $iteratorYear)
                    ->where("patStatus", "Referred")
                    ->get('dischargetbl');
            $dailyOutcomeQueryforDeath = $this->db->select('count(*) AS died_patients, EXTRACT(YEAR FROM `discharge_date`) AS outDate')
                    ->where("EXTRACT(YEAR FROM `discharge_date`)=", $iteratorYear)
                    ->where("patStatus", "Death")
                    ->get('dischargetbl');

            $dailyOutcomeResultforCured = $dailyOutcomeQueryforCured->row();
            $dailyOutcomeResultforLama = $dailyOutcomeQueryforLama->row();
            $dailyOutcomeResultforDor = $dailyOutcomeQueryforDor->row();
            $dailyOutcomeResultforDischarged = $dailyOutcomeQueryforDischarged->row();
            $dailyOutcomeResultforReferred = $dailyOutcomeQueryforReferred->row();
            $dailyOutcomeResultforDeath = $dailyOutcomeQueryforDeath->row();

            return array('category' => $iteratorYear,
                'cured' => $dailyOutcomeResultforCured->cured_patients,
                'lama' => $dailyOutcomeResultforLama->lama_patients,
                'dor' => $dailyOutcomeResultforDor->dor_patients,
                'discharged' => $dailyOutcomeResultforDischarged->discharged_patients,
                'referred' => $dailyOutcomeResultforReferred->referred_patients,
                'death' => $dailyOutcomeResultforDeath->died_patients
            );
        }
    }

    //Graph for outcome Model ends here - Arslan
    //=======================================================//
    //       Code for Re-Visit based Graph starts here       //
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//

    public function revisits_date_range_graph($iteratorDate) {
        if (!empty($iteratorDate)) {
            $revisitQuery = $this->db->select('count(*) as revisit_count, CAST(`patAdmDate` AS DATE) as revisit_date')
                    ->where("CAST(`patAdmDate` AS DATE)=", $iteratorDate)
                    ->where('`previousRegno`!=', '')
                    ->get('admissiontbl');
            $revisitQueryResult = $revisitQuery->row();
            return array('category' => $revisitQueryResult->revisit_date, 'revisit_count' => $revisitQueryResult->revisit_count);
        }
    }

    public function revisits_monthly_graph($iteratorMonth) {
        if (!empty($iteratorMonth)) {
            //EXTRACT(YEAR_MONTH FROM `discharge_timestamp`)
            $filteredMonth = str_replace('-', '', $iteratorMonth);
            $revisitQuery = $this->db->select('count(*) as revisit_count, EXTRACT(YEAR_MONTH FROM `patAdmDate`) as revisit_date')
                    ->where("EXTRACT(YEAR_MONTH FROM `patAdmDate`)=", $filteredMonth)
                    ->where('`previousRegno`!=', '')
                    ->get('admissiontbl');
            $revisitQueryResult = $revisitQuery->row();
            return array('category' => $revisitQueryResult->revisit_date, 'revisit_count' => $revisitQueryResult->revisit_count);
        }
    }

    public function revisits_yearly_graph($iteratorYear) {
        if (!empty($iteratorYear)) {
            //EXTRACT(YEAR_MONTH FROM `discharge_timestamp`)
            $revisitQuery = $this->db->select('count(*) as revisit_count, EXTRACT(YEAR FROM `patAdmDate`) as revisit_date')
                    ->where("EXTRACT(YEAR FROM `patAdmDate`)=", $iteratorYear)
                    ->where('`previousRegno`!=', '')
                    ->get('admissiontbl');
            $revisitQueryResult = $revisitQuery->row();
            return array('category' => $revisitQueryResult->revisit_date, 'revisit_count' => $revisitQueryResult->revisit_count);
        }
    }

    //=======================================================//
    //       Code for Re-Visit based Graph ends here         //
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//
    //=======================================================//
    //    Code for disease based pie-chart starts here       //
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//


    public function disease_monthly_piechart($month) {
        if (!empty($month)) {

            $filteredMonth = str_replace('-', '', $month);
            $monthlyDiseaseQuery = $this->db->select('count(*) as disease_count, EXTRACT(YEAR_MONTH FROM `patAdmDate`) as date, `disease_name`')
                    ->join('diseasetbl', 'admissiontbl.patDisease_id = diseasetbl.disease_id')
                    ->where("EXTRACT(YEAR_MONTH FROM `patAdmDate`)=", $filteredMonth)
                    ->group_by('patDisease_id')
                    ->get('admissiontbl');
            $monthlyDiseaseResult = $monthlyDiseaseQuery->result_array();
            return $monthlyDiseaseResult;
        }
    }

    public function disease_yearly_piechart($month) {
        if (!empty($month)) {

            $filteredMonth = str_replace('-', '', $month);
            $yearlyDiseaseQuery = $this->db->select('count(*) as disease_count, EXTRACT(YEAR FROM `patAdmDate`) as date, `disease_name`')
                    ->join('diseasetbl', 'admissiontbl.patDisease_id = diseasetbl.disease_id')
                    ->where("EXTRACT(YEAR FROM `patAdmDate`)=", $filteredMonth)
                    ->group_by('patDisease_id')
                    ->get('admissiontbl');
            $yearlyDiseaseResult = $yearlyDiseaseQuery->result_array();
            return $yearlyDiseaseResult;
        }
    }

    //=======================================================//
    //     Code for disease based pie-chart ends here        //
    //                  By Muhammad Arslan                   //
    //                  GitHub: @arslancodes                 //
    //=======================================================//
//=======================================================//
//           Model Code for Ward List starts here        //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    //=============Ward List=============//
    public function get_bed_ward_id_by_cnic($qs) {
        if (!empty($qs)) {

            $query = $this->db->select('patward_id AS wardNo, patbed_id AS bedNo')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            return $query->row();
        }
    }

    public function get_ward_by_id($qs) {
        if (!empty($qs)) {

            $query = $this->db->select('wardName')
                    ->where('wardId', $qs)
                    ->get('wardtbl');
            return $query->row();
        }
    }

    //=============Bed List==============//
    public function get_bed_by_id($qs) {
        if (!empty($qs)) {

            $query = $this->db->select('bedNo')
                    ->where('bedId', $qs)
                    ->get('bedtbl');
            return $query->row();
        }
    }

//=======================================================//
//            Model Code for Ward List ends here         //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
//=======================================================//
//        Model Code for Account Module starts here      //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    //=============Account Details============//
    public function ajax_account_search_by_cnic($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("regNo AS id, patName AS name, patStatus, patNoKType AS patnoktype, patNoK AS patnok")
                    ->like('regNo', $qs)
                    ->or_like('patCNIC', $qs)
                    ->or_like('patName', $qs)
                    ->get('admissiontbl');
            $json1 = $query->result_array();
            $query1 = $this->db->select("regNo AS id, patName AS name, patStatus, patNoKType AS patnoktype, patNoK AS patnok")
                    ->like('regNo', $qs)
                    ->or_like('patCNIC', $qs)
                    ->or_like('patName', $qs)
                    ->get('dischargetbl');
            $json2 = $query1->result_array();
            $json = array_merge($json1, $json2);
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';

        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['name'] . " " . $result['patnoktype'] . " " . $result['patnok'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function get_patirnts_name_by_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('patName', 'patNoKType', 'patNoK')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            $result = $query->row();
            if (!empty($result)) {
                return $result;
            } else {
                $query1 = $this->db->select('patName', 'patNoKType', 'patNoK')
                        ->where('regNo', $qs)
                        ->get('dischargetbl');
                return $query1->row();
            }
        }
    }

    public function check_patient_account($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('count(patientAccountNo) AS counter')
                    ->where('patientRegNo', $qs)
                    ->get('patients_accounttbl');
            return $query->row();
        }
    }

    public function create_patient_account($data) {
        $this->db->insert('patients_accounttbl', $data);
    }

    public function search_result_acc_by_pat_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            return $query->result_array();
        }
    }

    public function search_result_acc_by_dis_pat_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('dischargetbl');
            return $query->result_array();
        }
    }

    public function get_patient_account_no($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('patientAccountNo')
                    ->where('patientRegNo', $qs)
                    ->get('patients_accounttbl');
            return $query->row();
        }
    }

    public function get_payment_sum($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('sum(paymentAmount) AS paymentSum')
                    ->where('patientAccountNo', $qs)
                    ->get('patients_paymenttbl');
            return $query->row();
        }
    }

    public function get_expense_sum($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('sum(expenseAmount) AS expenseSum')
                    ->where('patientAccountNo', $qs)
                    ->get('patients_expensetbl');
            return $query->row();
        }
    }

    public function update_detail_by_account_no($data) {
        $updateArray = array(
            'totalDepositedAmount' => $data['totalDepositedAmount'],
            'runningBill' => $data['runningBill'],
            'remainingAmount' => $data['remainingAmount']
        );
        $id = $data['patientAccountNo'];
        $query = $this->db->set($updateArray)
                ->where('patientAccountNo', $id)
                ->update('patients_accounttbl');
        if ($query) {
            
        }
    }

    public function get_patient_account($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('patientAccountNo', $qs)
                    ->get('patients_accounttbl');
            return $query->row();
        }
    }

    public function get_patient_payments($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('patientAccountNo', $qs)
                    ->get('patients_paymenttbl');
            return $query->result_array();
        }
    }

    public function get_patient_expenses($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('patientAccountNo', $qs)
                    ->get('patients_expensetbl');
            return $query->result_array();
        }
    }

    public function insert_patient_payment($data) {
        return $this->db->insert('patients_paymenttbl', $data);
    }

    //=============Generate Invoice============//
    public function update_account_db($discount, $accountno, $datetimeString, $nowdate) {
        $updateArray = array(
            'discount' => $discount,
            'isInvoiceGenerated' => '1',
            'invoiceGeneratedDate' => $datetimeString,
            'invoiceGeneratedDate1' => $nowdate
        );
        $query = $this->db->set($updateArray)
                ->where('patientAccountNo', $accountno)
                ->update('patients_accounttbl');
        if ($query) {
            
        }
    }

    public function get_expense_sum_by_acc_id($accountno) {
        $query = $this->db->select('*')
                ->where('patientAccountNo', $accountno)
                ->get('patients_accounttbl');
        return $query->row();
    }

    public function insert_invoice_db($data) {
        $this->db->insert('invoicetbl', $data);
    }

    public function get_invoice_no_by_acc_id($accountno) {
        $query = $this->db->select('*')
                ->where('accountNo', $accountno)
                ->get('invoicetbl');
        return $query->row();
    }

    public function get_expense_by_acc_id($accountno) {
        $query = $this->db->select('expenseDescription, count(expenseDescription) AS qty, sum(expenseAmount) AS subtotal')
                ->where('patientAccountNo', $accountno)
                ->group_by('expenseDescription')
                ->get('patients_expensetbl');
        return $query->result_array();
    }

    public function insert_invoice_detail($data) {
        $this->db->insert('invoice_detailtbl', $data);
    }

    //============Generated Invoice=============//
    public function get_invoice_by_acc_id($accountno) {
        $query = $this->db->select('*')
                ->where('accountNo', $accountno)
                ->get('invoicetbl');
        return $query->row();
    }

    public function get_invoice_detail_by_invoice_no($invoiceno) {
        $query = $this->db->select('*')
                ->where('invoiceNo', $invoiceno)
                ->get('invoice_detailtbl');
        return $query->result_array();
    }

    public function get_patient_detail_by_reg_no($qs) {
        $query = $this->db->select('*')
                ->where('regNo', $qs)
                ->get('admissiontbl');
        return $query->row();
    }

    public function get_dischared_patient_detail_by_reg_no($qs) {
        $query = $this->db->select('*')
                ->where('regNo', $qs)
                ->get('dischargetbl');
        return $query->row();
    }

    //=============Search Invoice============//
    public function get_invoice_by_id($qs) {
        $query = $this->db->select('*')
                ->where('invoiceNo', $qs)
                ->get('invoicetbl');
        return $query->row();
    }

    public function ajax_invoice_search_by_no($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("invoiceNo AS id")
                    ->like('invoiceNo', $qs)
                    ->get('invoicetbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';

        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['id'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function get_invoice_by_date($qs) {
        $query = $this->db->select('*')
                ->like('invoiceDateTime', $qs)
                ->order_by("invoiceNo", "asc")
                ->get('invoicetbl');
        return $query->result_array();
    }

    public function update_account_refund_db($accountno, $refundamount) {
        $updateArray = array(
            'refundableAmount' => $refundamount
        );
        $query = $this->db->set($updateArray)
                ->where('patientAccountNo', $accountno)
                ->update('patients_accounttbl');
        if ($query) {
            
        }
    }

    //=============Outstanding Patients============//
    public function get_accounts() {
        $query = $this->db->select('*')
                ->where('isInvoiceGenerated', 0)
                ->get('patients_accounttbl');
        return $query->result_array();
    }

    public function get_discharged_pat_pic($id) {
        if (!empty($id)) {
            $query = $this->db->select("patient_pic_path")
                    ->where('regNo', $id)
                    ->get('dischargetbl');
            return $query->row();
        } else {
            echo "Invalid Paramenter supplied";
        }
    }

    //=============Hospital Expense============//
    public function ajax_search_category_by_no($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("categoryNo AS id, categoryName AS name")
                    ->like('categoryName', $qs)
                    ->get('expense_categorytbl');
            $json = $query->result_array();
        } else {
            $query = $this->db->select("categoryNo AS id, categoryName AS name")
                    ->get('expense_categorytbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';

        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['name'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function insert_expense($data) {
        $this->db->insert('hospital_expensetbl', $data);
    }

    public function get_expense_list_by_daterange($sdate, $edate) {
        $query = $this->db->select('*')
                ->where('expDate >=', $sdate)
                ->where('expDate <=', $edate)
                ->order_by('expDate asc, expTime asc')
                ->get('hospital_expensetbl');
        return $query->result_array();
    }

    public function get_expense_category_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('categoryNo', $qs)
                    ->get('expense_categorytbl');
            return $query->row();
        }
    }

    public function get_expense_by_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('expNo', $qs)
                    ->get('hospital_expensetbl');
            return $query->row();
        }
    }

    public function get_category_list() {
        $query = $this->db->select('*')
                ->get('expense_categorytbl');
        return $query->result_array();
    }

    public function update_expense_by_no($expno, $category, $datestring, $timestring, $description, $amount, $nowdate, $nowtime) {
        $updateArray = array(
            'expCategNo' => $category,
            'expDateString' => $datestring,
            'expTimeString' => $timestring,
            'expDescription' => $description,
            'expAmount' => $amount,
            'expDate' => $nowdate,
            'expTime' => $nowtime
        );
        $query = $this->db->set($updateArray)
                ->where('expNo', $expno)
                ->update('hospital_expensetbl');
        if ($query) {
            return 1;
        }
    }

    public function delete_exp($exp_id) {
        $query = $this->db->delete('hospital_expensetbl', array('expNo' => $exp_id));
        if ($query) {
            echo "Successfully!";
        } else {
            echo "Failed!";
        }
    }

    public function update_print_exp($expno) {
        $updateArray = array(
            'expIsPrint' => 1
        );
        $query = $this->db->set($updateArray)
                ->where('expNo', $expno)
                ->update('hospital_expensetbl');
        if ($query) {
            return 1;
        }
    }

//=======================================================//
//         Model Code for Account Module ends here       //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
//=======================================================//
//       Model Code for OT Form Module starts here       //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    public function check_record_is_exist($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('pre_op_fitnesstbl');
            return $query->row();
        }
    }

    public function get_regno_otbookingno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('otPatNo AS regNo')
                    ->where('otBookingNo', $qs)
                    ->get('operationtheatretbl');
            return $query->row();
        }
    }

    public function insert_pre_op_fitness($data) {
        $this->db->insert('pre_op_fitnesstbl', $data);
    }

    public function get_pre_op_fitness_by_otno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('pre_op_fitnesstbl');
            return $query->row();
        }
    }

    public function update_pre_op_fitness_db($data, $id) {
        $updateArray = array(
            'anesthetistRemarks' => $data['anesthetistRemarks'],
            'anesthetistAdvice' => $data['anesthetistAdvice'],
            'anesthetistName' => $data['anesthetistName'],
            'physicianRemarks' => $data['physicianRemarks'],
            'physicianAdvice' => $data['physicianAdvice'],
            'physicianName' => $data['physicianName'],
            'anyOther' => $data['anyOther'],
            'isSave' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('preOpFNo', $id)
                ->update('pre_op_fitnesstbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function check_pre_op_order_record_is_exist($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('preoperative_ordertbl');
            return $query->row();
        }
    }

    public function insert_pre_op_order($data) {
        $this->db->insert('preoperative_ordertbl', $data);
    }

    public function get_pre_op_order_by_otno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('preoperative_ordertbl');
            return $query->row();
        }
    }

    public function get_add_discharge_patient_by_reg_no($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            $result = $query->row();
            if (!empty($result)) {
                return $result;
            } else {
                $query1 = $this->db->select('*')
                        ->where('regNo', $qs)
                        ->get('dischargetbl');
                return $query1->row();
            }
        }
    }

    public function update_pre_op_order_db($data, $id) {
        $updateArray = array(
            'dateString' => $data['dateString'],
            'marksIdentification1' => $data['marksIdentification1'],
            'marksIdentification2' => $data['marksIdentification2'],
            'operationSite' => $data['operationSite'],
            'operationSideMarked' => $data['operationSideMarked'],
            'giveBath' => $data['giveBath'],
            'markOperationSite' => $data['markOperationSite'],
            'provideHospitalDress' => $data['provideHospitalDress'],
            'areaName' => $data['areaName'],
            'npoFormTime' => $data['npoFormTime'],
            'arrangeBlood' => $data['arrangeBlood'],
            'sendFInvestigationOt' => $data['sendFInvestigationOt'],
            'preMedication' => $data['preMedication'],
            'sendPatientOtTime' => $data['sendPatientOtTime'],
            'anyOtherOrder' => $data['anyOtherOrder'],
            'laproscopicUse' => $data['laproscopicUse'],
            'diathermyUse' => $data['diathermyUse'],
            'tourniquetUse' => $data['tourniquetUse'],
            'xRayUse' => $data['xRayUse'],
            'laserUse' => $data['laserUse'],
            'doctorName' => $data['doctorName'],
            'isSave' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('preOpONo', $id)
                ->update('preoperative_ordertbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function check_surgical_checklist_record_is_exist($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('surgical_checklisttbl');
            return $query->row();
        }
    }

    public function insert_surgical_checklist($data) {
        $this->db->insert('surgical_checklisttbl', $data);
    }

    public function get_surgical_checklist_by_otno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('surgical_checklisttbl');
            return $query->row();
        }
    }

    public function update_surgical_checklist_db($data, $id) {
        $updateArray = array(
            'dateString' => $data['dateString'],
            'checkbox1' => $data['checkbox1'],
            'checkbox2' => $data['checkbox2'],
            'checkbox3' => $data['checkbox3'],
            'radio4' => $data['radio4'],
            'radio5' => $data['radio5'],
            'radio6' => $data['radio6'],
            'checkbox7' => $data['checkbox7'],
            'checkbox8' => $data['checkbox8'],
            'checkbox9' => $data['checkbox9'],
            'checkbox10' => $data['checkbox10'],
            'checkbox11' => $data['checkbox11'],
            'checkbox12' => $data['checkbox12'],
            'checkbox13' => $data['checkbox13'],
            'checkbox14' => $data['checkbox14'],
            'checkbox15' => $data['checkbox15'],
            'checkbox16' => $data['checkbox16'],
            'checkbox17' => $data['checkbox17'],
            'checkbox18' => $data['checkbox18'],
            'checkbox19' => $data['checkbox19'],
            'checkbox20' => $data['checkbox20'],
            'checkbox21' => $data['checkbox21'],
            'checkbox22' => $data['checkbox22'],
            'checkbox23' => $data['checkbox23'],
            'checkbox24' => $data['checkbox24'],
            'checkbox25' => $data['checkbox25'],
            'isSave' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('surgicalSCNo', $id)
                ->update('surgical_checklisttbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function check_post_operative_instructions_record_is_exist($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('post_operative_instructionstbl');
            return $query->row();
        }
    }

    public function get_post_operative_instructions_by_otno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('post_operative_instructionstbl');
            return $query->row();
        }
    }

    public function insert_post_operative_instructions($data) {
        $this->db->insert('post_operative_instructionstbl', $data);
    }

    public function update_post_operative_instructions_db($data, $id) {
        $updateArray = array(
            'dateString' => $data['dateString'],
            'forRecoveryArea' => $data['forRecoveryArea'],
            'fluids' => $data['fluids'],
            'antibiotics' => $data['antibiotics'],
            'analgesics' => $data['analgesics'],
            'specialInstructions' => $data['specialInstructions'],
            'instructionsForPathological' => $data['instructionsForPathological'],
            'doctorName' => $data['doctorName'],
            'isSave' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('postOpINo', $id)
                ->update('post_operative_instructionstbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function update_post_operative_instructions_nurse_db($data, $id) {
        $updateArray = array(
            'dateString' => $data['dateString'],
            'bloodLoss' => $data['bloodLoss'],
            'bloodTransfusion' => $data['bloodTransfusion'],
            'ivFluids' => $data['ivFluids'],
            'urineOutput' => $data['urineOutput'],
            'sawbOrInstruments' => $data['sawbOrInstruments'],
            'nurseName' => $data['nurseName'],
            'isSave' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('postOpINo', $id)
                ->update('post_operative_instructionstbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function user_verify_is_nurse($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->like('desig', 'nurse')
                    ->where('id', $qs)
                    ->get('users');
            return $query->row();
        }
    }

    public function check_protocol_receiving_patient_ot_record_is_exist($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('receiving_patient_ottbl');
            return $query->row();
        }
    }

    public function insert_protocol_receiving_patient_ot($data) {
        $this->db->insert('receiving_patient_ottbl', $data);
    }

    public function get_protocol_receiving_patient_ot_by_otno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('receiving_patient_ottbl');
            return $query->row();
        }
    }

    public function update_protocol_receiving_patient_ot_db($data, $id) {
        $updateArray = array(
            'dateString' => $data['dateString'],
            'houseOfficerId' => $data['houseOfficerId'],
            'nurseId' => $data['nurseId'],
            'documentsReceived' => $data['documentsReceived'],
            'patientCategory' => $data['patientCategory'],
            'patientAlertness' => $data['patientAlertness'],
            'pulseDoctor' => $data['pulseDoctor'],
            'bpDoctor' => $data['bpDoctor'],
            'tempDoctor' => $data['tempDoctor'],
            'rrDoctor' => $data['rrDoctor'],
            'gcsDoctor' => $data['gcsDoctor'],
            'cvpDoctor' => $data['cvpDoctor'],
            'pulseNurse' => $data['pulseNurse'],
            'bpNurse' => $data['bpNurse'],
            'tempNurse' => $data['tempNurse'],
            'rrNurse' => $data['rrNurse'],
            'gcsNurse' => $data['gcsNurse'],
            'cvpNurse' => $data['cvpNurse'],
            'statusOfDrains' => $data['statusOfDrains'],
            'biopsySpecimen' => $data['biopsySpecimen'],
            'biopsySpecimenReason' => $data['biopsySpecimenReason'],
            'dressing' => $data['dressing'],
            'bloodTransfusion' => $data['bloodTransfusion'],
            'operationNotesOrdersChecked' => $data['operationNotesOrdersChecked'],
            'isSave' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('recPatOtNo', $id)
                ->update('receiving_patient_ottbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function check_consent_op_record_is_exist($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('consent_operationtbl');
            return $query->row();
        }
    }

    public function update_consent_op_db($data, $id) {
        $updateArray = array(
            'dateString' => $data['dateString'],
            'isSave' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('consentOpNo', $id)
                ->update('consent_operationtbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function insert_consent_op($data) {
        $this->db->insert('consent_operationtbl', $data);
    }

    public function get_consent_op_by_otno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('consent_operationtbl');
            return $query->row();
        }
    }

    public function get_nurse_list_for_ot_form() {
        $query = $this->db->select('*')
                ->like('desig', 'nurse')
                ->get('users');
        return $query->result_array();
    }

//=======================================================//
//         Model Code for OT Form Module ends here       //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
//=======================================================//
//       Model Code for Pharmacy Module starts here      //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    //============Products============//
    public function insert_product_db($data) {
        return $this->db->insert('producttbl', $data);
    }

    public function get_products_category() {
        $query = $this->db->select('*')
                ->get('product_categorytbl');
        return $query->result_array();
    }

    public function ajax_search_by_product_code($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("productNo AS id, productName AS name, productFormulation AS formulation")
                    ->like('productCode', $qs)
                    ->where('isdeleted', '0')
                    ->get('producttbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            // echo '	"text": "' . $result['name'] . " (" . $result['formulation']. ')"' . "\n";
            echo '	"text": "' . $result['name'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function ajax_search_by_product_name($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("productNo AS id, productName AS name, productFormulation AS formulation")
                    ->like('productName', $qs)
                    ->where('isdeleted', '0')
                    ->get('producttbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            // echo '	"text": "' . $result['name'] . " (" . $result['formulation']. ')"' . "\n";
            echo '	"text": "' . $result['name'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function ajax_search_by_product_categ() {
        //?_type=query&q=page
        $json = [];
        $query = $this->db->select("categNo AS id, categName AS name")
                ->get('product_categorytbl');
        $json = $query->result_array();
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            // echo '	"text": "' . $result['name'] . " (" . $result['formulation']. ')"' . "\n";
            echo '	"text": "' . $result['name'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function search_product_by_id($qs) {
        $query = $this->db->select('*')
                ->where('productNo', $qs)
                ->where('isDeleted', '0')
                ->get('producttbl');
        return $query->result_array();
    }

    public function get_product_category_by_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('categNo', $qs)
                    ->get('product_categorytbl');
            return $query->row();
        }
    }

    public function search_product_by_categ($qs) {
        $query = $this->db->select('*')
                ->where('productCategory', $qs)
                ->where('isdeleted', '0')
                ->get('producttbl');
        return $query->result_array();
    }

    public function get_product_by_id($qs) {
        $query = $this->db->select('*')
                ->where('productNo', $qs)
                ->get('producttbl');
        return $query->row();
    }

    public function update_product_db($data, $id) {
        $updateArray = array(
            'productCode' => $data['productCode'],
            'productName' => $data['productName'],
            'productFormulation' => $data['productFormulation'],
            'productMg' => $data['productMg'],
            'productPurchasePrice' => $data['productPurchasePrice'],
            'productSalePrice' => $data['productSalePrice'],
            'productCategory' => $data['productCategory'],
            'productUnit' => $data['productUnit'],
            'productQty' => $data['productQty'],
            'productLocation' => $data['productLocation'],
            'productBarcode' => $data['productBarcode'],
            'productManufacture' => $data['productManufacture'],
            'productSupplier' => $data['productSupplier'],
            'productReorderLevel' => $data['productReorderLevel'],
            'productExpireDate' => $data['productExpireDate'],
            'productStatus' => $data['productStatus']
        );
        $query = $this->db->set($updateArray)
                ->where('productNo', $id)
                ->update('producttbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    //============Prescription============//
    public function ajax_search_ot_by_patient_name($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("otPatNo AS id, otPatName AS name, otIsOperated AS status")
                    ->like('otPatNo', $qs)
                    ->or_like('otPatName', $qs)
                    ->get('operationtheatretbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            if ($result['status'] == 0) {
                $tempArray = $this->get_patient_name_by_id($result['id']);

                echo $braces . " {\n";
                echo '  "id": "' . $result['id'] . '",' . "\n";
                echo '	"text": "' . $tempArray->patName . " " . $tempArray->patNoKType . " " . $tempArray->patNoK . '"' . "\n";
                $braces = ",\n";
                echo "}\n";
            }
        }
        echo "]";
    }

    public function get_patient_by_id($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            return $query->result_array();
        }
    }

    public function ajax_search_product_by_name($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("productNo AS id, productName AS name, productFormulation AS formulation")
                    ->like('productName', $qs)
                    ->where('isdeleted', '0')
                    ->where('productStatus', '1')
                    ->get('producttbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['name'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function ajax_get_product_by_no($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("*")
                    ->where('productNo', $qs)
                    ->get('producttbl');
            $json = $query->result_array();
            $parsed_json = json_encode($json);
            return $parsed_json;
        }
        //echo json_encode($json);
        // print_r($json);
//        echo "[";
//        $braces = '';
//        foreach ($json as $result) {
//            echo $braces . " {\n";
//            echo '  "id": "' . $result['id'] . '",' . "\n";
//            echo '	"text": "' . $result['name'] . '"' . "\n";
//            $braces = ",\n";
//            echo "}\n";
//        }
//        echo "]";
    }

    public function delete_product_by_id($id) {
        $updateArray = array(
            'isDeleted' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('productNo', $id)
                ->update('producttbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function insert_prescription_db($data) {
        return $this->db->insert('prescriptiontbl', $data);
    }

    public function insert_prescription_des_db($data) {
        return $this->db->insert('prescription_descriptiontbl', $data);
    }

    public function get_prescription_last_no() {
        $query = $this->db->select('rxNo')
                ->order_by('rxNo', 'desc')
                ->get('prescriptiontbl');
        return $query->row();
    }

    public function update_product_qty_db($id, $updateQty, $qty) {
        $productList = $this->get_product_by_id($id);
        $soldQty = $productList->productSoldQty + $qty;
        $updateArray = array(
            'productQty' => $updateQty,
            'productSoldQty' => $soldQty
        );
        $query = $this->db->set($updateArray)
                ->where('productNo', $id)
                ->update('producttbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function get_patient_account_no_by_regno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('patientAccountNo')
                    ->where('patientRegNo', $qs)
                    ->get('patients_accounttbl');
            return $query->row();
        }
    }

    public function insert_expense_db($data) {
        return $this->db->insert('patients_expensetbl', $data);
    }

    public function ajax_search_rx_by_no($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("rxNo AS id")
                    ->like('rxNo', $qs)
                    ->get('prescriptiontbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['id'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function search_rx_by_id($qs) {
        $query = $this->db->select('*')
                ->where('rxNo', $qs)
                ->get('prescriptiontbl');
        return $query->row();
    }

    public function search_rxs_by_id($qs) {
        $query = $this->db->select('*')
                ->where('rxNo', $qs)
                ->get('prescriptiontbl');
        return $query->result_array();
    }

    public function get_patient_by_id_for_rx($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            $result = $query->result_array();
            if (!empty($result)) {
                return $result;
            } else {
                $query1 = $this->db->select('*')
                        ->where('regNo', $qs)
                        ->get('dischargetbl');
                return $query1->result_array();
            }
        }
    }

    public function search_rx_des_by_id($qs) {
        $query = $this->db->select('*')
                ->where('rxNo', $qs)
                ->get('prescription_descriptiontbl');
        return $query->result_array();
    }

    public function search_rxs_by_regno($qs) {
        $query = $this->db->select('*')
                ->where('regNo', $qs)
                ->get('prescriptiontbl');
        return $query->result_array();
    }

    public function ajax_search_rx_by_patient_name($qs) {
        //?_type=query&q=page
        $json = [];
        if (!empty($qs)) {
            $query = $this->db->select("regNo AS id, patName AS name, patNoKType AS type, patNoK AS nok")
                    ->like('regNo', $qs)
                    ->or_like('patName', $qs)
                    ->group_by('regNo')
                    ->get('prescriptiontbl');
            $json = $query->result_array();
        }
        //echo json_encode($json);
        // print_r($json);
        echo "[";
        $braces = '';
        foreach ($json as $result) {
            echo $braces . " {\n";
            echo '  "id": "' . $result['id'] . '",' . "\n";
            echo '	"text": "' . $result['name'] . " " . $result['type'] . " " . $result['nok'] . '"' . "\n";
            $braces = ",\n";
            echo "}\n";
        }
        echo "]";
    }

    public function update_prescription_db($data, $rxNo) {
        $updateArray = array(
            'subTotal' => $data['subTotal'],
            'discount' => $data['discount'],
            'total' => $data['total'],
            'returnedAmount' => $data['returnedAmount']
        );
        $query = $this->db->set($updateArray)
                ->where('rxNo', $rxNo)
                ->update('prescriptiontbl');
        if ($query) {
            echo "Successfully Updated update_prescription_db!";
        } else {
            echo "Updating prescriptiontbl Failed!";
        }
    }

    public function update_expense_db($expenseAmount, $rxNo) {
        $updateArray = array(
            'expenseAmount' => $expenseAmount
        );
        $query = $this->db->set($updateArray)
                ->where('expense_tblNameId', $rxNo)
                ->where('expense_tblName', 'prescriptiontbl')
                ->update('patients_expensetbl');
        if ($query) {
            echo "Successfully Updated update_expense_db!";
        } else {
            echo "Updating Expense Failed!";
        }
    }

    public function update_prescription_des_db($data) {
        $saleQty = $data['productSaleQty'] - $data['productReturnQty'];
        $updateArray = array(
            'productSaleQty' => $saleQty,
            'productReturnQty' => $data['productReturnQty'],
            'productTotalAmount' => $data['productTotalAmount']
        );
        $id = $data['rxDesNo'];
        $query = $this->db->set($updateArray)
                ->where('rxDesNo', $id)
                ->update('prescription_descriptiontbl');
        if ($query) {
            echo "Successfully Updated update_prescription_des_db!";
        } else {
            echo "Updating prescriptiontbl Failed!";
        }
    }

    public function get_product_qty_db($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('productNo', $qs)
                    ->get('producttbl');
            return $query->row();
        }
    }

    public function update_return_product_qty_db($id, $avaliableQty, $soldQty) {
        $updateArray = array(
            'productQty' => $avaliableQty,
            'productSoldQty' => $soldQty
        );
        $query = $this->db->set($updateArray)
                ->where('productNo', $id)
                ->update('producttbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function get_products_stock_alert() {
        $query = $this->db->select('*')
                ->where('isDeleted', '0')
                ->where('isDismiss', '0')
                ->get('producttbl');
        return $query->result_array();
    }

    public function order_product_by_id($id) {
        $updateArray = array(
            'productOrderStatus' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('productNo', $id)
                ->update('producttbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function dismiss_product_by_id($id) {
        $updateArray = array(
            'isDismiss' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('productNo', $id)
                ->update('producttbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function purchase_product_by_id($id, $qty) {
        $updateArray = array(
            'productQty' => $qty,
            'productOrderStatus' => '0',
            'isDismiss' => '0'
        );
        $query = $this->db->set($updateArray)
                ->where('productNo', $id)
                ->update('producttbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Product Failed!";
        }
    }

    public function get_rx_by_no($qs) {
        $query = $this->db->select('*')
                ->where('rxNo', $qs)
                ->get('prescriptiontbl');
        return $query->row();
    }

    public function get_rx_des_by_no($qs) {
        $query = $this->db->select('*')
                ->where('rxNo', $qs)
                ->get('prescription_descriptiontbl');
        return $query->result_array();
    }

    public function get_patient_by_regno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            $result = $query->row();
            if (!empty($result)) {
                return $result;
            } else {
                $query = $this->db->select('*')
                        ->where('regNo', $qs)
                        ->get('dischargetbl');
                return $query->row();
            }
        }
    }

//=======================================================//
//        Model Code for Pharmacy Module ends here       //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
//=======================================================//
//   Model Code for Side Rooms Cost Module starts here   //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//
    public function get_patient_side_room_date($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('admissiontbl');
            $result = $query->row();
            return $result;
        }
    }

    public function get_side_room_price() {
        $query = $this->db->select('rate')
                ->where('rateId', '1')
                ->get('sideroomsrate');
        return $query->row();
    }

    public function update_side_Room_Date($data, $id) {
        $updateArray = array(
            'sideRoomDate' => $data
        );
        $query = $this->db->set($updateArray)
                ->where('regNo', $id)
                ->update('admissiontbl');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Date Failed!";
        }
    }

//=======================================================//
//    Model Code for Side Rooms Cost Module ends here    //
//                  By Muhammad Binyameen                //
//                  GitHub: @imBinyameen                 //
//=======================================================//




    public function update_vital($vitals, $vitalId) {
        $query = $this->db->set($vitals)
                ->where('vital_id', $vitalId)
                ->update('vitals_sheettbl');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function save_vital($vitaldata) {
        $query = $this->db->insert('vitals_sheettbl', $vitaldata);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }

    public function get_all_vitals($regno) {
        $query = $this->db->select('*')
                ->where('regNo', $regno)
                ->get('vitals_sheettbl');
        return $query->result();
    }

    public function get_post_op_dat($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otPatNo', $qs)
                    ->get('operationtheatretbl');
            return $query->result_array();
        }
    }

    public function get_pre_op_fitness_for_print($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('pre_op_fitnesstbl');
            return $query->row();
        }
    }

    public function get_pre_op_order_for_print($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('preoperative_ordertbl');
            return $query->row();
        }
    }

    public function get_post_operative_instructions_for_print($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('post_operative_instructionstbl');
            return $query->row();
        }
    }

    public function check_checklist_record_is_exist($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('pre_op_checklist');
            return $query->row();
        }
    }

    public function insert_preop_checklist($data) {
        $this->db->insert('pre_op_checklist', $data);
    }

    public function get_pre_op_checklist_by_otno($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('otBookingNo', $qs)
                    ->get('pre_op_checklist');
            return $query->row();
        }
    }

    public function update_pre_op_checklist_db($data, $id) {
        $updateArray = array(
            'filled_by_dr' => $data['filled_by_dr'],
            'operation_planned' => $data['operation_planned'],
            'checkList_date' => $data['checkList_date'],
            'informed_consent' => $data['informed_consent'],
            'diagnosis' => $data['diagnosis'],
            'surgeon' => $data['surgeon'],
            'checklist_bp' => $data['checklist_bp'],
            'checklist_pulse' => $data['checklist_pulse'],
            'chehcklist_temp' => $data['chehcklist_temp'],
            'checklist_rep_rate' => $data['checklist_rep_rate'],
            'checklist_npo' => $data['checklist_npo'],
            'givebath' => $data['givebath'],
            'hospital_dress' => $data['hospital_dress'],
            'shave' => $data['shave'],
            'checklist_hb' => $data['checklist_hb'],
            'checklist_esr' => $data['checklist_esr'],
            'checklist_sNa' => $data['checklist_sNa'],
            'check_sK' => $data['check_sK'],
            'checklist_sCa' => $data['checklist_sCa'],
            'checklist_pt' => $data['checklist_pt'],
            'checklist_aptt' => $data['checklist_aptt'],
            'checklist_tlc' => $data['checklist_tlc'],
            'checklist_rbs' => $data['checklist_rbs'],
            'checklist_HBsAg' => $data['checklist_HBsAg'],
            'anti_HCV' => $data['anti_HCV'],
            'diabatic_status' => $data['diabatic_status'],
            'hypertenstion_status' => $data['hypertenstion_status'],
            'checklist_ECG' => $data['checklist_ECG'],
            'checklist_anyother' => $data['checklist_anyother'],
            'biopsy' => $data['biopsy'],
            'lopogram' => $data['lopogram'],
            'chalangiogram' => $data['chalangiogram'],
            'checklist_ct_mri' => $data['checklist_ct_mri'],
            'checklist_fnac' => $data['checklist_fnac'],
            'chekclist_us' => $data['chekclist_us'],
            'checklist_cxr' => $data['checklist_cxr'],
            'si_ivu' => $data['si_ivu'],
            'si_anyother' => $data['si_anyother'],
            'checklist_radio1' => $data['checklist_radio1'],
            'checklist_radio2' => $data['checklist_radio2'],
            'checklist_radio3' => $data['checklist_radio3'],
            'checklist_radio4' => $data['checklist_radio4'],
            'checklist_radio5' => $data['checklist_radio5'],
            'checklist_radio6' => $data['checklist_radio6'],
            'checklist_radio7' => $data['checklist_radio7'],
            'checklist_radio8' => $data['checklist_radio8'],
            'isSave' => '1'
        );
        $query = $this->db->set($updateArray)
                ->where('preOpCLid', $id)
                ->update('pre_op_checklist');
        if ($query) {
            echo "Successfully Updated!";
        } else {
            echo "Updating Operation Theatre Failed!";
        }
    }

    public function get_pre_op_checklist_for_print($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('pre_op_checklist');
            return $query->row();
        }
    }
    
    public function daily_report_insert($data) {
        return $this->db->insert('daily_reporttbl', $data);
    }
    public function blood_sugar_view($qs) {
        if (!empty($qs)) {
            $query = $this->db->select('*')
                    ->where('regNo', $qs)
                    ->get('blood_sugartbl');
            return $query->result_array();
        }
    }
    
    public function save_blood_sugar_report($data) {
        $query = $this->db->insert('blood_sugartbl', $data);
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    public function update_blood_sugar($data, $id) {
        $query = $this->db->set($data)
                ->where('id', $id)
                ->update('blood_sugartbl');
        if ($query) {
            return true;
        } else {
            return false;
        }
    }
    
    public function delete_blood_sugar_report($Id) {
        $query = $this->db->delete('blood_sugartbl', array('id' => $Id));
        if ($query) {
            echo "Vitals Record has been deleted successfully! " . $Id;
        } else {
            echo "Vitals Record deletion failed!";
        }
    }

    public function get_wards(){
        $this->db->select('wardtbl.*');
        $this->db->from('wardtbl');
        $result = $this->db->get();
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_cities(){
        $this->db->select('*');
        $this->db->from('cities');
        $result = $this->db->get();
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_disease_names(){
        $this->db->select('*');
        $this->db->from('diseasetbl');
        $result = $this->db->get();
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_available_beds($ward_id){
        $result = $this->db->select("bedId AS id, bedNo AS name, bedStatus AS status")
                ->where('wardId', $ward_id)
                ->where('bedStatus!=', 'Blocked')
                ->where('bedStatus!=', 'Occupied')
                ->where('bedStatus!=', 'Occupied Extra Bed')
                ->get('bedtbl');

        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }

    public function get_patients($filter) {
        if(isset($filter['search_by_name'])){
            $name =  $filter['search_by_name'];
        }else{
            $name = 0;
        }
        if(isset($filter['search_by_ward'])){
            $ward =  $filter['search_by_ward'];
        }else{
            $ward = 0;
        }
        if(isset($filter['search_by_gender']) && !empty($filter['search_by_gender'])){
            $fgender =  $filter['search_by_gender'];
            $gender = 1;
        }else{
            $fgender='';
            $gender = 0;
        }
        if(isset($filter['search_by_from_date'])&& !empty($filter['search_by_to_date'])){
            $from =  $filter['search_by_from_date'];
        }else{
            $from = 0;
        }

        if(isset($filter['search_by_to_date']) && !empty($filter['search_by_to_date'])){
            $to =  $filter['search_by_to_date'];
        }else{
            $to = 0;
        }

       $sql = "SELECT * FROM admissiontbl 
                WHERE 1
                AND ($name=0   OR regNo = $name)
                AND ($ward=0  OR patward_id = $ward)
                AND ($gender=0  OR patSex = '$fgender')
                AND ($from=0  OR patAdmDate BETWEEN '$from' AND '$to')
               ";
        $result = $query = $this->db->query($sql);
        if($result) {
            return $result->result_array();
        } else {
            return array();
        }
    }


    public function get_patient_byid($id) {
        $this->db->select('*');
        $this->db->from('admissiontbl');
        $this->db->where('regNo',$id);
        $this->db->limit(1);
        $result = $this->db->get();
        if($result) {
            return $result->row_array();
        } else {
            return array();
        }
    }

}
