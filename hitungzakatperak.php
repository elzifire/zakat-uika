<?php
include 'header_user.php';
include 'config/konek.php';

session_start(); // Pastikan session dimulai

if (empty($_SESSION['iduser'])) {
    echo "<script>document.location.href = 'login.php';</script>";
    exit;
}

$total = "";
$kosong_perak = "";
$kosong_jumlah = "";
$hargaperak = 0;

if (isset($_POST['hitung'])) {
    global $konek;
    $jumlahperak = mysqli_real_escape_string($konek, $_POST['jumlahperak']);
    $hargaperak_per_gram = str_replace('.', '', mysqli_real_escape_string($konek, $_POST['hargaperak_per_gram']));
    $hargaperak = $jumlahperak * $hargaperak_per_gram;

    if (empty($hargaperak_per_gram)) {
        $kosong_perak = "Harga perak per Gram Belum Di Inputkan";
    }

    if ($jumlahperak >= 595) {
        $total = $hargaperak * 0.025;
    } elseif (empty($jumlahperak)) {
        $kosong_jumlah = "Jumlah perak Belum Di Inputkan";
    } else {
        $g = "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Maaf</strong> Jumlah Gram perak Yang Anda Inputkan di Bawah Nisob Minimal Yaitu 595 Gram</div>";
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

<h2 class="my-3">Hitung Zakat Perak</h2>
<hr>
<ol>
    <li>Zakat perak wajib ditunaikan jika perak yang dimiliki telah mencapai atau melebihi nisab sebesar 595 gram, kadar zakatnya ialah 2,5% dari perak yang dimiliki.</li>
    <li>Masukan Jumlah perak dalam satuan gram dengan nisob minimal 595 Gram</li>
    <li>Masukan Harga perak dalam satuan rupiah</li>
    <li>Klik tombol hitung</li>
</ol>

<div class="well">
    <form method="post" action="">
        <?php if (isset($g)) echo $g; ?>

        <div class="form-group">
            <label>Jumlah Perak (Gram)</label>
            <input type="number" class="form-control" placeholder="Minimal 595 Gram" name="jumlahperak" id="jumlahperak"
                value="<?= isset($jumlahperak) ? $jumlahperak : '' ?>">
            <p class="kosong"><?= $kosong_jumlah ?></p>
        </div>

        <div class="form-group">
            <label>Harga Perak per Gram (Rupiah)</label>
            <input type="text" class="form-control" name="hargaperak_per_gram" id="hargaperak_per_gram"
                value="<?= isset($hargaperak_per_gram) ? formatRupiah($hargaperak_per_gram) : '' ?>">
            <p class="kosong"><?= $kosong_perak ?></p>
        </div>

        <button type="submit" name="hitung" class="btn btn-primary">Hitung Total Harga Perak & Total Zakat yang harus dibayarkan</button>

        <div class="form-group">
            <label>Total Harga Perak (Rupiah)</label>
            <input type="text" class="form-control" name="hargaperak" id="hargaperak" readonly
                value="<?= formatRupiah($hargaperak) ?>">
        </div>
    </form>

    <?php if (!empty($total)) { 
        $_SESSION['jeniszakat'] = 'Zakat Perak'; // Simpan jenis zakat ke dalam session
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
document.getElementById('jumlahperak').addEventListener('input', calculateTotal);
document.getElementById('hargaperak_per_gram').addEventListener('input', function() {
    this.value = formatRupiah(this.value);
    calculateTotal();
});

function calculateTotal() {
    const jumlahperak = document.getElementById('jumlahperak').value;
    const hargaperak_per_gram = document.getElementById('hargaperak_per_gram').value.replace(/\./g, '');
    const totalHargaPerak = jumlahperak * hargaperak_per_gram;
    document.getElementById('hargaperak').value = formatRupiah(totalHargaPerak);
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

document.getElementById('hargaperak_per_gram').addEventListener('keyup', function(e) {
    this.value = formatRupiah(this.value);
});
</script>
