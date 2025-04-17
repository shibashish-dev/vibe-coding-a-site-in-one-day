<style>
    /* iPad specific styles (768px-1024px) */
    @media (min-width: 768px) and (max-width: 1024px) {
        .ipad\:flex-row {
            flex-direction: row !important;
        }

        .ipad\:flex-col {
            flex-direction: column !important;
        }

        .ipad\:w-auto {
            width: auto !important;
            padding: 0 0.75rem !important;
        }

        .ipad\:h-10 {
            height: 2.5rem !important;
        }

        .ipad\:space-x-2>*+* {
            margin-left: 0.5rem !important;
        }
    }

    /* Desktop styles (1025px and up) */
    @media (min-width: 1025px) {
        .desktop\:items-center {
            align-items: center !important;
        }

        .desktop\:rounded-full {
            border-radius: 9999px !important;
        }

        .desktop\:w-16 {
            width: 4rem !important;
        }

        .desktop\:h-16 {
            height: 4rem !important;
        }

        .desktop\:px-3 {
            padding-left: 0.75rem !important;
            padding-right: 0.75rem !important;
        }

        .desktop\:flex-col {
            flex-direction: column !important;
        }
    }

    /* Line clamping for titles */
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
</style>


<aside class="relative bg-white drop-shadow-2xl p-4 h-auto md:h-[840px] flex flex-col rounded-lg">
    <!-- Sticky Header -->
    <h2
        class="text-lg md:text-xl font-semibold text-black flex items-center sticky top-0 bg-gray-200 z-10 p-3 md:p-4 shadow-md rounded-t-lg">
        <i class="fa-solid fa-newspaper mr-2"></i> What's New
    </h2>

    <!-- Scrollable Content -->
    <div
        class="mt-4 space-y-3 overflow-y-auto flex-1 pr-2 scrollbar scrollbar-w-2 scrollbar-thumb-gray-400 scrollbar-track-transparent">
        @if ($news->isEmpty())
            <div class="p-2 rounded-md transition hover:bg-gray-100 flex justify-center items-center">
                <span class="text-gray-500 text-sm md:text-base">No Information available.</span>
            </div>
        @endif

        @foreach ($news as $index => $item)
            <div
                class="flex flex-row ipad:flex-col items-start desktop:items-center gap-3 p-3 rounded-xl desktop:rounded-full border border-gray-300 bg-gray-100 shadow-md transition hover:bg-gray-200">
                <!-- Date Container - Different layouts for different screens -->
                <div
                    class="flex flex-col ipad:flex-row desktop:flex-col items-center justify-center ipad:space-x-2 desktop:space-x-0 w-16 h-16 ipad:w-auto ipad:h-10 desktop:w-16 desktop:h-16 rounded-full border-2 flex-shrink-0
                                {{ $index % 2 !== 0 ? 'bg-yellow-500 text-black border-black' : 'bg-blue-600 text-white border-black' }}">
                    <span class="text-sm font-bold">{{ explode(' ', $item['date'])[0] }}</span>
                    <span class="text-xs uppercase">{{ explode(' ', $item['date'])[1] }}</span>
                    <span class="text-xs">{{ explode(' ', $item['date'])[2] }}</span>
                </div>

                <!-- News Content -->
                <div class="flex-1 min-w-0 desktop:px-3">
                    <p class="font-semibold text-black text-sm sm:text-base line-clamp-2">{{ $item['title'] }}</p>
                    <p class="text-xs text-gray-600 italic mt-1">{{ $item['category'] ?? '' }}</p>
                </div>
            </div>
        @endforeach
    </div>
</aside>
