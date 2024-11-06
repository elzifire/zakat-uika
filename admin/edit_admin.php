<?php
session_start();
include 'head_admin.php';
include 'config/config.php';

$id = $_GET['id'];
$result = tampiladminperid($id);

if (isset($_POST['submit'])) {
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

  if (!empty($nama)) {
    if ($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG") {

      if (editadmin_image($lokasi, $id)) {
        echo "<script>alert('Data Admin berhasil di edit !')</script>";
        echo "<script>document.location.href = 'data_admin.php';</script>";
      } else {
        echo "Error" . mysqli_error($konek);
      }

      move_uploaded_file($asal, "img/foto/" . $nama);
    } else {
      echo "Maaf format filenya harus jpg/png ";
    }
  } else {
    if (editadmin($nama_admin, $email, $id)) {
      echo "<script>alert('Data Admin berhasil di edit !')</script>";
      echo "<script>document.location.href = 'data_admin.php';</script>";
    } else {
      echo "Error" . mysqli_error($konek);
    }
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
          <h1 class="m-0">Edit Data Amil</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Edit Data Amil</li>
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
              <h3 class="card-title">Edit Data Amil</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="" method="post" enctype="multipart/form-data">
              <?php while ($a = mysqli_fetch_assoc($result)) { ?>
                <div class="container">
                  <div class="row">
                    <div class="col-md-5 my-3">
                      <div class="form-group">
                        <label>Nama Amil</label>
                        <input type="text" name="nama_admin" class="form-control" value="<?= $a['nama_admin'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" value="<?= $a['email'] ?>">
                      </div>
                      <div class="form-group">
                        <input type="file" name="foto" value="<?= $a['foto'] ?>">
                      </div>
                      <button type="submit" name="submit" class="btn btn-success">Simpan Data</button>
                      <a href="data_admin.php" class="btn btn-primary">Kembali</a>
                    </div>
                  </div>
                <?php } ?>
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

<?php include 'foot_admin.php'; ?>