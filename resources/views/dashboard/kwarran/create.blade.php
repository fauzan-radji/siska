@extends('dashboard.layouts.main')

@section('title', 'Tambah Kwarran')

@section('main')
  {{-- <form action="/dashboard/kwarran" method="post">
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
  </form> --}}
  @php
    $title = 'Data Kwartir Ranting';
    $edit = false;
    $nama = old('nama');
    $nomor = old('nomor');
    $kamabiran = old('kamabiran');
    $ketua = old('ketua');
  @endphp
  @include('dashboard.partials.forms.kwarran')
@endsection

@section('script')
  <script src="/mazer/extensions/jquery/jquery.min.js"></script>
  <script src="/mazer/extensions/parsleyjs/parsley.min.js"></script>
  <script src="/mazer/js/pages/parsley.js"></script>
@endsection
