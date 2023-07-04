<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class HealthWorkerModel extends CI_model
{


    public function getPatientList($hw){
        $this->db->select("*");
        $this->db->from('patient_information');
        $this->db->where('patientHC', $hw);
        $query = $this->db->get();
        return $query->result();
    }

    public function getBarangayData($hw){
        $this->db->select("*");
        $this->db->from('sv_barangay');
        $this->db->where('bName', $hw);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function getReligionData(){
        $this->db->select("*");
        $this->db->from('sv_religion');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPatientID(){
        $this->db->select("MAX(patientNumber) as mPatient");
        $this->db->from('patient_information');
        $query = $this->db->get();
        return $query->result();
    }

    public function getPatientInformation($patientID){
        $this->db->select("*");
        $this->db->from('patient_information');
        $this->db->where('patientNumber', $patientID);
        $query = $this->db->get();
        return $query->result();
    }


    public function addPatientInformation($patientID){
        
        $image ='user.png';

        if (!empty($_FILES['Filename']['name'])) { 
            $image = $_FILES['Filename']['name'];
        }



        $data = array(
            'patientLastName'      =>  $this->input->post('patientLastName', true),
            'patientFirstName'      =>  $this->input->post('patientFirstName', true),
            'patientMiddleName'      =>  $this->input->post('patientMiddleName', true),
            'patientBirthDate'      =>  $this->input->post('patientBirthDate', true),
            'patientBirthPlace'      =>  $this->input->post('patientBirthPlace', true),
            'patientSex'      =>  $this->input->post('patientSex', true),
            'patientReligion'      =>  $this->input->post('patientReligion', true),
            'patientContactNum'      =>  $this->input->post('patientContactNum', true),
            'patientEmailAdd'      =>  $this->input->post('patientEmailAdd', true),
            'patientCity'      =>  $this->input->post('patientCity', true),
            'patientBrgy'      =>  $this->input->post('patientBrgy', true),
            'patientHC'      =>  $this->input->post('patientHC', true),
            'patientStreet'      =>  $this->input->post('patientStreet', true),
            'patientHouseNo'      =>  $this->input->post('patientHouseNo', true),
            'patientOccupation'      =>  $this->input->post('patientOccupation', true),
            'patientCivilStatus'      =>  $this->input->post('patientCivilStatus', true),
            'patientImage'      =>   $image
        );

        $result = $this->db->insert('patient_information', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );


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

    public function deletepatientRecords($delete_ID)
    {
        $this->db->where('patientNumber', $delete_ID);
        $this->db->delete('patient_information');
        $result = ($this->db->affected_rows() != 1) ? false : true;
        return array(
            'result' => $result
        );
    }

    
    public function getConsultationList($hw){
        $this->db->select("*");
        $this->db->from('patient_consultation');
        $this->db->join('patient_information', 'patient_information.patientNumber = patient_consultation.patientNo');
        $this->db->where('hcName', $hw);
        $query = $this->db->get();
        return $query->result();
    }
    



    

}