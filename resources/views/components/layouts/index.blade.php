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
        class="flex justify-center items-center h-screen bg-gray-50 bg-[url(./img/bg-ballon.webp)] bg-center bg-no-repeat bg-cover">

        <section class="border border-gray-400 shadow-2xl rounded-xl p-8 bg-gray-200 flex flex-col items-center">
            <img class="h-12" src="{{ asset('img/Group24.avif') }}" alt="Evidence letů">

            {{ $slot }}

        </section>

    </main>



</body>

</html>
