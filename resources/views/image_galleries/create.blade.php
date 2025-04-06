<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Add New Image</h2>

        <form action="{{ route('image_galleries.store') }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @include('image_galleries.form')
        </form>
    </div>
</x-layouts.app>