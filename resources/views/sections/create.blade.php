<x-layouts.procurement-dashboard>
    <x-slot:title>Create Section</x-slot:title>
    <x-slot:subtitle>Enter details for the new procurement section</x-slot:subtitle>

    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Create Section</h2>

        <form action="{{ route('procurement.sections.store') }}" method="POST" class="space-y-6">
            @csrf
            @include('sections.form', ['section' => null, 'buttonText' => 'Save'])
        </form>
    </div>
</x-layouts.procurement-dashboard>