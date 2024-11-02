<div class="header bg-primary pb-6" style="margin-bottom: 290px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i>Beranda Admin</a></li>            </ol>
            </nav>
          </div>
        </div>
        <!-- Card stats -->
        <div class="row">
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <p class="card-title text-uppercase mb-3" style="font-size: 15px; color: #000; font-weight: bold;">Jumlah Anggota</p>
                    <span class="h2 font-weight-bold text-muted mb-0">
                      <?php $data = mysqli_query($koneksi,"SELECT * FROM anggota"); ?>
                      <a href="?halaman=anggota"><?php echo mysqli_num_rows($data); ?></a>
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-success text-white rounded-circle shadow">
                      <i class="fas fa-users"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <p class="card-title text-uppercase mb-3" style="font-size: 15px; color: #000; font-weight: bold;">Jumlah Galeri</p>
                    <span class="h2 font-weight-bold text-muted mb-0">
                      <?php $data = mysqli_query($koneksi,"SELECT * FROM galeri"); ?>
                      <a  href="?halaman=galeri"> <?php echo mysqli_num_rows($data); ?></a>
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                      <i class="fas fa-images"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <p class="card-title text-uppercase mb-3" style="font-size: 15px; color: #000; font-weight: bold;">Jumlah Komentar</p>
                    <span class="h2 font-weight-bold text-muted mb-0">
                      <?php $data = mysqli_query($koneksi,"SELECT * FROM komentar"); ?>
                      <a href="?halaman=komentar"><?php echo mysqli_num_rows($data); ?></a>
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                      <i class="fas fa-envelope"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-3 col-md-6">
            <div class="card card-stats">
              <!-- Card body -->
              <div class="card-body">
                <div class="row">
                  <div class="col">
                    <p class="card-title text-uppercase mb-3" style="font-size: 15px; color: #000; font-weight: bold;">Jumlah Pelatih</p>
                    <span class="h2 font-weight-bold text-muted mb-0">
                      <?php $data = mysqli_query($koneksi,"SELECT * FROM pelatih"); ?>
                      <a href="?halaman=pelatih"><?php echo mysqli_num_rows($data); ?>
                    </span>
                  </div>
                  <div class="col-auto">
                    <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                      <i class="fas fa-user"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>