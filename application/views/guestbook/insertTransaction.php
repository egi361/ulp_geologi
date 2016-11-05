<form class="form-horizontal" id="form-transaction" action="GuestBook/insertDataTransaction" method="POST">
    <div class="box-body">

        <div class="form-group">
            <label for="item" class="col-sm-2 control-label">Item  <span class="required">*</span></label>
            <div class="col-sm-9">
                <input type="hidden" name="id_guestbook" id="id_guestbook" value="<?= $id ?>"/>
                <input type="text" name="item" class="form-control" id="item" placeholder="Item">
            </div>
        </div>
        <div class="form-group">
            <label for="jumlah" class="col-sm-2 control-label">Quantity <span class="required">*</span></label>
            <div class="col-sm-9">
                <input class="form-control" id="jumlah" name="jumlah" placeholder="Quantity" type="text">
            </div>
        </div>
        <div class="form-group">
            <label for="harga_satuan" class="col-sm-2 control-label">Price <span class="required">*</span></label>
            <div class="col-sm-9">
                <input type="type" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Price">
            </div>
        </div>

        <div class="form-group">
            <label for="harga_total" class="col-sm-2 control-label">Total Price <span class="required">*</span></label>
            <div class="col-sm-9">
                <input type="text" class="form-control" readonly="" name="harga_total" id="harga_total" placeholder="Total Price">
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
    $(document).ready(function() {

        $("#btn-submit").click(function() {
            if ($('#form-transaction').valid()) {
                global.CRUD("#form-transaction");
            }
        })
        $("#btn-cancel").click(function() {
            document.location.hash = 'User';
        })
        var jml = $('#jumlah').val();
        var hrg = $('#harga_satuan').val();
        $('#jumlah').keyup(function(){
            jml = this.value;
            $('#harga_total').val(jml*hrg);
        });
        $('#harga_satuan').keyup(function(){
            hrg = this.value;
            $('#harga_total').val(jml*hrg);
        });

        $("#form-transaction").validate({
            highlight: function(element) {
                $(element).parent().parent('.form-group').addClass("has-error");
            },
            unhighlight: function(element) {
                $(element).parent().parent('.form-group').removeClass("has-error");
            },
            rules: {
                item: 'required',
                jumlah: {
                    required: true,
                    digits: true
                },
                harga_satuan: {
                    required: true,
                    digits: true 
                },
                harga_total: {
                    required: true,
                    digits: true
                },
            },
            errorClass: "block-error error",
            errorElement: "div",
        })
    })
</script>