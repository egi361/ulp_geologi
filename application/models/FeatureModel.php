<?php
class FeatureModel extends CI_Model{
private $nama_tabel='feature';
private $primary='id_feature';
public function __construct(){
parent::__construct();
}
function simpan($feature){
$this->db->insert("role_feature",$feature);
}
function getMenuByRole($id_role){
return $this->db->query("select f.feature_name,f.controller,f.icon 
						from role_feature rf join role r on rf.id_role=r.id_role 
						join feature f on rf.id_feature=f.id_feature 
						where rf.id_role=$id_role");
}
function update($id,$stock){
$this->db->where($this->primary,$id);
$this->db->update($this->nama_tabel,$stock);
}
function hapus($id){
$this->db->where($this->primary,$id);
$this->db->delete("role_feature");
}
function getRole_feature_join_feature($id_role){
$data=$this->db->query("SELECT * FROM (select  rf.id_role_feature,f.id_feature,f.feature_name from role_feature rf join role r on rf.id_role=r.id_role join feature f on rf.id_feature=f.id_feature
 where rf.id_role=$id_role
 union
select  null,f.id_feature,f.feature_name from feature f where
              f.id_feature not in(select f.id_feature from role_feature rf join role r on rf.id_role=r.id_role join feature f on rf.id_feature=f.id_feature  where rf.id_role=$id_role)
              
              )u");
			  return $data->result();
}
}