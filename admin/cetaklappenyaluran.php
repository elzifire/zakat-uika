<?php
session_start();
include 'config/config.php';
require_once __DIR__ . '/mpdf/vendor/autoload.php';
$nama_dokumen = 'Laporan Penyaluran Zakat' . date('dFy');
$mpdf = new \Mpdf\Mpdf();
ob_start();

if (isset($_POST['lihat'])) {
    $tglawal = $_POST['tglawal'];
    $tglakhir = $_POST['tglakhir'];
    global $konek;
    $sql = "SELECT * FROM mustahiq WHERE tgl_penyaluran BETWEEN '$tglawal' and '$tglakhir'";
    $query = mysqli_query($konek, $sql);
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Laporan Penyaluran Zakat</title>
</head>

<body>
    <div class="header">
        <table width="100%">
            <tr>
                <td><img src="../img/logo/logo.png" width="100px"></td>
                <td align="center">
                    <h3>Dewan Kemakmuran Masjid Ibn Khaldun UIKA </h3>
                    <p>Jl. K. H. Sholeh Iskandar Km. 2 Kedung Badak Tanah Sareal. Bogor - Jawa Barat - Indonesia </p>
                </td>
            </tr>
        </table>
        <hr />
    </div>
    <div class="col-12">
        <h2 align="center">Laporan Penyaluran Zakat kepada Mustahiq</h2><br>
        <center>Periode : <?php echo "<b>" . $tglawal . "</b>" ?> Sampai : <?php echo "<b>" . $tglakhir . "</b>" ?></center><br>
        Dicetak oleh Admin : <?= $_SESSION['nama_admin']; ?> | Tanggal <?= date('d-F-Y') ?>
        <br><br>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>Nomor</th>
                <th>Nama Mustahiq</th>
                <th>Nama Yayasan</th>
                <th>Alamat</th>
                <th>Jumlah Penyaluran Zakat</th>
                <th>Tgl Penyaluran</th>
                <th>Nama Amil</th>
            </tr>
            <?php

            $no = 1;
            while ($a = mysqli_fetch_assoc($query)) {

            ?>

                <tr>
                    <td><?php echo  $no; ?></td>
                    <td><?php echo  $a['nama_penerima']; ?></td>
                    <td><?php echo  $a['nama_yayasan']; ?></td>
                    <td><?php echo  $a['alamat']; ?></td>
                    <td><?php echo  rupiah($a['jumlah_zakat']); ?></td>
                    <td><?php echo  $a['tgl_penyaluran']; ?></td>
                    <td><?php echo  $a['nama_amil']; ?></td>
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