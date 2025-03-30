<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heavy Water Board</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    @vite('resources/css/app.css')
    {{-- @fluxAppearance --}}
</head>

<body class="bg-gray-100">

    <!-- Header -->
    <!-- Main Header Content -->

    <header class="bg-white shadow">
        <div class="w-full mx-auto flex flex-wrap items-center px-4 py-4">

            <!-- Left Section: HWB Logo & Text -->
            <div class="flex items-center space-x-4 flex-1">
                <img src="https://hwb.gov.in/sites/all/themes/hwb/images/logo.png" alt="HWB Logo" class="w-16 max-h-16">
                <div>
                    <h1 class="text-lg font-bold text-black">Government of India</h1>
                    <h2 class="text-md text-blue-500">Department of Atomic Energy</h2>
                    <h3 class="text-lg font-bold text-blue-800">HEAVY WATER BOARD</h3>
                </div>
            </div>

            <!-- Centered Text -->
            <div class="flex-1 flex flex-col items-center text-center">
                {{-- <h1 class="text-lg font-bold text-black">Government of India</h1> --}}
                <h2 class="text-3xl font-bold text-blue-800">Heavy Water Board Facilities, Talcher</h2>
                <h2 class="text-md text-blue-500"><span>Email: </span> water@gmail.com</h2>
                <h2 class="text-md text-black"><span>Phone: </span> 7894562130</h2>
                {{-- <h3 class="text-lg font-bold text-blue-800">HEAVY WATER BOARD</h3> --}}
            </div>

            <!-- Centered Emblem -->
            <div class="flex-1 flex justify-center">
                <img src="{{ asset('emblm_new.png') }}" alt="Emblem" class="h-24">
            </div>

        </div>
    </header>




    <x-navbar />

    <main>
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer class="bg-blue-900 text-white text-center py-4 mt-8">
        <p>Mandate of HWB is managing the projects of the Department of Atomic Energy for the production of Heavy Water
            and Specialty Materials.</p>
    </footer>
    <!-- Swiper CSS -->

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @fluxScripts
</body>

</html>
