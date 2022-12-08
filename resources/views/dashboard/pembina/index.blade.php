@extends('dashboard.layouts.main')

@section('title', 'Dashboard | Daftar Pembina')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Pembina</h1>
  </div>

  @can('create', \App\Models\Pembina::class)
    <a class="btn btn-primary" href="/dashboard/pembina/create"><span data-feather="plus"></span> Tambah Pembina</a>
  @endcan

  <h2 class="mt-3 ">
    <span class="position-relative">Daftar Pembina</span>
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
            @can('verifyAll', \App\Models\Pembina::class)
              @if ($pembinas->count() > 0)
                | <form class="d-inline" action="/dashboard/pembina/verifyall" method="post">
                  @csrf
                  @if ($pembinas->first()->verified)
                    <button class="btn btn-danger border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin membatalkan verifikasi semua pembina?')">Batalkan semua verifikasi</button>
                  @else
                    <input name="action" type="hidden" value="verify">
                    <button class="btn btn-success border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin memverifikasi semua pembina?')">Verifikasi Semua</button>
                  @endif
                </form>
              @endif
            @endcan
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse($pembinas as $pembina)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pembina->user->nama }}</td>
            <td class="text-center"><img src="{{ $pembina->foto }}" alt="{{ $pembina->nama }}"></td>
            <td class="text-center">
              @can('view', $pembina)
                <a class="badge bg-info" href="/dashboard/pembina/{{ $pembina->id }}" title="Detail"><span data-feather="eye"></span></a>
              @endcan
              @can('update', $pembina)
                <a class="badge bg-warning" href="/dashboard/pembina/{{ $pembina->id }}/edit" title="Edit"><span data-feather="edit"></span></a>
              @endcan
              @can('delete', $pembina)
                <form class="d-inline" action="/dashboard/pembina/{{ $pembina->id }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" title="Hapus" onclick="return confirm('Yakin ingin menghapus {{ $pembina->user->nama }}?')"><span data-feather="trash"></span></button>
                </form>
              @endcan
              @can('verify', $pembina)
                <form class="d-inline" action="/dashboard/pembina/{{ $pembina->id }}/verify" method="post">
                  @csrf
                  @if ($pembina->verified)
                    <button class="badge bg-danger border-0" title="Batal Verifikasi" onclick="return confirm('Yakin ingin membatalkan verifikasi {{ $pembina->user->nama }}?')"><span data-feather="x"></span></button>
                  @else
                    <button class="badge bg-success border-0" title="Verifikasi" onclick="return confirm('Yakin ingin memverifikasi {{ $pembina->user->nama }}?')"><span data-feather="check"></span></button>
                  @endif
                </form>
              @endcan
            </td>
          </tr>
        @empty
          <tr>
            @if (Request::is('dashboard/pembina/waitingroom'))
              <td class="text-center" colspan="4">Tidak ada pembina yang menunggu verifikasi. <a href="/dashboard/pembina">Cek di sini</a></td>
            @else
              <td class="text-center" colspan="4">Belum ada pembina terverifikasi. <a href="/dashboard/pembina/waitingroom">Cek di sini</a></td>
            @endif
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
