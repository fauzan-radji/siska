<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAdminRequest;
use App\Http\Requests\UpdateAdminRequest;
use App\Models\Admin;
use \Illuminate\Support\Facades\Hash;
use \App\Models\User;

class AdminController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('dashboard.admin.index', [
      'admins' => Admin::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('dashboard.admin.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \App\Http\Requests\StoreAdminRequest  $request
   * @return \Illuminate\Http\Response
   */
  public function store(StoreAdminRequest $request)
  {
    $validated = $request->validate([
      'nama' => 'required|max:255|min:3',
      'username' => 'required|min:5|max:255|unique:users',
      'password' => 'required|min:8',
      'email' => 'required|email'
    ]);

    $validated['password'] = Hash::make($validated['password']);

    Admin::create(['user_id' => User::create($validated)->id]);

    return redirect('/dashboard/admin')->with('success', 'Berhasil mendaftarkan user ' . $validated['nama']);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function show(Admin $admin)
  {
    return view('dashboard.admin.show', [
      'admin' => $admin
    ]);
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function edit(Admin $admin)
  {
    return view('dashboard.admin.edit', [
      'admin' => $admin
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \App\Http\Requests\UpdateAdminRequest  $request
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function update(UpdateAdminRequest $request, Admin $admin)
  {
    $validated = $request->validate([
      'nama' => 'required|max:255|min:3',
      'username' => 'required|min:5|max:255',
      'email' => 'required|email'
    ]);

    $admin->user->update($validated);

    return redirect('/dashboard/admin/' . $admin->id)->with('success', 'Berhasil mengubah user ' . $validated['nama']);
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Admin  $admin
   * @return \Illuminate\Http\Response
   */
  public function destroy(Admin $admin)
  {
    $nama = $admin->user->nama;
    $user_id = $admin->user_id;
    User::destroy($user_id);
    $admin->delete();
    return redirect('/dashboard/admin')->with('success', 'Berhasil menghapus user ' . $nama);
  }
}
