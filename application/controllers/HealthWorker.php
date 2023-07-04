<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class HealthWorker extends CI_Controller {

    var $system_menu = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("UserAccessModel");
        $this->load->model("HealthWorkerModel");

        $result = $this->UserAccessModel->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];

    }

    public function dashboard(){
		$data = $this->system_menu;
		$this->load->view('pages/healthworker/dashboard', $data);
	}

    public function patientList(){
		$data = $this->system_menu;
        $hw = $this->session->user_HW;
        $query = $this->HealthWorkerModel->getPatientList($hw);
		$data['patientData'] = $query;
		$this->load->view('pages/healthworker/patientList', $data);
	}

    public function patientInformationView($patientID){
        $data = $this->system_menu;

        $hw = $this->session->user_HW;
        
        $query = $this->HealthWorkerModel->getPatientInformation($patientID);
		$data['personalData'] = $query;
        
        $query = $this->HealthWorkerModel->getBarangayData($hw);
		$data['bgData'] = $query;
        $query = $this->HealthWorkerModel->getReligionData();
		$data['relData'] = $query;
		$this->load->view('pages/healthworker/patientInformationView', $data);

    }

    public function patientInformationUpdate($patientID){
        $data = $this->system_menu;

        $hw = $this->session->user_HW;
        
        $query = $this->HealthWorkerModel->getPatientInformation($patientID);
		$data['personalData'] = $query;
        
        $query = $this->HealthWorkerModel->getBarangayData($hw);
		$data['bgData'] = $query;
        $query = $this->HealthWorkerModel->getReligionData();
		$data['relData'] = $query;
		$this->load->view('pages/healthworker/patientInformationUpdate', $data);

    }


    public function patientInformationAdd(){
        $data = $this->system_menu;

        $hw = $this->session->user_HW;
        $query = $this->HealthWorkerModel->getBarangayData($hw);
		$data['bgData'] = $query;
        $query = $this->HealthWorkerModel->getReligionData();
		$data['relData'] = $query;
		$this->load->view('pages/healthworker/patientInformationAdd', $data);
    }

    public function addPatientData(){

        $maxID = $this->HealthWorkerModel->getPatientID();

        foreach($maxID as $rs){
            $patientID = $rs->mPatient + 1;
        }
        
        $result = $this->HealthWorkerModel->addPatientInformation($patientID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("patientList", "refresh");
    }

    public function UpdatePatientData(){

        $PID = $this->input->post('patientNumber', true);

	    $result = $this->HealthWorkerModel->updatePatientInformation($PID);
	    if($result['result']==true){
           
            //Update User Info table

            if (!empty($_FILES['Filename']['name'])) {
                $img_filename = $_FILES['Filename']['name'];
                $field = 'Filename';
                $file_path = './assets/images/patient/';
                $this->do_upload_images($img_filename, $field, $file_path);
            }

            $message = "Update data successfully.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        } else {
            $message = "Error in updating data.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
        redirect("patientList", "refresh");
    }

    public function deletePatient($delete_ID){
        $result = $this->HealthWorkerModel->deletepatientRecords($delete_ID);
        if($result['result']==true){
            $message = "Delete data successfully.";
            echo "<script type='text/javascript'>alert('$message');</script>"; 
        } else {
            $message = "Error on deleting data.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        redirect("patientList", "refresh");
    }
    
    public function patientConsultation(){
        $data = $this->system_menu;
        $hw = $this->session->user_HW;
        $query = $this->HealthWorkerModel->getConsultationList($hw);
		$data['patientData'] = $query;
		$this->load->view('pages/healthworker/ConsultationList', $data);
    }

}