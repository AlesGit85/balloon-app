<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FlightRecord;
use App\Models\Flight;
use App\Models\Pilot;
use Illuminate\Support\Facades\Auth;

class FlightRecordController extends Controller
{
    /**
     * Zobrazení seznamu letových záznamů – pilot vidí pouze své.
     */
    public function index()
    {
        $user = Auth::user();
        $pilot = Pilot::where('user_ID', $user->id)->first();
    
        if (!$pilot) {
            return redirect()->back()->with('error', 'Nemáte oprávnění zobrazit záznamy o letu.');
        }
    
        // Pilot vidí pouze své letové záznamy
        $records = FlightRecord::where('pilot_id', $pilot->id)->get();
    
        // Načteme seznam letů, které už mají záznam
        $flightsWithRecords = FlightRecord::pluck('flight_id')->toArray();
    
        // Pilot uvidí POUZE LETY, které nemají letový záznam
        $flights = Flight::where('pilot', $pilot->user_name)
                        ->whereNotIn('id', $flightsWithRecords)
                        ->get();
      
        return view('flight_record', compact('records', 'flights', 'pilot'));
    }


    /**
     * Zobrazení formuláře pro vytvoření letového záznamu.
     */
    public function create()
{
    $user = Auth::user();
    $pilot = Pilot::where('user_ID', $user->id)->first();

    if (!$pilot) {
        return redirect()->back()->with('error', 'Nemáte oprávnění k vytváření záznamů o letu.');
    }

    // Získání ID letů, které už mají záznam
    $flightsWithRecords = FlightRecord::pluck('flight_id')->toArray();

    // Vyfiltrujeme pouze lety, které pilotovi patří a zatím nemají záznam
    $flights = Flight::where('pilot', $pilot->user_name)
                    ->whereNotIn('id', $flightsWithRecords) // Filtrujeme jen lety bez záznamu
                    ->get();

    // Logování pro kontrolu
    \Log::info('Lety, které už mají záznam:', $flightsWithRecords);
    \Log::info('Lety dostupné pro výběr:', $flights->pluck('id')->toArray());

    return view('flight_record', compact('flights', 'pilot'));
}

    /**
     * Uložení letového záznamu do databáze.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'flight_id' => 'required|exists:flights,id',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_location' => 'required',
            'end_location' => 'required',
            'crew' => 'nullable|string',
            'passenger_count' => 'required|integer|min:0',
            'passenger_names' => 'nullable|string',
            'registration' => 'required|string',
            'balloon_model' => 'required|string',
            'hours' => 'required|integer|min:0',
            'fuel' => 'required|integer|min:0',
            'temperature' => 'required|string',
            'wind' => 'required|string',
            'visibility' => 'required|integer|min:0',
            'weather' => 'required|string',
            'flight_description' => 'required|string',
            'max_altitude' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'landing' => 'required|string',
            'landing_location' => 'nullable|string',
            'incident' => 'nullable|string',
            'return' => 'nullable|string',
        ]);

        $user = Auth::user();
        $pilot = Pilot::where('user_ID', $user->id)->first();
        $flight = Flight::findOrFail($request->flight_id);

        // Zabráníme pilotovi vytvořit záznam pro let, který mu nepatří.
        if ($flight->pilot !== $pilot->user_name) {
            return redirect()->back()->with('error', 'Nemůžete vytvořit záznam pro tento let.');
        }

        FlightRecord::create([
            'flight_id' => $flight->id,
            'pilot_id' => $pilot->id,
            'number' => $flight->number,
            'date_flights' => $flight->date_flights,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'start_location' => $request->start_location,
            'end_location' => $request->end_location,
            'pilot_name' => $pilot->user_name,
            'license' => $pilot->number_licence,
            'crew' => $request->crew,
            'passenger_count' => $request->passenger_count,
            'passenger_names' => $request->passenger_names,
            'registration' => $request->registration,
            'balloon_model' => $request->balloon_model,
            'hours' => $request->hours,
            'fuel' => $request->fuel,
            'temperature' => $request->temperature,
            'wind' => $request->wind,
            'visibility' => $request->visibility,
            'weather' => $request->weather,
            'flight_description' => $request->flight_description,
            'max_altitude' => $request->max_altitude,
            'distance' => $request->distance,
            'landing' => $request->landing,
            'landing_location' => $request->landing_location,
            'incident' => $request->incident,
            'return' => $request->return,
        ]);

        return redirect()->route('flight_records.index')->with('success', 'Záznam o letu byl úspěšně uložen.');
    }

    /**
     * Aktualizace letového záznamu – pouze pokud patří pilotovi.
     */
    public function update(Request $request, $id)
{
    $record = FlightRecord::findOrFail($id);
    $user = Auth::user();
    $pilot = Pilot::where('user_ID', $user->id)->first();
    
    if ($record->pilot_id !== $pilot->id) {
        return redirect()->route('flight_records.index')->with('error', 'Nemáte oprávnění upravovat tento záznam.');
    }
    
    $validated = $request->validate([
        'start_time' => 'required',
        'end_time' => 'required',
        'end_location' => 'required',
        'crew' => 'nullable|string',
        'passenger_count' => 'required|integer|min:0',
        'passenger_names' => 'nullable|string',
        'registration' => 'required|string',
        'balloon_model' => 'required|string',
        'hours' => 'required|integer|min:0',
        'fuel' => 'required|integer|min:0',
        'temperature' => 'required',
        'wind' => 'required|string',
        'visibility' => 'required|integer|min:0',
        'weather' => 'required|string',
        'flight_description' => 'required|string',
        'max_altitude' => 'required|integer|min:0',
        'distance' => 'required|integer|min:0',
        'landing' => 'required|string',
        'landing_location' => 'nullable|string',
        'incident' => 'nullable|string',
        'return' => 'nullable|string',
    ]);
    
    $record->update($validated);
    
    return redirect()->route('flight_records.index')->with('success', 'Záznam o letu byl úspěšně aktualizován.');
}

