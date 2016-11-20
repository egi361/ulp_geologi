		<table id="TableProgressKeuangan" class="table dataTable table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>Tahun</th>
					<?php if($filter == 'per-bulan'){
					?>
					<th>Bulan</th>
					<?php
					}
					?>
					<th>Total Anggaran</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<script>
		$(document).ready(function(){
			var table=$('#TableProgressKeuangan').DataTable({
			  "paging": true,
			  "responsive": true,
			  "ordering": false,
			  "info": true,
			  "ajax":{
						"url":"Pelaksanaan/get_progress_keuangan/<?=$id_pelaksanaan_kegiatan?>/<?=$filter?>",
						"type":"GET"
						}
			});	
			$('#TableProgressKeuangan').on('click','tbody tr',function(){
				if( $(this).hasClass('selected') ){
					$(this).removeClass('selected')
				}
				else{
					$('#TableProgressKeuangan tbody tr').removeClass('selected')
					$(this).addClass('selected')
				}
			})
			
		})
		</script>