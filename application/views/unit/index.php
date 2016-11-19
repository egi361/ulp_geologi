        <section class="content">
          <div class="box" >
                <div class="box-header with-border">
				  <!-- <i class="fa fa-caret-down pull-right btn" id="tombol-form"></i> -->
					<button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>	
				  <a href="#Unit/insert"class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Add</a>
				  <a id="button-edit"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Update</a>	
				  <a id="button-delete"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-trash"></i> Delete</a>
                </div><!-- /.box-header -->
                <!-- form start -->

                  <div class="box-body animated fadeInUpBig" id="box-content">
                    <table id="TableUnit" class="table table-bordered table-striped">
                    <thead>
					<tr>
						<th>Kode Unit</th>
                        <th>Nama Unit</th>
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
					var table=$('#TableUnit').DataTable({
					  "paging": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true,
					  "ScrollX":"120",
					  "fnRowCallback":function(Row,Data){
									  $(Row).attr('id',Data[2]);
									  return Row;
					  },
					  "ajax":{
								"url":"Unit/get",
								"type":"GET"
								}
					});	
					$('#TableUnit').on('click','tbody tr',function(){
						if( $(this).hasClass('selected') ){
							$(this).removeClass('selected')
							$('#button-edit').addClass('disabled')
							$('#button-delete').addClass('disabled')
						}
						else{
							$('#TableUnit tbody tr').removeClass('selected')
							$(this).addClass('selected')
							$('#button-edit').removeClass('disabled')
							$('#button-delete').removeClass('disabled')
						}
					})
					$("#button-edit").click(function(){
							var id=$("#TableUnit .selected").attr('id')
							if(typeof id=='undefined'){
							alert('Please Select One Data to Edit')
						}
						else{
							$('#button-edit').addClass('disabled');
							$('#button-delete').addClass('disabled');
							document.location.hash="Unit/edit/"+id;
						}
					})
					$("#button-delete").click(function(){
						var id=$("#TableUnit .selected").attr('id')
						if(typeof id=='undefined'){
							alert('Please Select One Data to Delete')
						}
						else{
							if(!confirm('Are You Sure Want to Delete This Data?')){
								return false;
							}
							else{
								$('#button-delete').addClass('disabled')
								document.location.hash="Unit/delete/"+id;
							}
						}
					})
		})
		</script>