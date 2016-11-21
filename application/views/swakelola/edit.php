				<form class="form-horizontal" id="form-swakelola" action="Swakelola/editData/<?=$data->id_swakelola?>" method="POST">
                  <div class="box-body">
                  	<div class="form-group">
                      <label for="jenis_swakelola" class="col-sm-2 control-label">Jenis Swakelola <span class="required">*</span></label>
                      <div class="col-sm-9">
						<?php 
							$selected = '';
							$option = '';
							$jenis = array(
								'jasa',
								'barang'
							);
							foreach( $jenis as $j ) {
								if( $data->jenis_swakelola == $j  ):
									$selected = 'selected';
								endif;
								$option .= '<option value="'.$j.'" '.$selected.'>'.$j.'</option>';
								$selected = '';
							}
							?>
						<select id="jenis_swakelola" name="jenis_swakelola" class="form-control" placeholder="Pilih Jenis Swakelola">
						<!-- 	<option value="Instansi Penanggung Jawab Anggaran">Instansi Penanggung Jawab Anggaran</option>
							<option value="Instansi Lain">Instansi Lain</option>
							<option value="Kelompok Masyarakat">Kelompok Masyarakat</option> -->
							<?php echo $option;?>
						</select>
                      </div>
                    </div>
                    
					<div class="form-group jenis_jasa">
						<label for="jenis_jasa" class="col-sm-2 control-label">Jenis Jasa / Barang<span class="required">*</span></label>
						<div class="col-sm-9">
						<input type="text" name="jenis_jasa" class="form-control" id="jenis_jasa" placeholder="Jenis Jasa" value="<?=$data->jenis_jasa?>">
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
				if($('#form-swakelola').valid()){
		            global.CRUD("#form-swakelola");
		        }else{
	            	$('input, textarea').each(function(){
		                var _id = $(this).attr('name');
		                var idd = _id+'-error';
		                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
	            	});
		        }
			})
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