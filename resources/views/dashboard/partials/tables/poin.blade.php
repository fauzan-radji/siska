<table class="table table-striped" id="tabel-poin">
  <thead>
    <tr>
      <th scope="col">#</th>
      {{-- <th scope="col">Nomor</th> --}}
      <th scope="col">Isi</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($poins as $poin)
      <tr>
        {{-- <td>{{ $loop->iteration }}</td> --}}
        <td>{{ $poin->nomor }}</td>
        <td>{{ Illuminate\Support\Str::limit(strip_tags($poin->isi), 100) }}</td>
        <td>
          @can('view', $poin)
            <a class="btn btn-sm icon btn-info" href="/dashboard/poin/{{ $poin->id }}"><i class="bi bi-eye"></i></a>
          @endcan
          {{-- @can('update', $poin)
                <a class="badge bg-warning" href="/dashboard/poin/{{ $poin->id }}/edit"><span data-feather="edit"></span></a>
              @endcan
              @can('delete', $poin)
                <form class="d-inline" action="/dashboard/poin/{{ $poin->id }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" onclick="return confirm('Yakin ingin menghapus post ini?')"><span data-feather="trash"></span></button>
                </form>
              @endcan --}}
        </td>
      </tr>
    @empty
      <tr>
        <td class="text-center" colspan="4">No posts found</td>
      </tr>
    @endforelse
  </tbody>
</table>
