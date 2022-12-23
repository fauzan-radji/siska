@extends('dashboard.layouts.main')

@section('title', 'Tambah Peserta Didik')

@section('main')
  @include('dashboard.partials.forms.peserta_didik', [
      'edit' => false,
      'title' => 'Data Peserta Didik',
  
      'peserta_didik' => null,
      'nama' => old('nama'),
      'username' => old('username'),
      'email' => old('email'),
  ])
@endsection

@section('script')
  <script src="/mazer/extensions/jquery/jquery.min.js"></script>
  <script src="/mazer/extensions/parsleyjs/parsley.min.js"></script>
  <script src="/mazer/js/pages/parsley.js"></script>
@endsection
