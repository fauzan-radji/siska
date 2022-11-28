@extends('layouts.auth')

@section('title')
  Login
@endsection

@section('form')
  <h1 class="h3 mb-3 fw-normal text-center">Login</h1>

  <form action="/login" method="post">
    {{-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> --}}
    @csrf
    <div class="group">
      <div class="form-floating">
        <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" placeholder="Username">
        <label for="username">Username</label>
      </div>
      <div class="form-floating">
        <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" placeholder="Password">
        <label for="password">Password</label>
      </div>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  </form>
  <p class="mt-3 text-center text-muted">Belum punya akun? <a href="/register/peserta_didik">Daftar sekarang</a></p>
@endsection
