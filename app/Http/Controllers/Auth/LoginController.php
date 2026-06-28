<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Show the login form for a specific role.
     */
    public function showLoginForm(Request $request, $role = null)
    {
        $routeName = $request->route()->getName();
        $roleMap = [
            'login.admin' => 'admin',
            'login.bendahara' => 'bendahara',
            'login.kepala_desa' => 'kepala_desa',
            'login.kaur_umum' => 'kaur_umum',
        ];

        $role = $roleMap[$routeName] ?? 'admin';

        return view('auth.login', ['role' => $role]);
    }

    /**
     * Handle the authentication request.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'role' => 'required|in:admin,bendahara,kepala_desa,kaur_umum',
        ]);

        $credentials = $request->only('email', 'password');
        $role = $request->input('role');
        $remember = $request->boolean('remember');

        if (Auth::guard($role)->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended(route($role . '.dashboard'));
        }

        return back()->withErrors([
            'email' => 'Email atau kata sandi yang Anda masukkan salah.',
        ])->onlyInput('email');
    }
}
