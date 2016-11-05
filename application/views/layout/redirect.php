	<script src="<?=base_url()?>theme/dist/js/jQuery/jQuery-2.1.4.min.js"></script>
    <!--fancy-box-->
	<link rel="stylesheet" href="<?=base_url()?>theme/plugins/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
    <script type="text/javascript" src="<?=base_url()?>theme/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
	<script>
		$(document).ready(function(){
			parent.jQuery.fancybox.close();
			parent.location.href="<?=base_url()."$data"?>";
			
		})
		</script>