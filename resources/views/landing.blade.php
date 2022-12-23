<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="image/x-icon" href="/img/black.png" rel="icon" media="(prefers-color-scheme:light)">
  <link type="image/x-icon" href="/img/white.png" rel="icon" media="(prefers-color-scheme:dark)">
  <title>Pramuka Kota Gorontalo</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <script src="/js/bootstrap.bundle.min.js"></script>

  <link href="/css/landing.css" rel="stylesheet" />
  <link type="text/css" href="/mazer/extensions/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet" />
</head>

<body class="mt-5">
  <header>
    <nav class="navbar navbar-expand-lg fixed-top fs-5" id="navbar" style="background-color: #48403A;">
      <div class="container">
        <a class="text-light navbar-brand lh-1" href="#">
          <img class="d-inline-block align-text-bottom" src="/img/logo tunas.png" style="height: 2em; object-fit: contain;">
        </a>
        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" type="button" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="navbar-nav me-auto mb-2 mb-lg-0">
            <a class="nav-link me-3 text-light" href="#">Beranda</a>
            <a class="nav-link me-3 text-light" href="#about">Tentang</a>
            <a class="nav-link me-3 text-light" href="#gambar">Foto</a>
            <a class="nav-link me-3 text-light" href="#sosmed">Kontak</a>
          </div>
          <div class="navbar-nav align-items-start flex-row gap-3">
            @auth
              <a class="nav-link text-light" href="/dashboard">Dashboard</a>
            @else
              <a class="btn btn-outline-light" href="/login">Login</a>
              <a class="btn btn-light" href="/register/peserta_didik">Daftar</a>
            @endauth
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main>
    <div class="carousel slide" id="carouselExampleIndicators" data-bs-ride="carousel">
      <div class="carousel-indicators">
        <button class="active" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" type="button" aria-current="true" aria-label="Slide 1"></button>
        <button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" type="button" aria-label="Slide 2"></button>
        <button data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" type="button" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img class="d-block w-100" src="/img/jumbotron1.png" alt="...">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="/img/jumbotron2.png" alt="...">
        </div>
        <div class="carousel-item">
          <img class="d-block w-100" src="/img/jumbotron3.png" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev" type="button">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" data-bs-target="#carouselExampleIndicators" data-bs-slide="next" type="button">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
    <div id="about" style="height: 50px"></div>
    <div class="container">
      <div class="row mt-5">
        <div class="col-md-6 align-self-center">
          <p class="isi">Gerakan Kepanduan Praja Muda Karana, lebih dikenal sebagai Gerakan Pramuka Indonesia, adalah
            nama organisasi pendidikan nonformal yang menyelenggarakan pendidikan kepanduan di Indonesia. Kata "Pramuka" merupakan singkatan dari Praja Muda Karana, yang memiliki arti Jiwa Muda yang Suka Berkarya.
            di kwartir cabang kota Gorontalo sendiri memiliki 9 kwartir ranting aktif yaitu: Kwaran Kota Barat, Kwaran Kota Selatan, Kwaran Hulonthalangi, Kwaran Dungingi, Kwaran Kota Timur, Kwaran Dumbo Raya, Kwaran Kota Utara, Kwaran Sipatana, dan Kwaran Kota Tengah.</p>
        </div>
        <div class="col-md-6">
          <img class="img-fluid" src="/img/fp1.png">
        </div>
      </div>
      <div class="row">
        <div class="col-md-5 justify-content-center d-flex">
          <img class="img-fluid " src="/img/fp2.png" style="object-fit: contain;">
        </div>
        <div class="col-md-7">
          <p class="isi2">Kwartir Cabang Gerakan Pramuka kota Gorontalo yang saat ini di ketuai oleh ibu Hj. Jusmiati Taha KiayiDemak juga kerap kali mengadakan berbagai macam kegiatan kepramukaan yang tentu saja bertujuan untuk terus mengembangkan, memajukan serta mengobarkan jiwa-jiwa tunas bangsa khususnya Pramuka di Kota Gorontalo yang sering diikuti oleh Pramuka Penegak, Pramuka Pandega di Kota Gorontalo.
            Berbagai macam kegiatan kepramukaan yang banyak di adakan ini juga tidak luput dari peran aktif Dewan Kerja Cabang kota Gorontalo. Dewan Kerja Pramuka Penegak dan Pramuka Pandega yang selanjutnya disingkat Dewan Kerja adalah wadah pembinaan dan pengembangan kaderisasi kepemimpinan ditingkat Kwartir yang beranggotakan Pramuka Pengak dan Pramuka Pandega Putri Putra sebagai bagian integral dari Kwartir dan sebagai badan kelengkapan Kwartir yang diberi wewenang dan kepercayaan untuk mengelola pembinaan dan kegiatan Pramuka Penegak dan Pramuka Pandega sesuai prinsip "Dari, oleh dan untuk Pramuka Penegak dan Pramuka Pandega dengan bimbingan orang dewasa", yang pengelolaannya bersifat kolektif dan kolegial.</p>
        </div>
      </div>
    </div>
    <div id="gambar" style="height: 50px"></div>
    <div class="container">
      <div class="row text-center my-4">
        <h2>Lensa Kegiatan</h2>
      </div>
      <div class="row justify-content-center mb-5">
        <div class="col-md-4 col-sm-6 mt-3">
          <img class="img-fluid img-thumbnail" src="/img/lk1.jpg">
        </div>
        <div class="col-md-4 col-sm-6 mt-3">
          <img class="img-fluid img-thumbnail" src="/img/lk2.jpg">
        </div>
        <div class="col-md-4 col-sm-6 mt-3">
          <img class="img-fluid img-thumbnail" src="/img/lk3.jpg">
        </div>
        <div class="col-md-4 col-sm-6 mt-3">
          <img class="img-fluid img-thumbnail" src="/img/lk4.jpg">
        </div>
        <div class="col-md-4 col-sm-6 mt-3">
          <img class="img-fluid img-thumbnail" src="/img/lk5.jpg">
        </div>
        <div class="col-md-4 col-sm-6 mt-3">
          <img class="img-fluid img-thumbnail" src="/img/lk6.jpg">
        </div>
      </div>
    </div>
    </div>

  </main>
  <footer class="fixed-footer " id="sosmed" style="background-color: #48403A;">
    <div class="container pt-4">
      <div class="row">
        <div class="footer-col">
          <h4>About Pramuka</h4>
          <ul>
            <li><a href="#">About us</a></li>
            <li><a href="#">Contact us</a></li>
            <li><a href="#">Blog</a></li>
          </ul>
        </div>
        <div class="footer-col">
          <h4>Guide and Help</h4>
          <ul>
            <li><a href="#">Care</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="#">Terms and Condition</a></li>
            <li><a href="#">Mitra</a></li>
          </ul>
        </div>
        &emsp;
        &emsp;
        &emsp;
        &emsp;
        &emsp;
        &emsp;
        &emsp;
        &emsp;
        &emsp;
        <div class="footer-col">
          <h4>Follow us on</h4>
          <div class="social-media">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
          </div>
        </div>
      </div>
    </div>
  </footer>



</body>

</html>
{{-- <!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Landing Page</title>

  <link href="/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  @auth
    <h1>Anda sudah login</h1>
  @else
    @if (session()->has('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger">{{ session('error') }}</div>
@endif

<a href="/register/peserta_didik">Daftar</a>
<a href="/login">Login</a>
@endauth

<script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html> --}}
