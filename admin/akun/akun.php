<?php  
$id_admin = $_SESSION["id_admin"];
$query = mysqli_query($koneksi,"SELECT * FROM tb_admin WHERE id_admin = '$id_admin'");
$query2 = mysqli_query($koneksi,"SELECT * FROM postingan WHERE id_admin = '$id_admin'");
$data = mysqli_fetch_assoc($query);
$data2 = mysqli_fetch_assoc($query2);

if (isset($_POST['ubah'])) 
{
  $nama_pengguna=$_POST['nama_pengguna'];
  $nama_admin = $_POST['nama_admin'];
  $kata_sandi = MD5(mysqli_escape_string($koneksi,$_POST['kata_sandi']));
  $gambar_pemosting = $_SESSION['foto_admin'];
  $gambar = $_FILES['gambar']['name'];
  if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   

    $nama_gambar_baru = $gambar;
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
      move_uploaded_file($file_tmp, '../assets/images/foto_admin/'.$nama_gambar_baru);

      $query = "UPDATE tb_admin SET nama_pengguna = '$nama_pengguna',nama_admin = '$nama_admin',foto_admin = '$nama_gambar_baru',kata_sandi='$kata_sandi'";
      $query .= "WHERE id_admin = $id_admin";
      $query2 = "UPDATE postingan set gambar_pemosting = '$nama_gambar_baru',nm_pemosting = '$nama_admin'";
      $query2 .= "WHERE id_admin = $id_admin";
      
      $result2 = mysqli_query($koneksi, $query2);
      if(!$result2){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
      } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }
      $result = mysqli_query($koneksi, $query);
      if(!$result){
        die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
         " - ".mysqli_error($koneksi));
      } else {
        echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
      }

    } else {     
      echo "<script>alert('Ekstensi gambar yang boleh hanya jpg atau png.');window.location='ganti-profile.php';</script>";
    }
  } else {
    $query =  "UPDATE tb_admin SET nama_pengguna = '$nama_pengguna',nama_admin = '$nama_admin',kata_sandi='$kata_sandi'";
    $query .= "WHERE id_admin = $id_admin"; 
    $result = mysqli_query($koneksi, $query);
    if(!$result){
      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
       " - ".mysqli_error($koneksi));
    } else {
      echo "<script>alert('Data berhasil diubah.');window.location='index.php';</script>";
    }
  }
}
?>
<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ubah Profile</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h3 class="text-center text-primary">UBAH Profile</h3>
          <form action="" enctype="multipart/form-data" method="POST">
            <input type="hidden" class="form-control" name="id_admin" value="<?php echo $data['id_admin']?>" onSubmit=" return validasi()">
            <div class="form-group">
              <label for="">Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_admin" value="<?php echo $data['nama_admin']; ?>">
            </div>
            <div class="form-group">
              <label for="">Nama Pengguna / Username</label>
              <input type="text" class="form-control" name="nama_pengguna" value="<?php echo $data['nama_pengguna']; ?>">
            </div>

            <div class="form-group">
              <label for="">Kata Sandi</label>
              <input type="password" class="form-control" name="kata_sandi" value="<?php echo $data['kata_sandi']; ?>">
            </div>

            <div class="form-group">
              <img src="../assets/images/foto_admin/<?= $data['foto_admin']; ?>" style="width: 120px;float: center;margin-bottom:auto;">
            </div>
            <br>
            <div class="form-group">
              <label>Gambar</label>
              <input type="file" name="gambar" class="form-control" >
            </div>
          </div>
          <button class="btn btn-success" name="ubah">UBAH</button>
        </form>

      </div>
    </div> 
  </div>

</div>
</div>
</div>
</div>
</div>
