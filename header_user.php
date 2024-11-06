<?php
include 'config/config.php';
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
?>

<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Masjid IBN KHALDUN</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- <link rel="manifest" href="site.webmanifest"> -->
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="shortcut icon" type="image/x-icon" href="img/logo/emas.png">
  <!-- sweetalert -->
  <link rel="stylesheet" href="sweet/sweetalert.css">
  <script src="sweet/sweetalert.min.js"></script>
  <!-- Bootstrap -->
  <link rel="stylesheet" href="fontawesome/css/all.css">
  <link rel="stylesheet" type="text/css" href="login/css/my-login.css">
  <link rel="stylesheet" href="styleuser/css/slider.css">
  <link rel="stylesheet" href="styleuser/css/bootstrap.min.css">
  <link rel="stylesheet" href="styleuser/css/owl.carousel.min.css">
  <link rel="stylesheet" href="styleuser/css/magnific-popup.css">
  <link rel="stylesheet" href="styleuser/css/font-awesome.min.css">
  <link rel="stylesheet" href="styleuser/css/themify-icons.css">
  <link rel="stylesheet" href="styleuser/css/nice-select.css">
  <link rel="stylesheet" href="styleuser/css/flaticon.css">
  <link rel="stylesheet" href="styleuser/css/animate.css">
  <link rel="stylesheet" href="styleuser/css/slicknav.css">
  <link rel="stylesheet" href="styleuser/css/style.css">
  <link rel="stylesheet" href="css/slider.css">
  <link rel="stylesheet" href="css/header.css">
</head>

<body>
  <!-- header-start -->
  <header>
    <div class="header-area">
      <div class="header-top black-bg d-none d-md-block">
        <div class="container-fluid">
          <div class="row">
            <div class="col-xl-9 col-md-9 col-lg-9">
              <div class="header-contact">
                <a href="#"><i class="fas fa-phone"></i> 082125697122</a>
                <!-- <a href="#"><i class="fas fa-envelope"></i> Masjid IBN KHALDUN@gmail.com</a> -->
                <a href="#"><i class="fas fa-map-marker"></i> Jl. K.H Sholeh Iskandar Kedung Badak Tanah Sareal. Bogor</a>
              </div>
            </div>
            <div class="col-xl-3 col-md-3 col-lg-3">
              <div class="header-top-menu">
                <nav>
                  <ul>
                    <?php if (empty($_SESSION['iduser'])) { ?>
                      <li><a href="register.php"><i class="fas fa-address-book"></i> Daftar</a></li>
                      <li><a href="login.php"><i class="fas fa-sign-in-alt"></i> Masuk</a></li>
                    <?php } else { ?>
                      <li></li>
                    <?php } ?>
                    <?php if (empty($_SESSION['iduser'])) { ?>
                      <li></li>
                    <?php } else { ?>
                      <li><a href="logout.php" onclick="return confirm('Apakah anda akan yakin keluar ?')"><i class="fas fa-sign-out-alt"></i> Keluar</a></li>
                    <?php } ?>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="sticky-header" class="main-header-area white-bg">
        <div class="container">
          <div class="row align-items-center">
            <div class="col-xl-2 col-lg-2">
              <div class="logo-img">
                <a href="index.php">
                  <img style="width: 100px;"  src="img/logo/Emas.jpg" alt="">
                </a>
              </div>
            </div>
            <div class="col-xl-7 col-lg-7">
              <div class="main-menu d-none d-lg-block">
                <nav>
                  <ul id="navigation">
                    <li class="active"><a href="index.php">Home</a></li>
                    <?php if (empty($_SESSION['iduser'])) { ?>
                      <li></li>
                    <?php } else { ?>
                      <li><a href="profil.php">Akunku</a></li>
                    <?php } ?>
                    <li><a href="tentang.php">Tentang Kami</a></li>
                    <li><a href="zakat.php">Informasi Zakat 
                      <!-- <i class="fas fa-angle-down"></i> -->
                    </a>
                      <ul class="submenu">
                        <!-- <li><a href="zakat.php">Zakat</a></li> -->
                        <!-- <li><a href="infak.php">Infak</a></li>
                        <li><a href="sedekah.php">Sedekah</a></li> -->
                      </ul>
                    </li>
                    <li class="dropdown">
                      <a href="#">Kalkulator Zakat <i class="fas fa-angle-down"></i></a>
                      <ul class="submenu">
                        <li><a href="hitungzakatemas.php">Zakat Emas</a></li>
                        <li><a href="hitungzakatperak.php">Zakat Perak</a></li>
                        <li><a href="hitungzakatpertanian.php">Zakat Pertanian</a></li>
                        <li><a href="hitungzakattani_biaya.php">Zakat Pertanian Dengan Pengairan</a></li>
                        <li><a href=" hitungzakatperdagangan.php">Zakat Perdagangan</a></li>
                        <li><a href="zakathewanternak.php">Zakat Hewan Ternak</a></li>
                      </ul>
                    </li>
                  </ul>
                </nav>
              </div>
            </div>
            <div class="col-xl-3 col-lg-3">
              <div class="quote-area">
                <div class="get-quote d-none d-lg-block">
                  <a class="boxed-btn" href="bayarzakat.php">BAYAR ZAKAT</a>
                </div>
              </div>
            </div>
            <div class="col-12">
              <div class="mobile_menu d-block d-lg-none"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <!-- header-end -->
  <script>
    jQuery(document).ready(function($) {
      $('.out-link').on('click', function() {
        var getLink = $(this).attr('href');
        swal({
          title: 'Keluar',
          text: 'Anda yakin ingin keluar ?',
          html: true,
          type: "warning",
          confirmButtonColor: '#d9534f',
          showCancelButton: true,
        }, function() {
          window.location.href = getLink
        });
        return false;
      });
    });
  </script>

  <div class="container">
    <div class="row">
      <div class="col-md-9">