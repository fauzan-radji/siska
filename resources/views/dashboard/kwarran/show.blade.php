@extends('dashboard.layouts.main')

@section('title')
  Dashboard | {{ $kwarran->nama }}
@endsection

@section('head')
  <style></style>
@endsection

@section('main')
  <table>
    <tr>
      <td>Nama</td>
      <td>{{ $kwarran->nama }}</td>
    </tr>
    <tr>
      <td>Kamabiran</td>
      <td>{{ $kwarran->kamabiran }}</td>
    </tr>
    <tr>
      <td>Ketua Kwarran</td>
      <td>{{ $kwarran->ketua }}</td>
    </tr>
    <tr>
      <td>Jumlah Pangkalan</td>
      <td>{{ $kwarran->pangkalans->count() }}</td>
    </tr>
  </table>

  <a href="/dashboard/kwarran/{{ $kwarran->id }}/edit">Edit</a>


  <h2 class="mt-3">Pangkalan</h2>
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
              <a class="badge bg-info" href="/dashboard/pangkalan/{{ $pangkalan->id }}"><span data-feather="eye"></span></a>
              <a class="badge bg-warning" href="/dashboard/pangkalan/{{ $pangkalan->id }}/edit"><span data-feather="edit"></span></a>
              <form class="d-inline" action="/dashboard/pangkalan/{{ $pangkalan->id }}" method="post">
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
