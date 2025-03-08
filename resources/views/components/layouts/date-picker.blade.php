@props(['name' => 'date_range'])

<div class="p-4 max-w-md bg-white">

<div x-data="{ switchOn: false }" class="p-4 max-w-md bg-white">
    <!-- Switch -->
    <div class="flex items-center justify-between">
        <span class="text-lg font-medium">Nastavit dovolenou</span>

        <div class="flex items-center space-x-2">
            <input type="checkbox" name="switch" class="hidden" :checked="switchOn">

            <button x-ref="switchButton" type="button" @click="switchOn = !switchOn"
                :class="switchOn ? 'bg-red-600' : 'bg-neutral-200'"
                class="relative inline-flex h-6 py-0.5 ml-4 focus:outline-hidden rounded-full w-10" x-cloak>
                <span :class="switchOn ? 'translate-x-[18px]' : 'translate-x-0.5'"
                    class="w-5 h-5 duration-200 ease-in-out bg-white rounded-full shadow-md"></span>
            </button>

            <label @click="$refs.switchButton.click(); $refs.switchButton.focus()" class="text-sm select-none"
                :class="{ 'text-gray-600': switchOn, 'text-gray-400': !switchOn }" x-cloak>
                Zapnout kalendář
            </label>
        </div>
    </div>

    <!-- Datumová pole a tlačítko Odeslat -->
    <div x-show="switchOn" x-cloak class="mt-4 space-y-2">
        <form action="{{ route('pilots.setVacation') }}" method="post">
            @csrf
            <label for="date_from" class="block text-sm font-medium text-gray-700">Datum od:</label>
            <input type="date" id="date_from" name="vacation_date_from" class="w-full p-2 border rounded-xl">

            <label for="date_to" class="block text-sm font-medium text-gray-700">Datum do:</label>
            <input type="date" id="date_to" name="vacation_date_to" class="w-full p-2 border rounded-xl">

            <x-layouts.button>Nastavit dovolenou</x-layouts.button>
        </form>

    </div>
</div>
