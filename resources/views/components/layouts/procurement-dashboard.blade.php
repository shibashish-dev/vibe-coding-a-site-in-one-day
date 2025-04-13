@props(['title' => '', 'subtitle' => '', 'darkMode' => false])

<!DOCTYPE html>
<html lang="en" x-data="{ darkMode: {{ $darkMode ? 'true' : 'false' }} }" x-bind:class="{ 'dark': darkMode }" x-init="
        if (localStorage.getItem('theme') === 'dark') darkMode = true;
        $watch('darkMode', val => localStorage.setItem('theme', val ? 'dark' : 'light'));
    " class="min-h-screen bg-gray-100 dark:bg-zinc-900 text-gray-800 dark:text-white" x-cloak>

<head>
    <meta charset="UTF-8">
    <title>{{ $title ?? 'Dashboard' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
</head>

<body class="bg-gray-100 dark:bg-zinc-900 text-gray-800 dark:text-white transition-colors duration-300 min-h-screen">

    <div class="flex">
        <!-- Sidebar -->
        <aside class="w-64 bg-white dark:bg-zinc-800 shadow-md h-screen">
            <div class="p-6 border-b dark:border-zinc-700">
                <h1 class="text-xl font-bold text-gray-700 dark:text-white">Procurement Panel</h1>
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
                    <a href="#" class="block px-4 py-2 rounded hover:bg-gray-200 dark:hover:bg-zinc-700 text-gray-700 dark:text-white
                                    {{ request()->routeIs('procurement.all') ? 'bg-gray-200 dark:bg-zinc-700' : '' }}">
                        All Procurement Data
                    </a>

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

                <form method="POST" action="{{ route('procurement.prologout') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-left px-4 py-2 rounded hover:bg-red-100 dark:hover:bg-red-900 text-red-600 dark:text-red-400">
                        Logout
                    </button>
                </form>
            </nav>
        </aside>


        <!-- Main Content -->
        <main class="flex-1 p-8 space-y-6">
            <div class="flex justify-between items-start">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-800 dark:text-white">{{ $title }}</h2>
                    <p class="text-zinc-600 dark:text-zinc-400">{{ $subtitle }}</p>
                </div>
                <button @click="darkMode = !darkMode"
                    class="bg-zinc-200 dark:bg-zinc-700 text-sm px-4 py-1 rounded hover:shadow text-gray-800 dark:text-white">
                    Dark Mode
                </button>
            </div>
            {{ $slot }}
        </main>
    </div>

</body>

</html>