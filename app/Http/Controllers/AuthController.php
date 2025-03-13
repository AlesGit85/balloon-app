<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Zobrazí registrační formulář
    public function showRegister()
    {
        return view('register');
    }

    // Zobrazí přihlašovací formulář
    public function login()
    {
        return view('login');
    }

    // Odhlášení uživatele
    public function logout(Request $request)
    {
        Auth::logout();

        // Zneplatnění session a odstranění CSRF tokenu
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'Byl jste úspěšně odhlášen.');
    }

    // Registrace nového uživatele
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

        return redirect('/login')->with('success', 'Registrace byla úspěšná. Nyní se můžete přihlásit.');
    }

    // Přihlášení uživatele
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
                return redirect()->route('flight.dashboard');
            }
        }

        return back()->withErrors([
            'email' => 'Přihlašovací údaje nejsou správné.',
        ])->withInput();
    }
}
