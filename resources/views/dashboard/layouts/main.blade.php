<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title')</title>

  <link href="/mazer/css/main/app.css" rel="stylesheet">
  <link href="/mazer/css/main/app-dark.css" rel="stylesheet">
  <link type="image/x-icon" href="/mazer/images/logo/favicon.svg" rel="shortcut icon">
  <link type="image/png" href="/mazer/images/logo/favicon.png" rel="shortcut icon">

  <link href="/mazer/css/shared/iconly.css" rel="stylesheet">

  <!-- Toastify -->
  <link href="/mazer/extensions/toastify-js/src/toastify.css" rel="stylesheet">

  @yield('head')
</head>

<body>
  <div id="app">
    @include('dashboard.partials.sidebar')

    <div id="main">
      <header class="mb-3">
        <a class="burger-btn d-block d-xl-none" href="#">
          <i class="bi bi-justify fs-3"></i>
        </a>
      </header>

      <div class="page-heading">
        <h2>@yield('title')</h2>
      </div>
      <div class="page-content">
        @yield('main')
      </div>

      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-start">
            <p>2021 &copy; Mazer</p>
          </div>
          <div class="float-end">
            <p>Crafted with <span class="text-danger"><i class="bi bi-heart"></i></span> by <a href="https://github.com/fauzan-radji">Fauzan Radji</a></p>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/mazer/js/app.js"></script>

  <!-- Toastify -->
  <script src="/mazer/extensions/toastify-js/src/toastify.js"></script>
  <script>
    const colors = {
      danger: "#dc3545",
      success: "#198754"
    };

    @if (session()->has('success'))
      Toastify({
        text: "{{ session('success') }}",
        duration: 3000,
        close: true,
        backgroundColor: colors.success,
      }).showToast();
    @endif

    @if (session()->has('error'))
      Toastify({
        text: "{{ session('error') }}",
        duration: 3000,
        close: true,
        backgroundColor: colors.danger,
      }).showToast();
    @endif
  </script>

  @yield('script')
</body>

</html>
