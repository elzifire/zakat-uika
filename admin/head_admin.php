<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin-Masjid AL-HIJR II</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Sweet Alert -->
  <script src="../sweet/sweetalert.min.js"></script>
  <script src="../js/jquery.min.js"></script>
  <link rel="stylesheet" href="../sweet/sweetalert.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- <link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.png"> -->
  <script src="dist/sweet/sweetalert.min.js"></script>
</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" data-widget="fullscreen" href="#" role="button">
              <i class="fas fa-expand-arrows-alt"></i>
            </a>
          </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="" class="brand-link">
        <!-- <img src="img/logo/logo.jpg" class="brand-image img-square elevation-3" style="opacity: .8 "> -->
        <span class="brand-text font-weight-light">Administrator</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo $_SESSION['foto']; ?> " class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?php echo $_SESSION['nama_admin']; ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="./index.php" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="data_muzakki.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Muzakki
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="data_mustahiq.php" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>
                  Data Mustahiq
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="data_transaksi.php" class="nav-link">
                <i class="nav-icon fas fa-archive"></i>
                <p>
                  Data Transaksi
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="nav-icon fas fa-copy"></i>
                <p>
                  Laporan
                  <i class="fas fa-angle-left right"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="laporan_pemasukan.php" class="nav-link">
                    <i class="far fa-file nav-icon"></i>
                    <p>Pemasukan Zakat</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan_muzakki.php" class="nav-link">
                    <i class="far fa-file nav-icon"></i>
                    <p>Data Muzakki</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="laporan_mustahiq.php" class="nav-link">
                    <i class="far fa-file nav-icon"></i>
                    <p>Penyaluran Zakat</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="data_admin.php" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Data Amil
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="logout.php" class="nav-link" onclick="return confirm('Apakah anda akan yakin keluar ?')">
                <i class="nav-icon fas fa-sign-out-alt"></i>
                Logout
              </a>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>