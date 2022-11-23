@extends('dashboard.layouts.main')

@section('title')
  Tambah Kwarran
@endsection

@section('head')
  <style></style>
@endsection

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Tambah Kwarran</h1>
  </div>

  <form action="/dashboard/kwarran" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control" id="nama" name="nama" type="text" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="kamabiran">Kamabiran</label>
      <input class="form-control" id="kamabiran" name="kamabiran" type="text" required>
    </div>
    <div class="mb-3">
      <label class="form-label" for="ketua">Ketua Kwarran</label>
      <input class="form-control" id="ketua" name="ketua" type="text" required>
    </div>
    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
@endsection
