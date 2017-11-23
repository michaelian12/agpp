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
                <li class="active">
                    <a href="risiko">
                        <i class="ti-alert"></i>
                        <p>Risiko</p>
                    </a>
                </li>
                <li>
                    <a href="mitigasi">
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
                    <a class="navbar-brand" href="risiko">Risiko</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href="#">
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
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Data Risiko</h4>
                            </div>
                            
                            <div class="content">
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nama Risiko</label>
                                                <input type="text" class="form-control border-input" placeholder="Pengiriman material terlambat">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Efek dari risiko -->
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Efek</label>
                                                <input type="text" class="form-control border-input" placeholder="Pekerjaan selanjutnya tertunda">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>S (1-10)</label>
                                                <input type="text" class="form-control border-input" placeholder="6">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control border-input" placeholder="">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            
                                        </div>
                                    </div>

                                    <!-- Penyebab dari risiko -->
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Penyebab</label>
                                                <input type="text" class="form-control border-input" placeholder="Jadwal produksi tidak sesuai dengan jadwal proyek">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>O (1-10)</label>
                                                <input type="text" class="form-control border-input" placeholder="3">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control border-input" placeholder="Kendaraan pengirim mengalami kecelakaan">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control border-input" placeholder="3">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <input type="text" class="form-control border-input" placeholder="Aturan red line untuk material import">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <input type="text" class="form-control border-input" placeholder="2">
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Kontrol dari risiko -->
                                    <div class="row">
                                        <div class="col-md-10">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Kontrol</label>
                                                <input type="text" class="form-control border-input" placeholder="Hasil laporan">
                                            </div>
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>D (1-10)</label>
                                                <input type="text" class="form-control border-input" placeholder="8">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Simpan</button>
                                    </div>
                                    
                                    <div class="clearfix"></div>
                                </form>
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
