<x-layouts.app title="Přidat poznámku" :user="auth()->user()">
    <div class="p-4 border mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <div class="container">
            <h2 class="p-2 mb-2 font-semibold text-center text-lg">Přidat poznámku k letu</h2>

            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <form action="{{ route('pilots.storeNote') }}" method="POST">
                @csrf
                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="flight_id" class="font-semibold text-base p-2">Vyber let</label>
                        <select name="flight_id" id="flight_id" class="border rounded-xl bg-white p-2"" required>
                            @foreach ($flights as $flight)
                            <option value="{{ $flight->id }}" 
                                {{ (isset($selectedFlightId) && $selectedFlightId == $flight->id) ? 'selected' : '' }}>
                                Let {{ $flight->number }} - {{ date('d.m.Y', strtotime($flight->date_flights)) }} 
                                ({{ $flight->from }} → {{ $flight->to }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex flex-col">

                        <label for="note" class="font-semibold text-base p-2">Poznámka</label>
                        <textarea name="note" id="note" class="border rounded-xl bg-white p-2" rows="4" required></textarea>
                    </div>
                </div>

                <x-layouts.button>Uložit poznámku</x-layouts.button>
            </form>
        </div>
    </div>

</x-layouts.app>
