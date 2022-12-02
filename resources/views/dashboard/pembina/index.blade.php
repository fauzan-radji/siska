@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Pembina</h1>
  </div>

  @can('create', \App\Models\Pembina::class)
    <a class="btn btn-primary" href="/dashboard/pembina/create"><span data-feather="plus"></span> Tambah Pembina</a>
  @endcan

  @foreach ($pangkalans as $pangkalan)
    <h2 class="mt-3 position-relative d-inline">{{ $pangkalan->nama }}
      <span class="ms-3 position-absolute top-0 start-100 translate-middle badge rounded-pill bg-{{ $pangkalan->verified ? 'success' : 'danger' }}" style="font-size: 0.2em">
        <span data-feather="check"></span>
      </span>
    </h2>

    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th class="text-center" scope="col">Terverifikasi</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pangkalan->pembinas as $pembina)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pembina->user->nama }}</td>
              <td>{{ $pembina->jabatan }}</td>
              <td class="text-center">
                @if ($pembina->verified)
                  <span class="badge bg-success">Sudah</span>
                @else
                  <span class="badge bg-danger">Belum</span>
                @endif
              </td>
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
                  @if ($pangkalan->verified && !$pembina->verified)
                    <form class="d-inline" action="/dashboard/pembina/{{ $pembina->id }}/verify" method="post">
                      @csrf
                      <button class="badge bg-success border-0" title="Verifikasi" onclick="return confirm('Yakin ingin memverifikasi {{ $pembina->user->nama }}?')"><span data-feather="check"></span></button>
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
