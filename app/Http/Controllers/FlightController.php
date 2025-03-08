<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Pilot;
use App\Models\Flight;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class FlightController extends Controller
{
    public function create()
    {
        // Seznam objednávek, které už mají přiřazený let
        $usedOrders = Flight::pluck('number')->toArray();
    
        // Načteme pouze objednávky, které ještě NEMAJÍ let
        $orders = Order::whereNotIn('order_number', $usedOrders)->get();
    
        return view('add_flight', compact('orders'));
    }
    

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|exists:orders,order_number',
            'date_flights' => 'required|date',
            'from' => 'required|string|max:20',
            'to' => 'required|string|max:20',
            'pilot' => 'nullable|string|max:100',
            'notes' => 'nullable|string',
        ]);

        Flight::create([
            'number' => $request->number,
            'date_flights' => $request->date_flights,
            'from' => $request->from,
            'to' => $request->to,
            'pilot' => $request->pilot,
            'notes' => $request->notes,
        ]);

        return redirect()->route('flights.create')->with('success', 'Let byl úspěšně vytvořen.');
    }

    public function getOrderDetails($orderNumber)
    {
        $order = Order::where('order_number', $orderNumber)->first();

        if (!$order) {
            return response()->json(['error' => 'Objednávka nebyla nalezena'], 404);
        }

        return response()->json($order);
    }


    public function flightDashboard()
    {
        $user = Auth::user();
    
        // Najdeme pilota podle user_ID
        $pilot = Pilot::where('user_ID', $user->id)->first();
    
        if (!$pilot) {
            return view('flight_dashboard', [
                'flights' => collect([]), // ✅ Ujistíme se, že flights je kolekce
                'error' => 'Nemáte přiřazené žádné lety.'
            ]);
        }
    
        // Načteme lety a zajistíme, že výsledek je kolekce
        $flights = Flight::where('pilot', $pilot->user_name)
                         ->orderBy('date_flights', 'desc')
                         ->get();
    
        return view('flight_dashboard', compact('flights'));
    }
    

}
