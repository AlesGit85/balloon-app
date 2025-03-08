<x-layouts.app title="Upravit pilota" :user="auth()->user()">
    <div class="p-4 max-w-lg border mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-xl font-semibold mb-4">Upravit pilota</h2>

        @if(session('success'))
            <div class="p-2 mb-4 text-green-700 bg-green-100 rounded">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="p-2 mb-4 text-red-700 bg-red-100 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pilots.update', $pilot->id) }}" method="POST" class="space-y-4">
            @csrf
            @method('PUT')

            <flux:input label="Jméno" name="user_name" value="{{ $pilot->user_name }}" />
            <flux:input label="Typ licence" name="typ_licence" value="{{ $pilot->typ_licence }}" />
            <flux:input label="Číslo licence" name="number_licence" value="{{ $pilot->number_licence }}" />
            <flux:input label="Dovolená od" type="date" name="vacation_date_from" value="{{ $pilot->vacation_date_from }}" />
            <flux:input label="Dovolená do" type="date" name="vacation_date_to" value="{{ $pilot->vacation_date_to }}" />

            <flux:button variant="primary" type="submit">Uložit změny</flux:button>
        </form>
    </div>
</x-layouts.app>
