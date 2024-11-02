<?php 
$id_post = @$_GET['id_post'];
$query = mysqli_query($koneksi,"SELECT * FROM postingan WHERE id_post = '$id_post'");
$data = mysqli_fetch_assoc($query);
?>
<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item"><a href="?halaman=berita">Berita</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ubah berita</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <h2 class="text-center text-primary" style="margin-bottom: 40px;">UBAH BERITA</h2>

        <div class="card-body">
          <form action="" enctype="multipart/form-data" method="POST">
            <input type="hidden" class="form-control" name="id_post" value="<?php echo $data['id_post']?>" onSubmit=" return validasi()">
            <div class="form-group">
              <label for="">Judul</label>
              <input type="text" class="form-control" name="judul"value="<?php echo $data['judul']; ?>" required=''>
            </div>
            <div class="form-group">
              <label for="">Isi</label>
              <textarea name="isi_post" class="form-control" required=''id="summernote" value=""required><?= $data['isi_post'] ?></textarea>
            </div>
            <div class="form-group">
              <img src="../assets/images/berita/<?= $data['gambar']; ?>" style="width: 120px;float: center;margin-bottom:auto;">
            </div>
            <br>
            <div class="form-group">
              <label>Gambar Berita</label>
              <input type="file" name="gambar" class="form-control" >
            </div>
          </div>
          <button class="btn btn-success" name="ubah">UBAH</button>
        </form>
        <?php 
        if (isset($_POST['ubah'])) 
        {

          $gambar_pemosting = $_SESSION['foto_admin'];
          $nama_anggota=$_SESSION['nama_pengguna'];
          $judul = $_POST['judul'];
          $isi_post = $_POST['isi_post'];
          $id_post = $_POST['id_post'];
// Ambil Data yang Dikirim dari Form

          $gambar = $_FILES['gambar']['name'];
          if($gambar != "") {
            $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
            $x = explode('.', $gambar);
            $ekstensi = strtolower(end($x));
            $file_tmp = $_FILES['gambar']['tmp_name'];   

            $nama_gambar_baru = $gambar;
            if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
              move_uploaded_file($file_tmp, '../assets/images/berita/'.$nama_gambar_baru);

              $query = "UPDATE postingan SET judul = '$judul',isi_post = '$isi_post',nm_pemosting = '$nama_anggota',gambar = '$nama_gambar_baru'";
              $query .= "WHERE id_post = $id_post";  
              $result = mysqli_query($koneksi, $query);
              if(!$result){
                die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                 " - ".mysqli_error($koneksi));
              } else {
                echo "<script>
                Swal.fire({
                  allowEnterKey: false,
                  allowOutsideClick: false,
                  icon: 'success',
                  title: 'Berhasil',
                  text: 'Data Berita berhasil diubah'
                  }).then(function() {
                    window.location.href='?halaman=berita'
                    });
                    </script>";

                  }

                } else {     
                  echo "<script>
                  Swal.fire({
                    allowEnterKey: false,
                    allowOutsideClick: false,
                    icon: 'error',
                    title: 'Oops',
                    text: 'Ekstensi gambar yang boleh hanya jpg atau png.'
                    }).then(function() {
                      window.location.href='?halaman=ubah_berita&id_post=$id_post'
                      });
                      </script>";

                    }
                  } else {
                    $query = "UPDATE postingan SET judul = '$judul',isi_post = '$isi_post',nm_pemosting = '$nama_anggota',gambar_pemosting = '$gambar_pemosting'";
                    $query .= "WHERE id_post = $id_post";  
                    $result = mysqli_query($koneksi, $query);
                    if(!$result){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                       " - ".mysqli_error($koneksi));
                    } else {
                     echo "<script>
                     Swal.fire({
                      allowEnterKey: false,
                      allowOutsideClick: false,
                      icon: 'success',
                      title: 'Berhasil',
                      text: 'Data Berita berhasil diubah'
                      }).then(function() {
                        window.location.href='?halaman=berita'
                        });
                        </script>";
                      }
                    }
                  }

                  ?>

                </div>
              </div>
            </div>
          </div>
        </div>

