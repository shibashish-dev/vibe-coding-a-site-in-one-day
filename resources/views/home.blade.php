<x-frontend>
    <div class="w-full mx-auto grid grid-cols-1 md:grid-cols-12 gap-4 mt-4 px-4">
        <!-- Sidebar -->
        <div class="md:col-span-3 lg:col-span-2">
            <x-sidebar />
        </div>

        <!-- Main Content -->
        <div class="md:col-span-9 lg:col-span-7">
            <!-- Slider Section -->
            <x-slider :images="[asset('image1.jpg'), asset('image2.jpg'), asset('image3.jpg')]" />

            <!-- Circulars and Quick Info -->
            <div class="flex flex-col md:flex-row mt-4 space-y-4 md:space-y-0 md:space-x-4 w-full">
                <div class="w-full md:w-1/2">
                    <x-circulars />
                </div>
                <div class="w-full md:w-1/2">
                    <x-quick-infos />
                </div>
            </div>
        </div>

        <!-- What's New -->
        <div class="md:col-span-12 lg:col-span-3">
            <x-whats-news />
        </div>
    </div>
</x-frontend>
