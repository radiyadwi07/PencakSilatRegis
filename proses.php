<?php 

include_once('koneksi.php');
$username = mysqli_escape_string($koneksi,$_POST['username']);
$password = MD5(mysqli_escape_string($koneksi,$_POST['password']));

$sql = $koneksi->query("SELECT * FROM anggota WHERE nama_pengguna = '$username' AND kata_sandi = '$password' ");
    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
      $qry = mysqli_fetch_array($sql);
      session_start();

      $_SESSION['login'] = true;
      $_SESSION['id_anggota'] = $qry['id_anggota'];
      $_SESSION['nama_pengguna'] = $qry['nama_pengguna'];
      $_SESSION['nama_lengkap'] = $qry['nama_lengkap'];
      $_SESSION['foto_anggota'] = $qry['foto_anggota'];

      echo "<script>
                Swal.fire({
                allowEnterKey: false,
                allowOutsideClick: false,
                icon: 'success',
                title: 'Berhasil',
                text: 'Anda Berhasil Masuk'
                }).then(function() {
                  window.location.href='index'
                });
                </script>";
              }else{
                echo "<script>
                Swal.fire({
                allowEnterKey: false,
                allowOutsideClick: false,
                icon: 'error',
                title: 'Oops',
                text: 'Maaf, nama pengguna atau kata sandi salah'
                }).then(function() {
                  window.location.href='masuk'
                });
                </script>";
              }





    ?>