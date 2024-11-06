<?php
include 'header_user.php';
if (empty($_SESSION['iduser'])) { ?>
	<script>
		document.location.href = 'index.php';
	</script>

<?php } else {

	$id = $_SESSION['iduser'];
	$result = tampilprofil($id);

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
					echo "<script>document.location.href='profil.php'</script>";
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
	</div>
	</div>
	</div>
	<div class="container">
		<div class="page-header">
			<center>
				<p class="lead">Ubah Password</p>
			</center>
		</div>


		<div class="col-md-12">
			<div class="well">
				<!-- Content Header (Page header) -->
				<!-- Main content -->
				<form action="" method="post">
					<?php while ($a = mysqli_fetch_assoc($result)) { ?>
						<div class="container">
							<div class="row">
								<div class="col-md-12">
									<div class="header">
										<h3>Ubah Password : <?= $a['namalengkap'] ?></h3>
										<hr>
									</div>
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
									<a href="profil.php" class="btn btn-primary">Kembali</a>
								</div>
							</div>
						<?php } ?>
				</form>
			</div>
			<section class="content">
			</section>
		</div>





	<?php }

include 'footer_user.php'; ?>