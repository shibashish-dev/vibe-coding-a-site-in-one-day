<div class="bg-white shadow-lg border-l-4 border-red-600 h-80 flex flex-col">
    <!-- Sticky Header -->
    <h2 class="text-xl font-semibold text-red-600 p-4 sticky top-0 bg-white z-10 border-b"><i class="fa-solid fa-arrows-rotate"></i> Circulars</h2>

    <!-- Scrollable Content -->
    <div class="overflow-y-auto scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-200 flex-1 p-4">
        <ul class="space-y-2 text-blue-700">
            @foreach ($circularLinks as $info => $link)
                <li><a href="{{ $link }}" target="_blank" class="hover:underline">{{ $info }}</a></li>
            @endforeach
        </ul>
    </div>
</div>
