<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item"><a href="?halaman=pelatih">Data Pelatih</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah Pelatih</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Tambah Pelatih</h2>
        </div>
        <div class="card-body">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Nama Pelatih</label>
              <input type="text" name="nama_pelatih" class="form-control" required="" maxlength="35">
            </div>
            <div class="form-group">
              <label for="">Foto Pelatih</label>
              <input type="file" name="gambar" class="form-control" required="">
            </div>
            
            <button name="tambah" class="btn btn-success">TAMBAH</button>
          </form>
          <?php 
          if (isset($_POST['tambah'])) {
           $nama_pelatih = $_POST['nama_pelatih'];
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
              move_uploaded_file($file_tmp, '../assets/images/foto_pelatih/'.$nama_gambar_baru);
              $query = "INSERT INTO pelatih (nama_pelatih,gambar,tgl_upload) VALUES ('$nama_pelatih','$nama_gambar_baru','$tanggal')";
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
                  text: 'Data Pelatih berhasil di tambah'
                  }).then(function() {
                    window.location.href='?halaman=pelatih'
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
                      window.location.href='?halaman=tambah_pelatih'
                      });
                      </script>"; 

                    }
                  } else {
                   $query1 = "INSERT INTO pelatih (nama_pelatih,gambar,tanggal) VALUES ('$nama_pelatih','$nama_gambar_baru','$tanggal')";
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
                      text: 'Data pelatih berhasil di tambah'
                      }).then(function() {
                        window.location.href='?halaman=pelatih'
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