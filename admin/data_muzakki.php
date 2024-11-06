<?php 
session_start();
include 'head_admin.php';
include 'config/config.php'; 
$result=tampilmuzakki();
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
            <h1 class="m-0">Data Muzakki</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Data Muzakki</li>
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
              <!-- /.card-header -->
              <div class="card-body">
                <table id="tabel2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>Nomor</th>
    		            <th>Nama Lengkap</th>
    		            <th>Email</th>
    		            <th>Alamat</th>
    		            <th>No Tlp</th>
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
    		            <td><?php echo  $data['namalengkap']; ?></td>
    		            <td><?php echo  $data['email']; ?></td>
    		            <td><?php echo  $data['alamat']; ?></td>
    		            <td><?php echo  $data['no_tlp']; ?></td>
    		            <td>
    		            <a href="hapusmuzakki.php?id=<?php echo  $data['id_user'];?>" class="btn btn-primary btn-danger" onclick="return confirm('Yakin akan menghapus data <?=$data['namalengkap']; ?> ?')"><span class="glyphicon glyphicon-remove"></span>Hapus</a>
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