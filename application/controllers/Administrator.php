<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

    var $system_menu = array();
    
    function __construct()
    {
        parent::__construct();
        $this->load->model("UserAccessModel");
        $this->load->model("AdminModel");

        $result = $this->UserAccessModel->load_index_data();
        $this->system_menu['main_menu'] = $result['main_menu'];
        $this->system_menu['sub_menu'] = $result['sub_menu'];
        $this->system_menu['index_user_roles'] = $result['index_user_roles'];

    }

    public function dashboard(){
		$data = $this->system_menu;
		$this->load->view('pages/administrator/dashboard', $data);
	}

    public function medicineInformation(){
        $data = $this->system_menu;
        $query = $this->AdminModel->getMedicineInfo();
		$data['medInfoData'] = $query;
        $query = $this->AdminModel->getmedCategory();
		$data['mCategory'] = $query;
        $query = $this->AdminModel->getmedType();
		$data['mType'] = $query;
        $query = $this->AdminModel->getmedUOM();
		$data['mUOM'] = $query;
          
		$this->load->view('pages/administrator/medicineinfo', $data);
    }

    public function medicineinfo_add(){
        $result = $this->AdminModel->add_medicine_info();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("medicineinfo", "refresh");
    }


    public function incomingStocks(){
        $data = $this->system_menu;
		$this->load->view('pages/administrator/medicineincoming', $data);
    }

    public function addIncomingData(){
       
        $incomingInfo = $this->AdminModel->addIncomingInfo();
        $maxID = $this->AdminModel->getTransactionID();

        foreach($maxID as $rs){
            $transactionID = $rs->transactionNum;
        }

        $tableData = $this->input->post('tableData');
       
        foreach($tableData AS $rs)
        {
            list($barcode, $qty) = explode("+", $rs);
            $updateQ = $this->AdminModel->updateMedicineQty($barcode, $qty);
        }

        $result = $this->AdminModel->addTableIncoming($transactionID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("incomingitems", "refresh");
    }

    public function outgoingStocks(){
        $data = $this->system_menu;
		$this->load->view('pages/administrator/medicineoutgoing', $data);
    }

    public function addOutgoingData(){
       
        $outgoingInfo = $this->AdminModel->addOutgoingInfo();

        $maxID = $this->AdminModel->getTransactionIDOut();

        foreach($maxID as $rs){
            $transactionID = $rs->transactionNum;
        }

        $tableData = $this->input->post('tableData');
       
        foreach($tableData AS $rs)
        {
            list($barcode, $qty, $reason) = explode("+", $rs);
            $updateQ = $this->AdminModel->updateMedicineQtyOut($barcode, $qty);
        }

        $result = $this->AdminModel->addTableOutgoing($transactionID);

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("outgoingitems", "refresh");
    }

    public function getMedicineInfoSearch(){
        $medicineID = $this->input->post('medicineID');
        $result = $this->AdminModel->getMedicineData($medicineID);
        echo json_encode($result);
    }
    
 
    public function transferStocks(){
        $data = $this->system_menu;
        $query = $this->AdminModel->getHealthCenterTransfer();
		$data['transferData'] = $query;
		$this->load->view('pages/administrator/medicinetransfer', $data);
    }

    public function physicalCount(){
        $data = $this->system_menu;
        $query = $this->AdminModel->getMedicineList();
		$data['medicineData'] = $query;
		$this->load->view('pages/administrator/medicinecount', $data);
    }
    

    public function symptoms(){
		$data = $this->system_menu;
        $query = $this->AdminModel->getSymptomData();
		$data['symptomData'] = $query;
		$this->load->view('pages/administrator/symptoms', $data);
	}

    public function symptoms_add(){
        $result = $this->AdminModel->add_symptoms();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("symptoms", "refresh");
    }


    public function examination(){
		$data = $this->system_menu;
        $query = $this->AdminModel->getExaminationData();
		$data['examinationData'] = $query;
		$this->load->view('pages/administrator/examinations', $data);
	}

    public function examination_add(){
        $result = $this->AdminModel->add_examination();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("examination", "refresh");
    }

    public function naturev(){
		$data = $this->system_menu;
        $query = $this->AdminModel->getNatureVData();
		$data['naturevData'] = $query;
		$this->load->view('pages/administrator/naturev', $data);
	}

    public function naturev_add(){
        $result = $this->AdminModel->add_naturev();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("naturev", "refresh");
    }

    public function consultationt(){
		$data = $this->system_menu;
        $query = $this->AdminModel->getConsultationTData();
		$data['consultationtData'] = $query;
		$this->load->view('pages/administrator/consultation', $data);
	}

    public function consultationt_add(){
        $result = $this->AdminModel->add_consultationt();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("consultationt", "refresh");
    }

    public function results(){
		$data = $this->system_menu;
        $query = $this->AdminModel->getResultsData();
		$data['resultsData'] = $query;
		$this->load->view('pages/administrator/result', $data);
	}

    public function results_add(){
        $result = $this->AdminModel->add_results();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("results", "refresh");
    }


    public function physician(){
		$data = $this->system_menu;
        $query = $this->AdminModel->getPhysicianData();
		$data['physiciansData'] = $query;
		$this->load->view('pages/administrator/physicians', $data);
	}

    public function physician_add(){
        $result = $this->AdminModel->add_physician();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("physician", "refresh");
    }

    public function generic(){
		$data = $this->system_menu;
        $query = $this->AdminModel->getGenericData();
		$data['genericData'] = $query;
		$this->load->view('pages/administrator/generic', $data);
	}

    public function generic_add(){
        $result = $this->AdminModel->add_generic();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("generic", "refresh");
    }


    public function brand(){
		$data = $this->system_menu;
        $query = $this->AdminModel->getBrandData();
		$data['brandData'] = $query;
		$this->load->view('pages/administrator/brand', $data);
	}

    public function brand_add(){
        $result = $this->AdminModel->add_brand();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("brand", "refresh");
    }
    
    public function uom(){
		$data = $this->system_menu;
        $query = $this->AdminModel->getUOMData();
		$data['uomData'] = $query;
		$this->load->view('pages/administrator/uom', $data);
	}

    public function uom_add(){
        $result = $this->AdminModel->add_uom();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("uom", "refresh");
    }

    public function healthcenter(){
        $query = $this->AdminModel->getHCData();
		$data['hcData'] = $query;
		$this->load->view('pages/administrator/healthcenter', $data);
    }

    public function hc_add(){
        $result = $this->AdminModel->add_hc();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("healthcenter", "refresh");
    }
    
    public function barangay(){
        $query = $this->AdminModel->getBarangayData();
		$data['bgData'] = $query;
        $query = $this->AdminModel->getHCSwitch();
		$data['hcData'] = $query;
		$this->load->view('pages/administrator/barangay', $data);
    }

    public function barangay_add(){
        $result = $this->AdminModel->add_barangay();

        if($result['result']==true){
            $this->session->set_flashdata("success", "Data successfully added to the database.");

        } else {
            $this->session->set_flashdata("error", "Error on saving data to the database.");
        }

        redirect("healthcenter", "refresh");
    }

    
}