<x-frontend>

    <style>
        /* Custom breakpoints */
        @media (min-width: 640px) {
            .custom-sm\:flex-row {
                flex-direction: row;
            }

            .custom-sm\:w-1\/2 {
                width: 50%;
            }
        }

        @media (min-width: 768px) {
            .custom-md\:grid-cols-12 {
                grid-template-columns: repeat(12, minmax(0, 1fr));
            }

            .custom-md\:col-span-3 {
                grid-column: span 3 / span 3;
            }

            .custom-md\:col-span-6 {
                grid-column: span 6 / span 6;
            }
        }

        /* The key breakpoint for your 1200-1800 issue */
        @media (min-width: 1200px) {
            .center-content {
                margin: 0 100px;
                width: 84%;
            }

            .custom-lg\:col-span-2 {
                grid-column: span 2 / span 2;
            }

            .custom-lg\:col-span-7 {
                grid-column: span 7 / span 7;
            }

            .custom-lg\:col-span-3 {
                grid-column: span 3 / span 3;
            }
        }

        /* For very large screens */
        @media (min-width: 1800px) {
            .center-content {
                margin: 0 auto;
                width: 95%;
            }

            .custom-xl\:col-span-2 {
                grid-column: span 2 / span 2;
            }

            .custom-xl\:col-span-7 {
                grid-column: span 7 / span 7;
            }

            .custom-xl\:col-span-3 {
                grid-column: span 3 / span 3;
            }
        }
    </style>

    <div class="w-full mx-auto grid grid-cols-1 custom-md:grid-cols-12 gap-4 mt-4 px-4">
        <!-- Sidebar -->
        <div class="custom-md:col-span-3 custom-lg:col-span-2">
            <x-sidebar />
        </div>

        <!-- Main Content -->
        <div class="custom-md:col-span-6 custom-lg:col-span-7 center-content">
            <x-slider :images="[asset('image1.jpg'), asset('image2.jpg'), asset('image3.jpg')]" />

            <div class="flex flex-col custom-sm:flex-row mt-4 gap-4 w-full">
                <div class="w-full custom-sm:w-1/2">
                    <x-circulars />
                </div>
                <div class="w-full custom-sm:w-1/2">
                    <x-quick-infos />
                </div>
            </div>
        </div>

        <!-- What's New -->
        <div class="custom-md:col-span-3 custom-lg:col-span-3">
            <x-whats-news />
        </div>
    </div>


</x-frontend>