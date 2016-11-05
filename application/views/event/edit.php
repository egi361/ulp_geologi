        <form class="form-horizontal" id="form-event" action="Event/editData/<?=$data->id_event?>" method="POST">
                  <div class="box-body">
                    <div class="form-group">
                      <label class="col-sm-2 control-label">Event Name <span class="required">*</span></label>
                      <div class="col-sm-9">
                        <input type="text" value="<?=$data->event_name?>" name="event_name"class="form-control" placeholder="Event Name">
                      </div>
                    </div>
                        <div class="form-group">
                                    <label class="col-sm-2 control-label">Event Description</label>
                                    <div class="col-sm-9">
                                      <textarea  class="form-control" name="event_description" placeholder="Event Description"><?=$data->event_description?></textarea>
                                    </div>
                                  </div>
                        <div class="form-group">
                                    <label class="col-sm-2 control-label">Date Start <span class="required">*</span></label>
                                    <div class="col-sm-9">
                                      <input type="text" id="date_start" value="<?=$data->date_start?>" class="form-control" name="date_start" placeholder="Date Start">
                                    </div>
                        </div>
                        <div class="form-group">
                                    <label class="col-sm-2 control-label">Date End</label>
                                    <div class="col-sm-9">
                                      <input type="text" id="date_end" value="<?=$data->date_end?>" class="form-control" name="date_end" placeholder="Date End">
                                    </div>
                        </div>
                        <div class="form-group">
                          <label class="col-sm-2 control-label">Place <span class="required">*</span></label>
                          <div class="col-sm-9">
                            <input type="text" value="<?=$data->place?>" class="form-control" name="place" placeholder="Place">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-sm-2 control-label">PIC</label>
                          <div class="col-sm-9">
                            <input type="text" value="<?=$data->pic?>" class="form-control" name="pic" placeholder="PIC">
                          </div>
                        </div>
                    
                  </div><!-- /.box-body -->
          
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
    
    $('#date_start').datepicker({'format':'yyyy-mm-dd','language':'id'});
    $('#date_end').datepicker({'format':'yyyy-mm-dd','language':'id'});

      $("#btn-submit").click(function(){
          if($('#form-event').valid()){
              global.CRUD("#form-event");
           }else{
             $('input, textarea').each(function(){
                var _id = $(this).attr('name');
                var idd = _id+'-error';
                $('#'+idd).parent('.col-sm-9').parent('.form-group').addClass('has-error');
             });
          }
      })
      $("#btn-cancel").click(function(){
          document.location.hash='Event';
      })

      $("#form-event").validate({
          rules: {
              event_name: "required",
              date_start: "required",
              place: "required",
          },
          errorClass: "block-error error",
          errorElement: "div",
      })
})
</script>