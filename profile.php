<?php 
include 'koneksi.php';
session_start(); 
include 'akses.php';
$id = $_SESSION['id_anggota'];
$query = $koneksi->query("SELECT * FROM anggota WHERE id_anggota = '$id'");
$profile = $query->fetch_assoc();
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
  <!-- Sweet Alert -->
  <script src="admin/assets/sweetalert/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="admin/assets/sweetalert/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="admin/assets/sweetalert/dist/sweetalert2.min.css">
</head>

<body class="index-page sidebar-collapse">
  <?php include 'menu/navbar.php'; ?>

  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" style="background-image: url('assets/bg.jpg'); background-size: cover;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h2>PROFILE</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main main-raised">
  	<div class="section section-basic">
  		<div class="container">
  			<div class="title">
  				<h2 class="text-center mb-4">Profile Saya</h2>
  			</div>
        <center>
            <img src="assets/images/foto_anggota/<?php echo $profile['foto_anggota']; ?>" style="border-radius: 100%; width: 180px; height: 180px;">
        </center>
        <form method="post" enctype="multipart/form-data" class="mt-5">
    			<div class="row">
            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Ubah Foto Profile</label>
                  <input type="file" name="foto" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Nama Lengkap</label>
                  <input type="text" name="nama_lengkap" class="form-control" required="" maxlength="35" value="<?php echo $profile['nama_lengkap']; ?>">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                  <label for="">Jenis Kelamin</label>
                  <input type="text" name="j_kel" class="form-control" required="" maxlength="10" value="<?php echo $profile['jenis_kelamin']; ?>">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="">Agama</label>
                  <input type="text" name="agama" class="form-control" required="" maxlength="10" value="<?php echo $profile['agama']; ?>">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="">Email</label>
                  <input type="email" name="email" class="form-control" required="" maxlength="40" value="<?php echo $profile['email']; ?>">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="">No. Telepon</label>
                  <input type="number" name="no_telp" class="form-control" required="" value="<?php echo $profile['no_telp']; ?>">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="">Tanggal Lahir</label>
                  <input type="date" name="tgl_lahir" class="form-control" required="" value="<?php echo $profile['tgl_lahir']; ?>">
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                  <label for="">Alamat</label>
                  <textarea name="alamat" class="form-control"><?php echo $profile['alamat']; ?></textarea>
                </div>
            </div>
    			</div>
          <button name="simpan" class="btn btn-success">SIMPAN</button>
        </form>
        <?php 
        if (isset($_POST['simpan'])) {
          $nama_lengkap = $_POST['nama_lengkap'];
          $j_kel = $_POST['j_kel'];
          $tgl_lahir = $_POST['tgl_lahir'];
          $agama = $_POST['agama'];
          $email = $_POST['email'];
          $no_telp = $_POST['no_telp'];
          $alamat = $_POST['alamat'];
          $nama_foto = $_FILES['foto']['name'];
          $nama_fix = date("YmdHis").$nama_foto;
          $lokasi = $_FILES['foto']['tmp_name'];

          if (!empty($lokasi)) 
          {
            move_uploaded_file($lokasi,"assets/images/foto_anggota/$nama_fix");

            $query = $koneksi->query("UPDATE anggota SET nama_lengkap = '$nama_lengkap', jenis_kelamin = '$j_kel', tgl_lahir = '$tgl_lahir', agama = '$agama', email = '$email', no_telp = '$no_telp', alamat = '$alamat', foto_anggota = '$nama_fix' WHERE id_anggota = '$id'");
          } else {
            $query = $koneksi->query("UPDATE anggota SET nama_lengkap = '$nama_lengkap', jenis_kelamin = '$j_kel', tgl_lahir = '$tgl_lahir', agama = '$agama', email = '$email', no_telp = '$no_telp', alamat = '$alamat' WHERE id_anggota = '$id'");
          }

          if ($query) {
                echo "<script>
                Swal.fire({
                allowEnterKey: false,
                allowOutsideClick: false,
                icon: 'success',
                title: 'Berhasil',
                text: 'Profile berhasil diubah'
                }).then(function() {
                  window.location.href='profile'
                });
                </script>";
              }else{
                echo "<script>
                Swal.fire({
                allowEnterKey: false,
                allowOutsideClick: false,
                icon: 'error',
                title: 'Oops',
                text: 'Maaf, Gagal mengubah profile'
                }).then(function() {
                  window.location.href='profile'
                });
                </script>";
                }   
        }
        ?>
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