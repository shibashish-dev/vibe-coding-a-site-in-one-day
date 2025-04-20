@props(['entries', 'role'])

<div class="overflow-x-auto rounded-lg bg-white dark:bg-gray-800 shadow">
    <table class="w-full whitespace-nowrap">
        <thead>
            <tr class="text-left border-b border-gray-200 dark:border-gray-700">
                <th class="px-4 py-3 font-medium text-gray-700 dark:text-gray-300">ID</th>
                <th class="px-4 py-3 font-medium text-gray-700 dark:text-gray-300">Section</th>
                <th class="px-4 py-3 font-medium text-gray-700 dark:text-gray-300">Type</th>
                @if($role === 'procurement_admin')
                    <th class="px-4 py-3 font-medium text-gray-700 dark:text-gray-300">User</th>
                @endif
                <th class="px-4 py-3 font-medium text-gray-700 dark:text-gray-300">Status</th>
                <th class="px-4 py-3 font-medium text-gray-700 dark:text-gray-300">Created At</th>
                <th class="px-4 py-3 font-medium text-gray-700 dark:text-gray-300">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($entries as $entry)
                    <tr class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-700">
                        <td class="px-4 py-3 text-gray-800 dark:text-gray-200">{{ $entry->id }}</td>
                        <td class="px-4 py-3 text-gray-800 dark:text-gray-200">{{ $entry->section->title ?? 'N/A' }}</td>
                        <td class="px-4 py-3 text-gray-800 dark:text-gray-200">
                            {{ $entry->type->title ?? $entry->procurementType->title ?? 'N/A' }}
                        </td>
                        @if($role === 'procurement_admin')
                            <td class="px-4 py-3 text-gray-800 dark:text-gray-200">{{ $entry->user->name ?? 'N/A' }}</td>
                        @endif
                        <td class="px-4 py-3">
                            <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $entry->status === 'completed'
                ? 'bg-green-100 text-green-800 dark:bg-green-900 dark:text-green-200'
                : 'bg-yellow-100 text-yellow-800 dark:bg-yellow-900 dark:text-yellow-200' }}">
                                {{ $entry->status }}
                            </span>
                        </td>
                        <td class="px-4 py-3 text-gray-800 dark:text-gray-200">
                            {{ $entry->created_at?->format('d/m/Y H:i') ?? 'N/A' }}
                        </td>
                        <td class="px-4 py-3">
                            <a href="{{ route('procurement.preview', ['entry' => $entry->id]) }}"
                                class="text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 mr-3">
                                View
                            </a>
                            @if($role === 'procurement_admin')
                                <form action="{{ route('procurement.entries.destroy', $entry->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="text-red-600 hover:text-red-800 dark:text-red-400 dark:hover:text-red-300"
                                        onclick="return confirm('Are you sure you want to delete this entry?')">
                                        Delete
                                    </button>
                                </form>
                            @endif
                        </td>
                    </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Pagination -->
    <div class="px-4 py-3 bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700">
        {{ $entries->links() }}
    </div>
</div>