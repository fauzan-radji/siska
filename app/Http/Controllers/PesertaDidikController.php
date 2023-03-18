<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePesertaDidikRequest;
use App\Http\Requests\UpdatePesertaDidikRequest;
use App\Models\Pangkalan;
use App\Models\PesertaDidik;
use App\Models\User;
use App\Models\Agama;
use Illuminate\Support\Facades\Hash;

class PesertaDidikController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->authorize('viewAny', PesertaDidik::class);
    $data = [];
    if (auth()->user()->isAdmin())
      $data['peserta_didiks'] = PesertaDidik::where('verified', true)->get();
    else
      $data['peserta_didiks'] = PesertaDidik::where(
        'pangkalan_id',
        auth()
          ->user()
          ->pembina
          ->pangkalan_id
      )->where('verified', true)->get();

    return view('dashboard.peserta_didik.index', $data);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function waitingRoom()
  {
    $this->authorize('viewAny', PesertaDidik::class);
    $data = [];
    if (auth()->user()->isAdmin())
      $data['peserta_didiks'] = PesertaDidik::where('verified', false)->get();
    else
      $data['peserta_didiks'] = PesertaDidik::where(
        'pangkalan_id',
        auth()
          ->user()
          ->pembina
          ->pangkalan_id
      )->where('verified', false)->get();

    return view('dashboard.peserta_didik.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorize('create', PesertaDidik::class);
    return view('dashboard.peserta_didik.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePesertaDidikRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePesertaDidikRequest $request)
  {
    $this->authorize('create', PesertaDidik::class);
    $rules = [
      'nama' => 'required|max:255|min:3',
      'username' => 'required|min:5|max:255',
      'password' => 'required|min:8',
      'email' => 'required|email'
    ];

    // if not logged in then validate the pangkalan_id
    if (auth()->guest()) $rules['pangkalan_id'] = 'required';

    $validated = $request->validate($rules);

    // if logged in then use pangkalan_id from the logged in user
    if (auth()->user())
      $validated['pangkalan_id'] = auth()
        ->user()
        ->pembina
        ->pangkalan_id;

    // Create Peserta Didik
    PesertaDidik::create([
      'user_id' => User::create([
        'nama' => $validated['nama'],
        'username' => $validated['username'],
        'email' => $validated['email'],
        'password' => Hash::make($validated['password'])
      ])->id,
      'pangkalan_id' => $validated['pangkalan_id']
    ]);

    // redirect to landing
    return redirect('/dashboard/peserta_didik')->with('success', 'Berhasil mendaftarkan user ' . $validated['nama']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function show(PesertaDidik $pesertaDidik)
  {
    $this->authorize('view', $pesertaDidik);
    return view('dashboard.peserta_didik.show', [
      'peserta_didik' => $pesertaDidik
    ]);
  }

  public function loadKTA(PesertaDidik $pesertaDidik)
  {
    $this->authorize('view', $pesertaDidik);
    return view('dashboard.peserta_didik.kta', ['peserta_didik' => $pesertaDidik]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function edit(PesertaDidik $pesertaDidik)
  {
    $this->authorize('update', $pesertaDidik);
    return view('dashboard.peserta_didik.edit', [
      'peserta_didik' => $pesertaDidik,
      'agamas' => Agama::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePesertaDidikRequest  $request
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePesertaDidikRequest $request, PesertaDidik $pesertaDidik)
  {
    $this->authorize('update', $pesertaDidik);
    // Validasi
    $validated = $request->validate([
      'nama' => 'required|max:255|min:3',
      'username' => 'required|min:5|max:255',
      'email' => 'required|email'
    ]);

    $pesertaDidik->user->update($validated);

    $pesertaDidik->update([
      'gender' => $request->gender,
      'no_hp' => $request->no_hp,
      'alamat' => $request->alamat,
      'tempat_lahir' => $request->tempat_lahir,
      'tanggal_lahir' => $request->tanggal_lahir,
      'gol_darah' => $request->gol_darah,
      'agama_id' => $request->agama_id
    ]);

    return redirect('/dashboard/peserta_didik/' . $pesertaDidik->id)->with('success', 'Berhasil mengubah data ' . $validated['nama']);
  }

  /**
   * Verify the specified resource in storage.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function verify(UpdatePesertaDidikRequest $request, PesertaDidik $pesertaDidik)
  {
    $this->authorize('verify', $pesertaDidik);
    $validated = ['no_anggota' => null];

    if (!$pesertaDidik->verified)
      $validated = $request->validate(['no_anggota' => 'required|unique:peserta_didiks']);

    // verify the pangkalan first before verify the peserta didik
    if (!$pesertaDidik->pangkalan->verified) $pesertaDidik->pangkalan->update(['verified' => true]);

    $pesertaDidik->update([
      'verified' => !$pesertaDidik->verified,
      'no_anggota' => $validated['no_anggota']
    ]);

    $msg = $pesertaDidik->verified ? 'memverifikasi ' : 'membatalkan verifikasi ';
    return back()->with('success', 'Berhasil ' . $msg . $pesertaDidik->user->nama);
  }

  /**
   * Verify all resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePesertaDidikRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function verifyAll(UpdatePesertaDidikRequest $request)
  {
    $this->authorize('verifyAll', PesertaDidik::class);
    PesertaDidik::where(
      'pangkalan_id',
      auth()
        ->user()
        ->pembina
        ->pangkalan_id
    )->get()->each(
      fn ($peserta_didik) => $peserta_didik->update([
        'verified' => $request->action === 'verify'
      ])
    );
    $msg = $request->action === 'verify' ? 'memverifikasi semua peserta didik' : 'membatalkan semua verifikasi';
    return back()->with('success', 'Berhasil ' . $msg);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePesertaDidikRequest  $request
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function uji(UpdatePesertaDidikRequest $request, PesertaDidik $pesertaDidik)
  {
    $this->authorize('uji', $pesertaDidik);
    $pesertaDidik->poins->each(function ($poin) use ($request) {
      $poin->pivot->update(['teruji' => $request->has($poin->id)]);
    });
    return back()->with('success', 'Berhasil mengupdate poin SKU ' . $pesertaDidik->user->nama);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePesertaDidikRequest  $request
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function upload(UpdatePesertaDidikRequest $request, PesertaDidik $pesertaDidik)
  {
    $this->authorize('update', $pesertaDidik);
    // Validasi
    $request->validate(['foto' => 'required|image|file|max:1024']);

    $pesertaDidik->update(['foto' => '/storage/' . $request->file('foto')->store('uploads/profile')]);

    return redirect('/dashboard/peserta_didik/' . $pesertaDidik->id)->with('success', 'Berhasil menyimpan foto ' . $pesertaDidik->nama);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\PesertaDidik  $pesertaDidik
   * @return \Illuminate\Http\Response
   */
  public function destroy(PesertaDidik $pesertaDidik)
  {
    $this->authorize('delete', $pesertaDidik);
    $nama = $pesertaDidik->user->nama;
    $pesertaDidik->delete();
    return back()->with('success', 'Berhasil menghapus Peserta Didik ' . $nama);
  }
}
