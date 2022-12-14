@extends('dashboard.layouts.main')

@section('title', 'Daftar Pangkalan')

@section('head')
  <link href="/mazer/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/mazer/css/pages/simple-datatables.css" rel="stylesheet">
@endsection

@section('main')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @include('dashboard.partials.tables.pangkalan')
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script>
    const dataTable = new simpleDatatables.DataTable(document.getElementById("tabel-pangkalan"));
  </script>
  <script src="/mazer/js/pages/simple-datatables.js"></script>
@endsection
