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

		$(document).ready(function(){
			var table=$('#TableProgressFisik').DataTable({
			  	"paging": true,
			  	"scrollY": "600px",
			  	"ordering": true,
			 	"fixedColumns":   {
		           	"leftColumns": 1,
		            "rightColumns": 1
	        		},
	        	"scrollX": true,
        		"scrollCollapse": true,
			 	"fnRowCallback":function(Row,Data){	 
							$(Row).attr('id',Data[0]);
							return Row;
				},
				"ajax":{
					"url":"Pelaksanaan/get_progress_fisik/<?=$tahun?>",
					"type":"GET"
				}
			});	
		})
		</script>