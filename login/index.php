<?php
include '../header_user.php';
?>
<!-- </div>
</div>
</div> -->
<div class="container">
    <div class="my-login-page mt-5 mb-5">
        <section class="h-100">
            <div class="container justify-content-center h-100">
                <div class="row justify-content-md-center h-100">
                    <div class="card-wrapper">
                        <div class="card fat">
                            <div class="card-body">
                                <h4 class="card-title">
                                    <center>Masuk</center>
                                </h4>
                                <form method="POST" class="my-login-validation" novalidate="">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input id="email" type="email" placeholder="Masukkan Email" class="form-control" name="email" value="" required autofocus>
                                        <div class="invalid-feedback">
                                            Email is invalid
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label for="password">Password
                                            <a href="forgot.html" class="float-right">
                                                Lupa Password?
                                            </a>
                                        </label>
                                        <input id="password" placeholder="Masukkan Password" type="password" class="form-control" name="password" required data-eye>
                                        <div class="invalid-feedback">
                                            Password is required
                                        </div>
                                    </div>

                                    <div class="form-group m-0">
                                        <button type="submit" class="btn btn-primary btn-block">
                                            Masuk
                                        </button>
                                    </div>
                                    <div class="mt-4 text-center">
                                        Belum punya akun? <a href="register.php">Daftar</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>

<?php include '../footer_user.php'; ?>