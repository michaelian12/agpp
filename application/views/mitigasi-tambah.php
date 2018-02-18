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
                <li>
                    <a href="<?php echo base_url(); ?>proyek">
                        <i class="ti-agenda"></i>
                        <p>Proyek</p>
                    </a>
                </li>
                <?php } elseif ($this->session->userdata('jabatan') == 'Manajer Proyek' || $this->session->userdata('jabatan') == 'Site Manager') { 
                    if ($this->session->userdata('jabatan') == 'Manajer Proyek') {?>
                <li>
                    <a href="<?php echo base_url(); ?>pekerjaan">
                        <i class="ti-list"></i>
                        <p>Pekerjaan</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>master-risiko">
                        <i class="ti-server"></i>
                        <p>Data Risiko</p>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>risiko">
                        <i class="ti-alert"></i>
                        <p>Identifikasi Risiko</p>
                    </a>
                </li>
                <li class="active">
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
                <?php } ?>
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
                    <a class="navbar-brand" href="pengguna">Mitigasi</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="ti-bell"></i>
                                    <p class="notification"></p>
                                    <p>Notifications</p>
                                    <b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                              </ul>
                        </li>
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
                                <h4 class="title">Data Mitigasi</h4>
                            </div>
                            <div class="content">
                                <?php echo form_open('mitigasi-tambah'); ?>
                                <form>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Risiko</label>
                                                <select name="id_risiko" class="form-control border-input" id="risiko" oninvalid="this.setCustomValidity('Mohon pilih item dalam daftar')" oninput="setCustomValidity('')" required>
                                                    <option value="" disabled selected> -- Pilih Risiko -- </option>
                                                    <?php 
                                                        foreach ($risiko as $risiko_item) { ?>
                                                            <option value="<?php echo $risiko_item['id_risiko']; ?>"><?php echo $risiko_item['nama_master_risiko']; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Penyebab</label>
                                                <select name="id_penyebab" class="form-control border-input" id="penyebab" oninvalid="this.setCustomValidity('Mohon pilih item dalam daftar')" oninput="setCustomValidity('')" required>
                                                    <option value="" disabled selected> -- Pilih Penyebab -- </option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row" id="result">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>RPN</label>
                                                <input id="rpn" type="text" name="rpn" class="form-control border-input" placeholder="120" required readonly>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Kategori</label>
                                                <input id="kategori" type="text" name="kategori" class="form-control border-input" placeholder="Tinggi" required readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Mitigasi</label>
                                                <input type="text" name="nama_mitigasi" class="form-control border-input" placeholder="Negosiasi dengan owner" oninvalid="this.setCustomValidity('Mohon isi kolom ini')" oninput="setCustomValidity('')" required>
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

    <!--  Notification Function -->
    <script type="text/javascript">
        $(document).ready(function() {
            function load_unseen_notification() {
                $.ajax({
                    url: "<?php echo base_url() ?>notifikasi/get_notifikasi",
                    method: "POST",
                    dataType: "json",
                    success: function(data) {
                        $('.dropdown-menu').html(data.notifikasi);
                        if(data.unread_notifikasi > 0)
                        {
                            $('.notification').html(data.unread_notifikasi);
                        }
                    }
                });
            }
         
            load_unseen_notification();

            setInterval(function() { 
                load_unseen_notification(); 
            }, 5000);
        });
    </script>
    
    <!--  AJAX Select Dependent  -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#risiko").change(function () {
                var id_risiko = $(this).val();
                $.ajax({
                    url: "<?php echo base_url() ?>mitigasi/get_penyebab_query",
                    type: "POST",
                    data: {'id_risiko' : id_risiko},
                    dataType: 'json',
                    success: function(data){
                        $('#penyebab').html(data);
                        $('#rpn').val('');
                        $('#kategori').val('');
                    },
                    error: function(){
                        console.log('error');
                    }
                });
            });

            $("#penyebab").change(function () {
                var id_penyebab = $(this).val();
                $.ajax({
                    url: "<?php echo base_url() ?>mitigasi/get_penyebab",
                    type: "POST",
                    data: {'id_penyebab' : id_penyebab},
                    dataType: 'json',
                    success: function(data){
                        $('#result').html(data);
                    },
                    error: function(){
                        console.log('error');
                    }
                });
            });
        });
    </script>

    <!--   Core JS Files   -->
    <script src="<?php echo base_url(); ?>assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>

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
