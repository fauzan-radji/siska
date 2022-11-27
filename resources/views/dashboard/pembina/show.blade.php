@extends('dashboard.layouts.main')

@section('title')
  Dashboard | {{ $pembina->user->nama }}
@endsection

@section('head')
  <style>
    .card {
      border-radius: 8px;
      cursor: pointer;
      @if ($pembina->gender === 'Perempuan')background-color: #fdd;
    @elseif($pembina->gender === 'Laki-laki') background-color: #aff;
      @endif
    }

    .card:before {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 4px;
      height: 100%;
      background-color: #E1BEE7;
      transform: scaleY(1);
      transition: all 0.5s;
      transform-origin: bottom
    }

    .card:after {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 4px;
      height: 100%;
      background-color: #8E24AA;
      transform: scaleY(0);
      transition: all 0.5s;
      transform-origin: bottom
    }

    .card:hover::after {
      transform: scaleY(1);
    }
  </style>
@endsection

@section('main')
  <div class="container mt-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-7">
        <div class="card p-3 py-4 border-0 position-relative overflow-hidden">
          <div class="text-center">
            <img class="rounded-circle" src="{{ $pembina->foto }}" alt="{{ $pembina->user->nama }}" width="100">
          </div>
          <div class="text-center mt-3">
            <span class="bg-secondary p-1 px-4 rounded text-white">{{ $pembina->jabatan }}</span>
            <h5 class="mt-2 mb-0">{{ $pembina->user->nama }}</h5>
            <h6 class="my-2">{{ $pembina->pangkalan->nama }}</h6>
            <span>{{ $pembina->user->email }}</span>
            <div class="px-4 mt-1">
              <p class="mb-1">{{ $pembina->user->username }}</p>
              <p class="mb-1">{{ $pembina->gender }}</p>
              <p class="mb-1">{{ $pembina->alamat }}</p>
              <p class="mb-1">HP: {{ $pembina->no_hp }}</p>
              <p class="mb-1">Tanggal Lahir: {{ $pembina->tanggal_lahir }}</p>
              <p class="mb-1">{{ $pembina->agama ? $pembina->agama->nama : '-' }}</p>
            </div>
            <a class="btn btn-outline-primary px-4" href="/dashboard/pembina/{{ $pembina->id }}/edit">Edit</a>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
