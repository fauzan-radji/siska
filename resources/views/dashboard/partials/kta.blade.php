<div class="kartu-anggota" id="kta-{{ $peserta_didik->id ?? '' }}">
  <div class="kartu-anggota__header">
    <div class="kartu-anggota__header-image" style="--url: url('/img/pramuka.png')"></div>
    {{-- <img src="/img/pramuka.png"> --}}
    <div class="kartu-anggota__title text-center">
      <h2>KARTU&nbsp;TANDA&nbsp;ANGGOTA</h2>
      <h1>GERAKAN&nbsp;PRAMUKA</h1>
      <hr>
    </div>
    <div class="kartu-anggota__header-image" style="--url: url('/img/kota-gorontalo.png')"></div>
    {{-- <img src="/img/kota-gorontalo.png"> --}}
  </div>

  <div class="kartu-anggota__body">
    <div class="kartu-anggota__side">
      {{-- <img src="{{ $peserta_didik->foto ?? '-' }}"> --}}
      <div class="kartu-anggota__side-image" style="--url: url('{{ $peserta_didik->foto ?? '' }}')"></div>
    </div>
    <div class="kartu-anggota__main">
      <table>
        <tr>
          <td>No.&nbsp;Tanda&nbsp;Anggota</td>
          <td>:</td>
          <!-- <td colspan="4">05.02.00-000.008</td> -->
          <td colspan="4">{{ $peserta_didik->no_anggota ?? '-' }}</td>
        </tr>
        <tr>
          <td>Nama&nbsp;Lengkap</td>
          <td>:</td>
          <td>{{ $peserta_didik->user->nama ?? '-' }}</td>
          <td class="text-end">JK</td>
          <td>:</td>
          <td>{{ $peserta_didik->gender ?? '-' }}</td>
        </tr>
        <tr>
          <td>Tempat&nbsp;Tgl.&nbsp;Lahir</td>
          <td>:</td>
          <!-- <td colspan="4">Konoha, 10 Oktober 1998</td> -->
          <td colspan="4">{{ $peserta_didik->tempat_lahir ?? '-' }},&nbsp;{{ \Carbon\Carbon::parse($peserta_didik->tanggal_lahir ?? '06-08-1945')->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td colspan="4">{{ $peserta_didik->alamat ?? '-' }}</td>
        </tr>
        <tr>
          <td>No.&nbsp;Telepon</td>
          <td>:</td>
          <td colspan="4">{{ $peserta_didik->no_hp ?? '-' }}</td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>:</td>
          <td>{{ $peserta_didik->agama ? $peserta_didik->agama->nama : '-' }}</td>
          <td class="text-end">Gol.&nbsp;Darah</td>
          <td>:</td>
          <td>{{ $peserta_didik->gol_darah ?? '-' }}</td>
        </tr>
        <tr>
          <td>Golongan</td>
          <td>:</td>
          <!-- <td colspan="4">Penegak Bantara/Pinru</td> -->
          <td colspan="4">{{ $peserta_didik->golongan ?? '-' }}</td>
        </tr>
        <tr>
          <td>Kwarcab</td>
          <td>:</td>
          <td>Kota&nbsp;Gorontalo</td>
          <td class="text-end">Kwarda</td>
          <td>:</td>
          <td>Gorontalo</td>
        </tr>
        <tr>
          <td></td>
          <td colspan="5">
            <table class="kartu-anggota__ttd-container text-center">
              <tr>
                <td>Kota&nbsp;Gorontalo,&nbsp;12&nbsp;April&nbsp;2022</td>
              </tr>
              <tr>
                <td>Ketua&nbsp;Kwarcab&nbsp;Kota&nbsp;Gorontalo</td>
              </tr>
              <tr>
                <td class="kartu-anggota__ttd"></td>
              </tr>
              <tr>
                <!-- <td class="kartu-anggota__nama-ketua">Fadel Djibran SE., MSi.</td> -->
                <td class="kartu-anggota__nama-ketua">Hj.&nbsp;Jusmiati&nbsp;Kiai&nbsp;Demak</td>
              </tr>
              <tr>
                <!-- <td>NTA: 05.02.00-000.008</td> -->
                <td>NTA:&nbsp;05.02.00-000.008</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
