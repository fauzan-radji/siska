<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/css/login.css" />
</head>

<body>
    <section class="login d-flex">
        <div class="login-left w-50 h-100">
            <div class="row justify-content-center align-items-center h-100">
                <div class="col-6">
                    <div class="header">
                        <h1>Selamat Datang</h1>
                        <p>Silahkan lakukan login terlebih dahulu</p>
                    </div>
                    <div class="login-form">
                        <form action="/login" method="post">
                            @csrf
                            <label for="username" class="form-label">username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Silahkan masukan username" />

                            <label for="password" class="form-label">password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Silahkan masukan password" />
                            <button type="submit" class="signin">login</button>
                            <div class="text-center">
                                <span class="d-inline">belum punya akun?
                                    <a href="/register/peserta_didik" class="text-decoration-none">Daftar</a>
                                </span>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="login-right w-50 h-100">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="true">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                </div>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="/img/login1.png" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bina Diri</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/login2.png" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bina Satuan</h5>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img src="/img/login3.png" class="d-block w-100" alt="..." />
                        <div class="carousel-caption d-none d-md-block">
                            <h5>Bina Masyarakat</h5>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>
    <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>