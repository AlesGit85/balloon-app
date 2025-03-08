<x-layouts.app title="Přehled" :user="auth()->user()">

    <div class="container mx-auto py-6">
        <h2 class="font-semibold text-l text-center text-gray-600">Přehled objednávek:</h2>
        
        <!-- Řadicí tlačítka pro objednávky -->
        <div class="flex items-center mb-6">
            <p class="text-sm font-semibold pr-2">Seřadit objednávky podle: </p>
            <div class="flex space-x-2">
                <div class="inline-flex rounded-md shadow-xs">
                    <a href="{{ route('overview', ['sort' => 'order_number', 'direction' => 'asc']) }}" 
                       class="px-3 py-2 text-sm font-medium rounded-l-lg border {{ ($sort == 'order_number' && $direction == 'asc') ? 'bg-red-600 text-white' : 'bg-white border-gray-200' }}">
                        Číslo objednávky ↑
                    </a>
                    <a href="{{ route('overview', ['sort' => 'order_number', 'direction' => 'desc']) }}" 
                       class="px-3 py-2 text-sm font-medium rounded-r-lg border-t border-b border-r {{ ($sort == 'order_number' && $direction == 'desc') ? 'bg-red-600 text-white' : 'bg-white border-gray-200' }}">
                        Číslo objednávky ↓
                    </a>
                </div>
                
                <div class="inline-flex rounded-md shadow-xs">
                    <a href="{{ route('overview', ['sort' => 'date', 'direction' => 'asc']) }}" 
                       class="px-3 py-2 text-sm font-medium rounded-l-lg border {{ ($sort == 'date' && $direction == 'asc') ? 'bg-red-600 text-white' : 'bg-white border-gray-200' }}">
                        Termín ↑
                    </a>
                    <a href="{{ route('overview', ['sort' => 'date', 'direction' => 'desc']) }}" 
                       class="px-3 py-2 text-sm font-medium rounded-r-lg border-t border-b border-r {{ ($sort == 'date' && $direction == 'desc') ? 'bg-red-600 text-white' : 'bg-white border-gray-200' }}">
                        Termín ↓
                    </a>
                </div>
            </div>
        </div>

        @if($orders->isEmpty())
            <p class="text-gray-400 font-semibold">.: Všechny objednávky mají přiřazené lety :.</p>
        @else
    
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach ($orders as $order)
                    <div class="p-4 border rounded-xl shadow-lg hover:bg-red-50 transition duration-300">
                        <div class="flex flex-col space-y-3">
                            <div class="flex justify-between items-center">
                                <span class="font-semibold">Číslo objednávky: {{ $order->order_number }}</span>
                                <span class="text-sm text-gray-500">Termín: {{ $order->date }}</span>
                            </div>
                            
                            <div class="flex justify-between items-center pt-2">
                                <div>
                                    <span class="text-gray-600 text-sm">Odkud:</span>
                                    <span>{{ $order->from }}</span>
                                </div>
                                <div>
                                    <span class="text-gray-600 text-sm">Kam:</span>
                                    <span>{{ $order->to }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <hr class="py-4">
    <h2 class="font-semibold text-l text-center text-gray-600">Přehled letů:</h2>

    <!-- Řadicí tlačítka pro lety -->
    <div class="flex items-center mb-6">
        <p class="text-sm font-semibold pr-2">Seřadit lety podle: </p>
        <div class="flex space-x-2">
            <div class="inline-flex rounded-md shadow-xs">
                <a href="{{ route('overview', ['sort' => 'date_flights', 'direction' => 'asc']) }}" 
                   class="px-3 py-2 text-sm font-medium rounded-l-lg border {{ ($sort == 'date_flights' && $direction == 'asc') ? 'bg-red-600 text-white' : 'bg-white border-gray-200' }}">
                    Termín ↑
                </a>
                <a href="{{ route('overview', ['sort' => 'date_flights', 'direction' => 'desc']) }}" 
                   class="px-3 py-2 text-sm font-medium rounded-r-lg border-t border-b border-r {{ ($sort == 'date_flights' && $direction == 'desc') ? 'bg-red-600 text-white' : 'bg-white border-gray-200' }}">
                    Termín ↓
                </a>
            </div>
        </div>
    </div>

    @if($flights->isEmpty())
    <p class="text-gray-500 font-semibold">Žádné lety nejsou vytvořeny.</p>
@else
    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($flights as $flight)
            <div class="p-4 border rounded-xl shadow-lg hover:bg-red-50 transition duration-300">
                <div class="flex flex-col space-y-3">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold">Let číslo: {{ $flight->number }}</span>
                        <span class="text-sm text-gray-500">Termín: {{ $flight->date_flights }}</span>
                    </div>

                    <div class="flex justify-between items-center pt-2">
                        <div>
                            <span class="text-gray-600 text-sm">Odkud:</span>
                            <span>{{ $flight->from }}</span>
                        </div>
                        <div>
                            <span class="text-gray-600 text-sm">Kam:</span>
                            <span>{{ $flight->to }}</span>
                        </div>
                    </div>

                    <div class="pt-2">
                        <span class="text-gray-600 text-sm font-semibold">Pilot:</span>
                        <span class="{{ $flight->pilot ? 'text-black' : 'text-red-600 font-semibold' }}">
                            {{ $flight->pilot ?: 'nepřiřazen' }}
                        </span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif

</x-layouts.app>
