<div
    class="w-[300px] h-[830px] bg-white/30 backdrop-blur-xl shadow-2xl p-5 rounded-2xl border border-white/20 overflow-y-auto scrollbar-thin scrollbar-thumb-gray-500 scrollbar-track-transparent text-sm">
    <!-- Menu Section -->
    <aside class="mb-8">
        <h2 class="text-lg font-semibold text-gray-800 border-b border-red-300 pb-2 flex items-center gap-2">
            <i class="fa-solid fa-bars text-red-500"></i> Menu
        </h2>
        <ul class="mt-4 space-y-2">

            @foreach ($menuItems as $item)
                <li
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-blue-100 transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 cursor-pointer group">
                    <i
                        class="{{ $item['icon'] }} text-blue-600 group-hover:text-blue-700 group-hover:rotate-6 transition-all duration-300 text-base"></i>
                    <a href="{{ $item['href'] }}"
                        class="text-gray-800 font-medium group-hover:text-blue-700 transition-colors duration-300">{{ $item['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Links Section -->
    <aside>
        <h2 class="text-lg font-semibold text-gray-800 border-b border-yellow-300 pb-2 flex items-center gap-2">
            <i class="fa-solid fa-arrow-up-right-from-square text-yellow-500"></i> Links
        </h2>
        <ul class="mt-4 space-y-2">


            @foreach ($links as $link)
                <li
                    class="flex items-center gap-3 p-3 rounded-xl hover:bg-yellow-100 transform hover:-translate-y-1 hover:scale-[1.02] transition-all duration-300 cursor-pointer group">
                    <i
                        class="{{ $link['icon'] }} text-yellow-500 group-hover:text-yellow-600 group-hover:rotate-6 transition-all duration-300 text-base"></i>
                    <a href="{{ $link['href'] }}" target="_blank"
                        class="text-gray-800 font-medium group-hover:text-yellow-600 transition-colors duration-300">{{ $link['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </aside>
</div>
