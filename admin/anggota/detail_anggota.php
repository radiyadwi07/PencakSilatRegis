<?php 
$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM anggota WHERE id_anggota = '$id'");
$anggota = $query->fetch_assoc();
?>
<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item"><a href="?halaman=anggota">Data Anggota</a></li>
              <li class="breadcrumb-item active" aria-current="page">Detail Anggota</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Detail Anggota</h2>
        </div>
        <div class="card-body">
          <center>
            <img src="../assets/images/foto_anggota/<?php echo $anggota['foto_anggota']; ?>" width="180">
          </center>
        <form class="mt-5">
          <div class="form-group">
            <label for="">Nama Anggota</label>
            <input type="text" class="form-control" readonly="" value="<?php echo $anggota['nama_lengkap']; ?>">
          </div>
          <div class="form-group">
            <label for="">Jenis Kelamin</label>
            <input type="text" class="form-control" readonly="" value="<?php echo $anggota['jenis_kelamin']; ?>">
          </div>
          <div class="form-group">
            <label for="">Tanggal Lahir</label>
            <input type="date" class="form-control" readonly="" value="<?php echo $anggota['tgl_lahir']; ?>">
          </div>
          <div class="form-group">
            <label for="">Agama</label>
            <input type="text" class="form-control" readonly="" value="<?php echo $anggota['agama']; ?>">
          </div>
          <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" readonly="" value="<?php echo $anggota['email']; ?>">
          </div>
          <div class="form-group">
            <label for="">No. Telepon</label>
            <input type="text" class="form-control" readonly="" value="<?php echo $anggota['no_telp']; ?>">
          </div>
          <div class="form-group">
            <label for="">Alamat</label>
            <input type="text" class="form-control" readonly="" value="<?php echo $anggota['alamat']; ?>">
          </div>
          <div class="form-group">
            <label for="">Tanggal Daftar</label>
            <input type="text" class="form-control" readonly="" value="<?php echo $anggota['tgl_daftar']; ?>">
          </div>
        </form>
        </div>
      </div>
    </div>
  </div>
</div>

