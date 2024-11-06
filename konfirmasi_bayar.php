<?php
include 'header_user.php';

if (empty($id = $_SESSION['iduser'])) {
  echo "<script>document.location.href = 'index.php';</script>";
} else {

  $result = tampiltransaksiperstatus($id);

  if (isset($_POST['bayar'])) {
    $no_transaksi = $_POST['notransaksi'];
    $metode_bayar = $_POST['metode_bayar'];
    $norekuser = $_POST['norek_user'];
    $atasnama = $_POST['atasnama'];
    $jumlahbayar_user = $_POST['jumlahbayar_user'];
    $tgl_bayar = $_POST['tgl_bayar'];
    $ket = $_POST['ket'];
    $status = $_POST['status'];

    $id_user = $_SESSION['iduser'];


    $nama   = $_FILES['gambar']['name'];
    $size   = $_FILES['gambar']['size'];
    $error  = $_FILES['gambar']['error'];
    $asal = $_FILES['gambar']['tmp_name'];

    $lokasi = "img/bukti_transfer/" . $nama;
    $format = pathinfo($nama, PATHINFO_EXTENSION);

    if ($error === 0) {

      if ($size > 9000) {

        if ($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG") {

          if (updatetransaksi($no_transaksi, $metode_bayar, $norekuser, $atasnama, $jumlahbayar_user, $tgl_bayar, $lokasi, $ket, $status)) {
            // echo "<div class='alert alert-success'>
            //   <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
            //   Konfirmasi berhasil, Admin kami akan mengecek konfirmasi anda dalam 2x24 Jam. <br><a href='profil.php'>Klik Untuk Lihat Status Transaksi</a>
            // </div>";
            echo "<script>alert('Konfirmasi Berhasil, Admin kami akan mengecek konfirmasi anda dalam 2x24 Jam')</script>";
            echo "<script>window.location.href='profil.php';</script>";
          } else {
            echo "Error: " . "<br>" . mysqli_error($konek);
          }

          move_uploaded_file($asal, "img/bukti_transfer/" . $nama);
        } else {
          echo "Maaf format filenya harus jpg/png ";
        }
      } else {
        echo "file terlalu besar";
      }
    } else "Ada kesalahan saat upload";
  }


  function formatRupiah($angka)
{
    return number_format($angka, 0, ',', '.');
}

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
      <center>Konfirmasi Pembayaran</center>
    </h1>
  </div>

  <form method="post" action="" enctype="multipart/form-data">
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
      <div class="form-group">
        <label>No Transaksi</label>
        <input type="text" class="form-control" name="notransaksi" value="<?php echo $row['no_transaksi'] ?>" readonly="readonly">
      </div>

      <div class="form-group">
        <label>Total Tagihan</label>
        <input type="text" class="form-control" value="<?php echo rupiah($row['jumlah_bayar']) ?>" readonly="readonly">
      </div>
      <div class="form-group">
        <label>Metode Pembayaran</label>
        <input type="text" class="form-control" name="metode_bayar" value="<?php echo $row['metode_bayar'] ?>" readonly="readonly">
    </div>
    <?php } ?>
    <div class="form-group">
      <label>No Rekening Muzakki</label>
      <input type="number" name="norek_user" class="form-control">
    </div>

    <div class="form-group">
      <label>Atas Nama</label>
      <input type="text" name="atasnama" class="form-control">
    </div>








    <div class="form-group">
      <label>Jumlah Yang di bayar</label>
      <input type="text" name="jumlahbayar_user" id="jumlahbayar_user" class="form-control" 
      value="<?= isset($jumlahbayar_user) ? formatRupiah($jumlahbayar_user) : '' ?>">
    </div>







    <div class="form-group">
      <label>Tanggal Pembayaran</label>
      <input type="date" name="tgl_bayar" class="form-control">
    </div>

    <div class="form-group">
      <label class="control-label">Bukti Pembayaran</label>
      <input type="file" name="gambar">
    </div>

    <div class="form-group">
      <label>Keterangan (optional)</label>
      <input type="text" name="ket" class="form-control">
    </div>

    <input type="hidden" name="status" value="1">

    <button type="submit" name="bayar" class="btn btn-block btn-success mb-5">Konfirmasi</button>
  </form>



  <?php include 'sidebar.php'; ?>
  </div>
  </div>

<?php }
include 'footer_user.php'; ?>

<script>

document.getElementById('jumlahbayar_user').addEventListener('input', function() {
    this.value = formatRupiah(this.value);
    // calculateTotal();
});


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