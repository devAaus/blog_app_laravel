<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">

    <!-- Style -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <x-head.tinymce-config />
</head>

<body class="bg-black text-white max-w-7xl mx-auto font-hanken-grotesk pb-20">
    <div class=" px-2 md:px-10">
        <x-navbar />

        <main class="mt-10">
            {{ $slot }}
        </main>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/flowbite@3.1.2/dist/flowbite.min.js"></script>

</html>
