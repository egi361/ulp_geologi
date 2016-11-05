<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="keywords" content="halaman login aplikasi"./>
        <title>Guest Book - Administrator</title>
        <!-- Bootstrap 3.3.4 -->
        <link rel="stylesheet" href="<?= base_url() ?>theme/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?= base_url() ?>theme/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/login/assets/css/form-elements.css">
        <link rel="stylesheet" href="<?= base_url() ?>theme/dist/css/styles.css">
        
        <script type="text/javascript">
            var base_url = '<?php echo base_url(); ?>';
        </script>
        <style type="text/css">
            .btn-primary{
                width: 50%;
            }
        </style>
    </head>
    <body>
        <section class="content" style="padding: 0;">
            <div class="box" style="margin-bottom: 0;">
                <div class="box-header with-border">
                    <h3>Choose Event <i class="fa fa-calendar fa-2x pull-right"></i></h3>
                </div>
                <div class="form-group"></div>
                <div class="box-body with-border" style="background-color: #eee;min-height: 380px; text-align: center;">
                    <?php
                    if (isset($data) && !empty($data)) {
                        foreach ($data as $value) {
                            echo '<a href="' . base_url() . 'Guest/enterEvent/' . $value->id_event . '"class="btn btn-primary" style="margin-top: 20px;"><i class="fa fa-calendar fa-3x pull-right"></i> <span class="fa-2x pull-left">' . $value->event_name . '</span></a><br>';
                        }
                    } else {
                        echo '<a class="btn btn-primary disabled" style="margin-top: 20px;"><span class="fa-2x"> Event Tidak Tersedia</span></a><br>';
                    }
                    ?>
                </div>
                <div class="box-footer" style="min-height: 60px">
                </div>
            </div>
        </section>
        <!-- jQuery 2.1.4 -->
        <script src="<?= base_url() ?>theme/dist/js/jQuery/jQuery-2.1.4.min.js"></script>
        <!-- Bootstrap 3.3.4 -->
        <script src="<?= base_url() ?>theme/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?= base_url() ?>theme/login/assets/js/jquery.backstretch.min.js"></script> 
        <script src="<?= base_url() ?>theme/login/assets/js/scripts.js"></script>
    </body>
</html>