<?php 
include 'koneksi.php';
session_start(); 
include 'akses.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
   Pencak Silat
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/style.css">
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="index-page sidebar-collapse">
  <?php include 'menu/navbar.php'; ?>

  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('assets/pe.jpg'); background-size: cover; ">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h2>PELATIH</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main main-raised">
  	<div class="section section-basic">
  		<div class="container">
  			<div class="title">
  				<h2 class="text-center mb-5">Pelatih</h2>
  			</div>
  			<div class="row">
          <?php 
          $query = $koneksi->query("SELECT * FROM pelatih ORDER BY id_pelatih DESC");
          while ($pelatih = $query->fetch_assoc()) {
          ?>
  				<div class="col-md-4">
  					<div class="card">
              <img src="assets/images/foto_pelatih/<?php echo $pelatih['gambar']; ?>" class="card-img-top" width='100%' height='400'>
              <div class="card-body">
                <p class="mt-2"><i class="fa fa-clock-o text-secondary"></i> <?php echo date('d-m-Y',strtotime($pelatih['tgl_upload'])); ?></p>
                <h5 class="card-title text-uppercase"><?php echo $pelatih['nama_pelatih']; ?></h5>
              </div>
            </div>
  				</div>
        <?php } ?>
  			</div>
  		</div>
  	</div>
  </div>

  <?php include 'menu/footer.php'; ?>

  <!--   Core JS Files   -->
  <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
  <script src="assets/js/plugins/moment.min.js"></script>
  <!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
  <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <!--  Google Maps Plugin    -->
  <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
  <script src="assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
  <!-- <script>
    $(document).ready(function() {
      //init DateTimePickers
      materialKit.initFormExtendedDatetimepickers();

      // Sliders Init
      materialKit.initSliders();
    });


    function scrollToDownload() {
      if ($('.section-download').length != 0) {
        $("html, body").animate({
          scrollTop: $('.section-download').offset().top
        }, 1000);
      }
    }
  </script> -->
</body>
</html>