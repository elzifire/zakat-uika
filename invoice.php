<?php
include 'header_user.php';
if (empty($id = $_SESSION['iduser'])) {
    echo "<script>document.location.href = 'index.php';</script>";
}
$result = tampiltransaksiperstatus($id);
?>
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="js/jquery.min.js"></script>
<!-- Bootstrap -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<div class="container">
    <?php
    if ($a = mysqli_fetch_assoc($result)) {
        ?>

    <h1>Pembayaran Zakat <b style="color: blue;">No#<?= $a['no_transaksi'] ?></b></h1>



 <br>

    Dear <?= ucwords($a['nama']) ?>
    <p>Segera lakukan pembayaran sesuai dengan yang ada pada data dibawah ini</p>
    <div class="panel panel-default col-8">
        <div class="panel-heading">Pembayaran Zakat</div>
        <div class="panel-body">

            <table class="table table-striped">
                <tr>
                    <td>Nama</td>
                    <td><?= $a['nama'] ?></td>
                </tr>

                <tr>
                    <td>Jenis Zakat</td>
                    <td><?= $a['jenis_transaksi'] ?></td>
                </tr>

                <tr>
                    <td>Jumlah Pembayaran</td>
                    <td>Rp. <?= rupiah($a['jumlah_bayar']) ?></td>
                </tr>

                <tr>
                    <td>Metode Bayar</td>
                    <td> <?=  $a['metode_bayar'] ?></td>
                </tr>
                <tr>
                    <td> </td>
                    <td>atas nama Yayasan Masjid Ibn Khaldun </td>
                </tr>
                <tr>
                    <td>Tanggal</td>
                    <td> <?= date('d-F-Y') ?></td>
                </tr>
            </table>
        </div>
    </div>
    <b>Catatan : </b>
    <p>Jika sudah melakukan pembayaran, silahkan lakukan konfirmasi pembayaran pada menu Profil</p>
    <a href="profil.php" class="btn btn-primary">Konfirmasi Pembayaran</a>
    <a href="generate_pdf.php" class="btn btn-success">Download PDF</a>
</div>
<br>
<?php include 'sidebar.php'; ?>
<?php }
include 'footer_user.php';
?>
