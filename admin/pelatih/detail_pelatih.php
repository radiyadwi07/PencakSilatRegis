<?php 
$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM pelatih WHERE id_pelatih = '$id'");
$pelatih = $query->fetch_assoc();
?>
<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item"><a href="?halaman=pelatih">Data Pelatih</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Pelatih</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Detail Pelatih</h2>
        </div>
        <div class="card-body">
        <center>
          <img src="../assets/images/foto_pelatih/<?php echo $pelatih['gambar']; ?>" width="200" style="margin-bottom: 40px;">
        </center>
        <form action="">
          <div class="form-group">
            <label for="">Nama Pelatih</label>
            <input type="text" class="form-control" required="" readonly="" value="<?php echo $pelatih['nama_pelatih']; ?>">
          </div>
         
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

