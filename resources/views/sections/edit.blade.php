<x-layouts.procurement-dashboard>
    <x-slot:title>Edit Section</x-slot:title>
    <x-slot:subtitle>Edit the details for the section</x-slot:subtitle>

    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Section</h2>

        <form action="{{ route('procurement.sections.update', $section) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            @include('sections.form', ['section' => $section, 'buttonText' => 'Update'])
        </form>
    </div>
</x-layouts.procurement-dashboard>