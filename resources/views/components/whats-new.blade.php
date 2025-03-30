<aside class="relative bg-cover bg-center shadow-lg border-l-4 border-blue-600 p-4 h-[830px] flex flex-col"
    style="background-image: url({{ asset('whats_new_bg.png') }});">

    <!-- Sticky Header -->
    <h2 class="text-xl font-semibold text-white flex items-center sticky top-0 bg-blue-800 z-10 p-4">
        <i class="fa-solid fa-newspaper mr-2"></i> What's New
    </h2>

    <!-- Scrollable Content -->
    <div  class="mt-3 space-y-4 overflow-y-auto flex-1 pr-2 scrollbar-thin scrollbar-thumb-gray-500 scrollbar-track-transparent">
        @foreach ($news as $index => $item)
            <div class="flex items-start space-x-4">
                <!-- Date Circle -->
                <div class="flex flex-col items-center justify-center w-20 h-20 border-2 rounded-full flex-shrink-0
                    {{ $index % 2 !== 0 ? 'bg-yellow-700 text-white border-yellow-700' : 'border-white text-white' }}">
                    <span class="text-lg font-bold leading-tight">{{ explode(' ', $item['date'])[0] }}</span>
                    <span class="text-xs leading-tight">{{ explode(' ', $item['date'])[1] }}</span>
                    <span class="text-xs leading-tight">{{ explode(' ', $item['date'])[2] }}</span>
                </div>

                <!-- News Content -->
                <div class="text-white flex-1">
                    <p class="font-semibold">{{ $item['title'] }}</p>
                    <p class="text-sm text-gray-300">: {{ $item['gallery'] ?? '' }}</p>
                </div>
            </div>
        @endforeach
    </div>
</aside>

