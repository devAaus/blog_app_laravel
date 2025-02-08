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
        <nav class="flex justify-between items-center border-b border-white/10">
            <div>
                <x-nav-link href="/" as="a">
                    <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="object-cover " width="90">
                </x-nav-link>
            </div>

            <div class="space-x-2 font-bold">
                <x-nav-link href="/" :active="request()->is('/')" as="navlink">
                    Home
                </x-nav-link>
                <x-nav-link href="/blogs" :active="request()->is('/blogs')" as="navlink">
                    Blogs
                </x-nav-link>
            </div>

            @auth
                <div class="space-x-2 font-bold flex items-center">
                    <x-nav-link href="/jobs/create">
                        Create a blog
                    </x-nav-link>

                    <form method="POST" action="/logout">
                        @csrf
                        @method('DELETE')

                        <x-forms.button type="destructive">Log Out</x-forms.button>
                    </form>
                </div>
            @endauth

            @guest
                <div class="space-x-2 font-bold">
                    <x-nav-link href="/register">
                        Sign Up
                    </x-nav-link>
                    <x-nav-link href="/login">
                        Login
                    </x-nav-link>
                </div>
            @endguest
        </nav>

        <main class="mt-10 max-w-5xl mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
