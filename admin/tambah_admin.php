<?php
session_start();
include 'head_admin.php';
include 'config/config.php';

if (isset($_POST['simpan'])) {
  $nama_admin = $_POST['nama_admin'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = sha1($password);

  $nama   = $_FILES['foto']['name'];
  $size   = $_FILES['foto']['size'];
  $error  = $_FILES['foto']['error'];
  $asal   = $_FILES['foto']['tmp_name'];

  $lokasi = "img/foto/" . $nama;
  $format = pathinfo($nama, PATHINFO_EXTENSION);

  if ($error === 0) {

    if ($size > 9000) {

      if ($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG") {

        if (simpandataadmin($nama_admin, $email, $password, $lokasi)) {
          echo "<script>alert('Data Admin berhasil di Tambahkan')</script>";
          echo "<script>window.location.href='data_admin.php'</script>";
        } else {
          echo "Error: " . $query . "<br>" . mysqli_error($konek);
        }
        move_uploaded_file($asal, "img/foto/" . $nama);
      } else {
        echo "Maaf format filenya harus jpg/png ";
      }
    } else {
      echo "file terlalu besar";
    }
  } else "Ada kesalahan saat upload";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Data Amil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">[+] Data Amil</li>
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
              <h3 class="card-title">Tambah Data Amil</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form id="quickForm" action="" method="post" enctype="multipart/form-data">
              <div class="container">
                <div class="row">
                  <div class="col-md-5 my-3">
                    <div class="form-group">
                      <label>Nama Amil</label>
                      <input type="text" name="nama_admin" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Email</label>
                      <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Password</label>
                      <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                      <label>Masukan Foto</label>
                      <input type="file" name="foto" class="form-control">
                    </div>
                    <input type="submit" name="simpan" class="btn btn-success" value="Simpan Data">
                    <a href="data_admin.php" class="btn btn-primary">Kembali</a>
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