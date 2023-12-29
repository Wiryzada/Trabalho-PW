<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AuthenticateRequest;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(AuthenticateRequest $request)
    {
        $credentials = $request->validated();

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();

            if (auth()->user()->hasRole('admin')) {
                return redirect()->route('users.index');
            } else if (auth()->user()->hasRole('student')) {
                return redirect()->route('student-voucher.showByStudent');
            }
        }

        return back()->withErrors([
            'email' => 'As credenciais informadas não foram encontradas em nossos registros.',
            'password' => 'As credenciais informadas não foram encontradas em nossos registros.'
        ]);
    }

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
