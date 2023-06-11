<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    // view login
    public function index()
    {
        return view('login');
    }


    // proses login
    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($data)) {
            return redirect()->route('home.index');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }
    // logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Anda berhasil logout');
    }

    // register
    public function register()
    {
        return view('register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'nama'      => 'required',
            'email'     => 'required|email|unique:users,email',
            'password'  => 'required|min:6'
        ]);
        $data['name']       = $request->nama;
        $data['email']      = $request->email;
        $data['password']   = Hash::make($request->password);
        $data['level']      = 'user';
        User::create($data);

        $login = [

            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($login)) {
            return redirect()->route('home.index');
        } else {
            return redirect()->route('login')->with('failed', 'Email atau Password Salah');
        }
    }
}
