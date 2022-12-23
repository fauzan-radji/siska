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


  @can('verify', $peserta_didik)
    <link href="/mazer/extensions/sweetalert2/sweetalert2.min.css" rel="stylesheet">
  @endcan

  <link href="/css/kartu-anggota.css" rel="stylesheet">
@endsection

@section('main')
  <div class="row">
    <div class="col-md-10">
      <div class="card p-3">
        <div class="row gap-3 align-items-center justify-content-center">
          <div class="col-md-2 d-flex justify-content-center align-items-center rounded-3 overflow-hidden p-0" style="background-color: #0004; aspect-ratio: 3 /4">
            <img class="w-100 h-100" src="{{ $peserta_didik->foto }}" alt="{{ $peserta_didik->user->nama }}" style="object-fit: cover;" style="max-width: 20vw;">
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
                  <td>{{ $peserta_didik->no_anggota }}</td>
                </tr>
              @endif
              <tr>
                <th>Golongan</th>
                <td>:</td>
                <td>{{ $peserta_didik->golongan }}</td>
              </tr>
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
              <a class="btn btn-primary px-4" href="/dashboard/peserta_didik/{{ $peserta_didik->id }}/edit"><i class="bi bi-pencil-square"></i> Edit</a>
            @endcan
            @can('verify', $peserta_didik)
              @if ($peserta_didik->pangkalan->verified && !$peserta_didik->verified)
                <form class="d-inline" action="/dashboard/peserta_didik/{{ $peserta_didik->id }}/verify" method="post">
                  @csrf
                  <input name="no_anggota" type="hidden">
                  <button class="btn btn-success px-4" onclick="verify('{{ $peserta_didik->user->nama }}', this); return false;"><i class="bi bi-check-lg"></i> Verifikasi</button>
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
            <div style="transform: translateX(200%)">
              @include('dashboard.partials.kta', ['peserta_didik' => $peserta_didik])
            </div>
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

  @can('verify', $peserta_didik)
    {{-- Sweet Alert --}}
    <script src="/mazer/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script>
      async function verify(peserta_didik, btn) {
        const {
          value: text
        } = await Swal.fire({
          title: peserta_didik,
          input: 'text',
          inputLabel: 'Nomor Tanda Anggota ' + peserta_didik,
          showCancelButton: true,
          cancelButtonText: 'Batal',
          confirmButtonText: 'Verifikasi'
        });

        if (text) {
          btn.previousElementSibling.value = text;
          btn.form.submit();
        } else {
          Swal.fire({
            icon: "error",
            title: "Error",
            text: "Gagal memverifikasi " + peserta_didik
          });
        }
      }
    </script>
  @endcan
@endsection
