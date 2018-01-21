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
                    <a href="../klien">
                        <i class="ti-comments-smiley"></i>
                        <p>Klien</p>
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
                <li class="active">
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
                <li>
                    <a href="laporan">
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
                    <a class="navbar-brand" href="risiko">Risiko</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href="../keluar">
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
                                            <input type="text" name="no_spp" class="form-control border-input" value="<?php echo $proyek_item['no_spp']; ?>" readonly>
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
                                <h4 class="title">Data Risiko</h4>
                            </div>
                            
                            <div class="content">
                                <?php echo form_open('risiko-tambah/'.$proyek_item['id_proyek']); ?>
                                <form>
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-striped">
                                            <col width="50%">
                                            <col width="27%">
                                            <col width="23%">
                                            <thead>
                                                <th>Risiko</th>
                                                <th>Tingkat Keparahan</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="nama_risiko" class="form-control border-input" placeholder="Pengiriman material terlambat" required></td>
                                                    <td><select name="nilai_s" class="form-control border-input" required>
                                                        <option value="" disabled selected> -- Nilai Keparahan -- </option>
                                                        <option value="10">(10) - Berbahaya (tanpa peringatan)</option>
                                                        <option value="9">(9) - Berbahaya (dengan peringatan)</option>
                                                        <option value="8">(8) - Sangat tinggi</option>
                                                        <option value="7">(7) - Tinggi</option>
                                                        <option value="6">(6) - Sedang</option>
                                                        <option value="5">(5) - Rendah</option>
                                                        <option value="4">(4) - Sangat rendah</option>
                                                        <option value="3">(3) - Sangat rendah</option>
                                                        <option value="2">(2) - Kecil</option>
                                                        <option value="1">(1) - Sangat kecil</option>
                                                    </select></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Efek dari risiko -->
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-striped" id="tabel_efek">
                                            <col width="77%">
                                            <col width="23%">
                                            <thead>
                                                <th>Efek</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="nama_efek[]" class="form-control border-input" placeholder="Pekerjaan selanjutnya tertunda" required></td>
                                                    <td><button type="button" class="btn btn-default btn-wd" style="float: right;" id="tambah_efek">+ Efek</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Penyebab dari risiko -->
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-striped" id="tabel_penyebab">
                                            <col width="50%">
                                            <col width="27%">
                                            <col width="23%">
                                            <thead>
                                                <th>Penyebab</th>
                                                <th>Tingkat Kejadian</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="nama_penyebab[]" class="form-control border-input" placeholder="Aturan red line untuk material impor" required></td>
                                                    <td><select name="nilai_o[]" class="form-control border-input" required>
                                                        <option value="" disabled selected> -- Nilai Kejadian -- </option>
                                                        <option value="10">(10) - >= 1 dalam 2 kejadian</option>
                                                        <option value="9">(9) - 1 dalam 3 kejadian</option>
                                                        <option value="8">(8) - 1 dalam 8 kejadian</option>
                                                        <option value="7">(7) - 1 dalam 20 kejadian</option>
                                                        <option value="6">(6) - 1 dalam 80 kejadian</option>
                                                        <option value="5">(5) - 1 dalam 400 kejadian</option>
                                                        <option value="4">(4) - 1 dalam 2000 kejadian</option>
                                                        <option value="3">(3) - 1 dalam 15000 kejadian</option>
                                                        <option value="2">(2) - 1 dalam 150000 kejadian</option>
                                                        <option value="1">(1) - <= 1 dalam 1500000 kejadian</option>
                                                    </select></td>
                                                    <td><button type="button" class="btn btn-default btn-wd" style="float: right;" id="tambah_penyebab">+ Penyebab</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <!-- Kontrol dari risiko -->
                                    <div class="content table-responsive table-full-width">
                                        <table class="table table-striped">
                                            <col width="50%">
                                            <col width="27%">
                                            <col width="23%">
                                            <thead>
                                                <th>Kontrol</th>
                                                <th>Tingkat Deteksi</th>
                                                <th></th>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><input type="text" name="nama_kontrol" class="form-control border-input" placeholder="Hasil laporan" required></td>
                                                    <td><select name="nilai_d" class="form-control border-input" required>
                                                        <option value="" disabled selected> -- Nilai Deteksi -- </option>
                                                        <option value="10">(10) - Mutlak tidak pasti</option>
                                                        <option value="9">(9) - Sangat Jauh</option>
                                                        <option value="8">(8) - Jauh</option>
                                                        <option value="7">(7) - Sangat Rendah</option>
                                                        <option value="6">(6) - Rendah</option>
                                                        <option value="5">(5) - Sedang</option>
                                                        <option value="4">(4) - Cukup Tinggi</option>
                                                        <option value="3">(3) - Tinggi</option>
                                                        <option value="2">(2) - Sangat Tinggi</option>
                                                        <option value="1">(1) - Hampir Pasti</option>
                                                    </select></td>
                                                    <td></td>
                                                </tr>
                                            </tbody>
                                        </table>
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

    <!--  Add Entries for Efect Table  -->
    <script type="text/javascript">
        $(document).ready(function(){
            var i = 1;
            $('#tambah_efek').click(function(){
                i++;
                $('#tabel_efek').append('<tr id="row_efek'+i+'"><td><input type="text" name="nama_efek[]" class="form-control border-input" placeholder="Pekerjaan selanjutnya tertunda" required></td><td><a type="button" id="'+i+'" class="remove_efek"><i class="ti-trash"></i></a></td></tr>');
            });

            $(document).on('click', '.remove_efek', function(){
                var button_id = $(this).attr("id");
                $('#row_efek'+button_id+'').remove();
            });
        });
    </script>

    <!--  Add Entries for Cause Table  -->
    <script type="text/javascript">
        $(document).ready(function(){
            var i = 1;
            $('#tambah_penyebab').click(function(){
                i++;
                $('#tabel_penyebab').append('<tr id="row_penyebab'+i+'"><td><input type="text" name="nama_penyebab[]" class="form-control border-input" placeholder="Aturan red line untuk material impor" required></td><td><select name="nilai_o[]" class="form-control border-input" required><option value="" disabled selected> -- Nilai Kejadian -- </option><option value="10">(10) - >= 1 dalam 2 kejadian</option><option value="9">(9) - 1 dalam 3 kejadian</option><option value="8">(8) - 1 dalam 8 kejadian</option><option value="7">(7) - 1 dalam 20 kejadian</option><option value="6">(6) - 1 dalam 80 kejadian</option><option value="5">(5) - 1 dalam 400 kejadian</option><option value="4">(4) - 1 dalam 2000 kejadian</option><option value="3">(3) - 1 dalam 15000 kejadian</option><option value="2">(2) - 1 dalam 150000 kejadian</option><option value="1">(1) - <= 1 dalam 1500000 kejadian</option></select></td><td><a type="button" id="'+i+'" class="remove_penyebab"><i class="ti-trash"></i></a></td></tr>');
            });

            $(document).on('click', '.remove_penyebab', function(){
                var button_id = $(this).attr("id");
                $('#row_penyebab'+button_id+'').remove();
            });
        });
    </script>

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
