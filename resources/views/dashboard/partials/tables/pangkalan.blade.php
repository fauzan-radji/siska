@php
  $isSomeNotVerified = $pangkalans->some(fn($pangkalan) => !$pangkalan->verified);
  $isSomeVerified = $pangkalans->some(fn($pangkalan) => $pangkalan->verified);
@endphp

@if ($isSomeNotVerified)
  <link href="/mazer/extensions/sweetalert2/sweetalert2.min.css" rel="stylesheet">
@endif

<table class="table table-striped" id="tabel-pangkalan">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nama</th>
      @if ($isSomeVerified)
        <th>Nomor Gudep</th>
      @endif
      <th class="text-center" scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @forelse($pangkalans as $pangkalan)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $pangkalan->nama }}</td>
        @if ($isSomeVerified)
          <td>{{ $pangkalan->no_gudep }}</td>
        @endif
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
                <input name="no_gudep" type="hidden">
                <button class="btn icon btn-sm btn-success" title="Verifikasi" onclick="verify('{{ $pangkalan->nama }}', this); return false;"><i class="bi bi-check2"></i></button>
              @endif
            </form>
          @endcan
        </td>
      </tr>
    @empty
      <tr>
        <td class="text-center" colspan="3">Data pangkalan tidak ditemukan</td>
      </tr>
    @endforelse
  </tbody>
</table>

@if ($isSomeNotVerified)
  <script src="/mazer/extensions/sweetalert2/sweetalert2.min.js"></script>
  <script>
    async function verify(pangkalan, btn) {
      const {
        value: text
      } = await Swal.fire({
        title: pangkalan,
        input: 'text',
        inputLabel: 'Input Nomor Gudep ' + pangkalan,
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
          text: "Gagal memverifikasi " + pangkalan
        });
      }
    }
  </script>
@endif
