<div
    class="w-full md:w-[300px] h-auto md:h-[840px] bg-white/30 backdrop-blur-xl shadow-2xl p-4 md:p-5 rounded-2xl border border-white/20 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-500 scrollbar-track-transparent text-xs md:text-sm">
    <!-- Menu Section -->
    <aside class="mb-6">
        <h2 class="text-base md:text-lg font-semibold text-gray-800 border-b border-red-300 pb-2 flex items-center gap-2 cursor-pointer md:cursor-default"
            id="menu-dropdown-toggle">
            <i class="fa-solid fa-bars text-red-500"></i> Menu
            <i class="fa-solid fa-chevron-down text-red-500 ml-auto md:hidden transition-transform duration-300"></i>
        </h2>
        <ul class="mt-4 space-y-2 hidden md:block" id="menu-dropdown">
            @foreach ($menuItems as $item)
                <li
                    class="flex items-center gap-3 p-2 md:p-3 rounded-xl hover:bg-blue-100 transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 cursor-pointer group">
                    <i
                        class="{{ $item['icon'] }} text-blue-600 group-hover:text-blue-700 group-hover:rotate-6 transition-all duration-300 text-sm md:text-base"></i>
                    <a href="{{ $item['href'] }}"
                        class="text-gray-800 font-medium group-hover:text-blue-700 transition-colors duration-300">{{ $item['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Links Section -->
    <aside>
        <h2 class="text-base md:text-lg font-semibold text-gray-800 border-b border-yellow-300 pb-2 flex items-center gap-2 cursor-pointer md:cursor-default"
            id="links-dropdown-toggle">
            <i class="fa-solid fa-arrow-up-right-from-square text-yellow-500"></i> Links
            <i class="fa-solid fa-chevron-down text-yellow-500 ml-auto md:hidden transition-transform duration-300"></i>
        </h2>
        <ul class="mt-4 space-y-2 hidden md:block" id="links-dropdown">
            @foreach ($links as $link)
                <li
                    class="flex items-center gap-3 p-2 md:p-3 rounded-xl hover:bg-yellow-100 transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 cursor-pointer group">
                    <i
                        class="{{ $link['icon'] }} text-yellow-500 group-hover:text-yellow-600 group-hover:rotate-6 transition-all duration-300 text-sm md:text-base"></i>
                    <a href="{{ $link['href'] }}" target="_blank"
                        class="text-gray-800 font-medium group-hover:text-yellow-600 transition-colors duration-300">{{ $link['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </aside>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Menu Dropdown Toggle
        const menuToggle = document.getElementById('menu-dropdown-toggle');
        const menuDropdown = document.getElementById('menu-dropdown');
        const menuChevron = menuToggle.querySelector('.fa-chevron-down');

        menuToggle.addEventListener('click', function () {
            if (window.innerWidth < 768) { // Only toggle on mobile
                menuDropdown.classList.toggle('hidden');
                menuChevron.classList.toggle('rotate-180');
            }
        });

        // Links Dropdown Toggle
        const linksToggle = document.getElementById('links-dropdown-toggle');
        const linksDropdown = document.getElementById('links-dropdown');
        const linksChevron = linksToggle.querySelector('.fa-chevron-down');

        linksToggle.addEventListener('click', function () {
            if (window.innerWidth < 768) { // Only toggle on mobile
                linksDropdown.classList.toggle('hidden');
                linksChevron.classList.toggle('rotate-180');
            }
        });

        // Ensure dropdowns are closed on mobile by default
        if (window.innerWidth < 768) {
            menuDropdown.classList.add('hidden');
            linksDropdown.classList.add('hidden');
        }
    });
</script>
