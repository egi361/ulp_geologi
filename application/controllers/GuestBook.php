<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class GuestBook extends CController {

    public function __construct() {
        parent::__construct();
        $this->load->model(array('FeatureModel', 'EventModel', 'GuestBookModel'));
    }

    public function index() {
        $this->load->view('guestbook/index');
    }

    public function getDataGuest() {
        $id_event = $_GET['id_event'];
        $data = $this->GuestBookModel->get($id_event);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $output['aaData'] = array();
        foreach ($data->result() as $result) {
            $json_array = array();
            $json_array[] = $result->name;
            $json_array[] = $result->phone;
            
			$json_array[] = $result->institute;
			$json_array[] = $this->getDateTime($result->visit_time);
			$json_array[] = $result->satisfaction;
			$json_array[] = $result->interesting_product;
			$json_array[] = $result->description;
            
			if($result->visit_time_out!=="0000-00-00 00:00:00"){
			$json_array[] = $this->getDateTime($result->visit_time_out);
			}
			else{$json_array[] ="";};
            $json_array[] = $result->institution_address;
            $json_array[] = $result->nama_kabupaten;
            $json_array[] = $result->nama_provinsi;
            $json_array[] = $result->division;
			$json_array[] = $result->email;
            $json_array[] = $result->institute_phone;
            $json_array[] = $result->institute_email;
            $json_array[] = $result->id_event;
            $json_array[] = $result->id_guest_book;
            $output['aaData'][] = $json_array;
        }
        echo json_encode($output);
    }

    public function data_guestbook() {
        $this->load->view('guestbook/data_guestbook');
    }

    public function data_transaction() {
        $this->load->view('guestbook/data_transaction');
    }

    public function insertTransaction($id) {
        $data['id'] = $id;
        $this->load->view('guestbook/insertTransaction', $data);
    }

    public function editTransaction($id) {
        $data['id'] = $id;
        $data['transaction'] = $this->GuestBookModel->getDetailTransactionById($id);
        $this->load->view('guestbook/editTransaction', $data);
    }

    public function insertDataTransaction() {
        $data['barang'] = $this->input->post('item');
        $data['jumlah'] = $this->input->post('jumlah');
        $data['harga_satuan'] = $this->input->post('harga_satuan');
        $data['harga_total'] = $this->input->post('harga_total');
        $data['id_guest_book'] = $this->input->post('id_guestbook');
        $this->GuestBookModel->insertTransaction($data);
        echo 'Data Berhasil Disimpan.';
    }

    public function editDataTransaction($id) {
        $data['barang'] = $this->input->post('item');
        $data['jumlah'] = $this->input->post('jumlah');
        $data['harga_satuan'] = $this->input->post('harga_satuan');
        $data['harga_total'] = $this->input->post('harga_total');
        $this->GuestBookModel->updateTransaction($id, $data);
        echo 'Data Berhasil Disimpan.';
    }

    public function deleteTransaction($id) {
        $this->GuestBookModel->deleteTransaction($id);
		$this->load->view('guestbook/delete');
    }

    public function edit($id) {
        $prov = $this->GuestBookModel->getProvinsi();
        foreach ($prov->result() as $key => $value) {
            $provinsi[] = array('id' => $value->id, 'text' => $value->nama_provinsi);
        }
        $kab = $this->GuestBookModel->getKabupaten();
        foreach ($kab->result() as $key => $value) {
            $kabupaten[] = array('id' => $value->id, 'text' => $value->nama_kabupaten);
        }

        $guest_book = $this->GuestBookModel->getById($id);

        $this->load->view('guestbook/edit', array(
            'data' => $guest_book,
            'provinsi' => $provinsi,
            'kabupaten' => $kabupaten
        ));
    }

    public function getCity($id) {
        $kab = $this->db->query("
                select * from kabupaten where provinsi_id=$id
                "); //GuestBookModel->getKabupaten();
        foreach ($kab->result() as $key => $value) {
            $kabupaten[] = array('id' => $value->id, 'text' => $value->nama_kabupaten);
        }
        $data['city'] = $kabupaten;
        $this->load->view("guestbook/data_city", $data);
    }

    public function editData($id) {

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
		$data['description'] = $this->input->post('description');
//        $data['visit_time'] = date('Y-m-d h:i:sa');
//        $data['id_event'] = $this->session->userdata('id_event')
        $this->GuestBookModel->update($id, $data);
        ;
        echo 'Data Berhasil Disimpan.';
    }

    public function getDataTransaction() {
        $id_guestbook = $_GET['id_guestbook'];
        $data = $this->GuestBookModel->getTransactionById($id_guestbook);
        $this->output->set_header('Content-Type: application/json; charset=utf-8');
        $output['aaData'] = array();
        foreach ($data as $result) {
            $json_array = array();

            $json_array[] = $result->barang;
            $json_array[] = $result->jumlah;
            $json_array[] = $result->harga_satuan;
            $json_array[] = $result->harga_total;
            $json_array[] = $result->id_transaksi;
            $output['aaData'][] = $json_array;
        }
        echo json_encode($output);
    }

}
