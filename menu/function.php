<?php
$koneksi = mysqli_connect('localhost','root','','kkp');
function simpan_absen()
{
    global $koneksi;
    $id_anggota = $_SESSION['id_anggota'];
    $nama_pengguna = $_POST['nama_pengguna'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $jam2 = $_POST['jam2'];

  // Validasi hari
    // $tanggal = '07-04-2022'; // hari sesuai sama tanggal yg didefine, tgl 7 berati hari kamis
    // $day = date('l', strtotime($tanggal));

$day = date('l'); // hari ini, klo ini harinya ngikutin hari server hari ini...
//echo "lah hari : " . $day;
if ($day == "Tuesday" || $day == "Thursday") {
         // Validasi tanggal
    $select = mysqli_query($koneksi, "SELECT * FROM tb_absen WHERE id_anggota='$id_anggota' AND tanggal='$tanggal'");
    $row = mysqli_num_rows($select);

    if ($row) {
        echo '<script>alert("anda sudah absen untuk hari ini, absen lagi besok!")</script>';
    }else{
        echo '<script>alert("terima kasih anda sudah absen pada hari ini")</script>';
        $res =  mysqli_query($koneksi, "INSERT INTO tb_absen SET id_anggota= '$id_anggota',nama_pengguna='$nama_pengguna', tanggal='$tanggal', jam='$jam', jam2='$jam2'");
        


    }
}else{
    echo '<script>alert("tidak ada Absensi hari ini")</script>';
    }
}


function simpan_keterangan()
{
    global $koneksi;

    $id_anggota = $_SESSION['id_anggota'];
    $nama_pengguna=$_SESSION['nama_pengguna'];
    $nama_lengkap=$_SESSION['nama_lengkap'];
    $keterangan = $_POST['keterangan'];
    $tanggal = $_POST['tanggal'];
    $jam = $_POST['jam'];
    $foto = $_FILES['foto']['name'];
    $day = date('l');
    if ($day == "Tuesday" || $day == "Thursday") {
       $select = mysqli_query($koneksi, "SELECT * FROM tb_keterangan WHERE id_anggota='$id_anggota' AND tanggal='$tanggal'");
       $row = mysqli_num_rows($select);
       if ($row) {
        echo '<script>alert("anda sudah absen untuk hari ini, absen lagi besok!")</script>';
    }else{
        if ($foto!= "") {
            $allowed_ext = array('png','jpg','jpeg','bmp');
            $x = explode(".", $foto);
            $ext = strtolower(end($x));
            $file_tmp = $_FILES['foto']['tmp_name'];
            $angka_acak = rand(1,999);
            $nama_file_baru = $angka_acak.'-'.$foto;
              if (in_array($ext, $allowed_ext)===true) {
                 move_uploaded_file($file_tmp, 'assets/images/absensi/'.$nama_file_baru);
                echo "<script>alert('Terima kasih Sudah Memberi Tanggapan');window.location='index';</script>";
                $res = mysqli_query($koneksi, "INSERT INTO tb_keterangan SET id_anggota='$id_anggota',nama_pengguna='$nama_pengguna', nama_lengkap='$nama_lengkap', keterangan='$keterangan',tanggal='$tanggal', jam='$jam', foto='$nama_file_baru'");
              }
             
        }
        }

    }else{
           echo "<script>alert('tidak ada Absensi hari ini');window.location='index';</script>";
     }

}

?>