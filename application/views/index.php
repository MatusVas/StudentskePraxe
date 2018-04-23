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
                        <a href="<?php echo site_url('pracovny_den/index'); ?>" >
                            <i class="far fa-chart-bar"></i>
                            Zárobok študenta
                        </a>
                    </li>
                </ul>
            </div>
    </nav>

    <div id="page-wrapper" style="margin-top:5%;">

        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-comments fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">26</div>
                                <div>New Comments!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">12</div>
                                <div>New Tasks!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">124</div>
                                <div>New Orders!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>Support Tickets!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
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