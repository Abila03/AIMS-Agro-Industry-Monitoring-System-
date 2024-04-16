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

    public function create(Request $request)
    {
        // Validate the request data
        // $request->validate([
        //     'username' => 'required|unique:users',
        //     'password' => 'required|min:6',
        // ]);
      
        $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required|min:6',
        ]);

        $user = [
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ];

        User::create($user);
        return redirect()->route('home');
    }

    public function showLoginForm()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $user = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($user)) {
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
