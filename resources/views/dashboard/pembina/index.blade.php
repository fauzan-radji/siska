@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Pembina</h1>
  </div>

  @can('create', \App\Models\Pembina::class)
    <a class="btn btn-primary" href="/dashboard/pembina/create"><span data-feather="plus"></span> Tambah Pembina</a>
  @endcan

  @foreach ($pangkalans as $pangkalan)
    <h2 class="mt-3">{{ $pangkalan->nama }}</h2>
    <div class="table-responsive">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Jabatan</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($pangkalan->pembinas as $pembina)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pembina->user->nama }}</td>
              <td>{{ $pembina->jabatan }}</td>
              <td>
                {{-- view --}}
                @can('view', $pembina)
                  <a class="badge bg-info" href="/dashboard/pembina/{{ $pembina->id }}"><span data-feather="eye"></span></a>
                @endcan
                {{-- edit --}}
                @can('update', $pembina)
                  <a class="badge bg-warning" href="/dashboard/pembina/{{ $pembina->id }}/edit"><span data-feather="edit"></span></a>
                @endcan
                {{-- delete --}}
                @can('delete', $pembina)
                  <form class="d-inline" action="/dashboard/pembina/{{ $pembina->id }}" method="post">
                    @method('delete')
                    @csrf
                    <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus post ini?')"><span data-feather="trash"></span></button>
                  </form>
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
