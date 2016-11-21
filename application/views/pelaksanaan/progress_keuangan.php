		<center><h1>Tahun <?=$tahun?></h1></center><br>
		<table id="TableProgressKeuanganUnit" class="table dataTable table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>Kode Unit</th>
					<!--<th>Nama Unit</th>-->
					<th>Total Pagu</th>
					<th>Total Nilai Kontrak</th>
					<th>Januari</th>
					<th>Februari</th>
					<th>Maret</th>
					<th>April</th>
					<th>Mei</th>
					<th>Juni</th>
					<th>Juli</th>
					<th>Agustus</th>
					<th>September</th>
					<th>Oktober</th>
					<th>Nopember</th>
					<th>Desember</th>
					<th>Total Progress</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
		</table>
		<br>
		<table id="TableProgressKeuangan" class="table dataTable table-bordered table-striped table-condensed">
			<thead>
				<tr>
					<th>Kode Unit</th>
					<th>Nama Kegiatan</th>
					<th>Januari</th>
					<th>Februari</th>
					<th>Maret</th>
					<th>April</th>
					<th>Mei</th>
					<th>Juni</th>
					<th>Juli</th>
					<th>Agustus</th>
					<th>September</th>
					<th>Oktober</th>
					<th>Nopember</th>
					<th>Desember</th>
					<th>Total</th>
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
			  "ordering": true,
			  "info": true,
			  "fnRowCallback":function(Row,Data){
								 $(Row).attr('id',Data[0]);							 
							  return Row;
			  },
			  "ajax":{
						"url":"Pelaksanaan/getProgressKeuangan/<?=$tahun?>",
						"type":"GET"
						}
			});	
			var table=$('#TableProgressKeuanganUnit').DataTable({
			  "paging": true,
			  "responsive": true,
			  "ordering": true,
			  "info": true,
			  "fnRowCallback":function(Row,Data){
								 $(Row).attr('id',Data[0]);							 
							  return Row;
			  },
			  "ajax":{
						"url":"Pelaksanaan/getProgressKeuanganUnit/<?=$tahun?>",
						"type":"GET"
						}
			});	
			$('#TableProgressKeuangan').on('click','tbody tr',function(){
				if( $(this).hasClass('selected') ){
					$(this).removeClass('selected')
					$('#button-update-fisik').addClass('disabled');
					$('#button-update-keuangan').addClass('disabled');
					$('#button-view-progress').addClass('disabled');
					$('#button-view-progress-tahun').addClass('disabled');
				}
				else{
					$('#TableProgressKeuangan tbody tr').removeClass('selected')
					$(this).addClass('selected')
					$('#button-update-fisik').removeClass('disabled');
					$('#button-update-keuangan').removeClass('disabled');
					$('#button-view-progress').removeClass('disabled');
					$('#button-view-progress-tahun').removeClass('disabled');
				}
			})
			
		})
		</script>