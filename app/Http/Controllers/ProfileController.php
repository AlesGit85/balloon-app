<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function show()
    {
        return view('profile')->with('user', Auth::user());
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        // Validace vstupních dat
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required','email','max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        // Aktualizace uživatele
        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profil byl úspěšně aktualizován.');
    }
}
