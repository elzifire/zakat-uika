<?php include 'config/config.php';
if(empty($no=$_GET['no'])){
	echo "<script>window.location.href='profil.php'</script>";
}
$result=tampilpernotransaksi($no);
?>
<script>
  function loadprint(){
  window.print();
}
</script>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Invoice</title>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
  </head>
	<body onload="loadprint()">
 
				<div class="container">
				<?php
					while ($a = mysqli_fetch_assoc($result)) {
			    ?>
			  
				<h1>Bukti Pembayaran <b style="color: blue;">No#<?= $a['no_transaksi']?></b></h1>

			    Dear <?= ucwords($a['nama']) ?>
			  <p>Terima kasih atas kepercayaan Anda bertransaksi melalui Laznas Dewan Da'wah Lampung </p>
				<div class="panel panel-default">
				<div class="panel-heading">Bukti Pembayaran</div>
				<div class="panel-body">

					<table class="table table-striped">

			                <tr>
			                	<td>Nama</td>
		                    	<td><?= $a['nama'] ?></td>
		                    </tr>

		                    <tr>
		                    	<td>Jenis Transaksi</td>
		                    	<td><?= $a['jenis_transaksi'] ?></td>
		                    </tr>

		                    <tr>
		                    	<td>Jumlah Pembayaran</td>
		                    	<td>Rp. <?= rupiah($a['jumlah_bayar']) ?></td>
		                    </tr>

		                    <tr>
		                    	<td>Metode Pembayaran</td>
		                    	<td><?= $a['metode_bayar'] ?></td>
		                    </tr>

		                    <tr>
		                    	<td>No rekening</td>
		                    	<td><?= $a['no_rekening'] ?></td>
		                    </tr>

		                    <tr>
		                    	<td>Atas Nama</td>
		                    	<td><?= $a['atas_nama'] ?></td>
		                    </tr>

		                    <tr>
		                    	<td>Tanggal Pembayaran</td>
		                    	<td><?= $a['tgl_bayar'] ?></td>
		                    </tr>

		                    <tr>
		                    	<td>Keterangan</td>
		                    	<td><?= $a['keterangan'] ?></td>
		                    </tr>

		                    <?php
		         		    }
		                    ?>
		            </table> 
		          </div>

		        </div>
		
		          <b>Catatan</b>
		          <p>Bukti Transaksi ini adalah sah dicetak oleh sistem kami tanpa perlu tanda tangan</p>

		          <p>Di Cetak Pada <?php date_default_timezone_set("Asia/Jakarta");
 echo date('Y-m-d h:i:s') ?></p>