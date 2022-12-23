@extends('dashboard.layouts.main')

@section('title', 'Edit Data Peserta Didik')

@section('head')
  <style>
    .foto {
      cursor: pointer;
      position: relative;
      width: 100%;
      aspect-ratio: 3 / 4;
      background-color: #0004;
    }

    .foto.is-invalid {
      border: 1px solid var(--bs-danger);
    }

    .foto img {
      object-fit: cover;
    }

    .foto::after {
      font-family: bootstrap-icons !important;
      content: '\f603 Pilih Gambar' /* upload icon */;
      /*font-size: 2em;*/
      /*content: '';*/
      font-size: 1.2em;
      display: flex;
      justify-content: center;
      align-items: center;
      position: absolute;
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      opacity: 0;
      background-color: #0008;
    }

    .foto:hover::after {
      opacity: 1;
    }
  </style>
@endsection

@section('main')
  <div class="row">
    <div class="col-md-3">
      <div class="card text-center">
        <div class="card-header">
          <h4>Foto</h4>
        </div>
        <div class="card-body">
          <label class="foto rounded-4 overflow-hidden d-flex justify-content-center align-items-center @error('foto') is-invalid @enderror" for="foto">
            <img class="w-100 h-100" id="output-foto" src="{{ $peserta_didik->foto }}" alt="{{ $peserta_didik->nama }}">
          </label>
          @error('foto')
            <small class="text-danger"><i class="bi bi-info-circle"></i> {{ $message }}</small>
          @enderror
        </div>
        <div class="card-footer">
          <form action="/dashboard/peserta_didik/{{ $peserta_didik->id }}/upload" method="post" enctype="multipart/form-data">
            @csrf
            <input class="d-none" id="foto" name="foto" type="file" accept="image/*">
            <button class="btn btn-primary"><i class="bi bi-upload"></i> Upload</button>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-9">
      @include('dashboard.partials.forms.peserta_didik', [
          'edit' => true,
          'title' => $peserta_didik->user->nama,
      
          'peserta_didik' => $peserta_didik,
          'nama' => $peserta_didik->user->nama,
          'username' => $peserta_didik->user->username,
          'email' => $peserta_didik->user->email,
          'agamas' => $agamas,
      ])
    </div>
  </div>
@endsection

@section('script')
  <script src="/mazer/extensions/jquery/jquery.min.js"></script>
  <script src="/mazer/extensions/parsleyjs/parsley.min.js"></script>
  <script src="/mazer/js/pages/parsley.js"></script>

  <script>
    const fileFoto = document.getElementById('foto');
    const outputImg = document.getElementById('output-foto');
    fileFoto.addEventListener('change', e => {
      if (fileFoto.files && fileFoto.files[0]) {
        const reader = new FileReader();

        reader.onload = e => outputImg.src = e.target.result;
        reader.readAsDataURL(fileFoto.files[0]);
      }
    });
  </script>
@endsection
