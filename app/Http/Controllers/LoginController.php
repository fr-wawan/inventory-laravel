<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index()
  {
    return view('auth.login');
  }

  public function login(Request $request)
  {
    $validatedData = $request->validate([
      'email' => 'required',
      'password' => 'required',
    ]);

    if (Auth::attempt($validatedData)) {
      $request->session()->regenerate();

      if (auth()->user()->is_admin !== 0) {

        return redirect()->intended('/admin/dashboard');
      }
      return redirect()->intended('/');
    }

    return back()->with(['error' => 'Invalid Credentials']);
  }

  public function logout(Request $request)
  {
    Auth::logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    return redirect()->route('auth.login');
  }
}
