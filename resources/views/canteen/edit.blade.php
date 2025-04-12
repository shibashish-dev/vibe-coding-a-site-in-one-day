<x-layouts.app>
    <div class="p-6">
        <h2 class="text-2xl font-semibold mb-6">Edit Canteen Info</h2>

        <form action="{{ route('canteen_info.update', $canteen) }}" enctype="multipart/form-data" method="POST" class="space-y-6">
            @csrf
            @method('PUT')
            @include('canteen.form', ['canteen' => $canteen, 'buttonText' => 'Update'])
        </form>
    </div>
</x-layouts.app>
