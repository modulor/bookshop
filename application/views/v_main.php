<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Kinedu Bookshop">
    <meta name="author" content="Kinedu">

    <title>Kinedu Bookshop!</title>

    <!-- Bootstrap Core CSS -->
    <?php echo link_tag('assets/css/bootstrap.min.css'); ?>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <!-- bootstrap calendar -->
    <?php echo link_tag("assets/css/datepicker.css") ?>

    <!-- select multiple -->
    <?php echo link_tag("assets/css/bootstrap-chosen.css") ?>

    <!-- Custom CSS -->
    <style>
    body {
        padding-top: 70px;
        /* Required padding for .navbar-fixed-top. Remove if using .navbar-static-top. Change if height of navigation changes. */
    }
    </style>

    <?php echo link_tag("assets/css/style.css"); ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <!-- Navigation -->
    <nav class="navbar navbar-fixed-top navbar-inverse" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url() ?>">Bookshop!</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php $this->load->view("v_menu") ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- /.Navigatin -->

    <!-- Page Content -->
    <div class="container">

        <?php 
            $this->load->view($v_section);
        ?>

    </div>
    <!-- /.container -->

    <!-- jQuery Version 1.11.1 -->
    <script src="<?php echo base_url('assets/js/jquery.js');?>"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>

    <!-- var base_url -->
    <script>var base_url = "<?php echo base_url() ?>"</script>

    <!-- datepicker -->
    <script src="<?php echo base_url('assets/js/bootstrap-datepicker.js') ?>"></script>

    <!-- multiple select -->
    <script src="http://harvesthq.github.io/chosen/chosen.jquery.js"></script>

    <!-- only numbers on inputs -->
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.numeric.min.js') ?>"></script>

    <!-- over state on main menu -->
    <script src="<?php echo base_url("assets/js/menu.js") ?>"></script>

    <!-- form validations -->
    <script src="<?php echo base_url('assets/js/validations.js') ?>"></script>

</body>

</html>
