<x-layouts.app>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Quick Infos</h2>
            <a href="{{ route('quick_infos.create') }}">
                <flux:button size="sm" color="primary">+ New Quick Info</flux:button>
            </a>
        </div>

        <!-- Search and sort -->
        <form method="GET" class="mb-4 flex flex-col justify-between sm:flex-row items-center gap-4">
            <flux:input name="search" placeholder="Search title..." value="{{ request('search') }}"
                class="w-full sm:w-64" />

            <div class="flex items-center gap-2">
                <label for="sort" class="text-sm text-zinc-600 dark:text-zinc-300">Sort by:</label>
                <select name="sort" id="sort"
                    class="text-sm border-zinc-300 dark:bg-zinc-800 dark:border-zinc-600 rounded">
                    <option value="created_at" {{ request('sort') == 'created_at' ? 'selected' : '' }}>Date</option>
                    <option value="title" {{ request('sort') == 'title' ? 'selected' : '' }}>Title</option>
                </select>

                <select name="direction" class="text-sm border-zinc-300 dark:bg-zinc-800 dark:border-zinc-600 rounded">
                    <option value="asc" {{ request('direction') == 'asc' ? 'selected' : '' }}>Asc</option>
                    <option value="desc" {{ request('direction') == 'desc' ? 'selected' : '' }}>Desc</option>
                </select>

                <flux:button size="sm" color="secondary" type="submit">Apply</flux:button>
            </div>
        </form>

        <div class="overflow-x-auto rounded shadow border dark:border-zinc-700">
            <table class="w-full min-w-[700px] table-auto border-collapse">
                <thead class="bg-zinc-100 dark:bg-zinc-800 text-zinc-600 dark:text-zinc-300 text-left">
                    <tr class="border-b border-zinc-200 dark:border-zinc-700">
                        <th class="px-4 py-3">Title</th>
                        <th class="px-4 py-3">Link</th>
                        <th class="px-4 py-3">Created</th>
                        <th class="px-4 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody class="text-zinc-700 dark:text-zinc-200">
                    @forelse ($quickInfos as $quickInfo)
                        <tr class="border-b border-zinc-200 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800">
                            <td class="px-4 py-3">{{ $quickInfo->title }}</td>
                            <td class="px-4 py-3">
                                <a href="{{ $quickInfo->link }}" target="_blank"
                                    class="text-blue-500 hover:underline">{{ $quickInfo->link }}</a>
                            </td>
                            <td class="px-4 py-3">{{ $quickInfo->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-3 flex gap-2 items-center">
                                <a href="{{ route('quick_infos.edit', $quickInfo) }}">
                                    <flux:button size="xs" color="neutral">Edit</flux:button>
                                </a>
                                <form action="{{ route('quick_infos.destroy', $quickInfo) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button size="xs" color="danger" type="submit">Delete</flux:button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-zinc-500">No Quick Infos found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $quickInfos->links() }}
        </div>
    </div>
</x-layouts.app>