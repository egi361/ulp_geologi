		<section class="content">
          <div class="box" >
                <div class="box-header with-border">
				  <!-- <i class="fa fa-caret-down pull-right btn" id="tombol-form"></i> -->
					<button class="btn pull-right btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse" style="margin-right: 5px;"><i class="fa fa-caret-down"></i></button>	
				  <a href="#Pelaksanaan/kegiatan/swakelola" class="kegiatan-swakelola btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Kegiatan Swakelola</a>
				   <a href="#Pelaksanaan/kegiatan/penyedia" class="kegiatan-penyedia btn btn-primary btn-sm" style="margin-right: 5px;"><i class="fa fa-plus-circle"></i> Kegiatan Penyedia</a>
				  <a id="button-edit"class="btn btn-primary btn-sm disabled" style="margin-right: 5px;"><i class="fa fa-pencil"></i> Update</a>	
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
		})
		</script>