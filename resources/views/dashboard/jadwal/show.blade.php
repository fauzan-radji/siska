@extends('dashboard.layouts.main')

@section('title', "Jadwal {$jadwal->pangkalan->nama}")

@section('head')
  <link href="/mazer/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/mazer/css/pages/simple-datatables.css" rel="stylesheet">
@endsection

@section('main')
  @can('update', $jadwal)
    <a href="/dashboard/jadwal/{{ $jadwal->id }}/edit">Edit</a>
  @endcan

  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <table class="table">
            <tr>
              <th>Waktu</th>
              <td class="text-center">:</td>
              <td>{{ Carbon\Carbon::parse($jadwal->tanggal)->diffForHumans() }}</td>
            </tr>
            <tr>
              <th>Poin Pengujian</th>
              <td class="text-center">:</td>
              <td>
                @foreach ($jadwal->poins as $poin)
                  <div class="badge bg-primary">
                    {{ $poin->nomor }}
                  </div>
                @endforeach
              </td>
            </tr>
            <tr>
              <th>Penguji</th>
              <td class="text-center">:</td>
              <td>
                @foreach ($jadwal->pembinas as $pembina)
                  <div class="badge bg-primary">
                    {{ $pembina->user->nama }}
                  </div>
                @endforeach
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          @include('dashboard.partials.tables.poin', ['poins' => $jadwal->poins])
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script>
    const dataTables = [new simpleDatatables.DataTable(document.getElementById("tabel-poin"))];
  </script>
  <script src="/mazer/js/pages/simple-datatables.js"></script>
@endsection
