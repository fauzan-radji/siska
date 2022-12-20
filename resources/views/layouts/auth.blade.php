<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <link href="/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="/css/signin.css" rel="stylesheet">
  @yield('css')
</head>

<body class="d-flex align-items-center" style="height: 100vh">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-6">
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

        <main class="form-signup">
          @yield('form')
        </main>
      </div>
    </div>
  </div>

</body>

</html>