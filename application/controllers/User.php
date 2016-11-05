<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CController {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('FeatureModel','UserModel', 'RoleModel'));
		
		
	}
	public function index()
	{
		$this->load->view('user/index');
	}
	public function insert()
	{
		$model = $this->RoleModel->get();
		foreach ($model->result() as $key => $value) {
			$data_select[] = array('id' => $value->id_role , 'text' => $value->role_name );
		}
		$model = json_encode($data_select);
		$this->load->view('user/insert',array('model'=>$model));
	}
	public function insertData()
	{
		$data['nama']=$this->input->post('name');
		$data['alamat']=$this->input->post('address');
		$data['email']=$this->input->post('email');
		$data['username']=$this->input->post('username');
		$data['password']=md5($this->input->post('password'));
		$data['id_role']=$this->input->post('role_id');
		$this->UserModel->simpan($data);
		echo 'Data berhasil disimpan';
	}
	public function edit($id)
	{
		$model = $this->RoleModel->get();
		foreach ($model->result() as $key => $value) {
			$data_select[] = array('id' => $value->id_role , 'text' => $value->role_name );
		}
		$model = json_encode($data_select);
		$user=$this->UserModel->getById($id);
		$this->load->view('user/edit',array('data'=>$user,"model"=>$model));
	}
	public function editData($id)
	{
		$data['nama']=$this->input->post('name');
		$data['alamat']=$this->input->post('address');
		$data['email']=$this->input->post('email');
		$data['username']=$this->input->post('username');
		if ($this->input->post('password')!="" && !empty($this->input->post('password'))) {
			$data['password'] = md5($this->input->post('password'));
		};
		$data['id_role']=$this->input->post('role_id');
		$this->UserModel->update($id,$data);
		echo 'Data berhasil disimpan';
	}
	public function delete($id)
	{
		$this->UserModel->delete($id);
		$this->load->view('User/delete');
	}
	public function getUser()
	{
		$data=$this->UserModel->get();
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data->result() as $result){
		$json_array=array();
		$json_array[]=$result->nama;
		$json_array[]=$result->alamat;
		$json_array[]=$result->email;
		$json_array[]=$result->username;
		$json_array[]=$result->password;
		$json_array[]=$result->id_user;
		$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */