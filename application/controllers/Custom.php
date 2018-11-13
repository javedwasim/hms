<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Custom extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('custom_model');
    }
    function set_menu_id(){
        $id = $this->input->post('id');
        $this->session->set_userdata('menu_id',$id);
    } 
}
