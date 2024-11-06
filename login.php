<?php include 'header_user.php';



if (isset($_POST['masuk'])) {
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = sha1($password);

  if (cekloginuser($email, $password)) { ?>
    <script>
      document.location.href = 'profil.php';
    </script>

<?php } else {
    echo "<div class='alert alert-danger'>
        <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        Email atau Password Anda Salah, Silahkan Ulangi Kembali !
      </div>";
  }
}
?>

<h1 class="my-5">
  <center>Silahkan Masuk</center>
</h1>
<br>
<hr>
<br>
<form class="form-horizontal mb-5" role="form" method="post">
  <div class="form-group">
    <label class="control-label col-sm-2" for="email">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" name="email" placeholder="Masukan Email" required autofocus>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-2" for="pwd">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" name="password" placeholder="Masukan Password" required>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" name="masuk" class="btn btn-success">MASUK</button>
      <a href="javascript:void(0)" onclick="window.history.back();" class="btn btn-danger box-title"> BATAL</a>
    </div>
  </div>
  <div class="mt-4 text-center">
    Belum punya akun? <a href="register.php"><b>Daftar</b></a>
  </div>
</form>

<?php include 'sidebar.php'; ?>

<?php include 'footer_user.php'; ?>