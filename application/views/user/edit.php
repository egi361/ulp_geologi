				<form class="form-horizontal" id="form-user" action="User/editData/<?=$data->id_user?>" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="name" class="col-sm-2 control-label">Name <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="name"class="form-control" id="name" placeholder="Name" value="<?=$data->nama?>">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="address" class="col-sm-2 control-label">Address</label>
                      <div class="col-sm-9">
                        <textarea  class="form-control" id="address" name="address"placeholder="Address"><?=$data->alamat?></textarea>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="email" class="col-sm-2 control-label">email</label>
                      <div class="col-sm-9">
                        <input type="email" class="form-control" id="email" name="email"placeholder="Email" value="<?=$data->email?>">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="user_role_hidden" class="col-sm-2 control-label">Role Access <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <select class="form-control" id="user_role" name="role_id" placeholder="Pilih Role"></select>
						<input type="hidden" name="user_role_hidden" id="user_role_hidden" value=""/>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="username" class="col-sm-2 control-label">Username <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" value="<?=$data->username?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password" class="col-sm-2 control-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password"id="password" placeholder="Password" value="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label for="password_confirm" class="col-sm-2 control-label">Ulangi Password</label>
                      <div class="col-sm-9">
                        <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="Password Confirm">
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
		var data_select = <?php echo $model;?>;
			$('#user_role').select2({data:data_select});
			$('#user_role').select2('val','<?=$data->id_role?>');
			$("#btn-submit").click(function(){
			     if($('#form-user').valid()){
            global.CRUD("#form-user");
           }
           $('input, textarea').each(function(){
              var _id = $(this).attr('name');
              var idd = _id+'-error';
              $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
           });
			})
			$("#btn-cancel").click(function(){
			document.location.hash='User';
			})

      $("#form-user").validate({
          rules: {
              name: "required",
//              address: "required",
              username: "required",
              password: {
                  // required: true,
                  minlength: 6
              },
              password_confirm: {
                  // required: true,
                  minlength: 6,
                  equalTo: "#password"
              },
              role_id: "required",
              email: {
//                required: true,
                email: true
              },
          },
          errorClass: "block-error error",
          errorElement: "div",
      })

		})
		</script>