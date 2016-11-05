				<form class="form-horizontal" id="form-content-insert" method="POST" enctype="multipart/form-data">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">File Description <span class="required">*</span></label>
                      <div class="col-sm-9">
					  <input type="hidden" name="id_event" value="<?=$id_event?>"/>
                        <textarea name="description" class="form-control" placeholder="Description"></textarea>
                      </div>
                    </div> 
					<div class="form-group">
                      <label class="col-sm-2 control-label">File<span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input class="input-file uniform_on" id="fileInput" type="file" name='userfile'>
                      </div>
                    </div> 
                  </div><!-- /.box-body -->
				  
          <div class="box-footer">
					  <div class="col-sm-2"></div>
					  <div class="col-sm-10">				  
						<button type="button" class="btn btn-default" id="btn-cancel">Cancel</button>
						<input type="submit" class="btn btn-action" id="btn-submit" value="Save">
					  </div><!-- /.box-footer -->
				  </div>
      </form>
<script>
$(document).ready(function(){
      $("#btn-cancel").click(function(){
          document.location.hash='EventContent';
      })
	  
	  $("#form-content-insert").validate({
          rules: {
              description: "required"
          },
          errorClass: "block-error error",
          errorElement: "div",
      })
})
$(document).on("submit","#form-content-insert",function(e){
				e.preventDefault(); //menahan browser agar tidak mensubmit form dengan cara lama 
				var formData = new FormData($(this)[0]); //mengambil isi dari form
				$.ajax({
				type    : "POST",
				url     : "<?php echo base_url().'EventContent/insertData';?>",
				cache   : false,
				contentType: false,
				processData: false,			
				success : function(html){
				
				document.location.hash='EventContent';	
				},
				data    : formData,
				
				});
				document.getElementById("form-content-insert").reset();
				});
</script>