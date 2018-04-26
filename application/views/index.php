<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Študentská prax vo firmách.">
    <meta name="author" content="Matúš Vaš">

    <title>Študentská prax</title>

    <!-- Page Icon -->
    <link rel="icon" href="<?php echo base_url();?>assets/logo.png">

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/metisMenu.min.css" rel="stylesheet">
    <link href="><?php echo base_url(); ?>assets/css/timeline.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/startmin.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/css/morris.css" rel="stylesheet">
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>

    <!-- Icons -->
    <link href="<?php echo base_url();?>assets/css/fa-svg-with-js.css" rel="stylesheet">
    <script src="<?php echo base_url();?>assets/js/fontawesome-all.min.js"></script>
</head>

<body>
<div id="wrapper">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">

        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <ul class="nav navbar-nav navbar-left navbar-top-links">
            <li>
                <a href="<?php echo base_url();?>index.php">
                    <i class="fas fa-home"></i>
                    <b>DOMOV</b>
                </a>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo site_url('firmy/index')?>" class="active">
                            <i class="fas fa-user-circle"></i>
                            <b>Firmy</b>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('zodpovedne_osoby/index'); ?>" class="active">
                            <i class="fas fa-users"></i>
                            <b>Zodpovedné osoby</b>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('skoly/index'); ?>" class="active">
                            <i class="fas fa-graduation-cap"></i>
                            <b>Školy</b>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('studenti/index'); ?>" class="active">
                            <i class="fas fa-users"></i>
                            <b>Študenti</b>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('prehlad_praxe/index'); ?>" >
                            <i class="far fa-list-alt"></i>
                            Prehľad praxe
                        </a>
                    </li>
                </ul>
            </div>
    </nav>

    <div id="page-wrapper" style="margin-top:5%;">
        <div class="row">

            <div style="margin-bottom: 5%; text-align: center;">
                <p>
                <h4><b>Ponúkame prax pre študentov na vysokých školách, nie len na Slovenku, ale aj v zahraničí!</b></h4>
                </p>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel" style="background-color: rgba(0,0,80,0.9); color: white;">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fas fa-user-circle fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $firmy_count;?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo site_url('firmy/index')?>">
                        <div class="panel-footer">
                            <span class="pull-left"><b>FIRMY</b></span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel" style="background-color: rgba(0,0,100,0.9); color: white;">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fas fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $zodpovedne_osoby_count;?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo site_url('zodpovedne_osoby/index'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left"><b>ZODPOVEDNÉ OSOBY</b></span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel" style="background-color: rgba(0,0,120,0.9); color: white;">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fas fa-graduation-cap fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $skoly_count;?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo site_url('skoly/index'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left"><b>ŠKOLY</b></span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel" style="background-color: rgba(0,0,140,0.9); color: white;">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fas fa-users fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge"><?php echo $studenti_count;?></div>
                            </div>
                        </div>
                    </div>
                    <a href="<?php echo site_url('studenti/index'); ?>">
                        <div class="panel-footer">
                            <span class="pull-left"><b>ŠTUDENTI</b></span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
        <!-- /.row -->
    </div>
    <!-- /.page-wrapper -->

    <!-- Bootstrap core JavaScript -->
        <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/metisMenu.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/raphael.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/morris.min.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/morris-data.js"></script>
        <script src="<?php echo base_url(); ?>assets/js/startmin.js"></script>

</body>
</html>