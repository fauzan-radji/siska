@extends('dashboard.layouts.main')

@section('title')
  Edit Data Admin
@endsection

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Edit Data {{ $admin->user->nama }}</h1>
  </div>

  <form action="/dashboard/admin/{{ $admin->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" value="{{ $admin->user->nama }}" required>
      @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="username">Username</label>
      <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" value="{{ $admin->user->username }}" required>
      @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="email">Email address</label>
      <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ $admin->user->email }}" required>
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
@endsection
