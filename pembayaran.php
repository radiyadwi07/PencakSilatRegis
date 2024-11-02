<?php 
include 'koneksi.php';
include 'pembayaran_proses.php';
session_status(); 
include 'akses.php';
$id = $_SESSION['id_anggota'];
$query = $koneksi->query("SELECT * FROM anggota WHERE id_anggota = '$id'");
// $data = $koneksi->query("INSERT INTO transaksi VALUES(NULL, '$nama_lengkap', '$email', '$no_telp', '$alamat','$total','$catatan','$tgl_transaksi','$foto_bukti')");
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
            <h2>Transaksi</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="main main-raised">
  	<div class="section section-basic">
  		<div class="container">
  			<div class="title">
  				<h2 class="text-center mb-4">Silakan melakukan pembayaran sebesar Rp.50.000 dan lampirkan bukti pembayaran tersebut</h2>
  			</div>
        <!-- <center>
            <img src="assets/images/foto_bukti/<?php echo $transaksi['foto_bukti']; ?>" style="border-radius: 100%; width: 180px; height: 180px;">
          </center> -->
          <form method="post" enctype="multipart/form-data" class="mt-5">
           <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" class="form-control" required="" maxlength="35" value="<?php echo $profile['nama_lengkap']; ?>">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="">Total</label>
                <input type="text" name="total" class="form-control" required="" maxlength="8" value="50000" readonly> 
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
                <label for="">Catatan</label>
                <input type="text" name="catatan" class="form-control" required="" maxlength="35" value="Biaya Pendaftaran" readonly> 
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
                <label for="">Tanggal Transaksi</label>
                <input type="date" name="tgl_transaksi" class="form-control" required="">
              </div>
            </div>
                    <!-- <div class="col-md-6">
                    <div class="form-group">
                        <label for="">Alamat</label>
                        <textarea name="alamat" class="form-control"></textarea>
                        </div>
                      </div> -->
                    <!-- <div class="col-md-6">
                        <div class="form-group">
                        <label for="">Bukti Transaksi</label>
                        <input type="file" name="foto_bukti" class="form-control" accept="image/*">
                        </div>
                      </div> -->
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="">Bukti Transaksi</label>
                          <input type="file" name="foto_bukti" class="form-control">
                        </div>
                      </div>
                    </div>
                    <button name="transaksi" class="btn btn-success">SIMPAN</button>
                  </form>
                  <?php 
                  if (isset($_POST['transaksi'])) {
                    $nama_lengkap = $_POST['nama_lengkap'];
                    $email = $_POST['email'];
                    $no_telp = $_POST['no_telp'];
                    $total = $_POST['total'];
                    $catatan = $_POST['catatan'];
                    $tgl_transaksi = date('Y-m-d');
                    $status = "proses";
                // $gambar=$_FILES['foto_bukti']['name'];
                // $gambar_temp=$_FILES['foto_bukti']['temp_name'];
                // $gambar_path="" . $gambar;

                    $sql = "SELECT * FROM transaksi WHERE nama_lengkap = '$nama_lengkap'";
                    $query = $koneksi->query($sql);

                // if (!empty($lokasi)) 
                //   {
                //   move_uploaded_file($gambar_temp, $gambar_path);}
                    // $queryy = $koneksi->queryy("UPDATE transaksi SET nama_lengkap = '$nama_lengkap', email = '$email', no_telp = '$no_telp', total = '$total', catatan = '$catatan', tgl_transaksi = '$tgl_transaksi', foto_bukti = '$gambar_path' WHERE nia = '$nia'");
                    $nama_foto = $_FILES['foto']['name'];
                    $nama_fix = date("YmdHis").$nama_foto;
                    $lokasi = $_FILES['foto']['tmp_name'];

                    if (!empty($lokasi)) 
                    {
                      move_uploaded_file($lokasi,"assets/images/foto_bukti/$nama_fix");

                      // $query = $koneksi->query("INSERT INTO transaksi (nia,nama_lengkap,email,no_telp,total,catatan,tgl_transaksi,foto_bukti) VALUES ('$newnia','$nama_lengkap','$email','$no_telp','$total','$catatan','$tgl_transaksi','$nama_fix')");

                    }
                    if($query->num_rows != 0) {
                      echo '<script language="javascript">alert("Maaf, kamu sudah melakukan pembayaran"); document.location="pembayaran";</script>';
                    }else{
                      if(!$newnia || !$nama_lengkap || !$email || !$no_telp || !$total|| !$catatan|| !$tgl_transaksi|| !$nama_fix) {
                        echo '<script language="javascript">alert("Maaf, data masih ada yang kosong silahkan di cek kembali"); document.location="pembayaran";</script>';
                      }else{
                        $query = $koneksi->query("INSERT INTO transaksi (nia,tgl_transaksi,foto_bukti,total,catatan) VALUES ('$newnia','$tgl_transaksi','$nama_fix','50000','Biaya pendaftaran')");
                        $querystatus = "UPDATE transaksi SET status = '$status', '";
                        $query .= "WHERE nama_lengkap = $nama_lengkap";  


                        if ($query) {
                         echo '<script language="javascript">alert("Anda berhasil melakukan transaksi"); document.location="pembayaran";</script>';
                       }else{
                         echo '<script language="javascript">alert("Maaf, Gagal melakukan transaksi"); document.location="pembayaran";</script>';                      
                       }
                     }
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