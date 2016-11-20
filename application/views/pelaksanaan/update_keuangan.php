				<form class="form-horizontal" id="form-update-keuangan" action="Pelaksanaan/update_keuanganData/<?=$data->id_pelaksanaan_kegiatan?>" method="POST">
				  <div class="box-body">
					<section class="content">
						<div class="box" >
							<div class="box-header with-border">
							  <!-- <i class="fa fa-caret-down pull-right btn" id="tombol-form"></i> -->
								<button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>	
							</div><!-- /.box-header -->
							<div class="box-body">
								<div class="form-group">
								  <label for="nama_unit" class="col-sm-3 control-label">Nama Unit <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="nama_unit"class="form-control" value="<?=$data->nama_unit?>" id="nama_unit" placeholder="Name">
								  </div>
								  <label for="nama_kegiatan" class="col-sm-3 control-label">Nama Kegiatan <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="nama_kegiatan"class="form-control" value="<?=$data->nama_kegiatan?>" id="nama_kegiatan" placeholder="Name">
								  </div>
								</div>				
						
								<div class="form-group">
								  <label for="pagu_anggaran" class="col-sm-3 control-label">Pagu Anggaran <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="pagu_anggaran"class="form-control" value="<?=$data->pagu_anggaran?>" id="pagu_anggaran" placeholder="Name">
								  </div>
								  <label for="hps" class="col-sm-3 control-label">HPS <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="hps"class="form-control" value="<?=$data->hps?>" id="hps" placeholder="Name">
								  </div>
								</div>				

								<div class="form-group">
								  <label for="nilai_kontrak" class="col-sm-3 control-label">Nilai Kontrak <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="nilai_kontrak"class="form-control" value="<?=$data->nilai_kontrak?>" id="nilai_kontrak">
								  </div>
								  <label for="tanggal_awal_pelaksanaan" class="col-sm-3 control-label">Tanggal Awal Pelaksanaan <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="tanggal_awal_pelaksanaan"class="form-control" value="<?=$data->tanggal_awal_pelaksanaan?>" id="tanggal_awal_pelaksanaan" >
								  </div>
								</div>										
								<div class="form-group">
								  <label for="tanggal_akhir_pelaksanaan" class="col-sm-3 control-label">Tanggal Akhir Pelaksanaan <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="tanggal_akhir_pelaksanaan"class="form-control" value="<?=$data->tanggal_akhir_pelaksanaan?>" id="tanggal_akhir_pelaksanaan" >
								  </div>
								  <label for="tahun_anggaran" class="col-sm-3 control-label">Tahun Anggaran <span class="required">*</span></label>
								  <div class="col-sm-3">
									<input type="text" disabled='disabled' name="tahun_anggaran"class="form-control" value="<?=$data->tahun_anggaran?>" id="tahun_anggaran">
								  </div>
								</div>				
							</div>
						</div>
					</section>
					<div class="form-group">
					  <label for="sisa_anggaran" class="col-sm-3 control-label">Sisa Anggaran dari Nilai Kontrak<span class="required">*</span></label>
					  <div class="col-sm-3">
						<input type="text" disabled='disabled' value="<?=$data->nilai_kontrak - $current_progress_keuangan?>"name="sisa_anggaran"class="form-control" id="sisa_anggaran">
					  </div>
					</div>
					<div class="form-group">
					  <label for="jumlah_anggaran" class="col-sm-3 control-label">Anggaran<span class="required">*</span></label>
					  <div class="col-sm-3">
						<input type="text" name="jumlah_anggaran"class="form-control" id="jumlah_anggaran">
					  </div>
					</div>
					<div class="form-group">
					  <label for="current_progress" class="col-sm-3 control-label">Progress Fisik Saat Ini<span class="required">*</span></label>
					  <div class="col-sm-3">
						<input type="text" disabled="disabled" name="current_progress"class="form-control" value="<?=$current_progress_fisik?>"id="current_progress">
					  </div>
					   <label for="persentase_progress" class="col-sm-2 control-label">Percent<span class="required"> ( % )</span></label>
					</div>
					<div class="form-group">
					  <label for="persentase_progress" class="col-sm-3 control-label">Progress Fisik<span class="required">*</span></label>
					  <div class="col-sm-3">
						<input type="text" name="persentase_progress"class="form-control" value="<?=$current_progress_fisik?>"id="persentase_progress">
					  </div>
					   <label for="persentase_progress" class="col-sm-2 control-label">Percent<span class="required"> ( % )</span></label>
					</div>
					<div class="form-group">
					  <label for="tanggal_progress_keuangan" class="col-sm-3 control-label">Tanggal <span class="required">*</span></label>
					  <div class="col-sm-3">
						<input type="text" name="tanggal_progress_keuangan"class="form-control" id="tanggal_progress_keuangan">
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
				<?php 
				?>
		<script>
		$(document).ready(function(){
			$.validator.addMethod("greaterThan", function (value, element, param) {
			var $min = $(param);

			if (this.settings.onfocusout) {
				$min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
					$(element).valid();
				});
			}

			return parseInt(value) > parseInt($min.val());
		}, "Max must be greater than min");
			$('#tanggal_progress_keuangan').datepicker({'format':'yyyy-mm-dd','language':'id'});
			$("#btn-submit").click(function(){
				if($('#form-update-keuangan').valid()){
		              global.CRUD("#form-update-keuangan");
		           }else{
		             $('input, textarea').each(function(){
		                var _id = $(this).attr('name');
		                var idd = _id+'-error';
		                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
		             });
		          }
			});
			$("#btn-cancel").click(function(){
				document.location.hash='Pelaksanaan';
			})
			$("#form-update-keuangan").validate({
	          rules: {
	              jumlah_anggaran: {required:true,digits:true,max:parseInt($('#sisa_anggaran').val())},
				  tanggal_progress_keuangan:'required',
				  persentase_progress : {required:true,digits:true,min:parseInt($('#current_progress').val()),max:100},
	          },
	          errorClass: "block-error error",
	          errorElement: "div",
		    })
		})
		</script>