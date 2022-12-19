<div class="kartu-anggota">
  <div class="kartu-anggota__header">
    <img src="/img/pramuka.png">
    <div class="kartu-anggota__title text-center">
      <h2>KARTU TANDA ANGGOTA</h2>
      <h1>GERAKAN PRAMUKA</h1>
      <hr>
    </div>
    <img src="/img/kota-gorontalo.png">
  </div>

  <div class="kartu-anggota__body">
    <div class="kartu-anggota__side">
      <img src="{{ $foto }}">
    </div>
    <div class="kartu-anggota__main">
      <table>
        <tr>
          <td>No.&nbsp;Tanda&nbsp;Anggota</td>
          <td>:</td>
          <!-- <td colspan="4">05.02.00-000.008</td> -->
          <td colspan="4">{{ $no_anggota }}</td>
        </tr>
        <tr>
          <td>Nama Lengkap</td>
          <td>:</td>
          <td colspan="4">{{ $nama }}</td>
        </tr>
        <tr>
          <td>Tempat&nbsp;Tgl.&nbsp;Lahir</td>
          <td>:</td>
          <!-- <td colspan="4">Konoha, 10 Oktober 1998</td> -->
          <td colspan="4">{{ $tempat_lahir }}, {{ \Carbon\Carbon::parse($tanggal_lahir)->format('d-m-Y') }}</td>
        </tr>
        <tr>
          <td>Alamat</td>
          <td>:</td>
          <td colspan="4">{{ $alamat }}</td>
        </tr>
        <tr>
          <td>No. Telepon</td>
          <td>:</td>
          <td colspan="4">{{ $no_hp }}</td>
        </tr>
        <tr>
          <td>Agama</td>
          <td>:</td>
          <td>{{ $agama }}</td>
          <td class="text-end">Gol.&nbsp;Darah</td>
          <td>:</td>
          <td>{{ $gol_darah }}</td>
        </tr>
        <tr>
          <td>Gol/Jabt</td>
          <td>:</td>
          <!-- <td colspan="4">Penegak Bantara/Pinru</td> -->
          <td colspan="4">{{ $golongan }}/{{ $jabatan }}</td>
        </tr>
        <tr>
          <td>Kwarcab</td>
          <td>:</td>
          <td>{!! $kwarcab !!}</td>
          <td class="text-end">Kwarda</td>
          <td>:</td>
          <td>{{ $kwarda }}</td>
        </tr>
        <tr>
          <td></td>
          <td colspan="5">
            <table class="kartu-anggota__ttd-container text-center">
              <tr>
                <td>Konoha, 12 April 2022</td>
              </tr>
              <tr>
                <td>Ketua Kwarcab Konoha</td>
              </tr>
              <tr>
                <td class="kartu-anggota__ttd"></td>
              </tr>
              <tr>
                <!-- <td class="kartu-anggota__nama-ketua">Fadel Djibran SE., MSi.</td> -->
                <td class="kartu-anggota__nama-ketua">{{ $nama_ketua }}</td>
              </tr>
              <tr>
                <!-- <td>NTA: 05.02.00-000.008</td> -->
                <td>NTA: {{ $nta_ketua }}</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </div>
  </div>
</div>
