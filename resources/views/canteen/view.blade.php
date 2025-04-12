<x-frontend>
    <section class="text-gray-600 body-font">
        <div class="container px-5 py-16 mx-auto">
            <div class="flex flex-col md:flex-row w-full mb-12">
                <div class="lg:w-1/2 w-full mb-6 lg:mb-0">
                    <h1 class="sm:text-4xl text-3xl font-bold title-font mb-4 text-gray-900">Canteen Info</h1>
                    <div class="h-1 w-24 bg-blue-600 rounded-full"></div>
                </div>

            </div>

            <div class="w-full ">
                @foreach ($canteens as $canteen)
                    <div class="mb-8">
                        <h2 class="text-gray-900 text-6xl text-center font-semibold  mb-2">
                            {{ $canteen->title }}
                        </h2>
                        <p class="text-gray-500 my-4 font-bold text-xl text-center">
                            {{ now()->format('F d, Y') }}
                        </p>
                        <img class="w-full h-auto rounded-lg shadow-md" src="{{ asset('storage/' . $canteen->image) }}"
                            alt="{{ $canteen->title }}">
                    </div>
                @endforeach
            </div>

        </div>
    </section>
</x-frontend>
