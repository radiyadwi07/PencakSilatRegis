<?php  

$select = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id='$_GET[id]'");
$row = mysqli_fetch_array($select);
$hapus_foto = $row['foto'];

if ($row['foto'] == "") {
   $query =  mysqli_query($koneksi, "DELETE FROM tb_keterangan WHERE id='$_GET[id]'");
   if ($query) {
    echo '<script>window.history.back()</script>';
    echo "<meta http-equiv='refresh' content='0'>";

   }
   
}else{
unlink("../assets/images/absensi/$hapus_foto");
   $query =  mysqli_query($koneksi, "DELETE FROM tb_keterangan WHERE id='$_GET[id]'");
  
   if ($query) {
    echo '<script>window.history.back()</script>';
    echo "<meta http-equiv='refresh' content='0'>";
   }
}
?>
