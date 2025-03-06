<x-layouts.app title="Odhlášení" :user="auth()->user()">

    <div class="flex items-center justify-center mt-[10%]">
        <div>
            <h3 class="text-xl font-semibold">Opravdu si přejete se odhlásit?</h3>

            <form action="{{ route('logout') }}" method="POST" class="">
                @csrf
                <x-layouts.button>Odhlásit se</x-layouts.button>
            </form>
        </div>
    </div>

</x-layouts.app>
