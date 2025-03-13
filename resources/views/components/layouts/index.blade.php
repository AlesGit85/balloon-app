<!doctype html>
<html lang="cs">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Evidence letu balonem</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <main
        class="flex justify-center items-center h-screen bg-white bg-[url(./img/bg-ballon.webp)] bg-center bg-no-repeat bg-cover">

        <section class="border border-gray-400 shadow-2xl rounded-xl p-8 bg-gray-200 flex flex-col items-center">
            <img class="h-12" src="{{ asset('img/Group24.avif') }}" alt="Evidence letů">
            <div class="p-2 m-2">
                @if (session('error'))
                <div class="bg-red-600 text-white p-4 rounded-md shadow-md mb-4 text-center">
                    {{ session('error') }}
                </div>
                @endif
                
                @if (session('success'))
                <div class="bg-green-500 text-white p-4 rounded-md shadow-md mb-4 text-center">
                    {{ session('success') }}
                </div>
                @endif
            </div>
                
            {{ $slot }}

        </section>

    </main>



</body>

</html>
