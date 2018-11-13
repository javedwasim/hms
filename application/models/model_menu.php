<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class model_menu extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->database('hmsdb');

    }

    function index()
    {

        $this->db->select("*");
        $this->db->from("menu_parent");
        $q = $this->db->get();

        $final = array();
        if ($q->num_rows() > 0) {
            foreach ($q->result() as $row) {

                $this->db->select("*");
                $this->db->from("menu_child");
                $this->db->where("fk_parent_menu_id", $row->menu_id);
                $q = $this->db->get();
                $sub = array();
                if ($q->num_rows() > 0) {
                    $row->children = $q->result();
//                     foreach ($row->children as $item){
  //                       $sub = $this->submenu($item->child_menu_id);
//                         if(is_object($sub)) {
//                            $arr = array_push($row->children, $sub);
//                            //print_r($arr);
//                         }
//                     }
                }
                array_push($final, $row);

            }
        }
        return $final;
    }

    public function submenu($menuId)
    {
        $this->db->select("*");
        $this->db->from("menu_sub_child");
        $this->db->where("subchildfk", $menuId);
        $q = $this->db->get();
        if($q->num_rows() > 0) {
            $submenu = $q->result_array();
            if (!empty($submenu)) {
                return $submenu;
            }
        }
    }
}

?>