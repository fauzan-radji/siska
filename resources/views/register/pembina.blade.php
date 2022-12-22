@extends('layouts.auth')

@section('title', 'Register Pembina')

@section('form')
  <h1 class="h3 mb-3 fw-normal text-center">Register Pembina</h1>

  <form action="/register/pembina" method="post">
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
    @csrf
    <div class="group">
      {{-- Nama --}}
      <div class="form-floating">
        <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" value="{{ old('nama') }}" autofocus placeholder="Nama">
        <label for="nama">Nama</label>
        @error('nama')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Pangkalan --}}
      <div class="form-floating">
        <select class="form-select @error('pangkalan_id') is-invalid @enderror" id="pangkalan" name="pangkalan_id">
          @foreach ($pangkalans as $pangkalan)
            <option value="{{ $pangkalan->id }}" @if (old('pangkalan_id') == $pangkalan->id) selected @endif>{{ $pangkalan->nama }}</option>
          @endforeach
        </select>
        <label class="form-label" for="pangkalan">Pangkalan</label>
        @error('pangkalan_id')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      <p class="my-2 text-center text-muted"><small>Pangkalan belum terdaftar? <a href="/register/pangkalan">Daftarkan pangkalan</a></small></p>
    </div>

    <div class="group">
      {{-- Username --}}
      <div class="form-floating">
        <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" value="{{ old('username') }}" placeholder="Username">
        <label for="username">Username</label>
        @error('username')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Email --}}
      <div class="form-floating">
        <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ old('email') }}" placeholder="Email">
        <label for="email">Email</label>
        @error('email')
          <div class="invalid-feedback">{{ $message }}</div>
        @enderror
      </div>
      {{-- Password --}}
      <div class="form-floating">
        <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Password">
        <label for="password">Password</label>
        @error('password')
          <div class="invalid-feedback">{{ $messsage }}</div>
        @enderror
      </div>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Daftar</button>
    {{-- <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p> --}}
  </form>
  <p class="mt-3 mb-0 text-center text-muted">Sudah punya akun? <a href="/login">Login</a></p>
  <p class="mt-0 text-center text-muted"><small>Atau</small><br><a href="/register/peserta_didik">Daftar sebagai Peserta Didik</a></p>
@endsection
