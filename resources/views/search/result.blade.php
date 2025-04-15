<x-frontend>
    <div class="w-full px-4 py-8">
        <div class="bg-white rounded-lg shadow-md p-6">
            <h2 class="text-2xl md:text-3xl font-bold mb-6 text-blue-800 border-b pb-2">Search Results</h2>

            @if ($results->isEmpty())
                <div class="bg-gray-50 p-4 rounded-lg text-center">
                    <p class="text-gray-600">No results found for "<span
                            class="font-medium">{{ request('search') }}</span>".</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    @foreach($results as $result)
                        <div
                            class="bg-white rounded-lg shadow-sm hover:shadow-md transition-shadow duration-300 border-l-4 border-blue-500 overflow-hidden">
                            <div class="p-4 flex flex-col sm:flex-row justify-between items-start sm:items-center gap-3">
                                <div class="w-10/12 sm:w-full">
                                    <span
                                        class="inline-block px-2 py-1 text-xs font-semibold text-blue-800 bg-blue-100 rounded-full mb-2">
                                        {{ class_basename($result->type) }}
                                    </span>
                                    <h3 class="text-lg font-semibold text-blue-900 mb-2 sm:mb-0 line-clamp-2">
                                        {{ $result->title ?? $result->searchable->name ?? 'No title' }}
                                    </h3>
                                </div>
                                <div class="md:w-2/12 sm:w-auto">
                                    <a href="{{ $result->url }}"
                                        class="w-full sm:w-auto inline-block px-3 py-1 bg-blue-600 hover:bg-blue-700 text-white rounded-md text-sm transition-colors duration-300 text-center">
                                        View Details
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>

                @if ($results instanceof \Illuminate\Pagination\LengthAwarePaginator)
                    <div class="mt-8">
                        {{ $results->links() }}
                    </div>
                @endif
            @endif
        </div>
    </div>
</x-frontend>
