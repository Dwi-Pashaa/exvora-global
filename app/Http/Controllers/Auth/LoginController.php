<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }

        return view("auth.login");
    }

    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|exists:users,email",
            "password" => "required"
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                return redirect()->route('dashboard');
            } else {
                return back()->with('error', 'Email/Password salah.');
            }
        }

        return back()->with('error', 'Akun tidak terdaftar.');
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
}
