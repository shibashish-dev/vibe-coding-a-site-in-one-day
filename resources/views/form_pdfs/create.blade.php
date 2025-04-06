<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Add New Form PDF</h2>

        <form action="{{ route('form_pdfs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('form_pdfs.form')
        </form>
    </div>
</x-layouts.app>