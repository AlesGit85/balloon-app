<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PilotController;
use App\Http\Controllers\FlightController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\OverviewController;
use App\Http\Controllers\FlightRecordController;
use App\Http\Controllers\AdminFlightRecordController;

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

        Route::get('/flight_logs', [FlightRecordController::class, 'logs'])
            ->name('flight_logs')
            ->middleware(['auth']);

        // Routy pro ADMINA na úpravu letových záznamů
        Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
            Route::get('/edit_flight_record/{id}', [AdminFlightRecordController::class, 'edit'])->name('admin.edit_flight_record');
            Route::put('/edit_flight_record/{id}', [AdminFlightRecordController::class, 'update'])->name('admin.update_flight_record');
            Route::delete('/delete_flight_record/{id}', [AdminFlightRecordController::class, 'destroy'])->name('admin.delete_flight_record');
        });
    });

    // Routy jen pro roli PILOT
    Route::middleware([RoleMiddleware::class . ':pilot'])->group(function () {
        Route::get('/flight_dashboard', [FlightController::class, 'flightDashboard'])->name('flight.dashboard');
        Route::get('/add_note', [PilotController::class, 'addNoteForm'])->name('pilots.addNote');
        Route::post('/store-note', [PilotController::class, 'storeNote'])->name('pilots.storeNote');

        Route::get('/flight_record', [FlightRecordController::class, 'index'])->name('flight_records.index');
        Route::get('/flight_record/create', [FlightRecordController::class, 'create'])->name('flight_records.create');
        Route::post('/flight_record', [FlightRecordController::class, 'store'])->name('flight_records.store');
        Route::put('/flight_record/{id}', [FlightRecordController::class, 'update'])->name('flight_records.update');
        Route::delete('/flight_record/{id}', [FlightRecordController::class, 'destroy'])->name('flight_records.destroy');
    });

    // Routy pro všechny přihlášené uživatele
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/settings/vacation', [PilotController::class, 'setVacation'])->name('pilots.setVacation');
    Route::get('/settings', [PilotController::class, 'settings'])->name('settings');

    // Editace letových záznamů pro pilota a admina
    Route::get('/flight_record/{id}/edit', [FlightRecordController::class, 'edit'])
        ->name('flight_records.edit')
        ->middleware(['auth', 'role:admin,pilot']);
});
