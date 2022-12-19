@extends('dashboard.layouts.main')

@section('title', 'Tambah Jadwal')

@section('head')
  <link href="/mazer/extensions/choices.js/public/assets/styles/choices.css" rel="stylesheet">
@endsection

@section('main')
  @include('dashboard.partials.forms.jadwal', [
      'edit' => false,
      'title' => 'Data Jadwal',
      'tanggal' => old('tanggal', Carbon\Carbon::tomorrow(Carbon\CarbonTimeZone::create(8))->toDateString()),
      'poins' => $poins,
      'pembinas' => $pembinas,
      'old_poins' => collect(old('poin_ids')),
      'old_pembinas' => collect(old('pembina_ids')),
  ])
@endsection

@section('script')
  {{-- parsley --}}
  {{-- <script src="/mazer/extensions/jquery/jquery.min.js"></script>
  <script src="/mazer/extensions/parsleyjs/parsley.min.js"></script>
  <script src="/mazer/js/pages/parsley.js"></script> --}}

  {{-- choices --}}
  <script src="/mazer/extensions/choices.js/public/assets/scripts/choices.js"></script>
  <script src="/mazer/js/pages/form-element-select.js"></script>
  <script src="/js/jadwal.form-validator.js"></script>
@endsection
