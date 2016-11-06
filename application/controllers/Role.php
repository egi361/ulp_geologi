<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends CController {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('RoleModel'));
		
	}
	public function index(){
		$this->load->view('role/index');
	}	

	public function getRole(){
		$data=$this->RoleModel->get();
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data->result() as $result){
		$json_array=array();
		$json_array[]=$result->role_name;
		$json_array[]=$result->id_role;
		$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}

	public function insert(){
		$this->load->view('role/insert');
	}

	public function insertData(){
		$data['role_name']=$this->input->post('role_name');
		$this->RoleModel->simpan($data);
		echo 'Data Berhasil Disimpan.';
	}

	public function edit($id){
		$role=$this->RoleModel->getById($id);
		$data['data']=$role;
		$this->load->view('role/edit',$data);
	}

	public function editData($id){
		$data['role_name']=$this->input->post('name');
		$this->RoleModel->update($id,$data);
		echo 'Data Berhasil Disimpan.';
	}

	function delete($id){
		$this->RoleModel->hapus($id);
		$this->load->view('role/delete');
	}
}
