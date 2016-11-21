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
	
	public function progress_fisik(){
		$this->load->view( 'pelaksanaan/progress_fisik' );
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
	
	public function get_laporan_unit(){
	
		$unit = $this->PelaksanaanModel->getUnit();
		$data_laporan = array();
		$output['aaData']=array();
		foreach($unit->result() as $result_unit){
			$json_array=array();
			$json_array[] = $result_unit->kode_unit_satuan_kerja;
			$json_array[] = $result_unit->nama_unit;
			$json_array[] = $result_unit->total_pagu_anggaran;
			$pelaksanaan = $this->PelaksanaanModel->getPelaksanaanByUnit($result_unit->id_unit_satuan_kerja);
			$total_keuangan = 0;
			$total_kontrak = 0;
			foreach($pelaksanaan->result() as $result_pelaksanaan){
				$current_keuangan = $this->PelaksanaanModel->getCurrentProgressKeuangan($result_pelaksanaan->id_pelaksanaan_kegiatan);
				$total_kontrak += $result_pelaksanaan->nilai_kontrak;
				$total_keuangan += !empty($current_keuangan->row()->total_anggaran) ? $current_keuangan->row()->total_anggaran : 0;
			}
			$json_array[] = $total_kontrak != 0 ?  $total_kontrak : '';
			$json_array[] = $total_keuangan != 0 ? $total_keuangan : '';
			$json_array[] = $result_unit->id_unit_satuan_kerja ;
			
			$output['aaData'][]=$json_array;
		}
		echo json_encode($output);
		
	}
	
	public function get_kegiatan($metode_kegiatan){
		$data=$this->PelaksanaanModel->get_kegiatan($metode_kegiatan);
		$this->output->set_header('Content-Type: application/json; charset=utf-8');
		$output['aaData']=array();
		foreach($data->result() as $result){
			$current_keuangan = $this->PelaksanaanModel->getCurrentProgressKeuangan($result->id_pelaksanaan_kegiatan);
			$current_fisik = $this->PelaksanaanModel->getCurrentProgressFisik($result->id_pelaksanaan_kegiatan);
			$json_array=array();
			$json_array[]=$result->nama_unit;
			$json_array[]=$result->nama_kegiatan;
			$json_array[]=$result->pagu_anggaran;
			$json_array[]=$result->hps;
			$json_array[]=$result->nilai_kontrak;
			$json_array[]=!empty($current_keuangan->row()->total_anggaran) ? $current_keuangan->row()->total_anggaran : 0;
			$json_array[]=!empty($current_fisik->row()->current_progress) ? $current_fisik->row()->current_progress.' %' : 0;
			$json_array[]=$result->tahun_anggaran;
			if($metode_kegiatan == 'penyedia'){
				$json_array[]=$result->nama_perusahaan;
				$json_array[]=$result->pemilihan_penyedia;
			} else {
				$json_array[]=$result->jenis_jasa;
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
				$data_select[] = array('id' => $value->id_swakelola , 'text' => $value->jenis_jasa );
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
		$current_fisik = $this->PelaksanaanModel->getCurrentProgressFisik($id);
		$data['current_progress_fisik'] =  !empty($current_fisik->row()->current_progress) ? $current_fisik->row()->current_progress : 0;
		$current_keuangan = $this->PelaksanaanModel->getCurrentProgressKeuangan($id);
		$data['current_progress_keuangan'] =  !empty($current_keuangan->row()->total_anggaran) ? $current_keuangan->row()->total_anggaran : 0;
		$this->load->view('pelaksanaan/update_keuangan',$data);
	}
	public function update_keuanganData($id){
		$data['id_pelaksanaan_kegiatan']=$id;
		$data['jumlah_anggaran']=$this->input->post('jumlah_anggaran');
		$data['tanggal_progress_keuangan']=$this->input->post('tanggal_progress_keuangan');
		$this->PelaksanaanModel->update_keuangan($data);
		$data_fisik['id_pelaksanaan_kegiatan']=$id;
		$data_fisik['tanggal_progress_fisik']=$this->input->post('tanggal_progress_keuangan');
		$data_fisik['persentase_progress']=$this->input->post('persentase_progress');
		$this->PelaksanaanModel->update_fisik($data_fisik);
		echo 'Progress Keuangan telah Berhasil Di Update';
	}

}
