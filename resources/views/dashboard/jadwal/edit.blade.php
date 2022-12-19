@extends('dashboard.layouts.main')

@section('title', 'Ubah Jadwal')

@section('head')
  <link href="/mazer/extensions/choices.js/public/assets/styles/choices.css" rel="stylesheet">
@endsection

@section('main')
  @include('dashboard.partials.forms.jadwal', [
      'edit' => true,
      'jadwal_id' => $jadwal->id,
      'title' => 'Data Jadwal',
      'tanggal' => old('tanggal', $jadwal->tanggal),
      'poins' => $poins,
      'pembinas' => $pembinas,
      'old_poins' => old('poin_ids') ? collect(old('poin_ids')) : $jadwal->poins->map(fn($poin) => $poin->id),
      'old_pembinas' => old('pembina_ids') ? collect(old('pembina_ids')) : $jadwal->pembinas->map(fn($pembina) => $pembina->id),
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
