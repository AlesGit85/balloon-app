<!doctype html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? '' }} - Administrace - Evidence letu balonem</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">
    @fluxAppearance
</head>
<div class="flex h-screen">

    <!-- Levý panel (boční lišta) -->
    <aside class="fixed top-0 left-0 h-screen w-[20%] bg-gray-50 p-4 border-r overflow-y-auto">

        <!-- Hlavička s logem -->
        <div class="flex items-center gap-4 mb-8">
            <a href="/profile" class="flex">
                <img class="h-12" src="{{ asset('img/Group24.avif') }}" alt="Evidence letů">
                <p class="p-2 font-bold text-lg">Evidence letů</p>
            </a>
        </div>

        <!-- Navigace -->
        <nav class="flex flex-col gap-2">
            <h3 class="text-sm uppercase font-bold p-4">Navigace</h3>

            @if (auth()->check() && auth()->user()->role === 'admin')
                <!-- Sekce: Lety -->
                <div class="pl-4">
                    <h6 class="text-sm text-gray-600">.: Lety :.</h6>
                </div>

                <div @class([
                    'flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl',
                    'bg-red-600 text-white' => request()->is('overview'),
                ])>


                    <a href="/overview" class="flex pl-2 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-layout-dashboard">
                            <rect width="7" height="9" x="3" y="3" rx="1" />
                            <rect width="7" height="5" x="14" y="3" rx="1" />
                            <rect width="7" height="9" x="14" y="12" rx="1" />
                            <rect width="7" height="5" x="3" y="16" rx="1" />
                        </svg>
                        Přehled</a>
                </div>

                <div @class([
                    'flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl',
                    'bg-red-600 text-white' => request()->is('add_flight'),
                ])> <a href="/add_flight" class="flex pl-2 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-clipboard-plus">
                            <rect width="8" height="4" x="8" y="2" rx="1" ry="1" />
                            <path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2" />
                            <path d="M9 14h6" />
                            <path d="M12 17v-6" />
                        </svg>
                        Přidat let</a>
                </div>

                <div @class([
                    'flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl',
                    'bg-red-600 text-white' => request()->is('create_pilot'),
                ])> <a href="/create_pilot" class="flex pl-2 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user-pen">
                            <path d="M11.5 15H7a4 4 0 0 0-4 4v2" />
                            <path
                                d="M21.378 16.626a1 1 0 0 0-3.004-3.004l-4.01 4.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                            <circle cx="10" cy="7" r="4" />
                        </svg>
                        Vytvořit pilota</a>
                </div>

                <div @class([
                    'flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl',
                    'bg-red-600 text-white' => request()->is('pilots'),
                ])> <a href="/pilots" class="flex pl-2 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-contact-round">
                            <path d="M16 2v2" />
                            <path d="M17.915 22a6 6 0 0 0-12 0" />
                            <path d="M8 2v2" />
                            <circle cx="12" cy="12" r="4" />
                            <rect x="3" y="4" width="18" height="18" rx="2" />
                        </svg>
                        Seznam pilotů</a>
                </div>

                <div @class([
                    'flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl',
                    'bg-red-600 text-white' => request()->is('add_pilot'),
                ])> <a href="/add_pilot" class="flex pl-2 gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="lucide lucide-user-round-plus">
                            <path d="M2 21a8 8 0 0 1 13.292-6" />
                            <circle cx="10" cy="8" r="5" />
                            <path d="M19 16v6" />
                            <path d="M22 19h-6" />
                        </svg>
                        Přiřadit pilota</a>
                </div>
            @endif
            <div class="p-2"></div>
            <!-- Tady začíná navigace týkající se pilotů -->

            <div class="pl-4">
                <h6 class="text-sm text-gray-600">.: Pilot :.</h6>
            </div>

            <div @class([
                'flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl',
                'bg-red-600 text-white' => request()->is('flight_dashboard'),
            ])> <a href="/flight_dashboard" class="flex pl-2 gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-layout-dashboard">
                        <rect width="7" height="9" x="3" y="3" rx="1" />
                        <rect width="7" height="5" x="14" y="3" rx="1" />
                        <rect width="7" height="9" x="14" y="12" rx="1" />
                        <rect width="7" height="5" x="3" y="16" rx="1" />
                    </svg>
                    Přehled letů</a>
            </div>

            <div @class([
                'flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl',
                'bg-red-600 text-white' => request()->is('add_note'),
            ])> <a href="/add_note" class="flex pl-2 gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-notebook-pen">
                        <path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4" />
                        <path d="M2 6h4" />
                        <path d="M2 10h4" />
                        <path d="M2 14h4" />
                        <path d="M2 18h4" />
                        <path
                            d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z" />
                    </svg>
                    Přidat záznamy k letu</a>
            </div>

        </nav>
    </aside>

    <!-- Pravý panel (hlavička) -->
    <main class="ml-[20%] flex-1 bg-white p-6">
        <header class="flex justify-between p-4 bg-white border-b">
            <h1 class="font-medium text-2xl">{{ $title ?? '' }}</h1>

            <div class="flex">
                <div class="flex bg-zinc-100 items-center border rounded-l-full pl-2">
                    <svg class="text-zinc-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                    <input placeholder=" Vyhledávání..." type="search" class="bg-zinc-100 focus:outline-none">
                </div>
                <button type="submit" class="bg-red-600 items-center p-2 rounded-r-full">
                    <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search">
                        <circle cx="11" cy="11" r="8" />
                        <path d="m21 21-4.3-4.3" />
                    </svg>
                </button>
            </div>

            <div class="flex items-center gap-2 px-2">

                <!-- Upozornění -->
                <div x-data="{ modalOpen: false }" @keydown.escape.window="modalOpen = false"
                    class="relative z-50 w-auto h-auto">
                    <svg @click="modalOpen=true" class="text-gray-400 hover:border-b hover:border-red-500 hover:pb-1"
                        xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="lucide lucide-bell">
                        <path d="M10.268 21a2 2 0 0 0 3.464 0" />
                        <path
                            d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326" />
                    </svg>
                    <template x-teleport="body">
                        <div x-show="modalOpen"
                            class="fixed top-0 left-0 z-[99] flex items-center justify-center w-screen h-screen"
                            x-cloak>
                            <div x-show="modalOpen" x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                x-transition:leave="ease-in duration-300" x-transition:leave-start="opacity-100"
                                x-transition:leave-end="opacity-0" @click="modalOpen=false"
                                class="absolute inset-0 w-full h-full bg-black bg-opacity-40"></div>
                            <div x-show="modalOpen" x-trap.inert.noscroll="modalOpen"
                                x-transition:enter="ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave="ease-in duration-200"
                                x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                class="relative w-full py-6 bg-white px-7 sm:max-w-lg sm:rounded-lg">
                                <div class="flex items-center justify-between pb-2">
                                    <h3 class="text-xl font-bold mb-4">Upozornění</h3>
                                    <button @click="modalOpen=false"
                                        class="absolute top-0 right-0 flex items-center justify-center w-8 h-8 mt-5 mr-5 text-gray-600 rounded-full hover:text-gray-800 hover:bg-gray-50">
                                        <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none"
                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6 18L18 6M6 6l12 12" />
                                        </svg>
                                    </button>
                                </div>
                                <div class="relative w-auto">
                                    <p class="text-gray-400">V tuto chvíli nemáte žádná nová upozornění.</p>
                                </div>
                            </div>
                        </div>
                    </template>
                </div>

                <!-- Avatar -->
                <div x-data="{
                    dropdownOpen: false
                }" class="relative">

                    <button @click="dropdownOpen=true"
                        class="inline-flex items-center justify-center h-12 py-2 pl-3 pr-12 text-sm font-medium transition-colors bg-white border rounded-md text-neutral-700 hover:bg-neutral-100 active:bg-white focus:bg-white focus:outline-none disabled:opacity-50 disabled:pointer-events-none">
                        <img src="https://cdn.devdojo.com/images/may2023/adam.jpeg"
                            class="object-cover w-8 h-8 border rounded-full border-neutral-200" />
                        <span class="flex flex-col items-start flex-shrink-0 h-full ml-2 leading-none translate-y-px">
                            <span>{{ $user->name }}</span>
                            <span class="text-xs font-light text-neutral-400">{{ $user->role }}</span>
                        </span>
                        <svg class="absolute right-0 w-5 h-5 mr-3" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 15L12 18.75 15.75 15m-7.5-6L12 5.25 15.75 9" />
                        </svg>
                    </button>

                    <div x-show="dropdownOpen" @click.away="dropdownOpen=false"
                        x-transition:enter="ease-out duration-200" x-transition:enter-start="-translate-y-2"
                        x-transition:enter-end="translate-y-0"
                        class="absolute top-0 z-50 w-56 mt-12 -translate-x-1/2 left-1/2" x-cloak>
                        <div
                            class="p-1 mt-1 bg-white border rounded-md shadow-md border-neutral-200/70 text-neutral-700">
                            <div class="px-2 py-1.5 text-sm font-semibold">Můj účet</div>
                            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                            <a href="/profile"
                                class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <path d="M19 21v-2a4 4 0 0 0-4-4H9a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span>Profil</span>
                                <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘P</span>
                            </a>
                            <a href="/settings"
                                class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <path
                                        d="M12.22 2h-.44a2 2 0 0 0-2 2v.18a2 2 0 0 1-1 1.73l-.43.25a2 2 0 0 1-2 0l-.15-.08a2 2 0 0 0-2.73.73l-.22.38a2 2 0 0 0 .73 2.73l.15.1a2 2 0 0 1 1 1.72v.51a2 2 0 0 1-1 1.74l-.15.09a2 2 0 0 0-.73 2.73l.22.38a2 2 0 0 0 2.73.73l.15-.08a2 2 0 0 1 2 0l.43.25a2 2 0 0 1 1 1.73V20a2 2 0 0 0 2 2h.44a2 2 0 0 0 2-2v-.18a2 2 0 0 1 1-1.73l.43-.25a2 2 0 0 1 2 0l.15.08a2 2 0 0 0 2.73-.73l.22-.39a2 2 0 0 0-.73-2.73l-.15-.08a2 2 0 0 1-1-1.74v-.5a2 2 0 0 1 1-1.74l.15-.09a2 2 0 0 0 .73-2.73l-.22-.38a2 2 0 0 0-2.73-.73l-.15.08a2 2 0 0 1-2 0l-.43-.25a2 2 0 0 1-1-1.73V4a2 2 0 0 0-2-2z">
                                    </path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg>
                                <span>Nastavení</span>
                                <span class="ml-auto text-xs tracking-widest opacity-60">⌘S</span>
                            </a>
                            <div class="h-px my-1 -mx-1 bg-neutral-200"></div>
                            <a href="/logout"
                                class="relative flex cursor-default select-none hover:bg-neutral-100 items-center rounded px-2 py-1.5 text-sm outline-none transition-colors focus:bg-accent focus:text-accent-foreground data-[disabled]:pointer-events-none data-[disabled]:opacity-50">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path>
                                    <polyline points="16 17 21 12 16 7"></polyline>
                                    <line x1="21" x2="9" y1="12" y2="12"></line>
                                </svg>
                                <span>Odhlášení</span>
                                <span class="ml-auto text-xs tracking-widest opacity-60">⇧⌘Q</span>
                            </a>
                        </div>
                    </div>
                </div>

            </div>

        </header>

        <!-- Pravý panel (hlavní obsah) -->



        {{ $slot }}


</div>
@fluxScripts
</body>

</html>
