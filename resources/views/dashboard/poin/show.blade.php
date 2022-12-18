@extends('dashboard.layouts.main')

@section('title', 'Poin')

@section('main')
  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-header">
          <h5>Poin {{ $poin->nomor }}</h5>
        </div>
        <div class="card-body">
          <p>{{ $poin->isi }}</p>
        </div>
      </div>
    </div>
  </div>
@endsection
