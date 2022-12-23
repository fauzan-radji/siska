<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <link href="/css/bootstrap.min.css" rel="stylesheet" />
  <link href="/css/login.css" rel="stylesheet" />
</head>

<body>
  <div class="d-flex flex-column flex-md-row overflow-hidden justify-content-center justify-content-md-between align-items-center" style="height: 100vh;">
    <div class="h-100 row justify-content-center align-items-center" style="min-width: 50vw;">
      <div class="col-md-10">
        @if (session()->has('success'))
          <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
          </div>
        @endif

        @if (session()->has('error'))
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button class="btn-close" data-bs-dismiss="alert" type="button" aria-label="Close"></button>
          </div>
        @endif

        <div class="header">
          <h1>Selamat Datang</h1>
          <p>Silahkan lakukan login terlebih dahulu.</p>
        </div>
        <div>
          <form action="/login" method="post">
            @csrf
            <div class="mb-3">
              <label class="form-label" for="username">Username</label>
              <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" autofocus placeholder="Silahkan masukan username" />
              @error('username')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
            <div class="mb-3">
              <label class="form-label" for="password">Password</label>
              <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Silahkan masukan password" />
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>

            <button class="btn btn-lg text-light w-100" type="submit" style="background-color: #48403a">Login</button>
          </form>
          <p class="text-center mt-3">
            Belum punya akun? <a class="text-decoration-none" href="/register/peserta_didik">Daftar</a>
          </p>
        </div>
      </div>
    </div>
    <div class="h-100 d-none d-md-block">
      <div class="h-100 carousel slide" id="carouselIndicator" data-bs-ride="true">
        <div class="carousel-indicators">
          <button class="active" data-bs-target="#carouselIndicator" data-bs-slide-to="0" type="button" aria-current="true" aria-label="Slide 1"></button>
          <button data-bs-target="#carouselIndicator" data-bs-slide-to="1" type="button" aria-label="Slide 2"></button>
          <button data-bs-target="#carouselIndicator" data-bs-slide-to="2" type="button" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner h-100">
          <div class="h-100 carousel-item active">
            <img class="d-block w-100 h-100" src="/img/login1.png" style="object-fit: cover;" />
            <div class="carousel-caption d-none d-md-block">
              <h5>Bina Diri</h5>
            </div>
          </div>
          <div class="h-100 carousel-item">
            <img class="d-block w-100 h-100" src="/img/login2.png" style="object-fit: cover;" />
            <div class="carousel-caption d-none d-md-block">
              <h5>Bina Satuan</h5>
            </div>
          </div>
          <div class="h-100 carousel-item">
            <img class="d-block w-100 h-100" src="/img/login3.png" style="object-fit: cover;" />
            <div class="carousel-caption d-none d-md-block">
              <h5>Bina Masyarakat</h5>
            </div>
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
    </div>
  </div>
  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
