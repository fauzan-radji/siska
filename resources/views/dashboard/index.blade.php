@extends('dashboard.layouts.main')

@section('title')
  Dashboard
@endsection

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Selamat datang kembali, {{ auth()->user()->nama }}</h1>
  </div>

  {{-- if admin --}}
  @if (auth()->user()->isAdmin())
    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h2 class="h3 text-center">Data Pangkalan</h2>
            <canvas class="my-4 w-100" id="pangkalan" width="1" height="1"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h2 class="h3 text-center">Data Pembina</h2>
            <canvas class="my-4 w-100" id="pembina" width="1" height="1"></canvas>
          </div>
        </div>
      </div>

      <div class="col-md-4">
        <div class="card">
          <div class="card-body">
            <h2 class="h3 text-center">Data Peserta Didik</h2>
            <canvas class="my-4 w-100" id="pesertaDidik" width="1" height="1"></canvas>
          </div>
        </div>
      </div>
    </div>

    <script>
      const kwarrans = [
        @foreach ($kwarrans as $kwarran)
          '{{ $kwarran->nama }}',
        @endforeach
      ]
      const colors = [
        @foreach ($kwarrans as $kwarran)
          '{{ fake()->hexColor() }}',
        @endforeach
      ];
      const pangkalans = [
        @foreach ($kwarrans as $kwarran)
          {{ $kwarran->pangkalans->count() }},
        @endforeach
      ];
      const pembinas = [
        @foreach ($kwarrans as $kwarran)
          {{ $kwarran->pembinas->count() }},
        @endforeach
      ];
      const peserta_didiks = [
        @foreach ($kwarrans as $kwarran)
          {{ $kwarran->peserta_didiks->count() }},
        @endforeach
      ];
    </script>
  @endif

  {{-- if pembina --}}
  @if (auth()->user()->isPembina())
    <div class="row">
      <div class="col-6 col-md-3">
        <div class="card bg-primary text-white text-center mb-3">
          <div class="card-body">
            <h2 class="fw-normal h4">Jumlah Pembina</h2>
            <p class="display-1 fw-bold">{{ $pembinas->count() }}</p>
          </div>
        </div>
      </div>

      <div class="col-6 col-md-3">
        <div class="card bg-primary text-white text-center mb-3">
          <div class="card-body">
            <h2 class="fw-normal h4">Jumlah Peserta Didik</h2>
            <p class="display-1 fw-bold">{{ $peserta_didiks->count() }}</p>
          </div>
        </div>
      </div>
    </div>
  @endif
@endsection

@if (auth()->user()->isAdmin())
  @section('script')
    <script>
      const kwarrans = [
        @foreach ($kwarrans as $kwarran)
          '{{ $kwarran->nama }}',
        @endforeach
      ]
      const colors = [
        @foreach ($kwarrans as $kwarran)
          '{{ fake()->hexColor() }}',
        @endforeach
      ];
      const pangkalans = [
        @foreach ($kwarrans as $kwarran)
          {{ $kwarran->pangkalans->count() }},
        @endforeach
      ];
      const pembinas = [
        @foreach ($kwarrans as $kwarran)
          {{ $kwarran->pembinas->count() }},
        @endforeach
      ];
      const peserta_didiks = [
        @foreach ($kwarrans as $kwarran)
          {{ $kwarran->peserta_didiks->count() }},
        @endforeach
      ];

      // ======== PANGKALAN ======== //
      new Chart(document.getElementById("pangkalan"), {
        type: "pie",
        data: {
          labels: kwarrans,
          datasets: [{
            label: "Pangkalan",
            data: pangkalans,
            backgroundColor: colors,
            hoverOffset: 4
          }]
        }
      });

      // ======== PEMBINA ======== //
      new Chart(document.getElementById("pembina"), {
        type: "pie",
        data: {
          labels: kwarrans,
          datasets: [{
            label: "Pembina",
            data: pembinas,
            backgroundColor: colors,
            hoverOffset: 4,
          }, ],
        },
      });

      // ======== PESERTA DIDIK ======== //
      new Chart(document.getElementById("pesertaDidik"), {
        type: "pie",
        data: {
          labels: kwarrans,
          datasets: [{
            label: "Peserta Didik",
            data: peserta_didiks,
            backgroundColor: colors,
            hoverOffset: 4,
          }, ],
        },
      });
    </script>
  @endsection
@endif
