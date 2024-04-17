<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    public function register()
    {
        return view('register');
    }

    public function welcome()
    {
        return view('welcome');
    }


    public function create(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ], [
            'username.required' => 'Isi data dengan lengkap!',
            'username.unique' => 'Akun sudah ada, Silahkan login! Bila lupa akun silahkan buat akun dengan data lain',
            'password.required' => 'Isi data dengan lengkap!',
            'password.min' => 'Password minimal harus 6 karakter.',
        ]);
    
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    
        $user = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ];
    
        User::create($user);
        return redirect()->route('welcome');
    }
    

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:users,username',
            'password' => 'required',
        ], [
            'username.required' => 'Isi data dengan lengkap!',
            'password.required' => 'Isi data dengan lengkap!',
            'username.exists' => 'Akun tidak ditemukan, silahkan gunakan data lain atau daftar akun.',
        ]);
    
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {
            return back()->withErrors(['username' => 'Invalid credentials']);
        }
    }
    

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }
}
