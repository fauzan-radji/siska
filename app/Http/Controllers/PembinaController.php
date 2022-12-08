<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Agama;
use App\Models\Pembina;
use App\Models\Pangkalan;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StorePembinaRequest;
use App\Http\Requests\UpdatePembinaRequest;

class PembinaController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    $this->authorize('viewAny', Pembina::class);
    $data = [];
    if (auth()->user()->isAdmin())
      $data['pembinas'] = Pembina::where('verified', true)->get();
    else {
      $user = auth()->user()->isPembina() ?
        auth()->user()->pembina :
        auth()->user()->peserta_didik;

      $data['pembinas'] = Pembina::where(
        'pangkalan_id',
        $user->pangkalan_id
      )->where('verified', true)->get();
    }
    return view('dashboard.pembina.index', $data);
  }

  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function waitingRoom()
  {
    $this->authorize('viewAny', Pembina::class);
    $data = [];
    if (auth()->user()->isAdmin())
      $data['pembinas'] = Pembina::where('verified', false)->get();
    else {
      $user = auth()->user()->isPembina() ? auth()->user()->pembina : auth()->user()->peserta_didik;
      $data['pembinas'] = Pembina::where('pangkalan_id', $user->pangkalan_id)->where('verified', false)->get();
    }
    return view('dashboard.pembina.index', $data);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    $this->authorize('create', Pembina::class);
    return view('dashboard.pembina.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StorePembinaRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StorePembinaRequest $request)
  {
    $this->authorize('create', Pembina::class);
    $rules = [
      'nama' => 'required|max:255|min:3',
      'username' => 'required|min:5|max:255',
      'password' => 'required|min:8',
      'email' => 'required|email'
    ];

    // if not logged in then validate the pangkalan_id
    if (auth()->guest()) $rules['pangkalan_id'] = 'required';

    $validated = $request->validate($rules);

    $validated['password'] = Hash::make($validated['password']);

    // if logged in then use pangkalan_id from the logged in user
    if (auth()->user())
      $validated['pangkalan_id'] = auth()
        ->user()
        ->pembina
        ->pangkalan_id;

    Pembina::create([
      'user_id' => User::create($validated)->id,
      'pangkalan_id' => $validated['pangkalan_id']
    ]);

    return redirect('/dashboard/pembina')->with('success', 'Berhasil mendaftarkan pembina ' . $validated['nama']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function show(Pembina $pembina)
  {
    $this->authorize('view', $pembina);
    return view('dashboard.pembina.show', [
      'pembina' => $pembina
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function edit(Pembina $pembina)
  {
    $this->authorize('update', $pembina);
    return view('dashboard.pembina.edit', [
      'pembina' => $pembina,
      'pangkalans' => Pangkalan::all(),
      'agamas' => Agama::all()
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePembinaRequest  $request
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function update(UpdatePembinaRequest $request, Pembina $pembina)
  {
    $this->authorize('update', $pembina);
    $validated = $request->validate([
      'nama' => 'required|max:255|min:3',
      'username' => 'required|min:5|max:255',
      'email' => 'required|email',
      'jabatan' => 'required',
      'pangkalan_id' => 'required'
    ]);

    $pembina->user->update([
      'nama' => $validated['nama'],
      'username' => $validated['username'],
      'email' => $validated['email']
    ]);

    $pembina->update([
      'pangkalan_id' => $validated['pangkalan_id'],
      'jabatan' => $validated['jabatan'],
      'gender' => $request->gender,
      'no_hp' => $request->no_hp,
      'alamat' => $request->alamat,
      'tanggal_lahir' => $request->tanggal_lahir,
      'agama_id' => $request->agama_id
    ]);

    return redirect('/dashboard/pembina/' . $pembina->id)->with('success', 'Berhasil mengubah data ' . $validated['nama']);
  }

  /**
   * Verify the specified resource in storage.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function verify(Pembina $pembina)
  {
    $this->authorize('verify', $pembina);
    $pembina->update(['verified' => !$pembina->verified]);
    $msg = $pembina->verified ? 'memverifikasi ' : 'membatalkan verifikasi ';
    return back()->with('success', 'Berhasil ' . $msg . $pembina->nama);
  }

  /**
   * Verify all resource in storage.
   *
   * @param  \App\Http\Requests\UpdatePembinaRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function verifyAll(UpdatePembinaRequest $request)
  {
    $this->authorize('verifyAll', Pembina::class);
    Pembina::where(
      'pangkalan_id',
      auth()
        ->user()
        ->pembina
        ->pangkalan_id
    )->get()->each(
      fn ($pembina) => $pembina->update([
        'verified' => $request->action === 'verify'
      ])
    );
    $msg = $request->action === 'verify' ? 'memverifikasi semua pembina' : 'membatalkan semua verifikasi';
    return back()->with('success', 'Berhasil ' . $msg);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Pembina  $pembina
   * @return \Illuminate\Http\Response
   */
  public function destroy(Pembina $pembina)
  {
    $this->authorize('delete', $pembina);
    $nama = $pembina->user->nama;
    $pembina->delete();
    return back()->with('success', 'Berhasil menghapus Pembina ' . $nama);
  }
}
