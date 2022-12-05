@extends('dashboard.layouts.main')

@section('title', 'Dashboard | Poin')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Poin</h1>
  </div>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nomor</th>
          <th scope="col">Isi</th>
          {{-- <th scope="col">Aksi</th> --}}
        </tr>
      </thead>
      <tbody>
        @forelse($poins as $poin)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $poin->nomor }}</td>
            <td>{{ Illuminate\Support\Str::limit(strip_tags($poin->isi), 200) }}</td>
            {{-- <td>
              @can('view', $poin)
                <a class="badge bg-info" href="/dashboard/poin/{{ $poin->id }}"><span data-feather="eye"></span></a>
              @endcan
              @can('update', $poin)
                <a class="badge bg-warning" href="/dashboard/poin/{{ $poin->id }}/edit"><span data-feather="edit"></span></a>
              @endcan
              @can('delete', $poin)
                <form class="d-inline" action="/dashboard/poin/{{ $poin->id }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus post ini?')"><span data-feather="trash"></span></button>
                </form>
              @endcan
            </td> --}}
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
