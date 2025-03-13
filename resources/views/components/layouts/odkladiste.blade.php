<!doctype html>
<html lang="cs">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Administrace - Evidence letu balonem</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
<!-- Toto je hlavní rozdělení obrazovky --> 
<div class="flex h-screen">

    <!-- Levý panel (boční lišta) -->
    <aside class="fixed top-0 left-0 h-screen w-[20%] bg-gray-50 p-4 border-r overflow-y-auto">

        <!-- Hlavička s logem -->
        <div class="flex items-center gap-4 mb-8">
            <a href="#" class="flex">
            <img class="h-12" src="{{ asset('img/Group24.avif') }}" alt="Evidence letů">
            <p class="p-2 font-bold text-lg">Evidence letů</p>
             </a>
        </div>

        <!-- Navigace -->
 <nav class="flex flex-col gap-2">
        <h3 class="text-sm uppercase font-bold p-4">Navigace</h3>
            
        <!-- Sekce: Lety -->
            <div class="pl-4">
                <h6 class="text-sm text-gray-600">.: Lety :.</h6>
        </div>

        <div class="flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl">
            <a href="./admin.html" class="flex pl-2 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
            Přehled</a>
        </div>

        <div class="flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl">
            <a href="#" class="flex pl-2 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-clipboard-plus"><rect width="8" height="4" x="8" y="2" rx="1" ry="1"/><path d="M16 4h2a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h2"/><path d="M9 14h6"/><path d="M12 17v-6"/></svg>
            Přidat let</a>
        </div>

        <div class="flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl">
            <a href="#" class="flex pl-2 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-user-round-plus"><path d="M2 21a8 8 0 0 1 13.292-6"/><circle cx="10" cy="8" r="5"/><path d="M19 16v6"/><path d="M22 19h-6"/></svg>
            Přiřadit pilota</a>
        </div>

        <div class="p-2"></div>
            <!-- Tady začíná navigace týkající se pilotů -->

        <div class="pl-4"><h6 class="text-sm text-gray-600">.: Pilot :.</h6></div>

        <div class="flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl">
            <a href="#" class="flex pl-2 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-layout-dashboard"><rect width="7" height="9" x="3" y="3" rx="1"/><rect width="7" height="5" x="14" y="3" rx="1"/><rect width="7" height="9" x="14" y="12" rx="1"/><rect width="7" height="5" x="3" y="16" rx="1"/></svg>
            Přehled letů</a>
        </div>

        <div class="flex items-center p-2 hover:bg-red-600 hover:text-white active:bg-red-400 active:text-white active:font-bold rounded-xl">
            <a href="#" class="flex pl-2 gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-notebook-pen"><path d="M13.4 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2v-7.4"/><path d="M2 6h4"/><path d="M2 10h4"/><path d="M2 14h4"/><path d="M2 18h4"/><path d="M21.378 5.626a1 1 0 1 0-3.004-3.004l-5.01 5.012a2 2 0 0 0-.506.854l-.837 2.87a.5.5 0 0 0 .62.62l2.87-.837a2 2 0 0 0 .854-.506z"/></svg>
            Přidat záznamy k letu</a>
        </div>

    </nav>
    </aside>

    <!-- Pravý panel (hlavička) -->
    <main class="ml-[20%] flex-1 bg-white p-6">
        <header class="flex justify-between p-4 bg-white border-b">
            <h1 class="font-medium text-2xl">Přehled</h1>

    <div class="flex">
    <div class="flex bg-zinc-100 items-center border rounded-l-full pl-2">
    <svg class="text-zinc-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
    <input placeholder=" Vyhledávání..." type="search" class="bg-zinc-100 focus:outline-hidden"></div>
    <button type="submit" class="bg-red-600 items-center p-2 rounded-r-full">
    <svg class="text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-search"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
    </button>
    </div>

    <div class="flex items-center gap-2 px-2">
        <div>   
            <button id="otevriNotifikace" class="px-4 py-2rounded-lg">
            <svg class="text-gray-400 hover:border-b hover:border-red-500 hover:pb-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-bell"><path d="M10.268 21a2 2 0 0 0 3.464 0"/><path d="M3.262 15.326A1 1 0 0 0 4 17h16a1 1 0 0 0 .74-1.673C19.41 13.956 18 12.499 18 8A6 6 0 0 0 6 8c0 4.499-1.411 5.956-2.738 7.326"/></svg>
        </button>
        </div>

    <!-- Upozornění -->
    <div id="notifikace" class="fixed inset-0 flex items-center justify-center bg-gray-900 bg-opacity-50 hidden z-50">
        <div class="bg-white p-6 rounded-lg shadow-lg w-96 text-center">
            <h2 class="text-xl font-bold mb-4">Upozornění</h2>
            <p class="text-gray-400">V tuto chvíli nemáte žádná nová upozornění.</p>
            <button id="zavriNotifikace" class="m-4 px-4 py-2 bg-red-600 text-white text-sm rounded-full">Zavřít</button>
        </div>
    </div>

    <!-- Avatar -->
    <div class="flex items-center gap-x-6">
        <img class="object-cover w-8 h-8 rounded-full" src="https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&h=764&q=100" alt="">
    </div>
    <div>
        <p class="text-gray-600 font-semibold">John Doe</p>
        <p class="text-gray-400 text-sm font-thin">Administrator</p>
    </div>
    </div>

        </header>

    <!-- Pravý panel (hlavní obsah) -->

        <!-- Pravý panel (filtrace) -->

        <div class="p-2 items-center justify-center border-b bg-white sticky top-0">
            <div class="flex items-center">
                <svg class=mr-2 xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="lucide lucide-arrow-down-up"><path d="m3 16 4 4 4-4"/><path d="M7 20V4"/><path d="m21 8-4-4-4 4"/><path d="M17 4v16"/></svg>
            <p class="text-sm text-gray-500 mr-2">Seřadit dle</p>
            <p class="text-sm font-semibold">čísla objednávky:</p>
            <form action="">
                <select class="text-sm">
                    <option value="#">nevybráno</option>
                    <option value="#">vzestupně</option>
                    <option value="#">sestupně</option>
                </select>
            </form>
            <p class="text-sm font-semibold ml-4">termínu letu:</p>
            <form action="">
                <select class="text-sm">
                    <option value="#">nevybráno</option>
                    <option value="#">vzestupně</option>
                    <option value="#">sestupně</option>
                </select>
            </form>
            </div>
        </div>

        <!-- Pravý panel (dlaždice) -->

        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 p-4">

            <div class="p-4 border rounded-xl shadow-lg hover:bg-red-50 items-center">
                <div class="flex justify-between gap-2 items-center">
                <p class=" font-bold">Číslo objednávky: 986</p>
                <p class="text-gray-500 text-sm">Termín: 08.04.2025</p>
                </div>
                <div class="flex justify-between gap-2 items-center">
                    <p class="text-gray-800">Odkud:</p><p class="text-gray-500 text-sm">Hradec Králové</p>
                    <p class="text-gray-800">Kam:</p><p class="text-gray-500 text-sm">Hradec Králové</p>
                </div>
                <p>Pilot: <a href="#" class="text-red-500">Jane Doe</a></p>
            <div class="text-center pt-2">
                <button type="submit" class="btn bg-red-600 hover:bg-gray-500 text-white text-sm py-2 px-4 rounded-full">Detail</button>
            </div>
            </div>

            <div class="p-4 border rounded-xl shadow-lg hover:bg-red-50 items-center">
                <div class="flex justify-between gap-2 w-full items-center">
                <p class=" font-bold">Číslo objednávky: 357</p>
                <p class="text-gray-500 text-sm">Termín: 11.04.2025</p>
                </div>
                <div class="flex justify-between gap-2 w-full items-center">
                    <p class="text-gray-800">Odkud:</p><p class="text-gray-500 text-sm">Rychnov n. Kněžnou</p>
                    <p class="text-gray-800">Kam:</p><p class="text-gray-500 text-sm">Rychnov n. Kněžnou</p>
                </div>
                <p>Pilot: <a href="#" class="text-red-500">William Doe</a></p>
            <div class="text-center pt-2">
                <button type="submit" class="btn bg-red-600 hover:bg-gray-500 text-white text-sm py-2 px-4 rounded-full">Detail</button>
            </div>
            </div>

            <div class="p-4 border rounded-xl shadow-lg hover:bg-red-50 items-center">
                <div class="flex justify-between gap-2 items-center">
                <p class=" font-bold">Číslo objednávky: 454</p>
                <p class="text-gray-500 text-sm">Termín: 01.05.2025</p>
                </div>
                <div class="flex justify-between gap-2 w-full items-center">
                    <p class="text-gray-800">Odkud:</p><p class="text-gray-500 text-sm">Pardubice</p>
                    <p class="text-gray-800">Kam:</p><p class="text-gray-500 text-sm">Pardubice</p>
                </div>
                <p>Pilot: <a href="#" class="text-red-500">Jane Doe</a></p>
            <div class="text-center pt-2">
                <button type="submit" class="btn bg-red-600 hover:bg-gray-500 text-white text-sm py-2 px-4 rounded-full">Detail</button>
            </div>
            </div>

            <div class="p-4 border rounded-xl shadow-lg hover:bg-red-50 w-full items-center">
                <div class="flex justify-between gap-2 items-center">
                <p class=" font-bold">Číslo objednávky: 544</p>
                <p class="text-gray-500 text-sm">Termín: 08.04.2025</p>
                </div>
                <div class="flex justify-between gap-2 items-center">
                    <p class="text-gray-800">Odkud:</p><p class="text-gray-500 text-sm">Kunětická hora</p>
                    <p class="text-gray-800">Kam:</p><p class="text-gray-500 text-sm">Kunětická hora</p>
                </div>
                <p>Pilot: <a href="#" class="text-red-900 font-bold">--- nepřiřazeno ---</a></p>
            <div class="text-center pt-2">
                <button type="submit" class=" btn bg-red-600 hover:bg-gray-500 text-white text-sm py-2 px-4 rounded-full">Detail</button>
            </div>
            </div>

            <div class="p-4 border rounded-xl shadow-lg hover:bg-red-50 w-full items-center">
                <div class="flex justify-between gap-2 items-center">
                <p class=" font-bold">Číslo objednávky: 855</p>
                <p class="text-gray-500 text-sm">Termín: 18.07.2025</p>
                </div>
                <div class="flex justify-between gap-2 items-center">
                    <p class="text-gray-800">Odkud:</p><p class="text-gray-500 text-sm">Kunětická hora</p>
                    <p class="text-gray-800">Kam:</p><p class="text-gray-500 text-sm">Kunětická hora</p>
                </div>
                <p>Pilot: <a href="#" class="text-red-900 font-bold">--- nepřiřazeno ---</a></p>
            <div class="text-center pt-2">
                <button type="submit" class=" btn bg-red-600 hover:bg-gray-500 text-white text-sm py-2 px-4 rounded-full">Detail</button>
            </div>
            </div>

            <div class="p-4 border rounded-xl shadow-lg hover:bg-red-50 w-full items-center">
                <div class="flex justify-between gap-2 items-center">
                <p class=" font-bold">Číslo objednávky: 278</p>
                <p class="text-gray-500 text-sm">Termín: 11.05.2025</p>
                </div>
                <div class="flex justify-between gap-2 items-center">
                    <p class="text-gray-800">Odkud:</p><p class="text-gray-500 text-sm">Hradec Králové</p>
                    <p class="text-gray-800">Kam:</p><p class="text-gray-500 text-sm">Hradec Králové</p>
                </div>
                <p>Pilot: <a href="#" class="text-red-900 font-bold">--- nepřiřazeno ---</a></p>
            <div class="text-center pt-2">
                <button type="submit" class=" btn bg-red-600 hover:bg-gray-500 text-white text-sm py-2 px-4 rounded-full">Detail</button>
            </div>
            </div>

            <div class="p-4 border rounded-xl shadow-lg hover:bg-red-50 w-full items-center">
                <div class="flex justify-between gap-2 items-center">
                <p class=" font-bold">Číslo objednávky: 954</p>
                <p class="text-gray-500 text-sm">Termín: 17.07.2025</p>
                </div>
                <div class="flex justify-between gap-2 items-center">
                    <p class="text-gray-800">Odkud:</p><p class="text-gray-500 text-sm">Rychnov n. Kněžnou</p>
                    <p class="text-gray-800">Kam:</p><p class="text-gray-500 text-sm">Rychnov n. Kněžnou</p>
                </div>
                <p>Pilot: <a href="#" class="text-red-900 font-bold">--- nepřiřazeno ---</a></p>
            <div class="text-center pt-2">
                <button type="submit" class=" btn bg-red-600 hover:bg-gray-500 text-white text-sm py-2 px-4 rounded-full">Detail</button>
            </div>
            </div>

    </div>
    </main>
