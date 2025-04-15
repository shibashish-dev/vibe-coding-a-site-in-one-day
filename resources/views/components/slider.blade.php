@props(['images' => []])

<div class="relative w-full h-64 sm:h-80 md:h-96 lg:h-[500px] overflow-hidden rounded-lg shadow-lg">
    <!-- Swiper Container -->
    <div class="swiper mySwiper h-full">
        <div class="swiper-wrapper">
            @foreach ($images as $image)
                <div class="swiper-slide h-full">
                    <img src="{{ $image }}" alt="Slide Image" class="w-full h-full object-cover rounded-lg">
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
            pagination: false,
        });
    });
</script>
