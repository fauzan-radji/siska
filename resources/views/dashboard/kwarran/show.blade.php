@extends('dashboard.layouts.main')

@section('title', $kwarran->nama)

@section('head')
  <link href="/mazer/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/mazer/css/pages/simple-datatables.css" rel="stylesheet">
@endsection

@section('main')
  <div class="row">
    <div class="col-md-10">
      <div class="card">
        @can('update', $kwarran)
          <div class="card-header">
            <a class="btn btn-info" href="/dashboard/kwarran/{{ $kwarran->id }}/edit"><i class="bi bi-pencil-square"></i> Edit</a>
          </div>
        @endcan
        <div class="card-body">
          <table class="table">
            <tr>
              <th>Nama</th>
              <th class="text-center">:</th>
              <td>{{ $kwarran->nama }}</td>
            </tr>
            <tr>
              <th>Nomor</th>
              <th class="text-center">:</th>
              <td>{{ $kwarran->nomor }}</td>
            </tr>
            <tr>
              <th>Kamabiran</th>
              <th class="text-center">:</th>
              <td>{{ $kwarran->kamabiran ?? '-' }}</td>
            </tr>
            <tr>
              <th>Ketua Kwarran</th>
              <th class="text-center">:</th>
              <td>{{ $kwarran->ketua ?? '-' }}</td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-header">
          <h4>Pangkalan</h4>
        </div>
        <div class="card-body">
          @include('dashboard.partials.tables.pangkalan', ['pangkalans' => $kwarran->pangkalans])
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script>
    const dataTables = [new simpleDatatables.DataTable(document.getElementById("tabel-pangkalan"))];
  </script>
  <script src="/mazer/js/pages/simple-datatables.js"></script>
@endsection
