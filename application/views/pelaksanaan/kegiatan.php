		<table id="TableKegiatan" metode-kegiatan="<?=$metode_kegiatan?>"  class="table dataTable table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>Nama Unit</th>
					<th>Nama Kegiatan</th>
					<th>Pagu Anggaran</th>
					<th>HPS</th>
					<th>Nilai Kontrak</th>
					<th>Progress Keuangan</th>
					<th>Tahun Anggaran</th>
					<?php
					if($metode_kegiatan == 'penyedia'){
					?>
					<th>Penyedia</th>
					<th>Pemilihan</th>
					<?php
					} else {
					?>
					<th>Swakelola</th>
					<?php
					}
					?>
					<th>Awal Pelaksanaan</th>
					<th>Akhir Pelaksanaan</th>
					<th>Jenis Kegiatan</th>
					<th>Jenis Anggaran</th>
					<th>Jenis Belanja</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<script>
		$(document).ready(function(){
			var table=$('#TableKegiatan').DataTable({
			  "paging": true,
			  "responsive": true,
			  "ordering": true,
			  "info": true,
			  "fnRowCallback":function(Row,Data){
							  if($('#TableKegiatan').attr('metode-kegiatan') == 'penyedia'){
								 $(Row).attr('id',Data[14]);
							  } else {
								 $(Row).attr('id',Data[13]);
							  }
							 
							  return Row;
			  },
			  "ajax":{
						"url":"Pelaksanaan/get_kegiatan/<?=$metode_kegiatan?>",
						"type":"GET"
						}
			});	
			$('#TableKegiatan').on('click','tbody tr',function(){
				if( $(this).hasClass('selected') ){
					$(this).removeClass('selected')
					$('#button-update-fisik').addClass('disabled');
					$('#button-update-keuangan').addClass('disabled');
					$('#button-view-progress').addClass('disabled');
					$('#button-view-progress-tahun').addClass('disabled');
				}
				else{
					$('#TableKegiatan tbody tr').removeClass('selected')
					$(this).addClass('selected')
					$('#button-update-fisik').removeClass('disabled');
					$('#button-update-keuangan').removeClass('disabled');
					$('#button-view-progress').removeClass('disabled');
					$('#button-view-progress-tahun').removeClass('disabled');
				}
			})
			
		})
		</script>