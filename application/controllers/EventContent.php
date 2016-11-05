<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class EventContent extends CController {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('FeatureModel','UserModel','FileModel'));
		
	}
	public function index()
	{
		$this->load->view('eventcontent/index');
	}
	
	public function getFile()
	{
		$id_event=$_GET['id_event'];
		$data=$this->FileModel->get($id_event)->result();
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data as $result){
		$json_array=array();
		$json_array[]=$result->file_description;
		$json_array[]=$result->file_name;
		$json_array[]=$result->file_path;
		$json_array[]=$result->id_file;
		$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}
	public function insert($id_event)
	{
		$data['id_event']=$id_event;
		$this->load->view('eventcontent/insert',$data);
		
	}
	public function edit($id_file)
	{
		$data['file']=$this->FileModel->getById($id_file);
		$this->load->view('eventcontent/edit',$data);
	}
	public function editData(){
	$file=$this->unggah();
	if($file==true){
	$upload['gambar']=$this->upload->data();
	$gambar=$upload['gambar']['file_name'];}
	else{
	$gambar=$this->input->post('existingImage');
	}
	$data['file_description']=$this->input->post('description');
	$data['file_name']=$gambar;
	$id=$this->input->post('id_file');
	$this->FileModel->update($id,$data);
	echo "Data Berhasil Diubah.";
	}
	public function insertData()
	{
		if($_POST['description']!==""){
		$file=$this->unggah();
		$upload['gambar']=$this->upload->data();
		$gambar=$upload['gambar']['file_name'];
		$data['file_description']=$this->input->post('description');
		$data['file_path']="";
		$data['id_event']=$this->input->post('id_event');
		$data['file_name']=$gambar;
		$this->FileModel->simpan($data);
		echo "Data Berhasil Disimpan.";
		}
	}
	public function delete($id)
	{
		$this->FileModel->delete($id);
		$this->load->view('eventcontent/delete');
		echo "Data Berhasil Dihapus.";
	}
	PUBLIC function unggah(){
	
	$this->load->library('upload');
	$config['upload_path']='././image';
	$config['allowed_types']='gif|jpg|jpeg|png';
	$config['max_size']='1000';
	$config['max_width']='1024';
	$config['max_height']='768';
	$this->upload->initialize($config);
	if($this->upload->do_upload()==true){
	return true;
	}
	else{ 
	return false;
	}
	}
}
