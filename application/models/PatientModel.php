<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class PatientModel extends CI_model
{
    

    public function getPatientInformation($PID){
        $this->db->select("*");
        $this->db->from('patient_information');
        $this->db->where('patientNumber', $PID);
        $query = $this->db->get();
        return $query->result();
    }

    public function updatePatientInformation($PID){
        
        $this->db->set('patientLastName', $this->input->post('patientLastName', true));
        $this->db->set('patientFirstName', $this->input->post('patientFirstName', true));
        $this->db->set('patientMiddleName', $this->input->post('patientMiddleName', true));
        $this->db->set('patientBirthDate', $this->input->post('patientBirthDate', true));
        $this->db->set('patientBirthPlace', $this->input->post('patientBirthPlace', true));
        $this->db->set('patientSex', $this->input->post('patientSex', true));
        $this->db->set('patientReligion', $this->input->post('patientReligion', true));
        $this->db->set('patientContactNum', $this->input->post('patientContactNum', true));
        $this->db->set('patientEmailAdd', $this->input->post('patientEmailAdd', true));
        $this->db->set('patientCity', $this->input->post('patientCity', true));
        $this->db->set('patientBrgy', $this->input->post('patientBrgy', true));
        $this->db->set('patientHC', $this->input->post('patientHC', true));
        $this->db->set('patientStreet', $this->input->post('patientStreet', true));
        $this->db->set('patientHouseNo', $this->input->post('patientHouseNo', true));
        $this->db->set('patientOccupation', $this->input->post('patientOccupation', true));
        $this->db->set('patientCivilStatus', $this->input->post('patientCivilStatus', true));
       
        $image ='';

        if (!empty($_FILES['Filename']['name'])) { 
            $image = $_FILES['Filename']['name'];
            $this->db->set('patientImage', $image);
        }



        $this->db->where('patientNumber', $PID);
        $this->db->update('patient_information');
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );


    }



    public function getBarangayData(){
        $this->db->select("*");
        $this->db->from('sv_barangay');
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getReligionData(){
        $this->db->select("*");
        $this->db->from('sv_religion');
        $query = $this->db->get();
        return $query->result();
    }

    public function getNatureofVisit(){
        $this->db->select("*");
        $this->db->from('sv_naturev');
        $query = $this->db->get();
        return $query->result();
    }

    public function getConsultationType(){
        $this->db->select("*");
        $this->db->from('sv_consultationt');
        $query = $this->db->get();
        return $query->result();
    }

    public function getSymptoms(){
        $this->db->select("*");
        $this->db->from('sv_symptoms');
        $query = $this->db->get();
        return $query->result();
    }

    public function getTransactionID(){
        $this->db->select("MAX(consultationNo) as transactionNum");
        $this->db->from('patient_consultation');
        $query = $this->db->get();
        return $query->result();
    }

    public function addPatientConsultationData($transactionID)
    {

        $data = array(
            'consultationNo' => $transactionID,
            'consultationType' => $this->input->post('consultationType', true),
            'patientNo' => $this->input->post('patientNo', true),
            'patientAge' => $this->input->post('patientAge', true),
            'patientSex' => $this->input->post('patientSex', true),
            'patientCivilStatus' => $this->input->post('patientCivilStatus', true),
            'patientHeight' => $this->input->post('patientHeight', true),
            'patientWeight' => $this->input->post('patientWeight', true),
            'patientTemp' => $this->input->post('patientTemp', true),
            'patientBP' => $this->input->post('patientBP', true)
        );

        $result = $this->db->insert('patient_consultation', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result
        );

    }
    
    public function addSymptomsData($transactionID, $rs){
        $data = array(
            'consultationNo' => $transactionID,
            'patientSymptoms' => $rs    
        );

        $result = $this->db->insert('patient_symptoms', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result
        );
    }
    



    
    
}