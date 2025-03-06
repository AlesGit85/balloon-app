<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\Auth\LoginController;


Route::get('/', function () {
    return view('register');
});
Route::get('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'store']);
Route::post('/login', [AuthController::class, 'authenticate'])->name('login');

Route::middleware(["auth"])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
    Route::get('/add_pilot', function () {
        return view('add_pilot');
    });
    Route::get('/create_pilot', function () {
        return view('create_pilot');
    });

    Route::get('/create_pilot', [PilotController::class, 'create'])->name('pilots.create');
    Route::post('/create_pilot', [PilotController::class, 'store'])->name('pilots.store');
    Route::post('/settings/vacation', [PilotController::class, 'setVacation'])->name('pilots.setVacation');
    Route::get('/pilots', [PilotController::class, 'index'])->name('pilots.index');

    Route::get('/add_flight', [FlightController::class, 'create'])->name('flights.create');
    Route::post('/store_flight', [FlightController::class, 'store'])->name('flights.store');
    Route::get('/orders/{order}', [FlightController::class, 'getOrderDetails']);
    
 
    Route::get('/add_note', function () {
        return view('add_note');
    });
    Route::get('/flight_dashboard', function () {
        return view('flight_dashboard');
    });
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile')->middleware('auth');
    Route::get('/settings', function () {
        return view('settings');
    });
    Route::get('/logout', function () {
        return view('logout');
    });
});
