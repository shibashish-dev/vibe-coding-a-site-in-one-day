@props(['images' => []])

<div class="relative w-full h-7/12 overflow-hidden rounded-lg shadow-lg">
    <!-- Swiper Container -->
    <div class="swiper mySwiper h-full">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
                <div class="swiper-slide h-full">
                    <img src="{{ $image }}" alt="Slide Image" class="w-full h-full object-fill rounded-lg">
                </div>
            @endforeach
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        new Swiper('.mySwiper', {
            loop: true,
            autoplay: {
                delay: 3000,
                disableOnInteraction: false,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            pagination: false,
        });
    });
</script>
