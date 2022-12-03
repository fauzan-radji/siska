@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Peserta Didik</h1>
  </div>

  @can('create', \App\Models\PesertaDidik::class)
    <a class="btn btn-primary" href="/dashboard/peserta_didik/create"><span data-feather="plus"></span> Tambah Peserta Didik</a>
  @endcan

  @foreach ($pangkalans as $pangkalan)
    <h2 class="mt-3 ">
      <span class="position-relative">{{ $pangkalan->nama }}
        <span class="ms-3 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $pangkalan->verified ? 'success' : 'danger' }}" style="font-size: 0.2em">
          <span data-feather="check"></span>
        </span>
      </span>
    </h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Foto</th>
            <th scope="col">Terverifikasi</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pangkalan->peserta_didiks as $peserta_didik)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $peserta_didik->user->nama }}</td>
              <td><img src="{{ $peserta_didik->foto }}" alt="{{ $peserta_didik->nama }}"></td>
              <td class="text-center">
                @if ($peserta_didik->verified)
                  <span class="badge bg-success">Sudah</span>
                @else
                  <span class="badge bg-danger">Belum</span>
                @endif
              </td>
              <td>
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
                  @if ($pangkalan->verified && !$peserta_didik->verified)
                    <form class="d-inline" action="/dashboard/peserta_didik/{{ $peserta_didik->id }}/verify" method="post">
                      @csrf
                      <button class="badge bg-success border-0" onclick="return confirm('Yakin ingin memverifikasi  {{ $peserta_didik->user->nama }}?')"><span data-feather="check"></span></button>
                    </form>
                  @endif
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
    </div>
  @endforeach
@endsection
