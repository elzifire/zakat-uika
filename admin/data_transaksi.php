<?php
session_start();
include 'head_admin.php';
include 'config/config.php';
$result = tampilmustahiq();
$result = tampildatatransaksi();
$result2 = tampiljumlahtransaksiperid();
?>

<script src="dist/sweet/sweetalert.min.js"></script>
<link rel="stylesheet" href="dist/sweet/sweetalert.css">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Transaksi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Data Transaksi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <div class="small-box bg-info">
                <div class="inner">
                  <?php while ($d = mysqli_fetch_assoc($result2)) { ?>
                    <h2>Rp. <?= rupiah($d['jumlah']); ?></h2>
                  <?php } ?>
                  <p>Total Pemasukan Zakat</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bar"></i>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="tabel1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Nomor</th>
                    <th>Nomor Transaksi</th>
                    <th>Nama Muzakki</th>
                    <th>Jenis Transaksi Zakat</th>
                    <th>Jumlah Pembayaran</th>
                    <th>Status</th>
                    <th>Cek Pembayaran</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no = 1;
                  while ($data = mysqli_fetch_assoc($result)) {
                  ?>
                    <tr>
                      <td><?php echo  $no; ?></td>
                      <td><?php echo  $data['no_transaksi']; ?></td>
                      <td><?php echo  $data['nama']; ?></td>
                      <td><?php echo  $data['jenis_transaksi']; ?></td>
                      <td>Rp. <?php echo  rupiah($data['jumlah_bayar']); ?></td>
                      <td><?php if ($data['status'] == "1") {
                            echo "<p class='btn btn-warning'>Menunggu Konfirmasi</p>";
                          } elseif ($data['status'] == "2") {
                            echo "<p class='btn btn-success'>Lunas</a>";
                          } else {
                            echo "<p class='btn btn-danger'>Di Tolak</a>";
                          } ?>
                      </td>
                      <td><a href="cek_transaksi.php?id=<?= $data['id']; ?>" class="btn btn-primary btn-primary"><span class="glyphicon glyphicon-edit"></span> Periksa</a></td>
                    </tr>
                    </tfoot>
                  <?php
                    $no++;
                  }
                  ?>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-light">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
<?php include 'foot_admin.php'; ?>