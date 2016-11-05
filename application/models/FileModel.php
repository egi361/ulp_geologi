<?php
class FileModel extends CI_Model{
	
	private $nama_tabel='file';
	private $primary='id_file';

	public function __construct(){
		parent::__construct();
	}
	
	function simpan($guest_book){
		$this->db->insert($this->nama_tabel,$guest_book);
	}

	
	function get($id_event){
		return $this->db->query("select * from 
								file f join event e on f.id_event=e.id_event 
								where f.id_event='".$id_event."'");
	}
	
	function getById($id_file){
		$this->db->where($this->primary,$id_file);
		$data=$this->db->get($this->nama_tabel);
		return $data->row();
	}

	function update($id,$event){
		$this->db->where($this->primary,$id);
		$this->db->update($this->nama_tabel,$event);
	}
	
	function delete($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->nama_tabel);
	}
}