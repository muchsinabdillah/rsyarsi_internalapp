<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        if ($user = Auth::user()) {
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'mitra') {
                return redirect()->intended('mitra');
            } elseif ($user->level == 'perwakilan') {
                return redirect()->intended('perwakilan');
            } elseif ($user->level == 'pusat') {
                return redirect()->intended('pusat');
            } elseif ($user->level == 'driver') {
                return redirect()->intended('driver');
            }
        }
        return view('login.login');
    }

    public function proses_login(Request $request)
    {
        request()->validate(
            [
                'username' => 'required',
                'password' => 'required',
                'captcha' => ['required', 'captcha'],
            ]
        );

        $kredensil = $request->only('username', 'password');
         
        if (Auth::attempt($kredensil)) {
            $user = Auth::user();
            if ($user->level == 'admin') {
                return redirect()->intended('admin');
            } elseif ($user->level == 'patient') {
                return redirect()->intended('mitra');
            } elseif ($user->level == 'perwakilan') {
                return redirect()->intended('perwakilan');
            } elseif ($user->level == 'pusat') {
                return redirect()->intended('pusat');
            } elseif ($user->level == 'driver') {
                return redirect()->intended('driver');
            }
            
            return redirect()->intended('/');
        }else{
            return redirect('login')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
        }

        
    }

    public function logout(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('login');
    }
}
