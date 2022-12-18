{{-- @can('verifyAll', \App\Models\PesertaDidik::class)
  @if ($peserta_didiks->count() > 0)
    <form class="d-inline" action="/dashboard/peserta_didik/verifyall" method="post">
      @csrf
      @if ($peserta_didiks->first()->verified)
        <button class="btn btn-danger border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin membatalkan verifikasi semua peserta didik?')">Batalkan semua verifikasi</button>
      @else
        <input name="action" type="hidden" value="verify">
        <button class="btn btn-success border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin memverifikasi semua peserta didik?')">Verifikasi Semua</button>
      @endif
    </form>
  @endif
@endcan --}}

<table class="table table-striped" id="tabel-peserta_didik">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      <th class="text-center" scope="col">Foto</th>
      <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($peserta_didiks as $peserta_didik)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $peserta_didik->user->nama }}</td>
        <td class="text-center"><img src="{{ $peserta_didik->foto }}" alt="{{ $peserta_didik->nama }}"></td>
        <td class="text-center">
          @can('view', $peserta_didik)
            <a class="btn btn-sm icon btn-info" href="/dashboard/peserta_didik/{{ $peserta_didik->id }}"><span data-feather="eye"></span></a>
          @endcan
          @can('update', $peserta_didik)
            <a class="btn btn-sm icon btn-warning" href="/dashboard/peserta_didik/{{ $peserta_didik->id }}/edit"><span data-feather="edit"></span></a>
          @endcan
          @can('delete', $peserta_didik)
            <form class="d-inline" action="/dashboard/peserta_didik/{{ $peserta_didik->id }}" method="post">
              @method('delete')
              @csrf
              <button class="btn btn-sm icon btn-danger" onclick="return confirm('Yakin ingin menghapus {{ $peserta_didik->user->nama }}?')"><span data-feather="trash"></span></button>
            </form>
          @endcan
          @can('verify', $peserta_didik)
            <form class="d-inline" action="/dashboard/peserta_didik/{{ $peserta_didik->id }}/verify" method="post">
              @csrf
              @if ($peserta_didik->verified)
                <button class="btn btn-sm icon btn-danger" title="Batal Verifikasi" onclick="return confirm('Yakin ingin membatalkan verifikasi {{ $peserta_didik->user->nama }}?')"><span data-feather="x"></span></button>
              @else
                <button class="btn btn-sm icon btn-success" onclick="return confirm('Yakin ingin memverifikasi {{ $peserta_didik->user->nama }}?')"><span data-feather="check"></span></button>
              @endif
            </form>
          @endcan
        </td>
      </tr>
    @empty
      <tr>
        <td class="text-center" colspan="4">Data peserta didik tidak ditemukan.</td>
      </tr>
    @endforelse
  </tbody>
</table>
