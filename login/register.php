<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Daftar | Zakat Kita</title>
    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon-zakat.png">
    <!-- Place favicon.ico in the root directory -->
    <!-- CSS here -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/themify-icons.css">
    <link rel="stylesheet" href="../css/nice-select.css">
    <link rel="stylesheet" href="../css/flaticon.css">
    <link rel="stylesheet" href="../css/animate.css">
    <link rel="stylesheet" href="../css/slicknav.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
    <!-- header-start -->
    <header>
        <div class="header-area ">
            <div class="header-top black-bg d-none d-md-block">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-9 col-md-9 col-lg-9">
                            <div class="header-contact">
                                <a href="#"><i class="fa fa-phone"></i> (0721) 345236</a>
                                <a href="#"><i class="fa fa-envelope"></i> zakatkita@gmail.com</a>
                                <a href="#"><i class="fa fa-map-marker"></i> Jl.Soekarno Hatta No.18 Bandar Lampung</a>
                            </div>
                        </div>
                        <div class="col-xl-3 col-md-3 col-lg-3">
                            <div class="header-top-menu">
                                <nav>
                                    <ul>
                                        <li><a href="index.php">Masuk</a></li>
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
                        <div class="col-xl-3 col-lg-3">
                            <div class="logo-img">
                                <a href="../index.html">
                                    <img style="width: 35;" height="50" src="img/logo-zakat.png" alt="">
                                </a>
                            </div>
                        </div>
                        <div class="col-xl-9 col-lg-9">
                            <div class="main-menu d-none d-lg-block">
                                <nav>
                                    <ul id="navigation">
                                        <li><a class="active" href="../index.php">Home</a></li>
                                        <li><a href="../tentang.php">Tentang</a></li>
                                        <li><a href="#">Informasi Zakat <i class="ti-angle-down"></i></a>
                                            <ul class="submenu">
                                                <li><a href="../zakatfitrah.php">Zakat Fitrah</a></li>
                                                <li><a href="../infak.php">Infak</a></li>
                                                <li><a href="../sedekah.php">Sedekah</a></li>
                                                <li><a href="../fidyah.php">Fidyah</a></li>
                                                <li><a href="#">Zakat Maal</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="../carabayarzakat.php">Cara Bayar Zakat</a></li>
                                        <li><a href="../kontak.php">Kontak</a></li>
                                    </ul>
                                </nav>
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
    <div class="my-login-page mt-4 mb-4">
        <section class="h-100">
            <div class="container h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <center>Daftar</center>
                                </h4>
                                <form method="POST" class="my-login-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="name">Nama</label>
                                        <input id="name" placeholder="Masukkan Nama" type="text" class="form-control" name="name" required autofocus>
                                        <div class="invalid-feedback">
                                            Siapa Nama Anda?
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" placeholder="Masukkan Email" type="email" class="form-control" name="email" required>
                                        <div class="invalid-feedback">
                                            Email Invalid
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label for="telepon">Telepon</label>
                                        <input id="telepon" placeholder="Masukkan No Telepon" type="text" class="form-control" name="telepon" required>
                                        <div class="invalid-feedback">
                                            No Telepon Invalid
                                        </div>
                                    </div> -->

                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input id="password" placeholder="Buat Password" type="password" class="form-control" name="password" required data-eye>
                                        <div class="invalid-feedback">
                                            Password harus di isi!
                                        </div>
                                    </div>

                                    <div class="form-group m-0">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Daftar
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        Sudah Punya Akun? <a href="index.php">Masuk</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- location-area-start -->
    <div class="addres-area black-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-md-4">
                    <div class="single-address text-center">
                        <div class="addres-icon">
                            <img src="img/icon/1.png" alt="">
                        </div>
                        <h3>Alamat Kami</h3>
                        <p>Jl.Soekarno Hatta No.18, Bandar Lampung <br> Lampung, Indonesia</p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single-address text-center">
                        <div class="addres-icon">
                            <img src="img/icon/2.png" alt="">
                        </div>
                        <h3>Jam Buka</h3>
                        <p>Senin-Jum'at (09.00-19.00) <br> Sabtu-Minggu <a class="underline-hover" href="#">(Tutup)</a></p>
                    </div>
                </div>
                <div class="col-xl-4 col-md-4">
                    <div class="single-address text-center">
                        <div class="addres-icon">
                            <img src="img/icon/3.png" alt="">
                        </div>
                        <h3>Kirim Pesan</h3>
                        <p>zakatkita@gmail.com <br> (0721) 345236</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- location-area-end -->

    <!-- footer-start -->
    <footer class="footer-area ">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-sm-6 col-md-3 col-xl-4">
                    <div class="single-footer-widget footer_1">
                        <!-- <a href="index.html"> <img src="img/footer-logo.png" alt=""> </a> -->
                        <a href="index.php"> <img style="width: 55;" height="70" src="../img/footer-zakat.png" alt=""> </a>
                        <p>Rumah Zakat adalah website yang digunakan untuk membayar serta mengelola zakat dengan sistem yang lebih aman, praktis, dan terpercaya.</p>
                        <div class="social-links">
                            <ul>
                                <li>
                                    <a href="#"> <i class="fa fa-facebook"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-twitter"></i> </a>
                                </li>
                                <li>
                                    <a href="#"> <i class="fa fa-instagram"></i> </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-md-2 col-xl-3">
                    <div class="single-footer-widget">
                        <h4>Tautan Langsung</h4>
                        <ul>
                            <li><a href="#">Tentang</a></li>
                            <li><a href="#">Zakat Fitrah</a></li>
                            <li><a href="#">Zakat Maal</a></li>
                            <li><a href="#">Cara Bayar Zakat</a></li>
                        </ul>

                    </div>
                </div>
                <div class="col-sm-6 col-md-3 col-xl-3">
                    <div class="single-footer-widget footer_icon">
                        <h4>Kantor</h4>
                        <div class="office-location">
                            <ul>
                                <li>
                                    <p><i class="fa fa-map-marker"></i>Jl. Soekarno Hatta No.10, Rajabasa Raya, Kec. Rajabasa, Kota Bandar Lampung, Lampung 35144</p>
                                </li>
                                <li>
                                    <p><i class="fa fa-phone"></i>(0721) 345236</p>
                                </li>
                                <li>
                                    <p><i class="fa fa-envelope"></i>zakatkita@gmail.com</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer-end -->

    <!-- JS here -->
    <script src="../js/vendor/modernizr-3.5.0.min.js"></script>
    <script src="../js/vendor/jquery-1.12.4.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/owl.carousel.min.js"></script>
    <script src="../js/isotope.pkgd.min.js"></script>
    <script src="../js/ajax-form.js"></script>
    <script src="../js/waypoints.min.js"></script>
    <script src="../js/jquery.counterup.min.js"></script>
    <script src="../js/imagesloaded.pkgd.min.js"></script>
    <script src="../js/scrollIt.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/wow.min.js"></script>
    <script src="../js/nice-select.min.js"></script>
    <script src="../js/jquery.slicknav.min.js"></script>
    <script src="../js/jquery.magnific-popup.min.js"></script>
    <script src="../js/plugins.js"></script>

    <!--contact js-->
    <script src="../js/contact.js"></script>
    <script src="../js/jquery.ajaxchimp.min.js"></script>
    <script src="../js/jquery.form.js"></script>
    <script src="../js/jquery.validate.min.js"></script>
    <script src="../js/mail-script.js"></script>

    <script src="../js/main.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/my-login.js"></script>
</body>

</html>