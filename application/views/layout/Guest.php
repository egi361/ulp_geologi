<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"><![endif]-->
        <title>Multiguna Ciptasentosa </title>
        <meta name="description" content="">

        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="<?= base_url() ?>theme/Guest/css/bootstrap.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/Guest/css/normalize.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/Guest/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/select2/select2.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/Guest/css/animate.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/Guest/css/templatemo_misc.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/Guest/css/templatemo_style.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/datatables/dataTables.bootstrap.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/datatables/extensions/Responsive/css/dataTables.Responsive.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/datatables/extensions/TableTools/css/dataTables.tableTools.css">

        <link rel="stylesheet" href="<?= base_url() ?>theme/plugins/fancybox/source/jquery.fancybox.css" type="text/css" media="screen" />

        <script src="<?= base_url() ?>theme/Guest/js/vendor/modernizr-2.6.2.min.js"></script>

        <style type="text/css">
            .has-error label, .required {
                color: #dd4b39;
            }
            .block-error {
                color: #b94a48;
            }
            .menu-small li{
                background-color: #006699;
                color: #fff;
            }
            .main-menu li a:hover, .toggle-menu .fa-bars:hover{
                color: #f5a200;
            }
            .toggle-menu .fa-bars{
                color: #fff;
            }
        </style>
    </head>
    <body>
        <div id="front">
            <div class="site-header">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-sm-6 col-xs-6">
                            <div id="templatemo_logo">
                                <h1><a href="#">Multiguna Ciptasentosa</a></h1>
                            </div> <!-- /.logo -->
                        </div> <!-- /.col-md-4 -->
                        <div class="col-md-8 col-sm-6 col-xs-6">
                            <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
                            <div class="main-menu">
                                <ul>
                                    <li><a href="#front">Home</a></li>
                                    <li><a href="#GuestBook">Guest Book</a></li>
                                    <li><a href="#GuestData">Guest Data</a></li>
                                    <li><a id="logout"href="#">Exit</a></li>   
                                </ul>
                            </div> <!-- /.main-menu -->
                        </div> <!-- /.col-md-8 -->
                    </div> <!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="responsive">
                                <div class="main-menu menu-small">
                                    <ul>
                                        <li><a href="#front">Home</a></li>
                                        <li><a href="#GuestBook">Guest Book</a></li>
                                        <li><a href="#GuestData">Guest Data</a></li>
                                        <li><a id="logout"href="#">Exit</a></li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- /.container -->
            </div> <!-- /.site-header -->
        </div> <!-- /#front -->

        <div class="site-slider">
            <ul class="bxslider">
                <?php foreach ($content as $row) { ?>
                    <li>
                        <img src="<?= base_url() ?>image/<?= $row->file_name ?>" alt="<?= $row->file_name ?>">
                        <div class="container caption-wrapper">
                            <div class="slider-caption">
                                <h2><?= $row->file_description ?></h2>
                            </div>
                        </div>
                    </li>
                <?php }
                ?>
            </ul> <!-- /.bxslider -->
        </div> <!-- /.site-slider -->
        <div id="Description" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="section-title"><?= $event->event_name ?></h1>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
                <div class="row">
                    <div class="col-md-12">
                        <?= $event->event_description ?>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#products -->

        <div id="GuestBook" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="section-title">Guest Book</h1>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
                <div class="row col-lg-12">
                    <form id="form-guest" role="form" action="Guest/insert" method="POST">	   
                        <fieldset class="col-lg-12" style="margin-bottom:10px;">
                            <legend>Personal Data</legend>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name" class="control-label">Name <span class="required">*</span></label>
                                    <input type="text" name="name" class="form-control" id="name" placeholder="Name">
                                </div>
                                <div class="form-group">
                                    <label for="email" class="control-label">Email</label>
                                    <input type="text" name="email"class="form-control" id="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="mobileNumber" class="control-label">Mobile Number <span class="required">*</span></label>
                                    <input type="text" name="mobileNumber"class="form-control" id="mobileNumber" placeholder="Mobile Number">
                                </div>
                                <div class="form-group">
                                    <label for="interestingProduct" class="control-label">Interesting Product</label>
                                    <input type="text" name="interestingProduct" class="form-control" id="interestingProduct" placeholder="Interesting Product">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="col-lg-12">
                            <legend>Institution Data</legend>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="institutionName" class="control-label">Institution Name <span class="required">*</span></label>
                                    <input type="text" name="institutionName"class="form-control" id="institutionName" placeholder="Institution Name">
                                </div>
                                <div class="form-group">
                                    <label for="division" class="control-label">Division</label>
                                    <input type="text" name="division"class="form-control" id="division" placeholder="Division">
                                </div>
                                <div class="form-group">
                                    <label for="province" class="control-label">Province</label>
                                    <select name="province"class="form-control" id="province" placeholder="Province"></select>
                                </div>
                                <div id="data_city">
                                    <div class="form-group">
                                        <label for="city" class="control-label">City</label>
                                        <select name="city" class="form-control" id="city" placeholder="Kota"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="institutionPhone" class="control-label">Institution Phone Number</label>
                                    <input type="text" name="institutionPhone"class="form-control" id="institutionPhone" placeholder="Institution Phone Number">
                                </div>

                                <div class="form-group">
                                    <label for="institutionEmail" class="control-label">Institution Email</label>
                                    <input type="text" name="institutionEmail"class="form-control" id="institutionEmail" placeholder="Institution Email">
                                </div>
                                <div class="form-group">
                                    <label for="address" class="control-label">Address</label>
                                    <textarea name="address"class="form-control" id="address" placeholder="Address"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-lg-12">	
                                    <div class="pull-right">
                                        <button type="submit" class="btn btn-primary" id="btn-submit">Save</button> 
                                        <button type="reset" class="btn btn-default" id="btn-cancel">Cancel</button>
                                    </div>
                                </div>
                            </div>	
                        </fieldset>	  
                    </form> 
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#services -->

        <div id="GuestData" class="content-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="section-title">Guest Data</h1>
                    </div> <!-- /.col-md-12 -->
                </div> <!-- /.row -->
                <div class="row" id="GuestTable">

                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /#products -->

        <div class="site-footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 col-sm-6">
                        <span>
                            Copyright &copy; 2015 Multiguna Ciptasentosa
                        </span>

                    </div> <!-- /.col-md-6 -->
                </div> <!-- /.row -->
            </div> <!-- /.container -->
        </div> <!-- /.site-footer -->

        <div id="myModal" class="modal fade" style="z-index:10000;">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Satisfaction</h4>
                    </div>
                    <div class="modal-body" id="modalRender"></div>
                    <div class="modal-footer">
                        <!--<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>-->
                    </div>
                </div>
            </div>
        </div>

        <script src="<?= base_url() ?>theme/Guest/js/vendor/jquery-1.10.1.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/fancybox/source/jquery.fancybox.pack.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/select2/select2.full.min.js"></script>
        <script>window.jQuery || document.write('<script src="<?= base_url() ?>theme/Guest/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
        <script src="<?= base_url() ?>theme/Guest/js/jquery.easing-1.3.js"></script>
        <script src="<?= base_url() ?>theme/Guest/js/bootstrap.js"></script>
        <script src="<?= base_url() ?>theme/Guest/js/plugins.js"></script>
        <script src="<?= base_url() ?>theme/Guest/js/main.js"></script>
        <script src="<?= base_url() ?>theme/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?= base_url() ?>theme/plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script src="<?= base_url() ?>theme/plugins/datatables/extensions/Responsive/js/dataTables.Responsive.min.js"></script>
        <script src="<?= base_url() ?>theme/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.js"></script>
        <!-- Jquery Validation -->
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/validation/dist/jquery.validate.min.js"></script>
        <script type="text/javascript" src="<?= base_url() ?>theme/plugins/validation/dist/localization/messages_id.js"></script>
        <script>
            $(document).ready(function() {
                var data_select_kabupaten = <?php echo $kabupaten; ?>;
                $('#city').select2({data: data_select_kabupaten});
                var data_select_provinsi = <?php echo $provinsi; ?>;
                $('#province').select2({data: data_select_provinsi});
                $("#GuestTable").load('<?= base_url() ?>Guest/loadDataGuest');

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
                            //                            required: true,
                            email: true
                        },
                        // interestingProduct: "required",
                        institutionName: "required",
                        //                        division: "required",
                        //                        city: "required",
                        //                        province: "required",
                        institutionEmail: {
                            // required: true,
                            email: true
                        },
                        // institutionPhone: "required"
                    },
                    errorClass: "block-error error",
                    errorElement: "div",
                });
                $("#logout").click(function() {
                    document.location.href = "<?= base_url() ?>Login/logout";
                })

            })
            $(document).on("submit", "#form-guest", function(e) {
                e.preventDefault();
                var formData = new FormData($(this)[0]);
                $.ajax({
                    type: "POST",
                    url: "Guest/insert",
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(html) {
                        $("#GuestTable").load('<?= base_url() ?>Guest/loadDataGuest');
                    },
                });
                document.getElementById("form-guest").reset();
                var PositionGuest = $("#GuestData").position();
                $('html,body').scrollTop(PositionGuest.top);


            });


        </script>
    </body>
</html>