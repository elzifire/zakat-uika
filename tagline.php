<?php
$result = totalpemasukan_zakat();
$result_penyaluran = totalpenyaluran_zakat();
?>
<!-- Fact section -->
<style>
    .fact-section {
        background-position: center center;
        position: relative;
    }

    .fact-section:after {
        position: absolute;
        content: '';
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        background: #000;
        opacity: 0.8;
    }

    .fact-section .container {
        position: relative;
        z-index: 1;
    }

    .fact {
        text-align: center;
    }

    .fact-icon {
        font-size: 48px;
        color: #fff;
        width: 40px;
        display: inline-block;
    }

    .fact-text {
        padding-left: 20px;
        display: inline-block;
        text-align: center;
    }

    .fact-text h2 {
        color: #f6783a;
        font-weight: 400;
    }

    .fact-text p {
        margin-bottom: 0;
        text-transform: uppercase;
        color: #fff;
    }
</style>
</div>
</div>
</div>
<div class="container-fluid">
    <section class="fact-section spad set-bg mt-lg-5" style="background-image: url(img/banner/fact-bg.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-lg-3 fact mt-5">
                    <div class="fact-icon my-2">
                        <i class="fas fa-money-check"></i>
                    </div>
                    <div class="fact-text mb-4">
                        <?php while ($a = mysqli_fetch_assoc($result)) { ?>
                            <h2><?php echo "Rp. " . rupiah($pemasukan = $a['totalpemasukan']) ?></h2>
                        <?php } ?>
                        <p>Pemasukan Zakat</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fact mt-5">
                    <div class="fact-icon my-2">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <div class="fact-text mb-4">
                        <?php while ($b = mysqli_fetch_assoc($result_penyaluran)) { ?>
                            <h2><?php echo "Rp. " . rupiah($pengeluaran = $b['jumlah']) ?></h2>
                        <?php } ?>
                        <p>Penyaluran Zakat</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fact mt-5">
                    <div class="fact-icon my-2">
                        <i class="fas fa-money-check-alt"></i>
                    </div>
                    <div class="fact-text mb-4">
                        <h2><?php $total = ($pemasukan - $pengeluaran);
                            echo "Rp. " . rupiah($total) ?></h2>
                        <p>Total Kas Zakat</p>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3 fact">
                    <div>
                        <i class="fas fa-edit"></i>
                    </div>
                    <a class="boxed-btn mt-4" href="penyaluran_zakat.php">Rincian Penyaluran Zakat</a>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- Fact section end-->