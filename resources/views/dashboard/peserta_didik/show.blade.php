@extends('dashboard.layouts.main')

@section('title', "Dashboard | {$peserta_didik->user->nama}")

@section('head')
  <style>
    .card {
      border-radius: 8px;
      cursor: pointer;
      @if ($peserta_didik->gender === 'Perempuan')background-color: #fdd;
    @elseif($peserta_didik->gender === 'Laki-laki') background-color: #aff;
      @endif
    }

    .card:before {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 4px;
      height: 100%;
      background-color: #E1BEE7;
      transform: scaleY(1);
      transition: all 0.5s;
      transform-origin: bottom
    }

    .card:after {
      content: "";
      position: absolute;
      left: 0;
      top: 0;
      width: 4px;
      height: 100%;
      background-color: #8E24AA;
      transform: scaleY(0);
      transition: all 0.5s;
      transform-origin: bottom
    }

    .card:hover::after {
      transform: scaleY(1);
    }

    .poin-check {
      display: none;
    }

    .poin-check:checked~.belum-check {
      display: none;
    }

    .poin-check:not(:checked)~.sudah-check {
      display: none;
    }
  </style>
@endsection

@section('main')
  <div class="container my-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-7">
        <div class="card p-3 py-4 border-0 position-relative overflow-hidden">
          <div class="text-center">
            <img class="rounded-circle" src="{{ $peserta_didik->foto }}" alt="{{ $peserta_didik->user->nama }}" width="100">
          </div>
          <div class="text-center mt-3">
            <span class="bg-secondary p-1 px-4 rounded text-white">Peserta Didik</span>
            <h5 class="mt-2 mb-0">{{ $peserta_didik->user->nama }}</h5>
            <span>{{ $peserta_didik->user->email }}</span>
            <div class="px-4 mt-1">
              <p class="mb-1">{{ $peserta_didik->alamat }}</p>
              <p class="mb-1">HP: {{ $peserta_didik->no_hp }}</p>
              <p class="mb-1">Tanggal Lahir: {{ $peserta_didik->tanggal_lahir }}</p>
              <p class="mb-1">{{ $peserta_didik->agama ? $peserta_didik->agama->nama : '-' }}</p>
            </div>
            @can('update', $peserta_didik)
              <a class="btn btn-primary px-4" href="/dashboard/peserta_didik/{{ $peserta_didik->id }}/edit">Edit</a>
            @endcan
            @can('verify', $peserta_didik)
              @if ($peserta_didik->pangkalan->verified && !$peserta_didik->verified)
                <form class="d-inline" action="/dashboard/peserta_didik/{{ $peserta_didik->id }}/verify" method="post">
                  @csrf
                  <button class="btn btn-success px-4" onclick="return confirm('Yakin ingin memverifikasi  {{ $peserta_didik->user->nama }}?')">Verifikasi</button>
                </form>
              @endif
            @endcan
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="table-responsive mb-5">
    <form class="d-inline" action="/dashboard/peserta_didik/{{ $peserta_didik->id }}/teruji" method="post">
      @csrf
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">Nomor</th>
            <th scope="col">Isi</th>
            <th scope="col">Teruji</th>
          </tr>
        </thead>
        <tbody>
          @forelse($peserta_didik->poins as $poin)
            <tr>
              <td>{{ $poin->nomor }}</td>
              <td>{{ Illuminate\Support\Str::limit(strip_tags($poin->isi), 200) }}</td>
              <td class="text-center">
                <input class="poin-check" id="check-{{ $poin->id }}" name="{{ $poin->id }}" type="checkbox" @if ($poin->pivot->teruji) checked @endif>
                @can('uji', $peserta_didik)
                  <label class="sudah-check btn btn-sm btn-success" for="check-{{ $poin->id }}">Sudah</label>
                  <label class="belum-check btn btn-sm btn-danger" for="check-{{ $poin->id }}">Belum</label>
                @else
                  <span class="sudah-check pe-none btn btn-sm btn-success" for="check-{{ $poin->id }}">Sudah</span>
                  <span class="belum-check pe-none btn btn-sm btn-danger" for="check-{{ $poin->id }}">Belum</span>
                @endcan
              </td>
            </tr>
          @empty
            <tr>
              <td class="text-center" colspan="4">No posts found</td>
            </tr>
          @endforelse
        </tbody>
      </table>

      <div class="d-flex justify-content-end">
        @can('uji', $peserta_didik)
          <button class="btn btn-primary" type="submit">Simpan Perubahan</button>
        @endcan
      </div>
    </form>
  </div>
@endsection
