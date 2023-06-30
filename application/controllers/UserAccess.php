<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class UserAccess extends CI_Controller {

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
	
	
	
	public function index()
	{
		$this->load->view('Login');
	}


    public function validate_login()
    {

        $this->form_validation->set_rules('username', 'Username', 'required|max_length[225]');
        $this->form_validation->set_rules('password', 'Password', 'required|max_length[225]');

        if ($this->form_validation->run() == TRUE) {

            $result = $this->UserAccessModel->validate_login();

            if ($result['success'] == TRUE) {
                
                $account_data = array(
                    'user_id' => $result['user_id'],
                    'user_role' => $result['user_role'],
                    'user_fn' => $result['user_fn'],
                    'user_ln' => $result['user_ln'],
                    'user_PID' => $result['user_PID'],
                    'user_EID' => $result['user_EID'],
                    'user_image' => $result['user_image'],
                    'logged_in' => TRUE
                );

                $this->session->set_userdata($account_data);

                $this->session->set_flashdata("success", "login sucess");
                
                if($this->session->user_role=='Patient'){
                    redirect("dashboard-patient", "refresh");
                }

                if($this->session->user_role=='Health Worker'){
                    redirect("dashboard-healthworker", "refresh");
                }

                if($this->session->user_role=='Administrator'){
                    redirect("dashboard-admin", "refresh");
                }
                
            
            
            } else {

                $message = "Invalid form request.";
				echo "<script type='text/javascript'>alert('$message');</script>";

            }
            
            if ($result['success'] == FALSE) {
                redirect("UserAccess", "refresh");
            }

        
        }
    
    }
	

    public function signup(){
        $this->load->view('signup');
    }

    public function forgot(){
        $this->load->view('forgot');
    }

}