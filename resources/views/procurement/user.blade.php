<x-layouts.procurement-dashboard>
    <x-slot:title>Procurement User Dashboard</x-slot:title>
    <x-slot:subtitle>Welcome, {{ auth('procurement')->user()->name }}</x-slot:subtitle>

    @if($swal ?? false)
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                Swal.fire({
                    icon: '{{ $swal['icon'] }}',
                    title: '{{ $swal['title'] }}',
                    text: '{{ $swal['text'] }}',
                    confirmButtonText: 'OK'
                });
            });
        </script>
    @endif

    <div class="bg-white shadow rounded-lg p-6">
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-xl font-semibold text-gray-800">Your Procurement Entries</h2>
            <a href="{{ route('procurement.new') }}"
                class="bg-indigo-600 text-white px-4 py-2 rounded-md hover:bg-indigo-700 transition">
                Create New Entry
            </a>
        </div>

        <x-layouts.entries-table :entries="$entries" role="procurement_user" />
    </div>
</x-layouts.procurement-dashboard>