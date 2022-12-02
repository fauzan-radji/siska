@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Pangkalan</h1>
  </div>

  @foreach ($kwarrans as $kwarran)
    <h2 class="mt-3">{{ $kwarran->nama }}</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">No Gudep</th>
            <th class="text-center" scope="col">Terverifikasi</th>
            <th class="text-center" scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($kwarran->pangkalans as $pangkalan)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pangkalan->nama }}</td>
              <td>{{ $pangkalan->no_gudep }}</td>
              <td class="text-center">
                @if ($pangkalan->verified)
                  <span class="badge bg-success">Sudah</span>
                @else
                  <span class="badge bg-danger">Belum</span>
                @endif
              </td>
              <td class="text-center">
                @can('view', $pangkalan)
                  <a class="badge bg-info" href="/dashboard/pangkalan/{{ $pangkalan->id }}" title="Detail"><span data-feather="eye"></span></a>
                @endcan
                @can('update', $pangkalan)
                  <a class="badge bg-warning" href="/dashboard/pangkalan/{{ $pangkalan->id }}/edit" title="Edit"><span data-feather="edit"></span></a>
                @endcan
                @can('delete', $pangkalan)
                  <form class="d-inline" action="/dashboard/pangkalan/{{ $pangkalan->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" title="Hapus" onclick="return confirm('Yakin ingin menghapus {{ $pangkalan->nama }}?')"><span data-feather="trash"></span></button>
                  </form>
                @endcan
                @can('verify', $pangkalan)
                  @if (!$pangkalan->verified)
                    <form class="d-inline" action="/dashboard/pangkalan/{{ $pangkalan->id }}/verify" method="post">
                      @csrf
                      <button class="badge bg-success border-0" title="Verifikasi" onclick="return confirm('Yakin ingin memverifikasi {{ $pangkalan->nama }}?')"><span data-feather="check"></span></button>
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
