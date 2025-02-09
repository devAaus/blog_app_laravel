<nav class="flex justify-between items-center border-b border-white/10">
    <div>
        <x-button href="/" as="a" type="none">
            <img src="{{ Vite::asset('resources/images/logo.png') }}" alt="logo" class="object-cover " width="90">
        </x-button>
    </div>

    {{-- <div>
                <x-button
                    as="navlink"
                    href="/"
                    active="{{ request()->is('/') }}"
                    type="none">
                    Home
                </x-button>
            </div> --}}

    @auth
        <div class="space-x-2 font-bold flex items-center">
            <x-button href="/blogs/create" as="a" type="link">
                Create a blog
            </x-button>

            <x-button href="/users/dashboard" as="a" type="link">
                Dashboard
            </x-button>

            <form method="POST" action="/logout">
                @csrf
                @method('DELETE')

                <x-button type="destructive">
                    Log Out
                </x-button>
            </form>
        </div>
    @endauth

    @guest
        <div class="space-x-2 font-bold">
            <x-button href="/register" as="a" type="link">
                Sign Up
            </x-button>
            <x-button type="ghost" as="a" href="/login">
                Login
            </x-button>
        </div>
    @endguest
</nav>
