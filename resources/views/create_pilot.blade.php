<x-layouts.app title="Vytvořit pilota" :user="auth()->user()">

        <div class="justify-center border p-4 max-w-lg mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
            <h2 class="text-xl font-bold mb-4 text-center">Vytvořte plota</h2>
            @php
                if (!isset($pilots)) {
                    $pilots = \App\Models\User::where('role', 'pilot')->get();
                }
            @endphp


<form method="POST" action="{{ route('pilots.store') }}">
    @csrf
    
    @if (session('success'))
        <div class="bg-green-500 font-semibold text-center text-white p-4 mb-4 rounded-lg shadow-md">
            {{ session('success') }}
        </div>
    @endif
                <div class="flex gap-4 p-2 items-center">
                    <label for="user_id" class="font-semibold">Vyberte uživatele:</label>
                    <div class="border rouded-xl shadow-lg items-center">
                        <select id="user_id" name="user_id" class="p-2 items-center"
                            @error('user_id') is-invalid @enderror" required>
                            <option value="">-- Vyberte uživatele --</option>
                            @if (isset($pilots) && count($pilots) > 0)
                                @foreach ($pilots as $user)
                                    <option value="{{ $user->id }}" data-name="{{ $user->name }}">
                                        {{ $user->name }}
                                        -
                                        {{ $user->email }}</option>
                                @endforeach
                            @else
                                <option value="">Žádní piloti nebyli nalezeni</option>
                            @endif
                        </select>
                        <!-- Skryté pole pro user_name -->
                        <input type="hidden" id="user_name" name="user_name">
                        @error('user_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="flex items-center gap-4 p-4">
                    <label class="font-semibold">Typ licence:</label>
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="typ_licence" id="licence_ppl"
                                value="PPL-B" required>
                            <label class="form-check-label" for="licence_ppl">
                                PPL(B)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="typ_licence" id="licence_cpl"
                                value="CPL-B">
                            <label class="form-check-label" for="licence_cpl">
                                CPL(B)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="typ_licence" id="licence_both"
                                value="both-types">
                            <label class="form-check-label" for="licence_both">
                                PPL(B) + CPL(B)
                            </label>
                        </div>
                        @error('typ_licence')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class=" flex gap-4 p-4 items-center">
                    <label for="number_licence" class="font-semibold">Číslo licence:</label>
                    <input id="number_licence" type="text" class="border rounded-xl shadow-lg p-2"
                        @error('number_licence') is-invalid @enderror" name="number_licence" required>
                    @error('number_licence')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <x-layouts.button>Vytvořit pilota</x-layouts.button>
            </form>


            <!-- JavaScript pro automatické vyplnění user_name -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const userSelect = document.getElementById('user_id');
                    const userNameInput = document.getElementById('user_name');

                    userSelect.addEventListener('change', function() {
                        const selectedOption = userSelect.options[userSelect.selectedIndex];
                        if (selectedOption.value) {
                            userNameInput.value = selectedOption.getAttribute('data-name');
                        } else {
                            userNameInput.value = '';
                        }
                    });
                });
            </script>
        </div>
    </div>

</x-layouts.app>
