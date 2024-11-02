<?php 
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM pelatih WHERE id_pelatih = '$id'");
$data = $ambil->fetch_assoc();
$foto = $data['gambar'];
if (file_exists("../assets/images/foto_pelatih/$foto")) 
{
  unlink("../assets/images/foto_pelatih/$foto");
}

$query = $koneksi->query("DELETE FROM pelatih WHERE id_pelatih = '$id'");

if ($query) {
  echo "<script>
  Swal.fire({
    allowEnterKey: false,
    allowOutsideClick: false,
    icon: 'success',
    title: 'Berhasil',
    text: 'Data pelatih berhasil dihapus'
    }).then(function() {
      window.location.href='?halaman=pelatih'
    });
  </script>";
}
?>