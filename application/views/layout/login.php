<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="halaman login aplikasi"./>
<title>Guest Book - Administrator</title>
<!-- Bootstrap 3.3.4 -->
<link rel="stylesheet" href="<?php echo base_url();?>theme/bootstrap/css/bootstrap.min.css">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?= base_url()?>theme/font-awesome/css/font-awesome.min.css">
<link rel="stylesheet" href="<?=base_url()?>theme/login/assets/css/form-elements.css">
<link rel="stylesheet" href="<?=base_url()?>theme/login/assets/css/style.css">
<!-- Favicon and touch icons -->
<link rel="shortcut icon" href="<?=base_url()?>/theme/login/assets/ico/favicon.png">
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url()?>theme/login/assets/ico/apple-touch-icon-144-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url()?>theme/login/assets/ico/apple-touch-icon-114-precomposed.png">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url()?>theme/login/assets/ico/apple-touch-icon-72-precomposed.png">
<link rel="apple-touch-icon-precomposed" href="<?=base_url()?>theme/login/assets/ico/apple-touch-icon-57-precomposed.png">
<script type="text/javascript">
	var base_url = '<?php echo base_url();?>';
</script>
<style type="text/css">
.block-error{
    color: #b94a48;
}
</style>
</head>
<body>
	<!-- Top content 
        <div class="top-content">
        	
            <div class="inner-bg">
                <div class="container">-->
                    <div class="row">
                        <div class="form-box" style="margin-top: 0;">
                        	<div class="form-top">
                        		<div class="form-top-left">
                        			<h3>Login Aplikasi Guest Book</h3>
                            		<p>Login as Administrator</p>
                        		</div>
                        		<div class="form-top-right">
                        			<i class="fa fa-key"></i>
                        		</div>
                            </div>
                            <div class="form-bottom">
			                    <form role="form" action="<?=base_url()?>Login/login" method="post" class="login-form">
			                    	<div class="form-group">
			                    		<label class="sr-only" for="form-username">Username</label>
			                        	<input type="text" name="Login[username]" placeholder="Username..." class="form-username form-control" id="form-username">
			                        </div>
			                        <div class="form-group">
			                        	<label class="sr-only" for="form-password">Password</label>
			                        	<input type="password" name="Login[password]" placeholder="Password..." class="form-password form-control" id="form-password">
			                        </div>
									<?=@$data['error']?>
									<button type="submit" class="btn btn-primary">Sign in!</button>
			                    </form>
		                    </div>
                        </div>
                    </div>
                     
        <!--         </div>
            </div>
            
        </div>-->


        <!-- Javascript -->
        <!-- jQuery 2.1.4 -->
	    <script src="<?=base_url()?>theme/dist/js/jQuery/jQuery-2.1.4.min.js"></script>
	    <!-- Bootstrap 3.3.4 -->
	    <script src="<?=base_url()?>theme/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?=base_url()?>theme/login/assets/js/jquery.backstretch.min.js"></script> 
        <script src="<?=base_url()?>theme/login/assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->
</body>
</html>