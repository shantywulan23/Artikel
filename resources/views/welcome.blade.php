<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="antialiased bg-gray-100 dark:bg-gray-900 text-gray-700 dark:text-gray-200 font-sans">
    <header class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto p-6 lg:px-8">
            <nav class="flex justify-between items-center">
                <h1 class="text-3xl font-bold">Laravel</h1>
                <div class="hidden md:flex space-x-4">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="text-gray-700 dark:text-gray-200 underline">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}"
                            class="text-white bg-slate-800 hover:bg-slate-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 transition duration-300">Log
                            in</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="text-white bg-slate-800 hover:bg-slate-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 transition duration-300">Register</a>
                        @endif
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden">
                    <button id="menuButton" class="text-white bg-slate-800 p-2 rounded-md">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </nav>

            <!-- Mobile Menu -->
            <div id="mobileMenu" class="md:hidden mt-4 space-y-4 hidden">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-gray-700 dark:text-gray-200 underline block">Dashboard</a>
                @else
                    <a href="{{ route('login') }}"
                        class="text-white bg-slate-800 hover:bg-slate-500 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 transition duration-300 block">Log
                        in</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="text-white bg-slate-800 hover:bg-slate-500 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 transition duration-300 block">Register</a>
                    @endif
                @endauth
            </div>
        </div>
    </header>

    <!-- Carousel Section -->
    <section class="mt-10 mb-6">
        <div class="relative max-w-6xl mx-auto overflow-hidden rounded-lg shadow-lg">
            <div class="carousel flex transition-transform ease-in-out duration-700">
                <div class="carousel-item w-full hidden">
                    <img src="{{ asset('img/banner1.jpg') }}" alt="Slide 1" class="w-full h-96 object-cover">
                </div>
                <div class="carousel-item w-full hidden">
                    <img src="https://via.placeholder.com/1200x400" alt="Slide 2" class="w-full h-96 object-cover">
                </div>
                <div class="carousel-item w-full hidden">
                    <img src="https://via.placeholder.com/1200x400" alt="Slide 3" class="w-full h-96 object-cover">
                </div>
            </div>
            <button id="prev"
                class="absolute top-1/2 left-2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">‹</button>
            <button id="next"
                class="absolute top-1/2 right-2 transform -translate-y-1/2 bg-gray-800 text-white p-2 rounded-full">›</button>
        </div>
    </section>

    <!-- Berita Section -->
    <section class="max-w-6xl mx-auto p-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($berita as $item)
            <div
                class="bg-white shadow-lg rounded-xl overflow-hidden transform hover:shadow-2xl transition-all duration-300">
                <img class="w-full h-48 object-cover" src="{{ asset('storage/' . $item->cover) }}"
                    alt="{{ $item->judul }}">
                <div class="p-4 bg-gray-100">
                    <h5 class="text-xl font-semibold text-gray-800">{{ $item->judul }}</h5>
                    <p class="text-gray-600 mt-2"><strong>Penulis:</strong> {{ $item->penulis }}</p>
                    <div class="flex justify-center mt-4">
                        <a href="{{ route('berita.show', $item->slug) }}"
                            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-md transition-all transform hover:scale-105">Detail</a>
                    </div>
                </div>
            </div>
        @endforeach
    </section>


    <!-- About Section -->
    <section class="max-w-6xl mx-auto p-6 bg-white dark:bg-gray-800 rounded-lg shadow-lg mb-10">
        <h2 class="text-2xl font-bold mb-4">About Laravel</h2>
        <p>Laravel is a web application framework with expressive, elegant syntax. We believe development must be an
            enjoyable and creative experience to be truly fulfilling.</p>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-6">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <p>&copy; 2024 Laravel. All rights reserved.</p>
            <nav>
                <a href="#" class="text-gray-400 hover:text-gray-200">Privacy Policy</a>
                <span class="mx-2">|</span>
                <a href="#" class="text-gray-400 hover:text-gray-200">Terms of Service</a>
            </nav>
        </div>
    </footer>

    <!-- Carousel Script -->
    <script>
        let currentIndex = 0;
        const items = document.querySelectorAll('.carousel-item');
        const totalItems = items.length;

        document.getElementById('next').onclick = function() {
            items[currentIndex].classList.add('hidden');
            currentIndex = (currentIndex + 1) % totalItems;
            items[currentIndex].classList.remove('hidden');
        };

        document.getElementById('prev').onclick = function() {
            items[currentIndex].classList.add('hidden');
            currentIndex = (currentIndex - 1 + totalItems) % totalItems;
            items[currentIndex].classList.remove('hidden');
        };

        items[currentIndex].classList.remove('hidden');

        // Mobile menu toggle
        document.getElementById('menuButton').onclick = function() {
            const mobileMenu = document.getElementById('mobileMenu');
            mobileMenu.classList.toggle('hidden');
        };
    </script>
</body>

</html>
