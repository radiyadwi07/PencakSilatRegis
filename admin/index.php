<?php
include '../koneksi.php';
session_start();
$_SESSION['foto_admin'];
if (isset($_SESSION['admin'])){
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="Creative Tim">
  <title>Admin</title>
  <!-- Favicon -->
  <link rel="icon" href="" type="image/png">
  <!-- Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
  <!-- Icons -->
  <link rel="stylesheet" href="assets/vendor/nucleo/css/nucleo.css" type="text/css">
  <link rel="stylesheet" href="assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
  <!-- Fonts Awesome -->
  <link href="assets/font-awesome/css/all.css" rel="stylesheet">
  <!-- Argon CSS -->
  <link rel="stylesheet" href="assets/css/argon.css?v=1.2.0" type="text/css">
  <!-- Data Tables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
  <!-- Sweet Alert -->
  <script src="assets/sweetalert/dist/sweetalert2.all.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
  <script src="assets/sweetalert/dist/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="assets/sweetalert/dist/sweetalert2.min.css">
</head>

<body>
  <!-- Sidenav -->
  <nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
      <!-- Brand -->
      <div class="sidenav-header  align-items-center">
        <a class="navbar-brand" href="?halaman=beranda">
          <img src="../assets/images/logo2.png" class="navbar-brand-img" alt="...">
        </a>
      </div>
      <div class="navbar-inner">
        <!-- Collapse -->
        <div class="collapse navbar-collapse" id="sidenav-collapse-main">
          <!-- Nav items -->
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="?halaman=beranda">
                <i class="fas fa-home text-primary"></i>
                <span class="nav-link-text">Beranda</span>
              </a>
            </li>
             <li class="nav-item">
              <a class="nav-link" href="?halaman=kejuaraan">
                <i class="fas fa-trophy text-primary"></i>
                <span class="nav-link-text">Kejuaraan</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?halaman=berita">
                <i class="fas fa-newspaper text-primary"></i>
                <span class="nav-link-text">Berita</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?halaman=galeri">
                <i class="fas fa-image text-primary"></i>
                <span class="nav-link-text">Galeri</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="?halaman=pembayaran">
                <i class="fas fa-money-bill text-primary"></i>
                <span class="nav-link-text">Transaksi</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <!-- Main content -->
  <div class="main-content" id="panel">
    <!-- Topnav -->
     <nav class="navbar navbar-top navbar-expand navbar-dark bg-primary border-bottom">
      <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <!-- Navbar links -->
          <ul class="navbar-nav align-items-center  ml-md-auto ">
            <li class="nav-item d-xl-none">
              <!-- Sidenav toggler -->
              <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                <div class="sidenav-toggler-inner">
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                  <i class="sidenav-toggler-line"></i>
                </div>
              </div>
            </li>
          </ul>
          <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
            <li class="nav-item dropdown">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                     <?php  

                 $query = mysqli_query($koneksi,"SELECT * FROM tb_admin where id_admin='$_SESSION[id_admin]'");
                 while($data = mysqli_fetch_assoc($query)) { ?>
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="../assets/images/foto_admin/<?php echo $data['foto_admin'];?>">
                  
                  </span>
                  <div class="media-body  ml-2  d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $data['nama_admin'];?></span>
                  </div>
                  <?php } ?>
                </div>
              </a>

              <div class="dropdown-menu  dropdown-menu-right ">
                <a href="?halaman=akun" class="dropdown-item">
                  <i class="fas fa-user text-danger"></i>
                  <span>Profile</span>
                </a>
                <a href="keluar.php" class="dropdown-item">
                  <i class="fas fa-sign-out-alt text-danger"></i>
                  <span>Keluar</span>
                </a>
                 
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    
    <!-- Page content -->
    <?php include 'konfigurasi.php'; ?>
    <div class="container-fluid mt--6">
      
      <!-- Footer -->
      <footer class="footer pt-0 footer-bottom">
        <div class="row align-items-center justify-content-lg-between">
          <div class="col-lg-12">
            <div class="copyright text-center  text-lg-center  text-muted">
              &copy; Copyright 2023 By <i class="fas fa-heart text-danger"></i> Build Your Business
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!-- Argon Scripts -->
  <!-- Core -->
  <script src="assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <!-- Optional JS -->
  <script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
  <script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
  <!-- Argon JS -->
  <script src="assets/js/argon.js?v=1.2.0"></script>
  <!-- Data Tables -->
    <script type="text/javascript" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script>
    $(document).ready( function () {
        $('#myTable').DataTable();
    } );
    </script>
</body>

</html>
<?php } ?>
