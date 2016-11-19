				<form class="form-horizontal" id="form-unit" action="Unit/insertData" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_unit" class="col-sm-2 control-label">Nama Unit Satuan Kerja <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_unit"class="form-control" id="nama_unit" placeholder="Name">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="kode_unit_satuan_kerja" class="col-sm-2 control-label">Kode Unit Satuan Kerja <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="kode_unit_satuan_kerja"class="form-control" id="kode_unit_satuan_kerja" placeholder="Name">
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
				if($('#form-unit').valid()){
		              global.CRUD("#form-unit");
		           }else{
		             $('input, textarea').each(function(){
		                var _id = $(this).attr('name');
		                var idd = _id+'-error';
		                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
		             });
		          }
			})
			$("#btn-cancel").click(function(){
			document.location.hash='Unit';
			})

			$("#form-unit").validate({
	          rules: {
	              nama_unit: "required",
	          },
	          errorClass: "block-error error",
	          errorElement: "div",
		    })
		})
		</script>