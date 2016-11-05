<style>
    .img-circle {
        border-radius: 50% !important;
    }
    img #not_satisfied {
        webkit-box-shadow: inset 0 0 0 200px rgba(36,36,70, 0.5);
	box-shadow: inset 0 0 0 200px rgba(36,36,70, 0.5);
    }
</style>
<div class="row">
    <div class="col-md-12" id="kontener">
        <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: center">
            <a id="not_satisfied">
                <img src="<?php echo base_url()?>theme/dist/img/not_satisfied.png" class="img-circle btn" id="not_satisfied" width="90%">
            Not Satisfied
            </a>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: center">
            <a id="not_bad">
            <img src="<?php echo base_url()?>theme/dist/img/enough2.png" class="img-circle btn" id="not_bad" width="90%">
            Not Bad
            </a>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: center">
            <a id="satisfied">
            <img src="<?php echo base_url()?>theme/dist/img/satisfied.jpg" class="img-circle btn" id="satisfied" width="90%">
            Satisfied
            </a>
        </div>
        <div class="col-md-3 col-sm-3 col-xs-3" style="text-align: center">
            <a id="very_satisfied">
            <img src="<?php echo base_url()?>theme/dist/img/very_satisfied.png" class="img-circle btn" id="very_satisfied" width="90%">
            Very Satisfied
            </a>
        </div>
    </div>
</div>
<script>
$(document).ready(function(){
$("#kontener a").click(function(){
				$.ajax({
				type    : "POST",
				url     : "Guest/addSatisfaction/<?=$id?>/"+this.id, 
				success : function(html){ 
				$("#myModal").modal("hide");	
				},
				
				});
})
})
</script>