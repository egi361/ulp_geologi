<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UserModel extends CI_Model{
private $nama_tabel='user';
private $primary='id_user';
public function __construct(){
parent::__construct();
}
function simpan($user){
$this->db->insert($this->nama_tabel,$user);
}
function get(){
return $this->db->query("
	select * from user u join pegawai p on p.id_pegawai = u.id_pegawai
");
}
function getById($id){
 $this->db->where($this->primary,$id);
 $data=$this->db->get($this->nama_tabel);
 return $data->row();
}
function update($id,$user){
$this->db->where($this->primary,$id);
$this->db->update($this->nama_tabel,$user);
}
function delete($id){
$this->db->where($this->primary,$id);
$this->db->delete($this->nama_tabel);
}
function cek_user($username, $password){
	$this->db->where('username', $username);
	$this->db->where('password',$password);
	$query = $this->db->query("
		select * from user u left join pegawai p on p.id_pegawai = u.id_pegawai
							 left join unit_satuan_kerja us on us.id_unit_satuan_kerja = p.id_unit_satuan_kerja
		where username = '{$username}' && password = '{$password}'
	");
	if($query->num_rows()>0){
		return $query->row();
	}
	else{
		return FALSE;
	}
}
}