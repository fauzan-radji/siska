@extends('dashboard.layouts.main')

@section('title')
  Tambah Pembina
@endsection

@section('head')
  <style></style>
@endsection

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Tambah Pembina</h1>
  </div>

  <form action="/dashboard/pembina" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control" id="nama" name="nama" type="text" required>
    </div>

    <div class="mb-3">
      <label class="form-label" for="jabatan">Jabatan</label>
      <select class="form-select" id="jabatan" name="jabatan">
        <option value="Admin Pangkalan">Admin Pangkalan</option>
        <option value="Kamabigus">Kamabigus</option>
        <option value="Ketua Gugus Depan">Ketua Gugus Depan</option>
        <option value="Pembina" selected>Pembina</option>
      </select>
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
