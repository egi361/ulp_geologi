				<form class="form-horizontal" id="form-role" action="Role/editData/<?=$data->id_role?>" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="inputEmail3" class="col-sm-2 control-label">Role Name <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="name"class="form-control" id="inputEmail3" placeholder="Name" value="<?=$data->role_name?>">
                      </div>
                    </div>					
                  </div><!-- /.box-body -->
				  <div class="box-footer">
					  <div class="col-sm-2"></div>
					  <div class="col-sm-10">				  
						<button type="reset" class="btn btn-default" id="btn-cancel">Cancel</button>
						<input type="button" class="btn btn-action" id="btn-submit" value="Save">
					  </div><!-- /.box-footer -->
				  </div>
                </form>
		<script>
		$(document).ready(function(){
			$("#btn-submit").click(function(){
				if($('#form-role').valid()){
		              global.CRUD("#form-role");
		           }else{
		             $('input, textarea').each(function(){
		                var _id = $(this).attr('name');
		                var idd = _id+'-error';
		                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
		             });
		          }
			})
			$("#btn-cancel").click(function(){
			document.location.hash='Role';
			})

			$("#form-role").validate({
	          rules: {
	              role_name: "required",
	          },
	          errorClass: "block-error error",
	          errorElement: "div",
		    })
		})
		</script>