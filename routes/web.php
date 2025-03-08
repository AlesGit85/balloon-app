<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OverviewController;
use App\Http\Middleware\RoleMiddleware;

// Veřejné routy dostupné bez přihlášení
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::get('/logout', function () {
    return view('logout');
})->name('logout.page');

Route::get('/', function () {
    return redirect()->route('login');
});

// Chráněné routy pro přihlášené uživatele
Route::middleware(["auth"])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    // Routy jen pro roli ADMIN
    Route::middleware([RoleMiddleware::class . ':admin'])->group(function () {
        Route::get('/overview', [OverviewController::class, 'index'])->name('overview');
        Route::get('/create_pilot', [PilotController::class, 'create'])->name('pilots.create');
        Route::post('/create_pilot', [PilotController::class, 'store'])->name('pilots.store');
        Route::get('/pilots', [PilotController::class, 'index'])->name('pilots.index');
        Route::get('/pilots/{id}/edit', [PilotController::class, 'edit'])->name('pilots.edit');
        Route::put('/pilots/{id}', [PilotController::class, 'update'])->name('pilots.update');
        Route::get('/add_flight', [FlightController::class, 'create'])->name('flights.create');
        Route::post('/store_flight', [FlightController::class, 'store'])->name('flights.store');
        Route::get('/add_pilot', [PilotController::class, 'addPilotForm'])->name('pilots.add');
        Route::post('/assign_pilot', [PilotController::class, 'assignPilot'])->name('pilots.assign');
        Route::get('/orders/{order}', [FlightController::class, 'getOrderDetails']);
    });

    // Routy jen pro roli PILOT
    Route::middleware([RoleMiddleware::class . ':pilot'])->group(function () {
        Route::get('/flight_dashboard', [FlightController::class, 'flightDashboard'])->name('flight.dashboard');
        Route::get('/add_note', function () {
            return view('add_note');
        });
    });
    
    // Routy pro všechny přihlášené uživatele
    Route::post('/settings/vacation', [PilotController::class, 'setVacation'])->name('pilots.setVacation');
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/settings', function () {
        return view('settings');
    });
    Route::get('/settings', [PilotController::class, 'settings'])->name('settings');
});
