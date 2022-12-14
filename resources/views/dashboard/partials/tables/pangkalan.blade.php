{{-- @can('verifyAll', \App\Models\Pangkalan::class)
  @if ($pangkalans->count() > 0)
    <form class="text-end mb-3" action="/dashboard/pangkalan/verifyall" method="post">
      @csrf
      @if ($pangkalans->first()->verified)
        <button class="btn btn-danger" title="Batal Verifikasi" onclick="return confirm('Yakin ingin membatalkan verifikasi semua pangkalan?')">Batalkan semua verifikasi</button>
      @else
        <input name="action" type="hidden" value="verify">
        <button class="btn btn-success" title="Verifikasi" onclick="return confirm('Yakin ingin memverifikasi semua pangkalan?')">Verifikasi Semua</button>
      @endif
    </form>
  @endif
@endcan --}}

<table class="table table-striped" id="tabel-pangkalan">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($pangkalans as $pangkalan)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pangkalan->nama }}</td>
        <td class="text-center">
          @can('view', $pangkalan)
            <a class="btn icon btn-sm btn-info" href="/dashboard/pangkalan/{{ $pangkalan->id }}"><i class="bi bi-eye"></i></a>
          @endcan
          @can('update', $pangkalan)
            <a class="btn icon btn-sm btn-warning" href="/dashboard/pangkalan/{{ $pangkalan->id }}/edit"><i class="bi bi-pencil-square"></i></a>
          @endcan
          @can('delete', $pangkalan)
            <form class="d-inline" action="/dashboard/pangkalan/{{ $pangkalan->id }}" method="post">
              @method('delete')
              @csrf
              <button class="btn icon btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus {{ $pangkalan->nama }}?')"><i class="bi bi-trash"></i></button>
            </form>
          @endcan
          @can('verify', $pangkalan)
            <form class="d-inline" action="/dashboard/pangkalan/{{ $pangkalan->id }}/verify" method="post">
              @csrf
              @if ($pangkalan->verified)
                <button class="btn icon btn-sm btn-danger" title="Batal Verifikasi" onclick="return confirm('Yakin ingin membatalkan verifikasi {{ $pangkalan->nama }}?')"><i class="bi bi-x-lg"></i></button>
              @else
                <button class="btn icon btn-sm btn-success" title="Verifikasi" onclick="return confirm('Yakin ingin memverifikasi {{ $pangkalan->nama }}?')"><i class="bi bi-check2"></i></button>
              @endif
            </form>
          @endcan
        </td>
      </tr>
    @empty
      <tr>
        <td class="text-center" colspan="3">Tidak ada pangkalan ditemukan</td>
      </tr>
    @endforelse
  </tbody>
</table>
