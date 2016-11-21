				<form class="form-horizontal" id="form-swakelola" action="Swakelola/insertData" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="jenis_swakelola" class="col-sm-2 control-label">Jenis Swakelola <span class="required">*</span></label>
                      <div class="col-sm-9">
						<select id="jenis_swakelola" name="jenis_swakelola" class="form-control" placeholder="Pilih Jenis Swakelola">
							<option value="jasa">Jasa </option>
							<option value="barang">Barang </option>
						</select>
                      </div>
                    </div>
					<div class="form-group jenis_jasa">
						<label for="jenis_jasa" class="col-sm-2 control-label">Jenis Jasa / Barang <span class="required">*</span></label>
						<div class="col-sm-9">
						<input type="text" name="jenis_jasa" class="form-control" id="jenis_jasa" placeholder="Jenis Jasa">
						</div>
                    </div>
				  <div class="box-footer">
					  <div class="col-sm-2"></div>
					  <div class="col-sm-10">				  
						<button type="button" class="btn btn-default" id="btn-cancel">Cancel</button>
						<input type="button" class="btn btn-action" id="btn-submit" value="Save">
					  </div><!-- /.box-footer -->
				  </div>
                </form>
		<script>
		$(document).ready(function(){
			$("#btn-submit").click(function(){
				if($('#form-swakelola').valid()){
		              global.CRUD("#form-swakelola");
		           }else{
		             $('input, textarea').each(function(){
		                var _id = $(this).attr('name');
		                var idd = _id+'-error';
		                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
		             });
		          }
			});

			$("#btn-cancel").click(function(){
				document.location.hash='Swakelola';
			})

			$("#form-swakelola").validate({
	          rules: {
	              jenis_swakelola: "required",
	          },
	          errorClass: "block-error error",
	          errorElement: "div",
		    })
		})
		</script>