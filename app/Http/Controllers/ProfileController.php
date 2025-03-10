<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\Pilot;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $pilot = Pilot::where('user_id', $user->id)->first();
    
        return view('profile', [
            'user' => $user,
            'number_licence' => $pilot ? $pilot->number_licence : 'Není dostupné'
        ]);
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
