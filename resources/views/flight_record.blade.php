<x-layouts.app title="Záznam o letu" :user="auth()->user()">

    <div class="p-4 border mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="p-2 mb-2 font-semibold text-center text-lg">Záznam o letu horkovzdušným balónem</h2>

        <table class="w-full border-collapse border border-gray-300 mt-4 mb-4">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">Číslo letu</th>
                    <th class="border border-gray-300 p-2">Datum letu</th>
                    <th class="border border-gray-300 p-2">Místo vzletu</th>
                    <th class="border border-gray-300 p-2">Místo přistání</th>
                    <th class="border border-gray-300 p-2">Akce</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($records as $record)
                    <tr class="text-center">
                        <td class="border border-gray-300 p-2">{{ $record->number }}</td>
                        <td class="border border-gray-300 p-2">{{ \Carbon\Carbon::parse($record->date_flights)->format('d.m.Y') }}</td>
                        <td class="border border-gray-300 p-2">{{ $record->start_location }}</td>
                        <td class="border border-gray-300 p-2">{{ $record->end_location }}</td>
                        <td class="border border-gray-300 p-2">
                            <!-- Editační tlačítko -->
                            <a href="{{ route('flight_records.edit', $record->id) }}" class="px-3 py-1 text-sm text-white bg-gray-600 rounded">
                                Upravit
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        


        <form action="{{ route('flight_records.store') }}" method="POST">
            @csrf
            <div class="p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">1. Základní informace</h3>

                <div class="flex flex-col">
                    <label for="flight_id" class="text-sm font-semibold">Vyber let:</label>
                    <select id="flight_id" name="flight_id" required class="border rounded-xl bg-white p-2"
                        onchange="updateFlightDetails()">
                        <option value="" disabled selected>Vyber let</option>
                        @if(isset($flights) && $flights->isNotEmpty())
                        @foreach ($flights as $flight)
                            <option value="{{ $flight->id }}" 
                                data-number="{{ $flight->number }}" 
                                data-date="{{ $flight->date_flights }}" 
                                data-from="{{ $flight->from }}" 
                                data-to="{{ $flight->to }}">
                                Let {{ $flight->number }} - {{ date('d.m.Y', strtotime($flight->date_flights)) }} ({{ $flight->from }} → {{ $flight->to }})
                            </option>
                        @endforeach
                    @else
                        <option value="" disabled>Není dostupný žádný let</option>
                    @endif
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="number" class="text-sm font-semibold">Číslo letu:</label>
                        <input type="text" id="number" name="number" readonly required
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="date" class="text-sm font-semibold">Datum letu:</label>
                        <input type="date" id="date" name="date" readonly required
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="start-time" class="text-sm font-semibold">Čas vzletu:</label>
                        <input type="time" id="start-time" name="start_time" required
                            class="border rounded-xl bg-white p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="end-time" class="text-sm font-semibold">Čas přistání:</label>
                        <input type="time" id="end-time" name="end_time" required
                            class="border rounded-xl bg-white p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="start-location" class="text-sm font-semibold">Místo vzletu:</label>
                        <input type="text" id="start-location" name="start_location" readonly required
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="end-location" class="text-sm font-semibold">Místo přistání:</label>
                        <input type="text" id="end-location" name="end_location" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">2. Informace o posádce</h3>

                <div class="grid grid-cols-3 gap-4">
                    <div class="flex flex-col">
                        <label for="pilot-name" class="text-sm font-semibold">Jméno pilota:</label>
                        <input type="text" id="pilot-name" name="pilot_name" value="{{ $pilot->user_name }}" readonly required
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="license" class="text-sm font-semibold">Číslo licence:</label>
                        <input type="text" id="license" name="license" value="{{ $pilot->number_licence }}" readonly required
                            class="border rounded-xl bg-gray-200 p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="crew" class="text-sm font-semibold">Pomocníci na startu/přistání
                            (jména):</label>
                        <textarea id="crew" name="crew" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">3. Informace o pasažérech</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="passenger-count" class="text-sm font-semibold">Počet pasažérů:</label>
                        <input type="number" id="passenger-count" name="passenger_count" min="0" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">

                        <label for="passenger-names" class="text-sm font-semibold">Jména pasažérů:</label>
                        <textarea id="passenger-names" name="passenger_names" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">4. Informace o balónu</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="registration" class="text-sm font-semibold">Registrační číslo balónu:</label>
                        <input type="text" id="registration" name="registration" required
                            class="border rounded-xl bg-white p-2">

                        <label for="balloon-model" class="text-sm font-semibold">Model balónu:</label>
                        <input type="text" id="balloon-model" name="balloon_model" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="hours" class="text-sm font-semibold">Počet provozních hodin balónu:</label>
                        <input type="number" id="hours" name="hours" required
                            class="border rounded-xl bg-white p-2">

                        <label for="fuel" class="text-sm font-semibold">Spotřeba plynu (v litrech):</label>
                        <input type="number" id="fuel" name="fuel" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2" class="text-sm font-semibold">5. Meteorologické podmínky
                </h3>

                <div class="grid grid-cols-4 gap-4">
                    <div class="flex flex-col">
                        <label for="temperature" class="text-sm font-semibold">Teplota vzduchu (°C):</label>
                        <input type="number" id="temperature" name="temperature" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="wind" class="text-sm font-semibold">Směr a rychlost větru:</label>
                        <input type="text" id="wind" name="wind" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="visibility" class="text-sm font-semibold">Viditelnost (km):</label>
                        <input type="number" id="visibility" name="visibility" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="weather" class="text-sm font-semibold">Stav oblohy:</label>
                        <select id="weather" name="weather" class="border rounded-xl bg-white p-2">
                            <option value="jasno">Jasno</option>
                            <option value="oblačno">Oblačno</option>
                            <option value="zataženo">Zataženo</option>
                            <option value="mlha">Mlha</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">6. Průběh letu</h3>

                <div class="grid grid-cols-3 gap-4">
                    <div class="flex flex-col">
                        <label for="flight-description" class="text-sm font-semibold">Popis letu:</label>
                        <textarea id="flight-description" name="flight_description" required class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                    <div class="flex flex-col">
                        <label for="max-altitude" class="text-sm font-semibold">Maximální výška (m):</label>
                        <input type="number" id="max-altitude" name="max_altitude" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="distance" class="text-sm font-semibold">Uražená vzdálenost (km):</label>
                        <input type="number" id="distance" name="distance" required
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
                            <option value="hladké">Hladké</option>
                            <option value="tvrdé">Tvrdé</option>
                            <option value="nouzové">Nouzové</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="landing-location" class="text-sm font-semibold">Přesnost přistání:</label>
                        <textarea id="landing-location" name="landing_location" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>


            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">8. Bezpečnostní informace</h3>

                <div class="grid grid-cols-1 gap-4">
                    <div class="flex flex-col">
                        <label for="incident" class="text-sm font-semibold">Incidenty nebo nehody:</label>
                        <textarea id="incident" name="incident" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">9. Logistika</h3>
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex flex-col">
                        <label for="return" class="text-sm font-semibold">Způsob návratu balónu:</label>
                        <textarea id="return" name="return" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>
            <x-layouts.button>Odeslat záznam</x-layouts.button>
        </form>

    </div>


    <script>
        function updateFlightDetails() {
            let flightSelect = document.getElementById("flight_id");
            let selectedOption = flightSelect.options[flightSelect.selectedIndex];

            document.getElementById("number").value = selectedOption.getAttribute("data-number") || "";
            document.getElementById("date").value = selectedOption.getAttribute("data-date") || "";
            document.getElementById("start-location").value = selectedOption.getAttribute("data-from") || "";
            document.getElementById("end-location").value = selectedOption.getAttribute("data-to") || "";
        }
    </script>

</x-layouts.app>
