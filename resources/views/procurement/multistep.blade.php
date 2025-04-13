<x-layouts.procurement-dashboard>
    <x-slot:title>New Procurement Entry</x-slot:title>
    <x-slot:subtitle>Multi-step submission for Entry #{{ $entry->id }}</x-slot:subtitle>

    <div class="max-w-6xl mx-auto space-y-8 mt-6">
        {{-- VEC --}}
        @include('procurement.forms.vec', ['entry' => $entry])

        {{-- GEM Direct --}}
        @include('procurement.forms.gem-direct', ['entry' => $entry])

        {{-- Indent Part 1 --}}
        @include('procurement.forms.indent-part-1', ['entry' => $entry])

        {{-- Indent Part 2 --}}
        @include('procurement.forms.indent-part-2', ['entry' => $entry])

        {{-- Indent Part 3 --}}
        @include('procurement.forms.indent-part-3', ['entry' => $entry])

        {{-- PAC --}}
        @include('procurement.forms.pac', ['entry' => $entry])
    </div>

    <div class="flex justify-end max-w-6xl mx-auto mt-8">
        <button onclick="window.print()" class="bg-red-600 text-white px-6 py-2 rounded hover:bg-red-700 print:hidden">
            Save and Print All
        </button>
    </div>

    <script>
        // Optional: basic collapsible UI
        document.querySelectorAll('[data-toggle]').forEach(button => {
            button.addEventListener('click', () => {
                const target = document.getElementById(button.dataset.toggle);
                if (target) {
                    target.classList.toggle('hidden');
                }
            });
        });
    </script>
</x-layouts.procurement-dashboard>