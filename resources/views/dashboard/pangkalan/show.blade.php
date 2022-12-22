@extends('dashboard.layouts.main')

@section('title', $pangkalan->nama)

@section('head')
  <link href="/mazer/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/mazer/css/pages/simple-datatables.css" rel="stylesheet">
@endsection

@section('main')
  <div class="row">
    <div class="col">
      <div class="card">
        @can('update', $pangkalan)
          <div class="card-header">
            <a class="btn btn-info" href="/dashboard/pangkalan/{{ $pangkalan->id }}/edit"><i class="bi bi-pencil-square"></i> Edit</a>
          </div>
        @endcan
        <div class="card-body">
          <table class="table">
            <tr>
              <th>Nama</th>
              <td class="text-center">:</td>
              <td>{{ $pangkalan->nama }}</td>
            </tr>
            <tr>
              <th>Nomor Gudep</th>
              <td class="text-center">:</td>
              <td>{{ $pangkalan->no_gudep }}</td>
            </tr>
            {{-- <tr>
              <th>Ambalan</th>
              <td class="text-center">:</td>
              <td>{{ $pangkalan->ambalan }}</td>
            </tr> --}}
            <tr>
              <th>Alamat</th>
              <td class="text-center">:</td>
              <td>{{ $pangkalan->alamat }}</td>
            </tr>
            <tr>
              <th>Ranting</th>
              <td class="text-center">:</td>
              <td>{{ $pangkalan->kwarran->nama }}</td>
            </tr>
            <tr>
              <th>Terverifikasi</th>
              <td class="text-center">:</td>
              <td>
                @if ($pangkalan->verified)
                  <div class="badge bg-success">Sudah</div>
                @else
                  <div class="badge bg-danger">Belum</div>
                @endif
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4>Pembina</h4>
        </div>
        <div class="card-body">
          @include('dashboard.partials.tables.pembina', ['pembinas' => $pangkalan->pembinas])
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h4>Peserta Didik</h4>
        </div>
        <div class="card-body">
          @include('dashboard.partials.tables.peserta_didik', ['peserta_didiks' => $pangkalan->peserta_didiks])
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script>
    const dataTables = [
      new simpleDatatables.DataTable(document.getElementById("tabel-pembina")),
      new simpleDatatables.DataTable(document.getElementById("tabel-peserta_didik"))
    ];
  </script>
  <script src="/mazer/js/pages/simple-datatables.js"></script>
@endsection
