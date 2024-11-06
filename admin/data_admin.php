<?php 
session_start();
include 'head_admin.php';
include 'config/config.php'; 
$result=tampiladmin();
?>

<script src="dist/sweet/sweetalert.min.js"></script>
<link rel="stylesheet" href="dist/sweet/sweetalert.css">
<link rel="stylesheet" type="text/css" href="media/css/dataTables.bootstrap.css">
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Amil</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Amil</li>
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
                <a href="tambah_admin.php" name="simpan" class="btn btn-primary">Tambah Data</a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabel2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Amil</th>
                    <th>email</th>
                    <th>Foto</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                    $no = 1;
                    while ($data = mysqli_fetch_assoc($result)) {
                  ?>
                  <tr>
                    <td><?php echo  $no;?></td>
                    <td><?php echo  $data['nama_admin']; ?></td>
                    <td><?php echo  $data['email']; ?></td>
                    <td><img src="<?php echo $data['foto']; ?>" style="width:100px;height:100px;"></td>
                    <td>
                      <a href="edit_admin.php?id=<?= $data['id'];?>" name="simpan" class="btn btn-primary">Edit data</a>
                      <a href="ubahpassword_amil.php?id=<?= $data['id'];?>" name="simpan" class="btn btn-warning">Ubah Password</a>
                      <a href="hapus_admin.php?id=<?= $data['id'];?>" class="btn btn-danger" onclick="return confirm('Apakah anda yakin menghapus <?=$data['nama_admin']; ?> ?')">Hapus</a>
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

