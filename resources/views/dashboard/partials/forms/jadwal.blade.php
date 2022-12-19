<div class="row match-height">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title">{{ $title }}</h4>
      </div>
      <div class="card-body">
        <form id="form-jadwal" action="/dashboard/jadwal{{ $edit ? '/' . $jadwal_id : '' }}" method="post">
          @if ($edit)
            @method('put')
          @endif
          @csrf

          <div class="row">
            <div class="col">
              <div class="form-group mandatory @error('tanggal') is-invalid @enderror">
                <label class="form-label" for="tanggal">Tanggal Pengujian</label>
                <input class="form-control" id="tanggal" name="tanggal" data-validate="required" type="date" value="{{ $tanggal }}" min="{{ Carbon\Carbon::tomorrow(Carbon\CarbonTimeZone::create(8))->toDateString() }}">
                @error('tanggal')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group mandatory @error('poin_ids[]') is-invalid @enderror">
                <label class="form-label" for="poin_id">Poin Pengujian</label>
                <select class="form-select mb-0 choices multiple-remove" id="poin_id" name="poin_ids[]" data-validate="required" multiple>
                  <option value="">Pilih Poin Pengujian</option>
                  @foreach ($poins as $poin)
                    <option value="{{ $poin->id }}" @if ($old_poins->contains($poin->id)) selected @endif>{{ $poin->nomor }}: {{ Illuminate\Support\Str::limit(strip_tags($poin->isi), 20) }}</option>
                  @endforeach
                </select>
                @error('poin_ids[]')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group mandatory @error('pembina_ids[]') is-invalid @enderror">
                <label class="form-label" for="pembina_id">Penguji</label>
                <select class="form-select choices multiple-remove" id="pembina_id" name="pembina_ids[]" data-validate="required" multiple>
                  <option value="">Pilih Penguji</option>
                  @foreach ($pembinas as $pembina)
                    <option value="{{ $pembina->id }}" @if ($old_pembinas->contains($pembina->id)) selected @endif>{{ $pembina->user->nama }}</option>
                  @endforeach
                </select>
                @error('pembina_ids[]')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12 d-flex justify-content-end">
              <button class="btn btn-primary me-1 mb-1" id="button-submit" type="submit">Submit</button>
              <button class="btn btn-light-secondary me-1 mb-1" type="reset">Reset</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
