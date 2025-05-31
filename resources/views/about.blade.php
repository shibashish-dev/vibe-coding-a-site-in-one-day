<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Heavy Water Board</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper-bundle.min.css') }}" />
    {{--
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" /> --}}

    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Arial', sans-serif;
        }

        /* Header Styling */
        header {
            background-color: #fff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
        }

        .header-logo img {
            width: 80px;
            height: 80px;
            transition: transform 0.3s;
        }

        .header-logo:hover img {
            transform: scale(1.05);
        }

        .header-text h1 {
            font-size: 1.25rem;
            font-weight: bold;
            color: #1e3a8a;
            -webkit-background-clip: text;

        }

        .header-text h2 {
            font-size: 1rem;
            color: #1e3a8a;
            font-weight: 500;
        }

        .header-text h3 {
            font-size: 1.25rem;
            color: #1e3a8a;
            font-weight: bold;
        }

        .header-emblem img {
            height: 80px;
        }

        .text-size-buttons .btn {
            background: linear-gradient(to bottom, #e0f2fe, #bfdbfe);
            color: #1e40af;
            border: 1px solid #93c5fd;
            font-size: 0.75rem;
            padding: 0.25rem 0.5rem;
            transition: all 0.2s;
        }

        .text-size-buttons .btn:hover {
            background: linear-gradient(to bottom, #bfdbfe, #93c5fd);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .search-bar .form-control {
            background: linear-gradient(to right, #fff, #eff6ff);
            border: 1px solid #bfdbfe;
            border-radius: 50rem;
            padding-right: 2.5rem;
            transition: all 0.3s;
        }

        .search-bar .form-control:focus {
            border-color: #60a5fa;
            box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.3);
        }

        .search-bar .btn {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #2563eb;
            transition: color 0.2s;
        }

        .search-bar .btn:hover {
            color: #1e40af;
        }

        /* Navbar Styling */
        .navbar {
            background-color: #d1d5db;
            font-weight: 800;
            text-transform: uppercase;
        }

        .navbar .nav-link {
            color: #000;
            padding: 0.5rem 1rem;
            border-radius: 0.25rem;
            transition: background-color 0.3s;
        }

        .navbar .nav-link:hover {
            background-color: #b0b0b0;
        }

        .navbar .dropdown-menu {
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border: none;
        }

        .navbar .dropdown-item {
            color: #000;
            transition: background-color 0.3s;
        }

        .navbar .dropdown-item:hover {
            background-color: #f1f5f9;
        }

        /* Sidebar Styling */
        .sidebar {
            background-color: rgba(255, 255, 255, 0.3);
            backdrop-filter: blur(10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 1rem;
            padding: 1.5rem;
            height: 840px;
            overflow-y: auto;
            position: sticky;
            top: 16px;
        }

        .sidebar h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #1f2937;
            border-bottom-width: 2px;
            padding-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            cursor: pointer;
        }

        .sidebar .menu-section {
            border-bottom-color: #f87171;
        }

        .sidebar .menu-section i {
            color: #f87171;
        }

        .sidebar .links-section {
            border-bottom-color: #facc15;
        }

        .sidebar .links-section i {
            color: #facc15;
        }

        .sidebar ul {
            margin-top: 1rem;
            padding-left: 0;
        }

        .sidebar ul li {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem;
            border-radius: 0.75rem;
            transition: all 0.3s;
            cursor: pointer;
        }

        .sidebar ul li:hover {
            background-color: #e0f2fe;
            transform: translateY(-2px) scale(1.02);
        }

        .sidebar ul li i {
            color: #2563eb;
            transition: all 0.3s;
        }

        .sidebar ul li:hover i {
            color: #1e40af;
            transform: rotate(6deg);
        }

        .sidebar ul li a {
            color: #1f2937;
            font-weight: 500;
            transition: color 0.3s;
        }

        .sidebar ul li:hover a {
            color: #1e40af;
        }

        .sidebar .links-section ul li:hover {
            background-color: #fef9c3;
        }

        .sidebar .links-section ul li i {
            color: #facc15;
        }

        .sidebar .links-section ul li:hover i {
            color: #ca8a04;
        }

        .sidebar .links-section ul li:hover a {
            color: #ca8a04;
        }

        /* Slider Styling */
        .swiper {
            width: 100%;
            height: 500px;
            /* Set explicit height for the slider */
        }

        .swiper-wrapper {
            width: 100%;
            height: 100%;
        }

        .swiper-slide {
            width: 100%;
            height: 100%;
        }

        .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            border-radius: 0.5rem;
        }

        /* What's New Section */
        .whats-new {
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
            border-radius: 0.5rem;
            padding: 1rem;
            height: 840px;
            display: flex;
            flex-direction: column;
        }

        .whats-new h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #000;
            background-color: #e5e7eb;
            padding: 1rem;
            position: sticky;
            top: 0;
            z-index: 10;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .whats-new .content {
            margin-top: 1rem;
            flex: 1;
            overflow-y: auto;
            padding-right: 0.5rem;
        }

        .whats-new .content .no-info {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.5rem;
            border-radius: 0.25rem;
            color: #6b7280;
            font-size: 0.875rem;
            transition: background-color 0.3s;
        }

        .whats-new .content .no-info:hover {
            background-color: #f3f4f6;
        }

        /* Circulars Section */
        .circulars {
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-left: 4px solid #dc2626;
            border-radius: 0.5rem;
            height: 320px;
            display: flex;
            flex-direction: column;
        }

        .circulars h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #dc2626;
            padding: 1rem;
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #fff;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .circulars .content {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
        }

        .circulars .content .no-info {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.5rem;
            border-radius: 0.25rem;
            color: #6b7280;
            font-size: 0.875rem;
            transition: background-color 0.3s;
        }

        .circulars .content .no-info:hover {
            background-color: #fee2e2;
        }

        .circulars .content ul {
            list-style: none;
            padding-left: 0;
            margin: 0;
        }

        .circulars .content ul li {
            padding: 0.5rem;
            border-radius: 0.25rem;
            transition: background-color 0.3s;
        }

        .circulars .content ul li:hover {
            background-color: #fee2e2;
        }

        .circulars .content ul li a {
            color: #1d4ed8;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            font-size: 0.875rem;
            transition: color 0.3s;
        }

        .circulars .content ul li:hover a {
            color: #dc2626;
        }

        .circulars .content ul li i {
            color: #dc2626;
        }

        /* Quick Info Section */
        .quick-info {
            background-color: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            border-right: 4px solid #16a34a;
            border-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
            border-bottom-right-radius: 0.5rem;
            height: 320px;
            display: flex;
            flex-direction: column;
        }

        .quick-info h2 {
            font-size: 1.25rem;
            font-weight: 600;
            color: #16a34a;
            padding: 1rem;
            position: sticky;
            top: 0;
            z-index: 10;
            background-color: #fff;
            border-bottom: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-top-right-radius: 0.5rem;
        }

        .quick-info .content {
            flex: 1;
            overflow-y: auto;
            padding: 1rem;
        }

        .quick-info .content .no-info {
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 0.5rem;
            border-radius: 0.25rem;
            color: #6b7280;
            font-size: 0.875rem;
            transition: background-color 0.3s;
        }

        .quick-info .content .no-info:hover {
            background-color: #dcfce7;
        }

        /* Footer Styling */
        footer {
            background-color: #1e3a8a;
            color: #fff;
            text-align: center;
            padding: 1rem;
            margin-top: 2rem;
        }

        footer p {
            font-size: 0.875rem;
            margin: 0;
        }

        /* Responsive Adjustments */
        @media (max-width: 767px) {

            .header-text h1,
            .header-text h3 {
                font-size: 1rem;
            }

            .header-text h2 {
                font-size: 0.875rem;
            }

            .header-logo img,
            .header-emblem img {
                width: 60px;
                height: 60px;
            }

            .text-size-buttons .btn {
                font-size: 0.625rem;
                padding: 0.2rem 0.4rem;
            }

            .sidebar {
                position: static;
                width: 100%;
                height: 840px;
                margin-top: 1.5rem;
            }

            .sidebar ul {
                display: none;
            }

            .sidebar ul.show {
                display: block;
            }

            .sidebar h2 i.fa-chevron-down {
                transition: transform 0.3s;
            }

            .sidebar h2 i.fa-chevron-down.rotate {
                transform: rotate(180deg);
            }

            .swiper {
                height: 300px;
                /* Adjust height for smaller screens */
            }
        }

        @media (min-width: 768px) and (max-width: 1024px) {

            .header-logo img,
            .header-emblem img {
                width: 70px;
                height: 70px;
            }

            .swiper {
                height: 400px;
                /* Adjust height for medium screens */
            }
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;
            /* IE and Edge */
            scrollbar-width: none;
            /* Firefox */
        }
    </style>
</head>

<body>
    <!-- Header -->
    <header>
        <div class="container-fluid">
            <div class="row align-items-center justify-content-between px-3 py-4">
                <!-- Left: Logo & Text -->
                <div class="col-12 col-md-4 col-lg-3  mb-3 mb-md-0">
                    <div class="d-flex flex-column gap-5 flex-md-row align-items-center w-100">
                        <div class="header-logo">
                            <img src="{{ asset('logo.png') }}" alt="HWB Logo">
                        </div>
                        <div class="ml-4 header-text">
                            <h1>Government of India</h1>
                            <h2>Department of Atomic Energy</h2>
                            <h3>Heavy Water Board Facilities, Talcher</h3>
                        </div>
                    </div>
                </div>

                <!-- Center: Emblem -->
                <div class="col-12 col-md-4 col-lg-3 text-center mb-3 mb-md-0">
                    <div class="header-emblem">
                        <img src="{{ asset('emblm.png') }}" alt="Emblem">
                    </div>
                </div>

                <!-- Right: Text Size & Search -->
                <div class="col-12 col-md-4 col-lg-3 text-center text-lg-end">
                    <div class="d-flex flex-column align-items-center align-items-lg-end gap-2">
                        <!-- Text Size Controls -->
                        <div class="d-flex align-items-center gap-2">
                            <span class="text-muted small">Text Size:</span>
                            <div class="text-size-buttons d-flex gap-1">
                                <button class="btn ml-2" onclick="setFontSize('normal')">A</button>
                                <button class="btn ml-2" onclick="setFontSize('increase')">A<sup>+</sup></button>
                                <button class="btn ml-2" onclick="setFontSize('decrease')">A<sup>-</sup></button>
                            </div>
                        </div>
                        <!-- Search Bar -->
                        <div class="search-bar position-relative w-100 mt-4" style="max-width: 300px;">
                            <form action="#" method="GET">
                                <input type="text" class="form-control" placeholder="Search...">
                                <button type="submit" class="btn"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-md">
        <div class="container-fluid">
            <!-- Toggler for Mobile -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu"
                aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars navbar-toggler-icon"></i>
            </button>

            <!-- Desktop & Mobile Dropdown Menu -->
            <div class="collapse navbar-collapse" id="navbarMenu">
                <ul class="navbar-nav mx-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="orgDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Organizations</a>
                        <div class="dropdown-menu" aria-labelledby="orgDropdown">
                            <a class="dropdown-item" href="#">Organization 1</a>
                            <a class="dropdown-item" href="#">Organization 2</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="plantsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Plants</a>
                        <div class="dropdown-menu" aria-labelledby="plantsDropdown">
                            <a class="dropdown-item" href="#">Plant 1</a>
                            <a class="dropdown-item" href="#">Plant 2</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="productsDropdown" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Products</a>
                        <div class="dropdown-menu" aria-labelledby="productsDropdown">
                            <a class="dropdown-item" href="#">Product 1</a>
                            <a class="dropdown-item" href="#">Product 2</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <main class="container-fluid py-4">
        <div class="row g-4">
            <!-- Sidebar -->
            <div class="col-12 col-lg-2">
                <div class="sidebar no-scrollbar">
                    <!-- Menu Section -->
                    <div class="menu-section">
                        <h2 id="menu-toggle">
                            <i class="fas fa-bars"></i> Menu
                            <i class="fas fa-chevron-down d-md-none ms-auto"></i>
                        </h2>
                        <ul id="menu-list">
                            <li>
                                <i class="fas fa-envelope"></i>
                                <a href="#">Zimbra</a>
                            </li>
                            <li>
                                <i class="fas fa-building"></i>
                                <a href="#">Office</a>
                            </li>
                            <li>
                                <i class="fas fa-info-circle"></i>
                                <a href="#">Integrated Info System</a>
                            </li>
                            <li>
                                <i class="fas fa-user-check"></i>
                                <a href="#">Attendance</a>
                            </li>
                            <li>
                                <i class="fas fa-shopping-cart"></i>
                                <a href="#">Procurement</a>
                            </li>
                            <li>
                                <i class="fas fa-file-alt"></i>
                                <a href="#">Forms & Formats</a>
                            </li>
                            <li>
                                <i class="fas fa-shield-alt"></i>
                                <a href="#">VMS</a>
                            </li>
                            <li>
                                <i class="fas fa-hospital"></i>
                                <a href="#">HIMS</a>
                            </li>
                            <li>
                                <i class="fas fa-images"></i>
                                <a href="#">Photo Gallery</a>
                            </li>
                            <li>
                                <i class="fas fa-utensils"></i>
                                <a href="#">Canteen Info</a>
                            </li>
                            <li>
                                <i class="fas fa-car"></i>
                                <a href="#">Vehicle</a>
                            </li>
                            <li>
                                <i class="fas fa-user"></i>
                                <a href="#">My Space</a>
                            </li>
                            <li>
                                <i class="fas fa-address-book"></i>
                                <a href="#">Employee Directory</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Links Section -->
                    <div class="links-section mt-4">
                        <h2 id="links-toggle">
                            <i class="fas fa-external-link-alt"></i> Links
                            <i class="fas fa-chevron-down d-md-none ms-auto"></i>
                        </h2>
                        <ul id="links-list">
                            <li>
                                <i class="fas fa-link"></i>
                                <a href="#" target="_blank">Link 1</a>
                            </li>
                            <li>
                                <i class="fas fa-link"></i>
                                <a href="#" target="_blank">Link 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <!-- Center Section: Slider and Cards -->
            <div class="col-12 col-lg-7">
                <div class="row g-4">
                    <!-- Slider -->

                    <div class="col-12 mb-3">
                        <div class="swiper mySwiper rounded shadow-lg"> <!-- Keep classes for styling -->
                            <div class="swiper-wrapper"> <!-- Slick will use this as the wrapper -->
                                <div class="swiper-slide">
                                    <img src="{{ asset('image1.jpg') }}" alt="Slide Image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('image2.jpg') }}" alt="Slide Image">
                                </div>
                                <div class="swiper-slide">
                                    <img src="{{ asset('image3.jpg') }}" alt="Slide Image">
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- Circulars and Quick Info -->
                    <div class="col-12">
                        <div class="row g-4">
                            <!-- Circulars -->
                            <div class="col-12 col-md-6">
                                <div class="circulars no-scrollbar">
                                    <h2><i class="fas fa-sync-alt"></i> Circulars</h2>
                                    <div class="content">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="fas fa-file-pdf"></i> dffdgf</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Info -->
                            <div class="col-12 col-md-6">
                                <div class="quick-info no-scrollbar">
                                    <h2><i class="fas fa-circle-info"></i> Quick Info</h2>
                                    <div class="content">
                                        <div class="no-info">No information available.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Section: What's New -->
            <div class="col-12 col-lg-3">
                <div class="whats-new no-scrollbar">
                    <h2><i class="fas fa-newspaper"></i> What's New</h2>
                    <div class="content">
                        <div class="no-info">No Information available.</div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer>
        <p>Mandate of HWB is managing the projects of the Department of Atomic Energy for the production of Heavy Water
            and Specialty Materials.</p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/swiper-bundle.min.js') }}"></script>



    {{--
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> --}}

    <script>
        // Font Size Adjustment
        function setFontSize(size) {
            let root = document.documentElement;
            let currentSize = window.getComputedStyle(root).fontSize;
            let fontSize = parseFloat(currentSize);

            if (size === 'increase') {
                fontSize = fontSize * 1.2;
                localStorage.setItem('fontSize', `${fontSize}px`);
            } else if (size === 'decrease') {
                fontSize = fontSize * 0.8;
                localStorage.setItem('fontSize', `${fontSize}px`);
            } else {
                fontSize = 16;
                localStorage.setItem('fontSize', '16px');
            }

            root.style.fontSize = `${fontSize}px`;
        }

        document.addEventListener('DOMContentLoaded', function () {
            const savedSize = localStorage.getItem('fontSize');
            if (savedSize) {
                document.documentElement.style.fontSize = savedSize;
            }

            // Swiper Initialization
            new Swiper('.mySwiper', {
                loop: true,
                autoplay: { delay: 3000, disableOnInteraction: false },
                pagination: false,
            });

            // Sidebar Toggle for Mobile
            const menuToggle = document.getElementById('menu-toggle');
            const menuList = document.getElementById('menu-list');
            const menuChevron = menuToggle.querySelector('.fa-chevron-down');
            const linksToggle = document.getElementById('links-toggle');
            const linksList = document.getElementById('links-list');
            const linksChevron = linksToggle.querySelector('.fa-chevron-down');

            menuToggle.addEventListener('click', function () {
                if (window.innerWidth < 768) {
                    menuList.classList.toggle('show');
                    menuChevron.classList.toggle('rotate');
                }
            });

            linksToggle.addEventListener('click', function () {
                if (window.innerWidth < 768) {
                    linksList.classList.toggle('show');
                    linksChevron.classList.toggle('rotate');
                }
            });

            if (window.innerWidth < 768) {
                menuList.classList.remove('show');
                linksList.classList.remove('show');
            }
        });


    </script>
</body>

</html>
