@extends('layouts.auth')

@section('title', 'Register Pangkalan')

@section('form')
  <h1 class="h3 mb-3 fw-normal text-center">Register Admin Pangkalan</h1>

  <form action="/register/admin_pangkalan" method="post">
    @csrf
    <input name="nama_pangkalan" type="hidden" value="{{ $nama_pangkalan }}" readonly>
    <input name="kwarran_id" type="hidden" value="{{ $kwarran_id }}" readonly>
    <input name="jenjang_pembinaan" type="hidden" value="{{ $jenjang_pembinaan }}" readonly>
    {{-- <input name="no_gudep_putra" type="hidden" value="{{ $no_gudep_putra }}" readonly>
    <input name="no_gudep_putri" type="hidden" value="{{ $no_gudep_putri }}" readonly>
    <input name="ambalan_putra" type="hidden" value="{{ $ambalan_putra }}" readonly>
    <input name="ambalan_putri" type="hidden" value="{{ $ambalan_putri }}" readonly> --}}
    <input name="alamat_pangkalan" type="hidden" value="{{ $alamat_pangkalan }}" readonly>

    <div class="mb-3">
      <label class="form-label" for="nama_admin">Nama</label>
      <input class="form-control @error('nama_admin') is-invalid @enderror" id="nama_admin" name="nama_admin" type="text" value="{{ old('nama_admin') }}" autofocus>
      @error('nama_admin')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="username_admin">Username</label>
      <input class="form-control @error('username_admin') is-invalid @enderror" id="username_admin" name="username_admin" type="text" value="{{ old('username_admin') }}">
      @error('username_admin')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="email_admin">Email</label>
      <input class="form-control @error('email_admin') is-invalid @enderror" id="email_admin" name="email_admin" type="email" value="{{ old('email_admin') }}">
      @error('email_admin')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="password_admin">Password</label>
      <input class="form-control @error('password_admin') is-invalid @enderror" id="password_admin" name="password_admin" type="password">
      @error('password_admin')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button class="w-100 btn btn-primary" type="submit">Daftar</button>
  </form>
@endsection
