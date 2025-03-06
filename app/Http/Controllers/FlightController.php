<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Flight;

class FlightController extends Controller
{
    public function create()
    {
        $orders = Order::all(); // Načte objednávky z databáze
        return view('add_flight', compact('orders')); // ✅ Ujisti se, že odpovídá názvu Blade souboru
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'number' => 'required|exists:orders,order_number',
            'date_flights' => 'required|date',
            'from' => 'required|string|max:255',
            'to' => 'required|string|max:255',
            'pilot' => 'nullable|string|max:255',
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
}
