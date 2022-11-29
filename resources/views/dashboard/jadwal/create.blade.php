@extends('dashboard.layouts.main')

@section('title')
  Tambah Jadwal
@endsection

@section('head')
  <style></style>
@endsection

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Tambah Jadwal</h1>
  </div>

  <form action="/dashboard/jadwal" method="post">
    @csrf
    <div class="mb-3">
      <label class="form-label" for="tanggal">Tanggal</label>
      <input class="form-control" id="tanggal" name="tanggal" type="date" value="{{ old('tanggal', Carbon\Carbon::tomorrow(Carbon\CarbonTimeZone::create(8))->toDateString()) }}" required min="{{ Carbon\Carbon::tomorrow(Carbon\CarbonTimeZone::create(8))->toDateString() }}">
    </div>

    <div class="mb-3">
      <label class="form-label" for="poin_ids[]">Poin Pengujian</label>
      <select class="form-select @error('poin_ids[]') is-invalid @enderror" id="poin_ids[]" name="poin_ids[]" required multiple>
        @foreach ($poins as $poin)
          <option value="{{ $poin->id }}" @if (old('poin_ids[]') == $poin->id) selected @endif>{{ $poin->nomor }}: {{ Illuminate\Support\Str::limit(strip_tags($poin->isi), 30) }}</option>
        @endforeach
      </select>
    </div>

    <div class="mb-3">
      <label class="form-label" for="pembina_ids[]">Penguji</label>
      <select class="form-select @error('pembina_ids[]') is-invalid @enderror" id="pembina_ids[]" name="pembina_ids[]" required multiple>
        @foreach ($pembinas as $pembina)
          <option value="{{ $pembina->id }}" @if (old('pembina_ids[]') == $pembina->id) selected @endif>{{ $pembina->user->nama }}</option>
        @endforeach
      </select>
    </div>

    <button class="btn btn-primary" type="submit">Submit</button>
  </form>
@endsection
