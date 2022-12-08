@extends('dashboard.layouts.main')

@section('title', 'Dashboard | Daftar Peserta Didik')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Peserta Didik</h1>
  </div>

  @can('create', \App\Models\PesertaDidik::class)
    <a class="btn btn-primary" href="/dashboard/peserta_didik/create"><span data-feather="plus"></span> Tambah Peserta Didik</a>
  @endcan

  <h2 class="mt-3 ">
    <span class="position-relative">Daftar Peserta Didik</span>
  </h2>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th class="text-center" scope="col">Foto</th>
          <th class="text-center" scope="col">
            Aksi
            @can('verifyAll', \App\Models\PesertaDidik::class)
              @if ($peserta_didiks->count() > 0)
                | <form class="d-inline" action="/dashboard/peserta_didik/verifyall" method="post">
                  @csrf
                  @if ($peserta_didiks->first()->verified)
                    <button class="btn btn-danger border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin membatalkan verifikasi semua peserta didik?')">Batalkan semua verifikasi</button>
                  @else
                    <input name="action" type="hidden" value="verify">
                    <button class="btn btn-success border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin memverifikasi semua peserta didik?')">Verifikasi Semua</button>
                  @endif
                </form>
              @endif
            @endcan
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse($peserta_didiks as $peserta_didik)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $peserta_didik->user->nama }}</td>
            <td class="text-center"><img src="{{ $peserta_didik->foto }}" alt="{{ $peserta_didik->nama }}"></td>
            <td class="text-center">
              @can('view', $peserta_didik)
                <a class="badge bg-info" href="/dashboard/peserta_didik/{{ $peserta_didik->id }}"><span data-feather="eye"></span></a>
              @endcan
              @can('update', $peserta_didik)
                <a class="badge bg-warning" href="/dashboard/peserta_didik/{{ $peserta_didik->id }}/edit"><span data-feather="edit"></span></a>
              @endcan
              @can('delete', $peserta_didik)
                <form class="d-inline" action="/dashboard/peserta_didik/{{ $peserta_didik->id }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus {{ $peserta_didik->user->nama }}?')"><span data-feather="trash"></span></button>
                </form>
              @endcan
              @can('verify', $peserta_didik)
                <form class="d-inline" action="/dashboard/peserta_didik/{{ $peserta_didik->id }}/verify" method="post">
                  @csrf
                  @if ($peserta_didik->verified)
                    <button class="badge bg-danger border-0" title="Batal Verifikasi" onclick="return confirm('Yakin ingin membatalkan verifikasi {{ $peserta_didik->user->nama }}?')"><span data-feather="x"></span></button>
                  @else
                    <button class="badge bg-success border-0" onclick="return confirm('Yakin ingin memverifikasi {{ $peserta_didik->user->nama }}?')"><span data-feather="check"></span></button>
                  @endif
                </form>
              @endcan
            </td>
          </tr>
        @empty
          <tr>
            @if (Request::is('dashboard/peserta_didik/waitingroom'))
              <td class="text-center" colspan="4">Tidak ada peserta didik yang menunggu verifikasi. <a href="/dashboard/peserta_didik">Cek di sini</a></td>
            @else
              <td class="text-center" colspan="4">Belum ada peserta didik terverifikasi. <a href="/dashboard/peserta_didik/waitingroom">Cek di sini</a></td>
            @endif
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
