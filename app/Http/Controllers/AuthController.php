<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;

class AuthController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function login()
    {
        return view('login');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'min:4'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:6'],
        ], [
            'email.unique' => 'Tento e-mail již existuje.',
            'name.min' => 'Uživatelské jméno musí mít alespoň 4 znaky.',
            'password.min' => 'Heslo musí mít alespoň 6 znaků.',


        ]);
        $user = User::create([
            "name" => $validated['name'],
            "email" => $validated['email'],
            "password" => $validated['password'],
            "role" => 'pilot',

        ]);

        return redirect('/login');
    }
    
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            
            $user = Auth::user();
    
            if ($user->role === 'admin') {
                return redirect('/overview');
            } elseif ($user->role === 'pilot') {
                return redirect('/flight_dashboard');
            }
    
        }
    
        return back()->withErrors([
            'email' => 'Přihlašovací údaje nejsou správné.',
        ]);
    }
    
}