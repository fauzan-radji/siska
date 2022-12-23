@extends('dashboard.layouts.main')

@section('title', 'Daftar Peserta Didik')

@section('head')
  <link href="/mazer/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/mazer/css/pages/simple-datatables.css" rel="stylesheet">
@endsection

@section('main')
  @can('create', \App\Models\PesertaDidik::class)
    <a class="btn btn-primary mb-3" href="/dashboard/peserta_didik/create"><span data-feather="plus"></span> Tambah Peserta Didik</a>
  @endcan

  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          @include('dashboard.partials.tables.peserta_didik')
        </div>
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script>
    const dataTables = [new simpleDatatables.DataTable(document.getElementById("tabel-peserta_didik"))];
  </script>
  <script src="/mazer/js/pages/simple-datatables.js"></script>

  @error('no_anggota')
    <script>
      Swal.fire({
        icon: 'error',
        text: '{{ $message }}'
      });
    </script>
  @enderror
@endsection
