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