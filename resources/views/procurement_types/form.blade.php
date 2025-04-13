@php
    $title = old('title', $procurementType->title ?? '');
@endphp

<div class="space-y-4">
    <div>
        <label for="title" class="block text-sm font-semibold text-gray-700 dark:text-gray-200">Title</label>
        <input type="text" name="title" id="title" value="{{ $title }}" required
            class="w-full p-3 border-gray-300 dark:border-gray-700 bg-white dark:bg-zinc-800 text-gray-900 dark:text-white rounded-md shadow-sm">
    </div>

    <div>
        <button type="submit"
            class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700 dark:bg-green-700 dark:hover:bg-green-800">
            {{ $buttonText }}
        </button>
        <a href="{{ route('procurement.procurement-types.index') }}">
            <button type="button"
                class="ml-4 px-4 py-2 bg-gray-600 text-white rounded hover:bg-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                Cancel
            </button>
        </a>
    </div>
</div>