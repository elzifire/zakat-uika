<?php
include 'header_user.php';
?>
    </div>
  </div>
</div>
<section class="banner mt-1">
  <div class="imgBx">
    <img src="img/slider/slider-1.jpg" class="active">
    <img src="img/slider/slider-2.jpeg">
    <img src="img/slider/slider-3.jpg">
  </div>
  <div class="contentBx">
    <div class="active">
      <h2>Zakat Masjid IBN KHALDUN</h2>
      <br>
      <br>
      <p>Pembayaran Zakat Lebih Mudah</p>
      <a href="bayarzakat.php">Bayar Zakat <i class="fas fa-arrow-right"></i></a>
    </div>
    <div>
      <h2>Zakat Masjid IBN KHALDUN</h2> <br> <br>
      <p>Pengelolaan data zakat lebih akurat</p>
      <a href="bayarzakat.php">Bayar Zakat <i class="fas fa-arrow-right"></i></a>
    </div>
    <div>
      <h2>Zakat Masjid IBN KHALDUN</h2> <br> <br>
      <p>Dapat dilakukan dimanapun dan kapanpun</p>
      <a href="bayarzakat.php">Bayar Zakat <i class="fas fa-arrow-right"></i></a>
    </div>
  </div>

  <ul class="controls">
    <li onclick="prevSlide();prevSlideText();"></li>
    <li onclick="nextSlide();nextSlideText();"></li>
  </ul>




</section>

<script type="text/javascript">
  const imgBx = document.querySelector('.imgBx');
  const slides = imgBx.getElementsByTagName('img');
  var i = 0;

  function nextSlide() {
    slides[i].classList.remove('active');
    i = (i + 1) % slides.length;
    slides[i].classList.add('active');
  }

  function prevSlide() {
    slides[i].classList.remove('active');
    i = (i - 1 + slides.length) % slides.length;
    slides[i].classList.add('active');
  }

  const contentBx = document.querySelector('.contentBx');
  const slidesText = contentBx.getElementsByTagName('div');
  var j = 0;

  function nextSlideText() {
    slidesText[j].classList.remove('active');
    j = (j + 1) % slidesText.length;
    slidesText[j].classList.add('active');
  }

  function prevSlideText() {
    slidesText[j].classList.remove('active');
    j = (j - 1 + slidesText.length) % slidesText.length;
    slidesText[j].classList.add('active');
  }

  // js auto play
  var repeat = function(activeClass) {
    let active = document.getElementsByClassName('active');
    let i = 1;

    var repeater = () => {
      setTimeout(function() {
        [...active].forEach((activeSlide) => {
          activeSlide.classList.remove('active');
        });

        slides[i].classList.add('active');
        slidesText[i].classList.add('active');
        i++;

        if (slides.length == i) {
          i = 0;
        }
        if (i >= slides.length) {
          return;
        }
        if (slidesText.length == i) {
          i = 0;
        }
        if (i >= slidesText.length) {
          return;
        }
        repeater();
      }, 10000);
    }
    repeater();
  }
  repeat();
</script>
<br>
<?php include 'tagline.php'; ?>
<?php include 'tagline2.php'; ?>
<?php include 'footer_user.php'; ?>