<?php 
include 'koneksi.php';

include 'menu/function.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
if (!isset ($_SESSION['id_anggota'])) {
  echo '<script language="javascript">alert("Maaf anda Belum Login"); document.location="masuk";</script>';
}else{ 
  
  include_once("akses.php");
  $tanggalSekarang = date("d-m-Y");
  $jam2 = date("hi");
  $jamSekarang = date("h:i a");

  // cek_absen();

  if (isset($_POST['simpan'])) {

    simpan_absen();

  }

  if (isset($_POST['simpan_ket'])) {
    simpan_keterangan();
  }
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
  <?php include 'menu/navbar.php';

  ?>


  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('assets/bg.jpg'); background-size: cover;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h2>ABSEN</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main main-raised">
  	<div class="section section-basic">
  		<div class="container">
  			<div class="title">
  				<h2 class="text-center mb-5">Absen</h2>
  			</div>
        
        <?php  

        $query = mysqli_query($koneksi,"SELECT * FROM anggota where id_anggota='$_SESSION[id_anggota]'");
        $tanggalSekarang = date("d-m-Y");
        $jam2 = date("hi");
        $jamSekarang = date("h:i a");


        while($data = mysqli_fetch_assoc($query)) { ?>
          <div class='table-responsive'>
           <table class='table table-striped'>
            <thead>
             <tr>
              <th>Nama Pengguna atau Username</th>
              <th>Nama Lengkap</th>
              <th></th>
              <th>Absen</th>
            </tr>
          </thead>
          <form action="" method="POST">
            <tbody>
              <tr>
                <td><?php   echo $data['nama_pengguna'] ?>
                <input type="text" hidden name="nama_pengguna" value="<?php echo $data['nama_pengguna'] ?>">
              </td>
              <td><?php   echo $data['nama_lengkap'] ?>
              <input type="text" hidden name="nama_lengkap" value="<?php echo $data['nama_lengkap'] ?>">
            </td>
            <input type="text" name="tanggal" hidden value="<?=$tanggalSekarang;?>">
            <input type="text" name="jam" hidden value="<?=$jamSekarang;?>">
            <input type="text" value="<?=$jam2;?>" hidden name="jam2">

            <td>
              <?php
                  $select = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id_anggota='$_SESSION[id_anggota]' AND tanggal='$tanggalSekarang'");
                      $row = mysqli_num_rows($select);

                      if ($row) {
                            echo "<button type='submit' name='simpan' class='btn btn-success' disabled>Absen</button>";
                      }else{
                          echo "<button type='submit' name='simpan' class='btn btn-success' onclick='return confirm('ingin absen?')''>Absen</button>";
                      }
              ?>

            </td>
            <td> 
              <?php
                  $select = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE id_anggota='$_SESSION[id_anggota]' AND tanggal='$tanggalSekarang'");
                      $row = mysqli_num_rows($select);

                      if ($row) {
                          echo "<a href='absen_keterangan.php' class='btn btn-danger' onclick='return false;'>Jika tidak bisa hadir click disini</a>";
                      }else{
                          echo "<a href='absen_keterangan' class='btn btn-danger'>Jika tidak bisa hadir click disini</a>";
                      }
              ?>
            </td>
          </table>
        </div>
      </div>
    </div>
  </section>
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
<?php } ?>
</html>
<?php } ?>