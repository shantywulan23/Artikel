<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Laravel'))</title>

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800 font-sans antialiased">
    <div class="min-h-screen">
        <nav class="bg-white shadow">
            <div class="container mx-auto px-4 py-4">
                <div class="flex justify-between items-center">
                    <a class="text-2xl font-bold text-blue-600 hover:text-blue-500 transition duration-300"
                        href="/">
                        Project Pemograman WEB
                    </a>
                    <div class="hidden md:flex space-x-8">
                        <a class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md"
                            href="/dashboard">Home</a>
                        <a class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md"
                            href="/belajar">Artikel</a>
                        <a class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md"
                            href="{{ route('berita.index') }}">Berita</a>
                        <a class="text-gray-600 hover:text-blue-500 transition duration-200 px-3 py-2 rounded-md"
                            href="{{ route('profile.edit') }}">Profile</a>
                    </div>
                    <button class="md:hidden focus:outline-none" id="navbar-toggle">
                        <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16m-7 6h7" />
                        </svg>
                    </button>
                </div>
            </div>
            <div id="navbar-menu" class="hidden md:hidden">
                <div class="container mx-auto px-4 py-2">
                    <div class="flex flex-col space-y-4">
                        <a class="text-gray-600 hover:text-blue-500 transition duration-200" href="/dashboard">Home</a>
                        <a class="text-gray-600 hover:text-blue-500 transition duration-200" href="/belajar">Artikel</a>
                        <a class="text-gray-600 hover:text-blue-500 transition duration-200"
                            href="{{ route('berita.index') }}">Berita</a>
                        <a class="text-gray-600 hover:text-blue-500 transition duration-200"
                            href="{{ route('profile.edit') }}">Profile</a>
                    </div>
                </div>
            </div>
        </nav>

        @isset($header)
            <header class="bg-white shadow mb-4">
                <div class="container mx-auto text-center py-4">
                    <h1 class="text-3xl font-bold">{{ $header }}</h1>
                </div>
            </header>
        @endisset

        <main class="container mx-auto mt-4">
            @yield('content')
        </main>
    </div>

    <script>
        document.getElementById('navbar-toggle').addEventListener('click', function() {
            const menu = document.getElementById('navbar-menu');
            menu.classList.toggle('hidden');
        });
    </script>
</body>

</html>
