<x-layouts.app title="Přiřadit pilota" :user="auth()->user()">
    
    <div class="justify-center border p-4 max-w-lg mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-xl font-bold mb-4 text-center">Přidejte pilota k letu</h2>

        <form method="POST" action="{{ route('pilots.assign') }}">
        @csrf
    
        <!-- Výběr letu -->
        <div class="flex flex-col gap-4 p-4">
            <label for="flight_id" class="font-semibold">Vyberte let:</label>
            <select id="flight_id" name="flight_id" class="border rounded-xl shadow-lg p-2" required>
                <option value="">-- Vyberte let --</option>
                @foreach ($flights as $flight)
                    <option value="{{ $flight->id }}">
                        {{ $flight->number }} | {{ $flight->date_flights }} | {{ $flight->from }} → {{ $flight->to }}
                    </option>
                @endforeach
            </select>
            @error('flight_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    
        <!-- Výběr pilota -->
        <div class="flex flex-col gap-4 p-4">
            <label for="pilot_id" class="font-semibold">Vyberte pilota:</label>
            <select id="pilot_id" name="pilot_id" class="border rounded-xl shadow-lg p-2" required>
                <option value="">-- Vyberte pilota --</option>
                @foreach ($pilots as $pilot)
                    <option value="{{ $pilot->id }}">
                        {{ $pilot->user_name }} (ID: {{ $pilot->user_ID }})
                    </option>
                @endforeach
            </select>
            @error('pilot_id')
                <span class="text-red-500">{{ $message }}</span>
            @enderror
        </div>
    
        <x-layouts.button>Přiřadit pilota</x-layouts.button>
    </form>
    
</div>
</x-layouts.app>