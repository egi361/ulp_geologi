				<form class="form-horizontal" id="form-pegawai" action="Pegawai/insertData" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label for="nama_pegawai" class="col-sm-2 control-label">Nama <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="nama_pegawai"class="form-control" id="nama_pegawai" placeholder="Name">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="alamat" class="col-sm-2 control-label">Alamat <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <textarea name="alamat"class="form-control" id="alamat"></textarea>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="pendidikan" class="col-sm-2 control-label">Pendidikan <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" name="pendidikan"class="form-control" id="pendidikan">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <select name="jenis_kelamin"class="form-control" id="jenis_kelamin">
							<option value="laki-laki">Laki-laki</option>
							<option value="perempuan">Perempuan</option>
						</select>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="id_unit_satuan_kerja" class="col-sm-2 control-label">Unit Satuan Kerja <span class="required">*</span></label>
                      <div class="col-sm-9">
						 <select name="id_unit_satuan_kerja" class="form-control" id="id_unit_satuan_kerja" ></select>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="id_jabatan" class="col-sm-2 control-label">Jabatan <span class="required">*</span></label>
                      <div class="col-sm-9">
						 <select name="id_jabatan" class="form-control" id="id_jabatan" ></select>
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
				if($('#form-pegawai').valid()){
		              global.CRUD("#form-pegawai");
		           }else{
		             $('input, textarea').each(function(){
		                var _id = $(this).attr('name');
		                var idd = _id+'-error';
		                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
		             });
		          }
			});
			$('#id_unit_satuan_kerja').select2({
				data: <?=$unit?>
			});
			$('#id_jabatan').select2({
				data: <?=$jabatan?>
			});
			$("#btn-cancel").click(function(){
			document.location.hash='Pegawai';
			})

			$("#form-pegawai").validate({
	          rules: {
	              nama: "required",
	          },
	          errorClass: "block-error error",
	          errorElement: "div",
		    })
		})
		</script>