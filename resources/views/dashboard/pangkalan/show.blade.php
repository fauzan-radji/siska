@extends('dashboard.layouts.main')

@section('title', $pangkalan->nama)

@section('main')
  <div class="row">
    <div class="col-md-10">
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
            <tr>
              <th>Ambalan</th>
              <td class="text-center">:</td>
              <td>{{ $pangkalan->ambalan }}</td>
            </tr>
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
          </table>
        </div>
      </div>
    </div>
  </div>
@endsection
