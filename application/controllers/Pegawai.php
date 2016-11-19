<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pegawai extends CController {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('PegawaiModel','UnitModel'));
		
	}
	public function index(){
		$this->load->view('pegawai/index');
	}	

	public function get(){
		$data=$this->PegawaiModel->get();
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data->result() as $result){
		$json_array=array();
		$json_array[]=$result->kode_pegawai;
		$json_array[]=$result->nama_pegawai;
		$json_array[]=$result->alamat;
		$json_array[]=$result->pendidikan;
		$json_array[]=$result->jenis_kelamin;
		$json_array[]=$result->nama_jabatan;
		$json_array[]=$result->nama_unit;
		$json_array[]=$result->id_pegawai;
		$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}

	public function insert(){
		$unit = $this->UnitModel->get();
		$data_unit = array();
		foreach($unit->result() as $satuan){
			$data_unit[] = array('id'=>$satuan->id_unit_satuan_kerja,'text'=>$satuan->nama_unit);
		}
		$data_jabatan = array();
		$jabatan = $this->PegawaiModel->get_jabatan();
		foreach($jabatan->result() as $d_jabatan){
			$data_jabatan[] = array('id'=>$d_jabatan->id_jabatan,'text'=>$d_jabatan->nama_jabatan);
		}
		$data['unit'] = json_encode($data_unit);
		$data['jabatan'] = json_encode($data_jabatan);
		$this->load->view('pegawai/insert',$data);
	}

	public function insertData(){
		$data['kode_pegawai']=$this->input->post('kode_pegawai');
		$data['nama_pegawai']=$this->input->post('nama_pegawai');
		$data['alamat']=$this->input->post('alamat');
		$data['pendidikan']=$this->input->post('pendidikan');
		$data['jenis_kelamin']=$this->input->post('jenis_kelamin');
		$data['id_jabatan']=$this->input->post('id_jabatan');
		$data['id_unit_satuan_kerja']=$this->input->post('id_unit_satuan_kerja');
		$this->PegawaiModel->simpan($data);
		echo 'Data Berhasil Disimpan.';
	}

	public function edit($id){
		$unit=$this->PegawaiModel->getById($id);
		$data['data']=$unit;
		$unit = $this->UnitModel->get();
		$data_unit = array();
		foreach($unit->result() as $satuan){
			$data_unit[] = array('id'=>$satuan->id_unit_satuan_kerja,'text'=>$satuan->nama_unit);
		}
		$data_jabatan = array();
		$jabatan = $this->PegawaiModel->get_jabatan();
		foreach($jabatan->result() as $d_jabatan){
			$data_jabatan[] = array('id'=>$d_jabatan->id_jabatan,'text'=>$d_jabatan->nama_jabatan);
		}
		$data['unit'] = json_encode($data_unit);
		$data['jabatan'] = json_encode($data_jabatan);
		$this->load->view('pegawai/edit',$data);
	}

	public function editData($id){
		$data['kode_pegawai']=$this->input->post('kode_pegawai');
		$data['nama_pegawai']=$this->input->post('nama_pegawai');
		$data['alamat']=$this->input->post('alamat');
		$data['pendidikan']=$this->input->post('pendidikan');
		$data['jenis_kelamin']=$this->input->post('jenis_kelamin');
		$data['id_jabatan']=$this->input->post('id_jabatan');
		$data['id_unit_satuan_kerja']=$this->input->post('id_unit_satuan_kerja');
		$this->PegawaiModel->update($id,$data);
		echo 'Data Berhasil Disimpan.';
	}

	function delete($id){
		$this->PegawaiModel->hapus($id);
		$this->load->view('pegawai/delete');
	}
}
