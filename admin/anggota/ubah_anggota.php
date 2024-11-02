<?php 
$id = $_GET['id'];
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
              <li class="breadcrumb-item active" aria-current="page">Ubah Anggota</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Ubah Anggota</h2>
        </div>
        <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Ubah Foto Anggota</label>
            <input type="file" name="foto" class="form-control" required="">
          </div>
          <button name="simpan" class="btn btn-success">SIMPAN</button>
        </form>
        <?php 
        if (isset($_POST['simpan'])) {
          $nama_foto = $_FILES['foto']['name'];
          $lokasi  = $_FILES['foto']['tmp_name'];
          $nama_fix = date("YmdHis").$nama_foto;
          move_uploaded_file($lokasi,"../assets/images/foto_anggota/$nama_fix");


          $query = $koneksi->query("UPDATE anggota SET foto_anggota = '$nama_fix' WHERE id_anggota = '$id'");

          if ($query) {
            echo "<script>
            Swal.fire({
            allowEnterKey: false,
            allowOutsideClick: false,
            icon: 'success',
            title: 'Berhasil',
            text: 'Foto anggota berhasil diubah'
            }).then(function() {
              window.location.href='?halaman=anggota'
            });
            </script>";
          }else{
            echo "<script>
            Swal.fire({
            allowEnterKey: false,
            allowOutsideClick: false,
            icon: 'error',
            title: 'Oops',
            text: 'Maaf, foto anggota gagal diubah'
            }).then(function() {
              window.location.href='?halaman=ubah_anggota&id=$id'
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

