<x-layouts.procurement-dashboard>
    <x-slot:title>Create Procurement Type</x-slot:title>
    <x-slot:subtitle>Create a new procurement type</x-slot:subtitle>

    <div class="my-6">
        <form action="{{ route('procurement.procurement-types.store') }}" method="POST" class="space-y-6">
            @csrf
            @include('procurement_types.form', ['procurementType' => null, 'buttonText' => 'Save'])
        </form>
    </div>
</x-layouts.procurement-dashboard>