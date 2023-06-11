<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Arsha Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
<link href="{{ asset('Arsha/assets/img/favicon.png') }}" rel="icon">
<link href="{{ asset('Arsha/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

<!-- Vendor CSS Files -->
<link href="{{ asset('Arsha/assets/vendor/aos/aos.css') }}" rel="stylesheet">
<link href="{{ asset('Arsha/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('Arsha/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
<link href="{{ asset('Arsha/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
<link href="{{ asset('Arsha/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
<link href="{{ asset('Arsha/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
<link href="{{ asset('Arsha/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

<!-- Template Main CSS File -->
<link href="{{ asset('Arsha/assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: May 30 2023 with Bootstrap v5.3.0
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>



   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Narasi Sejarah</a></h1>
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href=" {{ route('logout') }}">Logout</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<br>
<br>
<!-- ======= Team Section ======= -->
<section id="team" class="team section-bg">
  <div class="container" data-aos="fade-up">

    <div class="section-title">
      <h2>Narasi Sejarah</h2>
      <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row">

      <div class="col-lg-6" data-aos="zoom-in" data-aos-delay="100">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="Arsha/assets/img/materi.png" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Materi</h4>
            <span>Terjelajahlah Jejak Sejarah</span>
            <p>Mengungkap Kejayaan Kesultanan Banjar</p>
            <div class="social">
              <a href="{{ route('materi.index')}}"><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4 mt-lg-0" data-aos="zoom-in" data-aos-delay="200">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/team-2.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Kuis</h4>
            <span> Kuis Pintar Kesultanan Banjar</span>
            <p>Uji Pengetahuan Sejarah Anda</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="300">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/team-3.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Game</h4>
            <span>Game Seru Kesultanan Banjar</span>
            <p>Petualangan Membuka Pintu Sejarah</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-6 mt-4" data-aos="zoom-in" data-aos-delay="400">
        <div class="member d-flex align-items-start">
          <div class="pic"><img src="assets/img/team/team-4.jpg" class="img-fluid" alt=""></div>
          <div class="member-info">
            <h4>Leaderboard</h4>
            <span>Leaderboard Kesultanan Banjar</span>
            <p>Perebutkan Posisi Teratas</p>
            <div class="social">
              <a href=""><i class="ri-twitter-fill"></i></a>
              <a href=""><i class="ri-facebook-fill"></i></a>
              <a href=""><i class="ri-instagram-fill"></i></a>
              <a href=""> <i class="ri-linkedin-box-fill"></i> </a>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
</section><!-- End Team Section -->


  
  <div class="container footer-bottom clearfix">
    <div class="copyright">
      &copy; Copyright <strong><span>Narasi Sejarah</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
      Designed by <a href="https://bootstrapmade.com/">Kelompok 6</a>
    </div>
  </div>
</footer><!-- End Footer -->

<div id="preloader"></div>
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

<!-- Vendor JS Files -->
<script src="{{ asset('Arsha/assets/vendor/aos/aos.js') }}"></script>
<script src="{{ asset('Arsha/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('Arsha/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('Arsha/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('Arsha/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
<script src="{{ asset('Arsha/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
<script src="{{ asset('Arsha/assets/vendor/php-email-form/validate.js') }}"></script>

<!-- Template Main JS File -->
<script src="{{ asset('Arsha/assets/js/main.js') }}"></script>

</body>

</html>