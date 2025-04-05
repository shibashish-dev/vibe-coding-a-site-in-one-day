<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Create What's New</h2>

        <form method="POST" action="{{ route('whats_new.store') }}" class="space-y-6">
            @csrf

            @include('whats_new.form', ['buttonText' => 'Create'])
        </form>
    </div>
</x-layouts.app>