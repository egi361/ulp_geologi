<?php
class UsulanKegiatanModel extends CI_Model{

	private $nama_tabel='usulan_kegiatan';
	private $primary='id_usulan_kegiatan';
	
	public function __construct(){
		parent::__construct();
	}

	function simpan($role){
		$this->db->insert($this->nama_tabel,$role);
	}

	function get(){
		$id_unit = $this->session->userdata('role') == 11 ? $this->session->userdata('id_unit_satuan_kerja') : "%%";
		return $this->db->query("
			select * from usulan_kegiatan uk
						  left join unit_satuan_kerja usk on usk.id_unit_satuan_kerja = uk.id_unit_satuan_kerja
			where uk.id_unit_satuan_kerja like '{$id_unit}'
		");
	}

	function update($id,$role){
		$this->db->where($this->primary,$id);
		$this->db->update( $this->nama_tabel,$role );
	}

	function getById($id){
		$this->db->where($this->primary,$id);
		$data=$this->db->get($this->nama_tabel);
		return $data->row();
	}

	function hapus($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->nama_tabel);
	}
}