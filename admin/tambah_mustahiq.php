<?php
session_start();
include 'head_admin.php';
include 'config/config.php';

$result = tampilmustahiq();

if (isset($_POST['simpan'])) {
	$namapenerima = $_POST['nama'];
	$namayayasan = $_POST['yayasan'];
	$alamat = $_POST['alamat'];
	$jumlah = $_POST['jumlah'];
	$tgl = $_POST['tgl'];
	$amil = $_POST['nama_amil'];

	if (simpandatamustahiq($namapenerima, $namayayasan, $alamat, $jumlah, $tgl, $amil)) {
		echo "<script>alert('Tambah data Mustahiq berhasil !')</script>";
		echo "<script>window.location.href='data_mustahiq.php'</script>";
	} else {
		echo "<script>alert('Gagal')</script>";
	}
}

?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Tambah Data Mustahiq</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item active">[+] Data Mustahiq</li>
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
          <!-- left column -->
          <div class="col-md-12">
            <!-- jquery validation -->
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Tambah Data Mustahiq</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
      <form  id="quickForm" action="" method="post">
		<div class="container">
			<div class="row">
				<div class="col-md-5 my-3">
					<div class="form-group">
						<label>Nama Penerima</label>
						<input type="text" name="nama" class="form-control">
					</div>
					<div class="form-group">
						<label>Nama Yayasan</label>
						<input type="text" name="yayasan" class="form-control">
					</div>

					<div class="form-group">
						<label>Alamat Penerima</label>
						<textarea name="alamat" id="" class="form-control" cols="10" rows="3"></textarea>
					</div>

					<div class="form-group">
						<label>Jumlah Penyaluran Zakat</label>
						<input type="number" name="jumlah" class="form-control">
					</div>

					<div class="form-group">
						<label>Tanggal Penyaluran</label>
						<input type="date" name="tgl" class="form-control">
					</div>

					<div class="form-group">
						<label>Nama Amil</label>
						<input type="text" name="nama_amil" value="<?= $_SESSION['nama_admin']; ?>" readonly class="form-control">
					</div>
					<input type="submit" name="simpan" class="btn btn-success" value="Simpan Data">
					<a href="data_mustahiq.php" class="btn btn-primary">Kembali</a>
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
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
<?php include 'foot_admin.php'; ?>