<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsulanKegiatan extends CController {

	public function __construct(){
		parent::__construct();
		$this->load->model( array( 'UsulanKegiatanModel', 'UnitModel', 'UserModel' ) );
		
	}

	public function index(){
		$this->load->view( 'usulankegiatan/index' );
	}	

	public function get(){
		$data = $this->UsulanKegiatanModel->get();
		$this->output->set_header( 'Content-Type: application/json; charset=utf-8' );
		$output['aaData'] = array();
		foreach( $data->result() as $result ){
			$json_array = array();
			$json_array[] = $result->kode_usulan_kegiatan;
			$json_array[] = $result->nama_unit;
			$json_array[] = $result->tanggal_usulan;
			$json_array[] = $result->nama_kegiatan;
			$json_array[] = $result->pagu_anggaran;
			$json_array[] = $result->hps;
			$json_array[] = $result->status_kegiatan;
			$json_array[] = $result->keterangan;
			$json_array[] = $result->jenis_kegiatan;
			$json_array[] = $result->jenis_anggaran;
			$json_array[] = $result->jenis_belanja;
			$json_array[] = $result->id_usulan_kegiatan;
			$json_array[] = $result->id_unit_satuan_kerja;
			$output['aaData'][] = $json_array;
		}
		echo json_encode($output);
	}

	public function insert(){
		// $data['id'] = $this->session->userdata('id');
		// $data['nama'] = $this->session->userdata('nama');
		// $data['role'] = $this->session->userdata('role');
		// $data['id_pegawai'] = $this->session->userdata('id_pegawai');
		// $data['id_unit_satuan_kerja'] = $this->session->userdata('id_unit_satuan_kerja');

		$this->load->view( 'usulankegiatan/insert' );
	}

	public function insertData(){
		$data['kode_usulan_kegiatan'] = $this->input->post( 'kode_usulan_kegiatan' );
		$data['id_unit_satuan_kerja'] = $this->session->userdata('id_unit_satuan_kerja');
		// $data['tanggal_usulan'] = $this->input->post( 'tanggal_usulan' );
		$data['nama_kegiatan'] = $this->input->post( 'nama_kegiatan' );
		$data['pagu_anggaran'] = $this->input->post( 'pagu_anggaran' );
		$data['hps'] = $this->input->post( 'hps' );
		$data['status_kegiatan'] = 'belum disetujui';
		$data['keterangan'] = $this->input->post( 'keterangan' );
		$data['jenis_kegiatan'] = $this->input->post( 'jenis_kegiatan' );
		$data['jenis_anggaran'] = $this->input->post( 'jenis_anggaran' );
		$data['jenis_belanja'] = $this->input->post( 'jenis_belanja' );
		$this->UsulanKegiatanModel->simpan( $data );
		echo 'Data Berhasil Disimpan.';
	}

	public function edit( $id ){
		$usulankegiatan = $this->UsulanKegiatanModel->getById( $id );
		$data['data'] = $usulankegiatan;
		$this->load->view( 'usulankegiatan/edit',$data );
	}

	public function editData( $id ){
		$data['kode_usulan_kegiatan'] = $this->input->post( 'kode_usulan_kegiatan' );
		$data['id_unit_satuan_kerja'] = $this->session->userdata('id_unit_satuan_kerja');
		$data['tanggal_usulan'] = $this->input->post( 'tanggal_usulan' );
		$data['nama_kegiatan'] = $this->input->post( 'nama_kegiatan' );
		$data['pagu_anggaran'] = $this->input->post( 'pagu_anggaran' );
		$data['hps'] = $this->input->post( 'hps' );
		$data['status_kegiatan'] = $this->input->post( 'status_kegiatan' );
		$data['keterangan'] = $this->input->post( 'keterangan' );
		$data['jenis_kegiatan'] = $this->input->post( 'jenis_kegiatan' );
		$data['jenis_anggaran'] = $this->input->post( 'jenis_anggaran' );
		$data['jenis_belanja'] = $this->input->post( 'jenis_belanja' );
		$this->UsulanKegiatanModel->update( $id, $data );
		echo 'Data Berhasil Disimpan.';
	}

	function delete( $id ){
		$this->UsulanKegiatanModel->hapus( $id );
		$this->load->view( 'usulankegiatan/delete' );
	}
}
