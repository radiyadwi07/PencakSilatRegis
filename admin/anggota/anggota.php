<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Anggota</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
        <h2 class="mb-0 text-center text-uppercase">Data Anggota</h2>
        </div>
        <div class="card-body">
        <div class="table-responsive">
          <table class="table align-items-center table-flush" id="myTable">
            <thead class="thead-light text-center">
              <tr>
                <th width="1">No.</th>
                <th>Nama Anggota</th>
                <th>Email</th>
                <th>No. Telepon</th>
                <th>Foto</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php 
              $no = 1;
              $query = $koneksi->query("SELECT * FROM anggota ORDER BY id_anggota DESC");
              while($anggota = $query->fetch_assoc()) {
              ?>
              <tr>
                <td><?php echo $no; ?>.</td>
                <td><?php echo $anggota['nama_lengkap']; ?></td>
                <td><?php echo $anggota['email']; ?></td>
                <td><?php echo $anggota['no_telp']; ?></td>
                <td><img src="../assets/images/foto_anggota/<?php echo $anggota['foto_anggota']; ?>" width="100"></td>
                <td>
                  <a href="?halaman=detail_anggota&id=<?php echo $anggota['id_anggota']; ?>" class="btn btn-info px-3 py-2"><i class="fa fa-search"></i></a>
                  <a href="?halaman=ubah_anggota&id=<?php echo $anggota['id_anggota']; ?>" class="btn btn-warning px-3 py-2"><i class="fa fa-edit"></i></a>
                 <a href="?halaman=hapus_anggota&id=<?php echo $anggota['id_anggota']; ?>" class="btn btn-danger px-3 py-2"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              <?php $no++; } ?>
            </tbody>
          </table>
        </div>

        </div>
      </div>
    </div>
  </div>
</div>

