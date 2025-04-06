@php
    $formPdf = $formPdf ?? null;
@endphp

<flux:input label="Title" name="title" value="{{ old('title', $formPdf->title ?? '') }}" />

<div class="flex flex-wrap gap-4">
    <!-- Thumbnail -->
    <div class="w-full md:w-1/2">
        <flux:input label="Thumbnail Image" type="file" name="thumbnail"
            accept="image/jpeg,image/png,image/jpg,image/gif" />
        <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Max size: 2MB. Accepted: jpeg, png, jpg, gif.</p>

        @if (isset($formPdf) && $formPdf->thumbnail)
            <p class="text-sm mt-2 text-zinc-600 dark:text-zinc-300">
                Existing Thumbnail:
                <a href="{{ asset('storage/' . $formPdf->thumbnail) }}" class="text-blue-500 underline" target="_blank">View
                    Image</a>
            </p>
        @endif
    </div>

    <!-- PDF -->
    <div class="w-full md:w-1/2">
        <flux:input label="PDF File" type="file" name="pdf" accept="application/pdf" />
        <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Max size: 5MB. PDF only.</p>

        @if (isset($formPdf) && $formPdf->pdf_path)
            <p class="text-sm mt-2 text-zinc-600 dark:text-zinc-300">
                Existing File:
                <a href="{{ asset('storage/' . $formPdf->pdf_path) }}" class="text-blue-500 underline" target="_blank">View
                    PDF</a>
            </p>
        @endif
    </div>
</div>

<!-- Buttons -->
<div class="flex items-center gap-3 mt-6">
    <flux:button type="submit" color="primary">Save</flux:button>
    <a href="{{ route('form_pdfs.index') }}">
        <flux:button type="button" color="neutral">Cancel</flux:button>
    </a>
</div>