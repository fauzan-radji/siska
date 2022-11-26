<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function authenticate(Request $request)
  {
    $credetials = $request->validate([
      'username' => 'required',
      'password' => 'required'
    ]);

    if (Auth::attempt($credetials)) {
      $request->session()->regenerate();

      return redirect()->intended('dashboard');
    }

    return back()->with('error', 'Login gagal');
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerate();

    return redirect('/');
  }
}
