<?php
session_start();
include 'config/config.php';
if(isset($_POST['submit'])){
  $email=$_POST['email'];
  $password=$_POST['password'];
  $password=($password);

  if(cekloginadmin($email,$password)){
    echo "<script>alert('Login Berhasil')</script>";
    echo "<script>document.location.href='index.php'</script>";
   }else{
    echo "<script>alert('Email atau Password Anda Salah, Silahkan Ulangi Kembali')</script>";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login Admin</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="dist/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="dist/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="dist/css/util.css">
    <link rel="stylesheet" type="text/css" href="dist/css/main.css">
<!--===============================================================================================-->
<!-- <link rel="shortcut icon" type="image/x-icon" href="img/logo/favicon.png"> -->
</head>
<body>
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-form-title" style="background-image: url(../img/banner/zakat.jpg);">
                    <span class="login100-form-title-1">
                         Login Admin
                    </span>
                </div>
                
                <form class="login100-form validate-form" method="post">
                    <div class="wrap-input100 validate-input m-b-26" data-validate="Email harus diisi !!">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="Masukan email">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password harus diisi !!">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" id="password" placeholder="Masukan password">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="flex-sb-m w-full p-b-30">
                        <div class="contact100-form-checkbox">
                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                            <label class="label-checkbox100" for="ckb1">
                                Remember me
                            </label>
                        </div>
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn" type="submit" name="submit">
                            Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="dist/js/login.js"></script>
<!--===============================================================================================-->
    <script src="dist/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="dist/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="dist/vendor/bootstrap/js/popper.js"></script>
    <script src="dist/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="dist/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="dist/vendor/daterangepicker/moment.min.js"></script>
    <script src="dist/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="dist/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="dist/js/main.js"></script>

</body>
</html>