<?php 

$query = mysqli_query($koneksi,"SELECT * FROM tb_absen WHERE id_absen = '$_GET[id]'");
$data = mysqli_fetch_assoc($query);

  $query = mysqli_query($koneksi,"DELETE FROM tb_absen WHERE id_absen = '$_GET[id]'");
  
 
if ($query) {
  echo "<script>
  Swal.fire({
    allowEnterKey: false,
    allowOutsideClick: false,
    icon: 'success',
    title: 'Berhasil',
    text: 'Data Absen berhasil dihapus'
    }).then(function() {
      window.location.href='?halaman=absen'
    });
  </script>";
}

 ?>