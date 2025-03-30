@php
    $dropdownItems = [
        'Organizations' => [
            'Administration' => '#administration',
            'Accounts' => '#accounts',
            'Stores' => '#stores',
            'Production' => '#production',
            'Mechnical' => '#mechanical',
            'Electrical' => '#electrical',
            'Instrumentation' => '#instrumentation',
            'Civil' => '#civil',
            'Laboratory' => '#laboratory',
            'Safety & Environment' => '#safety',
            'Fire' => '#fire'
        ],
        'Plants' => [
            'TBP' => '#tbp',
            'D2PHA' => '#d2pha',
            'VSPP' => '#vspp',
            'Boran' => '#boran',
            'B11' => '#b11',
            'B10' => '#b10',
            'IETP' => '#ietp',
            'TAPO' => '#tapo',
            'TOPO' => '#topo',
            'CC6' => '#cc6'
        ],
        'Products' => [
            'TBP' => '#product-tbp',
            'D2PHA' => '#product-d2pha',
            'B11' => '#product-b11',
            'B10' => '#product-b10',
            'TAPO' => '#product-tapo',
            'TOPO' => '#product-topo',
            'CC6' => '#product-cc6'
        ]
    ];
@endphp

<flux:navbar class="bg-gray-300 text-black font-extrabold uppercase h-16 ">
    <div class="max-w-7xl mx-auto flex justify-between px-4 py-2">
        <div class="space-x-6 flex">

            <flux:navbar.item href="#" class="px-3 py-1 rounded text-9xl">Home</flux:navbar.item>

            @foreach ($dropdownItems as $category => $items)
                <flux:dropdown class="px-3 rounded">
                    <flux:navbar.item icon:trailing="chevron-down" class="font-extrabold uppercase">
                        {{ $category }}
                    </flux:navbar.item>
                    <flux:navmenu class="bg-white text-black">
                        @foreach ($items as $item => $href)
                            <flux:navmenu.item href="{{ $href }}">{{ $item }}</flux:navmenu.item>
                        @endforeach
                    </flux:navmenu>
                </flux:dropdown>
            @endforeach

            <flux:navbar.item href="#" class="px-3 py-1 rounded">Contact Us</flux:navbar.item>
        </div>
    </div>
</flux:navbar>
