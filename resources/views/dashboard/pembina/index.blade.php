@extends('dashboard.layouts.main')

@section('title', 'Daftar Pembina')

@section('head')
  <link href="/mazer/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/mazer/css/pages/simple-datatables.css" rel="stylesheet">
@endsection

@section('main')
  @can('create', \App\Models\Pembina::class)
    <a class="btn btn-primary mb-3" href="/dashboard/pembina/create"><span data-feather="plus"></span> Tambah Pembina</a>
  @endcan

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4>Pembina</h4>
        </div>
        <div class="card-body">
          @include('dashboard.partials.tables.pembina', ['pembinas' => $pembinas])
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script>
    const dataTables = [new simpleDatatables.DataTable(document.getElementById("tabel-pembina"))];
  </script>
  <script src="/mazer/js/pages/simple-datatables.js"></script>
@endsection
