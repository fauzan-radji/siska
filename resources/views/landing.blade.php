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

    <h1>Form Login</h1>
    <form action="/login" method="post">
      @csrf
      <input name="username" type="text">
      <input name="password" type="password">
      <button type="submit">Login</button>
    </form>

    @can('create', \App\Models\Pangkalan::class)
      <h1>Form Daftar Pangkalan</h1>
      <form action="/pangkalan" method="post">
        @csrf
        <h4>Data Pangkalan</h4>

        <div class="mb-3">
          <label class="form-label" for="nama_pangkalan">Nama</label>
          <input class="form-control" id="nama_pangkalan" name="nama_pangkalan" type="text">
        </div>

        <div class="mb-3">
          <label class="form-label" for="kwarran">Kwartir Ranting</label>
          <select class="form-select" id="kwarran" name="kwarran_id">
            @foreach ($kwarrans as $kwarran)
              <option value="{{ $kwarran->id }}">{{ $kwarran->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label" for="">Nomor Gudep</label>
          <div class="d-flex">
            <div class="col-1">
              <input class="form-control" id="no_kwarran" type="text" value="00" disabled readonly>
            </div>
            <div class="col">
              <input class="form-control" name="no_gudep_putra" type="text" placeholder="Gugus Depan Putra">
            </div>
            <div class="col">
              <input class="form-control" name="no_gudep_putri" type="text" placeholder="Gugus Depan Putri">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="">Ambalan</label>
          <div class="d-flex">
            <div class="col">
              <input class="form-control" name="ambalan_putra" type="text" placeholder="Ambalan Putra">
            </div>
            <div class="col">
              <input class="form-control" name="ambalan_putri" type="text" placeholder="Ambalan Putri">
            </div>
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label" for="alamat_pangkalan">Alamat</label>
          <input class="form-control" id="alamat_pangkalan" name="alamat_pangkalan" type="text">
        </div>

        <hr />
        <h4>Data Admin Pangkalan</h4>

        <div class="mb-3">
          <label class="form-label" for="nama_admin">Nama</label>
          <input class="form-control" id="nama_admin" name="nama_admin" type="text">
        </div>

        <div class="mb-3">
          <label class="form-label" for="username_admin">Username</label>
          <input class="form-control" id="username_admin" name="username_admin" type="text">
        </div>

        <div class="mb-3">
          <label class="form-label" for="email_admin">Email</label>
          <input class="form-control" id="email_admin" name="email_admin" type="email">
        </div>

        <div class="mb-3">
          <label class="form-label" for="password_admin">Password</label>
          <input class="form-control" id="password_admin" name="password_admin" type="password">
        </div>

        <button class="btn btn-primary" type="submit">Daftar</button>
      </form>
    @endcan


    @can('create', \App\Models\PesertaDidik::class)
      <h1>Form Daftar Peserta</h1>
      <form action="/peserta_didik" method="post">
        @csrf
        <div class="mb-3">
          <label class="form-label" for="nama">Nama</label>
          <input class="form-control" id="nama" name="nama" type="text">
        </div>

        <div class="mb-3">
          <label class="form-label" for="pangkalan">Pangkalan</label>
          <select class="form-select" id="pangkalan" name="pangkalan_id" required>
            @foreach ($pangkalans as $pangkalan)
              <option value="{{ $pangkalan->id }}">{{ $pangkalan->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="mb-3">
          <label class="form-label" for="username">Username</label>
          <input class="form-control" id="username" name="username" type="text">
        </div>

        <div class="mb-3">
          <label class="form-label" for="email">Email</label>
          <input class="form-control" id="email" name="email" type="email">
        </div>

        <div class="mb-3">
          <label class="form-label" for="password">Password</label>
          <input class="form-control" id="password" name="password" type="password">
        </div>

        <button class="btn btn-primary" type="submit">Daftar</button>
      </form>
    @endcan
  @endauth

  <script src="/js/bootstrap.bundle.min.js"></script>
</body>

</html>
