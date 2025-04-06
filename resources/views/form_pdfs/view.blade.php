<x-frontend>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-16 mx-auto">
            {{-- Header --}}
            <div class="flex flex-col md:flex-row w-full mb-12">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-gray-900">Forms & Formats</h1>
                    <div class="h-1 w-24 bg-blue-600 rounded-full"></div>
                </div>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-600">
                    Browse our comprehensive collection of official forms and document formats. These downloadable resources are designed to simplify administrative processes and ensure compliance with required procedures.
                </p>
            </div>

            {{-- Search Bar --}}
            <form method="GET" action="{{ route('forms.view') }}" class="mb-10 flex items-center gap-3 flex-wrap">
                <input type="text" name="search" placeholder="Search forms..." value="{{ request('search') }}"
                    class="flex-1 md:flex-none md:w-1/3 border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500" />

                {{-- Search Button --}}
                <button type="submit"
                    class="bg-blue-900 text-white px-4 py-2 rounded-lg hover:bg-blue-800 flex items-center gap-2">
                    <i class="fas fa-search"></i>
                    <span>Search</span>
                </button>

                {{-- Clear Button --}}
                @if(request('search'))
                    <a href="{{ route('forms.view') }}"
                        class="bg-gray-300 text-gray-800 px-4 py-2 rounded-lg hover:bg-gray-400 flex items-center gap-2">
                        <i class="fas fa-times"></i>
                        <span>Clear</span>
                    </a>
                @endif
            </form>

            {{-- Tile Layout --}}
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @forelse ($formPdfs as $formPdf)
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300 bg-white">
                        <img class="h-56 w-full object-cover object-center"
                            src="{{ asset('storage/' . $formPdf->thumbnail) }}" alt="{{ $formPdf->title }}">
                        <div class="p-5 h-32 flex flex-col justify-between">
                            <div class="flex items-center justify-between">
                                <h2 class="text-gray-900 text-lg font-semibold truncate">
                                    {{ $formPdf->title }}
                                </h2>
                                <a href="{{ asset('storage/' . $formPdf->pdf_path) }}" download
                                    class="text-white rounded-full font-bold font-4xl p-3  bg-blue-900 text-sm flex items-center gap-1">
                                    <i class="fas fa-download"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p class="text-gray-600 col-span-full text-center">No forms found.</p>
                @endforelse
            </div>

            {{-- Pagination --}}
            <div class="mt-10">
                {{ $formPdfs->withQueryString()->links() }}
            </div>
        </div>
    </section>
</x-frontend>
