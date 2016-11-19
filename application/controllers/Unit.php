<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Unit extends CController {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('UnitModel'));
		
	}
	public function index(){
		$this->load->view('Unit/index');
	}	

	public function get(){
		$data=$this->UnitModel->get();
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data->result() as $result){
		$json_array=array();
		$json_array[]=$result->kode_unit_satuan_kerja;
		$json_array[]=$result->nama_unit;
		$json_array[]=$result->id_unit_satuan_kerja;
		$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}

	public function insert(){
		$this->load->view('Unit/insert');
	}

	public function insertData(){
		$data['nama_unit']=$this->input->post('nama_unit');
		$data['kode_unit_satuan_kerja']=$this->input->post('kode_unit_satuan_kerja');
		$this->UnitModel->simpan($data);
		echo 'Data Berhasil Disimpan.';
	}

	public function edit($id){
		$unit=$this->UnitModel->getById($id);
		$data['data']=$unit;
		$this->load->view('unit/edit',$data);
	}

	public function editData($id){
		$data['nama_unit']=$this->input->post('nama_unit');
		$data['kode_unit_satuan_kerja']=$this->input->post('kode_unit_satuan_kerja');
		$this->UnitModel->update($id,$data);
		echo 'Data Berhasil Disimpan.';
	}

	function delete($id){
		$this->UnitModel->hapus($id);
		$this->load->view('unit/delete');
	}
}
