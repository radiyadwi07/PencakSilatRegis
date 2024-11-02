<?php 
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Lupa Kata Sandi
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
  <!-- Sweet Alert -->
  <script src="admin/assets/sweetalert/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="admin/assets/sweetalert/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="admin/assets/sweetalert/dist/sweetalert2.min.css">
</head>

<body class="login-page sidebar-collapse">
  <div class="page-header header-filter" style="background-image: url('assets/bg.jpg'); background-size: cover;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Lupa Kata Sandi</h4>
              </div>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                  <input type="number" name="no_telp" class="form-control" placeholder="Masukkan No. Telepon Anda" required="">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi Baru" required="">
                </div>
                <button name="masuk" class="btn btn-success mt-4" style="margin-left: 20px; margin-right: 30px; width: 94%; background: linear-gradient(
                  60deg, #00bcd4, #1f35a2);">SIMPAN</button>
              </div>
            </form>
            <?php 
            if (isset($_POST['masuk'])) 
            {

              $no_telp = $_POST['no_telp'];
              $password = MD5($_POST['password']);

              $ambil = $koneksi->query("UPDATE anggota SET kata_sandi = '$password' WHERE no_telp = '$no_telp'");

              if ($ambil) {
                echo "<script>
                Swal.fire({
                allowEnterKey: false,
                allowOutsideClick: false,
                icon: 'success',
                title: 'Berhasil',
                text: 'Kata sandi berhasil di ubah'
                }).then(function() {
                  window.location.href='masuk'
                });
                </script>";
              }else{
                echo "<script>
                Swal.fire({
                allowEnterKey: false,
                allowOutsideClick: false,
                icon: 'error',
                title: 'Oops',
                text: 'Maaf, gagal mengubah kata sandi'
                }).then(function() {
                  window.location.href='lupa_password'
                });
                </script>";
              }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </div>
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
</body>

</html>