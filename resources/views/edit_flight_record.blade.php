<x-layouts.app title="Úprava letového záznamu" :user="auth()->user()">
    <section class="container px-4 mx-auto pb-4">
        <p class="mt-4 text-sm text-gray-500 dark:text-gray-300">Zde můžete upravit všechny údaje o letu.</p>

        <form method="POST" action="{{ route('admin.update_flight_record', $record->id) }}" class="mt-6 space-y-6">            @csrf
            @method('PUT')

            <!-- Základní informace -->
            <div class="border-b pb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">1. Základní informace</h3>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <flux:input label="Číslo letu" name="number" value="{{ $record->number }}" required />
                    <flux:input type="date" label="Datum letu" name="date_flights" value="{{ $record->date_flights }}" required />
                    <flux:input type="time" label="Čas vzletu" name="start_time" value="{{ $record->start_time }}" required />
                    <flux:input type="time" label="Čas přistání" name="end_time" value="{{ $record->end_time }}" required />
                    <flux:input label="Místo vzletu" name="start_location" value="{{ $record->start_location }}" required />
                    <flux:input label="Místo přistání" name="end_location" value="{{ $record->end_location }}" required />
                </div>
            </div>

            <!-- Informace o posádce -->
            <div class="border-b pb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">2. Informace o posádce</h3>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <flux:input label="Jméno pilota" name="pilot_name" value="{{ $record->pilot_name }}" required />
                    <flux:input label="Číslo licence" name="license" value="{{ $record->license }}" required />
                </div>
                <flux:textarea label="Pomocníci na startu/přistání" name="crew">{{ $record->crew }}</flux:textarea>
            </div>

            <!-- Informace o pasažérech -->
            <div class="border-b pb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">3. Informace o pasažérech</h3>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <flux:input type="number" label="Počet pasažérů" name="passenger_count" value="{{ $record->passenger_count }}" required />
                    <flux:textarea label="Jména pasažérů" name="passenger_names">{{ $record->passenger_names }}</flux:textarea>
                </div>
            </div>

            <!-- Informace o balónu -->
            <div class="border-b pb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">4. Informace o balónu</h3>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <flux:input label="Registrační číslo" name="registration" value="{{ $record->registration }}" required />
                    <flux:input label="Model balónu" name="balloon_model" value="{{ $record->balloon_model }}" required />
                    <flux:input type="number" label="Provozní hodiny" name="hours" value="{{ $record->hours }}" required />
                    <flux:input type="number" label="Spotřeba plynu (l)" name="fuel" value="{{ $record->fuel }}" required />
                </div>
            </div>

            <!-- Meteorologické podmínky -->
            <div class="border-b pb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">5. Meteorologické podmínky</h3>
                <div class="grid grid-cols-2 gap-4 mt-4">
                    <flux:input type="number" label="Teplota vzduchu (°C)" name="temperature" value="{{ $record->temperature }}" required />
                    <flux:input label="Směr a rychlost větru" name="wind" value="{{ $record->wind }}" required />
                    <flux:input type="number" label="Viditelnost (km)" name="visibility" value="{{ $record->visibility }}" required />
                    <flux:select label="Stav oblohy" name="weather">
                        <option value="jasno" @if($record->weather == 'jasno') selected @endif>Jasno</option>
                        <option value="oblačno" @if($record->weather == 'oblačno') selected @endif>Oblačno</option>
                        <option value="zataženo" @if($record->weather == 'zataženo') selected @endif>Zataženo</option>
                        <option value="mlha" @if($record->weather == 'mlha') selected @endif>Mlha</option>
                    </flux:select>
                </div>
            </div>

            <!-- Průběh letu -->
            <div class="border-b pb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">6. Průběh letu</h3>
                <flux:textarea label="Popis letu" name="flight_description">{{ $record->flight_description }}</flux:textarea>
                <flux:input type="number" label="Maximální výška (m)" name="max_altitude" value="{{ $record->max_altitude }}" required />
                <flux:input type="number" label="Uražená vzdálenost (km)" name="distance" value="{{ $record->distance }}" required />
            </div>

            <!-- Přistání -->
            <div class="border-b pb-4">
                <h3 class="text-lg font-semibold text-gray-700 dark:text-white">7. Přistání</h3>
                <flux:select label="Typ přistání" name="landing">
                    <option value="hladké" @if($record->landing == 'hladké') selected @endif>Hladké</option>
                    <option value="tvrdé" @if($record->landing == 'tvrdé') selected @endif>Tvrdé</option>
                    <option value="nouzové" @if($record->landing == 'nouzové') selected @endif>Nouzové</option>
                </flux:select>
                <flux:textarea label="Přesnost přistání" name="landing_location">{{ $record->landing_location }}</flux:textarea>
            </div>

            <!-- Incidenty a nehody -->
            <flux:textarea label="Incidenty nebo nehody" name="incident">{{ $record->incident }}</flux:textarea>

            <!-- Logistika -->
            <flux:textarea label="Způsob návratu balónu" name="return">{{ $record->return }}</flux:textarea>

            <div class="flex justify-end">
                <flux:button type="submit" variant="primary">Uložit změny</flux:button>
            </div>
        </form>
    </section>
</x-layouts.app>
