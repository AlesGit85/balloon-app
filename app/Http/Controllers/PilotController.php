<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pilot;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PilotController extends Controller
{
    public function create()
    {
        $pilots = User::where('role', 'pilot')->get();
        \Log::info('Počet nalezených pilotů: ' . $pilots->count());
        return view('create_pilot', compact('pilots'));
    }


    public function store(Request $request)
    {

        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'typ_licence' => 'required|in:PPL-B,CPL-B,both-types',
            'number_licence' => 'required|string|max:255',
        ]);


        $user = User::findOrFail($request->user_id);


        Pilot::updateOrCreate(
            ['user_ID' => $request->user_id],
            [
                'user_name' => $user->name,
                'typ_licence' => $request->typ_licence,
                'number_licence' => $request->number_licence,
            ]
        );

        return redirect()->route('pilots.create')->with('success', 'Pilot byl úspěšně vytvořen.');
    }

    public function setVacation(Request $request)
    {
        // Ověření přihlášení uživatele
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'Musíte být přihlášen.');
        }

        // Validace formuláře
        $validated = $request->validate([
            'vacation_date_from' => 'required|date',
            'vacation_date_to' => 'required|date|after_or_equal:vacation_date_from',
        ]);

        // Aktualizace záznamu pilota
        $pilot = Pilot::where('user_ID', $user->id)->first();

        if (!$pilot) {
            return redirect()->back()->with('error', 'Pilot nebyl nalezen.');
        }

        $pilot->update([
            'vacation_date_from' => $request->vacation_date_from,
            'vacation_date_to' => $request->vacation_date_to,
        ]);

        return redirect()->back()->with('success', 'Dovolená byla úspěšně nastavena.');
    }

    public function index()
    {
        $pilots = Pilot::all();
        return view('pilots', compact('pilots'));
    }
}
