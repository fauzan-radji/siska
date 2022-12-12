@extends('dashboard.layouts.main')

@section('title', 'Dashboard')

@section('head')
  <link href="/mazer/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/mazer/css/pages/simple-datatables.css" rel="stylesheet">
@endsection

@section('main')
  @if (auth()->user()->isAdmin())
    <section class="row">
      <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                <div class="stats-icon purple mb-2">
                  <i class="iconly-boldLocation"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Kwarran</h6>
                <h6 class="font-extrabold mb-0">{{ $kwarrans->count() }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                <div class="stats-icon blue mb-2">
                  <i class="iconly-boldHome"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Pangkalan</h6>
                <h6 class="font-extrabold mb-0">{{ $pangkalans->count() }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                <div class="stats-icon green mb-2">
                  <i class="iconly-boldUser1"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Pembina</h6>
                <h6 class="font-extrabold mb-0">{{ $pembinas->count() }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="col-6 col-lg-3 col-md-6">
        <div class="card">
          <div class="card-body px-4 py-4-5">
            <div class="row">
              <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                <div class="stats-icon red mb-2">
                  <i class="iconly-boldUser1"></i>
                </div>
              </div>
              <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                <h6 class="text-muted font-semibold">Peserta Didik</h6>
                <h6 class="font-extrabold mb-0">{{ $peserta_didiks->count() }}</h6>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @endif

  @if (!auth()->user()->isPesertaDidik())
    <section class="row">
      {{-- <div class="col-12 col-lg-9"> --}}
      <div class="col-12">
        <div class="row">
          @php
            $colSize = 6;
            if (
                auth()
                    ->user()
                    ->isAdmin()
            ) {
                $colSize = 4;
            }
          @endphp
          @if (auth()->user()->isAdmin())
            <div class="col-md-{{ $colSize }}">
              <div class="card">
                <div class="card-header">
                  <h4>Pangkalan</h4>
                </div>
                <div class="card-body">
                  <div id="chart-pangkalan"></div>
                </div>
              </div>
            </div>
          @endif

          <div class="col-md-{{ $colSize }}">
            <div class="card">
              <div class="card-header">
                <h4>Pembina</h4>
              </div>
              <div class="card-body">
                <div id="chart-pembina"></div>
              </div>
            </div>
          </div>

          <div class="col-md-{{ $colSize }}">
            <div class="card">
              <div class="card-header">
                <h4>Peserta Didik</h4>
              </div>
              <div class="card-body">
                <div id="chart-peserta-didik"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  @else
    <section class="row">
      <div class="col">
        <table class="table table-striped" id="tabel-poin">
          <thead>
            <tr>
              <th>#</th>
              <th>Isi</th>
              <th>Status</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($poins as $poin)
              <tr>
                <td>{{ $poin->nomor }}</td>
                <td>{{ Illuminate\Support\Str::limit(strip_tags($poin->isi), 50) }}</td>
                <td>
                  @if ($poin->pivot->teruji)
                    <span class="badge bg-success">Sudah</span>
                  @else
                    <span class="badge bg-danger">Belum</span>
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </section>
  @endif
@endsection

@section('script')
  <!-- Need: Apexcharts -->
  <script src="/mazer/extensions/apexcharts/apexcharts.min.js"></script>
  <script src="/mazer/js/pages/dashboard.js"></script>

  @if (auth()->user()->isAdmin())
    <script>
      const kwarrans = [
        @foreach ($kwarrans as $kwarran)
          '{{ $kwarran->nama }}',
        @endforeach
      ]
      const kwarranColors = [
        @foreach ($kwarrans as $kwarran)
          "#{{ fake()->regexify('[4-9a-f]{6}') }}",
        @endforeach
      ];
      const pangkalans = [
        @foreach ($kwarrans as $kwarran)
          {{ $kwarran->pangkalans->filter(fn($pangkalan) => $pangkalan->verified)->count() }},
        @endforeach
      ];
      const pembinas = [
        @foreach ($kwarrans as $kwarran)
          {{ $kwarran->pembinas->filter(fn($pembina) => $pembina->verified)->count() }},
        @endforeach
      ];
      const peserta_didiks = [
        @foreach ($kwarrans as $kwarran)
          {{ $kwarran->peserta_didiks->filter(fn($peserta_didik) => $peserta_didik->verified)->count() }},
        @endforeach
      ];

      makeDonut({
        id: 'chart-pangkalan',
        series: pangkalans,
        labels: kwarrans,
        colors: kwarranColors
      });

      makeDonut({
        id: 'chart-pembina',
        series: pembinas,
        labels: kwarrans,
        colors: kwarranColors
      });

      makeDonut({
        id: 'chart-peserta-didik',
        series: peserta_didiks,
        labels: kwarrans,
        colors: kwarranColors
      });
    </script>
  @elseif(auth()->user()->isPembina())
    <script>
      const pembinas = [
        @foreach ($pembinas as $pembina)
          {{ $pembina->verified ? 'true' : 'false' }},
        @endforeach
      ];
      const verifiedPembina = pembinas.filter(pembina => pembina);
      const unverifiedPembina = pembinas.filter(pembina => !pembina);

      makeDonut({
        id: 'chart-pembina',
        series: [verifiedPembina.length, unverifiedPembina.length],
        labels: ['Terverivikasi', 'Belum Terverifikasi'],
        colors: [colors.success, colors.danger]
      });

      const peserta_didiks = [
        @foreach ($peserta_didiks as $peserta_didik)
          {{ $peserta_didik->verified ? 'true' : 'false' }},
        @endforeach
      ];
      const verifiedPesertaDidik = peserta_didiks.filter(peserta_didik => peserta_didik);
      const unverifiedPesertaDidik = peserta_didiks.filter(peserta_didik => !peserta_didik);

      makeDonut({
        id: 'chart-peserta-didik',
        series: [verifiedPesertaDidik.length, unverifiedPesertaDidik.length],
        labels: ['Terverivikasi', 'Belum Terverifikasi'],
        colors: [colors.success, colors.danger]
      });
    </script>
  @elseif(auth()->user()->isPesertaDidik())
    <script src="/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="/mazer/js/pages/simple-datatables.js"></script>
  @endif
@endsection
