				<form class="form-horizontal" id="form-transaction-edit" action="GuestBook/editDataTransaction/<?=$id?>" method="POST">
                  <div class="box-body">
				  
                    <div class="form-group">
                      <label for="item" class="col-sm-2 control-label">Item</label>
                      <div class="col-sm-9">
                        <input type="text" name="item"class="form-control" id="item" placeholder="Item" value="<?=$transaction->barang?>">
                      </div>
                    </div>
					<div class="form-group">
                      <label for="jumlah" class="col-sm-2 control-label">Quantity</label>
                      <div class="col-sm-9">
                        <input type='text'  class="form-control" id="jumlah" name="jumlah"placeholder="Quantity" value="<?=$transaction->jumlah?>"/>
                      </div>
                    </div>
					<div class="form-group">
                      <label for="harga_satuan" class="col-sm-2 control-label">Price</label>
                      <div class="col-sm-9">
                        <input type="harga_satuan" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Price" value="<?=$transaction->harga_satuan?>">
                      </div>
                    </div>

					<div class="form-group">
                      <label for="harga_total" class="col-sm-2 control-label">Total Price</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="harga_total" id="harga_total" placeholder="Total Price" value="<?=$transaction->harga_total?>">
                      </div>
                    </div>

                  </div><!-- /.box-body -->
				  <div class="box-footer">
					  <div class="col-sm-2"></div>
					  <div class="col-sm-10">				  
						<button type="button" class="btn btn-default" id="btn-cancel">Cancel</button>
						<button type="button" class="btn btn-action" id="btn-submit">Save</button>
					  </div><!-- /.box-footer -->
				  </div>
                </form>
		<script>
		$(document).ready(function(){

			$("#btn-submit").click(function(){
				if($('#form-transaction-edit').valid()){
				global.CRUD("#form-transaction-edit");
				}			
			})
			$("#btn-cancel").click(function(){
			document.location.hash='User';
			})

      $("#form-transaction-edit").validate({
        
          errorClass: "block-error error",
          errorElement: "div",
      })
		})
		</script>