<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Create Circular</h2>

        <form action="{{ route('circulars.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('circulars.form', ['circular' => null])
        </form>
    </div>
</x-layouts.app>
