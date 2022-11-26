@extends('dashboard.layouts.main')

@section('title')
  Edit Data Kwarran
@endsection

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Edit Data {{ $kwarran->nama }}</h1>
  </div>

  <form action="/dashboard/kwarran/{{ $kwarran->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" value="{{ $kwarran->nama }}" required>
      @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="nomor">Nomor Kwarran</label>
      <input class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" type="text" value="{{ $kwarran->nomor }}" required>
      @error('nomor')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="kamabiran">Nama Kamabiran</label>
      <input class="form-control @error('kamabiran') is-invalid @enderror" id="kamabiran" name="kamabiran" type="text" value="{{ $kwarran->kamabiran }}" required>
      @error('kamabiran')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="ketua">Nama Ketua</label>
      <input class="form-control @error('ketua') is-invalid @enderror" id="ketua" name="ketua" type="text" value="{{ $kwarran->ketua }}" required>
      @error('kamabiran')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
@endsection
