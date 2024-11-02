<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Galeri</li>
            </ol>
          </nav>
        </div>
      </div>
      <a href="?halaman=tambah_galeri" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Tambah Galeri</a>
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Data Galeri</h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light text-center">
                <tr>
                  <th width="1">No.</th>
                  <th>Nama Galeri</th>
                  <th>Tanggal Upload</th>
                  <th>Foto Galeri</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
                $no = 1;
                $query = $koneksi->query("SELECT * FROM galeri ORDER BY id_galeri DESC");
                while($galeri = $query->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $galeri['nama_galeri']; ?></td>
                  <td><?php echo date('d-m-Y',strtotime($galeri['tanggal'])); ?></td>
                  <td><img src="../assets/images/foto_galeri/<?php echo $galeri['gambar']; ?>" width="100"></td>
                  <td>
                    <a href="?halaman=ubah_galeri&id=<?php echo $galeri['id_galeri']; ?>" class="btn btn-warning px-3 py-2"><i class="fa fa-edit"></i></a>
                    <a href="?halaman=hapus_galeri&id=<?php echo $galeri['id_galeri']; ?>" class="btn btn-danger px-3 py-2"><i class="fa fa-trash"></i></a>
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

