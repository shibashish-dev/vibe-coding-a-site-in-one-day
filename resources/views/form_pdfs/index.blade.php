<x-layouts.app>
    <div class="p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-semibold">Form PDFs</h2>
            <a href="{{ route('form_pdfs.create') }}">
                <flux:button size="sm" color="primary">+ New Form PDF</flux:button>
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
                        <th class="px-4 py-3">Thumbnail</th>
                        <th class="px-4 py-3">PDF</th>
                        <th class="px-4 py-3">Created</th>
                        <th class="px-4 py-3">Action</th>
                    </tr>
                </thead>
                <tbody class="text-zinc-700 dark:text-zinc-200">
                    @forelse ($formPdfs as $formPdf)
                        <tr class="border-b border-zinc-200 dark:border-zinc-700 hover:bg-zinc-50 dark:hover:bg-zinc-800">
                            <td class="px-4 py-3">{{ $formPdf->title }}</td>

                            <td class="px-4 py-3">
                                @if ($formPdf->thumbnail)
                                    <a href="{{ asset('storage/' . $formPdf->thumbnail) }}" class="text-blue-500 underline"
                                        target="_blank">
                                        View
                                        Image</a>
                                @else
                                    <span class="text-zinc-400 italic text-sm">No image</span>
                                @endif
                            </td>

                            <td class="px-4 py-3">
                                @if ($formPdf->pdf_path)
                                    <a href="{{ asset('storage/' . $formPdf->pdf_path) }}" class="text-blue-600 underline"
                                        target="_blank">View PDF</a>
                                @else
                                    <span class="text-zinc-400 italic text-sm">No file</span>
                                @endif
                            </td>

                            <td class="px-4 py-3">{{ $formPdf->created_at->format('M d, Y') }}</td>

                            <td class="px-4 py-3 flex gap-2 items-center">
                                <a href="{{ route('form_pdfs.edit', $formPdf) }}">
                                    <flux:button size="xs" color="neutral">Edit</flux:button>
                                </a>

                                <form action="{{ route('form_pdfs.destroy', $formPdf) }}" method="POST"
                                    onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <flux:button size="xs" color="danger" type="submit">Delete</flux:button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-6 text-center text-zinc-500">No form PDFs found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $formPdfs->appends(request()->query())->links() }}
        </div>
    </div>
</x-layouts.app>