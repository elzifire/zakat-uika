<?php
include 'header_user.php';
include 'config/konek.php'; // Pastikan file koneksi database di-include

session_start(); // Pastikan session dimulai

if (empty($_SESSION['iduser'])) {
  echo "<script>document.location.href = 'login.php';</script>";
  exit; // Tambahkan exit untuk menghentikan eksekusi script jika pengguna tidak login
}

if (isset($_POST['bayar'])) {
  $notransaksi = $_POST['notransaksi'];
  $nama_user = $_POST['nama'];
  $jeniszakat = $_POST['jeniszakat'];
  $jumlahbayar = $_POST['jumlahbayar'];
  $metode_bayar = $_POST['metode_bayar'];
  $id_user = $_SESSION['iduser'];
  $status = 0;

  if (simpantransaksi($id_user, $notransaksi, $nama_user, $jeniszakat, $jumlahbayar, $metode_bayar, $status)) {
    echo "<script>alert('Proses Transaksi Sukses, Lihat invoice')</script>";
    echo "<script>document.location.href = 'invoice.php';</script>";
    exit;
  } else {
    echo "Error: " . mysqli_error($konek);
  }
}

// Menangkap nilai jenis zakat dari session
$selected_zakat = isset($_SESSION['jeniszakat']) ? $_SESSION['jeniszakat'] : '';

?>
<style>
#cara {
    background-color: #eee;
}

#form {
    background-color: white;
}
</style>

<div class="page-header">
    <h1>
        <center>Bayar Zakat</center>
    </h1>
</div>

<form method="post" action="" enctype="multipart/form-data">

    <div class="form-group">
        <label>No Transaksi</label>
        <?php
    global $konek;
    $sql = mysqli_query($konek, "SELECT * FROM transaksi ORDER BY id DESC");
    $row = mysqli_fetch_array($sql);
    $a = $row['id'] + 1;
    ?>
        <input type="text" class="form-control" name="notransaksi" value="<?php date_default_timezone_set("Asia/Jakarta");
    echo date('YmdHis') . $a; ?>" readonly="readonly">
    </div>

    <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" value="<?php echo $_SESSION['namalengkap']; ?>" readonly>
    </div>

    <div class="form-group">
        <label>Jenis Zakat</label>
        <div>
        <select class="form-control" name="jeniszakat">
    <option value="0">-- Pilih jenis Zakat --</option>
    <option value="Zakat Emas" <?php if ($selected_zakat == 'Zakat Emas') echo 'selected'; ?>>Zakat Emas</option>
    <option value="Zakat Emas yang di pakai" <?php if ($selected_zakat == 'Zakat Emas yang di pakai') echo 'selected'; ?>>Zakat Emas yang di pakai</option>
    <option value="Zakat Perak" <?php if ($selected_zakat == 'Zakat Perak') echo 'selected'; ?>>Zakat Perak</option>
    <option value="Zakat Pertanian" <?php if ($selected_zakat == 'Zakat Pertanian') echo 'selected'; ?>>Zakat Pertanian</option>
    <option value="Zakat Pertanian Dengan Pengairan" <?php if ($selected_zakat == 'Zakat Pertanian Dengan Pengairan') echo 'selected'; ?>>Zakat Pertanian Dengan Pengairan</option>
    <option value="Zakat Perdagangan" <?php if ($selected_zakat == 'Zakat Perdagangan') echo 'selected'; ?>>Zakat Perdagangan</option>
    <option value="Zakat Hewan Ternak" <?php if ($selected_zakat == 'Zakat Hewan Ternak') echo 'selected'; ?>>Zakat Hewan Ternak</option>
</select>
        </div>
    </div>

    <div class="form-group">
        <label for="exampleInputPassword1">Jumlah Bayar</label>
        <input type="number" class="form-control" name="jumlahbayar"
            value="<?php echo isset($_SESSION['a']) ? $_SESSION['a'] : '0'; ?>">
    </div>


    <div class="form-group">
        <label for="sel1">Metode Pembayaran</label>
        <select name="metode_bayar" class="form-control" id="sel1">
            <option value="0">Pilih Bank</option>
            <option value=" BANK SYARIAH MANDIRI (7091234569)">
                BANK SYARIAH MANDIRI </option>

            <option value="CIMB NIAGA SYARIAH">
                CIMB NIAGA SYARIAH </option>

            <option value="BNI SYARIAH ">
                BNI SYARIAH</option>
        </select>
    </div>



    <button type="submit" name="bayar" class="btn btn-block btn-success mb-5">B a y a r</button>
</form>

<?php include 'sidebar.php'; ?>
</div>
</div>

<?php
include 'footer_user.php'; ?>