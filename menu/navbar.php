<nav class="navbar navbar-transparent navbar-color-on-scroll fixed-top navbar-expand-lg" color-on-scroll="100" id="sectionsNav">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="index">
      <img src="assets/images/gb.jpg" alt="" width="50px" height="50px"> </a>
      <a class="navbar-brand logo" href="#">Cimacan Official</a> 
      <button class="navbar-toggler" type="button" data-toggle="collapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="sr-only">Toggle navigation</span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
        <span class="navbar-toggler-icon"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <a class="nav-link" href="index">
            Beranda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="anggota">
            Anggota
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="pelatih">
            Nama Pelatih
          </a>
        </li>
         <li class="dropdown nav-item">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            Kegiatan
          </a>
          <div class="dropdown-menu dropdown-with-icons">
          <a href="prestasi" class="dropdown-item">
              Galeri Kejuaraan
            </a>
            <a href="galeri" class="dropdown-item">
              Galeri Kegiatan
            </a>
            <a href="berita" class="dropdown-item">
              Berita
            </a>
          </div>
        </li>
        <?php if (isset($_SESSION['anggota'])): ?>

         <?php   


           $query = $koneksi->query("SELECT * FROM transaksi  WHERE nama_lengkap = '$_SESSION[nama_lengkap]'");

          $trans = $query->fetch_assoc();

          ?>

          <?php if ($trans['status'] == "belum_membayar") : ?>
 <li class="nav-item">
          <a class="nav-link" href="pembayaran">
            Biaya Pendaftaran
          </a>
        </li>
           <?php endif ?>

                  <?php if ($trans['status'] == "proses") : ?>
 <li class="nav-item">
          <a class="nav-link">
          belum di konfirmasi oleh admin
          </a>
        </li>
           <?php endif ?>
              <?php if ($trans['status'] == "sudah_membayar") : ?>
 <li class="nav-item">
          <a class="nav-link">
            Biaya Pendaftaran sudah di bayar
          </a>
        </li>
           <?php endif ?>



          
        <li class="dropdown nav-item">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            <?php echo $_SESSION['nama_lengkap']; ?>
          </a>
          <div class="dropdown-menu dropdown-with-icons">
            <a href="profile" class="dropdown-item">
              PROFIL
            </a>
            <a href="keluar" class="dropdown-item">
              KELUAR
            </a>
          </div>
        </li>
        <?php else: ?>
        <li class="dropdown nav-item">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            Akun Saya
          </a>
          <div class="dropdown-menu dropdown-with-icons">
            <a href="masuk" class="dropdown-item">
              MASUK
            </a>
            <a href="daftar" class="dropdown-item">
              DAFTAR
            </a>
          </div>
        </li>
        <li class="dropdown nav-item">
          <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
            Admin
          </a>
          <div class="dropdown-menu dropdown-with-icons">
            <a href="admin/masuk" class="dropdown-item">
              MASUK
            </a>
           
          </div>
        </li>
        <?php endif ?>

      </ul>
    </div>
  </div>
</nav>