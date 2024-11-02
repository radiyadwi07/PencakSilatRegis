<?php 
$id = $_GET['id'];
$query = $koneksi->query("SELECT * FROM kejuaraan WHERE id_kejuaraan = '$id'");
$kejuaraan = $query->fetch_assoc();
?>
<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item"><a href="?halaman=kejuaraan">Data Kejuaraan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Ubah Kejuaraan</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Ubah Kejuaraan</h2>
        </div>
        <div class="card-body">
        <center>
          <img src="../assets/images/foto_kejuaraan/<?php echo $kejuaraan['gambar']; ?>" width="200" style="margin-bottom: 40px;">
        </center>
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama kejuaraan</label>
            <input type="text" name="nama_kejuaraan" class="form-control" required="" maxlength="35" value="<?php echo $kejuaraan['judul']; ?>">
          </div>
          <div class="form-group">
            <label for="">Ubah Foto kejuaraan</label>
            <input type="file" name="gambar" class="form-control">
          </div>
          <button name="simpan" class="btn btn-success">SIMPAN</button>
        </form>
        <?php 
        if (isset($_POST['simpan'])) {
          $nama_kejuaraan = $_POST['nama_kejuaraan'];
            $gambar = $_FILES['gambar']['name'];
            if($gambar != "") {
              $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
              $x = explode('.', $gambar);
              $ekstensi = strtolower(end($x));
              $file_tmp = $_FILES['gambar']['tmp_name'];   

              $nama_gambar_baru = $gambar;
              if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../assets/images/foto_kejuaraan/'.$nama_gambar_baru);
                $query = "UPDATE kejuaraan SET judul = '$nama_kejuaraan', gambar = '$nama_gambar_baru'";
                $query .= "WHERE id_kejuaraan = $id";  
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
                    text: 'Data kejuaraan berhasil diubah'
                    }).then(function() {
                      window.location.href='?halaman=kejuaraan'
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
                        window.location.href='?halaman=ubah_kejuaraan&id=$id'
                        });
                        </script>";

                      }
                    } else {
                     $query = "UPDATE kejuaraan SET judul = '$nama_kejuaraan',gambar = '$nama_gambar_baru'";
                     $query .= "WHERE id_kejuaraan = $id";  
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
                      text: 'Data kejuaraan berhasil diubah'
                      }).then(function() {
                        window.location.href='?halaman=kejuaraan'
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

