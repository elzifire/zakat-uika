<?php 
session_start();
include 'head_admin.php';
include 'config/config.php'; 

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Laporan Penyaluran Zakat</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">Cetak Laporan Penyaluran Zakat</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Masukan tanggal awal dan tanggal akhir</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
        <form action="cetaklappenyaluran.php" method="post" target="blank">
            <div class="row">
                <div class="col-md-5 my-3 ml-3">
                    <div class="form-group">
                        <label >Tanggal Awal</label>
                        <input type="date" name="tglawal" class="form-control">
                    </div>
                    <div class="form-group">
                        <label >Tanggal Akhir</label>
                        <input type="date" name="tglakhir" class="form-control">
                    </div>
                    <input class="btn btn-primary" type="submit" name="lihat" value="Lihat">
                </div>
            </div>
        </form>
        </div>
            <!-- /.card -->
            </div>
          <!--/.col (left) -->
          <!-- right column -->
          <div class="col-md-6">
          </div>
          <!--/.col (right) -->
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
<?php include 'foot_admin.php'; ?>