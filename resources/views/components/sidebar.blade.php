<div class="h-[830px] bg-white shadow-lg p-6 rounded-lg overflow-y-auto scrollbar-thin scrollbar-thumb-gray-800 scrollbar-track-transparent">
    <!-- Menu Section -->
    <aside class="mb-6">
        <h2 class="text-2xl font-semibold text-red-600 border-b-2 border-red-300 pb-2 flex items-center gap-2">
            <i class="fa-solid fa-bars"></i> Menu
        </h2>
        <ul class="mt-4 space-y-3">
            @php
                $menuItems = [
                    ['name' => 'Zimbra', 'href' => '#zimbra', 'icon' => 'fa-solid fa-envelope'],
                    ['name' => 'e-Office', 'href' => '#e-office', 'icon' => 'fa-solid fa-building'],
                    ['name' => 'Integrated Information System', 'href' => '#iis', 'icon' => 'fa-solid fa-network-wired'],
                    ['name' => 'Attendance', 'href' => '#attendance', 'icon' => 'fa-solid fa-user-check'],
                    ['name' => 'Procurement', 'href' => '#procurement', 'icon' => 'fa-solid fa-shopping-cart'],
                    ['name' => 'Forms & Formats', 'href' => '#forms-formats', 'icon' => 'fa-solid fa-file-contract'],
                    ['name' => 'VMS', 'href' => '#vms', 'icon' => 'fa-solid fa-shield-alt'],
                    ['name' => 'HIMS', 'href' => '#hims', 'icon' => 'fa-solid fa-hospital'],
                    ['name' => 'Photo Gallery', 'href' => '#photo-gallery', 'icon' => 'fa-solid fa-images'],
                    ['name' => 'Canteen Info', 'href' => '#canteen-info', 'icon' => 'fa-solid fa-utensils'],
                    ['name' => 'Vehicle', 'href' => '#vehicle', 'icon' => 'fa-solid fa-car'],
                ];
            @endphp

            @foreach ($menuItems as $item)
                <li class="flex items-center space-x-3 p-3 rounded-lg hover:bg-blue-100 transition">
                    <i class="{{ $item['icon'] }} text-blue-600 text-lg"></i>
                    <a href="{{ $item['href'] }}" class="text-gray-700 font-medium hover:text-blue-600">{{ $item['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </aside>

    <!-- Links Section -->
    <aside>
        <h2 class="text-2xl font-semibold text-yellow-600 border-b-2 border-yellow-300 pb-2 flex items-center gap-2">
            <i class="fa-solid fa-arrow-up-right-from-square"></i> Links
        </h2>
        <ul class="mt-4 space-y-3">
            @php
                $links = [
                    ['name' => 'Google', 'href' => 'https://www.google.com', 'icon' => 'fa-brands fa-google'],
                    ['name' => 'HWB', 'href' => 'https://www.hwb.gov.in', 'icon' => 'fa-solid fa-atom'],
                    ['name' => 'HWB Intranet', 'href' => '#hwb-intranet', 'icon' => 'fa-solid fa-network-wired'],
                ];
            @endphp

            @foreach ($links as $link)
                <li class="flex items-center space-x-3 p-3 rounded-lg hover:bg-yellow-100 transition">
                    <i class="{{ $link['icon'] }} text-yellow-600 text-lg"></i>
                    <a href="{{ $link['href'] }}" target="_blank" class="text-gray-700 font-medium hover:text-yellow-600">{{ $link['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </aside>
</div>
