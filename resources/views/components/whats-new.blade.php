{{-- <aside class="relative bg-cover bg-center shadow-lg p-4 h-[830px] flex flex-col rounded-lg"
    style="background-image: url({{ asset('whats_new_bg.png') }});">

    <!-- Sticky Header -->
    <h2
        class="text-xl font-semibold text-white flex items-center sticky top-0 bg-blue-800 z-10 p-4 shadow-md rounded-t-lg">
        <i class="fa-solid fa-newspaper mr-2"></i> What's New
    </h2>

    <!-- Scrollable Content -->
    <div
        class="mt-5 space-y-4 overflow-y-auto flex-1 pr-2 scrollbar scrollbar-w-2 scrollbar-thumb-gray-400 scrollbar-track-transparent">
        @foreach ($news as $index => $item)
            <div class="flex items-center space-x-4 p-3 rounded-full bg-white/20 shadow-md transition hover:bg-white/30">
                <!-- Date Circle -->
                <div
                    class="flex flex-col items-center justify-center w-20 h-20 border-2 rounded-full flex-shrink-0
                    {{ $index % 2 !== 0 ? 'bg-yellow-600 text-white border-yellow-600' : 'border-white text-white' }}">
                    <span class="text-lg font-bold leading-tight">{{ explode(' ', $item['date'])[0] }}</span>
                    <span class="text-xs font-medium">{{ explode(' ', $item['date'])[1] }}</span>
                    <span class="text-xs">{{ explode(' ', $item['date'])[2] }}</span>
                </div>

                <!-- News Content -->
                <div class="text-white flex-1">
                    <p class="font-semibold text-lg">{{ $item['title'] }}</p>
                    <p class="text-sm text-gray-300 italic">{{ $item['gallery'] ?? '' }}</p>
                </div>
            </div>
        @endforeach
    </div>
</aside> --}}

<aside class="relative bg-white drop-shadow-2xl p-4 h-[830px] flex flex-col rounded-lg">

    <!-- Sticky Header -->
    <h2 class="text-xl font-semibold text-black flex items-center sticky top-0 bg-gray-200 z-10 p-4 shadow-md rounded-t-lg">
        <i class="fa-solid fa-newspaper mr-2"></i> What's New
    </h2>

    <!-- Scrollable Content -->
    <div class="mt-5 space-y-4 overflow-y-auto flex-1 pr-2 scrollbar scrollbar-w-2 scrollbar-thumb-gray-400 scrollbar-track-transparent">
        @foreach ($news as $index => $item)
            <div class="flex items-center space-x-4 px-4 py-3 rounded-full border border-gray-300 bg-gray-100 shadow-md transition hover:bg-gray-200">

                <!-- Date Capsule -->
                <div class="flex flex-col items-center justify-center w-20 h-20 border-2 rounded-full flex-shrink-0
                    {{ $index % 2 !== 0 ? 'bg-yellow-500 text-black border-black' : 'bg-blue-600 text-white border-black' }}">
                    <span class="text-lg font-bold leading-tight">{{ explode(' ', $item['date'])[0] }}</span>
                    <span class="text-xs font-medium uppercase">{{ explode(' ', $item['date'])[1] }}</span>
                    <span class="text-xs">{{ explode(' ', $item['date'])[2] }}</span>
                </div>

                <!-- News Content Capsule -->
                <div class="flex-1  px-4 py-2 ">
                    <p class="font-semibold text-black">{{ $item['title'] }}</p>
                    <p class="text-sm text-gray-600 italic">{{ $item['gallery'] ?? '' }}</p>
                </div>
            </div>
        @endforeach
    </div>
</aside>
