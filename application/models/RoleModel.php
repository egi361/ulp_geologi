<?php
class RoleModel extends CI_Model{
private $nama_tabel='role';
private $primary='id_role';
public function __construct(){
parent::__construct();
}
function simpan($role){
$this->db->insert($this->nama_tabel,$role);
}
function get(){
return $this->db->get($this->nama_tabel);
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