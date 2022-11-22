<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Dashboard Template · Bootstrap v5.2</title>

  <link href="/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="/css/dashboard.css" rel="stylesheet">
</head>

<body>
  @include('dashboard.partials.navbar')

  <div class="container-fluid">
    <div class="row">
      @include('dashboard.partials.sidebar')

      @yield('main')
    </div>
  </div>

  <script src="/js/bootstrap.bundle.min.js"></script>
  <script src="/js/feather.min.js"></script>
  <script src="/js/Chart.min.js"></script>
  <script src="/js/dashboard.js"></script>

  @yield('script')
</body>

</html>
