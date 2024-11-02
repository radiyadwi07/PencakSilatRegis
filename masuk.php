 <?php 
include 'koneksi.php';
session_start();
if(@$_SESSION["user"]){
    echo '<script language="javascript">alert("Anda Sedang login!"); document.location="index.php";</script>';
}else if(@$_SESSION["admin"]){
    echo '<script language="javascript">alert("Anda Sedang login!"); document.location="admin/index.php";</script>';
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
    Masuk
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
  <div class="page-header header-filter  purple-filter" style="background-image: url('assets/bg1.jpg'); background-size: cover;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login">
            <form class="form" method="post">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">Masuk</h4>
              </div>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">face</i>
                    </span>
                  </div>
                  <input type="text" name="username" class="form-control" placeholder="Nama Pengguna">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                      <i class="material-icons">lock_outline</i>
                    </span>
                  </div>
                  <input type="password" name="password" class="form-control" placeholder="Kata Sandi">
                </div>
                <button name="masuk" class="btn btn-success mt-4" style="margin-left: 20px; margin-right: 30px; width: 94%; background: linear-gradient(
                  60deg, #00bcd4, #1f35a2);">MASUK</button>
                <button name="keluar" class="btn btn-success mt-4" style="margin-left: 20px; margin-right: 30px; width: 94%; background: linear-gradient(
                  60deg, #00bcd4, #1f35a2);">KELUAR</button>
                </div>
                <p><a href="lupa_password" class="float-right mt-2" style="margin-right: 30px;">Lupa Kata Sandi?</a></p>
                <div class="footer text-center">
                  <p class="text-dark">Belum mempunyai akun?<a href="daftar" class="btn btn-primary btn-link btn-wd btn-lg"> Daftar</a></p>
                </div>
              </form>
          <?php 
            if (isset($_POST['masuk'])) 
            {

              $username = mysqli_escape_string($koneksi,$_POST['username']);
              $password = MD5(mysqli_escape_string($koneksi,$_POST['password']));

              $ambil = $koneksi->query("SELECT * FROM anggota WHERE nama_pengguna = '$username' AND kata_sandi = '$password' ");
              $cocok = $ambil->num_rows;

              if ($cocok==1) 
              {
                $akun = $ambil->fetch_assoc();

        $_SESSION['login'] = true;
                $_SESSION['anggota'] = $akun;
                $_SESSION['id_anggota'] = $akun['id_anggota'];
                $_SESSION['nama_pengguna'] = $akun['nama_pengguna'];
                $_SESSION['nama_lengkap'] = $akun['nama_lengkap'];
                $_SESSION['foto_anggota'] = $akun['foto_anggota'];
                echo "<script>
                Swal.fire({
                allowEnterKey: false,
                allowOutsideClick: false,
                icon: 'success',
                title: 'Berhasil',
                text: 'Anda Berhasil Masuk'
                }).then(function() {
                  window.location.href='index'
                });
                </script>";
              }else{
                echo "<script>
                Swal.fire({
                allowEnterKey: false,
                allowOutsideClick: false,
                icon: 'error',
                title: 'Oops',
                text: 'Maaf, nama pengguna atau kata sandi salah'
                }).then(function() {
                  window.location.href='masuk'
                });
                </script>";
              }
            }
          ?> 
          <?php 
            if (isset($_POST['keluar'])) 
            { echo "<script>
                Swal.fire({
                allowEnterKey: false,
                allowOutsideClick: false,
                icon: 'success',
                title: 'Berhasil',
                text: 'Anda Berhasil Keluar'
                }).then(function() {
                  window.location.href='index'
                });
                </script>";
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