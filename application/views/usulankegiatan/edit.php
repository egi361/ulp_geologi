<form class="form-horizontal" id="form-usulankegiatan" action="UsulanKegiatan/editData/<?=$data->id_usulan_kegiatan?>" method="POST">
	<div class="box-body">
	
	<div class="form-group">
		<label for="kode_usulan_kegiatan" class="col-sm-2 control-label">Kode Usulan Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" value="<?=$data->kode_usulan_kegiatan?>" name="kode_usulan_kegiatan" class="form-control" id="kode_usulan_kegiatan" placeholder="Kode Usulan Kegiatan">
		</div>
	</div>

	<div class="form-group">
		<label for="tanggal_usulan" class="col-sm-2 control-label">Tanggal Usulan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" value="<?=$data->tanggal_usulan?>" id="tanggal_usulan" class="form-control" name="tanggal_usulan" placeholder="Tanggal Usulan">
		</div>
	</div>

	<div class="form-group">
		<label for="nama_kegiatan" class="col-sm-2 control-label">Nama Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" value="<?=$data->nama_kegiatan?>" name="nama_kegiatan" class="form-control" id="nama_kegiatan" placeholder="Nama Kegiatan">
		</div>
	</div>

	<div class="form-group">
		<label for="pagu_anggaran" class="col-sm-2 control-label">Pagu Anggaran <span class="required">*</span></label>
		<div class="col-sm-9">
			 <input type="text" value="<?=$data->pagu_anggaran?>" class="form-control" id="pagu_anggaran" name="pagu_anggaran" placeholder="Pagu Anggaran">
		</div>
	</div>

	<div class="form-group">
        <label for="hps" class="col-sm-2 control-label">HPS <span class="required">*</span></label>
        <div class="col-sm-9">
            <input type="text" value="<?=$data->hps?>" class="form-control" id="hps" name="hps" placeholder="HPS">
        </div>
    </div>
	
	<div class="form-group">
		<label for="status_kegiatan" class="col-sm-2 control-label">Status Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" value="<?=$data->status_kegiatan?>" name="status_kegiatan" class="form-control" id="status_kegiatan" placeholder="Status Kegiatan">
		</div>
	</div>
	<div class="form-group">
		<label for="keterangan" class="col-sm-2 control-label">Keterangan <span class="required">*</span></label>
		<div class="col-sm-9">
			<input type="text" value="<?=$data->keterangan?>" name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan">
		</div>
	</div>

	<?php 
		$selected = '';
		$option_jenis_kegiatan = '';
		$option_jenis_anggaran = '';
		$option_jenis_belanja = '';
		$jenis_kegiatan = array( 'Prioritas', 'Non Prioritas', );
		$jenis_anggaran = array( 'APBN', 'Non APBN' );
		$jenis_belanja = array( 'Barang', 'Konstruksi', 'Jasa', 'Jasa Lainnya' );
		foreach( $jenis_kegiatan as $jk ) {
			if( $data->jenis_kegiatan == $jk  ):
				$selected = 'selected';
			endif;
			$option_jenis_kegiatan .= '<option value="'.$jk.'" '.$selected.'>'.$jk.'</option>';
			$selected = '';
		}

		foreach ($jenis_anggaran as $ja ) {
			if( $data->jenis_anggaran == $ja ):
				$selected = 'selected';
			endif;
			$option_jenis_anggaran .= '<option value="'.$ja.'" '.$selected.'>'.$ja.'</option>';
			$selected = '';
		}

		foreach ($jenis_belanja as $jb ) {
			if( $data->jenis_belanja == $jb ):
				$selected = 'selected';
			endif;
			$option_jenis_belanja .= '<option value="'.$jb.'" '.$selected.'>'.$jb.'</option>';
			$selected = '';
		}

	?>
	<div class="form-group">
		<label for="jenis_kegiatan" class="col-sm-2 control-label">Jenis Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<select id="jenis_kegiatan" name="jenis_kegiatan" class="form-control" placeholder="Pilih Jenis Kegiatan">
				<!-- <option value="Prioritas">Prioritas</option>
				<option value="Non Prioritas">Non Prioritas</option> -->
				<?php echo $option_jenis_kegiatan; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_anggaran" class="col-sm-2 control-label">Jenis Anggaran <span class="required">*</span></label>
		<div class="col-sm-9">
			<select id="jenis_anggaran" name="jenis_anggaran" class="form-control" placeholder="Pilih Jenis Anggaran">
				<!-- <option value="APBN">APBN	</option>
				<option value="Non APBN">Non APBN</option> -->
				<?php echo $option_jenis_anggaran; ?>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jenis_belanja" class="col-sm-2 control-label">Status Kegiatan <span class="required">*</span></label>
		<div class="col-sm-9">
			<select id="jenis_belanja" name="jenis_belanja" class="form-control" placeholder="Pilih Jenis Belanja">
				<!-- <option value="Barang">Barang</option>
				<option value="Konstruksi">Konstruksi</option>
				<option value="Jasa">Jasa</option>	
				<option value="Jasa Lainnya">Jasa Lainnya</option> -->
				<?php echo $option_jenis_belanja;?>
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