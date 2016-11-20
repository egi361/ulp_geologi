<?php
class PegawaiModel extends CI_Model{
private $nama_tabel='pegawai';
private $primary='id_pegawai';
public function __construct(){
parent::__construct();
}
function simpan($role){
$this->db->insert($this->nama_tabel,$role);
}
function get(){
return $this->db->query("
	select * from pegawai p 
	join jabatan j on j.id_jabatan = p.id_jabatan
	left join unit_satuan_kerja u on u.id_unit_satuan_kerja = p.id_unit_satuan_kerja
");
}
function get_jabatan(){
return $this->db->get('jabatan');
}
function update($id,$role){
$this->db->where($this->primary,$id);
$this->db->update($this->nama_tabel,$role);
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