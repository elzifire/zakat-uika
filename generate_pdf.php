<?php
require 'vendor/autoload.php'; // Pastikan path ke autoload Composer benar
use Dompdf\Dompdf;

session_start();
include 'config/konek.php';
include 'config/fungsi.php'; // Pastikan file fungsi.php ada di direktori yang benar

if (empty($id = $_SESSION['iduser'])) {
    echo "<script>document.location.href = 'index.php';</script>";
    exit;
}

$result = tampiltransaksiperstatus($id);

if ($a = mysqli_fetch_assoc($result)) {
    ob_start();
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Invoice Pembayaran</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            .panel {
                border: 1px solid #ddd;
                border-radius: 4px;
                margin-bottom: 20px;
                box-shadow: 0 1px 1px rgba(0, 0, 0, .05);
            }
            .panel-heading {
                padding: 10px 15px;
                border-bottom: 1px solid #ddd;
                border-top-left-radius: 3px;
                border-top-right-radius: 3px;
                background-color: #f5f5f5;
            }
            .panel-body {
                padding: 15px;
            }
            .table {
                width: 100%;
                max-width: 100%;
                margin-bottom: 20px;
                border-collapse: collapse;
            }
            .table td, .table th {
                padding: 8px;
                line-height: 1.42857143;
                vertical-align: top;
                border-top: 1px solid #ddd;
            }
            .table-striped > tbody > tr:nth-of-type(odd) {
                background-color: #f9f9f9;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <h1>Pembayaran Zakat<b style="color: blue;">No#<?= $a['no_transaksi'] ?></b></h1>
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
                            <td><?= $a['metode_bayar'] ?></td>
                        </tr>
                        
                        <tr>
                            <td> </td>
                            <td>atas nama Yayasan Masjid Ibn Khaldun</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td> <?= date('d-F-Y') ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </body>
    </html>
    <?php
    $html = ob_get_clean();
    
    $dompdf = new Dompdf();
    $dompdf->loadHtml($html);
    $dompdf->setPaper('A4', 'portrait');
    $dompdf->render();
    $dompdf->stream("invoice_pembayaran.pdf", ["Attachment" => 1]);
}
?>
