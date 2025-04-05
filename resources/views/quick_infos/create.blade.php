<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Create Quick Info</h2>

        <form action="{{ route('quick_infos.store') }}" method="POST" class="space-y-6">
            @csrf
            @include('quick_infos.form', ['quickInfo' => null, 'buttonText' => 'Save'])
        </form>
    </div>
</x-layouts.app>