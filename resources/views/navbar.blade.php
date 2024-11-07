<nav class="bg-white shadow">
    <div class="container mx-auto px-4 py-4">
        <div class="flex justify-between items-center">
            <a class="text-2xl font-bold text-blue-600 hover:text-blue-500 transition duration-300" href="/">
                Project PMRG WEB
            </a>
            <div class="hidden md:flex space-x-8">
                <a class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md"
                    href="/">Home</a>
                <a class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md"
                    href="/belajar">Artikel</a>
                <a class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md"
                    href="{{ route('berita.index') }}">Berita</a>

                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
            <button class="md:hidden focus:outline-none" id="navbar-toggle">
                <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                </svg>
            </button>
        </div>
    </div>
    <div id="navbar-menu" class="hidden md:hidden">
        <div class="container mx-auto px-4 py-2">
            <div class="flex flex-col space-y-4">
                <a class="text-gray-600 hover:text-blue-500 transition duration-200" href="/">Home</a>
                <a class="text-gray-600 hover:text-blue-500 transition duration-200" href="/belajar">Artikel</a>
                <a class="text-gray-600 hover:text-blue-500 transition duration-200"
                    href="{{ route('berita.index') }}">Berita</a>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}"
                            class="text-gray-600 hover:text-blue-500 transition duration-200">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-500 transition duration-200">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-gray-600 hover:text-blue-500 transition duration-200">Register</a>
                        @endif
                    @endauth
                @endif
            </div>
        </div>
    </div>
</nav>
