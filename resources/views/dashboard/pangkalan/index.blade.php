@extends('dashboard.layouts.main')

@section('title', 'Daftar Pangkalan')

@section('main')
  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama</th>
          <th scope="col">No Gudep</th>
          <th class="text-center" scope="col">
            Aksi
            @can('verifyAll', \App\Models\Pangkalan::class)
              @if ($pangkalans->count() > 0)
                | <form class="d-inline" action="/dashboard/pangkalan/verifyall" method="post">
                  @csrf
                  @if ($pangkalans->first()->verified)
                    <button class="btn btn-danger border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin membatalkan verifikasi semua pangkalan?')">Batalkan semua verifikasi</button>
                  @else
                    <input name="action" type="hidden" value="verify">
                    <button class="btn btn-success border-0" title="Verifikasi" style="--bs-btn-padding-y: .25rem; --bs-btn-padding-x: .5rem; --bs-btn-font-size: .75rem;" onclick="return confirm('Yakin ingin memverifikasi semua pangkalan?')">Verifikasi Semua</button>
                  @endif
                </form>
              @endif
            @endcan
          </th>
        </tr>
      </thead>
      <tbody>
        @forelse($pangkalans as $pangkalan)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $pangkalan->nama }}</td>
            <td>{{ $pangkalan->no_gudep }}</td>
            <td class="text-center">
              @can('view', $pangkalan)
                <a class="badge bg-info" href="/dashboard/pangkalan/{{ $pangkalan->id }}" title="Detail"><span data-feather="eye"></span></a>
              @endcan
              @can('update', $pangkalan)
                <a class="badge bg-warning" href="/dashboard/pangkalan/{{ $pangkalan->id }}/edit" title="Edit"><span data-feather="edit"></span></a>
              @endcan
              @can('delete', $pangkalan)
                <form class="d-inline" action="/dashboard/pangkalan/{{ $pangkalan->id }}" method="post">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" title="Hapus" onclick="return confirm('Yakin ingin menghapus {{ $pangkalan->nama }}?')"><span data-feather="trash"></span></button>
                </form>
              @endcan
              @can('verify', $pangkalan)
                <form class="d-inline" action="/dashboard/pangkalan/{{ $pangkalan->id }}/verify" method="post">
                  @csrf
                  @if ($pangkalan->verified)
                    <button class="badge bg-danger border-0" title="Batal Verifikasi" onclick="return confirm('Yakin ingin membatalkan verifikasi {{ $pangkalan->nama }}?')"><span data-feather="x"></span></button>
                  @else
                    <button class="badge bg-success border-0" title="Verifikasi" onclick="return confirm('Yakin ingin memverifikasi {{ $pangkalan->nama }}?')"><span data-feather="check"></span></button>
                  @endif
                </form>
              @endcan
            </td>
          </tr>
        @empty
          <tr>
            @if (Request::is('dashboard/pangkalan/waitingroom'))
              <td class="text-center" colspan="4">Tidak ada pangkalan yang menunggu verifikasi. <a href="/dashboard/pangkalan">Cek di sini</a></td>
            @else
              <td class="text-center" colspan="4">Belum ada pangkalan terverifikasi. <a href="/dashboard/pangkalan/waitingroom">Cek di sini</a></td>
            @endif
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
@endsection
