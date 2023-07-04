<?php
defined('BASEPATH') OR exit('No direct script access allowed');

ini_set('max_execution_time', 0); 
ini_set('memory_limit','2048M');

class Patient extends CI_Controller {

    var $system_menu = array();
   

    function __construct()
    {
        parent::__construct();
        $this->load->model("UserAccessModel");
        $this->load->model("PatientModel");

        $result = $this->UserAccessModel->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];

    }

    
	


    public function dashboard(){
		$data = $this->system_menu;
		$this->load->view('pages/patient/dashboard', $data);
	}

    public function patient_info(){
        $data = $this->system_menu;
        $PID = $this->session->user_PID;
        $query = $this->PatientModel->getPatientInformation($PID);
		$data['personalData'] = $query;
        $query = $this->PatientModel->getBarangayData();
		$data['bgData'] = $query;
        $query = $this->PatientModel->getReligionData();
		$data['relData'] = $query;
        $this->load->view('pages/patient/profile', $data);
    }
    
    public function UpdateInformation(){

        $PID = $this->session->user_PID;

	    $result = $this->PatientModel->updatePatientInformation($PID);
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
        redirect("patient-information", "refresh");
    }


    

    public function patient_med_info(){
        $data = $this->system_menu;
        $this->load->view('pages/patient/history', $data);
    }



    public function patient_consult(){
        $data = $this->system_menu;
        $PID = $this->session->user_PID;
        $query = $this->PatientModel->getPatientInformation($PID);
		$data['personalData'] = $query;
        $query = $this->PatientModel->getNatureofVisit();
		$data['nvData'] = $query;
        $query = $this->PatientModel->getConsultationType();
		$data['cData'] = $query;
        $query = $this->PatientModel->getSymptoms();
		$data['symptomsData'] = $query;
        $this->load->view('pages/patient/consultation', $data);
    }

    public function addPatientConsultation(){


        $maxID = $this->PatientModel->getTransactionID();

        foreach($maxID as $rs){
            $transactionID = $rs->transactionNum + 1;
        }

	    $result = $this->PatientModel->addPatientConsultationData($transactionID);
	   
        if($result['result']==true){

            $symptoms = $this->input->post('symptoms');

            $age = $this->input->post('patientAge', true);
            $civilStatus = $this->input->post('patientCivilStatus', true);
            $sex = $this->input->post('patientSex', true);

            $symptopms1 = 0;
            $symptopms2 = 0;
            $symptopms3 = 0;
            $symptopms4 = 0;
            $symptopms5 = 0;
            $symptopms6 = 0;
            $symptopms7 = 0;
            $symptopms8 = 0;
            $symptopms9 = 0;
            $symptopms10 = 0;
            $symptopms11 = 0;

            foreach($symptoms AS $rs){

                switch($rs){
                    case "LAGNAT":
                        $symptopms1 = 1;
                    break;

                    case "UBO":
                        $symptopms2 = 1;
                    break;

                    case "SIPON":
                        $symptopms3 = 1;
                    break;

                    case "MASAKIT NA LALAMUNAN":
                        $symptopms4 = 1;
                    break;

                    case "HIRAP SA PAGHINGA":
                        $symptopms5 = 1;
                    break;

                    case "PAGDUMI NG MARAMI":
                        $symptopms6 = 1;
                    break;

                    case "HYPERTENSION":
                        $symptopms7 = 1;
                    break;

                    case "DIABETES":
                        $symptopms8 = 1;
                    break;

                    case "SAKIT SA PUSO":
                        $symptopms9 = 1;
                    break;

                    case "CANCER":
                        $symptopms10 = 1;
                    break;

                    case "TB":
                        $symptopms11 = 1;
                    break;
                }


                $insertSymptomsData = $this->PatientModel->addSymptomsData($transactionID, $rs);
           
            }



            $message = "Data has been save successfully.";
            echo "<script type='text/javascript'>alert('$message');</script>";

        } else {
            $message = "Error on saving data.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        
        redirect("consultation", "refresh");
    }





    public function dynamic_form(){
        $data = $this->system_menu;
        $this->load->view('pages/patient/forms', $data);
    }

    public function data_analysis(){
        $data = $this->system_menu;
        $this->load->view('pages/patient/analysis', $data);
    }



    public function do_upload_images($filename, $field, $file_path)
    {

        $config['upload_path']          = $file_path;
        $config['allowed_types']        = 'gif|jpg|png|jpeg|gif';
        $config['max_size']             = 2000;
        $config['overwrite']			= true;
        $config['file_name'] 			= $filename;

        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload($field))
        {
            $this->session->set_flashdata("error","Error uploading image.(".$this->upload->display_errors().")");
            $result = TRUE;
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            $result = FALSE;
        }

        return $result;

    }

    
}