<?php 
include 'koneksi.php';
session_start(); 
include 'akses.php';
date_default_timezone_set('Asia/Jakarta');
$id=$_GET['id'];
if (isset($_GET['id'])) {
  $result2 = mysqli_query($koneksi,"SELECT * FROM postingan where id_post='$id'");
  $data = mysqli_fetch_array($result2); 
  if (!isset($_SESSION['anggota'])) {
    
    $komentar = false ; 
  } else {
    
    $komentar = true;
    if (isset($_POST['simpan'])) {
      $nm = $_SESSION["nama_pengguna"];
      $komen = $_POST['komen'];
      $id_postingan = $id;
      $id_anggota = $_SESSION["id_anggota"];
      $gambar_komentar =$_SESSION['foto_anggota'];
      mysqli_query($koneksi, "INSERT INTO komentar(id_postingan,nama_anggota,komentar,id_user,gambar_komentar) values('$id_postingan', '$nm','$komen','$id_anggota','$gambar_komentar')");  
      
    }
  }
}else{
  header("Location : berita");
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
  <?php include 'menu/navbar.php'; ?>

  <div class="page-header header-filter clear-filter purple-filter" data-parallax="true" >
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
          <div class="brand">
            <h2>DETAIL BERITA </h2>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="main main-raised">
    <div class="section section-basic">
        <div class="container">
  <div class="title">
          <h2 class="text-center mb-5">Detail Berita </h2>
        </div>

<section id="blog" class="blog">
  <div class="container" data-aos="fade-up">

    <div class="row">

      <div class="col-lg-8 entries">

        <article class="entry entry-single">

          <div class="entry-img">
            <img src="<?= "assets/images/berita/".$data['gambar'] ?>" alt="" class="img-fluid">
          </div>

          <h2 class="entry-title">
           <p><?=$data['judul'] ?></p>
         </h2>

         

         <div class="entry-content">
          <p>
            <?=$data['isi_post'] ?>
          </p>

          

          
        </div>

        

      </article><!-- End blog entry -->
      
      <div class="blog-author d-flex align-items-center">
        <?php  
        $id=$_GET['id'];
        $query = mysqli_query($koneksi,"SELECT * FROM postingan where id_post='$id'");
        while($data2 = mysqli_fetch_assoc($query)) { ?>
          <img src="assets/images/foto_admin/<?php echo $data2['gambar_pemosting'];?>" class="rounded-circle float-left" alt="">
          
          <div>
            <h4><?= $data['nm_pemosting']; ?></h4>
            <p><?= $data2['tgl_posting']; ?></p>
          <?php } ?>
        </div>

      </div><!-- End blog author bio -->

      

      <div class="blog-comments">
        <?php   

        
        $tampil2 = mysqli_query($koneksi,"SELECT * FROM komentar where id_postingan='$id'");
        $jml_komen = mysqli_num_rows($tampil2); ?>
        <h4 class="comments-count"> <?php echo number_format($jml_komen); ?> Komentar</h4>
        <?php while ($kom = mysqli_fetch_assoc($tampil2)) {
          $a = $kom['nama_anggota'];
          $result3=mysqli_query($koneksi,"SELECT * FROM anggota where nama_pengguna='$a'");
          $row3 = mysqli_fetch_assoc($result3);
          ?>
          <div class="comment">
            <div class="d-flex">
               <div class="comment-img"><img src="assets/images/foto_anggota/<?php echo $kom['gambar_komentar'];?>" alt="" class="rounded-circle float-left" style="heigth: 10px;"></div>
              <div>
                <h5><?=$a?></h5>
                <small class="text-monospace" style="top: 0px;"><?=$kom['tanggal_wkt']?></small>
                <p>
                 <?=$kom['komentar']?>
               </p>
             </div>
           </div>
         <?php } ?>
       </div>
       <!-- End comment #1 -->
       <!-- End comment #4 -->

       <div class="reply-form">

        <h4>Komentar</h4>
        <?php if ($komentar == false) {
          echo "
          <div class='card ms-1 col-md-8' style='background-color: #DAC1B7 !important ;'>
          <p class='ms-4 mt-2 mb-2'>Harus masuk untuk berkomentar | <a href='masuk'>Masuk</a></p>
          </div>";
        }else{
          echo "
          <form action=''  method = 'POST'>
          <div class='row'>
          
          <textarea name='komen' id='' cols='90' rows='10' value='' required></textarea><br>
          <br>
          <button name='simpan' type='submit' class='btn-primary end'> Komentar </button>
          </div>
          

          </form>";
        }
        ?>

      </div>
    </div><!-- End blog comments -->

  </div><!-- End blog entries list -->

  
</div>

</div>
</section><!-- End Blog Single Section -->

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