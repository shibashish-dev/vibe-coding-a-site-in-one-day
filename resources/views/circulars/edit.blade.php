<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Circular</h2>

        <form action="{{ route('circulars.update', $circular) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')
            @include('circulars.form', ['circular' => $circular])
        </form>
    </div>
</x-layouts.app>