</div>


<script src="script.js"></script>

</body>
</html>











<x-layouts.app title="Záznam o letu" :user="auth()->user()">

    <div class="p-4 border mx-auto mt-10 p-6 bg-white shadow-lg rounded-lg">
        <h2 class="p-2 mb-2 font-semibold text-center text-lg">Záznam o letu horkovzdušným balónem</h2>

        <form action="#" method="POST">
            <div class="p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">1. Základní informace</h3>

                <div class="flex flex-col">
                    <label for="flight_id" class="text-sm font-semibold">Vyber let:</label>
                    <select id="flight_id" name="flight_id" required class="border rounded-xl bg-white p-2"
                        onchange="updateFlightDetails()">
                        <option value="" disabled selected>Vyber let</option>
                        @foreach ($flights as $flight)
                            <option value="{{ $flight->id }}" 
                                data-number="{{ $flight->number }}" 
                                data-date="{{ $flight->date_flights }}" 
                                data-from="{{ $flight->from }}" 
                                data-to="{{ $flight->to }}">
                                Let {{ $flight->number }} - {{ date('d.m.Y', strtotime($flight->date_flights)) }} ({{ $flight->from }} → {{ $flight->to }})
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="number" class="text-sm font-semibold">Číslo letu:</label>
                        <input type="text" id="number" name="number" readonly required
                            class="border rounded-xl bg-white p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="date" class="text-sm font-semibold">Datum letu:</label>
                        <input type="date" id="date" name="date" readonly required
                            class="border rounded-xl bg-white p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="start-time" class="text-sm font-semibold">Čas vzletu:</label>
                        <input type="time" id="start-time" name="start_time" required
                            class="border rounded-xl bg-white p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="end-time" class="text-sm font-semibold">Čas přistání:</label>
                        <input type="time" id="end-time" name="end_time" required
                            class="border rounded-xl bg-white p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="start-location" class="text-sm font-semibold">Místo vzletu:</label>
                        <input type="text" id="start-location" name="start_location" readonly required
                            class="border rounded-xl bg-white p-2">
                    </div>

                    <div class="flex flex-col">
                        <label for="end-location" class="text-sm font-semibold">Místo přistání:</label>
                        <input type="text" id="end-location" name="end_location" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">2. Informace o posádce</h3>

                <div class="grid grid-cols-3 gap-4">
                    <div class="flex flex-col">
                        <label for="pilot-name" class="text-sm font-semibold">Jméno pilota:</label>
                        <input type="text" id="pilot-name" name="pilot_name" value="{{ $pilot->user_name }}" readonly required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="license" class="text-sm font-semibold">Číslo licence:</label>
                        <input type="text" id="license" name="license" value="{{ $pilot->number_licence }}" readonly required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="crew" class="text-sm font-semibold">Pomocníci na startu/přistání
                            (jména):</label>
                        <textarea id="crew" name="crew" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">3. Informace o pasažérech</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="passenger-count" class="text-sm font-semibold">Počet pasažérů:</label>
                        <input type="number" id="passenger-count" name="passenger_count" min="0" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">

                        <label for="passenger-names" class="text-sm font-semibold">Jména pasažérů:</label>
                        <textarea id="passenger-names" name="passenger_names" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">4. Informace o balónu</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="registration" class="text-sm font-semibold">Registrační číslo balónu:</label>
                        <input type="text" id="registration" name="registration" required
                            class="border rounded-xl bg-white p-2">

                        <label for="balloon-model" class="text-sm font-semibold">Model balónu:</label>
                        <input type="text" id="balloon-model" name="balloon_model" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="hours" class="text-sm font-semibold">Počet provozních hodin balónu:</label>
                        <input type="number" id="hours" name="hours" required
                            class="border rounded-xl bg-white p-2">

                        <label for="fuel" class="text-sm font-semibold">Spotřeba plynu (v litrech):</label>
                        <input type="number" id="fuel" name="fuel" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2" class="text-sm font-semibold">5. Meteorologické podmínky
                </h3>

                <div class="grid grid-cols-4 gap-4">
                    <div class="flex flex-col">
                        <label for="temperature" class="text-sm font-semibold">Teplota vzduchu (°C):</label>
                        <input type="number" id="temperature" name="temperature" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="wind" class="text-sm font-semibold">Směr a rychlost větru:</label>
                        <input type="text" id="wind" name="wind" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="visibility" class="text-sm font-semibold">Viditelnost (km):</label>
                        <input type="number" id="visibility" name="visibility" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="weather" class="text-sm font-semibold">Stav oblohy:</label>
                        <select id="weather" name="weather" class="border rounded-xl bg-white p-2">
                            <option value="jasno">Jasno</option>
                            <option value="oblačno">Oblačno</option>
                            <option value="zataženo">Zataženo</option>
                            <option value="mlha">Mlha</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">6. Průběh letu</h3>

                <div class="grid grid-cols-3 gap-4">
                    <div class="flex flex-col">
                        <label for="flight-description" class="text-sm font-semibold">Popis letu:</label>
                        <textarea id="flight-description" name="flight_description" required class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                    <div class="flex flex-col">
                        <label for="max-altitude" class="text-sm font-semibold">Maximální výška (m):</label>
                        <input type="number" id="max-altitude" name="max_altitude" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                    <div class="flex flex-col">
                        <label for="distance" class="text-sm font-semibold">Uražená vzdálenost (km):</label>
                        <input type="number" id="distance" name="distance" required
                            class="border rounded-xl bg-white p-2">
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">7. Přistání</h3>

                <div class="grid grid-cols-2 gap-4">
                    <div class="flex flex-col">
                        <label for="landing" class="text-sm font-semibold">Typ přistání:</label>
                        <select id="landing" name="landing" class="border rounded-xl bg-white p-2">
                            <option value="hladké">Hladké</option>
                            <option value="tvrdé">Tvrdé</option>
                            <option value="nouzové">Nouzové</option>
                        </select>
                    </div>

                    <div class="flex flex-col">
                        <label for="landing-location" class="text-sm font-semibold">Přesnost přistání:</label>
                        <textarea id="landing-location" name="landing_location" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>


            <div class="mt-4 p-4 border rounded-xl bg-white">
                <h3 class="font-semibold text-base p-2">8. Bezpečnostní informace</h3>

                <div class="grid grid-cols-1 gap-4">
                    <div class="flex flex-col">
                        <label for="incident" class="text-sm font-semibold">Incidenty nebo nehody:</label>
                        <textarea id="incident" name="incident" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>

            <div class="mt-4 p-4 border rounded-xl bg-gray-100">
                <h3 class="font-semibold text-base p-2">9. Logistika</h3>
                <div class="grid grid-cols-1 gap-4">
                    <div class="flex flex-col">
                        <label for="return" class="text-sm font-semibold">Způsob návratu balónu:</label>
                        <textarea id="return" name="return" class="border rounded-xl bg-white p-2"></textarea>
                    </div>
                </div>
            </div>
            <x-layouts.button>Odeslat záznam</x-layouts.button>
        </form>

    </div>

</x-layouts.app>