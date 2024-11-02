<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item" aria-current="page">Keterangan Absensi</li>
              <li class="breadcrumb-item active" aria-current="page">Memeriksa Keterangan</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Memeriksa Keterangan Absensi Anggota</h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light text-center">

               <tr>
                <th width="1">NO</th>
                <th>NAMA ANGGOTA</th>
                <th>Keterangan</th>
                <th>Alasan</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <th>Bukti</th>
                <th>AKSI</th>

                
              </tr>
            </thead>
            <tbody class="text-center">
              <?php
              $id = $_GET['id'];
              $no = 1; 
              $query = mysqli_query($koneksi,"SELECT * FROM tb_keterangan WHERE id_anggota='$id'");
              while($data = mysqli_fetch_assoc($query)) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $data['nama_pengguna']; ?></td>
                  <td><?php echo $data['keterangan']; ?></td>
                  <td><?php echo $data['alasan']; ?></td>
                  <td><?php echo $data['tanggal']; ?></td>
                  <td><?php echo $data['jam']; ?></td>
                  <td><img src="../assets/images/absensi/<?php echo $data['foto']; ?>" width="100"></td>
                  <td>
                    <a href="?halaman=hapus_keterangan&id=<?php echo $data['id']; ?>" class="btn btn-danger">Hapus</a>
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

