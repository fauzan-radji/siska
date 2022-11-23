@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Peserta Didik</h1>
  </div>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Foto</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($peserta_didiks as $peserta_didik)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $peserta_didik->user->nama }}</td>
            <td><img src="{{ $peserta_didik->foto }}" alt="{{ $peserta_didik->nama }}"></td>
            <td>
              <a class="badge bg-info" href="/dashboard/peserta_didik/{{ $peserta_didik->id }}"><span data-feather="eye"></span></a>
              <a class="badge bg-warning" href="/dashboard/peserta_didik/{{ $peserta_didik->id }}/edit"><span data-feather="edit"></span></a>
              <form class="d-inline" action="/dashboard/peserta_didik/{{ $peserta_didik->id }}" method="post">
                @method('delete')
                @csrf
                <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus post ini?')"><span data-feather="trash"></span></button>
              </form>
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
