@php
    $title = old('title', $quickInfo->title ?? '');
    $link = old('link', $quickInfo->link ?? '');
@endphp

<flux:input label="Title" name="title" value="{{ $title }}" />

<flux:input label="Link" name="link" type="url" value="{{ $link }}" />

<div>
    <div class="flex items-center gap-3">
        <flux:button type="submit" color="primary">Save</flux:button>

        <a href="{{ route('quick_infos.index') }}">
            <flux:button type="button" color="neutral">Cancel</flux:button>
        </a>
    </div>
</div>