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
    Daftar
  </title>
  <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="assets/css/material-kit.css?v=2.0.7" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="login-page sidebar-collapse">
  <div class="page-header header-filter purple-filter" style="background-image: url('assets/bg1.jpg'); background-size: cover;">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-6 ml-auto mr-auto">
          <div class="card card-login" style="height: 100%;">
            <form class="form" method="post">
              <div class="card-header card-header-primary text-center">
                <h4 class="card-title">DAFTAR</h4>
              </div>
              <div class="card-body">
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                  <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                  <input type="text" name="nama_pengguna" class="form-control" placeholder="Nama Pengguna">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                  <input type="password" name="kata_sandi" class="form-control" placeholder="Kata Sandi">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                  <select name="j_kel" class="form-control" required="" style="color: grey;">
                    <option>-- Pilih Jenis Kelamin --</option>
                    <option value="Pria">Pria</option>
                    <option value="Wanita">Wanita</option>
                  </select>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                  <select name="agama" class="form-control" required="" style="color: grey;">
                    <option>-- Pilih Agama --</option>
                    <option value="Islam">Islam</option>
                    <option value="Kristen">Kristen</option>
                    <option value="Katolik">Katolik</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Budha">Budha</option>
                    <option value="Konghucu">Konghucu</option>
                  </select>
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                  <input type="number" name="no_telp" class="form-control" placeholder="No. Telepon">
                </div>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text">
                    </span>
                  </div>
                  <input type="email" name="email" class="form-control" placeholder="Masukan Email">
                </div>

                <button name="daftar" class="btn btn-success mt-4" style="margin-left: 30px; margin-right: 30px; width: 90%; background: linear-gradient(
                  60deg, #00bcd4, #1f35a2);">DAFTAR</button>
                </div>
                <div class="footer text-center">
                  <p class="text-dark">Sudah mempunyai akun?<a href="masuk" class="btn btn-primary btn-link btn-wd btn-lg"> Masuk</a></p>
                </div>
              </form>

              <?php 
              if (isset($_POST['daftar'])) {
                $nama_pengguna = $_POST['nama_pengguna'];
                $kata_sandi = MD5($_POST['kata_sandi']);
                $nama_lengkap = $_POST['nama_lengkap'];
                $j_kel = $_POST['j_kel'];
                $agama = $_POST['agama'];
                $no_telp = $_POST['no_telp'];
                $tgl_daftar = date('Y-m-d');

                $tgl_lahir = date('Y-m-d');
                $email = $_POST['email'];
                $alamat = 'null';

                $sql = "SELECT * FROM anggota WHERE nama_pengguna = '$nama_pengguna'";
                $query = $koneksi->query($sql);
                
                if($query->num_rows != 0) {
                  echo '<script language="javascript">alert("Maaf, nama pengguna telah terdaftar"); document.location="daftar";</script>';

                }else{
                  if(!$nama_pengguna || !$kata_sandi || !$nama_lengkap || !$email|| !$no_telp) {
                    echo '<script language="javascript">alert("Maaf, data masih ada yang kosong silahkan di cek kembali"); document.location="daftar";</script>';
                  }else{
                    $query = $koneksi->query("INSERT INTO anggota (nama_pengguna,kata_sandi,nama_lengkap,jenis_kelamin,agama,no_telp,tgl_daftar,email,alamat,tgl_lahir) VALUES ('$nama_pengguna','$kata_sandi','$nama_lengkap','$j_kel','$agama','$no_telp','$tgl_daftar','$email','$alamat','$tgl_lahir')");
                    $query2 = $koneksi ->query("INSERT  into transaksi(status,nama_lengkap,email,no_telp) VALUES('belum membayar','$nama_pengguna','$email','$no_telp')");
        
                    if ($query) {
                       echo '<script language="javascript">alert("Anda berhasil mendaftar sebagai anggota"); document.location="masuk";</script>';
                        }else{
                           echo '<script language="javascript">alert("Maaf, Gagal mendaftar sebagai anggota"); document.location="daftar";</script>';
                        
                            }
                          }
                        }
                      }
                      ?>   
                
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--   Core JS Files   -->

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
          </html>