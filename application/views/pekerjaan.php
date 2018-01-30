<?php  
// check if session is not empty
if (!empty($this->session->userdata('id_pengguna'))) {
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
                <li class="active">
                    <a href="#">
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
                    <a class="navbar-brand" href="#">Pekerjaan</a>
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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Proyek</h4>
                                <p class="category">Pilih proyek untuk menampilkan daftar pekerjaan pada proyek</p>
                            </div>
                            <div class="content">
                                <select name="proyek" class="form-control border-input" id="proyek">
                                    <option disabled selected> -- Pilih Proyek -- </option>
                                    <?php 
                                        foreach ($proyek as $proyek_item) { ?>
                                            <option value="<?php echo $proyek_item['id_proyek']; ?>"><?php echo $proyek_item['nama_proyek']; ?></option>
                                        <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <div class="row">
                                    <div class="col-md-9">
                                        <h4 class="title">Daftar Pekerjaan</h4>
                                        <p class="category">Kelola data pekerjaan pada proyek</p>
                                    </div>
                                    <div class="col-md-3">
                                        <a id="tambah_pekerjaan" class="btn btn-info btn-fill btn-wd" style="float: right;">+ Pekerjaan</a>
                                    </div>
                                </div>
                                <br>
                            </div>

                            <div class="content table-responsive table-full-width">
                                <table class="table table-striped" id="pekerjaan">
                                    <col width="40%">
                                    <col width="10%">
                                    <col width="15%">
                                    <col width="15%">
                                    <col width="10%">
                                    <col width="10%">
                                    <thead>
                                        <th>Nama Pekerjaan</th>
                                    	<th>Bobot</th>
                                        <th>Tgl. Mulai</th>
                                        <th>Tgl. Selesai</th>
                                    </thead>
                                    <tbody>
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

    <?php if ($success = $this->session->flashdata('success')) { ?>
    <!--  Success Message  -->
    <script type="text/javascript">
        $(document).ready(function() {
            function show_message() {
                $.notify({
                    icon: 'ti-info-alt',
                    message: '<?php echo $success; ?>'
                },{
                    type: 'success',
                    timer: 200
                });
               return false;
            }

            show_message();
        });
    </script>
    <?php } ?>

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

    <!--  Check if project has been selected  -->
    <script type="text/javascript">
        $('#tambah_pekerjaan').click(function(){
            if ($(this).attr('href') === undefined) {
                $.notify({
                    icon: 'ti-info-alt',
                    message: "Pilih proyek untuk melanjutkan"

                },{
                    type: 'warning',
                    timer: 200
                });

                return false;
            }
        });
    </script>

    <!--  AJAX Table Dependent  -->
    <script type="text/javascript">
        $(document).ready(function () {
            $("#proyek").change(function () {
                // clear table
                $('#pekerjaan tbody').empty();

                // get jobs data
                var id_proyek = $(this).val();
                if (id_proyek !== null || id_proyek !== "") {
                    $.ajax({
                        url: "<?php echo base_url() ?>pekerjaan/get_pekerjaan",
                        type: "POST",
                        data: {'id_proyek' : id_proyek},
                        dataType: 'json',
                        success: function(data){
                            $('#pekerjaan tbody').append(data);
                        },
                        error: function(){
                            console.log('error');
                        }
                    });
                }

                // set href link
                var original_link = "pekerjaan-tambah";
                $('#tambah_pekerjaan').attr('href', original_link);                
                var new_href = $('#tambah_pekerjaan').attr('href') + '/' + id_proyek;
                $('#tambah_pekerjaan').attr('href', new_href);
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
