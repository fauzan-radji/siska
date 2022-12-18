@extends('dashboard.layouts.main')

@section('title', 'Daftar Kwartir Ranting')

@section('head')
  <link href="/mazer/extensions/simple-datatables/style.css" rel="stylesheet">
  <link href="/mazer/css/pages/simple-datatables.css" rel="stylesheet">
@endsection

@section('main')
  @can('create', App\Models\Kwarran::class)
    <a class="btn btn-primary mb-3" href="/dashboard/kwarran/create"><i class="bi bi-plus-lg"></i> Tambah Kwarran</a>
  @endcan

  <div class="row">
    <div class="col">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped" id="tabel-kwarran">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th class="text-center" scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($kwarrans as $kwarran)
                <tr>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $kwarran->nama }}</td>
                  <td class="text-center">
                    <a class="badge bg-info" href="/dashboard/kwarran/{{ $kwarran->id }}"><i class="bi bi-eye"></i></a>
                    @can('update', $kwarran)
                      <a class="badge bg-warning" href="/dashboard/kwarran/{{ $kwarran->id }}/edit"><i class="bi bi-pencil-square"></i></a>
                    @endcan
                    @can('delete', $kwarran)
                      <form class="d-inline" action="/dashboard/kwarran/{{ $kwarran->id }}" method="post">
                        @method('delete')
                        @csrf
                        <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus kwarran {{ $kwarran->nama }}?')"><i class="bi bi-trash"></i></button>
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
      </div>
    </div>
  </div>
@endsection

@section('script')
  <script src="/mazer/extensions/simple-datatables/umd/simple-datatables.js"></script>
  <script>
    const dataTables = [new simpleDatatables.DataTable(document.getElementById("tabel-kwarran"))];
  </script>
  <script src="/mazer/js/pages/simple-datatables.js"></script>
@endsection
