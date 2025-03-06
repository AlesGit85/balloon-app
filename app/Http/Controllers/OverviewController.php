<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Flight;

class OverviewController extends Controller
{
    public function index(Request $request)
{
    $sort = $request->input('sort', 'id');
    $direction = $request->input('direction', 'asc');
    
    // Povolené sloupce pro řazení
    $allowedSorts = ['order_number', 'date', 'date_flights'];

    // Načítání objednávek
    if (in_array($sort, ['order_number', 'date'])) {
        $orders = Order::orderBy($sort, $direction)->get();
    } else {
        $orders = Order::orderBy('id', 'asc')->get();
    }

    // Načítání letů
    if (in_array($sort, ['date_flights'])) {
        $flights = Flight::orderBy($sort, $direction)->get();
    } else {
        $flights = Flight::orderBy('id', 'asc')->get();
    }

    return view('overview', compact('orders', 'flights', 'sort', 'direction'));
}

}
