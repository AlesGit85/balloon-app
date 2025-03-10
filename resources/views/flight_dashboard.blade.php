<x-layouts.app title="Přehled letů" :user="auth()->user()">
    <div class="p-4">
        <h2 class="text-xl font-bold mb-4 text-center">Vaše lety</h2>

        @if (session('error'))
            <div class="bg-red-500 text-white p-4 rounded-md shadow-md mb-4 text-center">
                {{ session('error') }}
            </div>
        @endif

        @if (!empty($error))
            <div class="bg-yellow-500 text-white font-semibold p-4 rounded-md shadow-md mb-4 text-center">
                {{ $error }}
            </div>
        @endif

        @if ($flights->isEmpty())
        <p class="text-gray-500 text-center">Jakmile budete mít přiřazené lety, objeví se zde.</p>
    @else
        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-200">
                    <th class="border border-gray-300 p-2">Číslo letu</th>
                    <th class="border border-gray-300 p-2">Datum</th>
                    <th class="border border-gray-300 p-2">Odkud</th>
                    <th class="border border-gray-300 p-2">Kam</th>
                    <th class="border border-gray-300 p-2">Poznámka</th>
                    <th class="border border-gray-300 p-2">Akce</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($flights as $flight)
                    <tr class="text-center">
                        <td class="border border-gray-300 p-2">{{ $flight->number }}</td>
                        <td class="border border-gray-300 p-2">{{ \Carbon\Carbon::parse($flight->date_flights)->format('d.m.Y') }}</td>
                        <td class="border border-gray-300 p-2">{{ $flight->from }}</td>
                        <td class="border border-gray-300 p-2">{{ $flight->to }}</td>
                        <td class="border border-gray-300 p-2"></td>
                        <td class="border border-gray-300 p-2">Přidat poznámku</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
        </div>
</x-layouts.app>
