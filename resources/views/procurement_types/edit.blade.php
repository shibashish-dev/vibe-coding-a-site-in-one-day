<x-layouts.procurement-dashboard>
    <x-slot:title>Edit Procurement Type</x-slot:title>
    <x-slot:subtitle>Edit an existing procurement type</x-slot:subtitle>

    <div class="my-6">
        <form action="{{ route('procurement.procurement-types.update', $procurementType) }}" method="POST"
            class="space-y-6">
            @csrf
            @method('PUT')
            @include('procurement_types.form', ['procurementType' => $procurementType, 'buttonText' => 'Update'])
        </form>
    </div>
</x-layouts.procurement-dashboard>