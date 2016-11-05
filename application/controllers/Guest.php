<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Guest extends PublicController {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('FeatureModel', 'EventModel', 'GuestBookModel'));
    }

    public function index() {
        $kabupaten = $this->GuestBookModel->getKabupaten();
        foreach ($kabupaten->result() as $key => $value) {
            $data_select_kabupaten[] = array('id' => $value->id, 'text' => $value->nama_kabupaten);
        }
        $datakabupaten = json_encode($data_select_kabupaten);
        $provinsi = $this->GuestBookModel->getProvinsi();
        foreach ($provinsi->result() as $key => $value) {
            $data_select_provinsi[] = array('id' => $value->id, 'text' => $value->nama_provinsi);
        }
        $dataprovinsi = json_encode($data_select_provinsi);
        $data['kabupaten'] = $datakabupaten;
        $data['provinsi'] = $dataprovinsi;
        $data['content'] = $this->EventModel->getContentById($this->session->userdata('id_event'));
        $data['event'] = $this->EventModel->getById($this->session->userdata('id_event'));
        $this->load->view("layout/guest", $data);
    }

    public function loadDataGuest() {
        $this->load->view('guest/dataGuest');
    }

    public function event() {
        $event = $this->EventModel->getCurrentEvent()->result();
        $this->load->view('layout/enterEvent', array(
            'data' => $event
        ));
    }

    public function enterEvent($id) {
        $data['data'] = 'Guest';
        $this->session->set_userdata('id_event', $id);
        $this->load->view('layout/redirect', $data);
    }

    public function Insert() {

        $data['name'] = $this->input->post('name');
        $data['phone'] = $this->input->post('mobileNumber');
        $data['email'] = $this->input->post('email');
        $data['interesting_product'] = $this->input->post('interestingProduct');
        $data['institute'] = $this->input->post('institutionName');
        $data['institution_address'] = $this->input->post('address');
        $data['city'] = $this->input->post('city');
        $data['provinsi'] = $this->input->post('province');
        $data['institute_email'] = $this->input->post('institutionEmail');
        $data['institute_phone'] = $this->input->post('institutionPhone');
        $data['division'] = $this->input->post('division');
        $data['visit_time'] = date('Y-m-d h:i:sa');
        $data['id_event'] = $this->session->userdata('id_event');
        $this->GuestBookModel->simpan($data);
		echo "Data Berhasil Disimpan.";
    }

    public function getDataGuest() {
        $data = $this->GuestBookModel->get($this->session->userdata('id_event'));
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $output['aaData'] = array();
        foreach ($data->result() as $result) {
            $json_array = array();
            $json_array[] = $result->name;
            $json_array[] = $result->phone;
            $json_array[] = $result->email;
            $json_array[] = $result->visit_time;
            $json_array[] = $result->interesting_product;
            $json_array[] = $result->institute;
            $json_array[] = $result->institution_address;
            $json_array[] = $result->nama_kabupaten;
            $json_array[] = $result->nama_provinsi;
            $json_array[] = $result->division;
            $json_array[] = $result->institute_phone;
            $json_array[] = $result->institute_email;
            $json_array[] = $result->id_event;
			$json_array[] = $result->id_guest_book;
            $output['aaData'][] = $json_array;
        }
        echo json_encode($output);
    }
    
    public function satisfaction($id) {
		$data['id']=$id;
        $this->load->view('guest/satisfaction',$data);
    }
	public function addSatisfaction($id,$satisfaction) {
        $data['satisfaction']=$satisfaction;
		$data['visit_time_out']=date('Y-m-d h:i:sa');;
		$this->GuestBookModel->update($id,$data);
		echo "<script>
			 document.location.href='".base_url()."Guest' 	
			 </script>";
    }

}
