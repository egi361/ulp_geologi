<?php
class PelaksanaanModel extends CI_Model{
private $nama_tabel='usulan_kegiatan';
private $primary='id_usulan_kegiatan';
public function __construct(){
parent::__construct();
}
function simpan($role){
$this->db->insert('pelaksanaan_kegiatan',$role);
}
function get_kegiatan($metode_kegiatan){
return $this->db->query("
	select * from usulan_kegiatan uk left join unit_satuan_kerja us on us.id_unit_satuan_kerja = uk.id_unit_satuan_kerja
									 left join pelaksanaan_kegiatan pk on pk.id_usulan_kegiatan = uk.id_usulan_kegiatan
									 left join penyedia p on p.id_penyedia = pk.id_penyedia
									 left join swakelola s on s.id_swakelola = pk.id_swakelola
	where pk.metode_kegiatan = '{$metode_kegiatan}'
");
}

function get_usulan(){
return $this->db->query("
	select * from usulan_kegiatan uk left join unit_satuan_kerja us on us.id_unit_satuan_kerja = uk.id_unit_satuan_kerja
");
}
function update($id,$role){
$this->db->where('id_pelaksanaan_kegiatan',$id);
$this->db->update('pelaksanaan_kegiatan',$role);
}
function update_status($id,$role){
$this->db->where($this->primary,$id);
$this->db->update($this->nama_tabel,$role);
}
function getById($id){
$data=$this->db->query("
	select * from usulan_kegiatan uk left join unit_satuan_kerja us on us.id_unit_satuan_kerja = uk.id_unit_satuan_kerja
	where uk.id_usulan_kegiatan = '{$id}'
");
return $data->row();
}
function hapus($id){
$this->db->where($this->primary,$id);
$this->db->delete($this->nama_tabel);
}
}