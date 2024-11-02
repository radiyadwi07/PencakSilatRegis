<?php 
$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM teknik WHERE id_teknik = '$id'");
$teknik = $query->fetch_assoc();
?>
<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item"><a href="?halaman=teknik">Teknik</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ubah teknik</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Ubah teknik</h2>
        </div>
        <div class="card-body">
        <center>
          <img src="../assets/images/foto_teknik/<?php echo $teknik['gambar']; ?>" width="200" style="margin-bottom: 40px;">
        </center>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama teknik</label>
            <input type="text" name="nama_teknik" class="form-control" required="" maxlength="35" value="<?php echo $teknik['nama_teknik']; ?>">
          </div>
          <div class="form-group">
        <label for="">Isi</label>
        <textarea name="isi" class="form-control" id="summernote" value=""><?= $teknik['isi'] ?></textarea>
      </div>
          <div class="form-group">
            <label for="">Ubah Foto teknik</label>
            <input type="file" name="gambar" class="form-control">
          </div>
          <button name="simpan" class="btn btn-success">SIMPAN</button>
        </form>
        <?php 
        if (isset($_POST['simpan'])) {
          $isi = $_POST['isi'];
           $nama_teknik = $_POST['nama_teknik'];
            $gambar = $_FILES['gambar']['name'];
            if($gambar != "") {
              $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
              $x = explode('.', $gambar);
              $ekstensi = strtolower(end($x));
              $file_tmp = $_FILES['gambar']['tmp_name'];   

              $nama_gambar_baru = $gambar;
              if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../assets/images/foto_teknik/'.$nama_gambar_baru);
                $query = "UPDATE teknik SET nama_teknik = '$nama_teknik', gambar = '$nama_gambar_baru', isi='$isi'";
                $query .= "WHERE id_teknik = $id";  
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
                    text: 'Data teknik berhasil diubah'
                    }).then(function() {
                      window.location.href='?halaman=teknik'
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
                        window.location.href='?halaman=ubah_teknik&id=$id'
                        });
                        </script>";

                      }
                    } else {
                     $query = "UPDATE teknik SET nama_teknik = '$nama_teknik',gambar = '$nama_gambar_baru',isi='$isi'";
                     $query .= "WHERE id_teknik = $id";  
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
                      text: 'Data teknik berhasil diubah'
                      }).then(function() {
                        window.location.href='?halaman=teknik'
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

