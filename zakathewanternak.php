<?php
include 'header_user.php';

if (empty($_SESSION['iduser'])) { ?>
  <script>
    document.location.href = 'login.php';
  </script>
<?php } else {
?>


  <h2 class="my-3">Zakat Hewan Ternak</h2>

<br>
  <table class="table table-striped table-responsive">
    <h3>Nisab dan Zakat Kambing atau Domba</h3>
    <thead>
      <tr>
        <th>Nisab</th>
        <th>Bilangan Dan Jenis Zakat</th>
        <th>Umur</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>5 ekor kambing</td>
        <td>1 ekor kambing</td>
        <td>2 Tahun lebih</td>
      </tr>
      <tr>
        <td>atau 5 ekor kambing</td>
        <td>1 ekor domba</td>
        <td>1 Tahun lebih</td>
      </tr>
      <tr>
        <td>10 ekor kambing</td>
        <td>2 ekor kambing</td>
        <td>2 Tahun lebih</td>
      </tr>
      <tr>
        <td>atau 10 ekor kambing</td>
        <td>2 ekor domba</td>
        <td>1 Tahun lebih</td>
      </tr>
      <tr>
        <td>15 ekor kambing</td>
        <td>3 ekor kambing</td>
        <td>2 Tahun lebih</td>
      </tr>
      <tr>
        <td>atau 15 ekor kambing</td>
        <td>3 ekor domba</td>
        <td>1 Tahun lebih</td>
      </tr>
      <tr>
        <td>20 ekor kambing</td>
        <td>4 ekor kambing</td>
        <td>2 Tahun lebih</td>
      </tr>
      <tr>
        <td>atau 20 ekor kambing</td>
        <td>4 ekor domba</td>
        <td>1 Tahun lebih</td>
      </tr>
    </tbody>
  </table>
  <br><br>

  <!-- <table class="table table-striped table-responsive">
    <h3>Nisab dan Zakat Unta</h3>
    <thead>
      <tr>
        <th>Nisab</th>
        <th>Bilangan Dan Jenis Zakat</th>
        <th>Umur</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>25-35</td>
        <td>1 ekor anak unta</td>
        <td>1 Tahun lebih</td>
      </tr>
      <tr>
        <td>36-45</td>
        <td>1 ekor anak unta</td>
        <td>2 Tahun lebih</td>
      </tr>
      <tr>
        <td>46-60</td>
        <td>1 ekor anak unta</td>
        <td>3 Tahun lebih</td>
      </tr>
      <tr>
        <td>61-75</td>
        <td>1 ekor anak unta</td>
        <td>4 Tahun lebih</td>
      </tr>
      <tr>
        <td>76-90</td>
        <td>2 ekor anak unta</td>
        <td>2 Tahun lebih</td>
      </tr>
      <tr>
        <td>91-120</td>
        <td>2 ekor anak unta</td>
        <td>3 Tahun lebih</td>
      </tr>
      <tr>
        <td>121</td>
        <td>3 ekor anak unta</td>
        <td>2 Tahun lebih</td>
      </tr>
    </tbody>
  </table> -->

  <table class="table table-striped table-responsive">
    <h3>Nisab dan Zakat Sapi</h3>
    <thead>
      <tr>
        <th>Nisab</th>
        <th>Bilangan Dan Jenis Zakat</th>
        <th>Umur</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>30 ekor sapi</td>
        <td>1 ekor sapi</td>
        <td>1 Tahun lebih</td>
      </tr>
      <tr>
        <td>40 ekor sapi</td>
        <td>1 ekor sapi</td>
        <td>1 Tahun lebih</td>
      </tr>
      <!-- <tr>
        <td>46-60</td>
        <td>1 ekor anak unta</td>
        <td>3 Tahun lebih</td>
      </tr>
      <tr>
        <td>60-69</td>
        <td>2 ekor anak sapi atau seekor kerbau</td>
        <td>1 Tahun lebih</td>
      </tr>
      <tr>
        <td>lebih dari 70</td>
        <td>1 ekor anak sapi atau seekor kerbau dan 1 ekor anak sapi atau seekor kerbau</td>
        <td>2 Tahun lebih</td>
      </tr> -->
    </tbody>
  </table> <br>

  <?php include 'sidebar.php'; ?>

  </div>
  </div>


<?php }
include 'footer_user.php'; ?>