<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function register(){
        return view('register.index');
    }

    public function storeRegister(Request $request){
        $request->validate([
            'username'=> 'required',
            'password' => 'required',
            'email' => 'required|email|unique:users',
            'alamat' => 'required',
        ]);

        $username = $request->username;
        $password = $request->password;
        $email = $request->email;
        $alamat = $request->alamat;
        $role = "User";

        User::create([
            'username' => $username,
            'password' => bcrypt($password),
            'email' => $email,
            'alamat' => $alamat,
            'role' => $role
        ]);

        return redirect()->route('login')
        ->with('success','Registrasi berhasil');
    }

    public function login(){
        return view('login.index');
    }

    public function logout(){
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerate();
        return redirect('/login');
    }
}
