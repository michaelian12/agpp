<?php  
// check if session is not empty
if (!empty($this->session->userdata('id_pengguna'))) {
    echo validation_errors();
?>
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
                    <span style="line-height:30px; font-size:32px">ANANTA</span>
                    <img src="../agpp.png" style="vertical-align:bottom; width: 48px; height: 48px">
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="../profil">
                        <i class="ti-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <?php if ($this->session->userdata('jabatan') == 'Admin') { ?>
                <li>
                    <a href="../pengguna">
                        <i class="ti-id-badge"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li>
                    <a href="../proyek">
                        <i class="ti-agenda"></i>
                        <p>Proyek</p>
                    </a>
                </li>
                <?php } elseif ($this->session->userdata('jabatan') == 'Manajer Proyek') { ?>
                <li>
                    <a href="../pekerjaan">
                        <i class="ti-list"></i>
                        <p>Pekerjaan</p>
                    </a>
                </li>
                <li>
                    <a href="../risiko">
                        <i class="ti-alert"></i>
                        <p>Risiko</p>
                    </a>
                </li>
                <li>
                    <a href="../mitigasi">
                        <i class="ti-shield"></i>
                        <p>Mitigasi</p>
                    </a>
                </li>
                <li>
                    <a href="../evaluasi">
                        <i class="ti-write"></i>
                        <p>Evaluasi</p>
                    </a>
                </li>
                <?php } elseif ($this->session->userdata('jabatan') == 'Site Manager') { ?>
                <li class="active">
                    <a href="../laporan">
                        <i class="ti-pencil-alt"></i>
                        <p>Laporan</p>
                    </a>
                </li>
                <?php } ?>
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
                    <a class="navbar-brand" href="proyek">Laporan</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href=".../keluar">
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
                                <h4 class="title">Proyek</h4>
                            </div>
                            <div class="content">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>No.SPP</label>
                                            <input type="text" name="nama_proyek" class="form-control border-input" value="<?php echo $proyek_item['no_spp']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Nama Proyek</label>
                                            <input type="text" name="nama_proyek" class="form-control border-input" value="<?php echo $proyek_item['nama_proyek']; ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2">
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="title">Data Laporan</h4>
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <?php echo form_open('laporan-tambah/'.$proyek_item['id_proyek']); ?>
                                <form name="tambah_pekerjaan" id="tambah_pekerjaan">
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-striped" id="dynamic_field">
                                            <col width="60%">
                                            <col width="20%">
                                            <col width="20%">
                                            <thead>
                                                <th>Nama Pekerjaan</th>
                                                <th>Bobot</th>
                                                <th>Kemajuan</th>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($pekerjaan as $pekerjaan_item) { ?>
                                                <tr>
                                                    <td><?php echo $pekerjaan_item['nama_pekerjaan'] ?><input type='hidden' name='id_pekerjaan[]' value='<?php echo $pekerjaan_item['id_pekerjaan']; ?>'/></td>
                                                    <td><?php echo $pekerjaan_item['bobot'] ?></td>
                                                    <td><input type="number" name="kemajuan[]" step="0.001" min="0" max="<?php echo $pekerjaan_item['bobot'] ?>" class="form-control border-input" placeholder="0,014" required></td>
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Kendala</label>
                                                <textarea name="ket_kendala" class="form-control border-input" placeholder="Kendala yang terjadi saat pelaksanaan" required></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-center">
                                        <button type="submit" class="btn btn-info btn-fill btn-wd">Simpan</button>
                                    </div>

                                    <div class="clearfix"></div>
                                </form>
                                <?php echo form_close(); ?>
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

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>/assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>/assets/js/demo.js"></script>

</html>
<?php } else {
    redirect('masuk');
} ?>
