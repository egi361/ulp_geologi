		

        <!-- Main content -->
        <section class="content">
          <div class="box">
                <div class="box-header with-border">
				  <!-- <i class="fa fa-caret-down pull-right btn" id="tombol-form"></i> -->
				  <button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>				  
				  <a id="button-save" class="btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Save</a>			  
                </div><!-- /.box-header -->
                <!-- form start -->
				
                  <div class="box-body animated fadeInUpBig" id="box-content">
				  <div class="col-lg-3">
				  <table id="TableRole" class="table table-bordered table-striped responsive-table">
                    <thead>
					<tr>
                        <th>Role Name</th>
                      </tr>
                    </thead>
                    <tbody>
					</tbody>
					</table>
					</div>
					<div class='col-lg-9'>
					<form id="form-feature" name="form-feature" action="Feature/save" method='POST'>
					<input type='hidden' name="bind_id_feature" id="bind_id_feature"/>
					<input type='hidden' name="bind_action" id="bind_action"/>
					<input type="hidden" name="bind_id_role" id="bind_id_role"/>
                    <table id="TableFeature" class="table dataTable table-bordered table-striped table-condensed responsive-table">
                    <thead>
					<tr>
                        <th>Feature Name</th>
                      </tr>
                    </thead>
                    <tbody>
					</tbody>
					</table>
					</form>
					</div>
                  </div><!-- /.box-body -->
				  <div class="box-footer">

				   </div>
              </div><!-- /.box -->
        </section><!-- /.content -->
		<script>
		$(document).ready(function(){
		
		var table=$('#TableRole').DataTable({
					  "dom":'t',
					  "paging": true,
					  "ordering": true,
					  "info": true,
					  "autoWidth": true,
					  "ScrollX":"120",
					  "fnRowCallback":function(Row,Data){
									  $(Row).attr('id',Data[1]);
									  return Row;
					  },
					  "ajax":{
								"url":"Role/getRole",
								"type":"GET"
								},
					  "fnInitComplete":function(){
					  $("#bind_id_role").val($('#TableRole tr:eq(1)').attr('id'));
					  $('#TableRole tr:eq(1)').addClass('selected');
													  var table=$('#TableFeature').DataTable({
													  "dom":'t',
													  "paging": true,
													  "ordering": true,
													  "info": true,
													  "autoWidth": true,
													  "serverSide":true,
													  "fnRowCallback":function(Row,Data){
																	  var checked;
																	  if(Data[2]==null){
																	  checked='unchecked';
																	  }
																	  else{
																	  checked='checked';
																	  }
																	  $(Row).attr('id',Data[1]);
																	  $(Row).html('<input type="checkbox" name="check" '+checked+' id="'+Data[1]+'" value="'+Data[2]+'"><label>&nbsp;</label><input type="hidden" class="action" name="action['+Data[1]+']"/>&nbsp;&nbsp;&nbsp; '+ Data[0]+'');
																	  return Row;
													  },
													  "ajax":{
																"url":"Feature/getUser",
																"type":"GET",
																"data":function(d){
																		d.id_role=$("#bind_id_role").val()
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
					$('#TableRole').on('click','tbody tr',function(){
								$('#TableRole tbody tr').removeClass('selected')
								$(this).addClass('selected')
								$('#bind_id_role').val(this.id);
								$('#TableFeature').DataTable().draw();
								
					})
					$("#button-save").click(function(){
					var table=$('#TableFeature tr');
					var action="";
					var id_feature="";
					for(var i=1;i<table.length;i++){
					element=$('#TableFeature tr:eq('+i+')').find('.action').val();
					id_feature=$('#TableFeature tr:eq('+i+')').attr('id');
					if(element!==""){
					$("#bind_action").val($("#bind_action").val()+element+',');
					$("#bind_id_feature").val($("#bind_id_feature").val()+id_feature+',')
					}				
					}
					var controller=$("#form-feature").attr('action');
					var formData = $("#form-feature").serialize(); //mengambil isi dari form
					$.ajax({
						type    : "POST",
						url     : controller,
						data    : formData,
						success : function(html){ 									
									document.location.href="";
									$("#success-info").html(html).show();
									$("#success-info").fadeOut(8000);
									$("html,body").scrollTop(0);
								},
						complete:function(data){
						
						}
						});	

					})
		})
		</script>