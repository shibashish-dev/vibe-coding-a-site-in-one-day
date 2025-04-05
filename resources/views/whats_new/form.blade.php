@php
    $title = old('title', $whatsNew->title ?? '');
    $category = old('category', $whatsNew->category ?? '');
    $onDate = old('on_date', isset($whatsNew->on_date) ? \Carbon\Carbon::parse($whatsNew->on_date)->format('Y-m-d') : '');
@endphp

<flux:input label="Title" name="title" value="{{ $title }}" />

<flux:input label="Category" name="category" value="{{ $category }}" />

<flux:input label="Date" name="on_date" type="date" value="{{ $onDate }}" />

<div>
    <div class="flex items-center gap-3">
        <flux:button type="submit" color="primary">Save</flux:button>

        <a href="{{ route('whats_new.index') }}">
            <flux:button type="button" color="neutral">Cancel</flux:button>
        </a>
    </div>
</div>