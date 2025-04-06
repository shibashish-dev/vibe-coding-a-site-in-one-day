@php
    $imageGallery = $imageGallery ?? null;
@endphp

<flux:input label="Title" name="title" value="{{ old('title', $imageGallery->title ?? '') }}" />

<div class="w-full">
    <flux:input label="Image File" type="file" name="image" accept="image/*" />
    <p class="text-xs text-zinc-500 dark:text-zinc-400 mt-1">Max size: 2MB. Accepted: jpeg, png, gif.</p>

    @if (isset($imageGallery) && $imageGallery->image)
        <p class="text-sm mt-2 text-zinc-600 dark:text-zinc-300">
            Existing Image:
            <a href="{{ asset('storage/' . $imageGallery->image) }}" class="text-blue-500 underline" target="_blank">View
                Image</a>
        </p>
    @endif
</div>

<div class="flex items-center gap-3 mt-6">
    <flux:button type="submit" color="primary">Save</flux:button>
    <a href="{{ route('image_galleries.index') }}">
        <flux:button type="button" color="neutral">Cancel</flux:button>
    </a>
</div>