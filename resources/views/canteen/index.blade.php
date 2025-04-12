<x-layouts.app>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Canteen Info</h2>
            {{-- @if($canteens->isEmpty())
                <a href="{{ route('canteen_info.create') }}">
                    <flux:button size="sm" color="primary">+ New Canteen Info</flux:button>
                </a>
            @endif --}}


            @if($canteens->count() === 0)
            <a href="{{ route('canteen_info.create') }}">
                <flux:button size="sm" color="primary">+ New Canteen Info</flux:button>
            </a>
        @else
            <div x-data="{ show: false }" @mouseenter="show = true" @mouseleave="show = false" class="relative inline-block">
                <button disabled
                    class="flex items-center gap-2 text-sm px-4 py-2 rounded-md border border-zinc-300 dark:border-zinc-600 bg-zinc-200 dark:bg-zinc-700 text-zinc-500 dark:text-zinc-400 cursor-not-allowed opacity-70 shadow-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M12 11c1.104 0 2-.896 2-2V7a2 2 0 10-4 0v2c0 1.104.896 2 2 2zm0 0v2m0 4h.01" />
                    </svg>
                    + New Canteen Info
                </button>
                <div x-show="show"
                    class="absolute top-full mt-2 left-0 w-56 px-3 py-2 bg-zinc-800 text-white text-sm rounded shadow z-10"
                    x-transition>
                    Delete the existing one first to add a new entry
                </div>
            </div>
        @endif


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
                    @forelse ($canteens as $canteen)
                        <tr class="border-b border-zinc-200 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800">
                            <td class="px-4 py-3">{{ $canteen->title }}</td>
                            <td class="px-4 py-3">
                                <img src="{{ asset('storage/' .$canteen->image) }}" alt="Canteen Image" class="h-16 w-24 object-cover rounded shadow" />
                            </td>

                            <td class="px-4 py-3">{{ $canteen->created_at->format('M d, Y') }}</td>
                            <td class="px-4 py-3 flex gap-2 items-center">
                                <a href="{{ route('canteen_info.edit', $canteen) }}">
                                    <flux:button size="xs" color="neutral">Edit</flux:button>
                                </a>
                                <form action="{{ route('canteen_info.destroy', $canteen) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button size="xs" color="danger" type="submit">Delete</flux:button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-4 py-6 text-center text-zinc-500">No Canteen Infos found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $canteens->links() }}
        </div>
    </div>
</x-layouts.app>
