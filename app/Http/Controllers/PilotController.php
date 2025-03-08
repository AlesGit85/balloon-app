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
            'typ_licence' => 'required|in:PPL(B),CPL(B),PPL(B) + CPL(B)',
            'number_licence' => 'required|string|max:50',
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
        $user = Auth::user();

        if (!$user) {
            return redirect()->back()->with('error', 'Musíte být přihlášen.');
        }

        $validated = $request->validate([
            'vacation_date_from' => 'required|date',
            'vacation_date_to' => 'required|date|after_or_equal:vacation_date_from',
        ]);

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

    public function edit($id)
{
    $pilot = Pilot::findOrFail($id);
    return view('edit_pilot', compact('pilot'));
}

public function update(Request $request, $id)
{
    $pilot = Pilot::findOrFail($id);

    $validated = $request->validate([
        'user_name' => 'required|string|max:255',
        'typ_licence' => 'required|string|max:50',
        'number_licence' => 'required|string|max:50',
        'vacation_date_from' => 'nullable|date',
        'vacation_date_to' => 'nullable|date|after_or_equal:vacation_date_from',
    ]);

    $pilot->update($validated);

    return redirect()->route('pilots.index')->with('success', 'Pilot byl úspěšně aktualizován.');
}

public function addPilotForm()
{
    $flights = \App\Models\Flight::all();
    $pilots = \App\Models\Pilot::all();

    return view('add_pilot', compact('flights', 'pilots'));
}

public function assignPilot(Request $request)
{
    $validated = $request->validate([
        'flight_id' => 'required|exists:flights,id',
        'pilot_id' => 'required|exists:pilots,id',
    ]);

    // Najdi let a pilota
    $flight = \App\Models\Flight::findOrFail($request->flight_id);
    $pilot = \App\Models\Pilot::findOrFail($request->pilot_id);

    // Zapiš pilota do sloupce 'pilot' v tabulce flights
    $flight->pilot = $pilot->user_name;
    $flight->save();

    return redirect()->route('pilots.add')->with('success', 'Pilot byl úspěšně přiřazen k letu.');
}

public function settings()
{
    $user = Auth::user();

    // Najdi pilota podle `user_ID`
    $pilot = Pilot::where('user_ID', $user->id)->first();

    // Pokud pilot nemá dovolenou, pošleme `null`
    $vacation = ($pilot && $pilot->vacation_date_from && $pilot->vacation_date_to)
        ? [
            'from' => $pilot->vacation_date_from,
            'to' => $pilot->vacation_date_to
        ]
        : null;

    return view('settings', compact('vacation'));
}

}
