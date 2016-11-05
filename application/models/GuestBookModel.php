<?php
class GuestBookModel extends CI_Model{
	
	private $nama_tabel='guest_book';
	private $primary='id_guest_book';

	public function __construct(){
		parent::__construct();
	}
	
	function simpan($guest_book){
		$this->db->insert($this->nama_tabel,$guest_book);
	}
	function insertTransaction($data){
		$this->db->insert("transaksi",$data);
	}
	function getKabupaten(){
	return $this->db->get("kabupaten");
	}
	function getProvinsi(){
	return $this->db->get("provinsi");
	}
	
	function get($id_event='asdfasdf'){
		return $this->db->query("select * from 
								guest_book gb join event e on gb.id_event=e.id_event 
								join kabupaten k on gb.city=k.id
								join provinsi p on gb.provinsi=p.id
								where gb.id_event = '".$id_event."'");
	}
	function getCurrentEvent(){
		return $this->db->query("select * from event where date_start='".date('Y-m-d')."'");
	}
	
	function getById($id){
		$this->db->where($this->primary,$id);
		$data=$this->db->get($this->nama_tabel);
		return $data->row();
	}
	function getTransactionById($id){
		$this->db->where("id_guest_book",$id);
		$data=$this->db->get("transaksi");
		return $data->result();
	}
	function getDetailTransactionById($id){
		$this->db->where("id_transaksi",$id);
		$data=$this->db->get("transaksi");
		return $data->row();
	}

	function update($id,$event){
		$this->db->where($this->primary,$id);
		$this->db->update($this->nama_tabel,$event);
	}
	function updateTransaction($id,$event){
		$this->db->where("id_transaksi",$id);
		$this->db->update("transaksi",$event);
	}
	function deleteTransaction($id){
		$this->db->where("id_transaksi",$id);
		$this->db->delete("transaksi");
	}
	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->nama_tabel);
	}
}