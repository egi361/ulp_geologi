<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Guest Book</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.4 -->
        <link rel="stylesheet" href="<?= base_url() ?>theme/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>theme/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons 2.0.0 -->
        <!-- Theme style -->
        <link rel="stylesheet" href="<?= base_url() ?>theme/dist/css/styles.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/datatables/extensions/Responsive/css/dataTables.responsive.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/datatables/extensions/Scroller/css/dataTables.scroller.css">
		<link rel="stylesheet" href="<?=base_url()?>theme/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/datepicker/datepicker3.css">
        <link rel="stylesheet" type="text/css" href="<?= base_url() ?>theme/dist/css/animate.css" />
        <link rel="stylesheet" href="<?= base_url() ?>theme/dist/css/skins/_all-skins.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/dist/css/ugi-custom.css">
        <!-- jQuery 2.1.4 -->
        <script src="<?= base_url() ?>theme/dist/js/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.4 -->
        <script src="<?= base_url() ?>theme/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>theme/dist/js/pace.js"></script>
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/select2/select2.min.css">
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/select2/select2.full.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/datepicker/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/datepicker/locales/bootstrap-datepicker.id.js"></script>
        <!-- Jquery Validation -->
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/validation/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/validation/dist/localization/messages_id.js"></script>
        <!-- Charts -->
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/highcharts/highcharts.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/highcharts/themes/grid.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/highcharts/modules/exporting.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/highcharts/modules/offline-exporting.js"></script>

        <script type="text/javascript">
            var base_url = '<?php echo base_url(); ?>';
        </script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
            <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-blue sidebar-mini">
        <div class="wrapper">

            <header class="main-header">
                <nav class="navbar navbar-static-top" role="navigation">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <!-- Messages: style can be found in dropdown.less-->
                            <li class="user user-menu">
                                <a href="<?= base_url() ?>Login/logout" >
                                    <i class="fa fa-power-off"></i> Logout
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <!-- <div class="image"> -->
                        <img src="<?= base_url() ?>theme/dist/img/logo.png" class="" id="logo-perusahaan">
                        <!-- </div> -->
                        <h5 id="nama-perusahaan"><strong>PT. MULTIGUNA<br>CIPTASENTOSA</strong></h5>
                    </div>
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" id="sidebar">
                        <li class="header"> </li>
						<li class="active"><a href="#Dashboard"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>


            <div class="content-wrapper">
                <section class="content-header">
                    <h1>
                        &nbsp;
                    </h1>
                    <ol class="breadcrumb" id="breadcrumb">

                    </ol>
                </section>
                <div class='alert alert-success' id="success-info" style='display:none'></div>
                <div id="loading" style="position:absolute;text-align:center;width:80%;z-index: 100;padding: 20px 0;display:none"><img src='<?= base_url(); ?>theme/dist/img/loader.gif' style="max-width: 25px"/></div>
                <div id="content" class="animated fadeInDownBig">
                    
                </div>
            </div><!-- /.content-wrapper -->
            <footer class="main-footer">
                Copyright &copy; 2015 PT. MULTIGUNA CIPTASENTOSA.
            </footer>
        </div>
        <script src="<?= base_url() ?>theme/dist/js/app.js"></script>
        <script src="<?= base_url() ?>theme/global.js"></script>
        <script src="<?= base_url() ?>theme/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>theme/plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="<?=base_url()?>theme/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>
        <script src="<?= base_url() ?>theme/plugins/datatables/extensions/Responsive/js/dataTables.responsive.min.js"></script>
        <script src="<?= base_url() ?>theme/plugins/ckeditor/ckeditor.js"></script>
        <script src="<?= base_url() ?>theme/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>

        <script>
            $(document).ready(function() {
                $(".sidebar-toggle").click(function() {
                    if ($('body').hasClass('sidebar-collapse')) {
                        $('body').find('#logo-perusahaan').css('max-width', '30px');
                        $('body').find('#nama-perusahaan').hide();
                    } else {
                        $('body').find('#nama-perusahaan').show();
                        $('body').find('#logo-perusahaan').css('max-width', '100px');
                    }
                });
				$("#sidebar").on("click","li a",function(){
				$("#sidebar li").removeClass("active");
				$(this).parent().addClass("active");
				})
                global.getmenu();
				$("#content").load("<?=base_url()?>Dashboard");
            });
        </script>
    </body>
</html>
