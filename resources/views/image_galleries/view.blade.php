<x-frontend>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-16 mx-auto">
            <div class="flex flex-col md:flex-row w-full mb-12">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-gray-900">Image Gallery</h1>
                    <div class="h-1 w-24 bg-blue-600 rounded-full"></div>
                </div>
                <p class="lg:w-1/2 w-full leading-relaxed text-gray-600">Explore our curated collection of memorable
                    moments and significant events. This gallery showcases the visual journey of our initiatives,
                    celebrations, and community engagements. Each image tells a story of progress, collaboration, and
                    commitment to public service.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
                @foreach ($imageGalleries as $imageGallery)
                    <div class="overflow-hidden rounded-lg shadow-md hover:shadow-xl transition-shadow duration-300">
                        <img class="h-56 w-full object-cover object-center"
                            src="{{ asset('storage/' . $imageGallery->image) }}" alt="{{ $imageGallery->title }}">
                        <div class="bg-white p-5">
                            <h2 class="text-gray-900 text-xl font-semibold title-font mb-2 truncate">
                                {{ $imageGallery->title }}
                            </h2>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="mt-10">
                {{ $imageGalleries->links() }}
            </div>
        </div>
    </section>
</x-frontend>
