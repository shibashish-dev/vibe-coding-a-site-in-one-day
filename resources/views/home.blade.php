<x-frontend>

    <style>
        .main-container {
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 1900px;
            margin: 30px auto;
            padding: 0 16px;
        }

        .main-grid {
            display: grid;
            grid-template-columns: minmax(200px, 240px) 1fr minmax(200px, 350px);
            gap: 24px;
            align-items: start;
        }

        /* Main Content */
        .content-area {
            width: 100%;
            min-width: 0;
        }

        /* What's New */
        .whats-new {
            position: sticky;
            top: 16px;
            height: min-content;
        }

        /* Content inside */
        .slider-container {
            width: 100%;
            min-width: 0;
        }

        .content-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 16px;
            width: 100%;
            min-width: 0;
        }

        /* Responsive adjustments for 1280px to 1100px */
        @media (max-width: 1280px) and (min-width: 1100px) {
            .main-grid {
                grid-template-columns: 1fr;
            }

            .whats-new {
                position: static;
                width: 100%;
                height: auto;
                margin-top: 24px;
            }
        }

        /* Mobile adjustments for below 1100px */
        @media (max-width: 1099px) {
            .main-grid {
                grid-template-columns: 1fr;
            }

            .whats-new {
                position: static;
                width: 100%;
                height: auto;
                margin-top: 24px;
            }
        }

        /* Responsive behavior */
        @media (max-width: 1280px) and (min-width: 1100px) {
            .sidebar {
                position: static !important;
                width: 100%;
                height: 840px;
                margin-top: 24px;
            }
        }

        @media (max-width: 1099px) {
            .sidebar {
                position: static !important;
                width: 100%;
                height: 840px;
                margin-top: 24px;
            }
        }

        @media (max-width: 1280px) {
            .sidebar {
                position: static !important;
                width: 100%;
                height: 840px;
                margin-top: 24px;
            }

            .main-grid {
                grid-template-columns: 1fr;
            }

            .whats-new {
                position: static;
                width: 100%;
                height: auto;
                overflow: visible;
                margin-top: 24px;
            }
        }
    </style>

    <div class="main-container my-5">
        <div class="main-grid">
            <!-- Sidebar -->
            <x-sidebar />

            <!-- Center Main Content -->
            <div class="content-area">
                <div class="slider-container">
                    <x-slider :images="[asset('image1.jpg'), asset('image2.jpg'), asset('image3.jpg')]" />
                </div>

                <div class="content-row mt-4">
                    <x-circulars />
                    <x-quick-infos />
                </div>
            </div>

            <!-- What's New (Right Side Always) -->
            <div class="whats-new">
                <x-whats-news />
            </div>
        </div>
    </div>

</x-frontend>
