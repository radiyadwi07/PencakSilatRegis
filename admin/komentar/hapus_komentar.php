<?php
$id = $_GET['id'];
$query = $koneksi->query("DELETE FROM komentar WHERE id_komen= '$id'");

if ($query) {
echo "<script>
	Swal.fire({
	allowEnterKey: false,
	allowOutsideClick: false,
	icon: 'success',
	title: 'Berhasil',
	text: 'Data komentar berhasil di hapus'
	}).then(function() {
		window.location.href='?halaman=komentar'
	});
	</script>";
}else{
	echo "<script>
	Swal.fire({
	allowEnterKey: false,
	allowOutsideClick: false,
	icon: 'error',
	title: 'Oops',
	text: 'Maaf, Gagal menghapus data komentar'
	}).then(function() {
		window.location.href='?halaman=komentar'
	});
	</script>";
}
?>
