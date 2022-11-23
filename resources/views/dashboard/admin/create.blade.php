@extends('dashboard.layouts.main')

@section('title')
  Tambah Admin
@endsection

@section('head')
  <style></style>
@endsection

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Tambah Admin</h1>
  </div>

  <form action="/dashboard/admin" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control" id="nama" name="nama" type="text" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="username">Username</label>
      <input class="form-control" id="username" name="username" type="text" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="email">Email address</label>
      <input class="form-control" id="email" name="email" type="email" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="password">Password</label>
      <input class="form-control" id="password" name="password" type="password" required>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
@endsection
