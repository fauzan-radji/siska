@php
  $isSomeNotVerified = $peserta_didiks->some(fn($peserta_didik) => !$peserta_didik->verified);
  $isSomeVerified = $peserta_didiks->some(fn($peserta_didik) => $peserta_didik->verified);
@endphp

@if ($isSomeNotVerified)
  <link href="/mazer/extensions/sweetalert2/sweetalert2.min.css" rel="stylesheet">
@endif

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
        <td class="text-center"><img src="{{ $peserta_didik->foto }}" alt="{{ $peserta_didik->nama }}" width="100"></td>
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
                <input name="no_anggota" type="hidden">
                <button class="btn btn-sm icon btn-success" onclick="verify('{{ $peserta_didik->user->nama }}', this); return false;"><span data-feather="check"></span></button>
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

@if ($isSomeNotVerified)
  <script src="/mazer/extensions/sweetalert2/sweetalert2.min.js"></script>
  <script>
    async function verify(peserta_didik, btn) {
      const {
        value: text
      } = await Swal.fire({
        title: peserta_didik,
        input: 'text',
        inputLabel: 'Nomor Tanda Anggota ' + peserta_didik,
        showCancelButton: true,
        cancelButtonText: 'Batal',
        confirmButtonText: 'Verifikasi'
      });

      if (text) {
        btn.previousElementSibling.value = text;
        btn.form.submit();
      } else {
        Swal.fire({
          icon: "error",
          title: "Error",
          text: "Gagal memverifikasi " + peserta_didik
        });
      }
    }
  </script>
@endif
