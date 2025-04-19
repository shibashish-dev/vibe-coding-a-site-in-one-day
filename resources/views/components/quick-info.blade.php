<div class="bg-white shadow-lg border-r-4 border-green-600 h-64 md:h-80 flex flex-col rounded-b-lg rounded-tr-lg">
    <!-- Sticky Header -->
    <h2
        class="text-lg md:text-xl font-semibold text-green-600 p-3 md:p-4 sticky top-0 bg-white z-10 border-b shadow-sm flex items-center gap-2 rounded-tr-lg">
        <i class="fa-solid fa-circle-info"></i> Quick Info
    </h2>

    <!-- Scrollable Content -->
    <div
        class="no-scrollbar overflow-y-auto scrollbar scrollbar-w-2 scrollbar-thumb-gray-500 scrollbar-track-gray-200 flex-1 p-3 md:p-4">
        @if($infoLinks->isEmpty())
            <div class="p-2 rounded-md transition hover:bg-green-100 flex justify-center items-center">
                <span class="text-gray-500 text-sm md:text-base">No information available.</span>
            </div>
        @else
            <ul class="space-y-2 md:space-y-3">
                @foreach ($infoLinks as $info => $link)
                    <li class="p-2 rounded-md transition hover:bg-green-100">
                        <a href="{{ $link }}" target="_blank"
                            class="text-blue-700 font-medium hover:text-green-600 flex items-center gap-2 text-sm md:text-base">
                            <i class="fa-solid fa-link text-green-500"></i> {{ $info }}
                        </a>
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</div>
