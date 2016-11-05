					<div class="form-group col-md-6" id="ph">
                        <select id="eventSelect" class="form-control" placeholder="Pilih Nama Event"></select>
                    </div>
                    <div class="clearfix"></div>
                    <div id="chartContent" class="col-md-12"></div>
<script>
	$(document).ready(function(){
	                var ph = $('#eventSelect').attr('placeholder');
                var evnt = <?=json_encode($event) ?>;
                $('#eventSelect').select2({
                    data: evnt,
                    allowClear: true,
                    placeholder: ph
                });
                $("#chartContent").load("<?= base_url() ?>Admin/dashboard/0");
                $('#eventSelect').change(function() {
                    var _id = this.value;
                    if(_id!=''){
                        $("#chartContent").load("<?= base_url() ?>Admin/dashboard/"+_id);
                    }
                });
	})
</script>