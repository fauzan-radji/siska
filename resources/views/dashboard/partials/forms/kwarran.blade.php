<div class="row match-height">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
      </div>
      <div class="card-body">
        <form class="form" data-parsley-validate action="/dashboard/kwarran{{ $edit ? '/' . $kwarran->id : '' }}" method="post">
          @if ($edit)
            @method('put')
          @endif
          @csrf

          <div class="row">
            <div class="col-md-6 col-12">
              <div class="form-group mandatory">
                <label class="form-label" for="nama">Nama</label>
                <input class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" data-parsley-required="true" type="text" value="{{ $nama }}" placeholder="Nama Kwarran">
                @error('nama')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="form-group mandatory">
                <label class="form-label" for="nomor">Nomor Kwarran</label>
                <input class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" data-parsley-required="true" type="text" value="{{ $nomor }}" placeholder="Nomor Kwarran">
                @error('nomor')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="form-group mandatory">
                <label class="form-label" for="kamabiran">Nama Kamabiran</label>
                <input class="form-control @error('kamabiran') is-invalid @enderror" id="kamabiran" name="kamabiran" data-parsley-required="true" type="text" value="{{ $kamabiran }}" placeholder="Nama Kamabiran">
                @error('kamabiran')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>

            <div class="col-md-6 col-12">
              <div class="form-group mandatory">
                <label class="form-label" for="ketua">Nama Ketua</label>
                <input class="form-control @error('ketua') is-invalid @enderror" id="ketua" name="ketua" data-parsley-required="true" type="text" value="{{ $ketua }}" placeholder="Nama Ketua Kwarran">
                @error('ketua')
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
