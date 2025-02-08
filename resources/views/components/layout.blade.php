<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Style -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-black text-white max-w-7xl mx-auto font-hanken-grotesk pb-20">
    <div class="px-10">
        <x-navbar />

        <main class="mt-10 max-w-5xl mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
