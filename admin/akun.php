<?php 
$id_user = $_SESSION["id"];
$query = mysqli_query($koneksi,"SELECT * FROM anggota WHERE id_user = '$id_user'");
$query2 = mysqli_query($koneksi,"SELECT * FROM postingan WHERE id_user = '$id_user'");
$data = mysqli_fetch_assoc($query);
$data2 = mysqli_fetch_assoc($query2);

if (isset($_POST['ubah'])) 
{
  $nisn=$_POST['nisn'];
  $nama_anggota = $_POST['nama_anggota'];
  $email = $_POST['email'];
  $alamat = $_POST['alamat'];
  $no = $_POST['no'];
// Ambil Data yang Dikirim dari Form

  $gambar_pemosting =$_SESSION['gambar'];
  $gambar = $_FILES['gambar']['name'];
  if($gambar != "") {
    $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
    $x = explode('.', $gambar);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['gambar']['tmp_name'];   

    $nama_gambar_baru = $gambar;
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
      move_uploaded_file($file_tmp, '../gambar/'.$nama_gambar_baru);

      $query = "UPDATE anggota SET nisn = '$nisn',nama_anggota = '$nama_anggota',email= '$email',alamat='$alamat',no='$no',gambar = '$nama_gambar_baru'";
      $query .= "WHERE id_user = $id_user";
      $query2 = "UPDATE postingan set gambar_pemosting = '$nama_gambar_baru',nm_pemosting = '$nama_anggota'";
      $query2 .= "WHERE id_user = $id_user";
      
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
    $query =  "UPDATE anggota SET nisn = '$nisn',nama_anggota = '$nama_anggota',email= '$email',alamat='$alamat',no='$no'";
    $query .= "WHERE id_user = $id_user"; 
    
    
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
<div class="card">
  <div class="card-body">
    <h3 class="text-center text-primary">UBAH Profile</h3>
    <form action="" enctype="multipart/form-data" method="POST">
      <input type="hidden" class="form-control" name="id_user" value="<?php echo $data['id_user']?>" onSubmit=" return validasi()">
      <div class="form-group">
        <label for="">NISN</label>
        <input type="number" class="form-control" name="nisn" value="<?php echo $data['nisn']; ?>">
      </div>
      <div class="form-group">
        <label for="">Nama</label>
        <input type="text" class="form-control" name="nama_anggota" value="<?php echo $data['nama_anggota']; ?>">
      </div>
      
      <div class="form-group">
        <label for="">password</label>
        <input type="password" class="form-control" name="password" value="<?php echo $data['nama_anggota']; ?>" readonly>
      </div>
      <div class="form-group">
        <label for="">Email</label>
        <input type="text" class="form-control" name="email" value="<?php echo $data['email']; ?>">
      </div>
      <div class="form-group">
        <label for="">No handphone</label>
        <input type="text" class="form-control" name="no" value="<?php echo $data['no']; ?>">
      </div>
      <div class="form-group">
        <label for="">Alamat</label>
        <br>
        <textarea name="alamat" class="input" id="" required=""style="WIDTH: 1000px; HEIGHT: 144px" name="text" rows="100" wrap="VIRTUAL" cols="55"><?= $data['alamat'] ?></textarea>
      </div>
      <div class="form-group">
        <img src="../gambar/<?= $data['gambar']; ?>" style="width: 120px;float: center;margin-bottom:auto;">
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