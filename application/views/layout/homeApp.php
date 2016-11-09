<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>ULP Geologi</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>theme/bootstrap/css/bootstrap.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>theme/font-awesome/css/font-awesome.min.css">

        <link rel="stylesheet" href="<?= base_url() ?>theme/dist/css/templatemo_style.css">
        <!-- jQuery 2.1.4 -->
        <script src="<?= base_url() ?>theme/dist/js/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.4 -->
        <script src="<?= base_url() ?>theme/bootstrap/js/bootstrap.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--fancy-box-->
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <script src="<?= base_url() ?>theme/dist/js/templatemo_custom.js"></script>
        <style type="text/css" media="screen">
            .btn-default {
                background-color: #fff;
                border-color: #fff;
            }
            .img-btn {
                border: 1px solid;
                border-radius: 50%;
                height: 150px;
                padding: 20px;
                width: 150px;
            }
        </style>
    </head>
    <body>
    <div class="site-header">
        <div class="main-navigation">
            <div class="container">
                <div class="row templatemo_gallerygap">
                    <div class="col-md-3 col-sm-12">
                        <a href="<?= base_url() ?>">
                            <h4><strong>ULP Geologi</h4>
                        </a>

                    </div> <!-- /.row -->
                </div> <!-- /.container -->
            </div>
        </div>
    </div> <!-- /.site-header -->

    <!-- gallery start -->
    <div class="content homepage" id="menu-1">
        <div class="container">
            <div class="row">
			<!--
                <div class="hex col-sm-6 col-md-6 kanan">
                    <div>
                        <div class="hexagon hexagon2 gallery-item">
                            <div class="hexagon-in1">			
                                <div class="hexagon-in2" style="background-image: url(<?= base_url() ?>theme/dist/img/event.png);">
                                    <div class="overlay">
                                        <a href="<?= base_url() ?>guest/event" class="fancybox fancybox.iframe event"><i class="fa fa-calendar"></i>
										</a>
										<div class="col-lg-12"><h2 align="center">EVENT</h2></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
			-->
                <div class="hex col-sm-6 col-md-6">
                    <div>
                        <div class="hexagon hexagon2 gallery-item">
                            <div class="hexagon-in1">
                                <div class="hexagon-in2" style="background-image: url(<?= base_url() ?>theme/dist/img/admin.png);">
                                    <div class="overlay">
                                        <a href="<?= base_url() ?>admin/index" class="fancybox fancybox.iframe <?php echo ($this->auth->is_logged_in() == false) ? 'admin' : ''; ?>"><i class="fa fa-sign-in"></i></a>
										<div class="col-lg-12"><h2 align="center">ADMIN</h2></div>
									</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
			<div class="clearfix"></div>
        </div>
        <div class="container">
            <div class="row">
                <div class="templatemo_loadmore">
                </div>
            </div>
        </div>
    </div>
    <!-- gallery end -->
    <!-- team start -->
    <!--team end-->
    <div class="clear"></div>
    <!-- service start -->
    <!-- service end -->
    <!-- contact start -->
    <!-- contact end -->
    <!-- footer start -->
    <div class="templatemo_footer">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
        Copyright &copy; 2016 ULP Geologi.
        </div>
            </div>        </div>
    </div>
        <script>
        $(document).ready(function(){
                $(".sidebar-toggle").click(function(){
        if ($('body').hasClass('sidebar-collapse')) {
        $('body').find('#logo-perusahaan').css('max-width', '30px');
                $('body').find('#nama-perusahaan').hide();
        } else {
                $('body').find('#nama-perusahaan').show();
                $('body').find('#logo-perusahaan').css('max-wi dth', '100px');
        }
        });
            $('.admin').fancybox({
                    closeBtn: false,
                    width: '450px',
                    autoHeight: true,
                    padding : 0,
                    margin: 0,
                    // openEffect  : 'elastic'
            });
            $('.event').fancybox({
                    closeBtn: false,
                    // width: '00px',
                    minHeight: '500px',
                    padding : 0,
                    margin: 0,
                    // openEffect  : 'elastic'
            });
    });
    </script>
</body>
</html>
