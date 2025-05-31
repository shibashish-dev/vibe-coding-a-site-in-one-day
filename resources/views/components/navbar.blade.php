<flux:navbar class="bg-gray-300 text-black font-extrabold uppercase h-16 relative z-10">
    <div class="max-w-7xl mx-auto flex items-center justify-between px-4 py-2">

        <!-- Mobile Section -->
        <div class="flex items-center space-x-4">
            <!-- Always visible items on mobile -->
            <flux:navbar.item href="{{ route('home') }}"
                class="px-3 py-1 rounded text-base hover:bg-gray-400 transition-colors">
                Home
            </flux:navbar.item>
            <flux:navbar.item href="#"
                class="px-3 md:hidden py-1 rounded text-base hover:bg-gray-400 transition-colors">
                Contact
            </flux:navbar.item>

            <!-- Hamburger Button -->
            <div class="md:hidden">
                <button id="menu-toggle"
                    class="text-black focus:outline-none p-2 rounded hover:bg-gray-400 transition-colors">
                    <i class="fa-solid fa-bars text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Desktop & Mobile Dropdown Menu -->
        <div id="menu"
            class="hidden md:flex flex-col md:flex-row md:items-center md:space-x-6 absolute md:static top-full left-0 w-full md:w-auto bg-gray-300 md:bg-transparent shadow-md md:shadow-none">
            @foreach ($dropdownItems as $category => $items)
                <flux:dropdown class="px-3 rounded relative">
                    <flux:navbar.item icon:trailing="chevron-down"
                        class="text-base md:text-lg uppercase hover:bg-gray-400 transition-colors">
                        {{ $category }}
                    </flux:navbar.item>
                    <flux:navmenu class="bg-white text-black mt-1 shadow-lg absolute left-0 w-48 z-20">
                        @foreach ($items as $item => $href)
                            <flux:navmenu.item href="{{ $href }}" class="hover:bg-gray-100">
                                {{ $item }}
                            </flux:navmenu.item>
                        @endforeach
                    </flux:navmenu>
                </flux:dropdown>
            @endforeach

            <!-- Contact in Desktop -->
            <div class="hidden md:flex items-center">
                <flux:navbar.item href="#" class="px-3 py-1 rounded text-base hover:bg-gray-400 transition-colors">
                    Contact
                </flux:navbar.item>
            </div>
        </div>

    </div>
</flux:navbar>

@push('scripts')

    <!-- Toggle Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const toggle = document.getElementById('menu-toggle');
            const menu = document.getElementById('menu');

            toggle.addEventListener('click', () => {
                menu.classList.toggle('hidden');
            });
        });
    </script>

@endpush
