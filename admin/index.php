<?php 
session_start();
if(!isset($_SESSION['idadmin'])){
  header('location: login.php');
}
include 'head_admin.php'; 
include 'config/config.php';
$result = totalpemasukan_zakat();
$result_penyaluran = totalpenyaluran_zakat();
?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-10">
            <h2 class="text-left">Selamat Datang Admin : <i class="text-primary"><?php echo $_SESSION['nama_admin']?></i></h2>
          </div><!-- /.col -->
          <div class="col-sm-2">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Dashboard</li>
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
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-info">
              <div class="inner">
                <?php while ($a = mysqli_fetch_assoc($result)) { ?>
                <h2><?php echo "Rp. " . rupiah($pemasukan = $a['totalpemasukan']) ?></h2>
                <?php } ?>
                <p>Pemasukan Zakat</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bar"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <?php while ($b = mysqli_fetch_assoc($result_penyaluran)) { ?>
                <h2><?php echo "Rp. " . rupiah($pengeluaran = $b['jumlah']) ?></h2>
                <?php } ?>
                <p>Penyaluran Zakat</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-4 col-6">
            <!-- small card -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h2><?php $total = ($pemasukan - $pengeluaran);
                echo "Rp. " . rupiah($total) ?></h2>
                <p>Total Kas Zakat</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
  <!-- Main Footer -->
<?php  include 'foot_admin.php'; ?>
