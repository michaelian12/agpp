<?php  
// check if session is not empty
if (!empty($this->session->userdata('id_pengguna'))) {
    echo validation_errors();
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="<?php echo base_url(); ?>assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Sistem Informasi Manajemen Risiko Proyek</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  JQuery UI CSS  -->
    <link href="<?php echo base_url(); ?>assets/jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="<?php echo base_url(); ?>assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Paper Dashboard core CSS    -->
    <link href="<?php echo base_url(); ?>assets/css/paper-dashboard.css" rel="stylesheet"/>

    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="<?php echo base_url(); ?>assets/css/demo.css" rel="stylesheet" />

    <!--  Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Muli:400,300' rel='stylesheet' type='text/css'>
    <link href="<?php echo base_url(); ?>assets/css/themify-icons.css" rel="stylesheet">
    
    <!--  JavaScript  -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-3.2.1.min.js" type="text/javascript"></script>

    <!--  Hide Input Number Spin Button   -->
    <style type="text/css">
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

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
                    <img src="<?php echo base_url(); ?>agpp.png" style="vertical-align:bottom; width: 48px; height: 48px">
                </a>
            </div>

            <ul class="nav">
                <li>
                    <a href="<?php echo base_url(); ?>profil">
                        <i class="ti-user"></i>
                        <p>Profil</p>
                    </a>
                </li>
                <?php if ($this->session->userdata('jabatan') == 'Admin') { ?>
                <li>
                    <a href="<?php echo base_url(); ?>pengguna">
                        <i class="ti-id-badge"></i>
                        <p>Pengguna</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>klien">
                        <i class="ti-comments-smiley"></i>
                        <p>Klien</p>
                    </a>
                </li>
                <li class="active">
                    <a href="<?php echo base_url(); ?>proyek">
                        <i class="ti-agenda"></i>
                        <p>Proyek</p>
                    </a>
                </li>
                <?php } elseif ($this->session->userdata('jabatan') == 'Manajer Proyek') { ?>
                <li>
                    <a href="<?php echo base_url(); ?>pekerjaan">
                        <i class="ti-list"></i>
                        <p>Pekerjaan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>risiko">
                        <i class="ti-alert"></i>
                        <p>Risiko</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>mitigasi">
                        <i class="ti-shield"></i>
                        <p>Mitigasi</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>evaluasi">
                        <i class="ti-write"></i>
                        <p>Evaluasi</p>
                    </a>
                </li>
                <?php } elseif ($this->session->userdata('jabatan') == 'Site Manager') { ?>
                <li>
                    <a href="<?php echo base_url(); ?>laporan">
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
                    <a class="navbar-brand" href="proyek">Proyek</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
						<li>
                            <a href="<?php echo base_url(); ?>keluar">
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
                                <h4 class="title">Data Proyek</h4>
                            </div>

                            <div class="content">
                                <?php echo form_open('proyek-lihat/'.$proyek_item['id_proyek']); ?>
                                <form>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>No. SPP</label>
                                                <input type="text" name="no_spp" class="form-control border-input" placeholder="01/SPP/NBM-AGPP/II/2017" value="<?php echo $proyek_item['no_spp']; ?>" oninvalid="this.setCustomValidity('Mohon isi kolom ini')" oninput="setCustomValidity('')" required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Nilai Kontrak (Rp.)</label>
                                                <input type="number" min="0" name="nilai_kontrak" class="form-control border-input" placeholder="10.000.000" value="<?php echo $proyek_item['nilai_kontrak']; ?>" oninvalid="this.setCustomValidity('Mohon isi kolom ini')" oninput="setCustomValidity('')" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Proyek</label>
                                                <input type="text" name="nama_proyek" class="form-control border-input" placeholder="Showroom Mitsubishi Medan" value="<?php echo $proyek_item['nama_proyek']; ?>" oninvalid="this.setCustomValidity('Mohon isi kolom ini')" oninput="setCustomValidity('')" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Nama Klien</label>
                                                <select name="id_klien" class="form-control border-input" oninvalid="this.setCustomValidity('Mohon pilih item dalam daftar')" oninput="setCustomValidity('')" required>
                                                    <option value="" disabled selected> -- Pilih Klien -- </option>
                                                    <?php 
                                                        foreach ($klien as $klien_item) { ?>
                                                            <option value="<?php echo $klien_item['id_klien']; ?>"<?php if ($proyek_item['id_klien'] == $klien_item['id_klien']) {
                                                                echo 'selected="selected"';    
                                                            }?>
                                                            ><?php echo $klien_item['nama_klien'].' - ('.$klien_item['perusahaan'].')'; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tgl. Mulai</label>
                                                <input type="text" id="tgl_mulai" name="tgl_mulai" class="form-control border-input" placeholder="2017-11-28" value="<?php echo $proyek_item['tgl_mulai']; ?>" onkeydown="return false" oninvalid="this.setCustomValidity('Mohon isi kolom ini')" oninput="setCustomValidity('')" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Tgl. Selesai</label>
                                                <input type="text" id="tgl_selesai" name="tgl_selesai" class="form-control border-input" placeholder="2017-11-28" value="<?php echo $proyek_item['tgl_selesai']; ?>" onkeydown="return false" oninvalid="this.setCustomValidity('Mohon isi kolom ini')" oninput="setCustomValidity('')" required>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-2">
                                            
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-block btn-info btn-fill btn-wd">Perbaharui</button>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="button" onclick="goBack()" class="btn btn-default btn-block btn-wd">Batal</button>
                                        </div>
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
    
    <!--  Back Function  -->
    <script type="text/javascript">
        function goBack() {
            window.history.back();
        }
    </script>

    <!--  Date Validation  -->
    <script type="text/javascript">
        $(document).ready(function () {

            $("#tgl_mulai").datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat : 'yy-mm-dd',
                minDate: 0,
                onSelect: function (date) {
                    var dt2 = $('#tgl_selesai');
                    var startDate = $(this).datepicker('getDate');
                    var minDate = $(this).datepicker('getDate');
                    dt2.datepicker('option', 'minDate', minDate);
                }
            });
            $('#tgl_selesai').datepicker({
                changeMonth: true,
                changeYear: true,
                dateFormat: "yy-mm-dd"
            });
        });
    </script>

    <!--  Prevent Minus Number  -->
    <!-- <script type="text/javascript">
        // Select your input element.
        var number = document.getElementById('nilai_kontrak');

        // Listen for input event on numInput.
        number.onkeydown = function(e) {
            if(!((e.keyCode > 95 && e.keyCode < 106)
              || (e.keyCode > 47 && e.keyCode < 58) 
              || e.keyCode == 8)) {
                return false;
            }
        }
    </script> -->
    
    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/jquery-ui-1.12.1/external/jquery/jquery.js" type="text/javascript"></script>
    <script src="<?php echo base_url(); ?>assets/jquery-ui-1.12.1/jquery-ui.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="<?php echo base_url(); ?>assets/js/bootstrap-checkbox-radio.js"></script>

	<!--  Charts Plugin -->
	<script src="<?php echo base_url(); ?>assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="<?php echo base_url(); ?>assets/js/bootstrap-notify.js"></script>

    <!-- Paper Dashboard Core javascript and methods for Demo purpose -->
	<script src="<?php echo base_url(); ?>assets/js/paper-dashboard.js"></script>

	<!-- Paper Dashboard DEMO methods, don't include it in your project! -->
	<script src="<?php echo base_url(); ?>assets/js/demo.js"></script>

</html>
<?php } else {
    redirect('masuk');
} ?>
