<?php

namespace App\Http\Controllers;

use App\Models\FlightRecord;
use Illuminate\Http\Request;

class AdminFlightRecordController extends Controller
{
    /**
     * Zobrazení formuláře pro editaci letového záznamu (admin).
     */
    public function edit($id)
    {
        $record = FlightRecord::findOrFail($id);

        return view('edit_flight_record', compact('record'));
    }

    /**
     * Uložení změn letového záznamu (admin).
     */
    public function update(Request $request, $id)
    {
        $record = FlightRecord::findOrFail($id);

        $validatedData = $request->validate([
            'number' => 'required|string|max:255',
            'date_flights' => 'required|date',
            'start_time' => 'required',
            'end_time' => 'required',
            'start_location' => 'required|string|max:255',
            'end_location' => 'required|string|max:255',
            'pilot_name' => 'required|string|max:255',
            'license' => 'required|string|max:255',
            'crew' => 'nullable|string',
            'passenger_count' => 'required|integer|min:0',
            'passenger_names' => 'nullable|string',
            'registration' => 'required|string|max:255',
            'balloon_model' => 'required|string|max:255',
            'hours' => 'required|integer|min:0',
            'fuel' => 'required|integer|min:0',
            'temperature' => 'required|integer',
            'wind' => 'required|string|max:255',
            'visibility' => 'required|integer|min:0',
            'weather' => 'required|string',
            'flight_description' => 'nullable|string',
            'max_altitude' => 'required|integer|min:0',
            'distance' => 'required|integer|min:0',
            'landing' => 'required|string',
            'landing_location' => 'nullable|string',
            'incident' => 'nullable|string',
            'return' => 'nullable|string',
        ]);

        // ✅ Uložíme aktualizované údaje
        $record->update($validatedData);

        return redirect()->route('admin.edit_flight_record', $id)->with('success', 'Letový záznam byl úspěšně aktualizován.');
    }

    /**
     * Smazání letového záznamu.
     */
    public function destroy($id)
    {
        $record = FlightRecord::findOrFail($id);
        $record->delete();

        return redirect()->back()->with('success', 'Letový záznam byl úspěšně smazán.');
    }
}
