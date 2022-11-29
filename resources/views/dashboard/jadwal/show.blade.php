@extends('dashboard.layouts.main')

@section('title')
  Dashboard | {{ $jadwal->pangkalan->nama }}
@endsection

@section('head')
  <style></style>
@endsection

@section('main')
  <table>
    <tr>
      <td>Waktu</td>
      <td>{{ Carbon\Carbon::parse($jadwal->tanggal)->diffForHumans() }}</td>
    </tr>
    <tr>
      <td>Poin Pengujian</td>
      <td>
        @foreach ($jadwal->poins as $poin)
          <div class="badge bg-primary">
            {{ $poin->nomor }}
          </div>
        @endforeach
      </td>
    </tr>
    <tr>
      <td>Penguji</td>
      <td>
        @foreach ($jadwal->pembinas as $pembina)
          <div class="badge bg-primary">
            {{ $pembina->user->nama }}
          </div>
        @endforeach
      </td>
    </tr>
  </table>

  @can('update', $jadwal)
    <a href="/dashboard/jadwal/{{ $jadwal->id }}/edit">Edit</a>
  @endcan
@endsection
