<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pelaksanaan extends CController {
	public function __construct()
	{
		parent::__construct();
		$this->load->model(array('PelaksanaanModel','PenyediaModel','SwakelolaModel'));
		
	}
	public function index(){
		$this->load->view('pelaksanaan/index');
	}	

	public function get(){
		$data=$this->PelaksanaanModel->get_usulan();
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data->result() as $result){
			$json_array=array();
			$json_array[]=$result->kode_usulan_kegiatan;
			$json_array[]=$result->nama_unit;
			$json_array[]=$result->nama_kegiatan;
			$json_array[]=$result->pagu_anggaran;
			$json_array[]=$result->hps;
			$json_array[]=$result->status_kegiatan;
			$json_array[]=$result->jenis_kegiatan;
			$json_array[]=$result->jenis_anggaran;
			$json_array[]=$result->jenis_belanja;
			$json_array[]=$result->tanggal_usulan;
			$json_array[]=$result->keterangan;
			$json_array[]=$result->id_usulan_kegiatan;
			$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}

	public function insert(){
		$this->load->view('pelaksanaan/insert');
	}

	public function insertData(){
		$data['role_name']=$this->input->post('role_name');
		$this->PelaksanaanModel->simpan($data);
		echo 'Data Berhasil Disimpan.';
	}

	public function update_status($id,$status=null){
		$role=$this->PelaksanaanModel->getById($id);
		$penyedia = $this->PenyediaModel->get();
		$data_select = array();
		foreach ($penyedia->result() as $key => $value) {
			$data_select[] = array('id' => $value->id_penyedia , 'text' => $value->nama_perusahaan );
		}
		$data['penyedia'] = json_encode($data_select);
		$swakelola = $this->SwakelolaModel->get();
		$data_select = array();
		foreach ($swakelola->result() as $key => $value) {
			$data_select[] = array('id' => $value->id_swakelola , 'text' => $value->satuan_kerja );
		}
		$data['swakelola'] = json_encode($data_select);
		$data['data']=$role;
		$this->load->view('pelaksanaan/update_status',$data);
	}

	public function update_statusData($id){
		$data['role_name']=$this->input->post('name');
		$this->PelaksanaanModel->update($id,$data);
		echo 'Data Berhasil Disimpan.';
	}

	function delete($id){
		$this->PelaksanaanModel->hapus($id);
		$this->load->view('pelaksanaan/delete');
	}
}
