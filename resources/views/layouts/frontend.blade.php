<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heavy Water Board</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>

    {{-- @vite('resources/css/app.css') --}}
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow">
        <!-- Top Blue Bar -->
        <div class="w-full mx-auto flex flex-wrap items-center px-4 py-4">
            <!-- Left Section: HWB Logo & Text -->
            <div class="flex items-center space-x-6 flex-1">
                <div class="flex-shrink-0 relative group">
                    <img src="{{ asset('logo.png') }}" alt="HWB Logo"
                        class="w-24 h-24 object-contain transition-transform duration-300 group-hover:scale-105">
                    <div
                        class="absolute inset-0 rounded-full opacity-0 group-hover:opacity-20 bg-blue-400 blur-md transition-opacity duration-500 -z-10">
                    </div>
                </div>
                <div class="flex flex-col justify-center">
                    <h1
                        class="text-xl font-bold tracking-wide mb-1 bg-gradient-to-r from-blue-900 to-blue-700 bg-clip-text text-transparent">
                        Government of India</h1>
                    <h2 class="text-lg text-blue-600 font-medium mb-1.5">Department of Atomic Energy</h2>
                    <h3 class="text-xl font-bold text-blue-900 leading-tight">Heavy Water Board Facilities, Talcher</h3>
                </div>
            </div>

            <!-- Centered Emblem -->
            <div class="flex-1 flex justify-center">
                <img src="{{ asset('emblm.png') }}" alt="Emblem" class="h-24">
            </div>

            <!-- Right: Search Bar -->
            <div class="flex-1 flex flex-col items-end space-y-3">
                <!-- Text Size Controls -->
                <div class="flex items-center space-x-4 mb-2">
                    <span class="text-sm font-semibold text-gray-700">Text Size:</span>
                    <div class="flex space-x-2">
                        <button onclick="setFontSize('normal')"
                            class="px-3 py-1 bg-gradient-to-b from-blue-100 to-blue-200 text-blue-800 hover:from-blue-200 hover:to-blue-300 transition-all duration-200 text-sm font-medium border border-blue-300 rounded-md shadow-sm hover:shadow">A</button>
                        <button onclick="setFontSize('increase')"
                            class="px-3 py-1 bg-gradient-to-b from-blue-100 to-blue-200 text-blue-800 hover:from-blue-200 hover:to-blue-300 transition-all duration-200 text-sm font-medium border border-blue-300 rounded-md shadow-sm hover:shadow">A<sup>+</sup></button>
                        <button onclick="setFontSize('decrease')"
                            class="px-3 py-1 bg-gradient-to-b from-blue-100 to-blue-200 text-blue-800 hover:from-blue-200 hover:to-blue-300 transition-all duration-200 text-sm font-medium border border-blue-300 rounded-md shadow-sm hover:shadow">A<sup>-</sup></button>
                    </div>
                </div>

                <!-- Search Bar -->
                <div class="relative w-80 group">
                    <input type="text" name="search" placeholder="Search..."
                        class="w-full px-5 py-2.5 border border-blue-200 rounded-full shadow-sm focus:ring-2 focus:ring-blue-500 focus:border-blue-400 focus:outline-none transition-all duration-300 group-hover:shadow-md pl-12 bg-gradient-to-r from-white to-blue-50">
                    <button type="submit"
                        class="absolute left-4 top-1/2 transform -translate-y-1/2 text-blue-600 group-hover:text-blue-800 transition-colors duration-200">
                        <i class="fas fa-search"></i>
                    </button>
                    <div
                        class="absolute inset-0 rounded-full opacity-0 group-hover:opacity-100 bg-gradient-to-r from-transparent via-blue-50 to-transparent blur-lg transition-opacity duration-1000 -z-10">
                    </div>
                </div>
            </div>
        </div>
    </header>

    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white text-center py-4 mt-8">
        <p>Mandate of HWB is managing the projects of the Department of Atomic Energy for the production of Heavy Water
            and Specialty Materials.</p>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <script>
        // Font Size Adjustment
        function setFontSize(size) {
            let root = document.documentElement;
            if (size === 'increase') {
                root.style.fontSize = '18px';
                localStorage.setItem('fontSize', '18px');
            } else if (size === 'decrease') {
                root.style.fontSize = '14px';
                localStorage.setItem('fontSize', '14px');
            } else {
                root.style.fontSize = '16px';
                localStorage.setItem('fontSize', '16px');
            }
        }
    </script>

    @fluxScripts
</body>

</html>
