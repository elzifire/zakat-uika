<?php
include 'header_user.php';
include 'config/konek.php';

session_start(); // Pastikan session dimulai

if (empty($_SESSION['iduser'])) {
    echo "<script>document.location.href = 'login.php';</script>";
    exit;
}

$total = "";
$kosong_modal = "";
$kosong_laba = "";
$modal = 0;
$keuntungan = 0;

if (isset($_POST['hitung'])) {
    global $konek;
    $modal = str_replace('.', '', mysqli_real_escape_string($konek, $_POST['modal']));
    $keuntungan = str_replace('.', '', mysqli_real_escape_string($konek, $_POST['keuntungan']));

    $jumlah = $modal + $keuntungan;

    if ($jumlah >= 82312725) {
        $total = $jumlah * 0.025;
    } else {
        $g = "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Maaf</strong> Hasil Perhitungan (Jumlah Modal + Keuntungan), Hasilnya di Bawah Nisob Minimal Yaitu 85 Gram Emas, Maka Anda Belum Wajib Zakat</div>";
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

<h2 class="my-3">Hitung Zakat Perdagangan</h2>
<hr>
<ol>
    <li>Nisab zakat perdagangan per tahun Rp. 82.312.725, Sesuai SK Ketua BAZNAS No. 1 tahun 2024 </li>
    <li>Masukan Jumlah Aset Lancar (Rupiah)</li>
    <li>Masukan Jumlah Keuntungan Dagang (Rupiah)</li>
    <li>Klik tombol hitung</li>
</ol>

<div class="well">
    <form method="post" action="">
        <?php if (isset($g)) echo $g; ?>

        <div class="form-group">
            <label>Aset Lancar (Rupiah)</label>
            <input type="text" class="form-control" required name="modal" id="modal"
                value="<?= isset($modal) ? formatRupiah($modal) : '' ?>">
            <p class="kosong"><?= $kosong_modal ?></p>
        </div>

        <div class="form-group">
            <label>Keuntungan Dagang (Rupiah)</label>
            <input type="text" class="form-control" required name="keuntungan" id="keuntungan"
                value="<?= isset($keuntungan) ? formatRupiah($keuntungan) : '' ?>">
            <p class="kosong"><?= $kosong_laba ?></p>
        </div>

        <button type="submit" name="hitung" class="btn btn-block btn-primary">Hitung</button>

        <div class="form-group">
            <label>Total Aset Lancar + Keuntungan (Rupiah)</label>
            <input type="text" class="form-control" name="total_jumlah" id="total_jumlah" readonly
                value="<?= formatRupiah($modal + $keuntungan) ?>">
        </div>
    </form>

    <?php if (!empty($total)) { 
        $_SESSION['jeniszakat'] = 'Zakat Perdagangan'; // Simpan jenis zakat ke dalam session
        ?>
    <div class="form-group">
        <br>
        <p>Total Zakat yang harus anda bayarkan adalah<br></p>
        <h3><?php echo "Rp. " . formatRupiah($_SESSION['a'] = $total) ?></h3>
        <br>
        <a class="btn btn-block btn-lg btn-success" href="bayarzakat.php">Bayar Zakat</a>
    </div>
    <?php } ?>
</div>

<?php include 'sidebar.php'; ?>
</div>
</div>

<?php include 'footer_user.php'; ?>

<script>
document.getElementById('modal').addEventListener('input', function() {
    this.value = formatRupiah(this.value);
    calculateTotal();
});
document.getElementById('keuntungan').addEventListener('input', function() {
    this.value = formatRupiah(this.value);
    calculateTotal();
});

function calculateTotal() {
    const modal = document.getElementById('modal').value.replace(/\./g, '');
    const keuntungan = document.getElementById('keuntungan').value.replace(/\./g, '');
    const totalJumlah = parseInt(modal) + parseInt(keuntungan);
    document.getElementById('total_jumlah').value = formatRupiah(totalJumlah);
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

document.getElementById('modal').addEventListener('keyup', function(e) {
    this.value = formatRupiah(this.value);
});

document.getElementById('keuntungan').addEventListener('keyup', function(e) {
    this.value = formatRupiah(this.value);
});
</script>
