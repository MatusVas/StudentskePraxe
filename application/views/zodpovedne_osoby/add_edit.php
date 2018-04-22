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
            <li><a href="<?php echo base_url();?>index.php"><i class="fas fa-home"></i> <b>DOMOV</b></a></li>
        </ul>

        <ul class="nav navbar-right navbar-top-links">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <b>Meno študenta</b>
                </a>
            </li>
        </ul>

        <div class="navbar-default sidebar" role="navigation">
            <div class="sidebar-nav navbar-collapse">
                <ul class="nav" id="side-menu">
                    <li>
                        <a href="<?php echo site_url('firmy/index')?>" class="active">
                            <i class="fas fa-user-circle"></i>
                            Firmy
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('zodpovedne_osoby/index'); ?>" class="active">
                            <i class="fas fa-users"></i>
                            Zodpovedné osoby
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('skoly/index'); ?>" class="active">
                            <i class="fas fa-graduation-cap"></i>
                            Školy
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('studenti/index'); ?>" class="active">
                            <i class="fas fa-users"></i>
                            Študenti
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('prehlad_praxe/index'); ?>" >
                            <i class="far fa-list-alt"></i>
                            Prehľad praxe
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo site_url('zarobok_studenta/index'); ?>" >
                            <i class="far fa-chart-bar"></i>
                            Zárobok študenta
                        </a>
                    </li>
                </ul>
            </div>
    </nav>

    <div id="page-wrapper" style="margin-top:5%;">

        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Pridanie/Edit zodpovedné osoby:</h1>

                <div class="col-xs-12">
                    <?php
                    if (!empty($success_msg)) {
                        echo '<div class="alert alert-success">' . $success_msg . '</div>';
                    } elseif (!empty($error_msg)) {
                        echo '<div class="alert alert-danger">' . $error_msg . '</div>';
                    }
                    ?>
                </div>

                <div class="row">
                    <div class="col-xs-12">
                        <div class="panel panel-default">

                            <div class="panel-heading">
                                <b>Zodpovedná osoba</b>
                                <a href="<?php echo site_url('zodpovedne_osoby'); ?>" class="pull-right">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </div>

                            <div class="panel-body">
                                <form method="post" action="" class="form">
                                    <div class="form-group">
                                        <label for="title"><b>Meno</b></label>
                                        <input type="text" class="form-control" name="Meno" placeholder="Zadajte meno"
                                               value="<?php echo !empty($post['Meno']) ? $post['Meno'] : ''; ?>">
                                        <?php echo form_error('Meno', '<p class="help-block text-danger">', '</p>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="title"><b>Priezvisko</b></label>
                                        <input type="text" class="form-control" name="Priezvisko" placeholder="Zadajte priezvisko"
                                               value="<?php echo !empty($post['Priezvisko']) ? $post['Priezvisko'] : ''; ?>">
                                        <?php echo form_error('Priezvisko', '<p class="help-block text-danger">', '</p>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="title"><b>Telefón</b></label>
                                        <input type="text" class="form-control" name="Telefon" placeholder="Zadajte telefón"
                                               value="<?php echo !empty($post['Telefon']) ? $post['Telefon'] : ''; ?>">
                                        <?php echo form_error('Telefon', '<p class="help-block text-danger">', '</p>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <label for="title"><b>E-mail</b></label>
                                        <input type="text" class="form-control" name="Email" placeholder="Zadajte e-mail"
                                               value="<?php echo !empty($post['Email']) ? $post['Email'] : ''; ?>">
                                        <?php echo form_error('Email', '<p class="help-block text-danger">', '</p>'); ?>
                                    </div>

                                    <div class="form-group">
                                        <?php echo form_label('Názov firmy'); ?>
                                        <?php echo form_dropdown('idFirmy', $firmy, $firma_selected, 'class="form-control"'); ?>
                                    </div>

                                    <input type="submit" name="postSubmit" class="btn btn-primary" value="Potvrdiť"/>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.col-lg-12 -->
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
