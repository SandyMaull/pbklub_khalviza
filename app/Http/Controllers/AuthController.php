<?php

namespace App\Http\Controllers;

use Auth;
use \App\User;
use Illuminate\Http\Request;
use AuthenticatesUsers;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function postlogin(Request $req)
    {
        $email = $req->input('email');
        $password = $req->input('password');
        // $role = user::find('role'); 

        if(Auth::attempt($req->only('email', 'password')))
        {
            return redirect('/dashboard');
        }
        else
        {
            return redirect('/')->with('loginfailed', 'Gagal Login! Data yang dimasukkan tidak terdaftar');
        }
 
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }
}
