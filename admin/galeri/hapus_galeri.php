<?php 
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM galeri WHERE id_galeri = '$id'");
$data = $ambil->fetch_assoc();
$foto = $data['gambar'];
if (file_exists("../assets/images/foto_galeri/$foto")) 
{
  unlink("../assets/images/foto_galeri/$foto");
}

$query = $koneksi->query("DELETE FROM galeri WHERE id_galeri = '$id'");

if ($query) {
  echo "<script>
  Swal.fire({
    allowEnterKey: false,
    allowOutsideClick: false,
    icon: 'success',
    title: 'Berhasil',
    text: 'Data galeri berhasil dihapus'
    }).then(function() {
      window.location.href='?halaman=galeri'
    });
  </script>";
}
?>