<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Keterangan Absensi</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Keterangan Absensi anggota</h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light text-center">
                <tr>
                 <th width="1">NO</th>
                 <th>NAMA ANGGOTA</th>
                 <th>AKSI</th>
               </tr>
             </thead>
             <tbody class="text-center">
             <?php
          $no = 1; 
          $query = mysqli_query($koneksi,"SELECT * FROM anggota ");
          while($data = mysqli_fetch_assoc($query)) {
            ?>
            <tr>
              <td><?php echo $no; ?></td>
              <td><?php echo $data['nama_pengguna']; ?></td>
              <td>
                <a href="?halaman=cek_ket&id=<?php echo $data['id_anggota']; ?>" class="btn btn-info">Memeriksa Keterangan Absensi </a>
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

