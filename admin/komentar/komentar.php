<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Komentar</li>
            </ol>
          </nav>
        </div>
      </div>
      <div class="card">
        <div class="card-header border-0">
        <h2 class="mb-0 text-center text-uppercase">Data Komentar</h2>
        </div>
        <div class="card-body">
        <div class="table-responsive">
          <table class="table align-items-center table-flush" id="myTable">
            <thead class="thead-light text-center">
              <tr>
                <th width="1">No.</th>
                <th>Nama Komentar</th>
                <th>Komentar</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody class="text-center">
              <?php 
              $no = 1;
              $query = $koneksi->query("SELECT * FROM komentar ORDER BY id_komen ASC");
              while($komentar = $query->fetch_assoc()) {
              ?>
              <tr>
                <td><?php echo $no; ?>.</td>
                <td><?php echo $komentar['nama_anggota']; ?></td>
                <td><?php echo $komentar['komentar']; ?></td>
                <td>
                  <a href="?halaman=hapus_komentar&id=<?php echo $komentar['id_komen']; ?>" class="btn btn-danger px-3 py-2"><i class="fa fa-trash"></i></a>
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

