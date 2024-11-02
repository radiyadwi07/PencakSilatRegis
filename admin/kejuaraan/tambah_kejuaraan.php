<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item"><a href="?halaman=kejuaraan">Data Kejuaraan</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Kejuaraan</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Tambah kejuaraan</h2>
        </div>
        <div class="card-body">
        <form method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Nama Kejuaraan</label>
            <input type="text" name="nama_kejuaraan" class="form-control" required="" maxlength="35">
          </div>
          <div class="form-group">
            <label for="">Foto kejuaraan</label>
            <input type="file" name="gambar" class="form-control" required="">
          </div>
          <button name="tambah" class="btn btn-success">TAMBAH</button>
        </form>
        <?php 
        if (isset($_POST['tambah'])) {
         $nama_kejuaraan = $_POST['nama_kejuaraan'];
            $tanggal = date("Y-m-d");            
            $gambar = $_FILES['gambar']['name'];
            if($gambar != "") {
              $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
              $x = explode('.', $gambar);
              $ekstensi = strtolower(end($x));
              $file_tmp = $_FILES['gambar']['tmp_name'];  
              $temp = explode(".", $_FILES["gambar"]["name"]);
              $nama_gambar_baru = round(microtime(true)) . '.' . end($temp);
              if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../assets/images/foto_kejuaraan/'.$nama_gambar_baru);
                $query = "INSERT INTO kejuaraan (judul,gambar,tanggal) VALUES ('$nama_kejuaraan','$nama_gambar_baru','$tanggal')";
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
                    text: 'Data kejuaraan berhasil di tambah'
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
                        window.location.href='?halaman=tambah_kejuaraan'
                        });
                        </script>"; 

                      }
                    } else {
                     $query1 = "INSERT INTO kejuaraan (judul,gambar,tanggal) VALUES ('$nama_kejuaraan','$nama_gambar_baru','$tanggal')";
                     $result1 = mysqli_query($koneksi, $query1);
                     if(!$result1){
                      die ("Query gagal dijalankan: ".mysqli_errno($koneksi).
                        " - ".mysqli_error($koneksi));
                    } else {
                      echo "<script>
                      Swal.fire({
                        allowEnterKey: false,
                        allowOutsideClick: false,
                        icon: 'success',
                        title: 'Berhasil',
                        text: 'Data kejuaraan berhasil di tambah'
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

