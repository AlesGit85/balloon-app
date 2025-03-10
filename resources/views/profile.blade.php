<x-layouts.app title="Profil" :user="auth()->user()">
    <div class="p-4">
        <div class="max-w-lg border mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg flex items-center justify-between">
            <div>
                <h2 class="text-xl font-semibold mb-4">Profil uživatele</h2>
                <p><strong>Jméno:</strong> {{ $user->name }}</p>
                <p><strong>Email:</strong> {{ $user->email }}</p>
                <p><strong>Pozice:</strong> {{ ucfirst($user->role) }}</p>
                <p><strong>Číslo licence:</strong> {{ $number_licence }}</p>
            </div>
        
            <!-- Flux modal trigger - tlačítko bude vertikálně zarovnané na střed -->
            <flux:modal.trigger name="edit-profile">
                <flux:button variant="primary" class="hover:bg-red-600">Upravit profil</flux:button>
            </flux:modal.trigger>
        </div>
            
    </div>

    <!-- Flux modal -->
    <flux:modal name="edit-profile" class="md:w-96">
        <div class="space-y-6">
            <div>
                <flux:heading size="lg">Upravit profil</flux:heading>
                <flux:subheading>Upravte své osobní údaje.</flux:subheading>
            </div>

            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                @method('PUT')

                <flux:input label="Jméno a příjmení" name="name" placeholder="Your name" value="{{ $user->name }}" />
                <flux:input label="E-mail" name="email" placeholder="Your email" value="{{ $user->email }}" />

                <div class="flex mt-4">
                    <flux:spacer />
                    <flux:button type="submit" variant="primary" class="hover:bg-red-600">Uložit změny</flux:button>
                </div>
            </form>
        </div>
    </flux:modal>
</x-layouts.app>
