<form role="form" id="form-guest" action="guestbook/editData/<?= $data->id_guest_book ?>" method="POST">
    <div class="box-body">
        <fieldset class="col-lg-12" style="margin-bottom:10px;">
            <legend>Personal Data</legend>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="name" class="control-label">Name <span class="required">*</span></label>
                    <input type="text" name="name" class="form-control" id="name" placeholder="Name" value="<?= $data->name ?>">
                </div>
                <div class="form-group">
                    <label for="interestingProduct" class="control-label">Interesting Product</label>
                    <input type="text" name="interestingProduct" class="form-control" id="interestingProduct" placeholder="Interesting Product" value="<?= $data->interesting_product ?>">
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="email" class="control-label">Email</label>
                    <input type="text" name="email"class="form-control" id="email" placeholder="Email" value="<?= $data->email ?>">
                </div>
                <div class="form-group">
                    <label for="mobileNumber" class="control-label">Mobile Number <span class="required">*</span></label>
                    <input type="text" name="mobileNumber"class="form-control" id="mobileNumber" placeholder="Mobile Number" value="<?= $data->phone ?>">
                </div>
            </div>
        </fieldset>
        <fieldset class="col-lg-12">
            <legend>Institution Data</legend>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="institutionName" class="control-label">Institution Name <span class="required">*</span></label>
                    <input type="text" name="institutionName"class="form-control" id="institutionName" placeholder="Institution Name" value="<?= $data->institute ?>">
                </div>
                <div class="form-group">
                    <label for="division" class="control-label">Division</label>
                    <input type="text" name="division"class="form-control" id="division" placeholder="Division" value="<?= $data->division ?>">
                </div>
                <div class="form-group">
                    <label for="province" class="control-label">Province</label>
                    <select name="province"class="form-control" id="province" placeholder="Province"></select>
                </div>
                <div class="form-group">
                    <label for="address" class="control-label">Address <span class="required">*</span></label>
                    <textarea name="address"class="form-control" id="address" placeholder="Address"><?= $data->institution_address ?></textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="form-group">
                    <label for="institutionPhone" class="control-label">Institution Phone Number</label>
                    <input type="text" name="institutionPhone"class="form-control" id="institutionPhone" placeholder="Institution Phone Number" value="<?= $data->institute_phone ?>">
                </div>

                <div class="form-group">
                    <label for="institutionEmail" class="control-label">Institution Email</label>
                    <input type="text" name="institutionEmail"class="form-control" id="institutionEmail" placeholder="Institution Email" value="<?= $data->institute_email ?>">
                </div>
				<div class="form-group">
                    <label for="Description" class="control-label">Description</label>
                    <textarea name="description"class="form-control" id="description" placeholder="Description"><?=$data->description?></textarea>
                </div>
                <div id="data_city">
                    <div class="form-group">
                        <label for="city" class="control-label">City</label>
                        <select name="city" class="form-control" id="city" placeholder="Kota"></select>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="box-footer">   
        <button type="button" class="btn btn-default" id="btn-cancel">Cancel</button>
        <button type="button" class="btn btn-action" id="btn-submit">Save</button>
    </div><!-- /.box-footer -->
</form>
<script>
    $(document).ready(function() {
        var prov = <?php echo json_encode($provinsi); ?>;
        var kab = <?php echo json_encode($kabupaten); ?>;

        $('#province').select2({data: prov});
        $('#province').select2('val', '<?= $data->provinsi ?>');

        $('#city').select2({
            data: kab});
        $('#city').select2('val', '<?= $data->city ?>');

        $("#form-guest").validate({
            highlight: function(element) {
                $(element).parent().addClass("has-error");
            },
            unhighlight: function(element) {
                $(element).parent().removeClass("has-error");
            },
            rules: {
                name: "required",
                mobileNumber: "required",
                email: {
//                    required: true,
                    email: true
                },
                // interestingProduct: "required",
                institutionName: "required",
//                division: "required",

                institutionEmail: {
                    // required: true,
                    email: true
                },
                // institutionPhone: "required"
            },
            errorClass: "block-error error",
            errorElement: "div",
        });

        $("#btn-submit").click(function() {
            if ($('#form-guest').valid()) {
                global.CRUD("#form-guest");
            }
        })
        var pv;
        var ph = $('#city').attr('placeholder');
        $('#province').change(function() {
            $("#data_city").load("<?=base_url()?>Guestbook/getCity/"+this.value)
        });

    })
</script>