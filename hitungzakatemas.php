<?php
include 'header_user.php';
include 'config/konek.php';

session_start(); // Pastikan session dimulai

$total = "";
$kosong_jumlah = "";
$kosong_emas = "";
$hargaemas = 0;

if (isset($_POST['hitung'])) {
    global $konek;
    $jumlahemas = mysqli_real_escape_string($konek, $_POST['jumlahemas']);


    $hargaemas_per_gram = str_replace('.', '', mysqli_real_escape_string($konek, $_POST['hargaemas_per_gram']));
    $hargaemas = $jumlahemas * $hargaemas_per_gram;

    if (empty($hargaemas_per_gram)) {
        $kosong_emas = "Harga Emas per Gram Belum Di Inputkan";
    }

    if ($jumlahemas >= 85) {
        $total = $hargaemas * 0.025;
    } elseif (empty($jumlahemas)) {
        $kosong_jumlah = "Jumlah Emas Belum Di Inputkan";
    } else {
        $g = "<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Maaf</strong> Jumlah Gram Emas Yang Anda Inputkan di Bawah Nisob Minimal Yaitu 85 Gram</div>";
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

<h2 class="my-3">Hitung Zakat Emas</h2>
<hr>
<ol>
    <li>Masukan Jumlah emas (gram) dengan nisob minimal 85 Gram</li>
    <li>Masukan Harga emas per gram (rupiah)</li>
    <li>Klik tombol hitung</li>
</ol>

<h4>Penjelasan</h4>
<p>Sesuai SK Ketua BAZNAS No. 1 tahun 2024, nisab emas sebesar emas 85 gram, dengan haul selama satu tahun dan kadar zakatnya 2,5%. Artinya bila seorang muslim memiliki emas sebesar setidaknya 85 gram yang disimpan selama satu tahun ia wajib membayar zakat sebesar 2,5% dari jumlah emasnya tersebut</p>

<div class="well">
    <form method="post" action="">
        <?php if (isset($g))
            echo $g; ?>
        <div class="form-group">
            <label>Jumlah Emas (Gram)</label>
            <input type="number" class="form-control" placeholder="Minimal 85 Gram" name="jumlahemas" id="jumlahemas"
                value="<?= isset($jumlahemas) ? $jumlahemas : '' ?>">
            <p class="kosong"><?= $kosong_jumlah ?></p>
            <div style="color: red;"> Sesuai SK Ketua BAZNAS No. 1 tahun 2024</div>

        </div>
        <br>
        

        <div class="form-group">
            <label>Harga Emas per Gram (Rupiah)</label>


            <input type="text" class="form-control" name="hargaemas_per_gram" id="hargaemas_per_gram"
                value="<?= isset($hargaemas_per_gram) ? formatRupiah($hargaemas_per_gram) : '' ?>">
            <p class="kosong"><?= $kosong_emas ?></p>


        </div>

        <button type="submit" name="hitung" class="btn btn-primary">Hitung Total Harga Emas & Total Zakat yang harus
            dibayarkan</button> 
            <br>
            <br>
        <div class="form-group">
            <label>Total Harga Emas (Rupiah)</label>
            <input type="text" class="form-control" name="hargaemas" id="hargaemas" readonly
                value="<?= formatRupiah($hargaemas) ?>">
        </div>
    </form>

    <?php if (!empty($total)) {
        $_SESSION['jeniszakat'] = 'Zakat Emas'; // Simpan jenis zakat ke dalam session
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
document.getElementById('jumlahemas').addEventListener('input', calculateTotal);
document.getElementById('hargaemas_per_gram').addEventListener('input', function() {
    this.value = formatRupiah(this.value);
    calculateTotal();
});

function calculateTotal() {
    const jumlahemas = document.getElementById('jumlahemas').value;
    const hargaemas_per_gram = document.getElementById('hargaemas_per_gram').value.replace(/\./g, '');
    const totalHargaEmas = jumlahemas * hargaemas_per_gram;
    document.getElementById('hargaemas').value = formatRupiah(totalHargaEmas);
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
</script>