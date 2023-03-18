@extends('dashboard.layouts.main')

@section('title', 'Kartu Anggota ' . $peserta_didik->user->nama)

@section('head')
  <link href="/css/kartu-anggota.css" rel="stylesheet">
@endsection

@section('main')
  <div class="row">
    @if ($peserta_didik->verified)
      <div class="col">
        <div class="card overflow-hidden">
          <div class="card-body">
            @include('dashboard.partials.kta', ['peserta_didik' => $peserta_didik])
          </div>
        </div>
      </div>
    @else
    @endif
  </div>
@endsection
