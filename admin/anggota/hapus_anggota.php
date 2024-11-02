<?php 
$id = $_GET['id'];
$ambil = $koneksi->query("SELECT * FROM anggota WHERE id_anggota = '$id'");
$data = $ambil->fetch_assoc();


$query = $koneksi->query("DELETE FROM anggota WHERE id_anggota = '$id'");

if ($query) {
  echo "<script>
  Swal.fire({
    allowEnterKey: false,
    allowOutsideClick: false,
    icon: 'success',
    title: 'Berhasil',
    text: 'Data Anggota berhasil dihapus'
    }).then(function() {
      window.location.href='?halaman=anggota'
    });
  </script>";
}
?>