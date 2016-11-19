<form class="form-horizontal" id="form-penyedia" action="Penyedia/insertData" method="POST">
	<div class="box-body">
	
	<div class="form-group">
		<label for="nama_perusahaan" class="col-sm-2 control-label">Nama Perusahaan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="nama_perusahaan" class="form-control" id="nama_perusahaan" placeholder="Nama Perusahaan">
		</div>
	</div>

	<div class="form-group">
		<label for="no_siup" class="col-sm-2 control-label">Nomor SIUP <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="no_siup" class="form-control" id="no_siup" placeholder="Nomor SIUP">
		</div>
	</div>

	<div class="form-group">
		<label for="no_telepon" class="col-sm-2 control-label">Nomor Telepon <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="no_telepon" class="form-control" id="no_telepon" placeholder="Nomor Telepon">
		</div>
	</div>

	<div class="form-group">
		<label for="alamat" class="col-sm-2 control-label">Alamat <span class="required">*</span></label>
		<div class="col-sm-9">
			<textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10"></textarea>
		</div>
	</div>

	<div class="form-group">
        <label for="email" class="col-sm-2 control-label">Email <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        </div>
    </div>
	
	<div class="form-group">
		<label for="penanggung_jawab" class="col-sm-2 control-label">Penanggung Jawab <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="penanggung_jawab" class="form-control" id="penanggung_jawab" placeholder="Penanggung Jawab">
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
		if($('#form-penyedia').valid()){
              global.CRUD("#form-penyedia");
           }else{
             $('input, textarea').each(function(){
                var _id = $(this).attr('name');
                var idd = _id+'-error';
                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
             });
          }
	})
	$("#btn-cancel").click(function(){
		document.location.hash='Penyedia';
	})

	$("#form-penyedia").validate({
      rules: {
          nama_perusahaan: "required",
          no_siup: "required",
          alamat: "required",
          no_telepon: "required",
          email: "required",
          penanggung_jawab: "required",
      },
      errorClass: "block-error error",
      errorElement: "div",
    })
})
</script>