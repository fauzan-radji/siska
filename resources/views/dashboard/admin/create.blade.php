@extends('dashboard.layouts.main')

@section('title', 'Tambah Admin')

@section('main')
  <form action="/dashboard/admin" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" required>
      @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label" for="username">Username</label>
      <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" required>
      @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label" for="email">Email address</label>
      <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" required>
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label" for="password">Password</label>
      <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" required>
      @error('password')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
@endsection
