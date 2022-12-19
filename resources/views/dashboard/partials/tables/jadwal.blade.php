<table class="table table-striped" id="tabel-jadwal">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Waktu</th>
      <th scope="col">Poin</th>
      <th scope="col">Tempat</th>
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
            {{ $jadwal->pangkalan->nama }}
          </td>
          <td>
            <a class="btn btn-sm icon btn-info" href="/dashboard/jadwal/{{ $jadwal->id }}"><span data-feather="eye"></span></a>
            @can('update', $jadwal)
              <a class="btn btn-sm icon btn-warning" href="/dashboard/jadwal/{{ $jadwal->id }}/edit"><span data-feather="edit"></span></a>
            @endcan
            @can('delete', $jadwal)
              <form class="d-inline" action="/dashboard/jadwal/{{ $jadwal->id }}" method="post">
                @method('delete')
                @csrf
                <button class="btn btn-sm icon btn-danger" onclick="return confirm('Yakin ingin menghapus post ini?')"><span data-feather="trash"></span></button>
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
