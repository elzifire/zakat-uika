<?php
include 'header_user.php';

if (empty($_SESSION['iduser'])) { ?>
	<script>
		document.location.href = 'index.php';
	</script>
<?php } else {
	unset($_SESSION['a']);

	$id = $_SESSION['iduser'];
	$result = tampilprofil($id);
	$result2 = tampiltransaksiperid($id);
	$result3 = tampiljumlahbayarperid($id);
	$result4 = tampiltransaksikonfirmasi($id);
	$result5 = tampiltransaksigagal($id);
?>
	<style>
		.profil {
			clear: both;
		}

		#profile {
			background-color: #00aeef;
			border: 0px;
		}

		.well {
			background-color: white;
			border: 1px solid black;
		}

		#edit {
			background-color: #022646;
		}

		.col-sm-5 {
			display: none;
		}

		.nav-tabs>li.active>a,
		.nav-tabs>li.active>a:focus,
		.nav-tabs>li.active>a:hover {
			background-color: #42b549;
			color: white;
		}
	</style>

	<link rel="stylesheet" type="text/css" href="admin/media/css/dataTables.bootstrap.css">
	<?php
	$tempdir = "img/qrcode/"; //<-- Nama Folder file QR Code kita nantinya akan disimpan
	if (!file_exists($tempdir)) #kalau folder belum ada, maka buat.
		mkdir($tempdir);
	?>

	<ul class="nav nav-tabs my-2">
		<li class="active"><a data-toggle="tab" href="#home">Profil</a></li>
		<li><a data-toggle="tab" href="#menu1">Zakat Anda <?php $total = mysqli_num_rows($result2);
															echo "<strong>" . $total . "</strong>"; ?></a></li>
		<li><a data-toggle="tab" href="#menu2">Konfirmasi Zakat
				<?php $total = mysqli_num_rows($result4);
				echo "<strong>" . $total . "</strong>"; ?></a></li>
		<li><a data-toggle="tab" href="#menu3">Transaksi Di Tolak <?php $total = mysqli_num_rows($result5);
																	echo "<strong>" . $total . "</strong>"; ?></a></li>
	</ul>

	<div class="tab-content">
		<div id="home" class="tab-pane active">
			<div class="panel panel-default">
				<div class="panel-heading">Profil <?= $_SESSION['namalengkap'] ?></div>
				<div class="panel-body">
					<div class="col-md-3">
						<?php while ($row = mysqli_fetch_Assoc($result)) { ?>
							<img width='140' height='160' src='<?php echo $row['foto_profil'] ?>'>
					</div>

					<div class="col-md-9">
						<p>
						<h3><?= ucwords($row['namalengkap']) ?></h3>
						</p>

						<p><span class="glyphicon glyphicon-envelope"></span> <?= $row['email']; ?></p>
						<p><span class="glyphicon glyphicon-home"></span> <?= $row['alamat']; ?></p>
						<p><span class="glyphicon glyphicon-earphone"></span> +<?= $row['no_tlp']; ?></p>
						<a href="editprofile.php?no=<?= $row['id_user']; ?>"><button type="submit" name="edit" class="btn btn-success"><span class="glyphicon glyphicon-cog"></span> Edit Profil</button></a>
						<a href="ubah_password.php?no=<?= $row['id_user']; ?>"><button type="submit" name="simpan" class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> Ubah Password</button></a>

					<?php } ?>
					</div>

				</div>
			</div>
		</div>
		<div id="menu1" class="tab-pane fade">
			<?php while ($d = mysqli_fetch_assoc($result3)) { ?>
				<div class="panel panel-default">
					<div class="panel-heading">Total Zakat Anda Rp. <?= rupiah($d['jumlah']); ?>

					<?php } ?>
					</div>

					<div class="panel-body">

						<table id="transaksi" class="table table-bordered">
							<thead>
								<tr>
									<th>No</th>
									<th>Nomor Transaksi</th>
									<th>Nama</th>
									<th>Jenis Transaksi</th>
									<th>Jumlah Bayar</th>
									<th>Status</th>
								</tr>
							</thead>

							<tbody>
								<?php

								$no = 1;
								while ($a = mysqli_fetch_assoc($result2)) {

								?>
									<tr>
										<td><?php echo  $no; ?></td>
										<td><?php echo  $a['no_transaksi']; ?></td>
										<td><?php echo  $a['nama']; ?></td>
										<td><?php echo  $a['jenis_transaksi']; ?></td>
										<td>Rp. <?php echo  rupiah($a['jumlah_bayar']); ?></td>
										<td>
											<a href="#"class="btn btn-success aku"><span class="glyphicon glyphicon-ok"></span> Lunas</a>
											<a href="cetakbuktitransaksi.php?no=<?= $a['no_transaksi'];?>"class="btn btn-success"><span class="glyphicon glyphicon-print"></span>Cetak</a>
										</td>
									</tr>
								<?php
									$no++;
								}
								?>

							</tbody>
						</table>
					</div>
				</div>
				<script>
					$(function() {
						$(document).on('click', '.aku', function(e) {
							e.preventDefault();
							$("#myModal").modal('show');
							$.post('tampilmodal.php', {
									id: $(this).attr('data')
								},
								function(html) {
									$(".modal-body").html(html);
								}
							);
						});
					});
				</script>

				<div id="myModal" class="modal fade" role="dialog">
					<div class="modal-dialog">

						<!-- Modal content-->
						<div class="modal-content">
							<div class="modal-header">
								<button type="button" class="close" data-dismiss="modal">&times;</button>
								<h4 class="modal-title">Bukti Transaksi</h4>
							</div>
							<div class="modal-body">

							</div>

						</div>

					</div>
				</div>


		</div>

		<div id="menu2" class="tab-pane fade">
			<div class="panel panel-default">
				<div class="panel-heading">Konfirmasi Pembayaran Zakat</div>
				<div class="panel-body">

					<table id="konfirmasi" class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nomor Transaksi</th>
								<th>Nama</th>
								<th>Jenis Transaksi</th>
								<th>Jumlah Bayar</th>
								<th>Status</th>
							</tr>
						</thead>

						<tbody>
							<?php

							$no = 1;
							while ($a = mysqli_fetch_assoc($result4)) {

							?>

								<tr>
									<td><?php echo  $no; ?></td>
									<td><?php echo  $a['no_transaksi']; ?></td>
									<td><?php echo  $a['nama']; ?></td>
									<td><?php echo  $a['jenis_transaksi']; ?></td>
									<td>Rp. <?php echo  rupiah($a['jumlah_bayar']); ?></td>
									<td><?php if ($a['status'] == "0") {
											echo "<a href='konfirmasi_bayar.php' class='btn btn-primary'>Konfirmasi Pembayaran</a>";
										} ?>
									</td>
								</tr>
							<?php
								$no++;
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="menu3" class="tab-pane fade">
			<div class="panel panel-default">
				<div class="panel-heading">Pembayaran Ditolak</div>
				<div class="panel-body">
					<table id="ditolak" class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Nomor Transaksi</th>
								<th>Nama</th>
								<th>Jenis Transaksi</th>
								<th>Jumlah Bayar</th>
								<th>Status</th>
							</tr>
						</thead>

						<tbody>
							<?php

							$no = 1;
							while ($a = mysqli_fetch_assoc($result5)) {

							?>

								<tr>
									<td><?php echo  $no; ?></td>
									<td><?php echo  $a['no_transaksi']; ?></td>
									<td><?php echo  $a['nama']; ?></td>
									<td><?php echo  $a['jenis_transaksi']; ?></td>
									<td>Rp. <?php echo  rupiah($a['jumlah_bayar']); ?></td>
									<td><?php if ($a['status'] == "3") {
											echo "<p class='btn btn-danger'><span class='glyphicon glyphicon-remove'></span>Di Tolak</a>";
										} ?>
									</td>
								</tr>
							<?php
								$no++;
							}
							?>

						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>


	<!--<img src="img/qrcode/coba.png" alt="">-->



	<?php include 'sidebar.php'; ?>
	</div>
	</div>
	</div>





	<script src="admin/media/js/jquery.dataTables.min.js"></script>
	<script src="admin/media/js/dataTables.bootstrap.js"></script>
	<script>
		$(document).ready(function() {
			$('#transaksi').DataTable({

			});
		});

		$(document).ready(function() {
			$('#konfirmasi').DataTable({

			});
		});

		$(document).ready(function() {
			$('#ditolak').DataTable({

			});
		});
	</script>


<?php }
include 'footer_user.php'; ?>