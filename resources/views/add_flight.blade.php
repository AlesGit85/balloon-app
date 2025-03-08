<x-layouts.app title="Vytvoření letu" :user="auth()->user()">

    <div class="max-w-lg border mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="text-xl font-bold mb-4 text-center">Vytvoření letu</h2>
        
        <form action="{{ route('flights.store') }}" method="POST" class="space-y-4">
            @csrf

            <!-- Výběr objednávky -->
            <div>
                <label for="flight" class="block text-sm font-medium text-gray-700">Číslo objednávky</label>
                <select id="flight" name="number" class="mt-1 w-full p-2 border rounded-md shadow-xs focus:ring-1 focus:ring-gray-300">
                    <option value="">Vyber objednávku</option>
                    @foreach ($orders as $order)
                        <option value="{{ $order->order_number }}">{{ $order->order_number }}</option>
                    @endforeach
                </select>
            </div>

            <div class="flex gap-4 items-center">
                    <label for="date_flights" class="block text-sm font-medium text-gray-700">Termín</label>
                    <input type="date" id="date_flights" name="date_flights" required class="mt-1 w-full p-2 border rounded-md">
            </div>

            <div class="flex gap-4">
                <div class="w-1/2">
                    <label for="from" class="block text-sm font-medium text-gray-700">Odkud</label>
                    <input type="text" id="from" name="from" class="mt-1 w-full p-2 border rounded-md">
                </div>
                <div class="w-1/2">
                    <label for="to" class="block text-sm font-medium text-gray-700">Kam</label>
                    <input type="text" id="to" name="to" class="mt-1 w-full p-2 border rounded-md">
                </div>
            </div>

            <x-layouts.button>Přidat let</x-layouts.button>
        </form>
    </div>

</x-layouts.app>

<script>
    document.getElementById('flight').addEventListener('change', function () {
        let orderNumber = this.value;
        if (!orderNumber) return;

        fetch(`/orders/${orderNumber}`)
            .then(response => {
                if (!response.ok) {
                    throw new Error('Objednávka nenalezena');
                }
                return response.json();
            })
            .then(data => {
                document.getElementById('date_flights').value = data.date;
                document.getElementById('from').value = data.from;
                document.getElementById('to').value = data.to;
            })
            .catch(error => console.error('Chyba při načítání objednávky:', error));
    });
</script>