@extends('dashboard.layouts.main')

@section('title')
  Edit Data Peserta Didik
@endsection

@section('main')
  @include('dashboard.partials.forms.peserta_didik', [
      'edit' => true,
      'title' => $peserta_didik->user->nama,
      'peserta_didik_id' => $peserta_didik->id,
      'nama' => $peserta_didik->user->nama,
      'jabatan' => $peserta_didik->jabatan,
      'username' => $peserta_didik->user->username,
      'email' => $peserta_didik->user->email,
      'no_hp' => $peserta_didik->no_hp,
      'alamat' => $peserta_didik->alamat,
      'gender' => $peserta_didik->gender,
      'agamas' => $agamas,
      'agama_id' => $peserta_didik->agama_id,
      'tanggal_lahir' => $peserta_didik->tanggal_lahir,
  ])

  {{-- <form action="/dashboard/peserta_didik/{{ $peserta_didik->id }}" method="post">
    @method('put')
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" value="{{ $peserta_didik->user->nama }}" required>
      @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="username">Username</label>
      <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" value="{{ $peserta_didik->user->username }}" required>
      @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="email">Email address</label>
      <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" value="{{ $peserta_didik->user->email }}" required>
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="pangkalan">Pangkalan</label>
      <select class="form-select @error('pangkalan_id') is-invalid @enderror" id="pangkalan" name="pangkalan_id">
        @foreach ($pangkalans as $pangkalan)
          <option value="{{ $pangkalan->id }}" {{ $pangkalan->id === $peserta_didik->pangkalan_id ? 'selected' : '' }}>{{ $pangkalan->nama }}</option>
        @endforeach
      </select>
      @error('pangkalan_id')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label d-block">Gender</label>
      <div class="form-check form-check-inline">
        <input class="form-check-input" id="pria" name="gender" type="radio" value="Laki-laki" {{ $peserta_didik->gender === 'Laki-laki' ? 'checked' : '' }}>
        <label class="form-check-label" for="pria">Laki-laki</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" id="wanita" name="gender" type="radio" value="Perempuan" {{ $peserta_didik->gender === 'Perempuan' ? 'checked' : '' }}>
        <label class="form-check-label" for="wanita">Perempuan</label>
      </div>
      @error('gender')
        <p class="text-danger">{{ $message }}</p>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="no_hp">No HP</label>
      <input class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" type="tel" value="{{ $peserta_didik->no_hp }}" required>
      @error('no_hp')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="alamat">Alamat</label>
      <input class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" type="text" value="{{ $peserta_didik->alamat }}" required>
      @error('alamat')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
      <input class="form-control @error('tanggal_lahir') is-invalid @enderror" id="tanggal_lahir" name="tanggal_lahir" type="date" value="{{ $peserta_didik->tanggal_lahir }}" required>
      @error('tanggal_lahir')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="agama">Agama</label>
      <select class="form-select @error('agama_id') is-invalid @enderror" id="agama" name="agama_id">
        @foreach ($agamas as $agama)
          <option value="{{ $agama->id }}" {{ $agama->id === $peserta_didik->agama_id ? 'selected' : '' }}>{{ $agama->nama }}</option>
        @endforeach
      </select>
      @error('agama_id')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
  </form> --}}
@endsection

@section('script')
  <script src="/mazer/extensions/jquery/jquery.min.js"></script>
  <script src="/mazer/extensions/parsleyjs/parsley.min.js"></script>
  <script src="/mazer/js/pages/parsley.js"></script>
@endsection
