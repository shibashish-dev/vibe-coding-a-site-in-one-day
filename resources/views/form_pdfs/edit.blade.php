<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Form PDF</h2>

        <form action="{{ route('form_pdfs.update', $formPdf) }}" method="POST" enctype="multipart/form-data"
            class="space-y-6">
            @csrf
            @method('PUT')
            @include('form_pdfs.form', ['formPdf' => $formPdf])
        </form>
    </div>
</x-layouts.app>