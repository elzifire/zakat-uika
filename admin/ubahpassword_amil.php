<?php
session_start();
include 'head_admin.php';
include 'config/config.php';

$id = $_GET['id'];
$result = tampiladminperid($id);

if (isset($_POST['simpan'])) {
  $password = $_POST['password'];
  $password = sha1($password);
  $hidden = $_POST['hidden'];
  $passwordnew = $_POST['passwordnew'];
  $konfirmpassword = $_POST['konfirmpassword'];
  if ($password == $hidden) {

    if ($passwordnew == $konfirmpassword) {
      $passwordnew = sha1($passwordnew);

      if (editpassword($passwordnew, $id)) {
        echo "<script>alert('Berhasil')</script>";
        echo "<script>document.location.href='data_admin.php'</script>";
      } else {
        echo "<script>alert('Gagal')</script>";
      }
    } else {
      echo "<script>alert('Konfirmasi Password Anda Salah')</script>";
    }
  } else {
    echo "<script>alert('Password Lama Anda Salah')</script>";
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
          <h1 class="m-0">Ubah Password</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item active">Ubah Password</li>
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
          <?php while ($a = mysqli_fetch_assoc($result)) { ?>
            <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Ubah Password Amil : <?= $a['nama_admin'] ?></h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="container">
                  <div class="row">
                    <div class="col-md-5 my-3">
                      <div class="form-group">
                        <label>Password Lama</label>
                        <input type="password" name="password" class="form-control">
                      </div>
                      <div class="form-group">
                        <input type="hidden" name="hidden" class="form-control" value="<?= $a['password'] ?>">
                      </div>
                      <div class="form-group">
                        <label>Password Baru</label>
                        <input type="password" name="passwordnew" class="form-control">
                      </div>

                      <div class="form-group">
                        <label>Konfirmasi Password Baru</label>
                        <input type="password" name="konfirmpassword" class="form-control">
                      </div>
                      <input type="submit" name="simpan" class="btn btn-success" value="Simpan Data">
                      <a href="index.php" class="btn btn-primary">Kembali</a>
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