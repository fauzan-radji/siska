<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="/css/dashboard.css" rel="stylesheet">

  @yield('head')
</head>

<body>
  @include('dashboard.partials.navbar')

  <div class="container-fluid">
    <div class="row">
      @include('dashboard.partials.sidebar')

      <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        @if (session()->has('success'))
          <div class="alert alert-success mt-3">{{ session('success') }}</div>
        @endif
        @if (session()->has('error'))
          <div class="alert alert-danger mt-3">{{ session('error') }}</div>
        @endif

        @yield('main')
      </main>
    </div>
  </div>

  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/feather.min.js"></script>
  <script src="/js/Chart.min.js"></script>
  <script src="/js/dashboard.js"></script>

  @yield('script')
</body>

</html>
