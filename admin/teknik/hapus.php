<?php 
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM teknik WHERE id_teknik = '$id'");
$data = $ambil->fetch_assoc();
$foto = $data['gambar'];
if (file_exists("../assets/images/foto_teknik/$foto")) 
{
  unlink("../assets/images/foto_teknik/$foto");
}

$query = $koneksi->query("DELETE FROM teknik WHERE id_teknik = '$id'");

if ($query) {
  echo "<script>
  Swal.fire({
    allowEnterKey: false,
    allowOutsideClick: false,
    icon: 'success',
    title: 'Berhasil',
    text: 'Data teknik berhasil dihapus'
    }).then(function() {
      window.location.href='?halaman=teknik'
    });
  </script>";
}
?>