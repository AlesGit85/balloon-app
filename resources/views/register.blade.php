<x-layouts.index>

    <div>
        <h3 class="text-lg font-bold text-center">Registrace do evidence letů</h3>

        @session('message')
            <p class="text-green-500 font-semibold text-center">Registrace do evidence letů proběhla v pořádku</p>
        @endsession

        <form action="/register" method="post" class="text-center">
            @csrf
            <div class="py-4">

                <input id="name" name="name" type="text" required
                    class="w-full p-2 border border-grey-800 shadow-lg rounded-xl text-center"
                    placeholder="Zvolte si své přihlašovací jméno">

                @error('name')
                <div class="text-red-600 text-sm mb-2">
                    {{ $message }}
                </div>
                    @enderror

                <div class="py-2">
                    <input id="email" name="email" type="email" required
                        class="w-full p-2 border border-grey-800 shadow-lg rounded-xl text-center"
                        placeholder="Vyplňte prosím Váš email">
                </div>

                @error('email')
                    <div class="text-red-600 text-sm mb-2">
                    {{ $message }}
                    </div>
                @enderror

                <div>
                    <input id="password" name="password" type="password" required
                        class="w-full p-2 border border-grey-800 shadow-lg rounded-xl text-center"
                        placeholder="Zvolte si své přihlašovací heslo"><br>

                    @error('password')
                        <div class="text-red-600 text-sm mb-2">
                        {{ $message }}
                        </div>
                    @enderror



                    <x-layouts.button>Zaregistrovat se</x-layouts.button>


                    <a href="/login">Již máte učet? Přihlaste se.</a>

                </div>
            </div>
        </form>

    </div>

</x-layouts.index>
