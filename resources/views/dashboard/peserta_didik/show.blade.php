@extends('dashboard.layouts.main')

@section('title', $peserta_didik->user->nama)

@section('head')
  <style>
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

  <link href="/css/kartu-anggota.css" rel="stylesheet">
@endsection

@section('main')
  <div class="container my-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-5">
        <div class="card h-100 p-3 py-4 border-0 position-relative overflow-hidden">
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
      <div class="col-md-7">
        <div class="card h-100 d-flex justify-content-center align-items-center">
          @include('dashboard.partials.kta', [
              'foto' => $peserta_didik->foto,
              'no_anggota' => '05.02.00-000.008',
              'nama' => $peserta_didik->user->nama,
              'tempat_lahir' => 'Konoha',
              'tanggal_lahir' => $peserta_didik->tanggal_lahir,
              'alamat' => $peserta_didik->alamat,
              'no_hp' => $peserta_didik->no_hp,
              'agama' => $peserta_didik->agama->nama,
              'gol_darah' => '-',
              'golongan' => 'Penegak Bantara',
              'jabatan' => 'Pinru',
              'kwarcab' => 'Kota&nbsp;Gorontalo',
              'kwarda' => 'Gorontalo',
              'nama_ketua' => 'Hj. Jusmiati Kiai Demak',
              'nta_ketua' => '05.02.00-000.008',
          ])
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
