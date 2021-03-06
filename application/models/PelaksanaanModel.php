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
function getUnit(){
	$data_unit = $this->db->query("
		select usk.id_unit_satuan_kerja,
			   usk.kode_unit_satuan_kerja,
			   usk.nama_unit,
			   sum( uk.pagu_anggaran ) as total_pagu_anggaran
		from unit_satuan_kerja usk
		left join usulan_kegiatan uk on uk.id_unit_satuan_kerja = usk.id_unit_satuan_kerja && uk.status_kegiatan = 'disetujui'
		group by usk.id_unit_satuan_kerja
	");
	return $data_unit;
}
function getPelaksanaanByUnit($id_unit){
	$data_unit = $this->db->query("
		select pk.nilai_kontrak, pk.id_pelaksanaan_kegiatan
		from pelaksanaan_kegiatan pk
		join usulan_kegiatan uk on uk.id_usulan_kegiatan = pk.id_usulan_kegiatan && uk.id_unit_satuan_kerja = '{$id_unit}'
	");
	return $data_unit;
}
function getPKperMonth($month,$year,$id_pk){

return $this->db->query("
	select sum(pku.jumlah_anggaran) as total_anggaran
	from pelaksanaan_kegiatan pk 
		left join progress_keuangan pku on pku.id_pelaksanaan_kegiatan = pk.id_pelaksanaan_kegiatan
	where month(pku.tanggal_progress_keuangan) = '{$month}' and 
		  year(pku.tanggal_progress_keuangan) = '{$year}' and 
		  pk.id_pelaksanaan_kegiatan = '{$id_pk}'
");
}

function getPFperMonth($month,$year,$id_pk){

return $this->db->query("
	select *
	from pelaksanaan_kegiatan pk 
		left join progress_fisik pkf on pkf.id_pelaksanaan_kegiatan = pk.id_pelaksanaan_kegiatan
	where month(pkf.tanggal_progress_fisik) = '{$month}' and 
		  year(pkf.tanggal_progress_fisik) = '{$year}' and 
		  pk.id_pelaksanaan_kegiatan = '{$id_pk}'
");
}

function get_kegiatan($metode_kegiatan){
	$id_unit = $this->session->userdata('role') == 11 ? $this->session->userdata('id_unit_satuan_kerja') : "%%";
	return $this->db->query("
	select *
	from pelaksanaan_kegiatan pk 
		left join usulan_kegiatan uk on pk.id_usulan_kegiatan = uk.id_usulan_kegiatan
		left join unit_satuan_kerja us on us.id_unit_satuan_kerja = uk.id_unit_satuan_kerja and uk.status_kegiatan = 'disetujui'
		left join penyedia p on p.id_penyedia = pk.id_penyedia
		left join swakelola s on s.id_swakelola = pk.id_swakelola
	where pk.metode_kegiatan like '{$metode_kegiatan}' and uk.id_unit_satuan_kerja like '{$id_unit}'
	group by pk.id_pelaksanaan_kegiatan
		");
	}

	function get_kegiatan_report(){
		$id_unit = $this->session->userdata('role') == 11 ? $this->session->userdata('id_unit_satuan_kerja') : "%%";
		return $this->db->query("
			select *,sum(pkn.jumlah_anggaran) as total_anggaran, pk.id_pelaksanaan_kegiatan
			from pelaksanaan_kegiatan pk 
				left join usulan_kegiatan uk on pk.id_usulan_kegiatan = uk.id_usulan_kegiatan
				left join unit_satuan_kerja us on us.id_unit_satuan_kerja = uk.id_unit_satuan_kerja
				left join penyedia p on p.id_penyedia = pk.id_penyedia
				left join swakelola s on s.id_swakelola = pk.id_swakelola
				left join progress_keuangan pkn on pkn.id_pelaksanaan_kegiatan = pk.id_pelaksanaan_kegiatan
			where uk.id_unit_satuan_kerja like '{$id_unit}'
			group by pk.id_pelaksanaan_kegiatan
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
	function update_keuangan($role){
		$this->db->insert('progress_keuangan',$role);
	}
	function update_fisik($role){
		$this->db->insert('progress_fisik',$role);
	}
	function getById($id){
		$data=$this->db->query("
			select * from usulan_kegiatan uk left join unit_satuan_kerja us on us.id_unit_satuan_kerja = uk.id_unit_satuan_kerja
			where uk.id_usulan_kegiatan = '{$id}'
		");
		return $data->row();
	}
	function getByIdPelaksanaan($id){
		$data=$this->db->query("
			select * from pelaksanaan_kegiatan pk 
				left join usulan_kegiatan uk on pk.id_usulan_kegiatan = uk.id_usulan_kegiatan 
				left join unit_satuan_kerja us on us.id_unit_satuan_kerja = uk.id_unit_satuan_kerja
			where pk.id_pelaksanaan_kegiatan = '{$id}'
		");
		return $data->row();
	}
	function getProgressByIdPelaksanaan($id,$filter = 'per-tahun'){
		switch($filter){
			case 'per-tahun':
				$data=$this->db->query("
					select YEAR(tanggal_progress_keuangan) as tahun,  
							sum(jumlah_anggaran) as total_anggaran 
					from progress_keuangan where id_pelaksanaan_kegiatan = '{$id}'
					group by YEAR(tanggal_progress_keuangan)
					order by  id_progress_keuangan DESC
					
				");
				break;
			case 'per-bulan':
				$data=$this->db->query("
					select YEAR(tanggal_progress_keuangan) as tahun, 
							MONTHNAME(tanggal_progress_keuangan) as bulan,
							sum(jumlah_anggaran) as total_anggaran
					from progress_keuangan 
					where id_pelaksanaan_kegiatan = '{$id}'
					group by Month(tanggal_progress_keuangan), Year(tanggal_progress_keuangan)
					order by  id_progress_keuangan DESC
				");
				break;
		}

		return $data;
	}
	function getCurrentProgressFisik($id){

		$data=$this->db->query("
			select max( persentase_progress ) as current_progress
			from progress_fisik
			where id_pelaksanaan_kegiatan = '{$id}'
			group by id_pelaksanaan_kegiatan
		");

		return $data;	
	}

	function getListProgressFisik( $month, $year, $id ){
		$data=$this->db->query("
			select pf.*
			from progress_fisik pf
			where month(pf.tanggal_progress_fisik) = '{$month}' and 
		  	year(pf.tanggal_progress_fisik) = '{$year}' and 
		  	pf.id_pelaksanaan_kegiatan = '{$id}'
			
		");

		return $data;	
	}

	function getCurrentProgressKeuangan($id){

		$data=$this->db->query("
			select sum(jumlah_anggaran) as total_anggaran
			from progress_keuangan 
			where id_pelaksanaan_kegiatan = '{$id}'
			group by id_pelaksanaan_kegiatan
		");

		return $data;
	}
	function hapus($id){
		$this->db->where($this->primary,$id);
		$this->db->delete($this->nama_tabel);
	}
}