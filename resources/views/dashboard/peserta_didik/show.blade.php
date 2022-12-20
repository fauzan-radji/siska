@extends('dashboard.layouts.main')

@section('title', $peserta_didik->user->nama)

@section('head')
  {{-- <style>
    .poin-check {
      display: none;
    }

    .poin-check:checked~.belum-check {
      display: none;
    }

    .poin-check:not(:checked)~.sudah-check {
      display: none;
    }
  </style> --}}

  <link href="/css/kartu-anggota.css" rel="stylesheet">
@endsection

@section('main')
  <div class="row">
    <div class="col-md-10">
      <div class="card p-3">
        <div class="row gap-3 align-items-center justify-content-center">
          <div class="col-md-2 text-center">
            <img class="w-100" src="{{ $peserta_didik->foto }}" alt="{{ $peserta_didik->user->nama }}" style="max-width: 20vw;">
          </div>
          <div class="col-md-8">
            <table class="table">
              <tr>
                <th>Nama</th>
                <td>:</td>
                <td>{{ $peserta_didik->user->nama }}</td>
              </tr>
              <tr>
                <th>Username</th>
                <td>:</td>
                <td>{{ $peserta_didik->user->username }}</td>
              </tr>
              <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $peserta_didik->user->email }}</td>
              </tr>
              @if ($peserta_didik->verified)
                <tr>
                  <th>No Anggota</th>
                  <td>:</td>
                  <td>05.02.00-000.008</td>
                </tr>
              @endif
              <tr>
                <th>Terverifikasi</th>
                <td>:</td>
                <td>
                  @if ($peserta_didik->verified)
                    <div class="badge bg-success">Sudah</div>
                  @else
                    <div class="badge bg-danger">Belum</div>
                  @endif
                </td>
              </tr>
            </table>
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

  {{-- Kartu Anggota --}}
  @if ($peserta_didik->verified)
    <div class="row">
      <div class="col-md-10">
        <div class="card overflow-hidden">
          <div class="card-body">
            <img class="w-75 d-block m-auto" id="output"></img>
            @include('dashboard.partials.kta', [
                'id' => $peserta_didik->id,
                'foto' => $peserta_didik->foto,
                'no_anggota' => '05.02.00-000.008',
                'nama' => $peserta_didik->user->nama,
                'tempat_lahir' => 'Konoha',
                'tanggal_lahir' => $peserta_didik->tanggal_lahir,
                'alamat' => $peserta_didik->alamat,
                'no_hp' => $peserta_didik->no_hp,
                'agama' => $peserta_didik->agama ? $peserta_didik->agama->nama : '-',
                'gol_darah' => '-',
                'golongan' => 'Penegak Bantara',
                'jabatan' => 'Pinru',
                'kwarcab' => 'Kota&nbsp;Gorontalo',
                'kwarda' => 'Gorontalo',
                'nama_ketua' => 'Hj. Jusmiati Kiai Demak',
                'nta_ketua' => '05.02.00-000.008',
            ])
            {{-- <iframe src="{{ url("dashboard/peserta_didik/$peserta_didik->id/kartu-anggota") }}" frameborder="0"></iframe> --}}
          </div>
          <div class="card-footer text-center">
            <a class="btn btn-primary" id="download-btn" href=""><i class="bi bi-download"></i> Unduh</a>
          </div>
        </div>
      </div>
    </div>
  @endif

  {{-- Tabel Poin Teruji --}}
  {{-- <div class="table-responsive mb-5">
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
  </div> --}}
@endsection

@section('script')
  @if ($peserta_didik->verified)
    <script src="/js/html2canvas.min.js"></script>
    <script>
      const kta = document.getElementById('kta-{{ $peserta_didik->id }}');
      const outputImg = document.getElementById('output');
      const downloadButton = document.getElementById('download-btn');
      const anggotaName = '{{ $peserta_didik->user->nama }}'.trim().replace(/\W/gi, '-').toLowerCase();

      html2canvas(kta).then(canvas => {
        const dataURL = canvas.toDataURL("image/png");
        outputImg.src = dataURL;
        downloadButton.href = dataURL;
        downloadButton.download = `kta-${anggotaName}.png`;
        kta.style.display = 'none';
      });
    </script>
  @endif
@endsection
