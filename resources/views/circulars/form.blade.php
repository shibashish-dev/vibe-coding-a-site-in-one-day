@php
    $type = old('type', $circular->type ?? 'link');
@endphp

<flux:input label="Title" name="title" value="{{ old('title', $circular->title ?? '') }}" />

<flux:select label="Type" name="type" id="type" onchange="toggleFields()">
    <option value="link" {{ $type === 'link' ? 'selected' : '' }}>Link</option>
    <option value="pdf" {{ $type === 'pdf' ? 'selected' : '' }}>PDF</option>
</flux:select>

<div id="linkField" class="{{ $type === 'link' ? '' : 'hidden' }}">
    <flux:input label="Link" type="url" name="link" value="{{ old('link', $circular->link ?? '') }}" />
</div>

<div id="pdfField" class="{{ $type === 'pdf' ? '' : 'hidden' }}">
    <flux:input label="PDF File" type="file" name="pdf" />
    @if (isset($circular) && $circular->pdf_path)
        <p class="text-sm mt-2 text-zinc-600 dark:text-zinc-300">
            Existing File:
            <a href="{{ asset('storage/' . $circular->pdf_path) }}" class="text-blue-500 underline" target="_blank">View
                PDF</a>
        </p>
    @endif
</div>

<div>
    <div class="flex items-center gap-3">
        <flux:button type="submit" color="primary">Save</flux:button>

        <a href="{{ route('circulars.index') }}">
            <flux:button type="button" color="neutral">Cancel</flux:button>
        </a>
    </div>
</div>

<script>
    function toggleFields() {
        const type = document.getElementById('type').value;
        document.getElementById('linkField').classList.toggle('hidden', type !== 'link');
        document.getElementById('pdfField').classList.toggle('hidden', type !== 'pdf');
    }

    document.addEventListener('DOMContentLoaded', toggleFields);
</script>