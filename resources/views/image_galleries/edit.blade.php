<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Image</h2>

        <form action="{{ route('image_galleries.update', $imageGallery) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')
            @include('image_galleries.form', ['imageGallery' => $imageGallery])
        </form>
    </div>
</x-layouts.app>