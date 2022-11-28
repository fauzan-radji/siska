<!DOCTYPE html>
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

</html>
