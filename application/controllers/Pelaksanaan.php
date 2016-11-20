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
	
	public function view_progress($id,$filter){
		$data['id_pelaksanaan_kegiatan'] = $id; 
		$data['filter'] = $filter;
		$this->load->view('pelaksanaan/lihat_progress',$data);
	}
	
	public function get_progress_keuangan($id,$filter){
		$a = $this->PelaksanaanModel->getProgressByIdPelaksanaan($id,$filter);
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($a->result() as $result){
			$json_array=array();
			$json_array[]=$result->tahun;
			if($filter == 'per-bulan'){
				$json_array[]=$result->bulan;
			}
			$json_array[]=$result->total_anggaran;
			$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}
	
	public function get_kegiatan($metode_kegiatan){
		$data=$this->PelaksanaanModel->get_kegiatan($metode_kegiatan);
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data->result() as $result){
			$json_array=array();
			$json_array[]=$result->nama_unit;
			$json_array[]=$result->nama_kegiatan;
			$json_array[]=$result->pagu_anggaran;
			$json_array[]=$result->hps;
			$json_array[]=$result->nilai_kontrak;
			$json_array[]=$result->total_anggaran;
			$json_array[]=$result->tahun_anggaran;
			if($metode_kegiatan == 'penyedia'){
				$json_array[]=$result->nama_perusahaan;
				$json_array[]=$result->pemilihan_penyedia;
			} else {
				$json_array[]=$result->satuan_kerja;
			}
			$json_array[]=$result->tanggal_awal_pelaksanaan;
			$json_array[]=$result->tanggal_akhir_pelaksanaan;
			$json_array[]=$result->jenis_kegiatan;
			$json_array[]=$result->jenis_anggaran;
			$json_array[]=$result->jenis_belanja;
			$json_array[]=$result->id_pelaksanaan_kegiatan;
			$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
	}

	public function kegiatan($metode_kegiatan){
		$this->load->view('pelaksanaan/kegiatan',array('metode_kegiatan'=>$metode_kegiatan));
	}

	public function update_status($id,$status=null){
		if($status == 'disetujui'){
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
		} else {
			$data['status_kegiatan']='dibatalkan';
			$this->PelaksanaanModel->update_status($id,$data);
			$this->load->view('pelaksanaan/delete');
		}
	}

	public function update_statusData($id){
		$data['status_kegiatan']='disetujui';
		$this->PelaksanaanModel->update_status($id,$data);
		$data = array();
		$data['nilai_kontrak']=$this->input->post('nilai_kontrak');
		$data['tahun_anggaran']=$this->input->post('tahun_anggaran');
		$data['metode_kegiatan']=$this->input->post('metode_kegiatan');
		$data['pemilihan_penyedia']=$this->input->post('pemilihan_penyedia');
		$data['id_penyedia']=$this->input->post('id_penyedia');
		$data['id_swakelola']=$this->input->post('id_swakelola');
		$data['tanggal_awal_pelaksanaan']=$this->input->post('tanggal_awal_pelaksanaan');
		$data['tanggal_akhir_pelaksanaan']=$this->input->post('tanggal_akhir_pelaksanaan');
		$data['id_usulan_kegiatan']=$id;
		$this->PelaksanaanModel->simpan($data);
		echo 'Data Berhasil Disimpan.';
	}
	
	public function update_keuangan($id){

		$role=$this->PelaksanaanModel->getByIdPelaksanaan($id);
		$data['data']=$role;
		$this->load->view('pelaksanaan/update_keuangan',$data);
	}
	public function update_keuanganData($id){
		$data['id_pelaksanaan_kegiatan']=$id;
		$data['jumlah_anggaran']=$this->input->post('jumlah_anggaran');
		$data['tanggal_progress_keuangan']=$this->input->post('tanggal_progress_keuangan');
		$this->PelaksanaanModel->update_keuangan($data);
		echo 'Progress Keuangan telah Berhasil Di Update';
	}

}
