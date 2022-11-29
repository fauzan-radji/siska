@extends('dashboard.layouts.main')

@section('title')
  Dashboard | {{ $pangkalan->nama }}
@endsection

@section('head')
  <style></style>
@endsection

@section('main')
  <table>
    <tr>
      <td>Nama</td>
      <td>{{ $pangkalan->nama }}</td>
    </tr>
    <tr>
      <td>Nomor Gudep</td>
      <td>{{ $pangkalan->no_gudep }}</td>
    </tr>
    <tr>
      <td>Ambalan</td>
      <td>{{ $pangkalan->ambalan }}</td>
    </tr>
    <tr>
      <td>Alamat</td>
      <td>{{ $pangkalan->alamat }}</td>
    </tr>
    <tr>
      <td>Ranting</td>
      <td>{{ $pangkalan->kwarran->nama }}</td>
    </tr>
  </table>

  @can('update', $pangkalan)
    <a href="/dashboard/pangkalan/{{ $pangkalan->id }}/edit">Edit</a>
  @endcan
@endsection
