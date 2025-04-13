<x-layouts.procurement-dashboard>
    <x-slot:title>Admin Dashboard</x-slot:title>
    <x-slot:subtitle>Hello Admin, {{ auth('procurement')->user()->name }}</x-slot:subtitle>
</x-layouts.procurement-dashboard>