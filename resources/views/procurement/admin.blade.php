<x-layouts.procurement-dashboard>
    <x-slot:title>Admin Dashboard</x-slot:title>
    <x-slot:subtitle>Hello Admin, {{ auth('procurement')->user()->name }}</x-slot:subtitle>

    <div class="bg-white dark:bg-gray-800 shadow rounded-lg p-6">
        <h2 class="text-xl font-semibold text-gray-800 dark:text-gray-200 mb-6">All Procurement Entries</h2>

        <x-layouts.entries-table :entries="$entries" role="procurement_admin" />
    </div>
</x-layouts.procurement-dashboard>