<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class AdminModel extends CI_model
{

    public function getMedicineInfo(){
        $this->db->select("*");
        $this->db->from('med_information');
        $query = $this->db->get();
        return $query->result();
    }

    public function getmedCategory(){
        $this->db->select("*");
        $this->db->from('sv_category');
        $query = $this->db->get();
        return $query->result();
    }

    public function getmedType(){
        $this->db->select("*");
        $this->db->from('sv_type');
        $query = $this->db->get();
        return $query->result();
    }

    public function getmedUOM(){
        $this->db->select("*");
        $this->db->from('sv_uom');
        $query = $this->db->get();
        return $query->result();
    }
    

    public function add_medicine_info(){

        $data = array(
            'barCode'           =>  $this->input->post('barCode', true),
            'category'          =>  $this->input->post('category', true),
            'genericName'       =>  $this->input->post('genericName', true),
            'brandName'         =>  $this->input->post('brandName', true),
            'medtype'           =>  $this->input->post('medtype', true),
            'dosage'            =>  $this->input->post('dosage', true),
            'uom'               =>  $this->input->post('uom', true)
        );

        $result = $this->db->insert('med_information', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getMedicineData($medicineID){
        $this->db->select("*");
        $this->db->from('med_information');
        $this->db->where('barCode', $medicineID);
        $query = $this->db->get();
        return $query->result();
    }


    public function addIncomingInfo(){
        $data = array(
            'referenceNum'      =>  $this->input->post('referenceNum', true),
            'supplier'          =>  $this->input->post('supplier', true),
            'acquisition'       =>  $this->input->post('acquisition', true)
        );

        $result = $this->db->insert('med_incoming_information', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getTransactionID(){
        $this->db->select("MAX(idNo) as transactionNum");
        $this->db->from('med_incoming_information');
        $query = $this->db->get();
        return $query->result();
    }
    

    public function addTableIncoming($transactionID){
       
        $tableData = $this->input->post('tableData');
       
        foreach($tableData AS $rs)
        {
            list($barcode, $qty) = explode("+", $rs);

            $data[] = array(
                'idNo'       => $transactionID,
                'barCode'    => $barcode,
                'qty'        => $qty
            );
        }

        $result = $this->db->insert_batch('med_incoming_data', $data);
        $result = ($this->db->affected_rows() > 0) ? true : false;

        return array(
            'result'    => $result
        );

    }

    public function updateMedicineQty($barcode, $newqty){
       
        $this->db->where('barCode', $barcode);
        $medicineCount = $this->db->get("med_information");

        if ($medicineCount->num_rows() == 1) {

            $rs = $medicineCount->row();
            $qty = $rs->qty;

            $updatedQty = $qty + $newqty;

            $this->db->set('qty', $updatedQty);
            $this->db->where('barCode', $barcode);
            $this->db->update('med_information');
            $result = ($this->db->affected_rows() != 1) ? false : true;
            
            return array(
                'result' => $result
            );
            

        }
        
    }

    public function addOutgoingInfo(){
        $data = array(
            'referenceNum'      =>  $this->input->post('referenceNum', true)
        );

        $result = $this->db->insert('med_outgoing_information', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getTransactionIDOut(){
        $this->db->select("MAX(idNo) as transactionNum");
        $this->db->from('med_outgoing_information');
        $query = $this->db->get();
        return $query->result();
    }
    

    public function updateMedicineQtyOut($barcode, $newqty){
       
        $this->db->where('barCode', $barcode);
        $medicineCount = $this->db->get("med_information");

        if ($medicineCount->num_rows() == 1) {

            $rs = $medicineCount->row();
            $qty = $rs->qty;

            $updatedQty = $qty - $newqty;

            $this->db->set('qty', $updatedQty);
            $this->db->where('barCode', $barcode);
            $this->db->update('med_information');
            $result = ($this->db->affected_rows() != 1) ? false : true;
            
            return array(
                'result' => $result
            );
            

        }
        
    }

    public function addTableOutgoing($transactionID){
       
        $tableData = $this->input->post('tableData');
       
        foreach($tableData AS $rs)
        {
            list($barcode, $qty, $reason) = explode("+", $rs);

            $data[] = array(
                'idNo'       => $transactionID,
                'barCode'    => $barcode,
                'qty'        => $qty,
                'reason'     => $reason
            );
        }

        $result = $this->db->insert_batch('med_outgoing_data', $data);
        $result = ($this->db->affected_rows() > 0) ? true : false;

        return array(
            'result'    => $result
        );

    }
    
    public function getHealthCenterTransfer(){
        $this->db->select("*");
        $this->db->from('sv_healthcenter');
        $query = $this->db->get();
        return $query->result();
    }

    public function getMedicineList(){
        $this->db->select("*");
        $this->db->from('med_information');
        $query = $this->db->get();
        return $query->result();
    }

    
    
    public function getSymptomData(){
        $this->db->select("*");
        $this->db->from('sv_symptoms');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_symptoms(){

        $data = array(
            'sName'           =>  $this->input->post('sName', true)
        );

        $result = $this->db->insert('sv_symptoms', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getExaminationData(){
        $this->db->select("*");
        $this->db->from('sv_examination');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_examination(){

        $data = array(
            'eName'           =>  $this->input->post('eName', true)
        );

        $result = $this->db->insert('sv_examination', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getNatureVData(){
        $this->db->select("*");
        $this->db->from('sv_naturev');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_naturev(){

        $data = array(
            'nName'           =>  $this->input->post('nName', true)
        );

        $result = $this->db->insert('sv_naturev', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getConsultationTData(){
        $this->db->select("*");
        $this->db->from('sv_consultationt');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_consultationt(){

        $data = array(
            'cName'           =>  $this->input->post('cName', true)
        );

        $result = $this->db->insert('sv_consultationt', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }


    public function getResultsData(){
        $this->db->select("*");
        $this->db->from('sv_results');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_results(){

        $data = array(
            'rName'           =>  $this->input->post('rName', true)
        );

        $result = $this->db->insert('sv_results', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getPhysicianData(){
        $this->db->select("*");
        $this->db->from('sv_physician');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_physician(){

        $data = array(
            'pName'           =>  $this->input->post('pName', true)
        );

        $result = $this->db->insert('sv_physician', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getGenericData(){
        $this->db->select("*");
        $this->db->from('sv_category');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_generic(){

        $data = array(
            'cName'           =>  $this->input->post('cName', true)
        );

        $result = $this->db->insert('sv_category', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getBrandData(){
        $this->db->select("*");
        $this->db->from('sv_type');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_brand(){

        $data = array(
            'tName'           =>  $this->input->post('tName', true)
        );

        $result = $this->db->insert('sv_type', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getUOMData(){
        $this->db->select("*");
        $this->db->from('sv_uom');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_uom(){

        $data = array(
            'uName'           =>  $this->input->post('uName', true),
            'uDesc'           =>  $this->input->post('uDesc', true)
        );

        $result = $this->db->insert('sv_uom', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

    public function getHCData(){
        $this->db->select("*");
        $this->db->from('sv_healthcenter');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_hc(){

        $data = array(
            'hcName'           =>  $this->input->post('hcName', true)
        );

        $result = $this->db->insert('sv_healthcenter', $data);
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
    
    public function getHCSwitch(){
        $this->db->select("*");
        $this->db->from('sv_healthcenter');
        $query = $this->db->get();
        return $query->result();
    }

    public function add_barangay(){

        $data = array(
            'hcName'           =>  $this->input->post('hcName', true),
            'bName'           =>  $this->input->post('bName', true)
        );

        $result = $this->db->insert('sv_barangay', $data);
        $result = ($this->db->affected_rows() != 1) ? false : true;

        return array(
            'result'    => $result
        );
    }

}