<?php 
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM kejuaraan WHERE id_kejuaraan = '$id'");
$data = $ambil->fetch_assoc();
$foto = $data['gambar'];
if (file_exists("../assets/images/foto_kejuaraan/$foto")) 
{
  unlink("../assets/images/foto_kejuaraan/$foto");
}

$query = $koneksi->query("DELETE FROM kejuaraan WHERE id_kejuaraan = '$id'");

if ($query) {
  echo "<script>
  Swal.fire({
    allowEnterKey: false,
    allowOutsideClick: false,
    icon: 'success',
    title: 'Berhasil',
    text: 'Data kejuaraan berhasil dihapus'
    }).then(function() {
      window.location.href='?halaman=kejuaraan'
    });
  </script>";
}
?>