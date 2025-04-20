@props(['title' => '', 'subtitle' => '', 'darkMode' => false])

<!DOCTYPE html>
<html lang="en" x-data="{
        darkMode: {{ $darkMode ? 'true' : 'false' }},
        sidebarOpen: false
    }" x-bind:class="{ 'dark': darkMode }" x-init="
        if (localStorage.getItem('theme') === 'dark') darkMode = true;
        $watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'));
    " class="min-h-screen bg-gray-100 dark:bg-zinc-900 text-gray-800 dark:text-white" x-cloak>

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    @vite(['resources/css/app.css'])
    <script defer src="https://unpkg.com/alpinejs"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-gray-100 dark:bg-zinc-900 text-gray-800 dark:text-white transition-colors duration-300 min-h-screen">

    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <aside
            class="fixed inset-y-0 left-0 z-30 w-64 bg-white dark:bg-zinc-800 shadow-md transform transition-transform duration-300 lg:static lg:translate-x-0"
            x-bind:class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'">
            <div class="p-6 border-b dark:border-zinc-700 flex justify-between items-center">
                <h1 class="text-xl font-bold text-gray-700 dark:text-white">Procurement Panel</h1>
                <!-- Close button for small screens -->
                <button class="lg:hidden text-gray-700 dark:text-white" @click="sidebarOpen = false">
                    ✕
                </button>
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('procurement.dashboard') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-zinc-700 text-gray-700 dark:text-white
                    {{ request()->routeIs('procurement.dashboard') ? 'bg-gray-200 dark:bg-zinc-700' : '' }}">
                    Dashboard
                </a>

                @if (auth('procurement')->user()->role === 'procurement_user')
                    <a href="{{ route('procurement.new') }}" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-zinc-700 text-gray-700 dark:text-white
                                {{ request()->routeIs('procurement.new') ? 'bg-gray-200 dark:bg-zinc-700' : '' }}">
                        New Procurement
                    </a>
                @else
                    <a href="{{ route('procurement.sections.index') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-zinc-700 text-gray-700 dark:text-white
                                {{ request()->routeIs('procurement.sections.index') ? 'bg-gray-200 dark:bg-zinc-700' : '' }}">
                        Sections
                    </a>

                    <a href="{{ route('procurement.procurement-types.index') }}"
                        class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-zinc-700 text-gray-700 dark:text-white
                                {{ request()->routeIs('procurement.procurement-types.index') ? 'bg-gray-200 dark:bg-zinc-700' : '' }}">
                        Procurement Types
                    </a>
                @endif
                <hr>
                <button @click="darkMode = !darkMode"
                    class="w-full text-left px-4 py-2 rounded hover:text-white hover:bg-black dark:hover:bg-white text-black dark:text-white dark:hover:text-black">
                    Dark Mode
                </button>
                <form method="POST" action="{{ route('procurement.prologout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 rounded hover:bg-red-100 dark:hover:bg-red-900 text-red-600 dark:text-red-400">
                        Logout
                    </button>
                </form>
            </nav>
        </aside>

        <!-- Overlay when sidebar is open (only mobile) -->
        <div class="fixed inset-0 bg-black bg-opacity-50 z-20 lg:hidden" x-show="sidebarOpen" x-transition.opacity
            @click="sidebarOpen = false">
        </div>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col overflow-y-auto">
            <header class="flex items-center justify-between p-4 border-b dark:border-zinc-700">
                <!-- Sidebar toggle button for small screens -->
                <button
                    class="lg:hidden flex items-center justify-center w-10 h-10 rounded-full bg-gray-200 dark:bg-zinc-700 text-gray-700 dark:text-white hover:bg-gray-300 dark:hover:bg-zinc-600 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-zinc-800"
                    @click="sidebarOpen = true">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="flex items-center gap-4">
                    <div>
                        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $title }}</h2>
                        <p class="text-zinc-600 dark:text-zinc-400">{{ $subtitle }}</p>
                    </div>


                </div>
            </header>

            <main class="p-8 space-y-6">
                {{ $slot }}
            </main>
        </div>
    </div>

</body>

</html>