    /**
     * Smazání letového záznamu – pouze pokud patří pilotovi.
     */
    public function destroy($id)
    {
        $record = FlightRecord::findOrFail($id);
        $user = Auth::user();
        $pilot = Pilot::where('user_ID', $user->id)->first();

        if ($record->pilot_id !== $pilot->id) {
            return redirect()->route('flight_records.index')->with('error', 'Nemáte oprávnění smazat tento záznam.');
        }

        $record->delete();

        return redirect()->route('flight_records.index')->with('success', 'Záznam o letu byl smazán.');
    }

    public function edit($id)
{
    $user = Auth::user();
    $pilot = Pilot::where('user_ID', $user->id)->first();
    
    if (!$pilot) {
        return redirect()->route('flight_records.index')->with('error', 'Nemáte oprávnění k úpravě záznamů o letu.');
    }
    
    // Načtení záznamu
    $record = FlightRecord::findOrFail($id);
    
    // Ověření, zda záznam patří přihlášenému pilotovi
    if ($record->pilot_id !== $pilot->id) {
        return redirect()->route('flight_records.index')->with('error', 'Nemáte oprávnění upravovat tento záznam.');
    }
    
    // Přesměrování na editační formulář
    return view('edit_flight_record_pilot', compact('record', 'pilot'));
}  

public function logs(Request $request)
{
    $user = Auth::user();

    // Ověření, zda je uživatel admin
    if (!$user || $user->role !== 'admin') {
        return redirect()->route('flight_records.index')->with('error', 'Nemáte oprávnění zobrazit tuto stránku.');
    }

    // Filtrování podle typu záznamu
    $filter = $request->query('filter', 'all');

    if ($filter === 'filled') {
        // Pouze lety, které mají záznam
        $records = FlightRecord::whereNotNull('flight_description')->get();
    } elseif ($filter === 'empty') {
        // Pouze lety, které NEMAJÍ záznam (získáme ID letů, které mají záznam a ty vyloučíme)
        $flightsWithRecords = FlightRecord::pluck('flight_id')->toArray();
        $records = Flight::whereNotIn('id', $flightsWithRecords)->get();
    } else {
        // Všechny záznamy (lety s i bez vyplněného záznamu)
        $flightsWithRecords = FlightRecord::all();
        $flightsWithoutRecords = Flight::whereNotIn('id', FlightRecord::pluck('flight_id')->toArray())->get();
        $records = $flightsWithRecords->merge($flightsWithoutRecords);
    }

    return view('flight_logs', compact('records', 'filter'));
}




}
