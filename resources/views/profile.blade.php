<x-layouts.app title="Profil" :user="auth()->user()">
    <div class="p-4">
        <div class="max-w-lg border mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">

            <p><strong>Jméno:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>Pozice:</strong> {{ ucfirst($user->role) }}</p>
        </div>
    </div>

</x-layouts.app>
