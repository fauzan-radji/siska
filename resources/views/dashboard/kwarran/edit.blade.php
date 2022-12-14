@extends('dashboard.layouts.main')

@section('title', 'Edit Data Kwarran')

@section('main')
  @php
    $title = $kwarran->nama;
    $edit = true;
    $nama = $kwarran->nama;
    $nomor = $kwarran->nomor;
    $kamabiran = $kwarran->kamabiran;
    $ketua = $kwarran->ketua;
  @endphp
  @include('dashboard.partials.forms.kwarran')
@endsection

@section('script')
  <script src="/mazer/extensions/jquery/jquery.min.js"></script>
  <script src="/mazer/extensions/parsleyjs/parsley.min.js"></script>
  <script src="/mazer/js/pages/parsley.js"></script>
@endsection
