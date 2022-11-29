@extends('layouts.auth')

@section('title')
  Register Pangkalan
@endsection

@section('form')
  <h1 class="h3 mb-3 fw-normal text-center">Register Pangkalan</h1>

  <form action="/register/pangkalan" method="post">
    @csrf
    <div class="row">
      <div class="col-6">
        <div class="mb-3">
          <label class="form-label" for="nama_pangkalan">Nama</label>
          <input class="form-control @error('nama_pangkalan') is-invalid @enderror" id="nama_pangkalan" name="nama_pangkalan" type="text" value="{{ old('nama_pangkalan') }}" autofocus required>
          @error('nama_pangkalan')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>

      <div class="col-6">
        <div class="mb-3">
          <label class="form-label" for="kwarran">Kwartir Ranting</label>
          <select class="form-select @error('kwarran_id') is-invalid @enderror" id="kwarran" name="kwarran_id">
            @foreach ($kwarrans as $kwarran)
              <option value="{{ $kwarran->id }}" @if (old('kwarran_id') == $kwarran->id) selected @endif>{{ $kwarran->nama }}</option>
            @endforeach
          </select>
          @error('kwarran_id')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label" for="">Nomor Gudep</label>
      <div class="d-flex">
        <div class="col-1">
          <input class="form-control" id="no_kwarran" type="text" value="00" disabled readonly>
        </div>
        <div class="col">
          <input class="form-control @error('no_gudep_putra') is-invalid @enderror" name="no_gudep_putra" type="text" value="{{ old('no_gudep_putra') }}" required placeholder="Gugus Depan Putra">
          @error('no_gudep_putra')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col">
          <input class="form-control @error('no_gudep_putri') is-invalid @enderror" name="no_gudep_putri" type="text" value="{{ old('no_gudep_putri') }}" required placeholder="Gugus Depan Putri">
          @error('no_gudep_putri')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label" for="">Ambalan</label>
      <div class="d-flex">
        <div class="col">
          <input class="form-control @error('ambalan_putra') is-invalid @enderror" name="ambalan_putra" type="text" value="{{ old('ambalan_putra') }}" required placeholder="Ambalan Putra">
          @error('ambalan_putra')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        <div class="col">
          <input class="form-control @error('ambalan_putri') is-invalid @enderror" name="ambalan_putri" type="text" value="{{ old('ambalan_putri') }}" required placeholder="Ambalan Putri">
          @error('ambalan_putri')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
      </div>
    </div>

    <div class="mb-3">
      <label class="form-label" for="alamat_pangkalan">Alamat</label>
      <input class="form-control @error('alamat_pangkalan') is-invalid @enderror" id="alamat_pangkalan" name="alamat_pangkalan" type="text" value="{{ old('alamat_pangkalan') }}" required>
      @error('alamat_pangkalan')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button class="w-100 btn btn-primary" type="submit">Daftar</button>
  </form>
  <p class="mt-3 mb-0 text-center text-muted">Sudah punya akun? <a href="/login">Login</a></p>
  <hr class="my-2">
  <small class="text-muted d-block text-center">Atau daftar sebagai</small>
  <p class="mt-0 text-center text-muted">
    <a href="/register/pembina">Pembina</a>
    |
    <a href="/register/peserta_didik">Peserta Didik</a>
  </p>
@endsection
