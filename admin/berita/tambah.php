<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item"><a href="?halaman=berita">Berita</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tambah berita</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-body">
          <h2 class="text-center text-primary" style="margin-bottom: 40px;">TAMBAH BERITA</h2>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label for="">Judul</label>
              <input type="text" name="judul" class="form-control" required="">
            </div>
            <div class="form-group">
              <label for="">Isi</label>
              <textarea name="isi_post" class="form-control" id="summernote" required></textarea>
            </div>
            <div class="form-group">
              <label for="">Masukan Gambar untuk berita</label>
              <input type="file" name="gambar" class="form-control" required="">
            </div>
            <button class="btn btn-success" name="tambah">TAMBAH</button>
          </form>
          <?php 
          if (isset($_POST['tambah'])) 
          {
            $id_admin= $_SESSION['id_admin'];
            $gambar_pemosting = $_SESSION['foto_admin'];
            $nama_anggota=$_SESSION['nama_pengguna'];
            $judul  = $_POST['judul'];
            $isi_post  = $_POST['isi_post'];
            $gambar = $_FILES['gambar']['name'];
            if($gambar != "") {
              $ekstensi_diperbolehkan = array('png','jpg','jpeg'); 
              $x = explode('.', $gambar);
              $ekstensi = strtolower(end($x));
              $file_tmp = $_FILES['gambar']['tmp_name'];  
              $temp = explode(".", $_FILES["gambar"]["name"]);
              $nama_gambar_baru = round(microtime(true)) . '.' . end($temp);
              if(in_array($ekstensi, $ekstensi_diperbolehkan) === true)  {     
                move_uploaded_file($file_tmp, '../assets/images/berita/'.$nama_gambar_baru);
                $query = "INSERT INTO postingan (judul, gambar,isi_post, nm_pemosting,gambar_pemosting,id_admin) VALUES ('$judul','$nama_gambar_baru','$isi_post','$nama_anggota','$gambar_pemosting','$id_admin')";

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
                    text: 'Data Berita berhasil di tambah'
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
                        window.location.href='?halaman=tambah_berita'
                        });
                        </script>"; 

                      }
                    } else {

                      $query = "INSERT INTO postingan (judul,gambar,isi_post,nm_pemosting,gambar_pemosting,id_admin) VALUES ('$judul',null,'$isi_post','$nama_anggota','$gambar_pemosting','$id_admin')";
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
                          text: 'Data Berita berhasil di tambah'
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

