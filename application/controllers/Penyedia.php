<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Penyedia extends CController {

	public function __construct(){
		parent::__construct();
		$this->load->model( array( 'PenyediaModel' ) );
		
	}

	public function index(){
		$this->load->view( 'penyedia/index' );
	}	

	public function get(){
		$data = $this->PenyediaModel->get();
		$this->output->set_header( 'Content-Type: application/json; charset=utf-8' );
		$output['aaData'] = array();
		foreach( $data->result() as $result ){
			$json_array = array();
			$json_array[] = $result->nama_perusahaan;
			$json_array[] = $result->no_siup;
			$json_array[] = $result->no_telpon;
			$json_array[] = $result->alamat;
			$json_array[] = $result->email;
			$json_array[] = $result->penanggung_jawab;
			$json_array[] = $result->id_penyedia;
			$output['aaData'][] = $json_array;
		}
		echo json_encode($output);
	}

	public function insert(){
		$this->load->view( 'penyedia/insert' );
	}

	public function insertData(){
		$data['nama_perusahaan'] = $this->input->post( 'nama_perusahaan' );
		$data['no_siup'] = $this->input->post( 'no_siup' );
		$data['no_telpon'] = $this->input->post( 'no_telepon' );
		$data['alamat'] = $this->input->post( 'alamat' );
		$data['email'] = $this->input->post( 'email' );
		$data['penanggung_jawab'] = $this->input->post( 'penanggung_jawab' );
		$this->PenyediaModel->simpan( $data );
		echo 'Data Berhasil Disimpan.';
	}

	public function edit( $id ){
		$penyedia = $this->PenyediaModel->getById( $id );

		$data['data'] = $penyedia;
		$this->load->view( 'penyedia/edit',$data );
	}

	public function editData( $id ){
		$data['nama_perusahaan'] = $this->input->post( 'nama_perusahaan' );
		$data['no_siup'] = $this->input->post( 'no_siup' );
		$data['no_telpon'] = $this->input->post( 'no_telepon' );
		$data['alamat'] = $this->input->post( 'alamat' );
		$data['email'] = $this->input->post( 'email' );
		$data['penanggung_jawab'] = $this->input->post( 'penanggung_jawab' );
		$this->PenyediaModel->update( $id, $data );
		echo 'Data Berhasil Disimpan.';
	}

	function delete( $id ){
		$this->PenyediaModel->hapus( $id );
		$this->load->view( 'swakelola/delete' );
	}
}
