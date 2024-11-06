<?php
include 'header_user.php';
include 'config/konek.php';

session_start(); // Pastikan session dimulai

if (empty($_SESSION['iduser'])) {
    echo "<script>document.location.href = 'login.php';</script>";
    exit;
}

$total = "";
$kosong_harga = "";
$kosong_panen = "";
$hargapanen = 0;

if (isset($_POST['hitung'])) {
    global $konek;
    $hasilpanen = mysqli_real_escape_string($konek, $_POST['hasilpanen']);
    $hargapanen_per_kg = str_replace('.', '', mysqli_real_escape_string($konek, $_POST['hargapanen_per_kg']));
    $hargapanen = $hasilpanen * $hargapanen_per_kg;

    if (empty($hargapanen_per_kg)) {
        $kosong_harga = "Harga Hasil Panen Belum Di Inputkan";
    }

    if ($hasilpanen >= 653) {
        $total = ($hasilpanen * 0.05) * $hargapanen_per_kg;
    } elseif (empty($hasilpanen)) {
        $kosong_panen = "Jumlah Hasil Panen Belum Di Inputkan";
    } else {
        $g = "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Maaf</strong> Jumlah Yang Anda Inputkan di Bawah Nisob Minimal Yaitu 653 Kg gabah</div>";
    }
}

function formatRupiah($angka)
{
    return number_format($angka, 0, ',', '.');
}
?>

<style>
.kosong {
    color: red;
}

.well {
    background: #eee;
    border-radius: 0px;
}
</style>

<h2 class="my-3">Hitung Zakat Pertanian Dengan Pengairan Pribadi</h2>
<hr>
<ol>
    <li>Jika hasil panen lebih dari atau sama dengan nisab 653 Kg (gabah), maka zakat yang dikeluarkan adalah 5% dari hasil panen.</li>
    <li>Masukan jumlah hasil panen dalam satuan kg</li>
    <li>Masukan Harga hasil panen dalam satuan rupiah</li>
    <li>Klik tombol hitung</li>
</ol>

<div class="well">
    <form method="post" action="">
        <?php if (isset($g)) echo $g; ?>

        <div class="form-group">
            <label>Hasil Panen (Kg)</label>
            <input type="number" class="form-control" placeholder="Minimal 653 Kg gabah" name="hasilpanen" id="hasilpanen"
                value="<?= isset($hasilpanen) ? $hasilpanen : '' ?>">
            <p class="kosong"><?= $kosong_panen ?></p>
        </div>

        <div class="form-group">
            <label>Harga Hasil Panen per Kg (Rupiah)</label>
            <input type="text" class="form-control" name="hargapanen_per_kg" id="hargapanen_per_kg"
                value="<?= isset($hargapanen_per_kg) ? formatRupiah($hargapanen_per_kg) : '' ?>">
            <p class="kosong"><?= $kosong_harga ?></p>
        </div>

        <button type="submit" name="hitung" class="btn btn-primary btn-block">Hitung Total Harga Panen & Total Zakat yang harus dibayarkan</button>

        <div class="form-group">
            <label>Total Harga Panen (Rupiah)</label>
            <input type="text" class="form-control" name="hargapanen" id="hargapanen" readonly
                value="<?= formatRupiah($hargapanen) ?>">
        </div>
    </form>

    <?php if (!empty($total)) { 
        $_SESSION['jeniszakat'] = 'Zakat Pertanian'; // Simpan jenis zakat ke dalam session
        ?>
    <div class="form-group">
        <br>
        <p>Total Zakat yang harus anda bayarkan adalah<br></p>
        <h3><?php echo "Rp. " . formatRupiah($_SESSION['a'] = $total) ?></h3>
        <br>
        <a class="btn btn-block btn-success" href="bayarzakat.php">Bayar Zakat</a>
    </div>
    <?php } ?>
</div>

<?php include 'sidebar.php'; ?>
</div>
</div>

<?php include 'footer_user.php'; ?>

<script>
document.getElementById('hasilpanen').addEventListener('input', calculateTotal);
document.getElementById('hargapanen_per_kg').addEventListener('input', function() {
    this.value = formatRupiah(this.value);
    calculateTotal();
});

function calculateTotal() {
    const hasilpanen = document.getElementById('hasilpanen').value;
    const hargapanen_per_kg = document.getElementById('hargapanen_per_kg').value.replace(/\./g, '');
    const totalHargaPanen = hasilpanen * hargapanen_per_kg;
    document.getElementById('hargapanen').value = formatRupiah(totalHargaPanen);
}

function formatRupiah(angka, prefix) {
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
        split = number_string.split(','),
        sisa = split[0].length % 3,
        rupiah = split[0].substr(0, sisa),
        ribuan = split[0].substr(sisa).match(/\d{3}/gi);

    if (ribuan) {
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
    }

    rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
    return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

document.getElementById('hargapanen_per_kg').addEventListener('keyup', function(e) {
    this.value = formatRupiah(this.value);
});
</script>
