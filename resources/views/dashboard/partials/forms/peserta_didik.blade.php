<div class="row match-height">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
      </div>
      <div class="card-body">
        <form data-parsley-validate action="/dashboard/peserta_didik{{ $edit ? '/' . $peserta_didik_id : '' }}" method="post">
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
          </div>

          <div class="row">
            <div class="{{ $edit ? 'col-md-6' : 'col' }}">
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
                <div class="form-group mandatory @error('no_hp') is-invalid @enderror">
                  <label class="form-label" for="no_hp">Nomor HP</label>
                  <input class="form-control" id="no_hp" name="no_hp" data-parsley-required data-parsley-pattern="\(?\+?\d{1,3}\)?[-. ]?\d{3,4}[-. ]?\d{3,7}[-. ]?\d{0,5}" type="text" value="{{ $no_hp }}" placeholder="Nomor HP">
                  @error('no_hp')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            @endif
          </div>

          @if (!$edit)
            <div class="row">
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
            </div>
          @endif

          @if ($edit)
            <div class="row">
              <div class="col-md-6">
                <div class="form-group mandatory @error('gender') is-invalid @enderror">
                  <label class="form-label d-block">Gender</label>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="pria" name="gender" data-parsley-required type="radio" value="Laki-laki" {{ $gender === 'Laki-laki' ? 'checked' : '' }}>
                    <label class="form-check-label" for="pria">Laki-laki</label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" id="wanita" name="gender" data-parsley-required type="radio" value="Perempuan" {{ $gender === 'Perempuan' ? 'checked' : '' }}>
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
                  <input class="form-control" id="alamat" name="alamat" data-parsley-required type="text" value="{{ $alamat }}" placeholder="Alamat">
                  @error('alamat')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-md-6">
                <div class="form-group mandatory @error('tanggal_lahir') is-invalid @enderror">
                  <label class="form-label" for="tanggal_lahir">Tanggal Lahir</label>
                  <input class="form-control" id="tanggal_lahir" name="tanggal_lahir" type="date" value="{{ $tanggal_lahir }}">
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
                      <option value="{{ $agama->id }}" {{ $agama->id === $agama_id ? 'selected' : '' }}>{{ $agama->nama }}</option>
                    @endforeach
                  </select>
                  @error('agama_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                  @enderror
                </div>
              </div>
            </div>
          @endif

          <div class="row">
            <div class="col-12 d-flex justify-content-end">
              <button class="btn btn-primary me-1 mb-1" type="submit">Submit</button>
              <button class="btn btn-light-secondary me-1 mb-1" type="reset">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
