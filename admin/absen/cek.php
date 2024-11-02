<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item" aria-current="page">Absensi Anggota</li>
               <li class="breadcrumb-item active" aria-current="page">Memeriksa Kehadiran</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Memeriksa Kehadiran anggota</h2>
        </div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light text-center">
                <tr>
                 <th width="1">NO</th>
                 <th>NAMA ANGGOTA</th>
                 <th>TANGGAL</th>
                 <th>JAM</th>
                 <th>STATUS</th>
                 <th>AKSI</th>
               </tr>
             </thead>
             <tbody class="text-center">
             <?php
             $id = $_GET['id'];
          $no = 1; 
          $query = mysqli_query($koneksi,"SELECT * FROM tb_absen WHERE id_anggota='$id'");
          while($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data['nama_pengguna']; ?></td>
              <td><?php echo $data['tanggal']; ?></td>
              <td><?php echo $data['jam']; ?></td>
              <td>
                <?php 
                $select_jam = mysqli_query($koneksi, "SELECT * FROM jam_masuk");
                $jam_masuk = mysqli_fetch_array($select_jam);
                if ($data['jam2'] > $jam_masuk['jam_masuk']) {
                  echo '<b style="color: red;">telat</b>';
                }else{
                  echo '<b style="color: green;">tepat waktu</b>';
                }

              ?></td>
              <td>
                <a href="?halaman=hapus_absen&id=<?php echo $data['id_absen']; ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <?php $no++; ?>
          <?php } ?>

              </tbody>
            </table>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

