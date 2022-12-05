@extends('dashboard.layouts.main')

@section('title', 'Dashboard | Kwarran')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Kwartir Ranting</h1>
  </div>

  @can('create', App\Models\Kwarran::class)
    <a class="btn btn-primary" href="/dashboard/kwarran/create"><span data-feather="plus"></span> Tambah Kwarran</a>
  @endcan

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Kamabiran</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($kwarrans as $kwarran)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $kwarran->nama }}</td>
            <td>{{ $kwarran->ketua }}</td>
            <td>
              {{-- view --}}
              <a class="badge bg-info" href="/dashboard/kwarran/{{ $kwarran->id }}"><span data-feather="eye"></span></a>
              {{-- update --}}
              @can('update', $kwarran)
                <a class="badge bg-warning" href="/dashboard/kwarran/{{ $kwarran->id }}/edit"><span data-feather="edit"></span></a>
              @endcan
              @can('delete', $kwarran)
                {{-- delete --}}
                <form class="d-inline" action="/dashboard/kwarran/{{ $kwarran->id }}" method="post">
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
@endsection
