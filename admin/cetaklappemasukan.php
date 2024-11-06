<?php
session_start();
include 'config/config.php';
require_once __DIR__ . '/mpdf/vendor/autoload.php';
$nama_dokumen = 'Laporan Pemasukan Zakat' . date('dFy');
$mpdf = new \Mpdf\Mpdf();
ob_start();

if (isset($_POST['lihat'])) {
    $tglawal = $_POST['tglawal'];
    $tglakhir = $_POST['tglakhir'];
    global $konek;
    $sql = "SELECT * FROM transaksi WHERE tgl_bayar BETWEEN '$tglawal' and '$tglakhir'";
    $query = mysqli_query($konek, $sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pemasukan Zakat</title>
</head>

<body>
    <div class="header">
        <table width="100%">
            <tr>
                <td><img src="../img/logo/logo.png" width="100px"></td>
                <td align="center"> 
                    <h3>Dewan Kemakmuran Masjid Ibn Khaldun UIKA</h3>
                    <p>Jl. K. H. Sholeh Iskandar Km. 2 Kedung Badak Tanah Sareal. Bogor - Jawa Barat - Indonesia </p>
                </td>
            </tr>
        </table>
        <hr />
    </div>
    <div class="col-12">
        <h2 align="center">Laporan Pemasukan Zakat </h2><br>
        <center>Periode : <?php echo "<b>" . $tglawal . "</b>" ?> Sampai : <?php echo "<b>" . $tglakhir . "</b>" ?></center><br>
        Dicetak oleh Admin : <?= $_SESSION['nama_admin']; ?> |
        
        
        Tanggal <?= date('d-F-Y') ?>


        <br><br>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No</th>
                <th>Nomor Transaksi</th>
                <th>Nama</th>
                <th>Jenis Zakat</th>
                <th>Jumlah Bayar</th>
                <th>Metode Pembayaran</th>
                <th>No Rekening</th>
                <th>Atas Nama</th>
                <th>Konfirmasi Bayar</th>
                <th>Tgl Bayar</th>
                <th>Keterangan</th>
            </tr>
            <?php

            $no = 1;
            while ($a = mysqli_fetch_assoc($query)) {

            ?>

                <tr>
                    <td><?php echo  $no; ?></td>
                    <td><?php echo  $a['no_transaksi']; ?></td>
                    <td><?php echo  $a['nama']; ?></td>
                    <td><?php echo  $a['jenis_transaksi']; ?></td>
                    <td><?php echo  rupiah($a['jumlah_bayar']); ?></td>
                    <td><?php echo  $a['metode_bayar']; ?></td>
                    <td><?php echo  $a['no_rekening']; ?></td>
                    <td><?php echo  $a['atas_nama']; ?></td>
                    <td><?php echo  $a['jumlah_bayar_konfirmasi']; ?></td>
                    <td><?php echo  $a['tgl_bayar']; ?></td>
                    <td><?php echo  $a['keterangan']; ?></td>
                </tr>
            <?php
                $no++;
            }
            ?>

            </tbody>
        </table>
    </div>
</body>

</html>
<?php
$html = ob_get_contents();
ob_end_clean();
$mpdf->WriteHTML(utf8_encode($html));
$mpdf->Output($nama_dokumen . ".pdf", 'I');
?>