@extends('dashboard.layouts.main')

@section('title')
  Edit Data Pembina
@endsection

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Edit Data {{ $pembina->user->nama }}</h1>
  </div>

  <form action="/dashboard/pembina/{{ $pembina->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" value="{{ $pembina->user->nama }}" required>
      @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="username">Username</label>
      <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" value="{{ $pembina->user->username }}" required>
      @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="email">Email</label>
      <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ $pembina->user->email }}" required>
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="pangkalan">Pangkalan</label>
      <select class="form-select @error('pangkalan_id') is-invalid @enderror" id="pangkalan" name="pangkalan_id">
        @foreach ($pangkalans as $pangkalan)
          <option value="{{ $pangkalan->id }}" {{ $pangkalan->id === $pembina->pangkalan_id ? 'selected' : '' }}>{{ $pangkalan->nama }}</option>
        @endforeach
      </select>
      @error('pangkalan_id')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="jabatan">Jabatan</label>
      <select class="form-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
        <option value="Admin Pangkalan" {{ $pembina->jabatan === 'Admin Pangkalan' ? 'selected' : '' }}>Admin Pangkalan</option>
        <option value="Kamabigus" {{ $pembina->jabatan === 'Kamabigus' ? 'selected' : '' }}>Kamabigus</option>
        <option value="Ketua Gugus Depan" {{ $pembina->jabatan === 'Ketua Gugus Depan' ? 'selected' : '' }}>Ketua Gugus Depan</option>
        <option value="Pembina" {{ $pembina->jabatan === 'Pembina' ? 'selected' : '' }}>Pembina</option>
      </select>
      @error('jabatan')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label d-block">Gender</label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" id="pria" name="gender" type="radio" value="Laki-laki" {{ $pembina->gender === 'Laki-laki' ? 'checked' : '' }}>
        <label class="form-check-label" for="pria">Laki-laki</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" id="wanita" name="gender" type="radio" value="Perempuan" {{ $pembina->gender === 'Perempuan' ? 'checked' : '' }}>
        <label class="form-check-label" for="wanita">Perempuan</label>
      </div>
      @error('gender')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="no_hp">No HP</label>
      <input class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" type="tel" value="{{ $pembina->no_hp }}" required>
      @error('no_hp')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="alamat">Alamat</label>
      <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" type="text" value="{{ $pembina->alamat }}" required>
      @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
      <input class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" type="date" value="{{ $pembina->tanggal_lahir }}" required>
      @error('tanggal_lahir')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="agama">Agama</label>
      <select class="form-select @error('agama_id') is-invalid @enderror" id="agama" name="agama_id">
        @foreach ($agamas as $agama)
          <option value="{{ $agama->id }}" {{ $agama->id === $pembina->agama_id ? 'selected' : '' }}>{{ $agama->nama }}</option>
        @endforeach
      </select>
      @error('agama_id')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
@endsection
