@props(['images' => []])

<div class="relative w-full aspect-auto overflow-hidden rounded-lg shadow-lg">
  <!-- Swiper container -->
  <div class="swiper mySwiper w-full h-full">
    <div class="swiper-wrapper">
      @foreach($images as $image)
        <div class="swiper-slide w-full h-full">
          <img src="{{ $image }}"
               alt="Slide Image"
               class="w-full h-full object-cover rounded-lg" />
        </div>
      @endforeach
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    new Swiper('.mySwiper', {
      loop: true,
      autoplay: { delay: 3000, disableOnInteraction: false },
      pagination: false,
    });
  });
</script>
