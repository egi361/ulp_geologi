
<section class="content">
	<div class="box" >
    	<div class="box-header with-border">
		  <!-- <i class="fa fa-caret-down pull-right btn" id="tombol-form"></i> -->
			<button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>	
			<!-- <a href="#Report/kegiatan/swakelola" class="kegiatan-swakelola btn btn-primary btn-sm" style="margin-right: 5px;"> Kegiatan Swakelola</a>
			<a href="#Report/kegiatan/penyedia" class="kegiatan-penyedia btn btn-primary btn-sm" style="margin-right: 5px;"> Kegiatan Penyedia</a>
			<a id="button-update-keuangan"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Update Progress Keuangan</a>	
			<a id="button-view-progress"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-eye"></i> Lihat Progress Per-Bulan</a>
			<a id="button-view-progress-tahun"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-eye"></i> Lihat Progress Per-Tahun</a> -->
		</div><!-- /.box-header -->
        <!-- form start -->

        <div class="box-body animated fadeInUpBig" id="box-content">
			<table id="TableReport" class="table table-bordered table-striped">
				<thead>
				<tr>

				    <th>Tahun Anggaran</th>
				    <th>Unit</th>
				    <th>Kegiatan</th>
				    <th>Metode Kegiatan</th>
					<th>Pagu</th>
					<th>HPS</th>
					<th>Progress Keuangan</th>
					<th>Sisa</th>
					<th>Progress Fisik</th>
				</tr>
				</thead>
				<tbody>
				</tbody>
			</table>
        </div><!-- /.box-body -->
		<div class="box-footer">

		</div>
    </div><!-- /.box -->
</section><!-- /.content -->
<script>

$(document).ready(function(){
    var table=$('#TableReport').DataTable({
      "paging": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
      "ScrollX":"120",
      "fnRowCallback":function(Row,Data){
                      $(Row).attr('id',Data[10]);
                      return Row;
      },
      "ajax":{
                "url":"Report/get_report",
                "type":"GET"
                }
    }); 
    $('#TableReport').on('click','tbody tr',function(){
        if( $(this).hasClass('selected') ){
            $(this).removeClass('selected')
            $('#button-edit').addClass('disabled')
            $('#button-delete').addClass('disabled')
        }
        else{
            $('#TableReport tbody tr').removeClass('selected')
            $(this).addClass('selected')
            $('#button-edit').removeClass('disabled')
            $('#button-delete').removeClass('disabled')
        }
    })
    // $("#button-edit").click(function(){
    //     var id=$("#TableReport .selected").attr('id')
    //     if(typeof id=='undefined'){
    //         alert('Please Select One Data to Edit')
    //     }
    //     else{
    //         $('#button-edit').addClass('disabled');
    //         $('#button-delete').addClass('disabled');
    //         document.location.hash="Swakelola/edit/"+id;
    //     }
    // })
    // $("#button-delete").click(function(){
    //     var id=$("#TableReport .selected").attr('id')
    //     if(typeof id=='undefined'){
    //         alert('Please Select One Data to Delete')
    //     }
    //     else{
    //         if(!confirm('Are You Sure Want to Delete This Data?')){
    //             return false;
    //         }
    //         else{
    //             $('#button-delete').addClass('disabled')
    //             document.location.hash="Swakelola/delete/"+id;
    //         }
    //     }
    // })
})

// $(document).on('controllerReady',function(e,controller){
// 	// if(controller == 'Report'){
// 	// 	document.location.hash='Report/kegiatan/';
// 	// }
// 	$("#button-update-fisik").click(function(){
// 			var id=$("#TableKegiatan .selected").attr('id')
// 		if(typeof id=='undefined'){
// 			alert('Please Select One Data to Edit')
// 		}
// 		else{
// 			$('#button-update-fisik').addClass('disabled');
// 			$('#button-update-keuangan').addClass('disabled');
// 			$('#button-view-progress').addClass('disabled');
// 			$('#button-view-progress-tahun').addClass('disabled');
// 			document.location.hash="Pelaksanaan/update_fisik/"+id;
// 		}
// 	})
// 	$("#button-update-keuangan").click(function(){
// 			var id=$("#TableKegiatan .selected").attr('id')
// 		if(typeof id=='undefined'){
// 			alert('Please Select One Data to Edit')
// 		}
// 		else{
// 			$('#button-update-fisik').addClass('disabled');
// 			$('#button-update-keuangan').addClass('disabled');
// 			$('#button-view-progress').addClass('disabled');
// 			$('#button-view-progress-tahun').addClass('disabled');
// 			document.location.hash="Pelaksanaan/update_keuangan/"+id;
// 		}
// 	})
// 	$("#button-view-progress").click(function(){
// 			var id=$("#TableKegiatan .selected").attr('id')
// 		if(typeof id=='undefined'){
// 			alert('Please Select One Data to Edit')
// 		}
// 		else{
// 			$('#button-update-fisik').addClass('disabled');
// 			$('#button-update-keuangan').addClass('disabled');
// 			$('#button-view-progress').addClass('disabled');
// 			$('#button-view-progress-tahun').addClass('disabled');
// 			document.location.hash="Pelaksanaan/view_progress/"+id+"/per-bulan";
// 		}
// 	})
// 	$("#button-view-progress-tahun").click(function(){
// 			var id=$("#TableKegiatan .selected").attr('id')
// 		if(typeof id=='undefined'){
// 			alert('Please Select One Data to Edit')
// 		}
// 		else{
// 			$('#button-update-fisik').addClass('disabled');
// 			$('#button-update-keuangan').addClass('disabled');
// 			$('#button-view-progress').addClass('disabled');
// 			$('#button-view-progress-tahun').addClass('disabled');
// 			document.location.hash="Pelaksanaan/view_progress/"+id+'/per-tahun';
// 		}
// 	})
// })



</script>