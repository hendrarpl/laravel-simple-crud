<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function loginProcess(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ],[
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi'
        ]);

        $infoLogin = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if(Auth::attempt($infoLogin)){
            return redirect('/');
        }else{
            return redirect('/login')->withErrors('Username dan password tidak sesuai')->withInput();
        }

    }

    public function logout(){
        Auth::logout();
        return redirect('/login')->with('berhasil-logout', 'anda berhasil logout');
    }

}
