		<table id="TableKegiatan" metode-kegiatan="<?=$metode_kegiatan?>"  class="table dataTable table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>Nama Unit</th>
					<th>Nama Kegiatan</th>
					<th>Pagu Anggaran</th>
					<th>HPS</th>
					<th>Nilai Kontrak</th>
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
					  "autoWidth": true,
					  "fnRowCallback":function(Row,Data){
									  if($('#TableKegiatan').attr('metode-kegiatan') == 'penyedia'){
										 $(Row).attr('id',Data[13]);
									  } else {
										 $(Row).attr('id',Data[12]);
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
							$('#button-edit').addClass('disabled')
							$('#button-delete').addClass('disabled')
						}
						else{
							$('#TableKegiatan tbody tr').removeClass('selected')
							$(this).addClass('selected')
							$('#button-edit').removeClass('disabled')
							$('#button-delete').removeClass('disabled')
						}
					})
					$("#button-edit").click(function(){
							var id=$("#TableKegiatan .selected").attr('id')
							if(typeof id=='undefined'){
							alert('Please Select One Data to Edit')
						}
						else{
							$('#button-edit').addClass('disabled');
							$('#button-delete').addClass('disabled');
							document.location.hash="Pelaksanaan/update_status/"+id;
						}
					})
					$("#button-delete").click(function(){
						var id=$("#TableKegiatan .selected").attr('id')
						if(typeof id=='undefined'){
							alert('Please Select One Data to Delete')
						}
						else{
							if(!confirm('Are You Sure Want to Delete This Data?')){
								return false;
							}
							else{
								$('#button-delete').addClass('disabled')
								document.location.hash="Pelaksanaan/delete/"+id;
							}
						}
					})
		})
		</script>