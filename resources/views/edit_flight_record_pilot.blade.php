<x-layouts.app title="Úprava záznamu o letu" :user="auth()->user()">
    <div class="p-4 border mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="p-2 mb-2 font-semibold text-center text-lg">Úprava záznamu o letu horkovzdušným balónem</h2>
        
        <form action="{{ route('flight_records.update', $record->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">1. Základní informace</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="number" class="text-sm font-semibold">Číslo letu:</label>
                        <input type="text" id="number" name="number" value="{{ $record->number }}" readonly
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="date" class="text-sm font-semibold">Datum letu:</label>
                        <input type="date" id="date" name="date_flights" value="{{ $record->date_flights }}" readonly
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="start-time" class="text-sm font-semibold">Čas vzletu:</label>
                        <input type="time" id="start-time" name="start_time" value="{{ $record->start_time }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="end-time" class="text-sm font-semibold">Čas přistání:</label>
                        <input type="time" id="end-time" name="end_time" value="{{ $record->end_time }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="start-location" class="text-sm font-semibold">Místo vzletu:</label>
                        <input type="text" id="start-location" name="start_location" value="{{ $record->start_location }}" readonly
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="end-location" class="text-sm font-semibold">Místo přistání:</label>
                        <input type="text" id="end-location" name="end_location" value="{{ $record->end_location }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                </div>
            </div>
            
            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">2. Informace o posádce</h3>
                <div class="grid grid-cols-3 gap-4">
                    <div class="flex flex-col">
                        <label for="pilot-name" class="text-sm font-semibold">Jméno pilota:</label>
                        <input type="text" id="pilot-name" name="pilot_name" value="{{ $record->pilot_name }}" readonly required
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="license" class="text-sm font-semibold">Číslo licence:</label>
                        <input type="text" id="license" name="license" value="{{ $record->license }}" readonly required
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="crew" class="text-sm font-semibold">Pomocníci na startu/přistání
                            (jména):</label>
                        <textarea id="crew" name="crew" class="border rounded-xl bg-white p-2">{{ $record->crew }}</textarea>
                    </div>
                </div>
            </div>
            
            <!-- Další sekce formuláře s předvyplněnými hodnotami z $record -->
            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">3. Informace o pasažérech</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="passenger-count" class="text-sm font-semibold">Počet pasažérů:</label>
                        <input type="number" id="passenger-count" name="passenger_count" value="{{ $record->passenger_count }}" min="0" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="passenger-names" class="text-sm font-semibold">Jména pasažérů:</label>
                        <textarea id="passenger-names" name="passenger_names" class="border rounded-xl bg-white p-2">{{ $record->passenger_names }}</textarea>
                    </div>
                </div>
            </div>
            
            <!-- Sekce 4 až 9 s předvyplněnými hodnotami -->
            <!-- ... -->
            
            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">4. Informace o balónu</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="registration" class="text-sm font-semibold">Registrační číslo balónu:</label>
                        <input type="text" id="registration" name="registration" value="{{ $record->registration }}" required
                            class="border rounded-xl bg-white p-2">
                        <label for="balloon-model" class="text-sm font-semibold">Model balónu:</label>
                        <input type="text" id="balloon-model" name="balloon_model" value="{{ $record->balloon_model }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="hours" class="text-sm font-semibold">Počet provozních hodin balónu:</label>
                        <input type="number" id="hours" name="hours" value="{{ $record->hours }}" required
                            class="border rounded-xl bg-white p-2">
                        <label for="fuel" class="text-sm font-semibold">Spotřeba plynu (v litrech):</label>
                        <input type="number" id="fuel" name="fuel" value="{{ $record->fuel }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                </div>
            </div>
            
            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2" class="text-sm font-semibold">5. Meteorologické podmínky</h3>
                <div class="grid grid-cols-4 gap-4">
                    <div class="flex flex-col">
                        <label for="temperature" class="text-sm font-semibold">Teplota vzduchu (°C):</label>
                        <input type="number" id="temperature" name="temperature" value="{{ $record->temperature }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="wind" class="text-sm font-semibold">Směr a rychlost větru:</label>
                        <input type="text" id="wind" name="wind" value="{{ $record->wind }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="visibility" class="text-sm font-semibold">Viditelnost (km):</label>
                        <input type="number" id="visibility" name="visibility" value="{{ $record->visibility }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="weather" class="text-sm font-semibold">Stav oblohy:</label>
                        <select id="weather" name="weather" class="border rounded-xl bg-white p-2">
                            <option value="jasno" {{ $record->weather == 'jasno' ? 'selected' : '' }}>Jasno</option>
                            <option value="oblačno" {{ $record->weather == 'oblačno' ? 'selected' : '' }}>Oblačno</option>
                            <option value="zataženo" {{ $record->weather == 'zataženo' ? 'selected' : '' }}>Zataženo</option>
                            <option value="mlha" {{ $record->weather == 'mlha' ? 'selected' : '' }}>Mlha</option>
                        </select>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">6. Průběh letu</h3>
                <div class="grid grid-cols-3 gap-4">
                    <div class="flex flex-col">
                        <label for="flight-description" class="text-sm font-semibold">Popis letu:</label>
                        <textarea id="flight-description" name="flight_description" required class="border rounded-xl bg-white p-2">{{ $record->flight_description }}</textarea>
                    </div>
                    <div class="flex flex-col">
                        <label for="max-altitude" class="text-sm font-semibold">Maximální výška (m):</label>
                        <input type="number" id="max-altitude" name="max_altitude" value="{{ $record->max_altitude }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="distance" class="text-sm font-semibold">Uražená vzdálenost (km):</label>
                        <input type="number" id="distance" name="distance" value="{{ $record->distance }}" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                </div>
            </div>
            
            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">7. Přistání</h3>
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="landing" class="text-sm font-semibold">Typ přistání:</label>
                        <select id="landing" name="landing" class="border rounded-xl bg-white p-2">
                            <option value="hladké" {{ $record->landing == 'hladké' ? 'selected' : '' }}>Hladké</option>
                            <option value="tvrdé" {{ $record->landing == 'tvrdé' ? 'selected' : '' }}>Tvrdé</option>
                            <option value="nouzové" {{ $record->landing == 'nouzové' ? 'selected' : '' }}>Nouzové</option>
                        </select>
                    </div>
                    <div class="flex flex-col">
                        <label for="landing-location" class="text-sm font-semibold">Přesnost přistání:</label>
                        <textarea id="landing-location" name="landing_location" class="border rounded-xl bg-white p-2">{{ $record->landing_location }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">8. Bezpečnostní informace</h3>
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex flex-col">
                        <label for="incident" class="text-sm font-semibold">Incidenty nebo nehody:</label>
                        <textarea id="incident" name="incident" class="border rounded-xl bg-white p-2">{{ $record->incident }}</textarea>
                    </div>
                </div>
            </div>
            
            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">9. Logistika</h3>
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex flex-col">
                        <label for="return" class="text-sm font-semibold">Způsob návratu balónu:</label>
                        <textarea id="return" name="return" class="border rounded-xl bg-white p-2">{{ $record->return }}</textarea>
                    </div>
                </div>
            </div>
            
            <x-layouts.button>Uložit změny</x-layouts.button>
        </form>
    </div>
</x-layouts.app>