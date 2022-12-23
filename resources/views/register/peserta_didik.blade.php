@extends('layouts.auth')

@section('title', 'Register Peserta Didik')

@section('form')
  <h1 class="h3 mb-3 fw-normal text-center">
    Register Peserta Didik</h1>

  <form action="/register/peserta_didik" method="post">
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
    @csrf
    <div class="group">
      <div class="form-floating">
        <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" value="{{ old('nama') }}" autofocus placeholder="Nama">
        <label for="nama">Nama</label>
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <div class="form-floating">
        <select class="form-select @error('pangkalan_id') is-invalid @enderror" id="pangkalan" name="pangkalan_id">
          <option value="">Pilih Pangkalan</option>
          @foreach ($pangkalans as $pangkalan)
            <option value="{{ $pangkalan->id }}" @if (!$pangkalan->verified) disabled @endif @if (old('pangkalan_id') == $pangkalan->id) selected @endif>
              {{ $pangkalan->nama }}
              @if (!$pangkalan->verified)
                | Belum Terverifikasi
              @endif
            </option>
          @endforeach
        </select>
        <label class="form-label" for="pangkalan">Pangkalan</label>
        @error('pangkalan_id')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>
    <p class="my-2 text-center text-muted"><small>Pangkalan belum terdaftar? <a href="/register/pangkalan">Daftarkan pangkalan</a></small></p>

    <div class="group">
      <div class="form-floating">
        <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" value="{{ old('username') }}" placeholder="Username">
        <label for="username">Username</label>
        @error('username')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-floating">
        <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email">
        <label for="email">Email</label>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-floating">
        <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="Password" placeholder="Password">
        <label for="Password">Password</label>
        @error('password')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
  <p class="mt-3 mb-0 text-center text-muted">Sudah punya akun? <a href="/login">Login</a></p>
  <p class="mt-0 text-center text-muted"><small>Atau</small><br><a href="/register/pembina">Daftar sebagai Pembina</a></p>
@endsection
