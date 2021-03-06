<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Študentská prax vo firmách.">
    <meta name="author" content="Matúš Vaš">

    <title>Študentská prax - Študenti</title>

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

            <div class="col-lg-12">
                <div class="panel-heading">
                    <h2>Študenti, ktorí praxujú:</h2>
                </div>

                <div class="panel-body">
                    <div class="dataTable_wrapper">

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
                                <div class="panel panel-default ">

                                    <div class="panel-heading">
                                        <b>ŠTUDENTI</b>
                                        <a href="<?php echo site_url('studenti/add'); ?>" class="pull-right" title="Pridať záznam">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Názov školy</th>
                                            <th>Študent</th>
                                            <th>Rok narodenia</th>
                                            <th>Adresa</th>
                                            <th>Mesto</th>
                                            <th>Telefónne číslo</th>
                                            <th>E-mail</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="userData">
                                        <?php if (!empty($studenti)): foreach ($studenti as $Studenti): ?>
                                            <tr>
                                                <td>
                                                    <?php echo $Studenti->Nazov; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Studenti->fullname; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Studenti->Rok_narodenia; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Studenti->Adresa; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Studenti->Mesto; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Studenti->Telefon; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Studenti->Email; ?>
                                                </td>

                                                <td>
                                                    <a href="<?php echo site_url('studenti/view/' . $Studenti->idStudenti); ?>" title="Detail záznamu">
                                                        <i class="fas fa-eye"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('studenti/edit/' . $Studenti->idStudenti); ?>" title="Editovať záznam">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('studenti/delete/' . $Studenti->idStudenti); ?>"
                                                       onclick="return confirm('Naozaj chcete zmazať tento záznam?')" title="Zmazať záznam">
                                                        <i class="far fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; else: ?>
                                            <tr>
                                                <td colspan="4">Žiaden záznam nebol nájdený!</td>
                                            </tr>
                                        <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>

                                <div id="pagination" style="align-content: center">
                                    <ul class="pagination">
                                        <?php foreach ($links as $link) {
                                            echo "<li class=\"page-item\">". $link."</li>";
                                        } ?>
                                    </ul>
                                </div>

                            </div>
                        </div>
                    </div>
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