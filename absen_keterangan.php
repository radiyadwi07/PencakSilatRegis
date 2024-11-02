<?php 
include 'koneksi.php';
include 'menu/function.php';
date_default_timezone_set('Asia/Jakarta');
session_start();
if (!isset ($_SESSION['id_anggota'])) {
  echo '<script language="javascript">alert("Maaf anda Belum Login"); document.location="masuk";</script>';
}else{

  $tanggalSekarang = date("d-m-Y");
  $jam2 = date("hi");
  $jamSekarang = date("h:i a");

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
            <h2>ABSEN KETERANGAN</h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php  

  $query = mysqli_query($koneksi,"SELECT * FROM anggota where id_anggota='$_SESSION[id_anggota]'");
  $tanggalSekarang = date("d-m-Y");
  $jam2 = date("hi");
  $jamSekarang = date("h:i a");
  while($data = mysqli_fetch_assoc($query)) { ?>
    <div class="card">
      <div class="card-body">
        <h3 class="text-center text-primary">Absensi Keterangan</h3>
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama Pengguna atau username</label>
            <input type="text"  name="nama_pengguna" class="form-control" disabled="" value="<?php echo $data['nama_pengguna']; ?>">
          </div>

          <div class="form-group">
            <label for="">Nama Lengkap</label>
            <input type="text" class="form-control" name="nama_lengkap" disabled="" value="<?php echo $data['nama_lengkap']; ?>">
          </div>
          <div class="form-group">
            <label for="">Keterangan</label>
            <select name="keterangan" class="form-control">
              <option>Ijin</option>
              <option>Sakit</option>
            </select>
          </div>
         
          <input type="text" hidden name="tanggal" value="<?=$tanggalSekarang;?>">
          <input type="text" hidden name="jam" value="<?=$jamSekarang;?>">

          <div class="form-group">
            <label>Foto Bukti / Surat Keterangan</label>
            <input type="file" class="form-control" name="foto">
          </div>
          <br>
          <div class="form-group">
           <button class="btn btn-success" name="simpan_ket">Simpan Keterangan</button>
         </div>
       </form>
     </div>
   </div>

   <!--   Core JS Files   -->
   <script src="assets/js/core/jquery.min.js" type="text/javascript"></script>
   <script src="assets/js/core/popper.min.js" type="text/javascript"></script>
   <script src="assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
   <script src="assets/js/plugins/moment.min.js"></script>
   <!--  Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
   <script src="assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
   <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
   <script src="assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
   <!--  Google Maps Plugin    -->
   <!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
   <script src="assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
 </body>
<?php } ?>
</html>
<?php } ?>