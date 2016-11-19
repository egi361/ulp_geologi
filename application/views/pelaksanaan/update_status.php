				<form class="form-horizontal" id="form-setujui-usulan" action="Pelaksanaan/update_statusData/<?=$data->id_usulan_kegiatan?>" method="POST">
				  <div class="box-body">
					<section class="content">
						<div class="box" >
							<div class="box-header with-border">
							  <!-- <i class="fa fa-caret-down pull-right btn" id="tombol-form"></i> -->
								<button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>	
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="form-group">
								  <label for="kode_usulan_kegiatan" class="col-sm-3 control-label">Kode Usulan Kegiatan <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="kode_usulan_kegiatan"class="form-control" value="<?=$data->kode_usulan_kegiatan?>" id="kode_usulan_kegiatan" placeholder="Name">
								  </div>
								  <label for="nama_unit" class="col-sm-3 control-label">Nama Unit <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="nama_unit"class="form-control" value="<?=$data->nama_unit?>" id="nama_unit" placeholder="Name">
								  </div>
								</div>				
						
								<div class="form-group">
								  <label for="nama_kegiatan" class="col-sm-3 control-label">Nama Kegiatan <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="nama_kegiatan"class="form-control" value="<?=$data->nama_kegiatan?>" id="nama_kegiatan" placeholder="Name">
								  </div>
								  <label for="pagu_anggaran" class="col-sm-3 control-label">Pagu Anggaran <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="pagu_anggaran"class="form-control" value="<?=$data->pagu_anggaran?>" id="pagu_anggaran" placeholder="Name">
								  </div>
								</div>				

								<div class="form-group">
								  <label for="hps" class="col-sm-3 control-label">HPS <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="hps"class="form-control" value="<?=$data->hps?>" id="hps" placeholder="Name">
								  </div>
								  <label for="jenis_kegiatan" class="col-sm-3 control-label">Jenis Kegiatan <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="jenis_kegiatan"class="form-control" value="<?=$data->jenis_kegiatan?>" id="jenis_kegiatan" placeholder="Name">
								  </div>
								</div>										
								<div class="form-group">
								  <label for="jenis_anggaran" class="col-sm-3 control-label">Jenis Anggaran <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="jenis_anggaran"class="form-control" value="<?=$data->jenis_anggaran?>" id="jenis_anggaran" placeholder="Name">
								  </div>
								  <label for="jenis_belanja" class="col-sm-3 control-label">Jenis Belanja <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="jenis_belanja"class="form-control" value="<?=$data->jenis_belanja?>" id="jenis_belanja" placeholder="Name">
								  </div>
								</div>				
								<div class="form-group">
								  <label for="tanggal_usulan" class="col-sm-3 control-label">Tanggal Usulan <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="tanggal_usulan"class="form-control" value="<?=$data->tanggal_usulan?>" id="tanggal_usulan" placeholder="Name">
								  </div>
								   <label for="keterangan" class="col-sm-3 control-label">Kode Usulan Kegiatan <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="keterangan"class="form-control" value="<?=$data->keterangan?>" id="keterangan" placeholder="Name">
								  </div>
								</div>
							</div>
						</div>
					</section>
					<div class="form-group">
					  <label for="nilai_kontrak" class="col-sm-3 control-label">Nilai Kontrak<span class="required">*</span></label>
					  <div class="col-sm-3">
						<input type="text" name="nilai_kontrak"class="form-control" id="nilai_kontrak">
					  </div>
					  <label for="tahun_anggaran" class="col-sm-3 control-label">Tahun Anggaran <span class="required">*</span></label>
					  <div class="col-sm-3">
						<input type="text"  name="tahun_anggaran"class="form-control" id="tahun_anggaran" placeholder="Name">
					  </div>
					</div>				
			
					<div class="form-group">
					  <label for="metode_kegiatan" class="col-sm-3 control-label">Metode Kegiatan <span class="required">*</span></label>
					  <div class="col-sm-3">
						<select name="metode_kegiatan"class="form-control" id="metode_kegiatan">
							<option value="penyedia">Penyedia </option>
							<option value="swakelola">Swakelola </option>
						</select>
					  </div>
					  <label for="pemilihan_penyedia" class="col-sm-3 control-label">Pemilihan Penyedia <span class="required">*</span></label>
					  <div class="col-sm-3">
						<select name="pemilihan_penyedia"class="form-control" id="pemilihan_penyedia">
							<option value="lelang_umum">Lelang Umum </option>
							<option value="seleksi_umum">Seleksi Umum </option>
							<option value="lelang_terbatas">Lelang Terbatas </option>
							<option value="penunjukan_langsung">Penunjukan Langsung </option>
							<option value="pengadaan_langsung">Pengadaan Langsung </option>
							<option value="kontes">Sayembara/Kontes </option>
						</select>
					  </div>
					</div>				

					<div class="form-group">
					  <label for="id_penyedia" class="col-sm-3 control-label">Penyedia <span class="required">*</span></label>
					  <div class="col-sm-3">
						<select name="id_penyedia"class="form-control" id="id_penyedia">
						</select>
					  </div>
					  <label for="id_swakelola" class="col-sm-3 control-label">Swakelola <span class="required">*</span></label>
					  <div class="col-sm-3">
						<select type="text" name="id_swakelola"class="form-control" id="id_swakelola">
						</select>
					  </div>
					</div>										
					<div class="form-group">
					  <label for="tanggal_awal_pelaksanaan" class="col-sm-3 control-label">Tanggal Awal Pelaksanaan <span class="required">*</span></label>
					  <div class="col-sm-3">
						<input type="text" name="tanggal_awal_pelaksanaan"class="form-control" id="tanggal_awal_pelaksanaan">
					  </div>
					  <label for="tanggal_akhir_pelaksanaan" class="col-sm-3 control-label">Tanggal Akhir Pelaksanaan <span class="required">*</span></label>
					  <div class="col-sm-3">
						<input type="text" name="tanggal_akhir_pelaksanaan"class="form-control" id="tanggal_akhir_pelaksanaan"/>
					  </div>
					</div>	
					 <div class="box-footer">
						  <div class="col-sm-2"></div>
						  <div class="col-sm-10">				  
							<button type="button" class="btn btn-default" id="btn-cancel">Cancel</button>
							<input type="button" class="btn btn-action" id="btn-submit" value="Save">
						  </div><!-- /.box-footer -->
					  </div>
				</div>
				 
                </form>
		<script>
		$(document).ready(function(){
			$('#tanggal_awal_pelaksanaan').datepicker({'format':'yyyy-mm-dd','language':'id'});
			$('#tanggal_akhir_pelaksanaan').datepicker({'format':'yyyy-mm-dd','language':'id'});
			$("#btn-submit").click(function(){
				if($('#form-setujui-usulan').valid()){
		              global.CRUD("#form-setujui-usulan");
		           }else{
		             $('input, textarea').each(function(){
		                var _id = $(this).attr('name');
		                var idd = _id+'-error';
		                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
		             });
		          }
			});
			$('#id_penyedia').select2({data:<?=$penyedia?>})
			$('#id_swakelola').select2({data:<?=$swakelola?>})
			$("#btn-cancel").click(function(){
			document.location.hash='Pegawai';
			})

			$("#form-setujui-usulan").validate({
	          rules: {
	              nilai_kontrak: {required:true,digits:true},
				  tahun_anggaran:'required',
				  tanggal_awal_pelaksanaan :'required',
				  tanggal_akhir_pelaksanaan : 'required'
	          },
	          errorClass: "block-error error",
	          errorElement: "div",
		    })
		})
		</script>