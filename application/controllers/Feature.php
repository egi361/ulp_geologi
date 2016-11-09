<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Feature extends CController {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('FeatureModel','UserModel'));
		
	}
	public function index(){
		$this->load->view('feature/index');
	}
	
	public function getUser(){
		$id_role=$_GET['id_role'];
		$data=$this->FeatureModel->getRole_feature_join_feature($id_role);
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data as $result){
			$json_array=array();
			$json_array[]=$result->feature_name;
			$json_array[]=$result->id_feature;
			$json_array[]=$result->id_role_feature;
			$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}

	public function save(){
		$action=$this->input->post('bind_action');
		$id_feature=$this->input->post('bind_id_feature');
		$bindAction=explode(',',$action);
		$bindIdFeature=explode(',',$id_feature);
		for($i=0;$i<count($bindAction);$i++){
			if($bindAction[$i]=='insert'){
				$data['id_role']=intval($this->input->post('bind_id_role'));
				$data['id_feature']=intval($bindIdFeature[$i]);
				$this->FeatureModel->simpan($data);}
			else{
				$this->FeatureModel->hapus($bindIdFeature[$i]);
			}
		}
		echo "Data Feature Access Saved Successfully";
	}
}
