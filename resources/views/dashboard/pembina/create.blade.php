@extends('dashboard.layouts.main')

@section('title', 'Tambah Pembina')

@section('main')
  @include('dashboard.partials.forms.pembina', [
      'edit' => false,
      'title' => 'Data Pembina',
      'pembina_id' => '',
      'nama' => old('nama'),
      'username' => old('username'),
      'email' => old('email'),
      'jabatan' => old('jabatan'),
  ])
  {{-- <form action="/dashboard/pembina" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label" for="nama">Nama</label>
      <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" type="text" required>
      @error('nama')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="jabatan">Jabatan</label>
      <select class="form-select @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan">
        <option value="Admin Pangkalan">Admin Pangkalan</option>
        <option value="Kamabigus">Kamabigus</option>
        <option value="Ketua Gugus Depan">Ketua Gugus Depan</option>
        <option value="Pembina" selected>Pembina</option>
      </select>
      @error('jabatan')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>

    <div class="mb-3">
      <label class="form-label" for="username">Username</label>
      <input class="form-control @error('username') is-invalid @enderror" id="username" name="username" type="text" required>
      @error('username')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label" for="email">Email address</label>
      <input class="form-control @error('email') is-invalid @enderror" id="email" name="email" type="email" required>
      @error('email')
        <div class="invalid-feedback">{{ $message }}</div>
      @enderror
    </div>
    <div class="mb-3">
      <label class="form-label" for="password">Password</label>
      <input class="form-control @error('password') is-invalid @enderror" id="password" name="password" type="password" required>
      @error('password')
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
