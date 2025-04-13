@php
    $title = old('title', $section->title ?? '');
@endphp

<div class="space-y-4">
    <div>
        <label for="title" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Title</label>
        <input type="text" name="title" id="title" value="{{ $title }}"
            class="mt-1 p-3 block w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-opacity-50 dark:bg-zinc-800 dark:border-zinc-600 dark:text-white">
        @error('title')
            <p class="mt-1 text-sm text-red-500">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <button type="submit"
            class="w-full inline-flex items-center justify-center px-4 py-2 text-sm font-medium text-white bg-blue-600 border border-transparent rounded-md hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
            {{ $buttonText }}
        </button>
    </div>
</div>