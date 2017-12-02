<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>/assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>/assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sistem Informasi Manajemen Risiko Proyek</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url(); ?>/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url(); ?>/assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>/assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>/assets/css/themify-icons.css" rel="stylesheet">
    
    <!--  JavaScript  -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>

</head>
<body>

<div class="wrapper">
	<div class="sidebar" data-background-color="white" data-active-color="danger">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="#" class="simple-text">
                    Anantagraha Primaperkasa
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="profil">
                        <i class="ti-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <li>
                    <a href="pengguna">
                        <i class="ti-id-badge"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li>
                    <a href="proyek">
                        <i class="ti-agenda"></i>
                        <p>Proyek</p>
                    </a>
                </li>
                <li>
                    <a href="pekerjaan">
                        <i class="ti-list"></i>
                        <p>Pekerjaan</p>
                    </a>
                </li>
                <li>
                    <a href="identifikasi-risiko">
                        <i class="ti-search"></i>
                        <p>Identifikasi Risiko</p>
                    </a>
                </li>
                <li>
                    <a href="risiko">
                        <i class="ti-alert"></i>
                        <p>Risiko</p>
                    </a>
                </li>
                <li class="active">
                    <a href="#">
                        <i class="ti-shield"></i>
                        <p>Mitigasi</p>
                    </a>
                </li>
                <li>
                    <a href="laporan">
                        <i class="ti-pencil-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
		<nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Mitigasi</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="keluar">
                                <i class="ti-power-off"></i>
                                <p>Keluar</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-5">
                                        <h4 class="title">Daftar Mitigasi</h4>
                                        <p class="category">Kelola data mitigasi</p>
                                    </div>
                                    <div class="col-md-7">
                                        <a href="mitigasi-tambah" class="btn btn-info btn-fill btn-wd" style="float: right;">+ Mitigasi</a>
                                    </div>
                                </div>
                                <br>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped">
                                    <thead>
                                        <th>Risiko</th>
                                    	<th>Penyebab</th>
                                    	<th>RPN</th>
                                    	<th>Mitigasi</th>
                                    	<th>RPN</th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        	<td>1</td>
                                        	<td>Dakota Rice</td>
                                        	<td>$36,738</td>
                                        	<td>Niger</td>
                                        	<td>Oud-Turnhout</td>
                                            <td><a href="mitigasi-lihat"><i class="ti-eye"></i></a></td>
                                            <td><a href=""><i class="ti-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                        	<td>2</td>
                                        	<td>Minerva Hooper</td>
                                        	<td>$23,789</td>
                                        	<td>Curaçao</td>
                                        	<td>Sinaai-Waas</td>
                                            <td><a href="mitigasi-lihat"><i class="ti-eye"></i></a></td>
                                            <td><a href=""><i class="ti-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                        	<td>3</td>
                                        	<td>Sage Rodriguez</td>
                                        	<td>$56,142</td>
                                        	<td>Netherlands</td>
                                        	<td>Baileux</td>
                                            <td><a href="mitigasi-lihat"><i class="ti-eye"></i></a></td>
                                            <td><a href=""><i class="ti-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                        	<td>4</td>
                                        	<td>Philip Chaney</td>
                                        	<td>$38,735</td>
                                        	<td>Korea, South</td>
                                        	<td>Overland Park</td>
                                            <td><a href="mitigasi-lihat"><i class="ti-eye"></i></a></td>
                                            <td><a href=""><i class="ti-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                        	<td>5</td>
                                        	<td>Doris Greene</td>
                                        	<td>$63,542</td>
                                        	<td>Malawi</td>
                                        	<td>Feldkirchen in Kärnten</td>
                                            <td><a href="mitigasi-lihat"><i class="ti-eye"></i></a></td>
                                            <td><a href=""><i class="ti-trash"></i></a></td>
                                        </tr>
                                        <tr>
                                        	<td>6</td>
                                        	<td>Mason Porter</td>
                                        	<td>$78,615</td>
                                        	<td>Chile</td>
                                        	<td>Gloucester</td>
                                            <td><a href="mitigasi-lihat"><i class="ti-eye"></i></a></td>
                                            <td><a href=""><i class="ti-trash"></i></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
				<div class="copyright pull-right">
                    &copy;2017 PT. Anantagraha Primaperkasa</a>
                </div>
            </div>
        </footer>

    </div>
</div>

</body>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo base_url(); ?>/assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url(); ?>/assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>/assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>/assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>/assets/js/demo.js"></script>


</html>
