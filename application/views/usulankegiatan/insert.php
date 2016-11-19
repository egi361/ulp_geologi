
<form class="form-horizontal" id="form-usulankegiatan" action="UsulanKegiatan/insertData" method="POST">
	<div class="box-body">
	
	<div class="form-group">
		<label for="kode_usulan_kegiatan" class="col-sm-2 control-label">Kode Usulan Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="kode_usulan_kegiatan" class="form-control" id="kode_usulan_kegiatan" placeholder="Kode Usulan Kegiatan">
		</div>
	</div>

	<div class="form-group">
		<label for="tanggal_usulan" class="col-sm-2 control-label">Tanggal Usulan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" id="tanggal_usulan" class="form-control" name="tanggal_usulan" placeholder="Tanggal Usulan">
		</div>
	</div>

	<div class="form-group">
		<label for="nama_kegiatan" class="col-sm-2 control-label">Nama Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="Nama Kegiatan">
		</div>
	</div>

	<div class="form-group">
		<label for="pagu_anggaran" class="col-sm-2 control-label">Pagu Anggaran <span class="required">*</span></label>
		<div class="col-sm-9">
			 <input type="pagu_anggaran" class="form-control" id="pagu_anggaran" name="pagu_anggaran" placeholder="Pagu Anggaran">
		</div>
	</div>

	<div class="form-group">
        <label for="hps" class="col-sm-2 control-label">HPS <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="text" class="form-control" id="hps" name="hps" placeholder="HPS">
        </div>
    </div>
	
	<div class="form-group">
		<label for="status_kegiatan" class="col-sm-2 control-label">Status Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="status_kegiatan" class="form-control" id="status_kegiatan" placeholder="Status Kegiatan">
		</div>
	</div>
	<div class="form-group">
		<label for="keterangan" class="col-sm-2 control-label">Keterangan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan">
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_kegiatan" class="col-sm-2 control-label">Jenis Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<select id="jenis_kegiatan" name="jenis_kegiatan" class="form-control" placeholder="Pilih Jenis Kegiatan">
				<option value="Prioritas">Prioritas</option>
				<option value="Non Prioritas">Non Prioritas</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_anggaran" class="col-sm-2 control-label">Jenis Anggaran <span class="required">*</span></label>
		<div class="col-sm-9">
			<select id="jenis_anggaran" name="jenis_anggaran" class="form-control" placeholder="Pilih Jenis Anggaran">
				<option value="APBN">APBN	</option>
				<option value="Non APBN">Non APBN</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_belanja" class="col-sm-2 control-label">Status Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<select id="jenis_belanja" name="jenis_belanja" class="form-control" placeholder="Pilih Jenis Belanja">
				<option value="Barang">Barang</option>
				<option value="Non Barang">Non Barang</option>
			</select>
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
	$('#tanggal_usulan').datepicker({'format':'yyyy-mm-dd','language':'id'});
	$("#btn-submit").click(function(){
		if($('#form-usulankegiatan').valid()){
              global.CRUD("#form-usulankegiatan");
           }else{
             $('input, textarea').each(function(){
                var _id = $(this).attr('name');
                var idd = _id+'-error';
                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
             });
          }
	})
	$("#btn-cancel").click(function(){
		document.location.hash='UsulanKegiatan';
	})

	$("#form-usulankegiatan").validate({
		rules: {
			kode_usulan_kegiatan: "required",
			tanggal_usulan: "required",
			nama_kegiatan: "required",
			pagu_anggaran: "required",
			hps: "required",
			status_kegiatan: "required",
			keterangan: "required",
			jenis_kegiatan: "required",
			jenis_anggaran: "required",
			jenis_belanja: "required",
		},
      	errorClass: "block-error error",
      	errorElement: "div",
    })
})
</script>