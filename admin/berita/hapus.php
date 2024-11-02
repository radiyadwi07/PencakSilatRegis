<?php 
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM postingan WHERE id_post = '$id'");
$data = $ambil->fetch_assoc();
$foto = $data['gambar'];
if (file_exists("../assets/images/berita/$foto")) 
{
  unlink("../assets/images/berita/$foto");
}

$query = $koneksi->query("DELETE FROM postingan WHERE id_post = '$id'");

if ($query) {
  echo "<script>
  Swal.fire({
    allowEnterKey: false,
    allowOutsideClick: false,
    icon: 'success',
    title: 'Berhasil',
    text: 'Data berita berhasil dihapus'
    }).then(function() {
      window.location.href='?halaman=berita'
    });
  </script>";
}
?>