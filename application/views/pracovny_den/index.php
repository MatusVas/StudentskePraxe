<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Študentská prax vo firmách.">
    <meta name="author" content="Matúš Vaš">

    <title>Študentská prax - Pracovný deň</title>

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
                </ul>
            </div>
    </nav>

    <div id="page-wrapper" style="margin-top:5%; margin-bottom: 5%;">

        <div class="row">

            <div class="col-lg-12">
                <div class="panel-heading">
                    <h2>Pracovný deň študenta - Meno študenta:</h2>
                </div>
                <!-- /.panel-heading -->

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
                                        <b>PRACOVNÉ DNI</b>
                                        <a href="<?php echo site_url('pracovny_den/add'); ?>" class="pull-right" title="Pridať záznam">
                                            <i class="fas fa-plus"></i>
                                        </a>
                                    </div>

                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Pracovný deň</th>
                                            <th>Hodinová sadzba</th>
                                            <th>Počet odpracovaných hodín</th>
                                            <th>Celkový zárobok</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody id="userData">
                                        <?php if (!empty($pracovny_den)): foreach ($pracovny_den as $Pracovny_den): ?>
                                            <tr>
                                                <td>
                                                    <?php echo '#' . $Pracovny_den->idPracovny_den; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Pracovny_den->Den; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Pracovny_den->Hodinova_sadzba; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Pracovny_den->Pocet_hodin; ?>
                                                </td>
                                                <td>
                                                    <?php echo $Pracovny_den->total; ?>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('pracovny_den/edit/' . $Pracovny_den->idPracovny_den); ?>" title="Editovať záznam">
                                                        <i class="far fa-edit"></i>
                                                    </a>
                                                    <a href="<?php echo site_url('pracovny_den/delete/' . $Pracovny_den->idPracovny_den); ?>"
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
                                        <!-- Show pagination links -->
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

        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>

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

    <!-- Graphs -->
    <script src="<?php echo base_url();?>assets/js/chart.min.js">"></script>
    <script>
        var ctx = document.getElementById("myChart");
        var myChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"],
                datasets: [{
                    data: [1339, 2145, 1483, 2003, 2489, 2092, 1034],
                    lineTension: 0,
                    backgroundColor: 'transparent',
                    borderColor: '#007bff',
                    borderWidth: 4,
                    pointBackgroundColor: '#007bff'
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: false
                        }
                    }]
                },
                legend: {
                    display: false,
                }
            }
        });
    </script>

</body>
</html>