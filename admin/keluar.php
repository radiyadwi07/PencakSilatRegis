<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Keluar</title>
	<!-- Sweet Alert -->
	 <script src="assets/sweetalert/dist/sweetalert2.all.min.js"></script>
	 <script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
	 <script src="assets/sweetalert/dist/sweetalert2.min.js"></script>
	 <link rel="stylesheet" href="assets/sweetalert/dist/sweetalert2.min.css">
</head>
<body>
	<?php
	session_start();
	session_destroy();
	echo "<script>
    Swal.fire({
    allowEnterKey: false,
    allowOutsideClick: false,
    icon: 'success',
    title: 'Berhasil',
    text: 'Anda Berhasil Keluar'
    }).then(function() {
      window.location.href='http://localhost/silat_kkp/'
    });
    </script>";
	?>	
</body>
</html>
