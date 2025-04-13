<x-layouts.procurement-dashboard>
    <x-slot:title>Sections</x-slot:title>
    <x-slot:subtitle>Manage all procurement sections</x-slot:subtitle>

    <div class="my-6">
        <a href="{{ route('procurement.sections.create') }}"
            class="mb-4 inline-block bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
            + Add Section
        </a>

        <table class="w-full table-auto border-collapse border border-gray-300 dark:border-gray-700">
            <thead class="bg-gray-100 dark:bg-gray-800">
                <tr class="text-gray-600 dark:text-gray-300">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Title</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
            </thead>
            <tbody class="text-gray-700 dark:text-gray-200">
                @foreach ($sections as $section)
                    <tr class="hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="border px-4 py-2">{{ $section->id }}</td>
                        <td class="border px-4 py-2">{{ $section->title }}</td>
                        <td class="border px-4 py-2 space-x-2">
                            <a href="{{ route('procurement.sections.edit', $section) }}"
                                class="text-blue-600 hover:underline dark:text-blue-400 dark:hover:text-blue-300">Edit</a>
                            <form action="{{ route('procurement.sections.destroy', $section) }}" method="POST"
                                class="inline">
                                @csrf @method('DELETE')
                                <button class="text-red-600 hover:underline dark:text-red-400 dark:hover:text-red-300"
                                    onclick="return confirm('Delete this section?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts.procurement-dashboard>