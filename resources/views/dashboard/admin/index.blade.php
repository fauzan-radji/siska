@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Daftar Pengurus</h1>
  </div>

  <a class="btn btn-primary" href="/dashboard/admin/create"><span data-feather="plus"></span> Tambah Admin</a>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">Username</th>
          <th scope="col">Email</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($admins as $admin)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $admin->user->nama }}</td>
            <td>{{ $admin->user->username }}</td>
            <td>{{ $admin->user->email }}</td>
            <td>
              <a class="badge bg-info" href="/dashboard/admin/{{ $admin->id }}"><span data-feather="eye"></span></a>
              <a class="badge bg-warning" href="/dashboard/admin/{{ $admin->id }}/edit"><span data-feather="edit"></span></a>
              <form class="d-inline" action="/dashboard/admin/{{ $admin->id }}" method="post">
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
