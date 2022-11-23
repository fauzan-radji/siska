@extends('dashboard.layouts.main')

@section('title')
  Dashboard | {{ $kwarran->nama }}
@endsection

@section('head')
  <style></style>
@endsection

@section('main')
  <table>
    <tr>
      <td>Nama</td>
      <td>{{ $kwarran->nama }}</td>
    </tr>
    <tr>
      <td>Kamabiran</td>
      <td>{{ $kwarran->kamabiran }}</td>
    </tr>
    <tr>
      <td>Ketua Kwarran</td>
      <td>{{ $kwarran->ketua }}</td>
    </tr>
    <tr>
      <td>Jumlah Pangkalan</td>
      <td>{{ $kwarran->pangkalans->count() }}</td>
    </tr>
  </table>

  <a href="/dashboard/kwarran/{{ $kwarran->id }}/edit">Edit</a>
@endsection
