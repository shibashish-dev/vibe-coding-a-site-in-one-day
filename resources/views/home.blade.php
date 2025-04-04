<x-frontend>
    <div class="w-full mx-auto grid grid-cols-12 gap-6 mt-6 px-4">
        <!-- Sidebar -->
        <div class="col-span-2">
            <x-sidebar />
        </div>

        <!-- Main Content -->
        <div class="col-span-7">
            <!-- Slider Section -->
            <x-slider :images="[asset('image1.jpg'), asset('image2.jpg'), asset('image3.jpg')]" />

            <!-- Circulars and Quick Info -->
            <div class="flex mt-6 space-x-4 w-full">
                <div class="w-1/2">
                    <x-circulars />
                </div>
                <div class="w-1/2">
                    <x-quick-info />
                </div>
            </div>
        </div>

        <!-- What's New -->
        <div class="col-span-3">
            <x-whats-new />
        </div>
    </div>
</x-frontend>
