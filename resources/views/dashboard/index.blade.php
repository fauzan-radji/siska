@extends('dashboard.layouts.main')

@section('main')
  <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1>Selamat datang kembali, {{ auth()->user()->nama }}</h1>
    </div>

    <h2 class="h3">Data Pangkalan</h2>
    <canvas class="my-4 w-100" id="pangkalan" width="900" height="380"></canvas>

    <h2 class="h3">Data Pembina</h2>
    <canvas class="my-4 w-100" id="pembina" width="900" height="380"></canvas>

    <h2 class="h3">Data Peserta Didik</h2>
    <canvas class="my-4 w-100" id="pesertaDidik" width="900" height="380"></canvas>
  </main>
@endsection
