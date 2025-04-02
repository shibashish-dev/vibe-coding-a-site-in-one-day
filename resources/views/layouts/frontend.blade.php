{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heavy Water Board</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <!-- Main Header Content -->

    <header class="bg-white shadow">
        <!-- Top Blue Bar -->
        <div class="bg-blue-700 text-white text-sm py-2 px-6 flex justify-between items-center">
            <!-- Left: Text Size Controls -->
            <div class="flex items-center space-x-2">
                <span>Text Size</span>
                <button onclick="fontNormal()"
                    class="px-2 py-1 bg-white text-blue-700 rounded hover:bg-gray-200">A</button>
                <button onclick="fontIncrease()"
                    class="px-2 py-1 bg-white text-blue-700 rounded hover:bg-gray-200">A<sup>+</sup></button>
                <button onclick="fontDecrease()"
                    class="px-2 py-1 bg-white text-blue-700 rounded hover:bg-gray-200">A<sup>-</sup></button>
            </div>


            <!-- Right: Theme & Language -->
            <div class="flex items-center space-x-2">
                <a href="#main-content" class="hover:underline">Skip to main content</a>
                <div class="flex space-x-1">
                    <a href="/?theme=default" class="w-5 h-5 bg-blue-900 rounded hover:opacity-80"></a>
                    <a href="/?theme=orange" class="w-5 h-5 bg-orange-500 rounded hover:opacity-80"></a>
                    <a href="/?theme=green" class="w-5 h-5 bg-green-500 rounded hover:opacity-80"></a>
                </div>
                <a href="/hi" class="hover:underline">हिन्दी</a>
            </div>
        </div>

        <div class="w-full mx-auto flex flex-wrap items-center px-4 py-4">

            <!-- Left Section: HWB Logo & Text -->
            <div class="flex items-center space-x-4 flex-1">
                <img src="{{ asset('logo.png') }}" alt="HWB Logo" class="w-16 max-h-16">
                <div>
                    <h1 class="text-lg font-bold text-black">Government of India</h1>
                    <h2 class="text-md text-blue-500">Department of Atomic Energy</h2>
                    <h3 class="text-lg font-bold text-blue-800">Heavy Water Board Facilities, Talcher</h3>

                </div>
            </div>


            <!-- Centered Emblem -->
            <div class="flex-1 flex justify-center">
                <img src="{{ asset('emblm.png') }}" alt="Emblem" class="h-24">
            </div>



            <!-- Centered Text -->
            <div class="flex-1 flex flex-col items-center text-center">
                <div class="relative">

                    <input type="text" name="search" placeholder="Search..."
                        class="px-4 py-2 w-48 border rounded-full shadow-sm focus:ring focus:ring-blue-200 focus:outline-none">
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500">
                        🔍
                    </button>
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
    <!-- Swiper CSS -->

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @fluxScripts
</body>

</html> --}}
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
    @vite('resources/css/app.css')

    <style>
        :root {
            --main-bg: white;
        }

        body {
            background-color: var(--main-bg);
        }
    </style>
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <header class="bg-white shadow">
        <!-- Top Blue Bar -->
        <div class="bg-blue-700 text-white text-sm py-2 px-6 flex justify-between items-center">
            <!-- Left: Text Size Controls -->
            <div class="flex items-center space-x-2">
                <span>Text Size</span>
                <button onclick="setFontSize('normal')"
                    class="px-2 py-1 bg-white text-blue-700 rounded hover:bg-gray-200">A</button>
                <button onclick="setFontSize('increase')"
                    class="px-2 py-1 bg-white text-blue-700 rounded hover:bg-gray-200">A<sup>+</sup></button>
                <button onclick="setFontSize('decrease')"
                    class="px-2 py-1 bg-white text-blue-700 rounded hover:bg-gray-200">A<sup>-</sup></button>
            </div>

            <!-- Right: Theme & Language -->
            <div class="flex items-center space-x-2">
                <a href="#main-content" class="hover:underline">Skip to main content</a>
                <div class="flex space-x-1">
                    <button onclick="changeTheme('white')" class="w-5 h-5 bg-white rounded hover:opacity-80"></button>
                    <button onclick="changeTheme('blue')" class="w-5 h-5 bg-blue-900 rounded hover:opacity-80"></button>
                    <button onclick="changeTheme('orange')"
                        class="w-5 h-5 bg-orange-500 rounded hover:opacity-80"></button>
                    <button onclick="changeTheme('green')"
                        class="w-5 h-5 bg-green-500 rounded hover:opacity-80"></button>
                </div>
                <a href="/hi" class="hover:underline">हिन्दी</a>
            </div>
        </div>

        <div class="w-full mx-auto flex flex-wrap items-center px-4 py-4">
            <!-- Left Section: HWB Logo & Text -->
            <div class="flex items-center space-x-4 flex-1">
                <img src="{{ asset('logo.png') }}" alt="HWB Logo" class="w-16 max-h-16">
                <div>
                    <h1 class="text-lg font-bold text-black">Government of India</h1>
                    <h2 class="text-md text-blue-500">Department of Atomic Energy</h2>
                    <h3 class="text-lg font-bold text-blue-800">Heavy Water Board Facilities, Talcher</h3>
                </div>
            </div>

            <!-- Centered Emblem -->
            <div class="flex-1 flex justify-center">
                <img src="{{ asset('emblm.png') }}" alt="Emblem" class="h-24">
            </div>

            <!-- Right: Search Bar -->
            <div class="flex-1 flex flex-col items-center text-center">
                <div class="relative">
                    <input type="text" name="search" placeholder="Search..."
                        class="px-4 py-2  border rounded-full shadow-sm focus:ring focus:ring-blue-200 focus:outline-none">
                    <button type="submit" class="absolute right-2 top-1/2 transform -translate-y-1/2 text-gray-500">
                        🔍
                    </button>
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

        // Theme Color Switcher
        function changeTheme(color) {
            let root = document.documentElement;
            if (color === 'blue') {
                root.style.setProperty('--main-bg', '#E3F2FD');
                localStorage.setItem('theme', 'blue');
            } else if (color === 'orange') {
                root.style.setProperty('--main-bg', '#FFF3E0');
                localStorage.setItem('theme', 'orange');
            } else if (color === 'green') {
                root.style.setProperty('--main-bg', '#E8F5E9');
                localStorage.setItem('theme', 'green');
            } else if (color === 'white') {
                root.style.setProperty('--main-bg', '#E3F2FD;');
                localStorage.setItem('theme', 'white');
            }
        }

        // Load saved settings on page reload
        document.addEventListener("DOMContentLoaded", () => {
            let savedFontSize = localStorage.getItem('fontSize') || '16px';
            let savedTheme = localStorage.getItem('theme') || 'blue';

            document.documentElement.style.fontSize = savedFontSize;
            changeTheme(savedTheme);
        });
    </script>

    @fluxScripts
</body>

</html>
