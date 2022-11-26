@extends('dashboard.layouts.main')

@section('title')
  Edit Data Pangkalan
@endsection

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Edit Data {{ $pangkalan->nama }}</h1>
  </div>

  <form action="/dashboard/pangkalan/{{ $pangkalan->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" value="{{ $pangkalan->nama }}" required>
      @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="">Nomor Gudep</label>
      <div class="d-flex">
        <div class="col-1">
          <input class="form-control" id="no_kwarran" type="text" value="{{ $pangkalan->kwarran->nomor }}" disabled readonly>
        </div>
        <div class="col">
          <input class="form-control @error('no_gudep_putra') is-invalid @enderror" name="no_gudep_putra" type="text" value="{{ $no_gudep['putra'] }}" placeholder="Gugus Depan Putra">
        </div>
        <div class="col">
          <input class="form-control @error('no_gudep_putri') is-invalid @enderror" name="no_gudep_putri" type="text" value="{{ $no_gudep['putri'] }}" placeholder="Gugus Depan Putri">
        </div>
      </div>
      @error('no_gudep_putra')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      @error('no_gudep_putri')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="">Ambalan</label>
      <div class="d-flex">
        <div class="col">
          <input class="form-control @error('ambalan_putra') is-invalid @enderror" name="ambalan_putra" type="text" value="{{ $ambalan['putra'] }}" placeholder="Ambalan Putra">
        </div>
        <div class="col">
          <input class="form-control @error('ambalan_putri') is-invalid @enderror" name="ambalan_putri" type="text" value="{{ $ambalan['putri'] }}" placeholder="Ambalan Putri">
        </div>
      </div>
      @error('ambalan_putra')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
      @error('ambalan_putri')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="kwarran">Kwartir Ranting</label>
      <select class="form-select @error('kwarran_id') is-invalid @enderror" id="kwarran" name="kwarran_id">
        @foreach ($kwarrans as $kwarran)
          <option value="{{ $kwarran->id }}" {{ $kwarran->id === $pangkalan->kwarran_id ? 'selected' : '' }}>{{ $kwarran->nama }}</option>
        @endforeach
      </select>
      @error('kwarran_id')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="alamat">Alamat</label>
      <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" type="text" value="{{ $pangkalan->alamat }}" required>
      @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
@endsection
