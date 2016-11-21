		<section class="content">
          <div class="box" >
                <div class="box-header with-border">
				  <!-- <i class="fa fa-caret-down pull-right btn" id="tombol-form"></i> -->
					<button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>	
					<a href="#Pelaksanaan/kegiatan/swakelola" class="kegiatan-swakelola btn btn-primary btn-sm" style="margin-right: 5px;"> Kegiatan Swakelola</a>
					<a href="#Pelaksanaan/kegiatan/penyedia" class="kegiatan-penyedia btn btn-primary btn-sm" style="margin-right: 5px;"> Kegiatan Penyedia</a>
					<?php
					if($this->session->userdata('role') == 11){
					?>
					<a id="button-update-keuangan"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Update Progress</a>
					<?php
					}
					?>	
					<a id="button-view-progress"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-eye"></i> Lihat Progress Per-Bulan</a>
					<a id="button-view-progress-tahun"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-eye"></i> Lihat Progress Per-Tahun</a>

				</div><!-- /.box-header -->
                <!-- form start -->

                  <div class="box-body animated fadeInUpBig" id="box-content">

                  </div><!-- /.box-body -->
				  <div class="box-footer">

				   </div>
              </div><!-- /.box -->
        </section><!-- /.content -->
		<script>
		$(document).on('controllerReady',function(e,controller){
			if(controller == 'Pelaksanaan'){
				document.location.hash='Pelaksanaan/kegiatan/swakelola';
			}
			$("#button-update-fisik").click(function(){
					var id=$("#TableKegiatan .selected").attr('id')
				if(typeof id=='undefined'){
					alert('Please Select One Data to Edit')
				}
				else{
					$('#button-update-fisik').addClass('disabled');
					$('#button-update-keuangan').addClass('disabled');
					$('#button-view-progress').addClass('disabled');
					$('#button-view-progress-tahun').addClass('disabled');
					document.location.hash="Pelaksanaan/update_fisik/"+id;
				}
			})
			$("#button-update-keuangan").click(function(){
					var id=$("#TableKegiatan .selected").attr('id')
				if(typeof id=='undefined'){
					alert('Please Select One Data to Edit')
				}
				else{
					$('#button-update-fisik').addClass('disabled');
					$('#button-update-keuangan').addClass('disabled');
					$('#button-view-progress').addClass('disabled');
					$('#button-view-progress-tahun').addClass('disabled');
					document.location.hash="Pelaksanaan/update_keuangan/"+id;
				}
			})
			$("#button-view-progress").click(function(){
					var id=$("#TableKegiatan .selected").attr('id')
				if(typeof id=='undefined'){
					alert('Please Select One Data to Edit')
				}
				else{
					$('#button-update-fisik').addClass('disabled');
					$('#button-update-keuangan').addClass('disabled');
					$('#button-view-progress').addClass('disabled');
					$('#button-view-progress-tahun').addClass('disabled');
					document.location.hash="Pelaksanaan/view_progress/"+id+"/per-bulan";
				}
			})
			$("#button-view-progress-tahun").click(function(){
					var id=$("#TableKegiatan .selected").attr('id')
				if(typeof id=='undefined'){
					alert('Please Select One Data to Edit')
				}
				else{
					$('#button-update-fisik').addClass('disabled');
					$('#button-update-keuangan').addClass('disabled');
					$('#button-view-progress').addClass('disabled');
					$('#button-view-progress-tahun').addClass('disabled');
					document.location.hash="Pelaksanaan/view_progress/"+id+'/per-tahun';
				}
			})
		})
		</script>