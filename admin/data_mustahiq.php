<?php 
session_start();
include 'head_admin.php';
include 'config/config.php'; 
$result = tampilmustahiq();
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
            <h1 class="m-0">Data Mustahiq</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Mustahiq</li>
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
                <a href="tambah_mustahiq.php" name="simpan" class="btn btn-primary">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabel2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nomor</th>
          					<th>Nama penerima</th>
          					<th>Nama yayasan</th>
          					<th>Alamat</th>
          					<th>Jumlah Zakat</th>
          					<th>Tgl Penyaluran</th>
          					<th>Nama Amil</th>
		                <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <td><?php echo  $no; ?></td>
          					<td><?php echo  $data['nama_penerima']; ?></td>
          					<td><?php echo  $data['nama_yayasan']; ?></td>
          					<td><?php echo  $data['alamat']; ?></td>
          					<td>Rp. <?php echo  rupiah($data['jumlah_zakat']); ?></td>
          					<td><?php echo  $data['tgl_penyaluran']; ?></td>
          					<td><?php echo  $data['nama_amil']; ?></td>
          					<td>
          						<a href="edit_mustahiq.php?id=<?= $data['id']; ?>" name="simpan" class="btn btn-primary">Edit</a>
          						<a href="hapus_mustahiq.php?id=<?= $data['id']; ?>" name="simpan" class="btn btn-danger delete-link" onclick="return confirm('Yakin akan menghapus data <?=$data['nama_penerima']; ?> ?')">Hapus</a>
          					</td>
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