@php
    $title = old('title', $canteen->title ?? '');
    $image = old('image', $canteen->image ?? '');
@endphp

<flux:input label="Title" name="title" value="{{ $title }}" />

<flux:input label="Image" name="image" type="file" />

@if($image)
    <div class="mt-2">
        <p class="text-sm text-gray-600">Current image:</p>
        <img src="{{ asset('storage/' . $image) }}" alt="Current image" class="mt-1 max-h-40">
    </div>
@endif

<div>
    <div class="flex items-center gap-3">
        <flux:button type="submit" color="primary">Save</flux:button>

        <a href="{{ route('canteen_info.index') }}">
            <flux:button type="button" color="neutral">Cancel</flux:button>
        </a>
    </div>
</div>
