<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Swakelola extends CController {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('SwakelolaModel'));
		
	}
	public function index(){
		$this->load->view('swakelola/index');
	}	

	public function get(){
		$data=$this->SwakelolaModel->get();
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data->result() as $result){
			$json_array=array();
			$json_array[]=$result->jenis_swakelola;
			$json_array[]=$result->jenis_jasa;
			$json_array[]=$result->id_swakelola;
			$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}

	public function insert(){
		$this->load->view('swakelola/insert');
	}

	public function insertData(){
		$data['jenis_swakelola']=$this->input->post('jenis_swakelola');
		$data['jenis_jasa']=$this->input->post('jenis_jasa');
		$this->SwakelolaModel->simpan($data);
		echo 'Data Berhasil Disimpan.';
	}

	public function edit($id){
		$swakelola = $this->SwakelolaModel->getById($id);

		$data['data'] = $swakelola;
		$this->load->view('swakelola/edit',$data);
	}

	public function editData($id){
		$data['jenis_swakelola']=$this->input->post('jenis_swakelola');
		$data['jenis_jasa']=$this->input->post('jenis_jasa');
		$this->SwakelolaModel->update($id,$data);
		echo 'Data Berhasil Disimpan.';
	}

	function delete($id){
		$this->SwakelolaModel->hapus($id);
		$this->load->view('swakelola/delete');
	}
}
