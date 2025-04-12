<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Create Quick Info</h2>

        <form action="{{ route('canteen_info.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @include('canteen.form', ['canteens' => null, 'buttonText' => 'Save'])
        </form>
    </div>
</x-layouts.app>
