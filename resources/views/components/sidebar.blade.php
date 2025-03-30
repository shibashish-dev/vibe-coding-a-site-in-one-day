<div class="h-[830px] bg-white shadow-lg p-4 border-l-4 border-blue-500">
    <!-- Menu Section -->
    <aside class="p-4">
        <h2 class="text-xl font-semibold text-red-500 border-b p-4">Menu</h2>
        <ul class="mt-3 space-y-2 text-blue-700">
            @php
                $menuItems = [
                    ['name' => 'Zimbra', 'href' => '#zimbra', 'icon' => 'fa-solid fa-envelope'],
                    ['name' => 'e-Office', 'href' => '#e-office', 'icon' => 'fa-solid fa-building'],

                    [
                        'name' => 'Integrated Information System',
                        'href' => '#iis',
                        'icon' => 'fa-solid fa-network-wired',
                    ],
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
                <li class="flex items-center space-x-2">
                    <i class="{{ $item['icon'] }} text-gray-600"></i>
                    <a href="{{ $item['href'] }}" class="hover:underline">{{ $item['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </aside>


    <!-- Links Section -->
    <aside class="p-4">
        <h2 class="text-xl font-semibold text-yellow-500 border-b p-4">Links</h2>
        <ul class="mt-3 space-y-2 text-blue-700">
            @php
                $links = [
                    ['name' => 'Google', 'href' => 'https://www.google.com', 'icon' => 'fa-brands fa-google'],
                    ['name' => 'HWB', 'href' => 'https://www.hwb.gov.in', 'icon' => 'fa-solid fa-atom'],
                    ['name' => 'HWB Intranet', 'href' => '#hwb-intranet', 'icon' => 'fa-solid fa-network-wired'],
                ];
            @endphp

            @foreach ($links as $link)
                <li class="flex items-center space-x-2">
                    <i class="{{ $link['icon'] }} text-gray-600"></i>
                    <a href="{{ $link['href'] }}" target="_blank" class="hover:underline">{{ $link['name'] }}</a>
                </li>
            @endforeach
        </ul>
    </aside>

</div>
