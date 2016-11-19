		<section class="content">
          <div class="box" >
                <div class="box-header with-border">
				  <!-- <i class="fa fa-caret-down pull-right btn" id="tombol-form"></i> -->
					<button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>	
				  <a href="#Pelaksanaan/kegiatan/swakelola"class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Kegiatan Swakelola</a>
				   <a href="#Pelaksanaan/kegiatan/penyedia"class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Kegiatan Penyedia</a>
				  <a id="button-edit"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Update</a>	
                </div><!-- /.box-header -->
                <!-- form start -->

                  <div class="box-body animated fadeInUpBig" id="box-content">
                    <table id="TableUsulan" class="table dataTable table-bordered table-striped table-condensed">
                    <thead>
					<tr>
						<th>Kode Usulan Kegiatan</th>
                        <th>Nama Unit</th>
						<th>Nama Kegiatan</th>
						<th>Pagu Anggaran</th>
						<th>HPS</th>
						<th>Status Kegiatan</th>
						<th>Jenis Kegiatan</th>
						<th>Jenis Anggaran</th>
						<th>Jenis Belanja</th>
						<th>Tanggal Usulan</th>
						<th>Keterangan</th>
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
					var table=$('#TableUsulan').DataTable({
					  "paging": true,
					  "responsive": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true,
					  "fnRowCallback":function(Row,Data){
									  $(Row).attr('id',Data[11]);
									  return Row;
					  },
					  "ajax":{
								"url":"Pelaksanaan/get",
								"type":"GET"
								}
					});	
					$('#TableUsulan').on('click','tbody tr',function(){
						if( $(this).hasClass('selected') ){
							$(this).removeClass('selected')
							$('#button-edit').addClass('disabled')
							$('#button-delete').addClass('disabled')
						}
						else{
							$('#TableUsulan tbody tr').removeClass('selected')
							$(this).addClass('selected')
							$('#button-edit').removeClass('disabled')
							$('#button-delete').removeClass('disabled')
						}
					})
					$("#button-edit").click(function(){
							var id=$("#TableUsulan .selected").attr('id')
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
						var id=$("#TableUsulan .selected").attr('id')
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