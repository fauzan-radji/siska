<div class="row match-height">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
      </div>
      <div class="card-body">
        <form data-parsley-validate action="/dashboard/pangkalan{{ $edit ? '/' . $pangkalan_id : '' }}" method="post">
          @if ($edit)
            @method('put')
          @endif
          @csrf

          <div class="row">
            <div class="col">
              <div class="form-group mandatory @error('nama') is-invalid @enderror">
                <label class="form-label" for="nama">Nama</label>
                <input class="form-control" id="nama" name="nama" data-parsley-required type="text" value="{{ $nama }}" placeholder="Nama Pangkalan">
                @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group mandatory @error('no_gudep_putra') is-invalid @enderror @error('no_gudep_putri') is-invalid @enderror">
                <label class="form-label" for="">Nomor Gudep</label>
                <div class="d-flex">
                  <div class="col-1">
                    <input class="form-control" id="no_kwarran" type="text" value="{{ $kwarran_nomor }}" disabled readonly>
                  </div>
                  <div class="col">
                    <input class="form-control" name="no_gudep_putra" data-parsley-required data-parsley-type="number" data-parsley-pattern="\d{3}" type="text" value="{{ $no_gudep['putra'] }}" placeholder="Gugus Depan Putra">
                    @error('no_gudep_putra')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col">
                    <input class="form-control" name="no_gudep_putri" data-parsley-required data-parsley-type="number" data-parsley-pattern="\d{3}" type="text" value="{{ $no_gudep['putri'] }}" placeholder="Gugus Depan Putri">
                    @error('no_gudep_putri')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group mandatory @error('ambalan_putra') is-invalid @enderror @error('ambalan_putri') is-invalid @enderror">
                <label class="form-label" for="">Ambalan</label>
                <div class="d-flex">
                  <div class="col">
                    <input class="form-control" name="ambalan_putra" data-parsley-required type="text" value="{{ $ambalan['putra'] }}" placeholder="Ambalan Putra">
                    @error('ambalan_putra')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="col">
                    <input class="form-control" name="ambalan_putri" data-parsley-required type="text" value="{{ $ambalan['putri'] }}" placeholder="Ambalan Putri">
                    @error('ambalan_putri')
                      <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group mandatory">
                <label class="form-label" for="kwarran">Kwartir Ranting</label>
                <select class="form-select @error('kwarran_id') is-invalid @enderror" id="kwarran" name="kwarran_id" data-parsley-required>
                  <option value=''>Pilih Kwartir Ranting</option>
                  @foreach ($kwarrans as $kwarran)
                    <option value="{{ $kwarran->id }}" {{ $kwarran->id === $kwarran_id ? 'selected' : '' }}>{{ $kwarran->nama }}</option>
                  @endforeach
                </select>
                @error('kwarran_id')
                  <div class="invalid-feedback">{{ $message }}</div>
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
