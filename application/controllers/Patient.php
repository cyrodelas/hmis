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


            //processed_data
            $fileName = 'processed_data.csv';
            $this->load->library('excel');
    
            $inputFileName = 'C:\xampp\htdocs\hmis\assets\ML\processed_data.csv';
            try{
                $inputFileType  =   'CSV';
                $objReader      =   PHPExcel_IOFactory::createReader($inputFileType);
                $objPHPExcel    =   $objReader->load($inputFileName);
                }catch(Exception $e){
                die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
            }
    
            $objPHPExcel->setActiveSheetIndex(0);
            
            $objPHPExcel->getActiveSheet()->SetCellValue('A2', $age);
            $objPHPExcel->getActiveSheet()->SetCellValue('B2', $civilStatus);
            $objPHPExcel->getActiveSheet()->SetCellValue('C2', $sex);
            $objPHPExcel->getActiveSheet()->SetCellValue('D2', $symptopms1);
            $objPHPExcel->getActiveSheet()->SetCellValue('E2', $symptopms2);
            $objPHPExcel->getActiveSheet()->SetCellValue('F2', $symptopms3);
            $objPHPExcel->getActiveSheet()->SetCellValue('G2', $symptopms4);
            $objPHPExcel->getActiveSheet()->SetCellValue('H2', $symptopms5);
            $objPHPExcel->getActiveSheet()->SetCellValue('I2', $symptopms6);
            $objPHPExcel->getActiveSheet()->SetCellValue('J2', $symptopms7);
            $objPHPExcel->getActiveSheet()->SetCellValue('K2', $symptopms8);
            $objPHPExcel->getActiveSheet()->SetCellValue('L2', $symptopms9);
            $objPHPExcel->getActiveSheet()->SetCellValue('M2', $symptopms10);
            $objPHPExcel->getActiveSheet()->SetCellValue('N2', $symptopms11);

            header('Content-Type: application/vnd.ms-excel'); 
            header('Content-Disposition: attachment;filename="'.$fileName.'"');
            header('Cache-Control: max-age=0'); 
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');  
            $objWriter->save('php://output');

            //$message = "Data has been save successfully.";
           // echo "<script type='text/javascript'>alert('$message');</script>";

        } else {
            $message = "Error on saving data.";
            echo "<script type='text/javascript'>alert('$message');</script>";
        }
        //redirect("consultation", "refresh");
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