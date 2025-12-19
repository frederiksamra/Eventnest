<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authcontroller extends Controller
{
    public function login ()
    {
        return view ("login");
    }

    public function ceklogin(Request $request)
    {
        if(!Auth::attempt(['email'=>$request->email, 'password'=>$request->password]))
        {
            return redirect('/login')->with('alert', 'Email atau password salah!');
        }
        else
        {
            return redirect('/home')->with('alert', 'Berhasil login!');
            
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
