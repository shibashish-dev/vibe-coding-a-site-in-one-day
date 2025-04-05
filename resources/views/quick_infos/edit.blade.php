<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Quick Info</h2>

        <form action="{{ route('quick_infos.update', $quickInfo) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            @include('quick_infos.form', ['quickInfo' => $quickInfo, 'buttonText' => 'Update'])
        </form>
    </div>
</x-layouts.app>