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
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($kwarran->pangkalans as $pangkalan)
            <tr>
              <td>{{ $loop->iteration }}</td>
              <td>{{ $pangkalan->nama }}</td>
              <td>{{ $pangkalan->no_gudep }}</td>
              <td>
                @can('view', $pangkalan)
                  <a class="badge bg-info" href="/dashboard/pangkalan/{{ $pangkalan->id }}"><span data-feather="eye"></span></a>
                @endcan
                @can('update', $pangkalan)
                  <a class="badge bg-warning" href="/dashboard/pangkalan/{{ $pangkalan->id }}/edit"><span data-feather="edit"></span></a>
                @endcan
                @can('delete', $pangkalan)
                  <form class="d-inline" action="/dashboard/pangkalan/{{ $pangkalan->id }}" method="post">
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
