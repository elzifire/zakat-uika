<?php
include 'header_user.php';

if (empty($_SESSION['iduser'])) { ?>
  <script>
    document.location.href = 'index.php';
  </script>
<?php } else {

  $id = $_SESSION['iduser'];
  $result = tampilprofil($id);

  if (isset($_POST['submit'])) {
    global $konek;
    $namalengkap  = $_POST['nama'];
    $email  = $_POST['email'];
    $alamat  = $_POST['alamat'];
    $notlp  = $_POST['no_tlp'];

    $nama   = $_FILES['gambar']['name'];
    $size   = $_FILES['gambar']['size'];
    $error  = $_FILES['gambar']['error'];
    $asal = $_FILES['gambar']['tmp_name'];

    $lokasi = "img/foto_profil/" . $nama;
    $format = pathinfo($nama, PATHINFO_EXTENSION);

    if (!empty($nama)) {
      if ($format === "jpg" || $format === "png" || $format === "JPG" || $format === "PNG") {

        if (editprofil($namalengkap, $email, $alamat, $notlp, $lokasi, $id)) {
          echo "<script>document.location.href = 'profil.php';</script>";
        } else {
          echo "Error" . mysqli_error($konek);
        }

        move_uploaded_file($asal, "img/foto_profil/" . $nama);
      } else {
        echo "Maaf format filenya harus jpg/png ";
      }
    } else {
      if (editprofil($namalengkap, $email, $alamat, $notlp, $lokasi, $id)) {
        echo "<script>document.location.href = 'profil.php';</script>";
      } else {
        echo "Error" . mysqli_error($konek);
      }
    }
  }


?>
  <style>
    .profil {
      clear: both;
    }

    #profile {
      background-color: #00aeef;
      border: 0px;
    }

    .well {
      background-color: white;
      border: 1px solid black;
    }

    #edit {
      background-color: #022646;
    }

    .col-sm-5 {
      display: none;
    }
  </style>

  <div class=container>
    <div class="page-header">
      <center>
        <p class="lead">Lengkapi Profil Anda</p>
      </center>
    </div>


    <div class="row">
      <div class="col-md-4">
        <div class="well" id="profile">
          <?php while ($row = mysqli_fetch_Assoc($result)) { ?>
            <p>
              <center><img width="140" height="160" src="<?= $row['foto_profil']; ?>" alt=""></center>
            </p>
            <p>
              <center><?= $row['namalengkap']; ?></center>
            </p>
            <center>
              <label>Email</label>
              <p><?= $row['email']; ?></p>
              <label>Alamat</label>
              <p><?= $row['alamat']; ?></p>
              <label>No Tlp</label>
              <p>+<?= $row['no_tlp']; ?></p>
            </center>

        </div>
      </div>

      <div class="col-md-8">
        <div class="well">
          <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-bordered">
              <tr>
                <td>Foto Profil</td>
                <td><input name="gambar" type="file" value="<?php echo $row['foto_profil'] ?>"></td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td><input name="nama" class="form-control" type="text" value="<?= $row['namalengkap']; ?>"></td>
              </tr>
              <tr>
                <td>Email</td>
                <td><input name="email" class="form-control" type="email" value="<?= $row['email']; ?>"></td>
              </tr>
              <tr>
                <td>Alamat Lengkap</td>
                <td><textarea class="form-control" name="alamat"><?= $row['alamat']; ?></textarea></td>
              </tr>
              <tr>
                <td>No Telepon</td>
                <td><input name="no_tlp" class="form-control" maxlength="12" type="number" value="<?= $row['no_tlp']; ?>"></td>
              </tr>

              <tr>
                <td></td>
                <td><input type="submit" name="submit" class="btn btn-success" value="Simpan Perubahan"> <a class="btn btn-primary" href="profil.php">Kembali</a></td>
              </tr>

            <?php } ?>

            </table>
          </form>
        </div>
      </div>

    </div>
    <!--end row-->

  </div>

  </div>
  </div>

<?php }
include 'footer_user.php'; ?>