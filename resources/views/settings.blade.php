<x-layouts.app title="Nastavení" :user="auth()->user()">
    <div class="max-w-lg border mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <x-layouts.date-picker />

        <span class="text-m p-4">Aktuální dovolená:
            @if ($vacation)
                <strong>{{ \Carbon\Carbon::parse($vacation['from'])->format('d.m.Y') }}</strong> – 
                <strong>{{ \Carbon\Carbon::parse($vacation['to'])->format('d.m.Y') }}</strong>
            @else
                <span class="text-gray-400">Žádná dovolená není nastavena.</span>
            @endif
        </span>


    </div>
</x-layouts.app>
