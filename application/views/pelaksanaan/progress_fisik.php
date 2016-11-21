		<table id="TableProgressFisik" class="table dataTable table-bordered table-striped table-condensed">
			<thead>
				<tr>
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
		// $(document).ready(function(){
		// 	var table=$('#TableKegiatan').DataTable({
		// 	  "paging": true,
		// 	  "responsive": true,
		// 	  "ordering": true,
		// 	  "info": true,
		// 	  "fnRowCallback":function(Row,Data){
		// 					  if($('#TableKegiatan').attr('metode-kegiatan') == 'penyedia'){
		// 						 $(Row).attr('id',Data[15]);
		// 					  } else {
		// 						 $(Row).attr('id',Data[14]);
		// 					  }
							 
		// 					  return Row;
		// 	  },
		// 	  "ajax":{
		// 				"url":"Pelaksanaan/get_kegiatan/<?=$metode_kegiatan?>",
		// 				"type":"GET"
		// 				}
		// 	});	
		// 	$('#TableKegiatan').on('click','tbody tr',function(){
		// 		if( $(this).hasClass('selected') ){
		// 			$(this).removeClass('selected')
		// 			$('#button-update-fisik').addClass('disabled');
		// 			$('#button-update-keuangan').addClass('disabled');
		// 			$('#button-view-progress').addClass('disabled');
		// 			$('#button-view-progress-tahun').addClass('disabled');
		// 		}
		// 		else{
		// 			$('#TableKegiatan tbody tr').removeClass('selected')
		// 			$(this).addClass('selected')
		// 			$('#button-update-fisik').removeClass('disabled');
		// 			$('#button-update-keuangan').removeClass('disabled');
		// 			$('#button-view-progress').removeClass('disabled');
		// 			$('#button-view-progress-tahun').removeClass('disabled');
		// 		}
		// 	})
			
		// })
		</script>