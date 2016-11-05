<div class="form-group">
                    <label for="city" class="control-label">City <span class="required">*</span></label>
                    <select name="city" class="form-control" id="city" placeholder="Kota"></select>
                </div>
				<script>
				$(document).ready(function(){
				
				$('#city').select2({
				data: <?=json_encode($city)?>});
				})
				</script>