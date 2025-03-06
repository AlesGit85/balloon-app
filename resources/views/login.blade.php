<x-layouts.index>

    <div>
        <h3 class="text-lg font-bold">Přihlášení do evidence letů</h3>


        <form action="/login" method="post" class="text-center">
            @csrf
            <div class="py-4">
                <input id="email" name="email" type="email" required
                    class="w-full p-2 border border-grey-800 shadow-lg rounded-xl text-center"
                    placeholder="Přihlašovací email">
            </div>
            <div>
                <input id="password" name="password" type="password" required
                    class="w-full p-2 border border-grey-800 shadow-lg rounded-xl text-center"
                    placeholder="Přihlašovací heslo"><br>
                <x-layouts.button>Přihlásit se</x-layouts.button>
            </div>
            <a href="/">Ještě nemáte učet? Zaregistrujte se.</a>
        </form>

    </div>

</x-layouts.index>
