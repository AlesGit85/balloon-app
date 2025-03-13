<x-layouts.app title="Letové záznamy" :user="auth()->user()">
    <section class="container px-4 mx-auto">
        <div class="p-4 sm:flex sm:items-center sm:justify-between">
            <div>
                <h2 class="text-lg font-medium text-gray-800 dark:text-white">Letové záznamy</h2>
                <span class="px-3 py-1 text-xs text-red-600 bg-red-100 rounded-full dark:bg-gray-800 dark:text-blue-400">
                    Počet záznamů: {{ count($records) }}
                </span>
                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Seznam všech letových záznamů.</p>
            </div>

            <div class="flex items-center mt-4 gap-x-3">
                <button onclick="location.href='{{ route('flight_logs', ['filter' => 'all']) }}'" 
                        class="px-5 py-2 text-sm text-gray-700 bg-gray-100 border rounded-lg dark:bg-gray-800 dark:text-gray-200 {{ $filter === 'all' ? 'bg-red-600 text-white' : '' }}">
                    Všechny
                </button>

                <button onclick="location.href='{{ route('flight_logs', ['filter' => 'filled']) }}'" 
                        class="px-5 py-2 text-sm text-gray-700 bg-gray-100 border rounded-lg dark:bg-gray-800 dark:text-gray-200 {{ $filter === 'filled' ? 'bg-red-600 text-white' : '' }}">
                    Vyplněné
                </button>

                <button onclick="location.href='{{ route('flight_logs', ['filter' => 'empty']) }}'" 
                        class="px-5 py-2 text-sm text-gray-700 bg-gray-100 border rounded-lg dark:bg-gray-800 dark:text-gray-200 {{ $filter === 'empty' ? 'bg-red-600 text-white' : '' }}">
                    Nevyplněné
                </button>
            </div>

        </div>
        <div class="flex flex-col mt-6">
            <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                    <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                        <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                            <thead class="bg-gray-50 dark:bg-gray-800">
                                <tr>
                                    <th class="px-4 py-3">Číslo letu</th>
                                    <th class="px-4 py-3">Datum letu</th>
                                    <th class="px-4 py-3">Pilot</th>
                                    <th class="px-4 py-3">Místo vzletu</th>
                                    <th class="px-4 py-3">Místo přistání</th>
                                    <th class="px-4 py-3">Incidenty a nehody</th>
                                    <th class="px-4 py-3">Akce</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                                @foreach ($records as $record)
                                    <tr class="text-center">
                                        <td class="px-4 py-4">{{ $record->number ?? '—' }}</td>
                                        <td class="px-4 py-4">
                                            {{ \Carbon\Carbon::parse($record->date_flights ?? '—')->format('d.m.Y') }}
                                        </td>
                                        <td class="px-4 py-4">{{ $record->pilot_name ?? '—' }}</td>
                                        <td class="px-4 py-4">{{ $record->start_location ?? '—' }}</td>
                                        <td class="px-4 py-4">{{ $record->end_location ?? '—' }}</td>
                                        <td class="px-4 py-4">{{ $record->incident ?? '—' }}</td>
                                        <td class="px-4 py-4 flex justify-center gap-x-2">
                                            <flux:modal.trigger name="flight-details-{{ $record->id }}">
                                                <flux:button>Zobrazit</flux:button>
                                            </flux:modal.trigger>
                                            <a href="{{ route('admin.edit_flight_record', $record->id) }}">
                                                <flux:button variant="filled">Upravit</flux:button>
                                            </a>
                                            <flux:modal.trigger name="delete-confirmation-{{ $record->id }}">
                                                <flux:button variant="danger">Smazat</flux:button>
                                            </flux:modal.trigger>
                                        </td>
                                    </tr>
                                    <!-- Modal pro detail letu -->
                                    <flux:modal name="flight-details-{{ $record->id }}" class="md:w-[80rem]">
                                        <div class="space-y-6">
                                            <flux:heading size="lg">Detail letu</flux:heading>
                                            <flux:subheading>Podrobné informace o letu</flux:subheading>
                                            <div class="grid grid-cols-2 gap-4">
                                                <div>
                                                    <div class="border-b pb-2"><strong>1. Základní informace</strong>
                                                    </div>
                                                    <flux:input label="Číslo letu" value="{{ $record->number }}"
                                                        disabled />
                                                    <flux:input label="Datum letu"
                                                        value="{{ \Carbon\Carbon::parse($record->date_flights)->format('d.m.Y') }}"
                                                        disabled />
                                                    <flux:input label="Čas vzletu" value="{{ $record->start_time }}"
                                                        disabled />
                                                    <flux:input label="Čas přistání" value="{{ $record->end_time }}"
                                                        disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>2. Místa letu</strong></div>
                                                    <flux:input label="Místo vzletu"
                                                        value="{{ $record->start_location }}" disabled />
                                                    <flux:input label="Místo přistání"
                                                        value="{{ $record->end_location }}" disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>3. Informace o posádce</strong>
                                                    </div>
                                                    <flux:input label="Jméno pilota" value="{{ $record->pilot_name }}"
                                                        disabled />
                                                    <flux:input label="Číslo licence" value="{{ $record->license }}"
                                                        disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>4. Pomocníci</strong></div>
                                                    <flux:textarea label="Pomocníci na startu/přistání"
                                                        value="{{ $record->crew }}" disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>5. Informace o
                                                            pasažérech</strong></div>
                                                    <flux:input label="Počet pasažérů"
                                                        value="{{ $record->passenger_count }}" disabled />
                                                    <flux:textarea label="Jména pasažérů"
                                                        value="{{ $record->passenger_names }}" disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>6. Informace o balónu</strong>
                                                    </div>
                                                    <flux:input label="Registrační číslo"
                                                        value="{{ $record->registration }}" disabled />
                                                    <flux:input label="Model balónu"
                                                        value="{{ $record->balloon_model }}" disabled />
                                                    <flux:input label="Provozní hodiny" value="{{ $record->hours }}"
                                                        disabled />
                                                    <flux:input label="Spotřeba plynu (l)" value="{{ $record->fuel }}"
                                                        disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>7. Meteorologické
                                                            podmínky</strong></div>
                                                    <flux:input label="Teplota vzduchu (°C)"
                                                        value="{{ $record->temperature }}" disabled />
                                                    <flux:input label="Směr a rychlost větru"
                                                        value="{{ $record->wind }}" disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>8. Viditelnost a počasí</strong>
                                                    </div>
                                                    <flux:input label="Viditelnost (km)"
                                                        value="{{ $record->visibility }}" disabled />
                                                    <flux:input label="Stav oblohy"
                                                        value="{{ ucfirst($record->weather) }}" disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>9. Průběh letu</strong></div>
                                                    <flux:textarea label="Popis letu"
                                                        value="{{ $record->flight_description }}" disabled />
                                                    <flux:input label="Maximální výška (m)"
                                                        value="{{ $record->max_altitude }}" disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>10. Přistání</strong></div>
                                                    <flux:input label="Typ přistání"
                                                        value="{{ ucfirst($record->landing) }}" disabled />
                                                    <flux:textarea label="Přesnost přistání"
                                                        value="{{ $record->landing_location }}" disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>11. Bezpečnost</strong></div>
                                                    <flux:textarea label="Incidenty nebo nehody"
                                                        value="{{ $record->incident }}" disabled />
                                                </div>
                                                <div>
                                                    <div class="border-b pb-2"><strong>12. Logistika</strong></div>
                                                    <flux:textarea label="Způsob návratu balónu"
                                                        value="{{ $record->return }}" disabled />
                                                </div>
                                            </div>                                        </div>
                                    </flux:modal>
                                    
                                    <!-- Modální okno pro potvrzení smazání -->
                                    <flux:modal name="delete-confirmation-{{ $record->id }}">
                                        <div class="space-y-4">
                                            <flux:heading size="lg">Potvrzení smazání</flux:heading>
                                            <p>Opravdu chcete smazat letový záznam č. {{ $record->number }} z
                                                {{ \Carbon\Carbon::parse($record->date_flights)->format('d.m.Y') }}?
                                            </p>
                                            <p class="text-red-500">Tato akce je nevratná!</p>
                                            <div class="flex justify-end gap-2 mt-4">
                                                <flux:modal.close>
                                                    <flux:button>Zrušit</flux:button>
                                                </flux:modal.close>
                                                <form action="{{ route('admin.delete_flight_record', $record->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <flux:button type="submit" variant="danger">Smazat</flux:button>
                                                </form>
                                            </div>
                                        </div>
                                    </flux:modal>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layouts.app>