@extends('dashboard.layouts.main')

@section('title', 'Jadwal')

@section('head')
  <link href="/mazer/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/mazer/css/pages/simple-datatables.css" rel="stylesheet">
@endsection

@section('main')
  @can('create', \App\Models\Jadwal::class)
    <a class="btn btn-primary mb-3" href="/dashboard/jadwal/create"><span data-feather="plus"></span> Tambah Jadwal</a>
  @endcan

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          @include('dashboard.partials.tables.jadwal', ['jadwals' => $jadwals])
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script>
    const dataTables = [new simpleDatatables.DataTable(document.getElementById("tabel-jadwal"))];
  </script>
  <script src="/mazer/js/pages/simple-datatables.js"></script>
@endsection
