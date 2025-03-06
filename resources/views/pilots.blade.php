<x-layouts.app title="Seznam pilotů" :user="auth()->user()">
    <div class="p-4">
        @if ($pilots->isEmpty())
        <p class="text-red-600 font-semibold">CHYBA:</p>
        <p class="text-gray-600 font-semibold">Žádní piloti nejsou v databázi.</p>
        @else
            <div class="overflow-x-auto">
                <table class="w-full border-collapse border border-gray-300">
                    <thead>
                        <tr class="bg-gray-100">
                            <th class="border border-gray-300 px-4 py-2">ID</th>
                            <th class="border border-gray-300 px-4 py-2">Jméno</th>
                            <th class="border border-gray-300 px-4 py-2">Typ licence</th>
                            <th class="border border-gray-300 px-4 py-2">Číslo licence</th>
                            <th class="border border-gray-300 px-4 py-2">Dovolená od</th>
                            <th class="border border-gray-300 px-4 py-2">Dovolená do</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pilots as $pilot)
                            <tr class="border border-gray-300 text-center">
                                <td class="border border-gray-300 px-4 py-2">{{ $pilot->id }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pilot->user_name }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pilot->typ_licence }}</td>
                                <td class="border border-gray-300 px-4 py-2">{{ $pilot->number_licence }}</td>
                                <td class="border border-gray-300 px-4 py-2">
                                    {{ $pilot->vacation_date_from ? \Carbon\Carbon::parse($pilot->vacation_date_from)->format('d.m.Y') : '–' }}
                                </td>
                                <td class="border border-gray-300 px-4 py-2">
                                    <div class="flex items-center justify-center gap-2">
                                        @if ($pilot->vacation_date_to && \Carbon\Carbon::parse($pilot->vacation_date_to)->isFuture())
                                        <svg class="text-red-600"xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="red" viewBox="0 0 24 24" class="ml-2">
                                            <circle cx="12" cy="12" r="10" stroke="currentColor" stroke-width="2" fill="none"/>
                                            <line x1="12" y1="8" x2="12" y2="12" stroke="currentColor" stroke-width="2"/>
                                            <line x1="12" y1="16" x2="12.01" y2="16" stroke="currentColor" stroke-width="2"/>
                                        </svg>
                                        @endif
                                        {{ $pilot->vacation_date_to ? \Carbon\Carbon::parse($pilot->vacation_date_to)->format('d.m.Y') : '–' }}
                                    </div>    
                                 </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
    <flux:badge color="lime">New</flux:badge>
</x-layouts.app>
