{{-- @can('verifyAll', \App\Models\Pembina::class)
  @if ($pembinas->count() > 0)
    <form class="d-inline" action="/dashboard/pembina/verifyall" method="post">
      @csrf
      @if ($pembinas->first()->verified)
        <button class="btn btn-danger border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin membatalkan verifikasi semua pembina?')">Batalkan semua verifikasi</button>
      @else
        <input name="action" type="hidden" value="verify">
        <button class="btn btn-success border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin memverifikasi semua pembina?')">Verifikasi Semua</button>
      @endif
    </form>
  @endif
@endcan --}}

<table class="table table-striped" id="tabel-pembina">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($pembinas as $pembina)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pembina->user->nama }}</td>
        <td class="text-center">
          @can('view', $pembina)
            <a class="btn icon btn-sm btn-info mb-1" href="/dashboard/pembina/{{ $pembina->id }}" title="Detail"><i class="bi bi-eye"></i></a>
          @endcan
          @can('update', $pembina)
            <a class="btn icon btn-sm btn-warning mb-1" href="/dashboard/pembina/{{ $pembina->id }}/edit" title="Edit"><i class="bi bi-pencil-square"></i></a>
          @endcan
          @can('delete', $pembina)
            <form class="d-inline" action="/dashboard/pembina/{{ $pembina->id }}" method="post">
              @method('delete')
              @csrf
              <button class="btn icon btn-sm btn-danger mb-1" title="Hapus" onclick="return confirm('Yakin ingin menghapus {{ $pembina->user->nama }}?')"><i class="bi bi-trash"></i></button>
            </form>
          @endcan
          @can('verify', $pembina)
            <form class="d-inline" action="/dashboard/pembina/{{ $pembina->id }}/verify" method="post">
              @csrf
              @if ($pembina->verified)
                <button class="btn icon btn-sm btn-danger mb-1" title="Batal Verifikasi" onclick="return confirm('Yakin ingin membatalkan verifikasi {{ $pembina->user->nama }}?')"><i class="bi bi-x-lg"></i></button>
              @else
                <button class="btn icon btn-sm btn-success mb-1" title="Verifikasi" onclick="return confirm('Yakin ingin memverifikasi {{ $pembina->user->nama }}?')"><i class="bi bi-check2"></i></button>
              @endif
            </form>
          @endcan
        </td>
      </tr>
    @empty
      <tr>
        <td class="text-center" colspan="3">Data pembina tidak ditemukan</td>
      </tr>
    @endforelse
  </tbody>
</table>
