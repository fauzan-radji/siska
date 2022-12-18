@extends('dashboard.layouts.main')

@section('title', 'Jadwal')

@section('main')
  @can('create', \App\Models\Jadwal::class)
    <a class="btn btn-primary mb-3" href="/dashboard/jadwal/create"><span data-feather="plus"></span> Tambah Jadwal</a>
  @endcan

  <div class="row">
    <div class="col-md-10">
      <div class="card">
        <div class="card-body">
          <table class="table table-striped">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Waktu</th>
                <th scope="col">Poin Pengujian</th>
                <th scope="col">Penguji</th>
                <th scope="col">Aksi</th>
              </tr>
            </thead>
            <tbody>
              @forelse($jadwals as $jadwal)
                @can('view', $jadwal)
                  <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ Carbon\Carbon::parse($jadwal->tanggal)->diffForHumans() }}</td>
                    <td>
                      @foreach ($jadwal->poins as $poin)
                        <div class="badge bg-primary">
                          {{ $poin->nomor }}
                        </div>
                      @endforeach
                    </td>
                    <td>
                      @foreach ($jadwal->pembinas as $pembina)
                        <div class="badge bg-primary">
                          {{ $pembina->user->nama }}
                        </div>
                      @endforeach
                    </td>
                    <td>
                      <a class="badge bg-info" href="/dashboard/jadwal/{{ $jadwal->id }}"><span data-feather="eye"></span></a>
                      @can('update', $jadwal)
                        <a class="badge bg-warning" href="/dashboard/jadwal/{{ $jadwal->id }}/edit"><span data-feather="edit"></span></a>
                      @endcan
                      @can('delete', $jadwal)
                        <form class="d-inline" action="/dashboard/jadwal/{{ $jadwal->id }}" method="post">
                          @method('delete')
                          @csrf
                          <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus post ini?')"><span data-feather="trash"></span></button>
                        </form>
                      @endcan
                    </td>
                  </tr>
                @endcan
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
