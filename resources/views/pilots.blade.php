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
                            <th class="border border-gray-300 px-4 py-2">Akce</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pilots as $pilot)
                            <tr class="border border-gray-300 text-center">
                                <td class="border border-gray-300 px-4 py-2">{{ $pilot->id }}</td>
                                <div>
                                    <td class="border border-gray-300 px-4 py-2">
                                        @if (
                                            $pilot->vacation_date_from &&
                                                $pilot->vacation_date_to &&
                                                \Carbon\Carbon::now()->between($pilot->vacation_date_from, $pilot->vacation_date_to))
                                            <flux:badge color="red">Dovolená</flux:badge>
                                        @endif
                                        {{ $pilot->user_name }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $pilot->typ_licence }}</td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $pilot->number_licence }}</td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $pilot->vacation_date_from ? \Carbon\Carbon::parse($pilot->vacation_date_from)->format('d.m.Y') : '–' }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">
                                        {{ $pilot->vacation_date_to ? \Carbon\Carbon::parse($pilot->vacation_date_to)->format('d.m.Y') : '–' }}
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">    <div class="flex gap-2 justify-center">
                                        <a href="{{ route('pilots.edit', $pilot->id) }}" class="hover:text-red-600 hover:underline">Upravit</a> /
                                        <a href="#" class="hover:text-red-600 hover:underline">Smazat</a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
</x-layouts.app>
