@extends('dashboard.layouts.main')

@section('main')
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1>Jadwal</h1>
  </div>

  @can('create', \App\Models\Jadwal::class)
    <a class="btn btn-primary" href="/dashboard/jadwal/create"><span data-feather="plus"></span> Tambah Jadwal</a>
  @endcan

  @foreach ($pangkalans as $pangkalan)
    @can('view', $pangkalan->jadwals->first())
      <h2 class="mt-3">Jadwal di {{ $pangkalan->nama }}</h2>
      <div class="table-responsive">
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
            @forelse($pangkalan->jadwals as $jadwal)
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
                  @can('view', $jadwal)
                    <a class="badge bg-info" href="/dashboard/jadwal/{{ $jadwal->id }}"><span data-feather="eye"></span></a>
                  @endcan
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
            @empty
              <tr>
                <td class="text-center" colspan="4">No posts found</td>
              </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    @endcan
  @endforeach
@endsection
