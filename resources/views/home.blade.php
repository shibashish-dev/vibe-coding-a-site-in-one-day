<x-frontend>

    <div class="w-full  mx-auto grid grid-cols-4 gap-6 mt-6 px-4">
        <x-sidebar />

        <!-- Main Content -->
        <div class="col-span-2">
            <!-- Slider Section -->
            <x-slider :images="[asset('image1.jpg'), asset('image2.jpg'), asset('image3.jpg')]" />


            <!-- Circulars and Quick Info - Full Width of Slider -->
            <div class="flex mt-6 space-x-4 w-full">
                <div class="w-1/2">
                    <x-circulars />
                </div>
                <div class="w-1/2">
                    <x-quick-info />
                </div>
            </div>
        </div>

        <x-whats-new />
    </div>


</x-frontend>
