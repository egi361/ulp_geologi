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
			$json_array[] = $result->jenis_swakelola;
			$json_array[] = $result->satuan_kerja;
			$json_array[] = $result->id_swakelola;
			$output['aaData'][] = $json_array;
		}
		echo json_encode($output);
	}

	public function insert(){
		$this->load->view( 'penyedia/insert' );
	}

	public function insertData(){
		$data['jenis_swakelola'] = $this->input->post( 'jenis_swakelola' );
		$data['satuan_kerja'] = $this->input->post( 'satuan_kerja' );
		$this->PenyediaModel->simpan( $data );
		echo 'Data Berhasil Disimpan.';
	}

	public function edit( $id ){
		$penyedia = $this->PenyediaModel->getById( $id );

		$data['data'] = $penyedia;
		$this->load->view( 'penyedia/edit',$data );
	}

	public function editData( $id ){
		$data['jenis_swakelola'] = $this->input->post( 'jenis_swakelola' );
		$data['satuan_kerja'] = $this->input->post( 'satuan_kerja' );
		$this->PenyediaModel->update( $id,$data );
		echo 'Data Berhasil Disimpan.';
	}

	function delete( $id ){
		$this->PenyediaModel->hapus( $id );
		$this->load->view( 'swakelola/delete' );
	}
}
