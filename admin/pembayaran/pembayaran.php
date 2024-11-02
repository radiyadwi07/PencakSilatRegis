<div class="header pb-6" style="margin-bottom: 110px;">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="?halaman=beranda"><i class="fas fa-home"></i> Beranda Admin</a></li>
              <li class="breadcrumb-item active" aria-current="page">Data Transaksi</li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- <a href="?halaman=tambah_kejuaraan" class="btn btn-primary mb-4"><i class="fas fa-plus"></i> Tambah Kejuaraan</a> -->
      <div class="card">
        <div class="card-header border-0">
          <h2 class="mb-0 text-center text-uppercase">Data Transaksi Pembayaran</h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table align-items-center table-flush" id="myTable">
              <thead class="thead-light text-center">
                <tr>
                  <th width="1">No.</th>
                  <th>Nia</th>
                  <th>Nama Lengkap</th>
                  <th>Email</th>
                  <th>No.Telp</th>
                  <th>Total</th>
                  <th>Catatan</th>
                  <th>Tgl.Transaksi</th>
                  <th>Bukti</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
                $no = 1;
                $query = $koneksi->query("SELECT * FROM transaksi ORDER BY nia DESC");
                while($transaksi = $query->fetch_assoc()) {
                ?>
                <tr>
                  <td><?php echo $no; ?></td>
                  <td><?php echo $transaksi['nia']; ?></td>
                  <td><?php echo $transaksi['nama_lengkap']; ?></td>
                  <td><?php echo $transaksi['email']; ?></td>
                  <td><?php echo $transaksi['no_telp']; ?></td>
                  <td><?php echo $transaksi['total']; ?></td>
                  <td><?php echo $transaksi['catatan']; ?></td>
                  <td><?php echo date('d-m-Y',strtotime($transaksi['tgl_transaksi'])); ?></td>
                  <td><img src="../assets/images/foto_pembayaran/<?php echo $transaksi['foto_bukti']; ?>" width="100"></td>
                  <!-- <td>
                    <a href="?halaman=ubah_kejuaraan&id=<?php echo $transaksi['id_kejuaraan']; ?>" class="btn btn-warning px-3 py-2"><i class="fa fa-edit"></i></a>
                    <a href="?halaman=hapus_kejuaraan&id=<?php echo $transaksi['id_kejuaraan']; ?>" class="btn btn-danger px-3 py-2"><i class="fa fa-trash"></i></a>
                  </td> -->
                  <td>
                  <a href=""class="btn btn-primary px-3 py-2">Konfirmasi Pembayaran</a>
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

