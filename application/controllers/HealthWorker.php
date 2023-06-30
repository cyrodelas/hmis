<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HealthWorker extends CI_Controller {

    var $system_menu = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("UserAccessModel");

        $result = $this->UserAccessModel->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];

    }

     public function dashboard(){
		$data = $this->system_menu;
		$this->load->view('pages/healthworker/dashboard', $data);
	}


}