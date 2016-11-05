<?php
class EventModel extends CI_Model{
	
	private $nama_tabel='event';
	private $primary='id_event';

	public function __construct(){
		parent::__construct();
	}
	
	function simpan($event){
		$this->db->insert($this->nama_tabel,$event);
	}
	
	function get(){
		return $this->db->get($this->nama_tabel);
	}
	function getCurrentEvent(){
		$now=date('Y-m-d h:i:sa');
                $data = array();
                $data = $this->db->query("SELECT * FROM event where curdate() between date_start and date_end");
                if($data)
                  return $this->db->query("SELECT * FROM event where curdate() between date_start and date_end");
	}
	function getContentById($id){
		$this->db->where("id_event",$id);
		$data=$this->db->get("file");
		return $data->result();
	}
	
	function getById($id){
		$this->db->where($this->primary,$id);
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