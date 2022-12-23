<div class="row match-height">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
      </div>
      <div class="card-body">
        <form data-parsley-validate action="/dashboard/peserta_didik{{ $edit ? '/' . $peserta_didik->id : '' }}" method="post">
          @if ($edit)
            @method('put')
          @endif
          @csrf

          <div class="row">
            <div class="col-md-6">
              <div class="form-group mandatory @error('nama') is-invalid @enderror">
                <label class="form-label" for="nama">Nama</label>
                <input class="form-control" id="nama" name="nama" data-parsley-required type="text" value="{{ $nama }}" placeholder="Nama Peserta Didik">
                @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group mandatory @error('username') is-invalid @enderror">
                <label class="form-label" for="username">Username</label>
                <input class="form-control" id="username" name="username" data-parsley-required type="text" value="{{ $username }}" placeholder="Username">
                @error('username')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="{{ $edit ? 'col-md-6' : 'col-12' }}">
              <div class="form-group mandatory @error('email') is-invalid @enderror">
                <label class="form-label" for="email">Email</label>
                <input class="form-control" id="email" name="email" data-parsley-required data-parsley-type="email" type="email" value="{{ $email }}" placeholder="Email Peserta Didik">
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            @if ($edit)
              <div class="col-md-6">
                <div class="form-group @error('no_hp') is-invalid @enderror">
                  <label class="form-label" for="no_hp">Nomor HP</label>
                  <input class="form-control" id="no_hp" name="no_hp" data-parsley-pattern="\(?\+?\d{1,3}\)?[-. ]?\d{3,4}[-. ]?\d{3,7}[-. ]?\d{0,5}" type="text" value="{{ $peserta_didik->no_hp }}" placeholder="Nomor HP">
                  @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            @endif

            @if (!$edit)
              <div class="col-md-6">
                <div class="form-group mandatory @error('password') is-invalid @enderror">
                  <label class="form-label" for="password">Password</label>
                  <input class="form-control" id="password" name="password" data-parsley-required type="password" placeholder="Password">
                  @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group mandatory @error('confirm_password') is-invalid @enderror">
                  <label class="form-label" for="confirm_password">Konfirmasi Password</label>
                  <input class="form-control" id="confirm_password" name="confirm_password" data-parsley-required data-parsley-equalto="#password" type="password" placeholder="Konfirmasi Password">
                  @error('confirm_password')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            @endif

            @if ($edit)
              <div class="col-md-6">
                <div class="form-group mandatory @error('gender') is-invalid @enderror">
                  <label class="form-label d-block">Gender</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="pria" name="gender" data-parsley-required type="radio" value="Laki-laki" {{ $peserta_didik->gender === 'Laki-laki' ? 'checked' : '' }}>
                    <label class="form-check-label" for="pria">Laki-laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="wanita" name="gender" data-parsley-required type="radio" value="Perempuan" {{ $peserta_didik->gender === 'Perempuan' ? 'checked' : '' }}>
                    <label class="form-check-label" for="wanita">Perempuan</label>
                  </div>
                  @error('gender')
                    <p class="text-danger">{{ $message }}</p>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group mandatory @error('alamat') is-invalid @enderror">
                  <label class="form-label" for="alamat">Alamat</label>
                  <input class="form-control" id="alamat" name="alamat" data-parsley-required type="text" value="{{ $peserta_didik->alamat }}" placeholder="Alamat">
                  @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group mandatory @error('tempat_lahir') is-invalid @enderror">
                  <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                  <input class="form-control" id="tempat_lahir" name="tempat_lahir" type="text" value="{{ $peserta_didik->tempat_lahir }}" required placeholder="Tempat Lahir">
                  @error('tempat_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group mandatory @error('tanggal_lahir') is-invalid @enderror">
                  <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                  <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date" value="{{ $peserta_didik->tanggal_lahir }}">
                  @error('tanggal_lahir')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group @error('agama_id') is-invalid @enderror">
                  <label class="form-label" for="agama">Agama</label>
                  <select class="form-select" id="agama" name="agama_id">
                    <option value="">Pilih Agama</option>
                    @foreach ($agamas as $agama)
                      <option value="{{ $agama->id }}" {{ $peserta_didik->agama && $agama->id === $peserta_didik->agama->id ? 'selected' : '' }}>{{ $agama->nama }}</option>
                    @endforeach
                  </select>
                  @error('agama_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group @error('gol_darah') is-invalid @enderror">
                  <label class="form-label" for="agama">Golongan Darah</label>
                  <select class="form-select" id="agama" name="gol_darah">
                    <option value="">Pilih Golongan Darah</option>
                    <option value="A" {{ $peserta_didik->gol_darah === 'A' ? 'selected' : '' }}>A</option>
                    <option value="B" {{ $peserta_didik->gol_darah === 'B' ? 'selected' : '' }}>B</option>
                    <option value="AB" {{ $peserta_didik->gol_darah === 'AB' ? 'selected' : '' }}>AB</option>
                    <option value="O" {{ $peserta_didik->gol_darah === 'O' ? 'selected' : '' }}>O</option>
                  </select>
                  @error('gol_darah')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            @endif
          </div>

          <div class="row">
            <div class="col-12 d-flex gap-2 justify-content-end">
              <button class="btn btn-primary" type="submit">Simpan</button>
              <button class="btn btn-light-secondary" type="reset">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
