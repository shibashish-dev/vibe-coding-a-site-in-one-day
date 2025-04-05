<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit What's New</h2>

        <form method="POST" action="{{ route('whats_new.update', $whatsNew) }}" class="space-y-6">
            @csrf
            @method('PUT')

            @include('whats_new.form', ['buttonText' => 'Update', 'whatsNew' => $whatsNew])
        </form>
    </div>
</x-layouts.app>