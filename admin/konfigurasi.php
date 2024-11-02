  <?php 
  if (@$_GET['halaman'] == 'beranda' || @$_GET['halaman' == '']) {
    include 'beranda.php';
  }elseif (@$_GET['halaman'] == "beranda") {
    include 'beranda.php';
  }elseif (@$_GET['halaman'] == "anggota") {
    include 'anggota/anggota.php';
  }elseif (@$_GET['halaman'] == "detail_anggota") {
    include 'anggota/detail_anggota.php';
  }elseif (@$_GET['halaman'] == "ubah_anggota") {
    include 'anggota/ubah_anggota.php';
  }elseif (@$_GET['halaman'] == "hapus_anggota") {
    include 'anggota/hapus_anggota.php';
  }elseif (@$_GET['halaman'] == "galeri") {
    include 'galeri/galeri.php';
  }elseif (@$_GET['halaman'] == "tambah_galeri") {
    include 'galeri/tambah_galeri.php';
  }elseif (@$_GET['halaman'] == "ubah_galeri") {
    include 'galeri/ubah_galeri.php';
  }elseif (@$_GET['halaman'] == "hapus_galeri") {
    include 'galeri/hapus_galeri.php';
  }elseif (@$_GET['halaman'] == "komentar") {
    include 'komentar/komentar.php';
  }elseif (@$_GET['halaman'] == "detail_komentar") {
    include 'komentar/detail_komentar.php';
  }elseif (@$_GET['halaman'] == "hapus_komentar") {
    include 'komentar/hapus_komentar.php';
  }elseif (@$_GET['halaman'] == "pelatih") {
    include 'pelatih/pelatih.php';
  }elseif (@$_GET['halaman'] == "tambah_pelatih") {
    include 'pelatih/tambah_pelatih.php';
  }elseif (@$_GET['halaman'] == "ubah_pelatih") {
    include 'pelatih/ubah_pelatih.php';
  }elseif (@$_GET['halaman'] == "detail_pelatih") {
    include 'pelatih/detail_pelatih.php';
  }elseif (@$_GET['halaman'] == "hapus_pelatih") {
    include 'pelatih/hapus_pelatih.php';
  }elseif (@$_GET['halaman'] == "kejuaraan") {
    include 'kejuaraan/kejuaraan.php';
  }elseif (@$_GET['halaman'] == "tambah_kejuaraan") {
    include 'kejuaraan/tambah_kejuaraan.php';
  }elseif (@$_GET['halaman'] == "hapus_kejuaraan") {
    include 'kejuaraan/hapus_kejuaraan.php';
  }elseif (@$_GET['halaman'] == "ubah_kejuaraan") {
    include 'kejuaraan/ubah_kejuaraan.php';
  }elseif (@$_GET['halaman'] == "berita") {
    include 'berita/berita.php';
  }elseif (@$_GET['halaman'] == "tambah_berita") {
  include 'berita/tambah.php';
  }elseif (@$_GET['halaman'] == "hapus_berita") {
    include 'berita/hapus.php';
  }elseif (@$_GET['halaman'] == "ubah_berita") {
    include 'berita/ubah.php';
   }elseif (@$_GET['halaman'] == "akun") {
    include 'akun/akun.php';
   }elseif (@$_GET['halaman'] == "pembayaran") {
    include 'pembayaran/pembayaran.php';
   }elseif (@$_GET['halaman'] == "ubah_teknik") {
    include 'teknik/ubah.php';
   }elseif (@$_GET['halaman'] == "tambah_teknik") {
    include 'teknik/tambah.php';
  }elseif (@$_GET['halaman'] == "hapus_teknik") {
    include 'teknik/hapus.php';
   }elseif (@$_GET['halaman'] == "absen") {
    include 'absen/absen.php';
  }elseif (@$_GET['halaman'] == "hapus_absen") {
    include 'absen/hapus.php';
   }elseif (@$_GET['halaman'] == "cek_absen") {
    include 'absen/cek.php';
     }elseif (@$_GET['halaman'] == "cek_ket") {
    include 'absen/cek_ket.php';
   }elseif (@$_GET['halaman'] == "ket_absen") {
    include 'absen/ket_absen.php';
  }elseif (@$_GET['halaman'] == "hapus_keterangan") {
    include 'absen/hapus_ket.php';
  }else{
    include 'beranda.php';
  }
?>