		

        <!-- Main content -->
        <section class="content">
          <div class="box">
                <div class="box-header with-border">
				  <!-- <i class="fa fa-caret-down pull-right btn" id="tombol-form"></i> -->
				  <button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>				  
				  <a id="add"class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Add</a>	
				  <a id="button-edit"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Update</a>	
				  <a id="button-delete"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-trash"></i> Delete</a>		  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                  <div class="box-body animated fadeInUpBig" id="box-content">
				  <div class="col-lg-3">
				  <table id="TableEvent" class="table table-bordered table-striped responsive-table">
                    <thead>
					<tr>
                        <th>Event Name</th>
                      </tr>
                    </thead>
                    <tbody>
					</tbody>
					</table>
					</div>
					<div class='col-lg-9'>
					<input type="hidden" name="id_event" id="id_event"/>
                    <table id="TableContent" class="table dataTable table-bordered table-striped table-condensed responsive-table">
                    <thead>
					<tr>
                        <th>Description</th>
						<th>File Name</th>
						<th>Preview</th>
                      </tr>
                    </thead>
                    <tbody>
					</tbody>
					</table>

					</div>
                  </div><!-- /.box-body -->
				  <div class="box-footer">

				   </div>
              </div><!-- /.box -->
        </section><!-- /.content -->
		<script>
		$(document).ready(function(){
		var table=$('#TableEvent').DataTable({
					  "dom":"<'col-sm-12 pull-left'f>t<'col-sm-12 center'p>",
					  "paging": true,
					  "responsive": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true,
					  "fnRowCallback":function(Row,Data){
									  $(Row).attr('id',Data[5]);
									  return Row;
					  },
					  "ajax":{
								"url":"Event/getEvent",
								"type":"GET"
								},
					  "fnInitComplete":function(){
					  $("#id_event").val($('#TableEvent tr:eq(1)').attr('id'));
					  $("#add").attr('href','#EventContent/insert/'+$("#id_event").val());
					  $('#TableEvent tr:eq(1)').addClass('selected');
													  var table=$('#TableContent').DataTable({
													  "dom":'t',
													  "paging": true,
													  "ordering": true,
													  "info": true,
													  "autoWidth": true,
													  "serverSide":true,
													  "fnRowCallback":function(Row,Data){
																	  $(Row).attr('id',Data[3]);
																	  $("td:eq(2)",Row).html('<img src="<?=base_url()?>image/'+Data[1]+'" width="40%">');
																	  return Row;
													  },
													  "ajax":{
																"url":"EventContent/getFile",
																"type":"GET",
																"data":function(d){
																		d.id_event=$("#id_event").val()
																}
																}
													});
					  
					  }
					});	
		
					$('#form-feature').on('click','input[type="checkbox"]',function(){
						var action="";
						if(this.checked==true){
						if(this.value=="null"){
						$('#form-feature input[name="action['+this.id+']"]').val('insert');
						}
						else{
						$('#form-feature input[name="action['+this.id+']"]').val('');
						}
						}
						else{
						if(this.value=="null"){
						$('#form-feature input[name="action['+this.id+']"]').val('');
						}
						else{
						$('#form-feature input[name="action['+this.id+']"]').val('delete');
						}
						}
					})
					$('#TableEvent').on('click','tbody tr',function(){
								$('#TableEvent tbody tr').removeClass('selected')
								$(this).addClass('selected')
								$('#id_event').val(this.id);
								$("#add").attr('href','#EventContent/insert/'+$("#id_event").val());
								$('#TableContent').DataTable().draw();
								
					})
					
					$('#TableContent').on('click','tbody tr',function(){
								if( $(this).hasClass('selected') ){
								$(this).removeClass('selected')
								$('#button-edit').addClass('disabled')
								$('#button-delete').addClass('disabled')
								}
								else{
								$('#TableContent tbody tr').removeClass('selected')
								$(this).addClass('selected')
								$('#button-edit').removeClass('disabled')
								$('#button-delete').removeClass('disabled')
								}
					})
					$("#button-edit").click(function(){
					
						var id=$("#TableContent .selected").attr('id')
						if(typeof id=='undefined'){
						alert('Please Select One Data to Edit')
						}
						else{
						$('#button-edit').addClass('disabled');
						$('#button-delete').addClass('disabled');
						document.location.hash="EventContent/edit/"+id;
						}
					})
					$("#button-delete").click(function(){
					
						var id=$("#TableContent .selected").attr('id')
						if(typeof id=='undefined'){
						alert('Please Select One Data to Edit')
						}
						else{
						if(!confirm('Are You Sure Want to Delete This Data?')){
						return false;
						}
						else{
						$('#button-delete').addClass('disabled')
						document.location.hash="EventContent/delete/"+id;
						}
						}
					})
		})
		</script>